<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ques2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
