<?php
    include("database/config.php"); //Include database connections
     
    $Property_id = intval($_GET['id']); //get id from URL and turn it into a number
    
    if(isset($_COOKIE['user'])) { // is $_COOKIE['user'] empty / is user logged in 
      
        //build queries
        // find which property is selected to be add from users wishlist
        $query2 = "select * from wishlist_tb WHERE User_id ={$_COOKIE['user']} AND Property_id = $Property_id";
        
        //add selected property to user wishlist
        $query_INSERT = "INSERT INTO wishlist_tb (Property_id, User_id) VALUES ($Property_id, {$_COOKIE['user']})";

            if($query2 = mysqli_query($dbc, $query2)){ // run query
               
                if(mysqli_num_rows($query2) == 0){ // number of rows retrieved from results of the query is equal to zero then run code below

                            if(@mysqli_query($dbc, $query_INSERT)){// Execute the INSERT query 
                                print '<p>Successful add property to the wishlist!</p>'; // display message
                                 header('Location: display_wishlist.php'); //Go to display wishlist page
                            } else{
                                print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_INSERT .'</p>';
                            } 
                    // Free result set
                    mysqli_free_result($query2);
                }else{
                     print '<p>This property is already added to your wishlist</p>';
                }
            }else{
                echo "ERROR: Could not able to execute $query2. " . mysqli_error($dbc);
            }
    }else{// not logged in or Cookies are disabled.
        echo "Cookies are disabled.";
    }    
    
    
       
?>