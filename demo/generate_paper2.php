<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input for CO1 to CO6
    $co1_r_count = $_POST["co1_r_count"];
    $co1_u_count = $_POST["co1_u_count"];
    $co1_a_count = $_POST["co1_a_count"];

    $co2_r_count = $_POST["co2_r_count"];
    $co2_u_count = $_POST["co2_u_count"];
    $co2_a_count = $_POST["co2_a_count"];

    $co3_r_count = $_POST["co3_r_count"];
    $co3_u_count = $_POST["co3_u_count"];
    $co3_a_count = $_POST["co3_a_count"];

    $co4_r_count = $_POST["co4_r_count"];
    $co4_u_count = $_POST["co4_u_count"];
    $co4_a_count = $_POST["co4_a_count"];

    $co5_r_count = $_POST["co5_r_count"];
    $co5_u_count = $_POST["co5_u_count"];
    $co5_a_count = $_POST["co5_a_count"];

    $co6_r_count = $_POST["co6_r_count"];
    $co6_u_count = $_POST["co6_u_count"];
    $co6_a_count = $_POST["co6_a_count"];

    // Create a function to generate random questions
    function generateRandomQuestion($co, $type) {
        // You can replace this with your logic to fetch or generate questions
        return "Question for $co ($type)";
    }

    // Generate the question paper for CO1
    $co1_questions = [];
    for ($i = 1; $i <= $co1_r_count; $i++) {
        $co1_questions[] = generateRandomQuestion("CO1", "R");
    }
    for ($i = 1; $i <= $co1_u_count; $i++) {
        $co1_questions[] = generateRandomQuestion("CO1", "U");
    }
    for ($i = 1; $i <= $co1_a_count; $i++) {
        $co1_questions[] = generateRandomQuestion("CO1", "A");
    }

    // Generate the question paper for CO2
    $co2_questions = [];
    for ($i = 1; $i <= $co2_r_count; $i++) {
        $co2_questions[] = generateRandomQuestion("CO2", "R");
    }
    for ($i = 1; $i <= $co2_u_count; $i++) {
        $co2_questions[] = generateRandomQuestion("CO2", "U");
    }
    for ($i = 1; $i <= $co2_a_count; $i++) {
        $co2_questions[] = generateRandomQuestion("CO2", "A");
    }

    // Continue generating questions for CO3 to CO6 in a similar manner

    // Load TCPDF library
    require_once('../tcpdf/tcpdf.php');

    // Create a new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('GPN');
    $pdf->SetTitle('Generated Question Paper');
    $pdf->SetSubject('Question Paper');
    $pdf->SetKeywords('Question Paper, PDF');

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Add a page
    $pdf->AddPage();

    // College Name
    $college_name = 'Your College Name';
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->writeHTML($college_name, true, false, true, false, 'C');

    // Department Name
    $department_name = 'Your Department Name';
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->writeHTML($department_name, true, false, true, false, 'C');

    // Subject Name
    $subject_name = 'Your Subject Name';
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->writeHTML($subject_name, true, false, false, false, 'C');

    // Add spacing after the subject name
    $pdf->Ln(10); // You can adjust the spacing as needed

    // Content
    $pdf->SetFont('helvetica', '', 12); // Set font for questions

    // Add questions for CO1
    foreach ($co1_questions as $index => $question) {
        $pdf->writeHTML("<strong>CO1 - Question " . ($index + 1) . ":</strong> " . $question, true, false, true, false, '');
    }

    // Add questions for CO2
    foreach ($co2_questions as $index => $question) {
        $pdf->writeHTML("<strong>CO2 - Question " . ($index + 1) . ":</strong> " . $question, true, false, true, false, '');
    }

        // ... (Previous code)

    // Add questions for CO3
    $co3_questions = [];
    for ($i = 1; $i <= $co3_r_count; $i++) {
        $co3_questions[] = generateRandomQuestion("CO3", "R");
    }
    for ($i = 1; $i <= $co3_u_count; $i++) {
        $co3_questions[] = generateRandomQuestion("CO3", "U");
    }
    for ($i = 1; $i <= $co3_a_count; $i++) {
        $co3_questions[] = generateRandomQuestion("CO3", "A");
    }

    // Add questions for CO4
    $co4_questions = [];
    for ($i = 1; $i <= $co4_r_count; $i++) {
        $co4_questions[] = generateRandomQuestion("CO4", "R");
    }
    for ($i = 1; $i <= $co4_u_count; $i++) {
        $co4_questions[] = generateRandomQuestion("CO4", "U");
    }
    for ($i = 1; $i <= $co4_a_count; $i++) {
        $co4_questions[] = generateRandomQuestion("CO4", "A");
    }

    // Add questions for CO5
    $co5_questions = [];
    for ($i = 1; $i <= $co5_r_count; $i++) {
        $co5_questions[] = generateRandomQuestion("CO5", "R");
    }
    for ($i = 1; $i <= $co5_u_count; $i++) {
        $co5_questions[] = generateRandomQuestion("CO5", "U");
    }
    for ($i = 1; $i <= $co5_a_count; $i++) {
        $co5_questions[] = generateRandomQuestion("CO5", "A");
    }

    // Add questions for CO6
    $co6_questions = [];
    for ($i = 1; $i <= $co6_r_count; $i++) {
        $co6_questions[] = generateRandomQuestion("CO6", "R");
    }
    for ($i = 1; $i <= $co6_u_count; $i++) {
        $co6_questions[] = generateRandomQuestion("CO6", "U");
    }
    for ($i = 1; $i <= $co6_a_count; $i++) {
        $co6_questions[] = generateRandomQuestion("CO6", "A");
    }

    

    // Close and output PDF
    $pdf->Output('generated_question_paper.pdf', 'D'); // 'D' means force download

    // Exit to prevent further processing
    exit;
}
?>
