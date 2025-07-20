<!DOCTYPE html>
<html>
<head>
    <title>PDF Listing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php 
    // Include the navigation bar
    include("nav.php");
?>

<div class="container">
    <h1>Previous Question Paper</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>PDF Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pdfFolder = '../file/';
            $pdfFiles = glob($pdfFolder . '*.pdf');
            
            foreach ($pdfFiles as $pdfFile) {
                $fileName = basename($pdfFile);
                echo '<tr>';
                echo '<td>' . $fileName . '</td>';
                echo '<td><a href="?pdf=' . $fileName . '">Open</a></td>';
                echo '</tr>';
            }
            
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
            ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_GET['pdf'])) {
    $selectedPDF = $_GET['pdf'];
    $pdfPath = $pdfFolder . $selectedPDF;

    if (file_exists($pdfPath)) {
        echo '<h2>' . $selectedPDF . '</h2>';
        echo '<embed src="' . $pdfPath . '" type="application/pdf" width="100%" height="800px">';
    } else {
        echo '<p>File not found.</p>';
    }
}
?>

<!-- Add Bootstrap JavaScript and jQuery links here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
