<?php
    /*This is the logout page. it destroys the cookie*/

     include("../database/config.php"); //Include database connections
     
    // Destroy the cookie, but only if it already exists:

    $boolean = "FALSE"; // update user logged in state
    
    //build query
    // logout the user 
    $Update_query = "UPDATE admin_tb SET IsAdmin_loggedIn='$boolean' WHERE Admin_id='{$_COOKIE['admin']}'";
    
    echo '<script type="text/javascript">';
                echo 'console.log('.$_COOKIE['admin'].')'; 
    echo '</script>';

    mysqli_query($dbc, $Update_query); // run query 

    if (isset($_COOKIE['admin'])) { // if user is logged in then logout user
        
        unset($_COOKIE['admin']);
        
        // empty value and expiration one hour before
        $res = setcookie('admin', '', time() - 1, "/");
    }

    //Define a page title and include the header:
    define('TITLE','Logout');
    
    print '<p>You are now logged out.</p>';
    header('Location: index.php');
?>