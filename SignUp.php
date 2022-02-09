
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Sign Up</title>

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
       
      .signup_body {
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
    
  </head>
    <body class="text-center signup_body">
         <?php 
            include("database/config.php");  //Include database connections

            if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Handle the form. 

              $userExists = FALSE; // does the user exists in the table 

              $User_Name = $_POST['User_Name']; // get User Name from the form using the POST method and then store it in variable called $User_Name
   
              $Password = $_POST['Password']; // get password from the form using the POST method and then store it in variable called $Password  
              
              $Email = $_POST['Email']; // get email from the form using the POST method and then store it in variable called $Email 
              
              $UserAvatar = "img/avatar/default-avatar2.png"; // no user avatar is chosen the a default image will be used.
              
              $IsUser_loggedIn = "FALSE"; // logged in state of users 
              
              //build query to find all user in the database table
              $query = 'SELECT * FROM user_tb ORDER BY User_id ASC';

            //Display colum name for each row that i have hard coded $row['colum name']                                                                 
                if($r = mysqli_query($dbc, $query)){ // Run the Query.                                                                                     
                    // Retrieve and print every record:                                                                                                                                     
                    while($row = mysqli_fetch_array($r)){ // sort query in rows                                                                                        
                        if (($row['UserName'] == $_POST['User_Name']) AND ($row['UserPassword'] == md5(trim($_POST['Password']))) AND ($row['UserEmail'] == $_POST["Email"])){

                            $userExists = TRUE; // Correct username/password combination.

                            // Stop looping through the file:
                            break;

                        } // End of IF.          
                    }
                } else { // Query didn't run.
                    print '<p style="color: red;">Could not retrieve the data because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                } // End of query IF.

                if($userExists == FALSE){ // If the user doesn't Exists then Sign Up user
                  
                   //$Pass = md5($Password); // hash password

                   //Salt and hash the password
                   $salt = "8(b1a9N#N953c%461T1##296a8G27abf8c$4780L4d7@d41d8cVd!98f00b204e)980&09^B98**ecf8427e!";
                   $Pass = md5($salt.$Password);
                   $query_INSERT = "INSERT INTO user_tb(UserName,UserPassword,UserEmail,UserAvatar,IsUser_loggedIn) VALUES('$User_Name','$Pass','$Email','$UserAvatar','$IsUser_loggedIn')";     

                    // Execute the query:
                    if(@mysqli_query($dbc, $query_INSERT)){
                       // print '<p>Successful Registering!</p>';
                       header("Location: http://localhost/Test47/login.php");
                       exit;
                    } else{
                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query .'</p>';
                    }  
                 // No problem!
                } else { // Forgot a Field.
                    echo '<script type="text/javascript">';
                        echo ' alert("Please try again!")'; 
                    echo '</script>';
                }

            } else { // Display the Form

            } // End of submission IF.  

           mysqli_close($dbc); // Close the connection   
  
        ?>
        <!--Sign up form-->
        <form name="signup" id="SignUp_Form" method="post" class="form-signin">
        <br>
                    <h1 class="h3 mb-3 font-weight-normal">Please Sign Up</h1>
                    <br>
                    <label for="User_Name" class="sr-only">User Name</label>
                    <input type="text" id="User_Name" name="User_Name" class="form-control" placeholder="User Name E.G. ben120" required autofocus>
                    <br>
                    <label for="Email" class="sr-only">Email address</label>
                    <input type="email" id="Email" name="Email" class="form-control" placeholder="Enter in your Email address" required>
                    <br>
                    <label for="Password" class="sr-only">Password</label>
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="Enter in your password" required>
                    
                    <label for="Confirm_Password" class="sr-only">Confirm Password</label>
                    <input type="password" id="Confirm_Password" name="Confirm_Password" class="form-control" placeholder="Confirm your password" required>
                    <br>
                    <input class="btn btn-lg btn-block" style="background-color:#333740; color:white" type="submit" id="SignUp" value="Sign Up" name="SignUp" > 
                    <br>
                    <a href="index.php" style="color:#333740">Go Back</a>
                    
            <p class="mt-5 mb-3 text-muted">&copy; Du Plessis Cole Realtors &middot; 2019</p>
        </form>
        <!-- 
            Include JavaScript to display the Alert for validation of the Sign up Form
        -->
        <script src="JavaScript/warning.js"></script>
        <script>
          
            /* Title: Form required attribute with a custom validation message in HTML5
            *  Author: geeksforgeeks.org
            *  Resource: https://www.geeksforgeeks.org/form-required-attribute-with-a-custom-validation-message-in-html5/
            */
               
            /*
              https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_oninput

              https://www.w3schools.com/jsref/event_onsubmit.asp

              https://www.w3schools.com/jsref/event_oninput.asp

              https://www.w3schools.com/tags/ev_oninvalid.asp

              https://www.geeksforgeeks.org/form-required-attribute-with-a-custom-validation-message-in-html5/

              https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault

              https://www.w3schools.com/js/js_htmldom_eventlistener.asp

              https://www.w3schools.com/jsref/met_document_addeventlistener.asp

              https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_node_textcontent

              https://www.w3schools.com/jsref/prop_node_textcontent.asp

              https://www.w3schools.com/html/html_form_input_types.asp

              https://javascript.info/bubbling-and-capturing
    
              https://www.w3schools.com/howto/howto_css_signup_form.asp

              https://www.w3schools.com/jsref/met_win_settimeout.asp
              
              https://stackoverflow.com/questions/37847745/using-addeventlistener-onsubmit-form
    
              https://www.w3schools.com/js/js_validation_api.asp
    
              https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
              
              https://www.w3schools.com/jsref/event_preventdefault.asp
              
              https://stackoverflow.com/questions/1551389/how-to-unbind-a-listener-that-is-calling-event-preventdefault-using-jquery
    
              https://stackoverflow.com/questions/1489817/jquery-liveclick-firing-for-right-click/1673570#1673570
    
              https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement/invalid_event
    
              https://www.w3schools.com/jsref/met_document_addeventlistener.asp
    
              https://www.w3schools.com/js/js_validation.asp
    
              https://getbootstrap.com/docs/4.3/examples/sign-in/
    
              https://www.w3schools.com/jsref/jsref_regexp_not_0-9.asp
    
              https://www.w3resource.com/javascript/object-property-method/regexp-test.php
    
              https://www.the-art-of-web.com/javascript/validate-password/
    
              https://www.w3schools.com/jsref/jsref_match.asp
    
              https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/match
    
              https://www.geeksforgeeks.org/validate-a-password-using-html-and-javascript/
    
              https://www.youtube.com/watch?v=pwBRppW8WHM
    
              https://stackoverflow.com/questions/3937513/javascript-validation-for-empty-input-field
    
            */
            
            var SignUp = document.getElementById('SignUp'); // get Sign Up button by id 
           
            SignUp.addEventListener('click', validation_SignUpForm, false); // check if Sign Up button is clicked. if clicked then call validation_SignUpForm function
          
            function validation_SignUpForm(event){
               
                var UserName = document.getElementById('User_Name'); // get User Name value by id and store value in variable
              
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
                    } else if (Email.validity.typeMismatch) {  // check if Email formate is valid. if not then stop posting form and send user a warning message
                        displayWarning('Please enter an Email address which is valid!', Email);
                        event.preventDefault();
                        return false;
                }
                
                
                var Password = document.getElementById('Password'); // get Password value from Password field by id
                
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
                
                if(!isNumber.test(Password_value)){// if password doesn't have numbers then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one number", Password);
                    event.preventDefault();
                    return false; 
                }
                
                if(!isletter.test(Password_value)){ // if password doesn't have letters then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one letter", Password);
                    event.preventDefault();
                    return false;
                } 
                    
                if(!isCapletter.test(Password_value)){ // if password doesn't have Capletter then stop the form from posting and send user a warning message 
                    displayWarning("Your password must at least have one upper case letter", Password);
                    event.preventDefault();
                    return false;   
                }

                isSpecialCharecter(); // if the password doesn't have Special Charecter then stop the form from posting and send user a warning message 

                if(Password_value.length < 8){ // if password  length is not longer then 8 then stop the form from posting and send user a warning message 
                    displayWarning("Your Password must have eight characters", Password);
                    event.preventDefault();
                    return false;
                }
                    
                if(ConfirmPassword_value==""){ // if the Confirm Password is empty then stop the form from posting and send user a warning message 
                    displayWarning("Plese Enter Confirm Password", Confirm_Password);
                    event.preventDefault();
                    return false;
                }
                
                if (Password_value!=ConfirmPassword_value){ // if the Confirm Password is not equal to Password then stop the form from posting and send user a warning message 
                    displayWarning("Confirm Password does not matched", Confirm_Password);
                    event.preventDefault();
                    return false;  
                }    
               return true;
            }

            function CheckForSpecialCharecter(data) { // Check For Special Charecters in Passwords
 	            var iChars = "!`@#$%^&*()+=-[]\\\';,./{}|\":<>?~_";
                for (var i = 0; i < data.length; i++)
                { 
                    if(iChars.indexOf(data.charAt(i)) >= 0)
                    {
                        return true; 
                    }
                }
            }

            function isSpecialCharecter(){ // if the password doesn't have Special Charecter then stop the form from posting and send user a warning message 
                if(CheckForSpecialCharecter(Password_value) == null){
                    displayWarning("Password must contain special characters ", Password);
                    event.preventDefault();
                    return false;  
                }
            }
 
        </script>
         
    </body>
</html>


