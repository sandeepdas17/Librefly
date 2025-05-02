<?php
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']); // Extract the file name from the query
    $filePath = 'pdfs/' . $fileName;     // Construct the file path

    if (file_exists($filePath)) {
        // Set headers to trigger the download
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Expires: 0');
        readfile($filePath);
        exit;
    } else {
        echo "Error: File not found.";
    }
} else {
    echo "Error: No file specified.";
}
?>
