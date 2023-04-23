<?php
require_once "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$username = $password = $confirm_password = $user_email = $user_bdate = "";
$username_err = $password_err = $confirm_password_err = $user_email_err = $user_bdate_err = "";

function sendMail($user_email, $v_code)
{
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  require 'PHPMailer/Exception.php';

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'projectreport069@gmail.com';                     //SMTP username
    $mail->Password   = 'gwjpjbzdmuorcwzs';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('projectreport069@gmail.com', 'Netflix Clone');
    $mail->addAddress($user_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification From Netflix';
    $mail->Body    = "Thanks For Registration! <br> 
      Click the Link Below to Verify Email Address <br>
      <b> <a href='https://localhost/NETFLIX/verify.php?user_email=$user_email&v_code=$v_code'>Verify</a> </b>";

    $mail->send();
    echo"Mail Sent!";
    return true;
} catch (Exception $e) {
    echo"Exception!";
    return false;
}
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken";
                    echo"
                    <script>
                    alert('Username is Taken, Please Choose Another Username.');
                    </script>
                    "; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 7){
    $password_err = "Password cannot be less than 7 characters";
    echo"
    <script>
    alert('Password cannot be less than 7 characters.');
    </script>
    "; 
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
    echo"
    <script>
    alert('Passwords should match.');
    </script>
    "; 
}

//Check for email
if(empty(trim($_POST['user_email']))){
  $user_email_err = "email cannot be blank";
}
else{
  $user_email = trim($_POST['user_email']);
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($user_email_err))
{
    $sql = "INSERT INTO users (username, password, user_bdate, user_email, verification_code, is_verified) VALUES (?, ?, ?, ?, ?, '0')";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_user_bdate, $param_user_email, $v_code);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_user_bdate = $user_bdate;
        $param_user_email = $user_email;
        $v_code = bin2hex(random_bytes(16));

        // Try to execute the query
        if (mysqli_stmt_execute($stmt) && sendMail($_POST['user_email'], $v_code))
        {
          header("location: step-1.html");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close(NULL);
}
mysqli_close($conn);
}

?>










<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/shared.css" />
    <link rel="stylesheet" href="CSS/signup.css" />
    <title>Netflix | Sign Up</title>
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
      <div class="signup_bg"></div>
      <div class="signup_card">
        <div class="signup_form">
          <h2>Sign Up</h2>
          <form action="" method="post">
            <label for="fullname">Enter Username</label>
            <br />
            <input type="text" name="username" placeholder="" required/><br />
            <br />
            <label for="useremail">Enter Email</label>
            <br />
            <input type="email" name ="user_email" placeholder="" required/> <br />
            <br />
            <label for="useremail">Create Password</label> <br />
            <input type="password" name ="password" placeholder="" required/> <br />
            <br />
            <label for="useremail">Re-Enter Password</label> <br />
            <input type="password" name ="confirm_password" placeholder="" required/><br />
            <br />
            <label for="userbdate">Enter Your Birthdate</label> <br />
            <input type="date" name ="user_bdate" placeholder="" required/><br />
            <br />
            <center><button type="submit" class="signup_form_button">Create Account</button></center>
          </form>
          <br />
          <br />
          <center>
            <p class="already-netflix-user">
              Already Having Account?
              <a href="login.php" class="signuppage_login_button"
                >Login now.</a
              >
            </p>
          </center>
        </div>
      </div>
    </main>
  </body>
</html>
