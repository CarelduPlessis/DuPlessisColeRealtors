<!-- This page deletes a property from the property_tb and wishlist_tb in the dcrealtors_db-->
<?php

include "../database/config.php"; // gets all statements from config.php
$Property_id = $_GET['property_id']; // get the delnews from URL via address bar 
    
    if(isset($_COOKIE['admin'])){ // is player logged in??
        
        // write an SQL for delete
        
        $query_GetPropertyRecord = "SELECT * FROM property_tb WHERE Property_id= '$Property_id'";

        $result = mysqli_query($dbc, $query_GetPropertyRecord );

        $PropertyRecord_id;

        while($row = mysqli_fetch_array($result)) {
          $PropertyRecord_id =  $row["PropertyRecord_id"];
        }

        //$query_DELETE1 = "DELETE FROM wishlist_tb WHERE Property_id= '$Property_id' "; 
        // SQL for delete a property from wishlist_tb, without this the property cannot be deleted from property_tb as it is also in the wishlist_tb
        $query_DELETE1 = "DELETE FROM wishlist_tb WHERE Property_id= '$Property_id' ";

        //mysqli_query($dbc, $query_DELETE); // Executes the SQL query called $query
        if(@mysqli_query($dbc, $query_DELETE1)){
            print '<p>Successfully removed wishlist from the wishlist!</p><br />'; // display message wishlist has been deleted.

        } else{
            // display message property has not been deleted.
            print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_DELETE1 .'</p>';
        }

        //$query_DELETE2 = "DELETE FROM property_tb WHERE Property_id= '$Property_id' "; // SQL for delete a property from property_tb
        $query_DELETE2 = "DELETE FROM property_tb WHERE Property_id= '$Property_id'";

        if(@mysqli_query($dbc, $query_DELETE2)){
            print '<p>Successfully removed property from the property table!</p><br />'; // display message property has been deleted.

        } else{
            // display message property has not been deleted.
            print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_DELETE2 .'</p>';
        }

        $query_DELETE3 = "DELETE FROM propertyrecord_tb WHERE PropertyRecord_id= '$PropertyRecord_id'";

        if(@mysqli_query($dbc, $query_DELETE3)){
            print '<p>Successfully removed Property Record from the Property Record table!</p><br />'; // display message Property Record has been deleted.
        } else{
            // display message property has not been deleted.
            print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_DELETE3 .'</p>';
        }
        echo '<script type="text/javascript">';
        echo "  window.location.href = 'display_properties.php'";
        echo '</script>';

    }else{           
        // Not working because of echo that I can't find ?!?!?!?!?!?!?!?   
        // Php header location redirect not working
        //https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707

        // now it needs to work after covering the entire page in a if statment checking if admin is logged in
        //header("Location: index.php");// login page/index page

        echo '<script type="text/javascript">';
        echo "  window.location.href = '../index.php'";
        echo '</script>';


        //back up plan
        // now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
        //echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page
    } 
?>