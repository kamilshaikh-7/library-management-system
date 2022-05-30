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
    <title>Books</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        html,body{
            height:100%;
        }
    </style>
</head>

<body>
    <nav class="navbar1">
        <div class="logo">
            <img src="../images/logo.png" alt="">
            <div class="brand-title">DCMS LIBRARY MANAGEMENT SYSTEM</div>
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <?php
                    if(isset($_SESSION['login_user'])){
                        ?>
                        <li><a href="book_req.php">Book requests</a></li>           
                        <li><a href="logout.php">Logout</a></li>    
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>                 
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="container1-books">

            <!-- --------------- SEARCH BAR  -------------------- -->
            <div style="margin-left:19%;padding-top:12%">
                <form class="navbar-form" id="book-form" action="" name="form1" method="post">
                    <input class="form-control" type="text" name="search" id="" placeholder="Search books"
                        style="width:10rem;height:2rem;display:inline;">
                    <button type="submit" name="submit" class="btn btn-primary"
                        style="font-size:.9rem;margin-top:-5px;margin:.5rem"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                    <input class="form-control" type="text" name="b_id" id="" placeholder="Enter Book id"
                        style="width:10rem;height:2rem;display:inline;">
                    <button type="submit" name="submitReq" class="btn btn-primary"
                        style="font-size:.9rem;margin-top:-5px;margin-left:.5rem">Request Book</button>
                </form><br>
            </div>

            <div class="box-books">
                <?php
                    if(isset($_POST['submit'])){
                    // $sql = "SELECT * FROM `books` WHERE name like '%$_POST[search]%';";
                    $q = mysqli_query($db,"SELECT * FROM `books` WHERE name like '%$_POST[search]%' ORDER BY `books`.`name`");

                        if(mysqli_num_rows($q)==0){
                            echo "<span style='color:white'>NO BOOK AVAILABLE!</span>";
                            
                        }
                        else{
                            echo "<div class='scroll-books'>";
                            echo "<table class='table table-bordered' style='color:white; margin-top:2%;'>";
                                echo "<tr style='background-color: #CF8D5B;'>";
                                    //Table header
                                    echo "<th>"; echo "ID";	echo "</th>";
                                    echo "<th>"; echo "Book-Name";  echo "</th>";
                                    echo "<th>"; echo "Quantity";  echo "</th>";
                                echo "</tr>";	
                            // echo "</table>";

                            // echo "<table class='table table-bordered' style='color:white'; margin-top:2%;' >";
                            while($row = mysqli_fetch_assoc($q)){
                                echo "<tr>";
                                    echo "<td>"; echo $row['b_id']; echo "</td>";
                                    echo "<td>"; echo $row['name']; echo "</td>";
                                    echo "<td>"; echo $row['quantity']; echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";	
                        }
                    }
                    else{
                        $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name`;");

                        echo "<div class='scroll-books''>";
                        echo "<table class='table table-bordered' style='color:white; margin-top:2%' >";
                        echo "<tr style='color:white; background-color: #CF8D5B;'>";
                                //Table header
                                echo "<th>"; echo "ID";	echo "</th>";
                                echo "<th >"; echo "Book-Name";  echo "</th>";
                                echo "<th>"; echo "Quantity";  echo "</th>";
                            echo "</tr>";	
                        // echo "</table>";

                        // echo "<table class='table table-bordered' style='color:white'; margin-top:20px;' >";
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<tr>";
                                echo "<td>"; echo $row['b_id']; echo "</td>";
                                echo "<td>"; echo $row['name']; echo "</td>";
                                echo "<td>"; echo $row['quantity']; echo "</td>";
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
                        window.location = "book_req.php";
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
        </div>
    </div>

    <footer class="footer">
        <div class="containerF">
            <h5 style="display:inline;padding-right:10px">Contact us</h5>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook footer-icons"></i></a>
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram footer-icons"></i></a>
            <a href="https://www.gmail.com"><i class="fa-solid fa-envelope footer-icons"></i></a>
            <h6>Email: com.dept.mac@gmail.com</h6>
            <h6>Mobile: +91 9827******</h6>
            <h6>Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h6>
        </div>
    </footer>

    

    <script src="script.js"></script>
</body>

</html>