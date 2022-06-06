
<?php
//Initialize sessions, destroy them, and redirect the user to the login page. 
//We use sessions to determine whether the user is logged in or not, so by removing them, 
//the user will not be logged in.
session_start();
session_destroy();
// Redirect to the login page:
header('Location: ./index.html');
?>