<?php
// Start the session
session_start();

// Destroy all session variables
session_destroy();

// Redirect to the login page
header("Location: loginindex.php");
exit;
?>
