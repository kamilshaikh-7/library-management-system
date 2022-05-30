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
    <title>Book requests</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
    html,
    body {
        height: 100%;
    }
    table tr,td{
        color:white;
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

    <div class="container1-book_req">
        <div class="box-book_req">

            <!-- Show Request Book table PHP Code -->
            <?php

        if(isset($_SESSION['login_user'])){

        $q = mysqli_query($db,"SELECT * FROM `issue_book` where userName = '$_SESSION[login_user]'");
    
        if(mysqli_num_rows($q)==0){
        echo "<h5 style='margin:10px'><b>";
        echo "You have not requested any book yet!";
        echo "</b></h5>";
        }
        else{
        ?>
            <form action="" method="post">
                <?php
        echo "<div class='scroll-book_req'>";
        echo "<table class='table table-bordered' >";
        echo "<tr style='background-color: #CF8D5B; text-align:center; color:white;'>";
        //Table header
        // echo "<th>"; echo "Select";    echo "</th>";
        echo "<th>"; echo "Book ID";    echo "</th>";
        echo "<th>"; echo "Approve status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
        echo "</tr>";	
        // echo "</table>";
        
        // echo "<table class='table table-bordered' style='color:white' >";
        while($row = mysqli_fetch_assoc($q))
        {
            echo "<tr'>";
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
            window.location = "../books.php";
            </script>
            <?php
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