
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    

    <style>
       /*bootstrap styling starts*/
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /*bootstrap styling ends*/
      
      .login_body {
        background: #333740;
        font-family: Arial, Helvetica, sans-serif;
      }
      
      .form-signin {
        background: white;
      }

    </style>
    <!-- My styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/SignUp.css" rel="stylesheet">
        
    <!-- Favicon image -->
    <link rel="icon" href="img/Favicon/Favicon.ico" type="favicon/ico" sizes="16x16">
        <link rel="apple-touch-icon" sizes="57x57" href="img/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/Favicon/favicon-16x16.png">
        <link rel="manifest" href="img/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="img/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">  

    <?php 
        // This script logs a user in by check the stored values in table.

        include("database/config.php"); //Include database connections
         
        // variable declaration
        $cookie_name = "user"; // cookie name
        
            // if form is Posted then run code below
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Handle the form. //Check whether the form has been submitted:
               // if(!empty($_REQUEST['Login'])){

                    // if Login button is clicked then run code below
                    if (isset($_POST['Login'])) {   //To find out wich button is clicked on https://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit
                       
                        $validate_Input = FALSE; //Not currently logged in. //Create a dummy variable to use as a flag: 

                        $boolean = "TRUE"; // update user logged in state on the database 

                        //$pass = mysqli_real_escape_string($dbc,trim(strip_tags(md5($_POST['Password']))));
                        $salt = "8(b1a9N#N953c%461T1##296a8G27abf8c$4780L4d7@d41d8cVd!98f00b204e)980&09^B98**ecf8427e!";
                        $pass = mysqli_real_escape_string($dbc,trim(strip_tags(md5($salt.$_POST['Password']))));
                        $query = "SELECT * FROM user_tb WHERE UserPassword = '$pass'";
                      
                        if($r = mysqli_query($dbc, $query)){ // Run the Query.                                                                                     
                            // Retrieve and print every record:                                                                                                                                     
                            while($row = mysqli_fetch_array($r)){ // sort query in rows                                                                                       

                                // if User input for User Name and passowrd Exists in the table then run code 
                               if ($_POST['User_Name'] == $row['UserName'] AND $pass == $row['UserPassword']){

                                    $validate_Input = TRUE; // Correct username/password combination.

                                    // build update query 
                                    $Update_query = "UPDATE user_tb SET IsUser_loggedIn='$boolean' WHERE UserName='{$row['UserName']}'";

                                // Stop looping
                                break;

                                }else if($_POST['User_Name'] == $row['UserEmail'] AND $pass == $row['UserPassword']){ // other wise if User input for User Email and passowrd Exists in the table then run code  

                                    $validate_Input = TRUE; // Correct username/password combination.
                                    
                                    // build update query 
                                    $Update_query = "UPDATE user_tb SET IsUser_loggedIn='$boolean' WHERE UserEmail='{$row['UserEmail']}'";

                                    // Stop looping 
                                    break;
                                }
                            }// end of while loop
                        } else { // Query didn't run.
                             echo '<script type="text/javascript">';
                             echo 'console.log("Could not retrieve the data because:"<br />' . mysqli_error($dbc) . " The query being run was:" . $query . ')'; 
                             echo '</script>';
                        } // End of query IF.
                        
                        // if user input is valid / exists and user is not logged in then run code below 
                        if ($validate_Input == "TRUE" && $row['IsUser_loggedIn'] != "TRUE"){
                           
                            mysqli_query($dbc, $Update_query);  // Run Query
                            
                            setcookie($cookie_name,$row['User_id'], time()+10000000, "/"); // create cookie

                            header('Location: index.php'); //Go to home/index page
                            
                        }else if($validate_Input == "TRUE" && $row['IsUser_loggedIn'] == "TRUE"){ // other wise if user input is valid / exists but user is logged in then run code below 
                            //display warning message 
                            echo '<script type="text/javascript">';
                            echo ' alert("You are already logged in")'; 
                            echo '</script>';
                        }else{ // other wise run code below
                            //display warning message 
                            echo '<script type="text/javascript">';
                            echo ' alert("Your entry does not exist: Please Check your Username or Email and Password")'; 
                            echo '</script>';
                        }
                    }    
    
            } // End of submission IF.
            mysqli_close($dbc); // Close the connection
    ?>
  </head>
    <body class="text-center login_body">
        
        <!--Login Form-->
        <form method="post" class="form-signin">
            <img class="mb-4" src="img/avatar/default-avatar2.png" alt="default user avatar" width="100" height="100" style="border-radius: 50%;">
            <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
            
            <label for="User_Name" class="sr-only">User Name or Email</label>
            <input type="text" id="User_Name" name="User_Name" class="form-control" placeholder="User Name or Email" required autofocus>
            
            <label for="Password" class="sr-only">Password</label>
            <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
            
            <div class="checkbox mb-3">
              <label>
                  <a href="Forgot_Account_Details.php" style="color:#333740">Forgot your password?</a>
              </label>
            </div>
            
            <input class="btn btn-lg btn-block" style="background-color:#333740; color:white" type="submit" id="Login" value="Login" name="Login" >
             <br>
             <input class="btn btn-lg btn-block" style="background-color:#333740; color:white" type="button" onclick="location.href='SignUp.php';" value="Sign Up" />
             <br>
             <a href="index.php" style="color:#333740">Go Back</a>
             
            <p class="mt-5 mb-3 text-muted">&copy; Du Plessis Cole Realtors &middot; 2019</p>
        </form><!-- End of Login form -->
    </body>
</html>
