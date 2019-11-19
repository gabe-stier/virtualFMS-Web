<?php
$dir = "/var/protected/";
$file = $dir.basename($_FILES['fileToUpload']['name']);
$tempFile = $file;
function upload(){
	if(isset($_POST['submit'])) {
		fileName(0);
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$file){
			echo "File has been uploaded";
		}else{
			echo "Could not upload the file";
		}
	}
}
function fileName($num){
	$num += 1;
	if(file_exists($file)){
		$file = $tempFile. "(".$num.")";
		return fileName($num);
	}
}

upload();
?>
