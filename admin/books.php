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
    <style>
    body {
        color: white;
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
            <div class="books-img">

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
                <!-- <div class="h"><a href="delete.php">Delete Books</a></div> -->
                <div class="h"><a href="book_req.php">Book Request</a></div>
                <div class="h"><a href="issue_info.php">Issue Information</a></div>
                <div class="h"><a href="expiry.php">Expired Books Information</a></div>


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



                <div class="container book-req-container" style="padding:23px; height: 630px;">
                    <h2>List Of Books</h2>
                    <!-- --------------- SEARCH BAR  -------------------- -->
                    <div style="margin-left:55%; margin-top:-50px">
                        <form class="navbar-form" action="" name="form1" method="post">
                            <input class="form-control" type="text" name="search" id="" placeholder="Search books"
                                style="width:200px;height:39px;display:inline;">
                            <button type="submit" name="submit" class="btn btn-primary"
                                style="font-size:15px;margin-top:-5px"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <input class="form-control" type="text" name="b_id" id="" placeholder="Enter Book id"
                                style="width:200px;height:39px;display:inline;">
                            <button type="submit" name="submitDel" class="btn btn-danger"
                                style="font-size:15px;margin-top:-5px">Delete Book</button>
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
                            echo "<tr class='scroll-tr' style='background-color: #35cf35c7; width:98%'>";
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
                                
                                echo "<div class='scroll' style='width:100.7%'>";
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
                        ?>
                        <form action="" method="post">
                        <?php
                        echo "<table class='table table-bordered' style='margin-top:40px' >";
                            echo "<tr class='scroll-tr' style='color:white; background-color: #35cf35c7; width:98%'>";
                            //Table header
                                echo "<th>"; echo "Select";    echo "</th>";
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
                                ?>
                                <td><input type="checkbox" name="check[]" value="<?php echo $row['b_id'] ?>"></td>
                                <?php
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
                        
                        //php code to delete multiple rows 
                        
                        if(isset($_POST['delete'])){
                            if(isset($_POST['check'])){
                                foreach($_POST['check'] as $delete_id){
                                    mysqli_query($db,"DELETE from books where b_id = '$delete_id' LIMIT 1");
                                }
                            
                            ?>
                            <script type="text/javascript">
                                alert("Book(s) deleted successfully!");
                                </script>
                            <?php
                            }
                        }
                    }
                    
                    // Delete books php code
                    if(isset($_POST['submitDel'])){
                        if(isset($_SESSION['login_admin'])){
                            // if($_POST['b_id'] == $row['b_id']){
                                mysqli_query($db, "DELETE FROM `books` WHERE b_id = '$_POST[b_id]'");
                                ?>
                            <script type="text/javascript">
                                alert('Book deleted successfully!');
                                </script>
                            <?php
                            // }
                            // else{
                                ?>
                            <!-- <script type="text/javascript">
                                alert('This book does not exist!');
                                </script> -->
                                <?php
                            // }
                        }    
                        else{
                            ?>
                        <script type="text/javascript">
                            alert('You must be logged in as Admin to delete books!');
                            </script>
                        <?php
                        }
                    }
                ?>
                </div>
                </div>
                <p style="margin-left:177px;margin-top:-78px"><button type="submit" name="delete"
                class="btn btn-danger" onclick="location.reload()">Delete</button></p>
            
                </section>
                
                <!-- Footer -->
        <footer style="padding:10px;">
            <div class="container">
                <h4 style="color:white;display:inline;padding-right:10px">Contact us</h4>
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook footer-icons"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-instagram footer-icons"></i></a>
                <a href="https://www.gmail.com"><i class="fa-solid fa-envelope footer-icons"></i></a>
                
                <h5>Email: dcmsazad@gmail.com</h5>
                <h5>Mobile: +91 9827******</h5>
                <h5 style="color:white">Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h5>
            </div>
        </footer>
    </div>
</body>

</html>