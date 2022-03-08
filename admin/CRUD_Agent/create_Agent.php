<!-- This page edits properties -->
<?php    
if(isset($_COOKIE['admin'])){ // is player logged in??  
?> 
    <?php 
    include '../include/head_admin.php'; //Include admin header
   // include ("../database/config.php"); //Include database connections

                 $Property_id = $_GET['property_id']; // get the delnews from URL via address bar   

                // if form is Posted then run code below
                if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Handle the form. //Check whether the form has been submitted:
                    $dir = "../img/avatar/agents/"; // move to directory 
                    $Store_dir = "img/avatar/agents/"; // Store the directory path in database with filepath

                    // if Login button is clicked then run code below
                    if (isset($_POST['AvatarUpload'])) {   //To find out wich button is clicked on https://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit
                           // Check if the form was submitted
                        // Check if file was uploaded without errors
                        $Agent = mysqli_real_escape_string($dbc, $_POST['AgentName']);
                        if(isset($_FILES["AgentAvatar"]) && $_FILES["AgentAvatar"]["error"] == 0){
                            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            $filename = $_FILES["AgentAvatar"]["name"];
                            $filetype = $_FILES["AgentAvatar"]["type"];
                            $filesize = $_FILES["AgentAvatar"]["size"];

                            // Verify file extension
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                            // Verify file size - 5MB maximum
                            $maxsize = 5 * 1024 * 1024;
                            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                            // Verify MYME type of the file
                            if(in_array($filetype, $allowed)){
                                // Check whether file exists before uploading it
                                if(file_exists($dir . $filename)){
                                    echo $filename . "is selected.";

                                    // Get image name
                                        $image1 = $_FILES['AgentAvatar']['name'];

                                        // image file directory
                                        $AgentAvatar = $Store_dir.basename($image1);

                                    //$query_UPDATE2 = "UPDATE property_tb SET AgentAvatar= '$AgentAvatar', Agent= '$Agent' WHERE Property_id=$Property_id"; 
                                    // SQL for updating a agent avatar and agent name to property_tb
                                    $query_UPDATE1 = "UPDATE property_tb SET AgentAvatar='$AgentAvatar', Agent='$Agent' WHERE Property_id ={$Property_id}";


                                    if(@mysqli_query($dbc, $query_UPDATE1)){
                                            echo '<script type="text/javascript">';
                                                echo ' alert("successfully uploaded the Agent Avatar!")'; // displays message that avatar has been successfully uploaded
                                            echo '</script>';
                                            header('Location: ../admin/display_properties.php'); //Go to display_properties page
                                    } else{
                                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_UPDATE1 .'</p>'; // displays message that avatar has not been uploaded
                                    }

                                } else{

                                    // Get image name
                                        $image1 = $_FILES['AgentAvatar']['name'];

                                        // image file directory
                                        $AgentAvatar = $Store_dir.basename($image1);

                                    //$query_UPDATE2 = "UPDATE property_tb SET AgentAvatar= '$AgentAvatar', Agent= '$Agent' WHERE Property_id=$Property_id"; // SQL for updating a agent avatar and agent name to property_tb
                                    $query_UPDATE2 = "UPDATE property_tb SET AgentAvatar='$AgentAvatar', Agent='$Agent' WHERE Property_id={$Property_id}";


                                    if(@mysqli_query($dbc, $query_UPDATE2)){
                                            echo '<script type="text/javascript">';
                                                echo ' alert("successfully uploaded the Agent Avatar!")'; // displays message that avatar has been successfully uploaded
                                            echo '</script>';
                                          move_uploaded_file($_FILES["AgentAvatar"]["tmp_name"], $dir . $filename);
                                          header('Location: ../admin/display_properties.php'); //Go to display_properties page
                                    } else{
                                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $$query_UPDATE2 .'</p>'; // displays message that avatar has not been uploaded
                                    }
                                } 
                            } else{
                                echo "Error: There was a problem uploading your file. Please try again."; // displays error message that there was a propblem uploading
                            }
                        } else{
                            echo "Error: " . $_FILES["AgentAvatar"]["error"]; // displays error message 
                        }

                        if($_FILES["AgentAvatar"]["error"] > 0){
                            echo "Error: " . $_FILES["AgentAvatar"]["error"] . "<br>"; // displays error message 
                        } 
                    }

                } // End of submission IF.
                mysqli_close($dbc); // Close the connection
        ?>

    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <title>Du Plessis Cole Realtors - Add Agent Image</title>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        .uploadAvatar {
            position:relative;
            top: 150px;
        }
        </style>
      </head>
        <body>
            <main role="main">
            <!-- Featurettes ================================================== -->
            <div class="container marketing uploadAvatar"> 
                <h3>Add Agent Avatar</h3>
                <hr>
                <br>
                <!-- Add Agent Avatar Form-->
                    <form  method="post" enctype="multipart/form-data">
                        <label for="AgentName">Agent Name</label>
                            <input type="text" name="AgentName" size="50" placeholder="Agent Name that is assigned to property">
                            <br>
                            <label for="SelectAvatar">Agent Avatar</label>
                            <input type="file" name="AgentAvatar" id="SelectAvatar">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                            <hr>                        
                            <input type="submit" name="AvatarUpload" value="AvatarUpload">
                    </form>
            </div><!-- End of container and upload avatar -->
            </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="JavaScript/bootstrap.bundle.js"></script>

        </body>
    </html>
<?php 

}else{           
       // Not working because of echo that I can't find ?!?!?!?!?!?!?!?   
        // Php header location redirect not working
        //https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707

        // now it needs to work after covering the entire page in a if statment checking if admin is logged in
        header("Location: index.php");// login page/index page


        //back up plan
        // now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
        //echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page
}
?>