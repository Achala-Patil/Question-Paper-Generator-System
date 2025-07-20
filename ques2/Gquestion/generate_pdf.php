<?php
require_once('../tcpdf/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the generated questions from the form data
    $generatedQuestions = json_decode($_POST['generated_questions'], true);

    // Create a new PDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Question Paper');
    $pdf->SetSubject('Generated Questions');
    $pdf->SetKeywords('Questions, PDF');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 12);

    // Loop through the generated questions and add them to the PDF
    foreach ($generatedQuestions as $question) {
        $pdf->MultiCell(0, 10, $question, 0, 'L');
        $pdf->Ln();
    }

    // Output the PDF to the browser
    $pdf->Output('question_paper.pdf', 'I');
}
?>
