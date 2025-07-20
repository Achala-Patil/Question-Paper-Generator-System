<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input for CO1 to CO6
    $co_counts = [];
    for ($i = 1; $i <= 6; $i++) {
        $co_counts[$i] = [
            'r_count' => (int) $_POST["co{$i}_r_count"],
            'u_count' => (int) $_POST["co{$i}_u_count"],
            'a_count' => (int) $_POST["co{$i}_a_count"],
        ];
    }

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

    foreach ($co_counts as $co => $counts) {
        if ($counts['r_count'] > 0 || $counts['u_count'] > 0 || $counts['a_count'] > 0) {
            $conditions[] = buildSqlCondition("CO{$co}", $counts['r_count'], $counts['u_count'], $counts['a_count']);
        }
    }

    if (!empty($conditions)) {
        $sql .= implode(" OR ", $conditions);
    } else {
        // No conditions, so no questions should be selected
        $sql .= "1 = 0";
    }

    // Execute the query
    $result = $conn->query($sql);
    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }

    // Debugging line
    if (empty($questions)) {
        die("No questions found in the database.");
    }

    // Generate the question paper based on user input
    $all_questions = []; // Create a single array for all questions

    // Function to get questions based on CO and type
    function getQuestionsByCOAndType($co, $type, $count) {
        global $questions;
        $filtered_questions = [];
        foreach ($questions as $question) {
            if ($question["co"] == $co && $question["question_type"] == $type) {
                $filtered_questions[] = $question;
            }
        }
        return array_slice($filtered_questions, 0, $count);
    }

    // Build the question paper without internal shuffling
    for ($i = 1; $i <= 6; $i++) {
        $all_questions = array_merge($all_questions, getQuestionsByCOAndType("CO{$i}", 'R', $co_counts[$i]['r_count']));
        $all_questions = array_merge($all_questions, getQuestionsByCOAndType("CO{$i}", 'U', $co_counts[$i]['u_count']));
        $all_questions = array_merge($all_questions, getQuestionsByCOAndType("CO{$i}", 'A', $co_counts[$i]['a_count']));
    }

    // Shuffle the entire array of all questions
    shuffle($all_questions);

    // Create a new PDF document
    require_once('../tcpdf/tcpdf.php');
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
    $college_name = 'Bansilal Ramnath Agarwal Charitable Trust <br> Vishwakarma Institute of Technology <br> (An Autonomous Institute affiliated to Savitribai Phule Pune University)';
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->writeHTML($college_name, true, false, true, false, 'C');

    // Department Name
    $department_name = 'Department Program In Information Technology';
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->writeHTML($department_name, true, false, true, false, 'C');

    // Subject Name
    $subject_name = 'Java Programming Code-21435';
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->writeHTML($subject_name, true, false, false, false, 'C');

    // Set the font style and size for both corner texts
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->SetX(20);
    $pdf->SetY($pdf->GetY());
    $left_text = 'Duration: 3 Hour';
    $pdf->SetFont('helvetica', '', 12);
    $pdf->writeHTML($left_text, true, false, false, false, 'L');

    $pdf->SetX(120);
    $pdf->SetY($pdf->GetY());
    $right_text = 'Marks: 80';
    $pdf->SetFont('helvetica', '', 12);
    $pdf->writeHTML($right_text, true, false, false, false, 'L');

    // Add a line after the subject name
    $pdf->SetLineWidth(0.5);
    $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + $pdf->GetPageWidth() - 2 * PDF_MARGIN_LEFT, $pdf->GetY());

    // Add instruction content
    $content = '<br>';
    $pdf->writeHTML('Instruction', true, false, false, false, '');
    $pdf->writeHTML('1) All Questions are Compulsory.', true, false, false, false, '');

    // Add a line below the instruction content
    $contentY = $pdf->GetY();
    $pdf->SetLineWidth(0.5);
    $pdf->Line($pdf->GetX(), $contentY, $pdf->GetX() + $pdf->getPageWidth() - 2 * PDF_MARGIN_LEFT, $contentY);

    // Prepare CO headings
    $co_headings = array(
        'CO1' => '<br>1. Attempt any Five',
        'CO2' => '2. Attempt any Three',
        'CO3' => '3. Attempt any Three',
        'CO4' => '4. Attempt any Three',
        'CO5' => '5. Attempt any Three',
        'CO6' => '6. Attempt any Three'
    );

    // Create an empty content variable for the question list
    $i = 1;
    $n = 2;
    $content .= '<p>' . '1. Attempt any There' . '</p>';
    $content .= '<ol>';

    // Add questions to the content in a random manner
    foreach ($all_questions as $question) {
        if($i ==5  || $i ==9  || $i ==13  || $i ==17  || $i ==21)
        {
            $content .= '</ol>';
            $content .= '<p>' . '<br>' . $n . '. Attempt any There' . '</p>';
            $n++;
            $content .= '<ol>';
        }
        $i++;
        if($i==27){
            break;
        }

        $content .= '<li>' . $question["question_text"] . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 10px;">' . $question["co"] . ' -- ' . $question["question_type"] . '</span></li>';

    }
    $content .= '</ol>';


    // Write the question content to the PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Save the PDF to a file and provide a preview
    $pdfData = $pdf->Output('generated_paper.pdf', 'S');
    $uniqueFilename = 'generated_paper_' . time() . '_' . rand(1000, 9999) . '.pdf';
    $fileSavePath = 'C:/xampp/htdocs/ques2/file/' . $uniqueFilename;
    file_put_contents($fileSavePath, $pdfData);

    // Provide a link to download the PDF
    echo '<h2>PDF Preview</h2>';
    echo '<embed src="data:application/pdf;base64,' . base64_encode(string: $pdfData) . '" width="100%" height="700px" type="application/pdf">';


    // Close the database connection
    $conn->close();

    // Exit to prevent further processing
    exit;
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
    return '(' . implode(' OR ', $conditions) . ')';
}
?>
