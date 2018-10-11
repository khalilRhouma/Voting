<?php
// Start the session
session_start();
 if(!isset($_SESSION['login'])){ //if login in session is not set
    header("Location: login.html");
}


// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("Location: login.html");

?>


