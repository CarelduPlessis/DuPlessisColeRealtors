<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Admin Account</title>

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
      /*bootstrap styling starts*/
      /*
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
      }*/
      /*bootstrap styling ends*/
    </style>

    
    <!-- My styles for this template -->
    <link href="../css/stylesheet.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/SignUp.css" rel="stylesheet">
    
  </head>
    <body class="text-center">
         <?php 
            include("../database/config.php");  //Include database connections
            
            if(!isset($_COOKIE['admin'])){
                header('Location: index.php'); //Go to home/index page
            }
         
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Handle the form. 
                          
                if (isset($_POST['updateAccount'])) { 
                    $adminExists = FALSE; // does the user exists in the table 

                    $Admin_Name = $_POST['Admin_Name']; // get User Name from the form using the POST method and then store it in variable called $User_Name

                    $Password = $_POST['Password']; // get password from the form using the POST method and then store it in variable called $Password  

                    $Email = $_POST['Email']; // get email from the form using the POST method and then store it in variable called $Email 

                    $UserAvatar = "../img/avatar/default-avatar2.png"; // default Avatar

                    $IsAdmin_loggedIn = "TRUE"; // is the user logged in

                    $dir = "../img/avatar/admin/"; // file directory to store images

                    $entryExists = FALSE; // does the input value match any of the values in the database

                    $query = 'SELECT * FROM admin_tb ORDER BY Admin_id ASC'; // build query // Select all user from the table

                    //Display colum name for each row that i have hard coded $row['colum name']                                                                 
                    if($r = mysqli_query($dbc, $query)){ // Run the Query.                                                                                     
                        // Retrieve and print every record:                                                                                                                                     
                        while($row = mysqli_fetch_array($r)){ // sort query in rows    
                            // check if user Exists
                            if (($row['AdminName'] == $_POST['Admin_Name_Old']) AND ($row['AdminPassword'] == md5(trim($_POST['Password_Old']))) AND ($row['AdminEmail'] == $_POST["Email_Old"])){

                                $adminExists = TRUE; // Correct username/password combination.

                                $adminID = $row['Admin_id']; // get id from database

                                // Stop looping through the file:
                               // break;
                            }
                            
                            //new User Name can't Exist in the database (excluding himself)
                            if(($row['Admin_id'] != $_COOKIE['admin']) AND ($row['AdminName'] == $_POST['Admin_Name'])){
                                $entryExists = TRUE;
                            } 
                            
                            //new Password can't Exist in the database (excluding himself)
                            if(($row['Admin_id'] != $_COOKIE['admin']) AND ($row['AdminPassword'] == md5(trim($_POST['Password'])))){
                                $entryExists = TRUE;
                            }
                            
                            //new UserEmail can't Exist in the database (excluding himself)
                            if(($row['Admin_id'] != $_COOKIE['admin'])  AND ($row['AdminEmail'] == $_POST["Email"])){
                                $entryExists = TRUE;
                            }
                            
                        }
                    } else { // Query didn't run.
                              print '<p style="color: red;">Could not retrieve the data because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                    } // End of query IF.
                    
                   

                    if($adminExists == TRUE && $entryExists == FALSE){ // If the user does Exists and his new details don't Exist then update user

                        $Pass = md5($Password); // hash password
                        
                        // upload a image to a server and Update user details including Avatar(image)

                        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                           
                            //allowed image types to upload
                            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            
                            //file name, file type and file size is stored for later use 
                            $filename = $_FILES["photo"]["name"];
                            $filetype = $_FILES["photo"]["type"];
                            $filesize = $_FILES["photo"]["size"];

                            // Verify file extension
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                            // Verify file size - 5MB maximum
                            $maxsize = 5 * 1024 * 1024;
                            if($filesize > $maxsize){ 
                                    die("Error: File size is larger than the allowed limit.");
                            }

                           // Verify MYME type of the file
                            if(in_array($filetype, $allowed)){
                                
                                // Check whether file exists before uploading it
                                if(file_exists($dir . $filename)){
                                    //if file exists then don't upload image to server and Update user details including Avatar file path (image)
                                    
                                    // Get image name
                                    $image = $_FILES['photo']['name'];
                                    
                                    // image file directory
                                    $UserAvatar = $dir.basename($image);
                                    
                                    //build quary
                                    $query_UPDATE = "UPDATE admin_tb SET AdminName='$Admin_Name',AdminPassword='$Pass',AdminEmail='$Email',AdminAvatar='$AdminAvatar',IsAdmin_loggedIn='$IsAdmin_loggedIn' WHERE Admin_id=$adminID";
                                    
                                    // Execute the query:
                                    if(@mysqli_query($dbc, $query_UPDATE)){
                                        echo '<script type="text/javascript">';
                                            echo ' alert("Successful Profile Update!")'; 
                                        echo '</script>';
                                        
                                    } else{
                                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query .'</p>';
                                    }

                                }else{
                                    if($_FILES["photo"]["error"] > 0){
                                        echo "Error: " . $_FILES["photo"]["error"] . "<br>";
                                    } else{
                                          
                                              //upload file path to database
                                              //https://www.tutorialrepublic.com/php-tutorial/php-file-upload.php
                                              //https://codewithawa.com/posts/image-upload-using-php-and-mysql-database
                                              //https://www.w3schools.com/php/php_file_upload.asp
                                              //https://www.lionblogger.com/how-to-upload-file-to-server-using-php-save-the-path-in-mysql/
                                              //
                                              // Get image name
                                              $image = $_FILES['photo']['name'];

                                              // image file directory
                                              $UserAvatar = $dir.basename($image);

                                              //build query
                                              $query_UPDATE = "UPDATE admin_tb SET AdminName='$Admin_Name',AdminPassword='$Pass',AdminEmail='$Email',AdminAvatar='$AdminAvatar',IsAdmin_loggedIn='$IsAdmin_loggedIn' WHERE Admin_id=$adminID";
                                                 
                                            // Execute the query:
                                        if(@mysqli_query($dbc, $query_UPDATE)){
                                            echo '<script type="text/javascript">';
                                                echo ' alert("Successful Profile Update!")'; 
                                            echo '</script>';

                                            //move file to server 
                                            move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $filename);

                                        } else{
                                            print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query .'</p>';
                                        }
                                    }
                                } 
                            } else{
                               echo "Error: There was a problem uploading your file. Please try again.";          
                            } 
                        }else{
                                echo "Error: " . $_FILES["photo"]["error"]; 
                        }

                    }else{
                        echo '<script type="text/javascript">';
                            echo ' alert("The new details are taken or We can not find your current details")'; 
                        echo '</script>';
                    }
                                  /*
                                   * https://stackoverflow.com/questions/16319306/how-to-check-whether-mysqli-connection-is-open-before-closing-it/19188412
                                 
                                  */
                }       // No problem!
            } // End of submission IF.  

           mysqli_close($dbc); // Close the connection   
  
        ?>
        <form name="Account" id="Account_Form" method="post" enctype="multipart/form-data" class="form-signin">
 
                    <h1 class="h3 mb-3 font-weight-normal">Update Profile</h1>
                    
                    <label for="fileSelect">Filename:</label>
                    <input type="file" name="photo" id="fileSelect">
                    <br>
                    <br>
                    <label for="Admin_Name_Old" class="sr-only">Current User Name </label>
                    <input type="text" id="Admin_Name_Old" name="Admin_Name_Old" class="form-control" placeholder="Enter in your current User Name" required autofocus>

                    <label for="Email_Old" class="sr-only">Current Email address </label>
                    <input type="email" id="Email_Old" name="Email_Old" class="form-control" placeholder="Enter in your current Email address" required>

                    <label for="Password_Old" class="sr-only">Current Password </label>
                    <input type="password" id="Password_Old" name="Password_Old" class="form-control" placeholder="Enter in your current password" required>
                    
                    <label for="Admin_Name" class="sr-only">New User Name </label>
                    <input type="text" id="Admin_Name" name="Admin_Name" class="form-control" placeholder="Enter in your New User Name" required autofocus>

                    <label for="Email" class="sr-only">New Email address</label>
                    <input type="email" id="Email" name="Email" class="form-control" placeholder="Enter in your New Email address" required>

                    <label for="Password" class="sr-only">New Password</label>
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="Enter in your New password" required>

                    <label for="Confirm_Password" class="sr-only">Confirm Password</label>
                    <input type="password" id="Confirm_Password" name="Confirm_Password" class="form-control" placeholder="Confirm your New password" required>

                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="updateAccount" value="Update Profile" name="updateAccount" > 
                    <br>
                    <a href="../admin/CRUD_Properties/display_properties.php">Go Back</a>
 
            <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        </form>
        <script src="JavaScript/warning.js"></script>
        <script>
            
            // if form is submited then validate the form
            var Account = document.getElementById('updateAccount');
           
            Account.addEventListener('click', validation_SignUpForm, false);
            
            //validate function
            function validation_SignUpForm(event){
               
                var AdminName = document.getElementById('Admin_Name'); // get User Name value by id and store value in variable
              
                if(UserName.value == "undefined" || UserName.value == null || UserName.value == ""){ // check if User Name field is empty. if empty then stop posting form and send user a warning message
                    displayWarning("Entering an User Name is necessary!", UserName);
                    event.preventDefault();
                    return false;
                }
  
                var Email = document.getElementById('Email');// get Email value by id and store value in variable
                if (Email.value == "") { // check if Email field is empty. if empty then stop posting form and send user a warning message
                        displayWarning('Entering an Email address is necessary!', Email);
                        event.preventDefault();
                        return false;
                    } else if (Email.validity.typeMismatch) { // check if Email formate is valid. if not then stop posting form and send user a warning message
                        displayWarning('Please enter an Email address which is valid!', Email);
                        event.preventDefault();
                        return false;
                }
                
                
                var Password = document.getElementById('Password');// get Password value from Password field by id
                
                var Password_value = Password.value; // store Password value in a variable
                
                var Confirm_Password = document.getElementById('Confirm_Password'); // get Confirm Password value from Confirm Password field by id
                
                var ConfirmPassword_value = Confirm_Password.value; // store Confirm Password value in a variable
                
                //Declare variables to Test user password entery 
                var isNumber = /[0-9]/g; // Numbers test
                
                var isletter = /[a-z]/g; // Normal letters test
                
                var isCapletter = /[A-Z]/g; // upper-case letter test
                
                if(Password_value==""){ // if password is empty then stop the form from posting and send user a warning message 
                    displayWarning("Plese Enter Your Password", Password);
                    event.preventDefault();
                    return false;
                } 
                
                if(!isNumber.test(Password_value)){// if password have no numbers then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one number", Password);
                    event.preventDefault();
                    return false; 
                }
                
                if(!isletter.test(Password_value)){// if password  have no letters then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one letter", Password);
                    event.preventDefault();
                    return false;
                } 
                    
                if(!isCapletter.test(Password_value)){ // if password  have no Capletter then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one upper case letter", Password);
                    event.preventDefault();
                    return false;   
                }
                
                if(Password_value.length < 8){// if password  length is not longer then 8 then stop the form from posting and send user a warning message
                    displayWarning("Your Password must have eight characters", Password);
                    event.preventDefault();
                    return false;
                }
                    
                if(ConfirmPassword_value==""){// if the Confirm Password is empty then stop the form from posting and send user a warning message 
                    displayWarning("Plese Enter Confirm Password", Confirm_Password);
                    event.preventDefault();
                    return false;
                }
                
                if (Password_value!=ConfirmPassword_value){// if the Confirm Password is not equal to Password then stop the form from posting and send user a warning message 
                    displayWarning("Confirm Password does not matched", Confirm_Password);
                    event.preventDefault();
                    return false;  
                }    
               return true;
            }
        </script>
    </body>
</html>