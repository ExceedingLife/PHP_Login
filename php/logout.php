<?php
    // Initialize the SESSION
    session_start();

    // Unset all the SESSION variables
    $_SESSION = array();

    // Destroy the SESSION
    session_destroy();

    // Redirect to index.php
    header("Location: ../index.php");
    exit;
    
?>
