<!-- header -->
<?php 
$page_title = "Contact us";
include 'include/head.php'; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Contact us</title>

   

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css"  rel="stylesheet" >
    
    <!-- My styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">

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
      
    *{
        box-sizing: border-box;
    }

    body { /*The font family used in the website*/
      font-family: Arial, Helvetica, sans-serif;
    }
 
    /* Style inputs */
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    /* Style the container/contact section */
    .contactUs-container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 10px;
    }

    /* Create two columns that float next to eachother */
    .contactUs-column {
      float: left;
      width: 50%;
      margin-top: 6px;
      padding: 20px;
    }

    /* Clear floats after the columns */
    .contactUs-row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .contactUs-column, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    
    .banner { /*styling for the banner to introduce the page*/
              max-width: 100%;
              height: auto;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="banner" src="img/banner/contact.jpg" alt="image banner: handing over the house keys to the new house owner">
          </div>
      </div>
    </div>
 <!--
 https://www.w3schools.com/howto/howto_css_contact_section.asp
 -->   
    <div class="contactUs-container">
        <div style="text-align:center">
            <h2>Contact Us</h2>
            <p>Feel free to contact us at any time:</p>
        </div>
        <div class="contactUs-row">
            <div class="contactUs-column">
                <!--the contact us form-->
                <h4><strong>Open hours</strong></h4>
                <p><strong>Monday - Friday:</strong> 8:00am - 5:00pm</p>
                <p><strong>Email:</strong> DuPlessisColeRealators@gmail.co.nz</p>
                <p><strong>Phone:</strong> (07) 563 8289</p>
                <p><strong>Address:</strong> 21 Ruakura Rd, Hamilton East, Hamilton 3210</p>
                
                <div ><image src="img/images/contact.jpeg" alt="house with a big garage" class="card-img"></div>
            </div>
            
            
            <?php 
            include("database/config.php"); //Include database connections
                if($_SERVER['REQUEST_METHOD'] == 'POST'){ // when the form is posted then run code below
                    ///Get the values from the $_POST array:

                    $to = 'carel940@gmail.com'; // Send message to admin
                    
                    // get client input from the form
                    $first_name = trim($_POST['firstname']); // get client first name
                    $last_name = trim($_POST['lastname']); // get client last name
                    $clients_Email = $_POST['email']; // get client email

                    $topic = $_POST['subject']; // get the subject 
                    $message = trim(nl2br($_POST['message'])); // get client message
                   
                    // Create a full name variable:
                    $name = $first_name . '' . $last_name;

                   // Adjust for HTML tags:
                    $html_post = htmlentities($_POST['posting']);
                    $strip_post = strip_tags($_POST['posting']);

                    //Get a word count:
                    $words = str_word_count($posting); 

                    // Replace bad/swear words with XXXXX
                    $posting = str_ireplace('shit','XXXXX',$message);
                    $posting = str_ireplace('fuck','XXXXX',$message);
                    $posting = str_ireplace('damn','XXXXX',$message);
                    $posting = str_ireplace('bitch','XXXXX',$message);
                    $posting = str_ireplace('crap','XXXXX',$message);
                    $posting = str_ireplace('piss','XXXXX',$message);
                    $posting = str_ireplace('dick','XXXXX',$message);
                    $posting = str_ireplace('darn','XXXXX',$message);
                    $posting = str_ireplace('cock','XXXXX',$message);
                    $posting = str_ireplace('pussy','XXXXX',$message);
                    $posting = str_ireplace('asshole','XXXXX',$message);
                    $posting = str_ireplace('fag','XXXXX',$message);
                    $posting = str_ireplace('bastard','XXXXX',$message);
                    $posting = str_ireplace('slut','XXXXX',$message);
                    $posting = str_ireplace('douche','XXXXX',$message);
                    $posting = str_ireplace('nigga','XXXXX',$message);
                    $posting = str_ireplace('nigger','XXXXX',$message);
                    $posting = str_ireplace('Jesus','XXXXX',$message);
                    $posting = str_ireplace('Christ','XXXXX',$message);
                    $posting = str_ireplace('goddamn','XXXXX',$message);
                    $posting = str_ireplace('cunt','XXXXX',$message);
                    $posting = str_ireplace('twat','XXXXX',$message);
                    $posting = str_ireplace('wanker','XXXXX',$message);
                    $posting = str_ireplace('tosser','XXXXX',$message);
                    $posting = str_ireplace('Arse','XXXXX',$message);
                    $posting = str_ireplace('Prick','XXXXX',$message);



                    // use wordwrap() if lines are longer than 120 characters
                    $posting = wordwrap($posting,120);

                    //correctly formatted the clients Email address.
                    $clients_Email =  'MIME-Version: 1.0' . "\r\n"; 
                    $clients_Email .= 'From: Your name <info@address.com>' . "\r\n";
                    $clients_Email .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 



                /*Note: on mail($to, $topic, $posting,$clients_Email);
                 * 
                 *https://stackoverflow.com/questions/4591329/failed-to-connect-to-mailserver-at-localhost-port-25-verify-your-smtp-and
                 * 
                 *https://stackoverflow.com/questions/28026932/php-warning-mail-sendmail-from-not-set-in-php-ini-or-custom-from-head
                 * 
                 * 
                 * 
                If you are running your application just on localhost and it is not yet live, I believe it is very difficult to send mail using this.

                Once you put your application online, I believe that this problem should be automatically solved. By the way,ini_set() helps you to change the values in php.ini during run time.

                This is the same question as Failed to connect to mailserver at "localhost" port 25

                also check this php mail function not working

                */


                    //https://www.w3schools.com/php/func_mail_mail.asp

                    // send email
                    //   to , subject, message, headers
                    mail($to, $topic, $posting,$clients_Email);

                    //Print a message:
                    print "<div>Thank you, $name, for your posting:
                    <p>$posting</p>
                    <p>($words words)</p></div>";

                }//if($_SERVER['REQUEST_METHOD'] == 'POST')
                
                mysqli_close($dbc); // Close the connection

            ?>

            <!--
            Source: w3shool
            URL: https://www.w3schools.com/howto/howto_css_contact_section.asp
            -->
            <div class="contactUs-column">
                <!--part of the contact us form-->
                <form action="Contact_us.php" method="post">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="Your name..">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                  <label for="email">Email</label>
                   <br>
                  <input type="email" id="email" name="email" placeholder=" Your email">
                  <br>
                  <br>
                  <label for="subject">Subject</label>
                  <select id="subject" name="subject">
                    <option value="support">Support - Technical Issue</option>
                    <option value="proberty">Proberty</option>
                    <option value="agent">Agent</option>
                    <option value="feedback">Feedback - on Du Plessis Cole Realators</option>
                    <option value="other">Other</option>
                  </select>
                  <label for="message">Message</label>
                  <textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
                  <input type="submit" id="ContactUs" value="Contact Us" name="ContactUs" >
              </form>
            </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.468950075492!2d175.29779131523273!3d-37.77904837975862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d6d18c267f747ab%3A0x32ae8d4c80ea3728!2sVision%20College%20-%20Hamilton!5e0!3m2!1sen!2snz!4v1569139050975!5m2!1sen!2snz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    <script src="JavaScript/warning.js"></script>
    <script>
        //validate user input 
        var ContactUs = document.getElementById('ContactUs'); // get Contact Us button by id 
           
        ContactUs.addEventListener('click', validation_contactUsForm, false); // check if Sign Up button is clicked. if clicked then call validation_SignUpForm function
        
        function validation_contactUsForm(event){
            var firstname = document.getElementById('fname'); // get first name field id 

            if(firstname.value == "undefined" || firstname.value == null || firstname.value == ""){ // check if first name field is empty. if empty then stop posting form and send user a warning message
                displayWarning("Entering an First Name is necessary!", firstname);
                event.preventDefault();
                return false;
            }

            var lastname = document.getElementById('lname'); // get last name field id 

            if(lastname.value == "undefined" || lastname.value == null || lastname.value == ""){ // check if last name field is empty. if empty then stop posting form and send user a warning message
                displayWarning("Entering an Last Name is necessary!", lastname);
                event.preventDefault();
                return false;
            }

            var Email = document.getElementById('email'); // get email field id 
            if (Email.value == "") { // check if email field is empty. if empty then stop posting form and send user a warning message
                displayWarning('Entering an Email address is necessary!', Email);
                event.preventDefault();
                return false;
            }else if (Email.validity.typeMismatch){ // check if Email formate is valid. if not then stop posting form and send user a warning message
                     displayWarning('Please enter an Email address which is valid!', Email);
                     event.preventDefault();
                     return false;
            }

            var message = document.getElementById('message'); // get message field id 
            
            if(message.value == "undefined" || message.value == null || message.value == ""){// check if message field is empty. if empty then stop posting form and send user a warning message
                displayWarning("Entering an message is necessary!", message);
                event.preventDefault();
                return false;
            }
        }
        
        
    </script>
   <br>
  <!-- FOOTER -->
    <?php 
   include 'include/footer.php'; 
   ?>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>');</script><script src="JavaScript/bootstrap.bundle.js" ></script></body>
</html>
