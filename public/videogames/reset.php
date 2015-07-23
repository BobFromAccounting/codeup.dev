<?php
    session_start();
    endSession();

    function endSession()
    {
        // Unset all of the session variables.
        $_SESSION = array();
        
        session_destroy();

        header("Location: index.php");
        exit();
    }
?>