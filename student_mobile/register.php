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

    <div class="container1-reg">
        
        <div class="box-reg">

            <div class="log-box register-box">
                <h3 style="text-align: center;">Register and Join us now!</h3>
                <form name="login" action="" method="post"><br>
                    <div class="login-form register-form">
                        <input class="form-control" type="text" name="stud_name" placeholder="Student Name" required><br>
                        <input class="form-control" type="text" name="userName" placeholder="User Name e.g alex123" required><br>
                        <!-- <input type="text" class="form-control" name="lastName" placeholder="Last Name" required><br><br> -->
                        <input class="form-control" type="text" name="class" placeholder="Class e.g. BBA" required><br>
                        <input class="form-control" type="text" name="year" placeholder="Year e.g. Second" required><br>
                        <input class="form-control" type="number" name="roll" placeholder="Roll No" required><br>
                        <input class="form-control" type="email" name="email" placeholder="Email id" required><br>
                        <input class="form-control" type="phone" name="phone" placeholder="Phone" required><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required><br>
                        <!-- <input type="password" name="password" placeholder="Confirm Password" required><br><br><br> -->
                        <!-- <a href="" class="forgotpass">Forgot password?</a><br><br> -->
                        <input class="btn btn-primary" type="submit" value="Register" name="submit" style="color:white; width: 120px; height:30px; padding: 0px; margin:1rem;">
                    </div>
                </form>
                <!-- <p class="signup">New to our library?&nbsp; <a href="register.html">Create an account</a></p> -->
                
            </div>

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
            $sql = 'SELECT userName,email,password FROM `STUDENT`';
            $res = mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res)){
                if($row['userName']==$_POST['userName'] || $row['password']==$_POST['password']){   //if username already exists in db
                    $count++;
                }
            }
            if($count==0){
            mysqli_query($db, "INSERT INTO `STUDENT` VALUES('$_POST[stud_name]', '$_POST[userName]', '$_POST[class]',
            '$_POST[year]', '$_POST[roll]', '$_POST[email]', '$_POST[phone]', '$_POST[password]','p.jpg')");

            ?>
            <script type="text/javascript">
                alert('Registeration successfull!');
                window.location = "login.php";
            </script>
            <?php
        }
        else{
            ?>
            <script type="text/javascript">
                alert('The username or password you entered already exists! Please try a different username');
            </script>
            <?php
        }
    }
    ?>


    

    <script src="script.js"></script>
</body>

</html>