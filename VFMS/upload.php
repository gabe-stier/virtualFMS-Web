<?php
$dir = "/var/protected/";
$file = $dir.basename($_FILES['fileToUpload']['name']);
var_dump($_FILES);
echo $file;
$tempFile = $file;
function upload(){
	if(isset($_POST['submit'])) {
		$tempfile =	fileName(0, "/var/protected/".basename($_FILES["fileToUpload"]["name"]));
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$tempfile)){
//			print "File has been uploaded";
			echo "<script>window.close();</script>";
		}else{
			print "Could not upload the file";
			echo "<script> setTimeout(function(){ window.close(); }, 2000); </script>";
		}
	}
}
function fileName($num, $lFile){
	$num += 1;
	if(file_exists($lFile)){
		$lFile = "/var/protected/"."(".$num.")_".basename($_FILES['fileToUpload']['name']);
		return fileName($num, $lFile);
	}
	return $lFile;
}

upload();
?>
