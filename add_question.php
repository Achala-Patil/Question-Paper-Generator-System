<?php
include('database_config.php'); // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $co = $_POST["co"];
    $questionType = $_POST["question_type"];
    $questionText = $_POST["question_text"];

    // Validate and sanitize input data (you should add more validation)
    $co = htmlspecialchars($co);
    $questionType = htmlspecialchars($questionType);
    $questionText = htmlspecialchars($questionText);

    // Insert the question into the database
    $sql = "INSERT INTO questions (co, question_type, question_text) VALUES ('$co', '$questionType', '$questionText')";

    if ($conn->query($sql) === TRUE) {
        echo "Question added successfully.";
    } else {
        echo "Error adding question: " . $conn->error;
    }
}
// Close the database connection (important to close it when done)
$conn->close();
?>