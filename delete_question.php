<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Database connection details
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
    $questionId = intval($_POST["id"]); // Ensure question ID is an integer

    // SQL query to delete the question by ID
    $sqlDelete = "DELETE FROM questions WHERE id = $questionId";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Question deleted successfully";
        
        // Reset IDs and adjust AUTO_INCREMENT after deletion
        if ($conn->query("SET @num := 0;") === FALSE) {
            echo "Error resetting IDs: " . $conn->error;
        }
        if ($conn->query("UPDATE questions SET id = @num := (@num + 1);") === FALSE) {
            echo "Error updating IDs: " . $conn->error;
        }
        if ($conn->query("ALTER TABLE questions AUTO_INCREMENT = 1;") === FALSE) {
            echo "Error setting AUTO_INCREMENT: " . $conn->error;
        }
        
    } else {
        echo "Error deleting question: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
