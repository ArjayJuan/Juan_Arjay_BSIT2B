<?php
session_start(); // Start the session
session_destroy(); // Clear the session data
header("Location: frontpage.html"); // Redirect to the login page or homepage
exit;
?>