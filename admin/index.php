
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <!-- Favicon image -->
    <link rel="icon" href="../img/Favicon/Favicon.ico" type="favicon/ico" sizes="16x16">
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

    <style>
      
      .login_body {
        background: #333740;
      }

      .form-signin {
        background: white;
      }
    </style>
    <!-- My styles for this template -->
    <link href="../css/stylesheet.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/SignUp.css" rel="stylesheet">
    
    <?php 
        // This script logs admin user in by checking stored values in admin_tb.
        include("../database/config.php"); //Include database connections
         
        // variable declaration
        $cookie_name = "admin"; // cookie name
       
        
            // if form is Posted then run code below
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Handle the form. //Check whether the form has been submitted:
               // if(!empty($_REQUEST['Login'])){

                    // if Login button is clicked then run code below
                    if (isset($_POST['Login'])) {   //To find out which button is clicked on https://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit
                       
                        $validate_Input = FALSE; //Not currently logged in. //Create a dummy variable to use as a flag: 

                        $boolean = "TRUE"; // update user logged in state on the database 
 
                        $adminID = "";

                        $IsAdmin_loggedIn = "";
                        $salt = "8(b1a9N#N953c%461T1##296a8G27abf8c$4780L4d7@d41d8cVd!98f00b204e)980&09^B98**ecf8427e!";
                        $pass = mysqli_real_escape_string($dbc,trim(strip_tags(md5($salt.$_POST['Password']))));
                        $query = "SELECT * FROM admin_tb WHERE AdminPassword = '$pass'";
                         //echo "{$_POST['password']}";
                        if($r = mysqli_query($dbc, $query)){ // Run the Query.                                                                                     
                            // Retrieve and print every record:                                                                                                                                     
                            while($row = mysqli_fetch_array($r)){ // sort query in rows admin_Email"]){

                                //echo "{$row['Account_IS_Admin']}";
                                
                               //$Email = $row['AdminEmail']; // get email from the database 
                                
                                // admin can log in with either their email or admin name with their password 
                                
                                // if admin inputs User Name and passoword and Exists in the admin table then run code 
                               if ($_POST['User_Name'] == $row['AdminName'] AND $pass == $row['AdminPassword']){
                                   
                                    $validate_Input = TRUE; // Correct username/password combination.
                                    
                                    $adminID = $row['Admin_id'];
                                    
                                    $IsAdmin_loggedIn = $row['IsAdmin_loggedIn'];

                                    // build update query 
                                    $Update_query = "UPDATE admin_tb SET IsAdmin_loggedIn='$boolean' WHERE AdminName='{$row['AdminName']}'";
                                   
                                // Stop looping
                                break;

                                // if Admin inputs User Email and passoword Exists in admin table then run code 
                                }else if($_POST['User_Name'] == $row['AdminEmail'] AND $pass == $row['AdminPassword']){ 

                                    $validate_Input = TRUE; // Correct username/email combination.
                                    
                                    $adminID = $row['Admin_id'];
                                    
                                    $IsAdmin_loggedIn = $row['IsAdmin_loggedIn'];
                                    // build update query 
                                    $Update_query = "UPDATE admin_tb SET IsAdmin_loggedIn='$boolean' WHERE AdminEmail='{$row['AdminEmail']}'";
                                 
                                    // Stop looping 
                                    break;
                                }
                            }// end of while loop
                        } else { // Query didn't run.
                             echo '<script type="text/javascript">';
                             echo 'console.log("Could not retrieve the data because:"<br />' . mysqli_error($dbc) . " The query being run was:" . $query . ')'; 
                             echo '</script>';
                        } // End of query IF.
                        
                        echo '<script type="text/javascript">';
                                    echo 'console.log('."hello End of query IF".')'; 
                                    echo '</script>';
                        
                        // if admin input is valid / exists and user is not logged in then run code below 
                        if ($validate_Input == "TRUE" && $IsAdmin_loggedIn != "TRUE"){
                           
                            
                            if(@mysqli_query($dbc, $Update_query)){
                                print '<p>Login!</p>'; // display message
                                //header('Location: display_properties.php'); //Go to display_properties page
                            } else{
                                // display message
                                print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $Update_query .'</p>';
                            }
                            
                            //mysqli_query($dbc, $Update_query);  // Run Query

                            setcookie($cookie_name,$adminID, time()+10000000, "/"); // create cookie
                            
                            
                            // 'Force' the cookie to exists
                            $_COOKIE['admin'] = $adminID;

                            header('Location: ../admin/CRUD_Properties/display_properties.php'); //Go to home/index page
                            
                        }else if($validate_Input == "TRUE" && $IsAdmin_loggedIn == "TRUE"){ // otherwise if user input is valid / exists but user is logged in then run code below 
                            //display warning message 
                            echo '<script type="text/javascript">';
                            echo ' alert("You are already logged in")'; 
                            echo '</script>';
                        }else{ // if admin username/email or password is incorrect run code below
                            //display warning message incorrect combination
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
        
        <!-- Login Form -->
        <form method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Admin</h1>
            <img class="mb-4" src="../img/avatar/default-avatar2.png" alt="" width="100" height="100" style="border-radius: 50%;">
            <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
            <br>
            <label for="User_Name" class="sr-only">User Name or Email</label>
            <input type="text" id="User_Name" name="User_Name" class="form-control" placeholder="User Name or Email" required autofocus>
            <label for="Password" class="sr-only">Password</label>
            <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
            <br>
              <input class="btn btn-lg btn-block" style="background-color:#333740; color:white" type="submit" id="Login" value="Login" name="Login" >
            <br>
              <a href="index.php" style="color:#333740">Go Back</a>
              <p class="mt-5 mb-3 text-muted">&copy; Du Plessis Cole Realtors &middot; 2019</p>
        </form>
    </body>
</html>
