<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>

    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            /* Remove default margin */
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f0f0f0, #c0c0c0);
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: 80px auto;
            /* Center the container */
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        select,
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="button"] {
            background-color: grey;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: grey;
        }

        #statusMessage {
            text-align: center;
            color: grey;
            margin-top: 15px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <?php
    // Include the navigation bar
    include("nav.php");
    ?>

    <div class="container">
        <h1>Add a Question</h1>
        <form id="addQuestionForm">
            <label for="co">CO (Course Outcome):</label>
            <select name="co" required>
                <option value="CO1">CO1</option>
                <option value="CO2">CO2</option>
                <option value="CO3">CO3</option>
                <option value="CO4">CO4</option>
                <option value="CO5">CO5</option>
                <option value="CO6">CO6</option>

                <!-- Add more CO options here as needed -->
            </select>

            <label for="question_type">Question Type (R/U/A):</label>
            <select name="question_type" required>
                <option value="R">R</option>
                <option value="U">U</option>
                <option value="A">A</option>
            </select>

            <label for="question_text">Question Text:</label>
            <textarea name="question_text" rows="4" cols="50" required></textarea>

            <input type="button" value="Add Question" onclick="validateAndAddQuestion()">
        </form>

        <div id="statusMessage"></div>
    </div>

    <script>
        function validateAndAddQuestion() {
            var questionText = document.querySelector('textarea[name="question_text"]').value.trim();

            if (questionText === '') {
                alert('Please enter a question text.');
            } else {
                var formData = $('#addQuestionForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '../add_question.php',
                    data: formData,
                    success: function(response) {
                        $('#statusMessage').html(response);
                    }
                });
            }
        }
    </script>
</body>

</html>