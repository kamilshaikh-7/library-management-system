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
    <title>Forgot Password</title>
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
                    if(isset($_SESSION['login_user'])){
                        ?>
                        <li><a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                        <li><a href="student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="../register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                        <li><a href="../login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;STUDENT LOGIN</a></li>
                        <li><a href="../feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                        <?php
                    }
                    ?>
                    <!-- <li><a href=".php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li> -->
                </ul>
            </nav>
        </header>

        <section>
            <div class="forget-img">

            </div>
            <div class="log-box forget-box">
                <h3>Reset your password</h3>
                <form name="login" method="post"><br>
                    <div class="login-form forget-form">
                        <input class="form-control" type="text" name="userName" placeholder="User name" required><br>
                        <input class="form-control" type="email" name="email" placeholder="Email id" required><br>
                        <input class="form-control" type="password" name="password" placeholder="New Password" required><br>
                        <input class="btn btn-danger" name="submit" type="submit" value="Reset" style="color:white; width: 120px; height:30px; padding: 0px; margin:15px 0">
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
    
    <?php
        if(isset($_POST['submit'])){
            
            if(mysqli_query($db,"UPDATE `student` SET password = '$_POST[password]'
            where userName = '$_POST[userName]' && email = '$_POST[email]'")){
                ?>
                <div class="alert alert-danger" style="position:absolute; top:135px; color: white; background-color: green; width: 500px; height:auto; margin-left: 530px">
                    <h5 style="text-align:center;">PASSWORD SUCCESSFULLY CHANGED</h5>
                    <button class="btn btn-sm" style="float:right; background-color:white; font-size:10px"><a href="../main.php" style="text-decoration:none; color:black">GO TO HOME</a></button>
                </div>
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

</body>
</html>