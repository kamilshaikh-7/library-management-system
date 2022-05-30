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
    <title>DCMS Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        html,body{
            height:100%;
        }
    </style>
</head>

<body>
    <nav class="navbar1">
        <div class="logo">
            <img src="../images/logo.png" alt="">
            <div class="brand-title">DCMS LIBRARY MANAGEMENT SYSTEM</div>
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container1-log">
        
        <div class="box-log">

        <h3 style="font-size:1.8rem">Login</h3>
                <form name="login" method="post"><br>    
                    <div class="login-form" style="width:90%; margin-left:1rem ">
                        <input class="form-control form-login" type="text" name="userName" placeholder="User Name" required><br>
                        <input class="form-control form-login" type="password" name="password" placeholder="Password" required><br>
                        <a href="update-pass.php" class="forgotpass">Forgot password?</a><br><br>
                        <input class="btn btn-primary" name="submit" type="submit" value="Login" style="color:white; width: 6rem; height:2rem; padding: 0; margin:1.1rem 0">
                    </div>
                    <p class="signup" style="margin-top:1rem">New to our library? <a href="register.php" style="text-decoration:none">Create an account</a></p>
                </form>
        </div>

    </div>

    <footer class="footer">
        <div class="containerF">
            <h5 style="display:inline;padding-right:10px">Contact us</h5>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook footer-icons"></i></a>
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram footer-icons"></i></a>
            <a href="https://www.gmail.com"><i class="fa-solid fa-envelope footer-icons"></i></a>
            <h6>Email: com.dept.mac@gmail.com</h6>
            <h6>Mobile: +91 9827******</h6>
            <h6>Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h6>
        </div>
    </footer>


    <!-- PHP Code -->

    <?php
        if(isset($_POST['submit'])){
            
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
    
    ?>

<script src="script.js"></script>
</body>

</html>