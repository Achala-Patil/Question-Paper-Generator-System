<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper Generator</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .jumbotron {
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-header {
            background-color: #333;
            color: #fff;
        }

        .btn-generate {
            background-color: #333;
            color: #fff;
            font-size: 18px;
        }

        .btn-generate:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="jumbotron text-center">
            <h1 class="display-4">Question Paper Generator</h1>
        </div>

        <form method="post" action="generate_paper.php">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO1
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co1_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co1_r_count" id="co1_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co1_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co1_u_count" id="co1_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co1_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co1_a_count" id="co1_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CO2 Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO2
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co2_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co2_r_count" id="co2_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co2_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co2_u_count" id="co2_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co2_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co2_a_count" id="co2_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CO3 Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO3
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co3_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co3_r_count" id="co3_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co3_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co3_u_count" id="co3_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co3_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co3_a_count" id="co3_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CO4 Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO4
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co4_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co4_r_count" id="co4_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co4_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co4_u_count" id="co4_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co4_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co4_a_count" id="co4_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CO5 Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO5
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co5_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co5_r_count" id="co5_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co5_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co5_u_count" id="co5_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co5_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co5_a_count" id="co5_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CO6 Section -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            CO6
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="co6_r_count">R Count:</label>
                                <input type="number" class="form-control" name="co6_r_count" id="co6_r_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co6_u_count">U Count:</label>
                                <input type="number" class="form-control" name="co6_u_count" id="co6_u_count" min="0">
                            </div>
                            <div class="form-group">
                                <label for="co6_a_count">A Count:</label>
                                <input type="number" class="form-control" name="co6_a_count" id="co6_a_count" min="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add a hidden input field to store generated questions -->
            <input type="hidden" name="generated_questions" id="generated_questions" value="">

            <button type="submit" class="btn btn-generate btn-lg btn-block">Generate Question Paper</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Popper.js and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Your JavaScript code for generating questions -->
    <script>
        // Assuming you have JavaScript code to generate questions and store them in an array
        var generatedQuestions = []; // Replace this with your actual array of generated questions

        // Example code for generating and adding a question to the array
        function generateQuestion() {
            var question = "This is a sample question."; // Replace with your question text
            generatedQuestions.push(question);
        }

        // Attach a click event to a button to generate a question (you can customize this)
        document.getElementById('generateButton').addEventListener('click', function() {
            generateQuestion();
        });

        // Populate the hidden input field with the generated questions when the form is submitted
        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('generated_questions').value = JSON.stringify(generatedQuestions);
        });
    </script>
</body>
</html>
