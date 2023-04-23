<?php
//This script will handle login
session_start();

require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1)
              {
                  mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                  if(mysqli_stmt_fetch($stmt))
                  {
                      $query = "SELECT is_verified FROM users WHERE username = '$username'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                      if(password_verify($password, $hashed_password) && (($row["is_verified"]) == 1))
                      {
                          // this means the password is corrct. Allow user to login
                          session_start();
                          $_SESSION["username"] = $username;
                          $_SESSION["id"] = $id;
                          $_SESSION["loggedin"] = true;

                          //Redirect user to welcome page
                          header("location: homepage.php");
                          
                      }
                      else{
                        if($row["is_verified"] == 0)
                        {
                          echo"
                          <script>
                          alert('You have Not Verified your Email! Please Verify & Try Again.');
                          window.location.href='index.html';
                          </script>
                          ";
                        }
                        else{
                          echo"
                          <script>
                          alert('Password Incorrect');
                          window.location.href='index.html';
                          </script>
                          ";
                        }
                      }

                  }

              }
  
      }
  }    
  }
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/shared.css" />
    <link rel="stylesheet" href="CSS/login.css" />
    <title>Netflix | Login</title>
    <link rel="icon" href="https://1000logos.net/wp-content/uploads/2017/05/Netflix-Logo-2006.png" type="image/x-icon">
  </head>
  <body>
    <header>
      <a href="index.html">
        <img
          src="images/Netflix-logo.png"
          alt="Netflix-logo"
          class="netflix_logo"
        />
      </a>
    </header>
    <main>
      <div class="login_bg"></div>
      <div class="login_card">
        <div class="login_form">
          <h2>Login</h2>
          <form action="" method="post">
            <label for="username">Enter Username</label>
            <br />
            <input type="text" name="username" placeholder="" required/> <br />
            <br />
            <label for="username">Password</label> <br />
            <input type="password" name="password" placeholder="" required/>
            <center><button type="submit" class="login_form_button">Login</button></center>
            <br />
          </form>
          <br /><br />
          <center>
            <p class="new-to-netflix">
              New To Netflix?
              <a href="signup.php" class="loginpage_signup_button"
                >Sign Up now.</a
              >
            </p>
          </center>
        </div>
      </div>
    </main>
  </body>
</html>
