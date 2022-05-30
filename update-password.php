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
        label{
            font-size:1.2rem;
        }
    </style>
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
            <div class="log-img register-img">

            </div>
            <div class="log-box">
                <form name="signup" method="post" style="margin-top:33%"><br>
                    <p style="padding-left:50px; font-size:1.3rem;">Select your role</p>
                    <input style="margin-left:50px; width:18px;" type="radio" name="user" id="admin" value="admin">
                    <label for="admin">Admin</label>
                    <input style="margin-left:50px; width:18px;" type="radio" name="user" id="student" value="student" checked>
                    <label for="student">Student</label>
                    <br><br><button class="btn btn-primary btn-sm" type="submit" name="submit1" style="margin-left:35%; width:90px;">Ok</button>
                </form>
            </div>

            <?php
                if(isset($_POST['submit1'])){
                    if($_POST['user']=='admin'){
                        ?>
                        <script type="">
                            window.location="admin/update-password.php";
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script type="">
                            window.location="student/update-password.php";
                        </script>
                        <?php
                    }
                }
            ?>
        </section>

        <!-- FOOTER -->

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


</body>
</html>