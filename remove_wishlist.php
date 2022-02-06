<?php
    include("database/config.php"); //Include database connections
     
    $Property_id = intval($_GET['id']); //get id from URL and turn it into a number
    
    if(isset($_COOKIE['user'])) { // is $_COOKIE['user'] empty / is user logged in 
   
        // build queries
        // look for all the properties in the users wishlist
        $query2 = "select * from wishlist_tb WHERE User_id ={$_COOKIE['user']}";
        
        //DELETE the property from users wishlist
        $query_DELETE = "DELETE FROM wishlist_tb WHERE User_id = {$_COOKIE['user']} and Property_id = $Property_id";
        
        if($query2 = mysqli_query($dbc, $query2)){ // Execute the query 
            if(mysqli_num_rows($query2) > 0){ // if results are more then zero (number of rows are more then zero)
                while($row1 = mysqli_fetch_array($query2)){  //Fetch a result row as a numeric array and as an associative(string) array
                    if($row1['User_id'] == $_COOKIE['user'] && $row1['Property_id'] == $Property_id){
                        // Execute the query:
                        if(@mysqli_query($dbc, $query_DELETE)){
                            print '<p>Successful removed property to the wishlist!</p>'; // display message
                            header('Location: display_wishlist.php'); //Go to display wishlist page
                        } else{
                            // display message
                            print '<p style="color: red;">Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p><p>the query being run was:'. $query_INSERT .'</p>';
                        } 
                    }
                }
                // Free result set ("Free the memory associated with the result")
                mysqli_free_result($query2);
            }else{ // you can't remove a property that doesn't exists
                echo "<p class='lead'><em>User has no property in the wishlist!</em></p>";
            }
        }else{
            // failed to Execute the query 
            echo "ERROR: Could not able to execute $query2. " . mysqli_error($dbc);
        }
    }else{ // not logged in or Cookies are disabled.
            echo "Cookies are disabled.";
    }
    
    
   mysqli_close($dbc); // Close the connection    
?>