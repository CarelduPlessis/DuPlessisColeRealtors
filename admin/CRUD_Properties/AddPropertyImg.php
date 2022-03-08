<!-- This page edits properties -->
<?php    
if(isset($_COOKIE['admin'])){ // is player logged in??  
?> 
    <?php 
    include '../../include/head_admin.php'; //Include admin header
   // include("../../database/config.php"); //Include database connections


                 $Property_id = $_GET['property_id']; // get the property id from URL via address bar      

                // if form is Posted then run code below
                if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Handle the form. //Check whether the form has been submitted:
                    $dir = "../../img/property/"; // move to directory

                    $Store_dir = "img/property/"; // Store the directory path in database with filepath

                    // if Upload Image button is clicked then run code below
                    if (isset($_POST['PropImgUpload'])) {   //To find out which button is clicked on https://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit
                           // Check if the form was submitted
                        // Check if file was uploaded without errors
                        if(isset($_FILES["PropertyImage"]) && $_FILES["PropertyImage"]["error"] == 0){
                            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            $filename = $_FILES["PropertyImage"]["name"];
                            $filetype = $_FILES["PropertyImage"]["type"];
                            $filesize = $_FILES["PropertyImage"]["size"];

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
                                    // Get image name
                                        $image2 = $_FILES['PropertyImage']['name'];

                                        // image file directory
                                        $PropertyImage = $Store_dir.basename($image2);

                                    //$query_UPDATE2 = "UPDATE property_tb SET Property_image= '$PropertyImage' WHERE Property_id=$Property_id"; 
                                    // SQL for updating a property image to property_tb
                                    $query_UPDATE2 = "UPDATE property_tb SET Property_image='$PropertyImage' WHERE  Property_id={$Property_id}";

                                    if(@mysqli_query($dbc, $query_UPDATE2)){
                                            echo '<script type="text/javascript">';
                                                echo ' alert("successfully uploaded the Property Image!")'; // displays message that image has been successfully uploaded
                                            echo '</script>';
                                            
                                    } else{
                                        // display message image has not been uploaded
                                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_UPDATE2 .'</p>';
                                    }
                                } else{

                                     // Get image name
                                        $image2 = $_FILES['PropertyImage']['name'];

                                        // image file directory
                                        $PropertyImage = $Store_dir.basename($image2);

                                    //$query_UPDATE2 = "UPDATE property_tb SET Property_image= '$PropertyImage' WHERE Property_id=$Property_id"; // SQL for updating a property image to property_tb
                                    $query_UPDATE2 = "UPDATE property_tb SET Property_image='$PropertyImage' WHERE  Property_id={$Property_id}";

                                    if(@mysqli_query($dbc, $query_UPDATE2)){
                                            echo '<script type="text/javascript">';
                                                echo ' alert("successfully uploaded the Property Image!")'; // displays message that image has been successfully uploaded
                                            echo '</script>';
                                            move_uploaded_file($_FILES["PropertyImage"]["tmp_name"], $dir . $filename); // moves uploaded file to the new destination, if the name already exists, it will be overwritten with new file upload
                                    } else{
                                        print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_UPDATE2 .'</p>'; // displays message that image has not been uploaded with the related error
                                    }

                                } 
                            } else{
                                echo "Error: There was a problem uploading your file. Please try again."; // displays error message that image has not uploaded
                            }
                        } else{
                            echo "Error: " . $_FILES["PropertyImage"]["error"]; // displays error message image has not uploaded
                        }

                        if($_FILES["PropertyImage"]["error"] > 0){
                            echo "Error: " . $_FILES["PropertyImage"]["error"] . "<br>"; // displays error message image has not uploaded
                        } 
                    } 
                } // End of submission IF.
                mysqli_close($dbc); // Close the connection
        ?>

    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <title>Du Plessis Cole Realtors - Add Property Image</title> 
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="ajax/ajax.js"></script>

        <style>
        input[type="submit"] {
            float: none;
        }

        .PropertyImageForm-input-container, h3 {
           display: flex;
           justify-content: center;
           
        }

        .form-signin {
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        </style>
      </head>
        <body>
            <main role="main">
            <!-- Featurettes
            ================================================== -->
            <div class="container marketing uploadProperty"> 
            <h3>Add Property Image</h3>
            <hr>
                <div class="PropertyImageForm-input-container">
                    
                    <!-- Add property image Form-->
                        <form  class="form-signin" method="post" enctype="multipart/form-data">
                            <label for="SelectPropImg"><strong>Property image:</strong> <input type="file"  name="PropertyImage" id="SelectPropImg" ></label>
                            
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                            <input type="submit" name="PropImgUpload" value="Upload Image">
                            </br>
                            <a href="display_properties.php" class="back-btn-link" style="color:#333740">Go Back</a>
                        </form>
                </div>
            </div><!-- End of container and upload property image -->
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
        header("../Location: index.php");// login page/index page


        //back up plan
        // now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
        //echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page
}
?>