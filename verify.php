<?php
    require("config.php");
    
    if(isset($_GET['user_email']) && isset($_GET['v_code']))
    {
        $query = "SELECT * FROM `users` WHERE `user_email`='$_GET[user_email]' AND `verification_code`='$_GET[v_code]'";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['is_verified'] == 0)
                {
                    $update = "UPDATE `users` SET `is_verified`='1' WHERE `user_email`='$result_fetch[user_email]'";
                    if(mysqli_query($conn,$update))
                    {
                        echo"
                        <script>
                            alert('Email Verification Successful');
                            window.location.href='homepage.php';
                        </script>
                        ";
                    }
                    else
                    {
                        echo"
                        <script>
                            alert('Cannot Run Query');
                        </script>
                        ";
                    }
                }
                else{
                    echo"
                    <script>
                        alert('Email already registered');
                        window.location.href='homepage.php';
                    </script>
                    ";
                }
            }
        }
        else
        {
            echo":(";
            echo"
            <script>
                alert('Cannot Run Query');
            </script>
            ";
        }
    }
?>