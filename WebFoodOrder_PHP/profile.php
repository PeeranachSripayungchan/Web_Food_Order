<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page (ข้าว)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body bgcolor="D3D3D3">
    <div class="container">
        <?php 

            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <h3 class="mt-4"><p style="text-align:right">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></p></h3>
        <a href="logout.php" class="btn btn-danger"><p style="text-align:right">Logout</p></a>
    </div>

    <div class="navbar" style="margin-left: 85.9%;">
        <a href="user.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
    </div>
    
    <img src="logo.png" style="margin-left: 4%;" alt="bell" width="150" height="100">
    <br>

    <p style="margin-left: 4%; font-size: 48px;">
        <b>
            <?php
                echo $row['firstname']
            ?>
        </b>
    </p>

    <p style="margin-left: 4%; font-size: 48px;">
        <b>
            <?php
                echo $row['lastname']
            ?>
        </b>
    </p>

    <p style="margin-left: 4%; font-size: 48px;">
        <b>
            <?php
                echo $row['email']
            ?>
        </b>
    </p>




</body>



</html>