<?php
    $title = "University Hall Management System";
    $author = "Copyright@Likhon";
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "hall";
    $myconnect = "";

    // Enable error reporting for mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $myconnect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
        echo "Couldn't connect to the database <b>{$db_name}</b>! Error: " . $e->getMessage();
    }

    if ($myconnect) {
        # echo "You are connected to the database <b>{$db_name}</b> successfully!";
    }
?>
