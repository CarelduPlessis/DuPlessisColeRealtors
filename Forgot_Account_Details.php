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
    <link href="css/bootstrap.css" rel="stylesheet">
    
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
      }

      .form-signin {
        background: white;
      }
    </style>
    <!-- My styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/SignUp.css" rel="stylesheet">
    
    <?php
 include("database/config.php");  //Include database connections
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Check for Post

    if (isset($_POST['Submit'])) { // if the button called Submit is clicked then run code below 
        
        //Define quary 
         $query = "SELECT * FROM user_tb WHERE UserEmail='{$_POST['Email']}'";

        // Run quary 
        if($r = mysqli_query($dbc, $query)){                                                                                     
            // sort query in rows                                                                                                                                      
            while($row = mysqli_fetch_array($r)){  

                //Search for email match in database 
                if($_POST['Email'] == $row['UserEmail']){
                    // Email details 

                    $Account_Name = $row['UserName']; // get user name form database 
                    $Password = $row['UserPassword']; // get password form database

                    
                    $to = $_POST['Email']; //send to users
                    $subject = "Forgot Account Detials"; // subject of the email
                    $message = "Your username".$Account_Name. "New Password". $Password; // email message
                    $From = 'From: DuPlessisColeRealators.Hamilton@gmail.com'; // who sent the email

                    //correctly formatted the clients Email address.
                    $clients_Email =  'MIME-Version: 1.0' . "\r\n"; 
                    $clients_Email .= 'From: Your name <info@address.com>' . "\r\n";
                    $clients_Email .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                    //https://www.w3schools.com/php/func_mail_mail.asp

                    mail($to, $subject, $message, $From);// send email

                    $Password1 = md5($Password); // Rehash password
                    $Update_query = "UPDATE user_tb SET UserPassword='$Password1' WHERE UserEmail='{$_POST['Email']}'"; // build query
                    mysqli_query($dbc, $Update_query); // run query

                    //Print a message:
                    print "<p>The email has been sent with the username and password</p>";


                }else{ // if no results are found print error message
                   print '<p style="color: red;">Email address does not exists</p>';
                }
            } 
        
        } else{ // Query didn't run. // if there is a database connection problem print error message
            print '<p style="color: red;">Could not retrieve the data because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }
    }
}// End of query IF.
   
?>
  </head>
    <body class="text-center login_body">
        <!--Forgot your password Form-->
        <form method="post" class="form-signin">
            <img class="mb-4" src="img/avatar/default-avatar2.png" alt="" width="100" height="100" style="border-radius: 50%;">
            <h1 class="h3 mb-3 font-weight-normal">Forgot your password</h1>
            <br>
            <label for="email">Email</label>
            <input type="text" name="Email" size="25" placeholder="Email Address">
            <br><br>
             <input class="btn btn-lg btn-block" style="background-color:#333740; color:white" type="submit" id="Submit" value="Submit" name="Submit" >
             <br>
             <a href="index.php" style="color:#333740">Go Back</a>
             
            <p class="mt-5 mb-3 text-muted">&copy; Du Plessis Cole Realtors &middot; 2019</p>
        </form>
</body>
</html>