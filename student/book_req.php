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
                    <li><a href="../books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <?php
                    if(isset($_SESSION['login_user'])){
                        ?>
                    <li><a href="profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>    
                    <li><a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a>
                    </li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="../register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="../login.php"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;LOGIN</a></li>
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
                    if(isset($_SESSION['login_user'])){
                        // echo "<img class='prof-pic' style='width:4rem; margin:20px;' src='images/".$_SESSION['pic']."'>";
                        echo "<h2 style='margin:20px; margin-left:-45px; font-size:1.6rem'>$_SESSION[login_user]</h2>";
                    }
                    ?>
                </div><br>

                <!-- <div class="h"><a href="add.php">Add Books</a></div> 
                <div class="h"><a href="delete.php">Delete Books</a></div>  -->
                <div class="h"><a href="book_req.php">Book Requests</a></div>
                <!-- <div class="h"><a href="expiry.php">Expired Books Information</a></div> -->

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

                <div class="container book-req-container" style="padding:23px; height: 640px;">
                
                    <!-- Show Request Book table PHP Code -->
                    <?php

                if(isset($_SESSION['login_user'])){
        
                    $q = mysqli_query($db,"SELECT * FROM `issue_book` where userName = '$_SESSION[login_user]'");
                    
                    if(mysqli_num_rows($q)==0){
                        echo "<h3 style='margin:10px'><b>";
                        echo "You have not requested any book yet!";
                        echo "</b></h3>";
                        }
                    else{
                        ?>
                        <form action="" method="post">
                        <?php
                        echo "<table class='table table-bordered' >";
                        echo "<tr  class='scroll-tr' style='background-color: #35cf35c7; text-align:center; color:white;'>";
                        //Table header
                        // echo "<th>"; echo "Select";    echo "</th>";
                        echo "<th>"; echo "Book ID";    echo "</th>";
                        echo "<th>"; echo "Approve status";  echo "</th>";
                        echo "<th>"; echo "Issue Date";  echo "</th>";
                        echo "<th>"; echo "Return Date";  echo "</th>";
                        echo "</tr>";	
                        echo "</table>";
                        
                        echo "<div class='scroll'>";
                        echo "<table class='table table-bordered' style='color:white' >";
                        while($row = mysqli_fetch_assoc($q))
                        {
                            echo "<tr class='scroll-tr'>";
                            ?>
                            <!-- <td><input type="checkbox" name="check[]" value="<?php echo $row["b_id"] ?>"></td> -->
                            <?php
                            
                            echo "<td>"; echo $row['b_id']; echo "</td>";
                            echo "<td>"; echo $row['approve']; echo "</td>";
                            echo "<td>"; echo $row['issue']; echo "</td>";
                            echo "<td>"; echo $row['returnDate']; echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";	
                        ?>
                        <!-- <p style="text-align:center"><button type="submit" name="delete"
                        class="btn btn-danger" onclick="location.reload()">Delete</button></p> -->
                        <?php
                        //php code to delete multiple rows

                        if(isset($_POST['delete'])){
                            if(isset($_POST['check'])){
                                foreach($_POST['check'] as $delete_id){
                                    mysqli_query($db,"DELETE from issue_book where b_id = '$delete_id'
                                    and userName = '$_SESSION[login_user]' ORDER BY b_id ASC LIMIT 1");
                                }
                            }
                            ?>
                            <script type="text/javascript">
                                alert("Request deleted successfully!");
                            </script>
                            <?php
                        }
                    }   
                }
                else{
                    ?>
                    <script type="text/javascript">
                    alert('You must be logged-in to view Requested books!');
                    window.location="../books.php";
                    </script>
                    <?php
                }
            ?>
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