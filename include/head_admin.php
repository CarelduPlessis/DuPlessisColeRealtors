<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- Favicon image -->
        <link rel="icon" href="../img/Favicon/Favicon.ico" type="favicon/ico" sizes="16x16">
        
        <!-- Bootstrap file customization -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

        <!-- CSS file -->
        <link href="../css/style.css?v=4" rel="stylesheet" type="text/css">

        <link rel="apple-touch-icon" sizes="57x57" href="../img/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../img/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../img/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../img/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../img/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../img/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../img/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../img/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../img/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../img/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../img/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../img/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../img/Favicon/favicon-16x16.png">
        <link rel="manifest" href="../img/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../img/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">  
        <meta charset= "utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	  <body>
      <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
      </style>
   
		  <header class="clearfix nav-colour">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#333740;">
          <img src="../img/Logo.jpg" alt="Logo" width="130" height="75"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto" >
                <li class="nav-item active">
                  <a class="nav-link" href="display_properties.php">Manage Properties</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="">Manage Agents</a>
                </li>
              </ul>
            </div>
          
            <!-- Dropdown for admin showing account image and log out button -->
            <div class="ml-auto">
                  <ul style="list-style: none;">
                      <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" >
                        <img src="../img/avatar/default-avatar2.png" style="border-radius:50%; width:60px; height:60px; padding:5px;">Account</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Log out</a> <!-- Logs admin out --> 
                        </div>
                      </li>
                  </ul>
              </div>
        </nav>
      </header>
      
</body>