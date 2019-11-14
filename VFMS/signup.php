<?php
	$conn = new mysqli('localhost', 'vfmsUSER', '?uvl=1Crod', 'VFMS');
	$usr = $_POST['username'];
	$name = $_POST['name'];
	$pwd = $_POST['signPwd'];
	$stmt = "SELECT username FROM USER WHERE username=?";
	$sql = mysqli_prepare($conn, $stmt);
	mysqli_stmt_bind_param($sql, "s", $usr);
	mysqli_stmt_execute($sql);
	mysqli_stmt_store_result($sql);
	if (mysqli_stmt_num_rows($sql) == 0) {
		$pwdH = password_hash($pwd, PASSWORD_BCRYPT);
		$create = $conn->prepare("INSERT INTO USER (name, username, password) VALUES (?, ?, ?)");
		$create->bind_param("sss", $name, $usr, $pwdH);
		$create->execute();
		$idStmt = mysqli_prepare($conn, "SELECT idUSER from USER where username=?");
		mysqli_stmt_bind_param($idStmt, "s", $usr);
		mysqli_stmt_execute($idStmt);
		mysqli_stmt_store_result($idStmt);
		mysqli_stmt_bind_result($idStmt, $uID);
		mysqli_stmt_fetch($idStmt);
		echo $uID;
		$perms = $conn->prepare("INSERT INTO VFMS.PERMS (idUser, download, upload) VALUES (?, 'T', 'F')");
		$false = "F";
		$true = "T";
		$perms->bind_param("i", $uID);
		$perms->execute();
		$lights = $conn->prepare("INSERT INTO VFMS.LIGHT_PERMS (userID, red, blue, green) VALUES (?, ?, ?, ?)");
		$color = rand(1,3);
		$red = 'F';
		$blue = 'F';
		$green = 'F';
		switch($color){
			case 1:
				$red = 'T';
				$blue = 'F';
				$green = 'F';
				break;
			case 2:
				$red = 'F';
				$blue = 'T';
				$green = 'F';
				break;
			case 3:
				$red = 'F';
				$blue = 'F';
				$green = 'T';
				break;
			default:
				$red = 'F';
				$blue = 'F';
				$green = 'F';
				break;
		}
        $lights->bind_param("isss", $uID, $red, $blue, $green);
        $lights->execute();
		echo "<script>window.close();</script>";
	} else {
		echo "Could not create that User";
		header('refresh: 5; url=signup.html');
	}
		$conn->close();
?>

