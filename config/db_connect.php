<?php

    // connect to database
    $db = mysqli_connect('localhost', 'endrew', '', 'aninaw_db');

    // check connection
    if(!$db) {
        echo 'Connection Error: ' . mysqli_connect_error();
    }
    
?>