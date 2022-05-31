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
</head>

<body>
    <div class="wrapper">
        <div style="background-color:#282828;">
            <h6 style="color:white; padding:7px; padding-left:20px; text-align:left; margin:0;">Developed by Kamil Shaikh, Maulana Azad College, Aurangabad</h6>
        </div>
        <header>
                <?php
                if(isset($_SESSION['login_user'])){
                    ?>
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                        <h3 style="margin-bottom:32px">DCMS LIBRARY MANAGEMENT SYSTEM</h3>
                    </div>
                        <h4 style="position:absolute;color:white;top:80px;left:109px;">
                            <?php
                                // echo "<img class='prof-pic' src='images/".$_SESSION['pic']."'>";
                                echo "Welcome ".$_SESSION['login_user'];
                            ?>
                        </h4>
                    
                    <nav>
                        <ul>
                            <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                            <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                            <li><a href="student/profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>
                            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                            <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                        </ul>
                    </nav>
                <?php
                }
                else if(isset($_SESSION['login_admin'])){
                    ?>
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                        <h3 style="margin-bottom:32px">DCMS LIBRARY MANAGEMENT SYSTEM</h3>
                    </div>
                        <h4 style="position:absolute;color:white;top:80px;left:109px;">
                            <a href="profile.php" style="text-decoration:none; color:white">
                            <?php
                                // echo "<img class='prof-pic' src='images/".$_SESSION['pic']."'>";
                                echo "Welcome ".$_SESSION['login_admin'];
                                
                            // PHP CODE FOR ALLOW ADMIN

                                $sql_app = mysqli_query($db,"SELECT COUNT(status) as total FROM admin where status=''");
                                $a = mysqli_fetch_assoc($sql_app);

                            ?>
                            </a>
                        </h4>
                    <nav>
                        <ul>
                            <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                            <li><a href="admin/books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                            <li><a href="admin/profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>
                            <li><a href="admin/student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                            <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                            <li><a href="admin/admin_allow.php"><i class="fa-solid fa-user-gear"></i><span>&nbsp;<?php echo $a['total'];?></span></a></li>

                        </ul>
                    </nav>
                <?php
                }
                else{
                    ?>
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                        <h3>DCMS LIBRARY MANAGEMENT SYSTEM</h3>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                            <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                            <li><a href="register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                            <li><a href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;LOGIN</a></li>
                            <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                        </ul>
                    </nav>
                <?php
                }
                ?>
        </header>

        <section>
            <div class="img-area">
                <!-- <div class="w3-section w3-content" style="width: 100%; height: 400px;">
                    <img class="mySlides w3-animate-left" src="images/img_forest.jpg" alt="" style="width: 100%">
                    <img class="mySlides w3-animate-fading" src="images/img_lights.jpg" alt="" style="width: 100%">
                    <img class="mySlides w3-animate-fading" src="images/img_mountains.jpg" alt="" style="width: 100%">
                    <img class="mySlides w3-animate-left" src="images/img_snowtops.jpg" alt="" style="width: 100%">
                </div> -->
            </div>
            <!-- JAVASCRIPT -->
            <!-- <script type="text/javascript">
                let a=0;
                carousal();
        
                function carousal(){
                    let i;
                    let x = document.getElementsByClassName("mySlides");
        
                    for(i=0; i<x.length; i++){
                        x[i].style.display="none";
                    }
        
                    a++;
                    if(a>x.length){
                        a=1;
                    }
        
                    x[a-1].style.display = "block";
                    setTimeout(carousal,5000);
                }
        
            </script> -->


            <div class="box"><br><br><br>
                <h3>Welcome to the library</h3><br>
                <div class="time">
                    <h4>Opening time: <b>9am</b></h4>
                    <h4>Closing time: <b>4pm</b></h4>
                </div>
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
</body>

</html>