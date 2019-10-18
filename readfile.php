<html><?php
session_start();
if (isset($_SESSION['sesID'])) {
    var_dump($_POST);
    echo '<br>';
    echo 'The contents of the file:<i> ' . $_POST['filename'] . '</i> is: <br>';
    echo file_get_contents($_POST['read']);
} else {
    header('location: index.php');
}
?></html>
