<?php
// Start session
session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect to the homepage
header("Location: index.php");
exit();
?>
