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
    <title>DCMS Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        

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
            <div class="edit-img">

            </div>
            <?php
                $sql = "SELECT * FROM `student` where userName = '$_SESSION[login_user]'";
                $res = mysqli_query($db,$sql)  or die(mysqli_error());

                while($row = mysqli_fetch_assoc($res)){
                    $stud_name = $row['stud_name'];
                    $userName = $row['userName'];
                    $class = $row['class'];
                    $year = $row['year'];
                    $roll = $row['roll'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $password = $row['password']; 
                }

            ?>
            <div class="log-box register-box edit-box">
                <h3 style="text-align: center;">Edit Profile</h3>
                <form name="login" action="" method="post" enctype="multipart/form-data"><br>
                    <div class="login-form register-form">
                        <input class="form-control" type="text" name="stud_name" placeholder="Name" value="<?php   echo "$stud_name";  ?>" required><br>
                        <input class="form-control" type="text" name="userName" placeholder="User Name" value="<?php   echo "$userName";  ?>" required><br>
                        <input class="form-control" type="text" name="class" placeholder="Class" value="<?php   echo "$class";  ?>" required><br>
                        <input class="form-control" type="text" name="year" placeholder="Year" value="<?php   echo "$year";  ?>" required><br>
                        <input class="form-control" type="text" name="roll" placeholder="Roll no" value="<?php   echo "$roll";  ?>" required><br>
                        <input class="form-control" type="email" name="email" placeholder="Email id" value="<?php   echo "$email";  ?>" required><br>
                        <input class="form-control" type="phone" name="phone" placeholder="Phone" value="<?php   echo "$phone";  ?>" required><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" value="<?php   echo "$password";  ?>" required><br>

                        <!-- <input class="form-control" style="padding:5px;" type="file" name="file" id=""> -->

                        <input class="btn btn-primary" type="submit" value="Save" name="submit" style="color:white; width: 120px; height:30px; padding: 0px; margin:15px 0">
                    </div>
                </form>
                <!-- <p class="signup">New to our library?&nbsp; <a href="register.html">Create an account</a></p> -->
                
            </div>

            <?php
                if(isset($_POST['submit'])){

                    // move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

                    $stud_name = $_POST['stud_name'];
                    $userName = $_POST['userName'];
                    $class = $_POST['class'];
                    $year = $_POST['year'];
                    $roll = $_POST['roll'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password']; 
                    // $picstudent=$_FILES['file']['name'];

                    $sql2 = "UPDATE `student` SET stud_name='$stud_name', userName='$userName', class='$class',
                    year='$year', roll='$roll', email='$email', phone='$phone', password='$password' 
                    where userName = '".$_SESSION['login_user']."'";

                    if(mysqli_query($db,$sql2)){
                        ?>
                        <script type="text/javascript">
                            alert("Your profile has been updated successfully! Please Log-in");
                            window.location = "../logout.php";
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
                <h5>Mobile: +91 9827******</h5>
                <h5 style="color:white">Address: Dr. Rafiq Zakaria Marg,<br> Rauza Bagh, Aurangabad 431 001, Maharashtra, India.</h5>
            </div>
        </footer>
        
        
    </div>
</body>
</html>