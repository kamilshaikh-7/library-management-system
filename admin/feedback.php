<?php
    session_start();
    include "connection.php";
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
                    <li><a href="main.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="books.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;BOOKS</a></li>
                    <li><a href="../feedback.php"><i class="fa-solid fa-message"></i>&nbsp;FEEDBACK</a></li>
                    <?php
                    if(isset($_SESSION['login_admin'])){
                        ?>
                    <li><a href="profile.php"><i class="fa-solid fa-edit"></i>&nbsp;&nbsp;PROFILE</a></li>
                    <li><a href="admin/student.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;STUDENT DATA</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>&nbsp;LOG-OUT</a>
                    </li>
                    <?php
                    }
                    else{
                        ?>
                    <li><a href="register.php"><i class="fa-solid fa-id-card"></i>&nbsp;REGISTER</a></li>
                    <li><a href="admin_login.php"><i class="fa-solid fa-gears"></i>&nbsp;LOGIN</a></li>
                    <?php
                    }
                    ?>
                    <!-- <li><a href=".php"><i class="fa-solid fa-gears"></i>&nbsp;ADMIN LOGIN</a></li> -->
                </ul>
            </nav>
        </header>
        <section>
            <div class="feedback-img-area">
            </div>
            <div class="container book-req-container" style="background-color: rgba(0, 0, 0, 0.6); width:1050px; padding:55px;  height: 755px;">
                <h2>If you have any suggestions or queries please write down.</h2>

                <form action="" method="post">
                    <br><input class="form-control" type="text" placeholder="Write here.." name="comment"
                        style="width:60%; height:70px;"><br>
                    <input class="btn btn-secondary" type="submit" value="Submit" name="submit"
                        style="color:white; width: 120px; height:30px; padding: 0px; margin:15px 0">
                    <br><br>
                </form>

                <!-- PHP Code -->
                <div class="scroll">
                    <?php
                        if(isset($_POST['submit'])){
                            if(isset($_SESSION['login_admin'])){
                                $sql = "INSERT INTO `comments` VALUES('','$_SESSION[login_admin]','$_POST[comment]');";
                                if(mysqli_query($db,$sql)){
                                    $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC;";
                                    $res = mysqli_query($db,$q);
                                
                                        echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<div class='scroll' style='height:0px'>";

                                        while($row = mysqli_fetch_assoc($res)){
                                            echo "<tr>";
                                            if($row['userName']==$_SESSION['login_admin']){
                                                echo "<td>"; echo "Admin ".$row['userName']; "</td>";
                                            }
                                            else{
                                                echo "<td>"; echo $row['userName']; "</td>";
                                            }
                                                echo "<td style='width:auto'>"; echo $row['comment']; "</td>";
                                            echo "</tr>";
                                        
                                        }
                                        echo "</div>";
                                        echo "</table>";
                                }
                            }
                            else{
                                ?>
                            <script type="text/javascript">
                            alert("You must be logged-in to comment");
                            </script>
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

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