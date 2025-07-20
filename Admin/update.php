<?php
// Establish a database connection
$db = new mysqli('localhost', 'root', '', 'ques2');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Get data from the form
$newUsername = $_POST['new_username'];
$newPassword = $_POST['new_password'];

// Update the user's record in the database
$sql = "UPDATE user SET username = '$newUsername', password = '$newPassword' WHERE id = 1"; // Change '1' to the user's ID you want to update

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}

$db->close();
?>
