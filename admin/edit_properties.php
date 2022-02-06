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
      <title>Du Plessis Cole Realtors Content Management</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="ajax/ajax.js"></script>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    <meta charset="utf-8" />
        <title>Du Plessis Cole Realtors - Add Properties</title>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box;
            }

            input[type=text], select, textarea, input[type=tel] {
                 width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                font-size: 15px;
            }

            input[type=submit] {     
                background-color: #333740;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
                margin: 0 auto;
            }

            .back-btn-link {
                margin: 0 auto;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 45px;
            }

            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }

            
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
        </style>
        <script>
            function WaitForMasseage() {
                setTimeout(function(){ window.location ="display_properties.php"; }, 30);
            }
        </script>

        <?php 

    // Retreive query sting property_id from URL 
    $Property_id = intval($_GET['property_id']);

    
    $queryGetAllFields = "SELECT * FROM (( property_tb
    INNER JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id))
    WHERE property_tb.Property_id = '$Property_id'";

    $results = mysqli_query($dbc, $queryGetAllFields);

    if (!$results) { // test query 
        printf("Error: %s\n", mysqli_error($dbc));
        exit();
    }
    
   // Declare the fields to hold the current data (from the Database) for this form 
    $db_PropertyName = "";
    $db_PropertyDescription = "";
    $db_Brief = "";
    $db_bedRoom = "";
    $db_Garage = "";
    $db_livingRoom = "";
    $db_bathRoom = "";
    $db_Size = "";
    $db_PropertyStreetID = "";
    $db_PropertySuburbID = "";
    $db_PropertyCityID = "";
    $db_PropertyPostID = "";
    $db_OfficeID = "";
    $db_PriceTypeID  = "";
    $db_MinPrice  = "";
    $db_SoldFor  = "";
    $db_AmountBid  = "";
    $db_IsSold  = "";
    $db_IsBid  = "";

     // retrieve the data from the database 
    while ($row1=mysqli_fetch_assoc($results)){
        $db_PropertyName = $row1['PropertyName'];
        $db_PropertyDescription = $row1['PropertyDescription'];
        $db_Brief = $row1['Brief'];
        $db_bedRoom = $row1['bedRoom'];
        $db_Garage = $row1['Garage'];
        $db_livingRoom = $row1['livingRoom'];
        $db_bathRoom = $row1['bathRoom'];
        $db_Size = $row1['Size'];
        $db_PropertyStreetID = $row1['PropertyStreet_id'];
        $db_PropertySuburbID = $row1['PropertySuburb_id'];
        $db_PropertyCityID = $row1['PropertyCity_id'];
        $db_PropertyPostID = $row1['PropertyPost_id'];
        $db_OfficeID = $row1['Office_id'];
        $db_PriceTypeID  = $row1['PriceType_id'];
        $db_MinPrice  = $row1['Min_Price'];
        $db_SoldFor  = $row1['SoldFor'];
        $db_AmountBid  = $row1['currentBid'];
        $db_IsSold  = $row1['IsSold'];
        $db_IsBid  = $row1['IsBid'];
    }

    //checks if the user clicks the submit button 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['update_properties'])) {

            $PropertyName = $_POST['PropertyName'];// get property name by post 
            $PropertyDescription = $_POST['PropertyDescription']; // get property Description by post
            $Brief = $_POST['Brief']; // get property Brief Description by post
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
            $SoldFor  = mysqli_real_escape_string($dbc, $_POST['SoldFor']);
            $AmountBid  = mysqli_real_escape_string($dbc, $_POST['AmountBid']);
            $IsSold  = mysqli_real_escape_string($dbc, $_POST['IsSold']);
            $IsBid  = mysqli_real_escape_string($dbc, $_POST['IsBid']);
 
           // var_dump($_POST);
            
           //print_r($_POST);

            //build query to update a property in the property table 
           
            $query_UPDATE = "UPDATE property_tb 
            INNER JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
            SET
                PropertyName='$PropertyName', 
                PropertyDescription='$PropertyDescription', 
                Brief='$Brief',
                bedRoom='$bedRoom', 
                Garage='$Garage', 
                livingRoom='$livingRoom',	
                bathRoom = '$bathRoom', 
                Size = '$Size',
                PropertyStreet_id = '$PropertyStreetID', 
                PropertySuburb_id = '$PropertySuburbID', 
                PropertyCity_id = '$PropertyCityID',  
                PropertyPost_id = '$PropertyPostID',
                Office_id = '$OfficeID',  
                PriceType_id = '$PriceTypeID',
                propertyrecord_tb.IsSold = '$IsSold',
                propertyrecord_tb.IsBid =  '$IsBid',
                propertyrecord_tb.SoldFor = '$SoldFor',
                propertyrecord_tb.currentBid = '$AmountBid'
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
       } // end of if isset
    }
        ?>
    </head>
        <body>
            <main role="main">
                <div class="container">
                    <form method="post">
                        <h1 style="text-align:center"><Strong>Edit Property</Strong></h1>
                        <hr>
                        <h2>Property Information:</h2>
                        <hr>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyName">Property Name</label>
                            </div>
                            <div class="col-75">
                            <input type="text" minlength="5"  maxlength="50" id="PropertyName" name="PropertyName" defaultValue="" placeholder="Enter in the Property Name.."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="PropertyDescription">Property Description</label>
                            </div>
                            <div class="col-75">
                            <textarea id="PropertyDescription" name="PropertyDescription" minlength="255" maxlength="2000" size="50" cols="52" rows="6" placeholder="Enter in property description.." style="height:200px"><?php echo $db_PropertyDescription; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Brief">Brief</label>
                            </div>
                            <div class="col-75">
                                <textarea id="Brief" name="Brief" minlength="150" maxlength="255" size="50" cols="52" rows="6" placeholder="Enter in a brief Description of the property..." style="height:200px"><?php echo $db_Brief ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="bedRoom">Bed Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="bedRoom" name="bedRoom" placeholder="Enter in the number of Bed Rooms...."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Garage">Garage</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="Garage" name="Garage" placeholder="Enter in the number of Garage..."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="livingRoom">Living Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="livingRoom" name="livingRoom" placeholder="Enter in the number of Living Room..."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="bathRoom">Bath Room</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="1" maxlength="1" id="bathRoom" name="bathRoom" placeholder="Enter in the number of Bath Room..."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Size">Size of the Property</label>
                            </div>
                            <div class="col-75">
                            <input type="tel" minlength="2" id="Size" name="Size" placeholder="Enter in the Size of the Property..."/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="MinPrice">Starting Price</label>
                            </div>
                            <div class="col-75">
                            <input type="tel"  id="MinPrice" minlength="5" name="MinPrice" placeholder="Enter in the Starting Price of the Property..."/>
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
                               
                            </div>
                            <div class="col-75">
                                <label for="IsSold">Is the Property Sold?</label>
                                <input type="hidden" name="IsSold" value='FALSE'/>
                                <input type="checkbox" id="IsSold" name="IsSold" value='TRUE' onclick='IsSold();'/>
                                <br>
                            </div>
                        </div>
                        <div class="row" id="row_SoldFor" style="display:none">
                            <div class="col-25">
                            <label for="SoldFor">Sold For</label>
                            </div>
                            <div class="col-75">
                                <input type="tel" minlength="5" id="SoldFor" name="SoldFor" placeholder="Enter in the Amount the Property is Sold For..."/>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            </div>
                            <div class="col-75">
                                <label for="IsBid">Is there a Bid on the Property?</label>
                                <input type="hidden" name="IsBid" value='FALSE'/>
                                <input type="checkbox" id="IsBid" name="IsBid" value='TRUE' onclick='IsBid();'/>
                                <br>
                            </div>
                        </div>
                        <div class="row" id="row_AmountBid" style="display:none">
                            <div class="col-25">
                            <label for="AmountBid">Current Amount Bid</label>
                            </div>
                            <div class="col-75">
                                <input type="tel" minlength="5"  id="AmountBid" name="AmountBid"  placeholder="Enter in the Current Bid Amount for the Property..."/>
                                <br>
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
                            <input type="submit"  id="Submit" value="Update Properties" name="update_properties" class="btn btn-lg">
                        </div>
                        <br>
                        <div class="row">
                            <a href="../admin/display_properties.php" class="back-btn-link" style="color:#333740">Go Back</a>
                        </div>
                    </form>

                    <script>
                         var row_SoldFor = document.getElementById("row_SoldFor");
                         var row_AmountBid = document.getElementById("row_AmountBid");

                        
                        document.getElementById("PropertyName").defaultValue = "<?php echo $db_PropertyName; ?>";
                        document.getElementById("bedRoom").defaultValue = "<?php echo $db_bedRoom; ?>";
                        document.getElementById("bathRoom").defaultValue = "<?php echo $db_bathRoom; ?>";
                        document.getElementById("Garage").defaultValue = "<?php echo $db_Garage; ?>";
                        document.getElementById("livingRoom").defaultValue = "<?php echo $db_livingRoom; ?>";
                        document.getElementById("Size").defaultValue = "<?php echo $db_Size; ?>";
                        document.getElementById("MinPrice").defaultValue = "<?php echo $db_MinPrice; ?>";
                        document.getElementById("SoldFor").defaultValue = "<?php echo $db_SoldFor; ?>";
                        document.getElementById("AmountBid").defaultValue = "<?php echo $db_AmountBid; ?>";

                        document.getElementById("PropertyStreetID").value = "<?php echo $db_PropertyStreetID; ?>";
                        document.getElementById("PropertySuburbID").value = "<?php echo $db_PropertySuburbID; ?>";
                        document.getElementById("PropertyCityID").value = "<?php echo $db_PropertyCityID; ?>";
                        document.getElementById("PropertyPostID").value = "<?php echo $db_PropertyPostID; ?>";
                        document.getElementById("PriceTypeID").value = "<?php echo $db_PriceTypeID; ?>";
                        document.getElementById("OfficeID").value = "<?php echo $db_OfficeID; ?>";
                        
                     
                        if('<?php echo $db_IsSold; ?>' == 'TRUE'){
                            document.getElementById("IsSold").checked = true;
                            row_SoldFor.style.display = "block";
                        }else{
                            document.getElementById("IsSold").checked = false;
                            row_SoldFor.style.display = "none";
                        }

                        if('<?php echo $db_IsBid; ?>' == 'TRUE'){
                            document.getElementById("IsBid").checked = true;
                            row_AmountBid.style.display = "block";
                        }else{
                            document.getElementById("IsBid").checked = false;
                            row_AmountBid.style.display = "none";
                        }

                       
                        /*
                        document.getElementById("PropertyDescription").addEventListener("oninput", IsBid);
                        function testInput(text){
                            alert(text);
                        }*/
 
                        document.getElementById("IsSold").addEventListener("click", IsSold);
                        document.getElementById("IsBid").addEventListener("click", IsBid);
                        var current_SoldFor;
                        var current_AmountBid;

                        function IsSold() {
                            var elm = document.getElementById('IsSold');
                            var input_SoldFor = document.getElementById("SoldFor");
                            ///var current_SoldFor = input_SoldFor.value;
                           
                            if(elm.checked) {
                                //document.getElementById("IsBid").checked = true;
                                row_SoldFor.style.display = "block";
                                if(current_SoldFor == undefined || current_SoldFor == null || current_SoldFor == ''){
                                    input_SoldFor.value = 0;
                                } else {
                                    input_SoldFor.value =  current_SoldFor;
                                }
                                
                            } else {
                                //document.getElementById("IsBid").checked = false;
                                row_SoldFor.style.display = "none";
                                current_SoldFor = input_SoldFor.value;
                                input_SoldFor.value = 0;
                            }
                           
                        }
                        function IsBid() {
                            var elm = document.getElementById('IsBid');
                            var input_AmountBid = document.getElementById("AmountBid");
                            if(elm.checked){
                               // document.getElementById("IsSold").checked = true;
                               row_AmountBid.style.display = "block";
                               
                               if(current_AmountBid == undefined || current_AmountBid == null || current_AmountBid == ''){
                                    input_AmountBid.value = 0;
                                }else{
                                    input_AmountBid.value =  current_AmountBid;
                                }
                            }else{
                                //document.getElementById("IsSold").checked = false;
                                row_AmountBid.style.display = "none";
                                current_AmountBid = input_AmountBid.value;
                                input_AmountBid.value = 0;
                            }
                        }
                   </script>
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
        ///header("Location: index.php");// login page/index page
        //back up plan
        // now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
        //echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page

        echo '<script type="text/javascript">';
        echo "  window.location.href = 'index.php'";
        echo '</script>';

}
?>