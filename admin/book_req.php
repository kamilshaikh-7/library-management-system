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
                    <li><a href="feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
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

                <!-- Show Request Book table PHP Code -->
                <div style="margin-left:58%; margin-top:-50px">
                    <form class="navbar-form" style="margin-top:4px" action="" name="form1" method="post">
                        <input class="form-control" type="text" name="userName" id="" placeholder="Enter User name"
                            style="width:200px;height:39px;display:inline;">
                        <input class="form-control" type="text" name="b_id" id="" placeholder="Enter Book id"
                            style="width:200px;height:39px;display:inline;">
                        <button type="submit" name="submit" class="btn btn-primary"
                            style="font-size:15px;margin-top:-5px">Approve Book</button>
                    </form>
                </div>
                <div class="container book-req-container">

                    <h3 style="text-align:center;">Book Request</h3>
                    <?php

                if(isset($_SESSION['login_admin'])){
                    $sql = "SELECT `student`.userName,class,year,roll,books.b_id,name,authors,edition,status FROM `student` inner join issue_book ON student.userName=issue_book.userName inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve =''";
                    $res = mysqli_query($db,$sql);

                    if(mysqli_num_rows($res)==0){
                        echo "<h3 style='margin:10px; color:white; text-align:center'><b>";
                        echo "No book requests yet!";
                        echo "</b></h3>";
                    }
                    else{
                        echo "<table class='table table-bordered' style='color:white; margin-top:20px' >";
                            echo "<tr class='scroll-tr' style='background-color: #35cf35c7; text-align:center; width:98%'>";
                                //Table header
                                echo "<th>"; echo "User Name";    echo "</th>";
                                echo "<th>"; echo "Class";    echo "</th>";
                                echo "<th>"; echo "Year";  echo "</th>";
                                echo "<th>"; echo "Roll no";  echo "</th>";
                                echo "<th>"; echo "Book id";  echo "</th>";
                                echo "<th>"; echo "Book name";  echo "</th>";
                                echo "<th>"; echo "Author(s)";  echo "</th>";
                                echo "<th>"; echo "Edition";  echo "</th>";
                                echo "<th>"; echo "Status";  echo "</th>"; 
                            echo "</tr>";	
                        echo "</table>";

                            echo "<div class='scroll' style='width:100.3%'>";
                            echo "<table class='table table-bordered' style='color:white; margin-top:20px' >";
                        	while($row = mysqli_fetch_assoc($res)){
                                    echo "<tr class='scroll-tr'>";
                        		        echo "<td>"; echo $row['userName']; echo "</td>";
                        		        echo "<td>"; echo $row['class']; echo "</td>";
                        		        echo "<td>"; echo $row['year']; echo "</td>";
                        		        echo "<td>"; echo $row['roll']; echo "</td>";
                        		        echo "<td>"; echo $row['b_id']; echo "</td>";
                        		        echo "<td>"; echo $row['name']; echo "</td>";
                        		        echo "<td>"; echo $row['authors']; echo "</td>";
                        		        echo "<td>"; echo $row['edition']; echo "</td>";
                        		        echo "<td>"; echo $row['status']; echo "</td>";
                        		    echo "</tr>";
                        	    }
                            echo "</table>";
                            echo "</div>";
                            	
                    }
                }
                else{
                    echo "<h4 style='text-align:center;''>You must be logged-in as admin to view requested books!</h4>";
                }

                if(isset($_POST['submit'])){
                    $_SESSION['userName'] = $_POST['userName'];
                    $_SESSION['b_id'] = $_POST['b_id'];

                    ?>
                    <script type="text/javascript">
                        window.location="approve.php";
                    </script>
                    <?php
                    
                }
            ?>



                    <!-- // if(isset($_SESSION['login_admin'])){

            //     $q = mysqli_query($db,"SELECT * FROM `issue_book` where userName = '$_SESSION[login_admin]'");

            //     if(mysqli_num_rows($q)==0){
            //         echo "<h3 style='margin:10px; color:white'><b>";
            //         echo "You have not requested any book yet!";
            //         echo "</b></h3>";
            //     }
            //     else{
            //         echo "<table class='table table-bordered table-hover' >";
            //             echo "<tr style='background-color: #35cf35c7; text-align:center;'>";
            //                 //Table header
            //                 echo "<th>"; echo "Book ID";    echo "</th>";
            //                 echo "<th>"; echo "Approve status";  echo "</th>";
            //                 echo "<th>"; echo "Issue Date";  echo "</th>";
            //                 echo "<th>"; echo "Return Date";  echo "</th>";
            //             echo "</tr>";	

	        // 	    while($row = mysqli_fetch_assoc($q))
	        // 	        {
            //                 echo "<tr>";
	        // 		            echo "<td>"; echo $row['b_id']; echo "</td>";
	        // 		            echo "<td>"; echo $row['approve']; echo "</td>";
	        // 		            echo "<td>"; echo $row['issue']; echo "</td>";
	        // 		            echo "<td>"; echo $row['returnDate']; echo "</td>";
	        // 		        echo "</tr>";
	        // 	        }
            //         echo "</table>";	
            //     }
            // }
            // else{
            //     ?> -->
                    <!-- //     <script type="text/javascript"> -->
                    <!-- //         alert('You must be logged-in to view Requested books!'); -->
                    <!-- //     </script> -->
                    <?php
            // }
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