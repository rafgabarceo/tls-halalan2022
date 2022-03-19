<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
        $_SESSION["TIME_ACCESSED"] = time();
    } else if(session_status() == PHP_SESSION_ACTIVE){
        $dateInitiallyAccessed = new DateTime($_SESSION["TIME_ACCESSED"]);
        $dateNow = new DateTime(time());
        $difference = date_diff($dateInitiallyAccessed, $dateNow);
        // TODO: WRITE TIME CHECKER FUNCTION
    }
?>