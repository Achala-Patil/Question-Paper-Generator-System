<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input for CO1
    $co1_r_count = (int)$_POST["co1_r_count"];
    $co1_u_count = (int)$_POST["co1_u_count"];
    $co1_a_count = (int)$_POST["co1_a_count"];

    // Retrieve user input for CO2
    $co2_r_count = (int)$_POST["co2_r_count"];
    $co2_u_count = (int)$_POST["co2_u_count"];
    $co2_a_count = (int)$_POST["co2_a_count"];

    // Retrieve user input for CO3
    $co3_r_count = (int)$_POST["co3_r_count"];
    $co3_u_count = (int)$_POST["co3_u_count"];
    $co3_a_count = (int)$_POST["co3_a_count"];

    // Retrieve user input for CO4
    $co4_r_count = (int)$_POST["co4_r_count"];
    $co4_u_count = (int)$_POST["co4_u_count"];
    $co4_a_count = (int)$_POST["co4_a_count"];

    // Retrieve user input for CO5
    $co5_r_count = (int)$_POST["co5_r_count"];
    $co5_u_count = (int)$_POST["co5_u_count"];
    $co5_a_count = (int)$_POST["co5_a_count"];

    // Retrieve user input for CO6
    $co6_r_count = (int)$_POST["co6_r_count"];
    $co6_u_count = (int)$_POST["co6_u_count"];
    $co6_a_count = (int)$_POST["co6_a_count"];

    // Database connection parameters
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

    // Generate the SQL query based on user input
    $sql = "SELECT * FROM questions WHERE ";
    $conditions = [];

    if ($co1_r_count > 0 || $co1_u_count > 0 || $co1_a_count > 0) {
        $conditions[] = buildSqlCondition('CO1', $co1_r_count, $co1_u_count, $co1_a_count);
    }
    if ($co2_r_count > 0 || $co2_u_count > 0 || $co2_a_count > 0) {
        $conditions[] = buildSqlCondition('CO2', $co2_r_count, $co2_u_count, $co2_a_count);
    }
    if ($co3_r_count > 0 || $co3_u_count > 0 || $co3_a_count > 0) {
        $conditions[] = buildSqlCondition('CO3', $co3_r_count, $co3_u_count, $co3_a_count);
    }
    if ($co4_r_count > 0 || $co4_u_count > 0 || $co4_a_count > 0) {
        $conditions[] = buildSqlCondition('CO4', $co4_r_count, $co4_u_count, $co4_a_count);
    }
    if ($co5_r_count > 0 || $co5_u_count > 0 || $co5_a_count > 0) {
        $conditions[] = buildSqlCondition('CO5', $co5_r_count, $co5_u_count, $co5_a_count);
    }
    if ($co6_r_count > 0 || $co6_u_count > 0 || $co6_a_count > 0) {
        $conditions[] = buildSqlCondition('CO6', $co6_r_count, $co6_u_count, $co6_a_count);
    }

    if (!empty($conditions)) {
        $sql .= implode(" OR ", $conditions);
    } else {
        // No conditions, so no questions should be selected
        $sql .= "1 = 0";
    }

    // Execute the query
    $result = $conn->query($sql);

    // Store the retrieved questions
    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }

    // Shuffle the questions randomly
    shuffle($questions);

    // Generate the question paper based on user input
    $question_paper = [];

    // Create a function to get random questions based on CO and type
    function getQuestionsByCOAndType($co, $type, $count) {
        global $questions;
        $filtered_questions = [];
        foreach ($questions as $question) {
            if ($question["co"] == $co && $question["question_type"] == $type) {
                $filtered_questions[] = $question;
            }
        }
        shuffle($filtered_questions);
        return array_slice($filtered_questions, 0, $count);
    }

    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO1', 'R', $co1_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO1', 'U', $co1_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO1', 'A', $co1_a_count));
    
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO2', 'R', $co2_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO2', 'U', $co2_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO2', 'A', $co2_a_count));
    
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO3', 'R', $co3_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO3', 'U', $co3_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO3', 'A', $co3_a_count));
    
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO4', 'R', $co4_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO4', 'U', $co4_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO4', 'A', $co4_a_count));
    
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO5', 'R', $co5_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO5', 'U', $co5_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO5', 'A', $co5_a_count));
    
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO6', 'R', $co6_r_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO6', 'U', $co6_u_count));
    $question_paper = array_merge($question_paper, getQuestionsByCOAndType('CO6', 'A', $co6_a_count));

    // Display the generated question paper
    echo "<h2>Generated Question Paper</h2>";
    echo "<ol>";
    foreach ($question_paper as $question) {
        echo "<li>" . $question["question_text"] . "</li>";
    }
    echo "</ol>";

    // Close the database connection
    $conn->close();
}
 
function buildSqlCondition($co, $r_count, $u_count, $a_count) {
    $conditions = [];
    if ($r_count > 0) {
        $conditions[] = " (co = '$co' AND question_type = 'R') ";
    }
    if ($u_count > 0) {
        $conditions[] = " (co = '$co' AND question_type = 'U') ";
    }
    if ($a_count > 0) {
        $conditions[] = " (co = '$co' AND question_type = 'A') ";
    }
    if (!empty($conditions)) {
        return "(" . implode(" OR ", $conditions) . ")";
    }
    return ""; // Return an empty string if all counts are 0
}
?>
