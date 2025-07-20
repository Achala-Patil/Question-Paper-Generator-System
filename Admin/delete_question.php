<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Replace this with your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ques2";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the question ID from the POST data
    $questionId = $_POST["id"];

    // SQL query to delete the question by ID
    $sql = "DELETE FROM questions WHERE id = $questionId";

    if ($conn->query($sql) === TRUE) {
        echo "Question deleted successfully";
    } else {
        echo "Error deleting question: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
