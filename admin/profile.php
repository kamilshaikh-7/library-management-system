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
    <title>Profile</title>
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
                    <li><a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a></li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="../register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="../login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;STUDENT-LOGIN</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="../feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div class="profile-img">
            </div>
            <div class="profile-container">
                <div class="profile-wrapper">
                    <?php
                    if(isset($_POST['submit'])){
                        ?>
                        <script type=text/javascript>
                            alert("If you make any changes to profile, you will need to log-in again.");
                            window.location="edit_profile.php";
                        </script>
                        <?php
                    }

                    $q = mysqli_query($db,"SELECT * FROM `admin` where userName = '$_SESSION[login_admin]'");
                    $row = mysqli_fetch_assoc($q);

                    echo "<h1 style='padding:10px 0'>My Profile</h1>";
                    // echo "<img class='prof-pic' style='width:7rem' src='images/".$_SESSION['pic']."'>";
                    echo "<h2>$_SESSION[login_admin]</h2>";
                    ?>
                    <?php
                    echo "<table class='profile-table'>";
                        echo "<tr>";
                            echo "<td class='profile-label'>";echo "<h3>Admin name:</h3>";echo"</td>";
                            echo "<td>";echo "<h3>$row[name]</h3>";echo"</td>";
                        echo"</tr>";

                        echo "<tr>";
                            echo "<td class='profile-label'>";echo "<h3>User name:</h3>";echo"</td>";
                            echo "<td>";echo "<h3>$row[userName]</h3>";echo"</td>";
                        echo"</tr>";

                        echo "<tr>";
                            echo "<td class='profile-label'>";echo "<h3>Password:</h3>";echo"</td>";
                            echo "<td>";echo "<h3>$row[password]</h3>";echo"</td>";
                        echo"</tr>";
                        
                        echo "<tr>";
                            echo "<td class='profile-label'>";echo "<h3>Email:</h3>";echo"</td>";
                            echo "<td>";echo "<h3>$row[email]</h3>";echo"</td>";
                        echo"</tr>";

                        echo "<tr>";
                            echo "<td class='profile-label'>";echo "<h3>Contact:</h3>";echo"</td>";
                            echo "<td>";echo "<h3>$row[contact]</h3>";echo"</td>";
                        echo"</tr>";

                    echo "</table>";

                    ?>
                    <form action="" method="post">
                        <button class="btn btn-primary" style="margin-top:60px; width:110px" name="submit" type="submit">EDIT</button>
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
    </div>

</body>
</html>