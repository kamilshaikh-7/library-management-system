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
                    <li><a href="../main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <?php
                    if(isset($_SESSION['login_admin'])){
                        ?>
                        <li><a href="profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>
                    <li><a href="student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                    <li><a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a>
                    </li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="../register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="../login.php"><i class="fa-solid fa-gears"></i>&nbsp;LOGIN</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="../feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                    <!-- <li><a href=".php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li> -->
                </ul>
            </nav>
        </header>
        <section>
            <div class="book-req-img">

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

                <!-- <div class="h"><a href="add.php">Add Books</a></div> 
                <div class="h"><a href="delete.php">Delete Books</a></div>  -->
                <div class="h"><a href="book_req.php">Book Request</a></div>
                <div class="h"><a href="issue_info.php">Issue Information</a></div>
                <div class="h"><a href="expiry.php">Expired Books Information</a></div>
            </div>

            <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

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

                <div class="container book-req-container" style="text-align:center;">
                    <h3 style='text-align:center;'>Approve Request</h3>

                    <form style="width: 300px;margin: 40px auto; height" name="Approve" action="" method="post">
                        <input style="height: 50px;" class="form-control" type="text" name="approve" placeholder="Approve or not" required><br>
                        <input style="height: 50px;" class="form-control" type="date" name="issue" placeholder="Issue date yyyy-mm-dd" required><br>
                        <input style="height: 50px;" class="form-control" type="date" name="returnDate" placeholder="Return date yyyy-mm-dd" required><br>
                        <button class="btn btn-primary" style="width:150px" type="submit" name="submit" >Send</button>
                    </form>
                </div>
            </div>

        </section>

        <!-- Footer -->
        <footer style="padding:10px;">
            <div class="container">
                <h4 style="color:white;display:inline;padding-right:10px">Contact us</h4>
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook footer-icons"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram footer-icons"></i></a>
                <a href="https://www.gmail.com"><i class="fa-solid fa-envelope footer-icons"></i></a>

                <h5>Email: com.dept.mac@gmail.com</h5>
                <h5>Mobile: +91 9827******</h5>
                <h5 style="color:white">Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h5>
            </div>
        </footer>

        <!-- Book approval PHP Code  -->
        <?php
            if(isset($_POST['submit'])){
                mysqli_query($db,"UPDATE `issue_book` SET approve = '$_POST[approve]', issue = '$_POST[issue]',
                returnDate = '$_POST[returnDate]' where userName = '$_SESSION[userName]' and b_id = '$_SESSION[b_id]'");

                mysqli_query($db,"UPDATE `books` SET quantity = quantity-1 where b_id = '$_SESSION[b_id]'");
                
                $res = mysqli_query($db,"SELECT quantity from books where b_id = '$_SESSION[b_id]'");

                while($row = mysqli_fetch_assoc($res)){
                    if($row['quantity']==0){
                        mysqli_query($db,"UPDATE `books` SET status = 'Not-available' where b_id = '$_SESSION[b_id]'"); 
                    }
                }
                ?>
                <script type="text/javascript">
                    alert("Book status updated successfully!");
                    window.location="book_req.php";
                </script>
                <?php
            }
        
        
        ?>
        
    </div>
</body>

</html>