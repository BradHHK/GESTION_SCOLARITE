<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"])){
        header("location:../adminLogin.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>Admin Panel</title>
</head>
<body>
    <header class="header">
        <span class="logo_img"><img src="../images/logo.png" alt="logo" class="img-menu"></span>
        <h5>Admin Panel</h5>
        <span class="ImageDefault"></span>
    </header>

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                
            </nav>
        </div>
        <div class="option">
            <div class="card">
                <div class="card-image">

                </div>
                <div class="card-text">

                </div>
            </div>
        </div>
    </div>

</body>
</html>