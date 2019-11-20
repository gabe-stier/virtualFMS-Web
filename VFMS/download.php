<?php
include 'logging.php';
session_start();
if (!empty($_SESSION)) {
    $fileName = $_POST['filename'];
    $file = $_POST['file'];
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
	wh_log("User ID:\t".$_SESSION['sesID']."\nFile:\t\t".basename($file),"Download");
        exit;
    }
} else {
    echo "Can't not access file";
    header("refresh 5; url='index.php'");
}
?>
