<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions Table</title>

    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add your CSS styles here for styling the table -->
    <style>
        /* Add your CSS styles for the table here */
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #33322d;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .delete-button {
            background-color: grey;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #ff3333;
        }
    </style>
</head>
<body>
    <?php 
    include("nav.php");
    ?>

    <div class="container">
        <h1>Questions Table</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question Text</th>
                    <th>Category</th>
                    <th>CO</th>
                    <th>Action</th> <!-- New column for delete button -->
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
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

                // SQL query to fetch questions from the database
                $sql = "SELECT id, question_text, question_type, co FROM questions";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["question_text"] . "</td>";
                        echo "<td>" . $row["question_type"] . "</td>";
                        echo "<td>" . $row["co"] . "</td>";
                        echo '<td><button class="delete-button" onclick="deleteQuestion(' . $row["id"] . ')">Delete</button></td>'; // Delete button
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No questions found.</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript function to handle question deletion
        function deleteQuestion(questionId) {
            if (confirm("Are you sure you want to delete this question?")) {
                // Send an AJAX request to delete the question
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Reload the page after successful deletion
                        location.reload();
                    }
                };
                xhr.open("POST", "delete_question.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("id=" + questionId);
            }
        }
    </script>
</body>
</html>
