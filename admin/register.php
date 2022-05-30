<?php
    session_start();
    include "connection.php";
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
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="images/logo.png" alt="">
                <h3>DCMS LIBRARY MANAGEMENT SYSTEM</h3>
            </div>
            <nav>
                <ul>
                    <li><a href="../main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <?php
                    if(isset($_SESSION['login_admin'])){
                        ?>
                        <li><a href="student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                        <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="../register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                        <li><a href="../login.php"><i class="fa-solid fa-gears"></i>&nbsp;LOGIN</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="../.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                    <!-- <li><a href=".php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li> -->

                </ul>
            </nav>
        </header>

        <section>
            <div class="log-img register-img">

            </div>
            <div class="log-box register-box">
                <h3 style="text-align: center;">Register and Join us now!</h3>
                <form name="login" action="" method="post"><br>
                    <div class="login-form register-form">
                        <input class="form-control" type="text" name="name" placeholder="Name" required><br>
                        <input class="form-control" type="text" name="userName" placeholder="User Name e.g alex123" required><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required><br>
                        <input class="form-control" type="email" name="email" placeholder="Email id" required><br>
                        <input class="form-control" type="phone" name="contact" placeholder="Contact" required><br>
                        <!-- <input class="form-control" type="text" name="class" placeholder="Class e.g. BBA" required><br> -->
                        <!-- <input class="form-control" type="text" name="year" placeholder="Year e.g. Second" required><br> -->
                        <!-- <input class="form-control" type="number" name="roll" placeholder="Roll No" required><br> -->
                        <!-- <input type="password" name="password" placeholder="Confirm Password" required><br><br><br> -->
                        <!-- <a href="" class="forgotpass">Forgot password?</a><br><br> -->
                        <input class="btn btn-primary" type="submit" value="Register" name="submit" style="color:white; width: 120px; height:30px; padding: 0px; margin:15px 0">
                    </div>
                </form>
                <!-- <p class="signup">New to our library?&nbsp; <a href="register.html">Create an account</a></p> -->
                
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
            $count = 0;
            $sql = 'SELECT userName FROM `admin`';
            $res = mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res)){
                if($row['userName']==$_POST['userName']){   //if username already exists in db
                    $count++;
                }
            }
            if($count==0){
            mysqli_query($db, "INSERT INTO `admin` VALUES('','$_POST[name]', '$_POST[userName]', '$_POST[password]',
            '$_POST[email]', '$_POST[contact]','p.jpg','')");
    ?>
    <script type="text/javascript">
        alert('Registeration successfull!');
        window.location="../login.php";
    </script>
    <?php
        }
        else{
            ?>
            <script type="text/javascript">
                alert('The username you entered already exists! Please try a different username');
            </script>
            <?php
        }
    }
    ?>

</body>
</html>