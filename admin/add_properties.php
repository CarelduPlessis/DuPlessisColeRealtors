<!-- This page adds properties to the database, these are then displayed on the manage properties page -->
<?php    
if(isset($_COOKIE['admin'])){ // is admin logged in??  
?> 
    <?php 
    include '../include/head_admin.php'; // Include admin header

    include("../database/config.php"); // Include database connections
    ?>

    <!doctype html>
    <html lang="en">
      <head>
            <title>Du Plessis Cole Realtors - Add Properties</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="ajax/ajax.js"></script>

            <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <style>
            /* Bootstrap Conflic - need to be fixed */
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 45px;
            } 

            .col-25 {
                width: 20%;
                margin-left: 20px;
            }
        </style>
        <script>
            function WaitForMasseage() {
                setTimeout(function(){ window.location ="display_properties.php"; }, 30);
            }
        </script>

        <?php 
            // This script logs a user in by check the stored values in table.               

                // if form is Posted then run code below
                if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Handle the form. //Check whether the form has been submitted:
                    // if Login button is clicked then run code below
                    if (isset($_POST['AddPropertyInfo'])) {   //To find out wich button is clicked on https://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit
                           $PropertyName = mysqli_real_escape_string($dbc, $_POST['PropertyName']);
                           $PropertyDescription = mysqli_real_escape_string($dbc, $_POST['PropertyDescription']);
                           $Brief = mysqli_real_escape_string($dbc, $_POST['Brief']);
                           $bedRoom = mysqli_real_escape_string($dbc, $_POST['bedRoom']);
                           $Garage = mysqli_real_escape_string($dbc, $_POST['Garage']);
                           $livingRoom = mysqli_real_escape_string($dbc, $_POST['livingRoom']);
                           $bathRoom = mysqli_real_escape_string($dbc, $_POST['bathRoom']);
                           $Size = mysqli_real_escape_string($dbc, $_POST['Size']);
                           $PropertyStreetID = mysqli_real_escape_string($dbc, $_POST['PropertyStreetID']);
                           $PropertySuburbID = mysqli_real_escape_string($dbc, $_POST['PropertySuburbID']);
                           $PropertyCityID = mysqli_real_escape_string($dbc, $_POST['PropertyCityID']);
                           $PropertyPostID = mysqli_real_escape_string($dbc, $_POST['PropertyPostID']);
                           $OfficeID = mysqli_real_escape_string($dbc, $_POST['OfficeID']);
                           $PriceTypeID  = mysqli_real_escape_string($dbc, $_POST['PriceTypeID']);
                           $MinPrice  = mysqli_real_escape_string($dbc, $_POST['MinPrice']);

                           $IsDuplicate = false;

                           $query = "SELECT * FROM property_tb WHERE PropertyName = '$PropertyName'";


                           $result2 = mysqli_query($dbc, $query); // run query

                            if (!$result2) { // test query 
                                printf("Error: %s\n", mysqli_error($dbc));
                                exit();
                            }

                             //echo "{$_POST['password']}";
                            if($r = mysqli_query($dbc, $query)){ // Run the Query.                                                                                     

                                // Retrieve and print every record:                                                                                                                                     
                                while($row = mysqli_fetch_array($r)){ // sort query in rows username_Email"]){

                                    // SQL to not duplicate already inserted fields on refresh
                                   if ($PropertyName != $row['PropertyName'] && $PropertyDescription != $row['PropertyDescription'] && $Brief != $row['Brief']){
                                        $IsDuplicate = true;
                                    }else{
                                        $IsDuplicate = false; 
                                        echo '<script type="text/javascript">';
                                            echo 'alert('."Duplicate".')'; // alert message for duplicated property inserted
                                        echo '</script>';
                                    }

                                }// end of while loop

                            } else { // Query didn't run.
                                 echo '<script type="text/javascript">';
                                 echo 'console.log("Could not retrieve the data because:"<br />' . mysqli_error($dbc) . " The query being run was:" . $query . ')'; //Error message on unretrevived data
                                 echo '</script>';
                            } // End of query IF.

                             if($IsDuplicate == false){

                                $queryAddPropertyRecord = "INSERT INTO PropertyRecord_TB (PropertyRecord_id, Min_Price, SoldFor, IsSold, IsBid, currentBid)             
                                VALUES (0, '$MinPrice', '0', 'FALSE', 'FALSE', '0')";

                                

                                if (mysqli_query($dbc, $queryAddPropertyRecord)) { // run Query
                                    $PropertyRecordID = mysqli_insert_id($dbc); // Get latest ID URL: https://www.w3schools.com/php/php_mysql_insert_lastid.asp
                                    echo "New record created successfully. Last inserted ID is: " . $PropertyRecordID;
                                  } else {
                                    echo "Error: " . $queryAddPropertyRecord . "<br>" . mysqli_error($dbc);
                                  }

                                
     
                                // Insert query, inserting values into property table
                                 $queryAddPropertiesInfo = "insert into property_tb(Property_id,PropertyName,PropertyDescription,Brief,bedRoom,Garage,livingRoom,bathRoom,Size,PropertyStreet_id,PropertySuburb_id,PropertyCity_id,PropertyPost_id,Admin_id,Office_id, PropertyRecord_id,PriceType_id) 
                                   VALUES('0','$PropertyName','$PropertyDescription','$Brief','$bedRoom','$Garage','$livingRoom','$bathRoom','$Size','$PropertyStreetID','$PropertySuburbID','$PropertyCityID','$PropertyPostID','{$_COOKIE['admin']}',$OfficeID,$PropertyRecordID,$PriceTypeID)";

                                    if(@mysqli_query($dbc, $queryAddPropertiesInfo)){
                                               echo '<script type="text/javascript">';
                                                  echo ' alert('."Property is Added!".')'; 
                                              echo '</script>';
                                              
                                              echo '<script type="text/javascript">',//Go to display_properties page once property has been added
                                                    'WaitForMasseage();',
                                                    '</script>';
                                              //header('Location: ../admin/display_properties.php'); //Go to display_properties page once property has been added
                                    } else{
                                              // display message
                                              print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $queryAddPropertiesInfo .'</p>'; // Displays message on error with entering data 
                                    }

                            }

                    }

                } // End of submission IF.
               
        ?>
    </head>
        <body>
            <main role="main">
                <div class="container">
                    <form method="post">
                    <h1 style="text-align:center"><Strong>Add Property</Strong></h1>
                        <hr>
                        <h2>Property Information:</h2>
                        <hr>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyName">Property Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" minlength="5"  maxlength="50" id="PropertyName" name="PropertyName" placeholder="Enter in the Property Name..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyDescription">Property Description</label>
                            </div>
                            <div class="col-75">
                            <textarea id="PropertyDescription" name="PropertyDescription" minlength="255" maxlength="2000" size="50" cols="52" rows="6" placeholder="Enter in property description.." style="height:200px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Brief">Brief</label>
                            </div>
                            <div class="col-75">
                                <textarea id="Brief" name="Brief" minlength="150" maxlength="255" size="50" cols="52" rows="6" placeholder="Enter in a brief Description of the property..." style="height:200px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="bedRoom">Bed Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="bedRoom" name="bedRoom" placeholder="Enter in the number of Bed Rooms....">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Garage">Garage</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="Garage" name="Garage" placeholder="Enter in the number of Garage...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="livingRoom">Living Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="livingRoom" name="livingRoom" placeholder="Enter in the number of Living Room...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="bathRoom">Bath Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="bathRoom" name="bathRoom" placeholder="Enter in the number of Bath Room...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Size">Size of the Property</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="2" id="Size" name="Size" placeholder="Enter in the Size of the Property...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="MinPrice">Starting Price</label>
                            </div>
                            <div class="col-75">
                            <input type="tel"  id="MinPrice" minlength="5" name="MinPrice" placeholder="Enter in the Starting Price of the Property...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PriceTypeID">Type Of Sale</label>
                            </div>
                            <div class="col-75">
                                <select id="PriceTypeID" name="PriceTypeID">
                                    <?php
                                        $officeQuery = "SELECT * FROM pricetype_tb";
                                        if($r = mysqli_query($dbc, $officeQuery)){ // Run the Query. 
                                            // Retrieve and print every record:                                                                                                                                     
                                            while($row = mysqli_fetch_array($r)){
                                    ?>
                                                    <option value="<?php echo $row['PriceType_id']?>"> 
                                                    <?php echo $row['PriceType']; ?> 
                                                    </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="OfficeID">Assign a Office to Handle Sale</label>
                            </div>
                            <div class="col-75">
                                <select id="OfficeID" name="OfficeID">
                                    <?php
                                        $officeQuery = "SELECT * FROM office_tb";
                                        if($r = mysqli_query($dbc, $officeQuery)){ // Run the Query. 
                                            // Retrieve and print every record:                                                                                                                                     
                                            while($row = mysqli_fetch_array($r)){
                                    ?>
                                                    <option value="<?php echo $row['Office_id']?>"> 
                                                    <?php echo $row['Office_Email']; ?> 
                                                    </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h2>Property Address:</h2>
                        <hr>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyStreetID">Street</label>
                            </div>
                            <div class="col-75">
                                <select id="PropertyStreetID" name="PropertyStreetID">
                                    <?php
                                        $propertyStreetQuery = "SELECT * FROM propertystreet_tb";
                                        if($r = mysqli_query($dbc, $propertyStreetQuery)){ // Run the Query. 
                                            // Retrieve and print every record:                                                                                                                                     
                                            while($row = mysqli_fetch_array($r)){
                                    ?>
                                                    <option value="<?php echo $row['PropertyStreet_id']?>"> 
                                                    <?php echo $row['PropertyStreet']; ?> 
                                                    </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertySuburbID">Suburb</label>
                            </div>
                            <div class="col-75">
                            <select id="PropertySuburbID" name="PropertySuburbID">
                                    <?php
                                            $propertyStreetQuery = "SELECT * FROM propertysuburb_tb";
                                            if($r = mysqli_query($dbc, $propertyStreetQuery)){ // Run the Query. 
                                                // Retrieve and print every record:                                                                                                                                     
                                                while($row = mysqli_fetch_array($r)){
                                    ?>
                                                   <option value="<?php echo $row['PropertySuburb_id']?>"> 
                                                        <?php echo $row['PropertySuburb']; ?> 
                                                    </option>
                                    <?php 
                                                }
                                           }
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyCityID">City</label>
                            </div>
                            <div class="col-75">
                            <select id="PropertyCityID" name="PropertyCityID">
                                    <?php
                                            $propertyStreetQuery = "SELECT * FROM propertycity_tb";
                                            if($r = mysqli_query($dbc, $propertyStreetQuery)){ // Run the Query. 
                                                // Retrieve and print every record:                                                                                                                                     
                                                while($row = mysqli_fetch_array($r)){
                                    ?>
                                                   <option value="<?php echo $row['PropertyCity_id']?>"> 
                                                        <?php echo $row['PropertyCity']; ?> 
                                                    </option>
                                    <?php 
                                                }
                                           }
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyPostID">Post Code</label>
                            </div>
                            <div class="col-75">
                            <select id="PropertyPostID" name="PropertyPostID">
                                    <?php
                                        $propertyStreetQuery = "SELECT * FROM propertypost_tb";
                                        if($r = mysqli_query($dbc, $propertyStreetQuery)){ // Run the Query. 
                                                // Retrieve and print every record:                                                                                                                                     
                                            while($row = mysqli_fetch_array($r)){
                                    ?>
                                                <option value="<?php echo $row['PropertyPost_id']?>"> 
                                                    <?php echo $row['PropertyPost']; ?> 
                                                </option>
                                    <?php 
                                            }
                                        }
                                    ?>
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit"  id="Submit" value="Add Properties" name="AddPropertyInfo" class="btn btn-lg">
                        </div>
                        <br>
                        <div class="row">
                            
                            <a href="../admin/display_properties.php" class="back-btn-link" style="color:#333740">Go Back</a>
                        </div>
                    </form>
                </div>
                <br>
                <br>
            </main>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.js"></script>
        </body>
    </html>
<?php 
 mysqli_close($dbc); // Close the connection
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