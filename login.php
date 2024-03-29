<?php
    include "connection.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Library</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .log-box {
        color: rgb(255, 255, 255);
        border: 2px white solid;
        background: rgba(0, 0, 0, 0.4);
        height: 500px;
        width: 370px;
        z-index: 2;
        position: absolute;
        margin: 120px 590px;    /*changed from 150 to 120*/
        }
        label{
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="background-color:#282828;">
            <h6 style="color:white; padding:7px; padding-left:20px; text-align:left; margin:0;">Developed by Kamil Shaikh, Maulana Azad College, Aurangabad</h6>
        </div>
        <header>
            <div class="logo">
                <img src="images/logo.png" alt="">
                <h3>DCMS LIBRARY MANAGEMENT SYSTEM</h3>
            </div>
            <nav>
                <ul>
                <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <?php
                    if(isset($_SESSION['login_user'])){
                        ?>
                        <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                        <li><a href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;LOGIN</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div class="log-img">

            </div>
            <div class="log-box">
                <h3 style="font-size:1.8rem">Login</h3>
                <form name="login" method="post"><br>
                    <p style="padding-left:50px; font-size:1.2rem;">Login as</p>
                    <input style="margin-left:50px; width:18px;" type="radio" name="user" id="admin" value="admin">
                    <label for="admin">Admin</label>
                    <input style="margin-left:50px; width:18px;" type="radio" name="user" id="student" value="student" checked>
                    <label for="student">Student</label>

                    <div class="login-form">
                        <input class="form-control" type="text" name="userName" placeholder="User Name" required><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required><br>
                        <a href="update-password.php" class="forgotpass">Forgot password?</a><br><br>
                        <input class="btn btn-primary" name="submit" type="submit" value="Login" style="color:white; width: 120px; height:30px; padding: 0px; margin:15px 0">
                        <p class="signup">New to our library?&nbsp; <a href="register.php">Create an account</a></p>
                    </div>
                </form>
                
                
            </div>
        </section>

        <footer style="padding:10px;">
            <div class="container">
                <h4 style="color:white;display:inline;padding-right:10px">Contact us</h4>
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook footer-icons"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram footer-icons"></i></a>
                <a href="https://www.gmail.com"><i class="fa-solid fa-envelope footer-icons"></i></a>

                <h5>Email: com.dept.mac@gmail.com</h5>
                <span></span>
                <h5 style="color:white">Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h5>
            </div>
        </footer>
    </div>

    <!-- PHP Code -->

    <?php
        if(isset($_POST['submit'])){
            if($_POST['user']=='admin'){
                $count = 0;
                $res = mysqli_query($db,"SELECT * FROM `admin` WHERE userName='$_POST[userName]' && password='$_POST[password]' and status='Yes'");   
                $count = mysqli_num_rows($res);

                $row = mysqli_fetch_assoc($res);
                
                if($count==0){
                    ?>
                        <div class="alert alert-danger" style="position:absolute; top:135px; color: white; background-color: red; width: 500px; margin-left: 530px">
                            <strong>This username or password does not exist. Please try again</strong>
                        </div>
                        <?php
                }
                else{
                    // $_SESSION['pic'] = $row['pic'];
                    $_SESSION['login_admin'] = $_POST['userName'];
                    
                    ?>
                        <script type=text/javascript>
                            window.location="main.php";
                        </script>
                    <?php
                    
                }
            }
            else{
                $count = 0;
                $res = mysqli_query($db,"SELECT * FROM `student` WHERE userName='$_POST[userName]' && password='$_POST[password]'");   
                $count = mysqli_num_rows($res);

                $row = mysqli_fetch_assoc($res);
                
                if($count==0){
                    ?>
                        <div class="alert alert-danger" style="position:absolute; top:135px; color: white; background-color: red; width: 500px; margin-left: 530px">
                            <strong>This username or password does not exist. Please try again</strong>
                        </div>
                        <?php
                }
                else{
                    // $_SESSION['pic_student'] = $row['pic_student'];
                    $_SESSION['login_user'] = $_POST['userName'];
                    ?>
                        <script type=text/javascript>
                            window.location="main.php";
                        </script>
                    <?php
                    
                }
            }
        }
    
    ?>
</body>
</html>