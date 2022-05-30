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
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
    html,
    body {
        height: 100%;
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
                <?php
                    if(isset($_SESSION['login_user'])){
                        ?>
                <li><a href="book_req.php">Book requests</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php
                    }
                    else{
                        ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="container1-upd">
    </div>
    <div class="box-upd">
            <h4>Reset your password</h4>
            <form name="login" method="post"><br>
                <div class="login-form forget-form">
                    <input style="width:80%; margin-left:10%" class="form-control" type="text" name="userName" placeholder="User name" required><br>
                    <input style="width:80%; margin-left:10%" class="form-control" type="email" name="email" placeholder="Email id" required><br>
                    <input style="width:80%; margin-left:10%" class="form-control" type="password" name="password" placeholder="New Password" required><br>
                    <input class="btn btn-danger" name="submit" type="submit" value="Reset" style="color:white; width: 6rem; height:2rem; padding: 0px; margin:15px 0">
                </div>
            </form>
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

    <?php
        if(isset($_POST['submit'])){
            
            if(mysqli_query($db,"UPDATE `student` SET password = '$_POST[password]'
            where userName = '$_POST[userName]' && email = '$_POST[email]'")){
                ?>
                <script>
                    alert('Password changed successfully');
                    window.location = "main.php";
                </script>
                <?php
            } 
            else{
                ?>
                <script type="text/javascript">
                alert("The Username or password is incorrect. Try again");
                </script>
                <?php
            }
        }
    ?>

    <script src="script.js"></script>
</body>

</html>