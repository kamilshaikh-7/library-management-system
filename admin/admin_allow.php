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
    <style>
    *{
        color: white;
    }

    table {
        text-align: center;
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
                </ul>
            </nav>
        </header>
        <section>
            <div class="stud-img">

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
                </div>

                <div class="h"><a href="add.php">Add Books</a></div>
                <!-- <div class="h"><a href="delete.php">Delete Books</a></div>  -->
                <div class="h"><a href="book_req.php">Book Request</a></div>
                <div class="h"><a href="#">Issue Information</a></div>

            </div>

            <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

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

                <div class="container book-req-container" style="background-color: rgba(0, 0, 0, 0.6); padding:23px; height: 640px;">
                    <h2>REQUESTS FOR ADMIN </h2>
                    <!-- --------------- SEARCH BAR  -------------------- -->
                    <div style="margin-left:80%;margin-top:-50px">
                        <form class="navbar-form" action="" name="form1" method="post">
                            <input class="form-control" type="text" name="search" id="" placeholder="Exact user name"
                                style="width:200px;height:39px;display:inline;">
                            <button type="submit" name="submit" class="btn btn-primary"
                                style="font-size:15px;margin-top:-5px"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <?php
                    if(isset($_POST['submit'])){
                        // $sql = "SELECT * FROM `books` WHERE name like '%$_POST[search]%';";
                        $q = mysqli_query($db,"SELECT name,userName,email,contact,status FROM `admin` WHERE userName like '%$_POST[search]%'
                        and status=''");

                        if(mysqli_num_rows($q)==0){
                            echo "<br>NO REQUEST FOUND WITH THAT USER NAME!";
                        }
                        else{
                            echo "<table class='table table-bordered' style='margin-top:40px' >";
                                    echo "<tr class='scroll-tr' style='color:white; background-color: #35cf35c7; width:97%'>";
                                    //Table header
                                    echo "<th>"; echo "Person name";	echo "</th>";
                                    echo "<th>"; echo "User Name";  echo "</th>";
                                    echo "<th>"; echo "Email id";  echo "</th>";
                                    echo "<th>"; echo "Phone";  echo "</th>";
                                    echo "<th>"; echo "Status";  echo "</th>";
                                echo "</tr>";	
                            echo "</table>";

                            echo "<div class='scroll'>";
                                echo "<table class='table table-bordered' style='margin-top:10px' >";

                                while($row = mysqli_fetch_assoc($q))
                                {
                                    $_SESSION['test_name'] = $row['userName'];  //making the username a session variable
                                    echo "<tr class='scroll-tr'>";
                                        echo "<td style='width:15%'>"; echo $row['name']; echo "</td>";
                                        echo "<td style='width:15%'>"; echo $row['userName']; echo "</td>";
                                        echo "<td style='width:15%'>"; echo $row['email']; echo "</td>";
                                        echo "<td style='width:15%'>"; echo $row['contact']; echo "</td>";
                                        echo "<td style='width:15%'>"; echo $row['status']; echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            echo "</div>";
                            ?>

                            <form action="" method="post" style="margin-top:-300px">
                                <button class="btn btn-secondary" type="submit" name="accept" style="color:white; background:none; font-size:1.2rem"><span class="fa-solid fa-circle-check" style="color:green;"></span>Accept</button>
                                <button class="btn btn-secondary" type="submit" name="reject" style="color:white; background:none; font-size:1.2rem"><span class="fa-solid fa-circle-xmark" style="color:red;"></span>Reject</button>
                            </form>

                            <?php
                            

                        }
                    }
                    else{
                        $res=mysqli_query($db,"SELECT name,userName,email,contact,status FROM `admin` where status=''");

                        echo "<table class='table table-bordered' style='margin-top:40px' >";
                                echo "<tr class='scroll-tr' style='color:white; background-color: #35cf35c7; width:97%'>";
                                //Table header
                                    echo "<th>"; echo "Person name";	echo "</th>";
                                    echo "<th>"; echo "User Name";  echo "</th>";
                                    echo "<th>"; echo "Email id";  echo "</th>";
                                    echo "<th>"; echo "Phone";  echo "</th>";
                                    echo "<th>"; echo "Status";  echo "</th>";
                            echo "</tr>";	
                        echo "</table>";

                        echo "<div class='scroll'>";
                            echo "<table class='table table-bordered' style='margin-top:10px' >";
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<tr class='scroll-tr'>";
                                echo "<td style='width:15%'>"; echo $row['name']; echo "</td>";
                                echo "<td style='width:15%'>"; echo $row['userName']; echo "</td>";
                                echo "<td style='width:15%'>"; echo $row['email']; echo "</td>";
                                echo "<td style='width:15%'>"; echo $row['contact']; echo "</td>";
                                echo "<td style='width:15%'>"; echo $row['status']; echo "</td>";
                            echo "</tr>";
                        }
                            echo "</table>";
                        echo "</div>";
                    }

                    //ACCEPT or REJECT admin requests

                    if(isset($_POST['accept'])){
                    mysqli_query($db,"UPDATE `admin` SET status = 'Yes' where userName = '$_SESSION[test_name]'");
                    unset($_SESSION['test_name']);
                    }
                    else if(isset($_POST['reject'])){
                        mysqli_query($db,"DELETE from `admin` where userName = '$_SESSION[test_name]' and status = ''");
                        unset($_SESSION['test_name']);
                    }
                ?>
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
    </div>
</body>
</html>