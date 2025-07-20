<?php
    session_start();
    
    // Check if the user is NOT authenticated
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        // Redirect to the login page if not authenticated
        header('Location: ../login.php');
        exit;
    }
?>
