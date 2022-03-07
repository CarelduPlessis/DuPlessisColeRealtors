<!-- This page Add Agent -->
<?php    
if(isset($_COOKIE['admin'])){ // is player logged in??  
?> <!-- This page Add Agent -->
    <?php    
        include '../include/head_admin.php'; //Include admin header
        include("../database/config.php"); //Include database connections

        // Retreive query sting property_id from URL 
        $Property_id = intval($_GET['property_id']);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            if (isset($_POST['AddAgent'])) { 
               
                $agent_id = $_POST['Agent_id'];

                $query_UPDATE = "UPDATE property_tb
                    SET Agent_id = '$agent_id'
                WHERE Property_id='$Property_id'";
                
            if(@mysqli_query($dbc, $query_UPDATE)){ // run query and update a property in the property tabel 
                print '<p>Successful edit property!</p>'; // display message

                //header('Location: display_properties.php'); //Go to display wishlist page
                echo '<script type="text/javascript">';
                echo "  window.location.href = 'display_properties.php'";
                echo '</script>';

            } else{
                // display message
                echo '<script type="text/javascript">';
                    echo ' alert('."Could not add the entry because:". " mysqli_error($dbc)" . "the query being run was: $query_UPDATE".')'; 
                echo '</script>';
            }
            

            }
        }
    ?> 



<!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <title>Du Plessis Cole Realtors - Add Agent to Property</title> 
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            .SelectAgent {
                width: 75%;
                margin-bottom: 10px;
                
            }

            .LabelAgent {
                text-align: center;
                width: 20%;
            }
        </style>
      </head>
        <body>
            <main role="main">
            <div class="container uploadProperty"> 
                <h3>Add Agent to Property</h3>
                <hr>
                <br>
                <!-- Add Agent to Property Form-->
                    <form  class="form-signin" method="post">
                        <div class="row">
                            <!-- <div class="col-25"> -->
                            <label for="Agent_id" class="LabelAgent">Agents:</label>
                            <!-- </div> -->
                            <!-- <div class="col-75"> -->
                                <select id="Agent_id" name="Agent_id" class="SelectAgent">
                                    <?php
                                         $query = "SELECT * FROM agent_tb";
                                        if($r = mysqli_query($dbc, $query)){ // Run the Query. 
                                            // Retrieve and print every record:                                                                                                                                     
                                            while($row = mysqli_fetch_array($r)){
                                                
                                    ?>
                                                    <option value="<?php echo $row['Agent_id']?>"> 
                                                    <?php echo $row['AgentFullName']; ?> 
                                                    </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            <!-- </div> -->
                        </div>
                        <div class="row">
                            <input type="submit"  id="Submit" name="AddAgent" value="Add Agent to Property" class="btn btn-lg">
                        </div>
                    </form>  
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
        header("Location: index.php");// login page/index page

        //back up plan
        // now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
        //echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page
    }
    ?>