<!DOCTYPE html>
<html lang="en">
	<head>
       <!-- Custom styles for this template -->
        <link href="css/carousel.css" rel="stylesheet" type="text/css"></link>
         <!-- Bootstrap file customization -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" ></link>

        <!-- Favicon image -->
        <link rel="icon" href="img/Favicon/Favicon.ico" type="favicon/ico" sizes="16x16"/>
        <link rel="apple-touch-icon" sizes="57x57" href="img/Favicon/apple-icon-57x57.png"/>
        <link rel="apple-touch-icon" sizes="60x60" href="img/Favicon/apple-icon-60x60.png"/>
        <link rel="apple-touch-icon" sizes="72x72" href="img/Favicon/apple-icon-72x72.png"/>
        <link rel="apple-touch-icon" sizes="76x76" href="img/Favicon/apple-icon-76x76.png"/>
        <link rel="apple-touch-icon" sizes="114x114" href="img/Favicon/apple-icon-114x114.png"/>
        <link rel="apple-touch-icon" sizes="120x120" href="img/Favicon/apple-icon-120x120.png"/>
        <link rel="apple-touch-icon" sizes="144x144" href="img/Favicon/apple-icon-144x144.png"/>
        <link rel="apple-touch-icon" sizes="152x152" href="img/Favicon/apple-icon-152x152.png"/>
        <link rel="apple-touch-icon" sizes="180x180" href="img/Favicon/apple-icon-180x180.png"/>
        <link rel="icon" type="image/png" sizes="192x192"  href="img/Favicon/android-icon-192x192.png"/>
        <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon/favicon-32x32.png"/>
        <link rel="icon" type="image/png" sizes="96x96" href="img/Favicon/favicon-96x96.png"/>
        <link rel="icon" type="image/png" sizes="16x16" href="img/Favicon/favicon-16x16.png"/>
        <link rel="manifest" href="img/Favicon/manifest.json"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="msapplication-TileImage" content="img/Favicon/ms-icon-144x144.png"/>
        <meta name="theme-color" content="#ffffff"/>  
    
		<meta charset= "utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>         
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css?v=6"></link>

	</head>
	  <body>
		  <header class="clearfix nav-colour">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#333740;">
          <img src="img/Logo.jpg" alt="Logo" width="130" height="75"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <?php

           include("database/config.php"); // Include database connections
           
           if(!isset($_COOKIE['user'])) {
        ?>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about_us.php">About Us</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="Contact_us.php">Contact</a>
              </li>
            </ul>
              <button type="button" class="btn "><a href="login.php" class="topnav-right" style="text-decoration:none; color: #fff; ">Log in/Sign up</a></button>
          </div>
            
        <?php    
        }else{
             $query5 = "SELECT * FROM user_tb";
             $result5 = mysqli_query($dbc, $query5);

             while($row5 = mysqli_fetch_assoc($result5)) {
                if($_COOKIE['user'] == $row5["User_id"]){
                    $UserAvatar = $row5["UserAvatar"];
                }
             }
  
         ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about_us.php">About Us</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="Contact_us.php">Contact</a>
              </li>
            </ul>
          </div>
            <div class="ml-auto">
                <ul style="list-style: none;">
                    <li class="nav-item active dropdown" class="ml-auto">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" >
                      
                      <img src="<?php echo $UserAvatar ?>" class="avatarImage">Account</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="display_wishlist.php">Wishlist</a>
                            <a class="dropdown-item" href="User_Account.php">Account</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                      </div>
                    </li>
                </ul>
            </div>
         <?php    
        }
         ?>
        </nav>
      </header>
        