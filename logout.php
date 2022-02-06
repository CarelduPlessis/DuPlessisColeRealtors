<?php
    /*This is the logout page. it destroys the cookie*/

     include("database/config.php"); //Include database connections
     
    // Destroy the cookie, but only if it already exists:

    $boolean = "FALSE"; // update user logged in state
    
    //build query
    // logout the user 
    $Update_query = "UPDATE user_tb SET IsUser_loggedIn='$boolean' WHERE User_id='{$_COOKIE['user']}'";

    mysqli_query($dbc, $Update_query); // run query 

    if (isset($_COOKIE['user'])) { // if user is logged in then logout user
        
        unset($_COOKIE['user']);
        
        // empty value and expiration of cookie
        $res = setcookie('user', '', time() - 1, "/");
    }

    //Define a page title and go to home page:
    define('TITLE','Logout');
    print '<p>You are now logged out.</p>';
    header('Location: index.php');
?>