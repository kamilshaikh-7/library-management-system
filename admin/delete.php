<?php
    include "connection.php";
    session_start();
    // include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>Document</title>
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
                    <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                    <?php
                    if(isset($_SESSION['login_admin'])){
                        ?>
                    <li><a href="student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a>
                    </li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="admin_login.php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li>
                    <?php
                    }
                    ?>
                    <!-- <li><a href=".php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li> -->
                </ul>
            </nav>
        </header>
        <section>
            <div class="delete-book-img">
                
            </div>
            <!--  --------------  SIDE-NAV  ------------------- -->


            <div id="mySidenav" class="sidenav">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div style="margin-left:80px; color:white; margin-bottom:20px;">
                    <?php
                    if(isset($_SESSION['login_admin'])){
                        // echo "<img class='prof-pic' style='width:4rem; margin:20px;' src='images/".$_SESSION['pic']."'>";
                        echo "<h2 style='margin:20px; margin-left:-45px; font-size:1.6rem'>$_SESSION[login_admin]</h2>";
                    }
                    ?>
                </div><br>

                <div class="h"><a href="add.php">Add Books</a></div>
                <div class="h"><a href="delete.php">Delete Books</a></div>
                <div class="h"><a href="book_req.php">Book Request</a></div>
                <div class="h"><a href="#">Issue Information</a></div>

            </div>

            <div id="main">
                <span style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776; </span>
                <div class="container" style="text-align:center">
                    <h2 style="color:white;">Delete Book</h2>
                    <form class="delete-book-form" action="" method="post">
                        <input type="text" name="b_id" class="form-control" placeholder="Book id" required><br>
                        <input type="text" name="name" class="form-control" placeholder="Book name" required><br>
                        <input type="text" name="authors" class="form-control" placeholder="Author(s) name" required><br>
                        <input type="text" name="edition" class="form-control" placeholder="Edition" required><br>
                        <input type="text" name="status" class="form-control" placeholder="Status" required><br>
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required><br>
                        <input type="text" name="dept" class="form-control" placeholder="Department" required><br>

                        <button class="btn btn-primary" style="width:200px;" type="submit" name="submit">Remove book</button>
                    </form>
                </div>
                
                <!-- PHP Code -->
                
                <?php
                
                ?>
            </div>

                <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("main").style.marginLeft = "300px";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft = "0";
                    document.body.style.backgroundColor = "white";
                }
                </script>
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

</body>

</html>