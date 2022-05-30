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
    <title>Books</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body{
            color:white;
        }
        table{
        text-align:center;
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
                    <li><a href="student/profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>    
                    <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="login.php"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;LOGIN</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <div class="books-img">

            </div>
            <!--  --------------  SIDE-NAV  ------------------- -->


            <div id="mySidenav" class="sidenav">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div style="margin-left:80px; color:white; margin-bottom:20px;">
                    <?php
                    if(isset($_SESSION['login_user'])){
                        // echo "<img class='prof-pic' style='width:4rem; margin:20px;' src='images/".$_SESSION['pic']."'>";
                        echo "<h2 style='margin:20px; margin-left:-45px; font-size:1.6rem'>$_SESSION[login_user]</h2>";
                    }
                    ?>
                </div><br>

                <div class="h"><a href="student/book_req.php">Book Request</a></div>
                <!-- <div class="h"><a href="student/expiry.php">Expired Books Information</a></div> -->


            </div>

            <div id="main">
                <span style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776;</span>

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



                <div class="container book-req-container" style="padding:23px; height: 640px;">
                    <h2>List Of Books</h2>
                    <!-- --------------- SEARCH BAR  -------------------- -->
                    <div style="margin-left:54%; margin-top:-50px">
                        <form class="navbar-form" action="" name="form1" method="post">
                            <input class="form-control" type="text" name="search" id="" placeholder="Search books"
                                style="width:200px;height:39px;display:inline;">
                            <button type="submit" name="submit" class="btn btn-primary"
                                style="font-size:15px;margin-top:-5px"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <input class="form-control" type="text" name="b_id" id="" placeholder="Enter Book id"
                                style="width:200px;height:39px;display:inline;">
                            <button type="submit" name="submitReq" class="btn btn-primary"
                                style="font-size:15px;margin-top:-5px">Request Book</button>
                        </form><br>
                    </div>


                    <?php
                    if(isset($_POST['submit'])){
                    // $sql = "SELECT * FROM `books` WHERE name like '%$_POST[search]%';";
                    $q = mysqli_query($db,"SELECT * FROM `books` WHERE name like '%$_POST[search]%' ORDER BY `books`.`name`");

                        if(mysqli_num_rows($q)==0){
                            echo "NO BOOK AVAILABLE!";
                        }
                        else{
                        echo "<table class='table table-bordered' style='color:white; margin-top:40px;'>";
                            echo "<tr class='scroll-tr' style='background-color: #CF8D5B; width:98%'>";
                                //Table header
                                echo "<th>"; echo "ID";	echo "</th>";
                                echo "<th>"; echo "Book-Name";  echo "</th>";
                                echo "<th>"; echo "Author Name";  echo "</th>";
                                echo "<th>"; echo "Edition";  echo "</th>";
                                echo "<th>"; echo "Status";  echo "</th>";
                                echo "<th>"; echo "Quantity";  echo "</th>";
                                echo "<th>"; echo "Department";  echo "</th>";
                            echo "</tr>";	
                        echo "</table>";

                        echo "<div class='scroll'>";
                        echo "<table class='table table-bordered' style='color:white'; margin-top:20px;' >";
                        while($row = mysqli_fetch_assoc($q)){
                                echo "<tr class='scroll-tr'>";
                                    echo "<td>"; echo $row['b_id']; echo "</td>";
                                    echo "<td>"; echo $row['name']; echo "</td>";
                                    echo "<td>"; echo $row['authors']; echo "</td>";
                                    echo "<td>"; echo $row['edition']; echo "</td>";
                                    echo "<td>"; echo $row['status']; echo "</td>";
                                    echo "<td>"; echo $row['quantity']; echo "</td>";
                                    echo "<td>"; echo $row['dept']; echo "</td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";	
                        }
                    }
                    else{
                        $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name`;");

                        echo "<table class='table table-bordered' style='margin-top:40px' >";
                            echo "<tr class='scroll-tr' style='color:white; background-color: #CF8D5B; width:98%'>";
                                //Table header
                                echo "<th>"; echo "ID";	echo "</th>";
                                echo "<th>"; echo "Book-Name";  echo "</th>";
                                echo "<th>"; echo "Author Name";  echo "</th>";
                                echo "<th>"; echo "Edition";  echo "</th>";
                                echo "<th>"; echo "Status";  echo "</th>";
                                echo "<th>"; echo "Quantity";  echo "</th>";
                                echo "<th>"; echo "Department";  echo "</th>";
                            echo "</tr>";	
                        echo "</table>";

                        echo "<div class='scroll' style='width:100.3%'>";
                        echo "<table class='table table-bordered' style='color:white'; margin-top:20px;' >";
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<tr class='scroll-tr'>";
                                echo "<td>"; echo $row['b_id']; echo "</td>";
                                echo "<td>"; echo $row['name']; echo "</td>";
                                echo "<td>"; echo $row['authors']; echo "</td>";
                                echo "<td>"; echo $row['edition']; echo "</td>";
                                echo "<td>"; echo $row['status']; echo "</td>";
                                echo "<td>"; echo $row['quantity']; echo "</td>";
                                echo "<td>"; echo $row['dept']; echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";	 
                    }

            // Book Request PHP Code

            if(isset($_POST['submitReq'])){
                if(isset($_SESSION['login_user'])){
                    $quan = mysqli_query($db,"SELECT * FROM `books` where b_id = '$_POST[b_id]' and quantity != 0");

                    if(mysqli_num_rows($quan) != 0){
                        $sql1 = mysqli_query($db,"SELECT * FROM `books` where b_id = '$_POST[b_id]'");
                        $row1 = mysqli_fetch_assoc($sql1);
                        $count1 = mysqli_num_rows($sql1);

                        if($count1 != 0){
                        mysqli_query($db,"INSERT INTO `issue_book` VALUES ('$_SESSION[login_user]', '$_POST[b_id]', '', 
                        '', '')");
                        ?>
                        <script type="text/javascript">
                        alert('Book request sent successfully!');
                        window.location = "student/book_req.php";
                        </script>
                        <?php
                        }
                        else{
                            ?>
                            <script type="text/javascript">
                            alert('The Book you requested is not available in the library!');
                            window.location = "books.php";
                            </script>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <script type="text/javascript">
                            alert('The Book you requested is not available in the library!');
                            window.location = "books.php";
                            </script>
                            <?php
                    }
                }
                else{
                    ?>
                    <script type="text/javascript">
                    alert('You must be logged-in to request books!');
                    </script>
                    <?php
                }
            }
        ?>
        </section>

        <!-- Footer -->
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