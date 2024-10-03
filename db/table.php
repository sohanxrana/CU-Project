<?php
// Include the database configuration file to connect to the database
include("config.php");

// Create the customer information table (c_info)
$tbl_cinfo = "CREATE TABLE IF NOT EXISTS c_info (
    uid INT(11) NOT NULL,
    username VARCHAR(30) NOT NULL,
    birthdate DATE,
    gender VARCHAR(10),
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    hometown VARCHAR(30),
    preferred_hall VARCHAR(50),
    room_type VARCHAR(15),
    move_in_date DATE,
    password VARCHAR(255) NOT NULL,
    action TINYINT(1) DEFAULT 1,  -- Action flag
    PRIMARY KEY (uid)
)";

// Execute the query to create the c_info table
$cinfo = mysqli_query($myconnect, $tbl_cinfo);

if ($cinfo === TRUE) {
    echo "<p>Customer information table created successfully</p>";
} else {
    echo "<p>Error creating customer information table: " . mysqli_error($myconnect) . "</p>";
}
