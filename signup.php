<?php
    include 'db.php';
    session_start();
    $conn = dbconnect();
	$conn = new mysqli('localhost', 'gabe','i590t','VFMS');
    $usr = 'gabe'; //$_SESSION['username'];
    $name = 'gabe'; //$_SESSION['name'];
    $pwd = 'i590t'; //$_SESSION['pwd'];
    $stmt = "SELECT username FROM USER WHERE username=?";
    $sql = mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql,"s",$usr);
    mysqli_stmt_execute($sql);
    mysqli_stmt_store_result($sql);
    if (mysqli_stmt_num_rows($sql) == 0) {
        $pwdH = password_hash($pwd,PASSWORD_BCRYPT);
        $create = $conn->prepare("INSERT INTO USER (name, username, password) VALUES (?, ?, ?)");
        $create->bind_param("sss",$name,$usr,$pwdH);
	$create->execute();
    }else{
        $_SESSION['result']=false;
    }
    dbclose($conn);
?>

