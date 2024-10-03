<?php
include ("../db/config.php");

// Fetch all the records from c_info
$sql = "SELECT uid, username, birthdate, gender, email, phone, hometown, preferred_hall, room_type, move_in_date, action FROM c_info";
$result = mysqli_query($myconnect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="2px" width="100%">
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Hometown</th>
        <th>Preferred Hall</th>
        <th>Room Type</th>
        <th>Move-in Date</th>
        <th>Status</th>
        <th colspan="3">Actions</th>
    </tr>';

    // Loop through all rows and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        $uid = $row['uid'];
        $username = $row['username'];
        $birthdate = $row['birthdate'];
        $gender = $row['gender'];
        $email = $row['email'];
        $phone = $row['phone'];
        $hometown = $row['hometown'];
        $preferred_hall = $row['preferred_hall'];
        $room_type = $row['room_type'];
        $move_in_date = $row['move_in_date'];
        $action = $row['action'];

        // Convert action flag to human-readable status
        $status = ($action == 1) ? 'Active' : 'Inactive';

        echo '<tr>
            <td>'.$uid.'</td>
            <td>'.$username.'</td>
            <td>'.$birthdate.'</td>
            <td>'.$gender.'</td>
            <td>'.$email.'</td>
            <td>'.$phone.'</td>
            <td>'.$hometown.'</td>
            <td>'.$preferred_hall.'</td>
            <td>'.$room_type.'</td>
            <td>'.$move_in_date.'</td>
            <td>'.$status.'</td>
            <td><a href="edit.php?id='.$uid.'">Edit</a></td>
            <td><a href="../model/delete.php?id='.$uid.'" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a></td>
            <td><a href="../model/softdelete.php?id='.$uid.'" onclick="return confirm(\'Are you sure you want to soft delete this record?\')">Soft Delete</a></td>
        </tr>';
    }

    echo '</table>';
} else {
    echo "No records found.";
}

mysqli_close($myconnect);
?>
