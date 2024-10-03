<?php
include '../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $hometown = $_POST['hometown'];
    $preferred_hall = $_POST['preferred_hall'];
    $room_type = $_POST['room_type'];
    $move_in_date = $_POST['move_in_date'];
    $password = $_POST['password'];

    // Hash the password
    $encode = password_hash($password, PASSWORD_DEFAULT);

    // Action flag (set to 1 for active by default)
    $action = 1;

    // Step 1: Check if the UID already exists
    $check_sql = "SELECT uid FROM c_info WHERE uid = ?";
    if ($stmt = $myconnect->prepare($check_sql)) {
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Error: A record with this UID already exists. Please use a different UID.";
            $stmt->close();
        } else {
            // Step 2: Proceed with insertion if UID is unique
            $stmt->close();
            $sql = "INSERT INTO c_info (uid, username, birthdate, gender, email, phone, hometown, preferred_hall, room_type, move_in_date, password, action)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $myconnect->prepare($sql)) {
                $stmt->bind_param('issssssssssi', $uid, $username, $birthdate, $gender, $email, $phone, $hometown, $preferred_hall, $room_type, $move_in_date, $encode, $action);

                if ($stmt->execute()) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Error inserting data: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error preparing statement: " . $myconnect->error;
            }
        }
    } else {
        echo "Error preparing UID check: " . $myconnect->error;
    }
}
?>
