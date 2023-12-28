<?php
require_once 'vendor/autoload.php'; // Include Composer's autoloader

use TCPDF\TCPDF;

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Creator');
$pdf->SetAuthor('Your Author');
$pdf->SetTitle('Your Title');
$pdf->SetSubject('Your Subject');
$pdf->SetKeywords('Your Keywords');

// Add a page
$pdf->AddPage();

// Set some content to a variable (you can add your HTML content here)
$content = '
    <div class="container contact-form">
        <!-- Your HTML form content here -->
    </div>
';

// Write the HTML content to the PDF
$pdf->writeHTML($content, true, false, true, false, '');

// Set the file name and path for the generated PDF
$file = 'bill.pdf';

// Output the PDF as a file to the server
$pdf->Output($file, 'F');

// Download the generated PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $file . '"');
readfile($file);
exit();
?>
