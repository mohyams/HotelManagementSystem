<?php

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

$sql = "SELECT * FROM reserve";

$records = mysqli_query($conn,$sql);

?>
<html>
<head>
        <meta charset="UTF-8">
        <title>Rasoie</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    </head>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Rasoie Dining</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="color_animation" href="home.html">WELCOME</a></li>
                            <li><a class="color_animation" href="about1.html">ABOUT</a></li>
                            <li><a class="color_animation" href="reservation.html">RESERVATION</a></li>
                            <li><a class="navactive color_animation" href="contact1.html">CONTACT</a></li>
                             <li><a class="color_animation" href="newmenu.php" >MENU</a></li>
                            <li><a class="color_animation" href="index.html" >LOGOUT</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
     <?php
        while($reserve=$records->fetch_assoc())
        {
            echo"<br>";
            echo"<div>","Name : ".$reserve['Name']."<br>", 
            "Phone No : ".$reserve['Phone']. "<br>",
            "Date : ".$reserve['Date']. "<br>",
            "Time : ".$reserve['Time']. "<br>",
            "Guest No : ".$reserve['GuestNo']."</div>";
        }
        
    ?>


</html>
