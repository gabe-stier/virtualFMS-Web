<?php
    include 'db.php';
if(!empty($_POST)){
	session_start();
    $usr = $_POST['username'];
    $loginPwd = $_POST['loginPwd'];
//    $conn = dbconnect();
 $conn = new mysqli('localhost','vfmsUSER','?uvl=1Crod','VFMS');
	//print $conn;  
$stmt = "SELECT idUSER,password FROM USER WHERE username=?";
    $sql = mysqli_prepare($conn, $stmt);
	mysqli_stmt_bind_param($sql,"s",$usr);
    mysqli_stmt_execute($sql);
    mysqli_stmt_store_result($sql);
    if (mysqli_stmt_num_rows($sql) == 1) {
        mysqli_stmt_bind_result($sql,$uid,$pwd);
        if(mysqli_stmt_fetch($sql)){
            if(password_verify($loginPwd,$pwd)){
                $_SESSION['result']=true;
		print "You in";
}            else{
                $_SESSION['result']=false;
		print"bitch <br>";
		print $loginPwd ."<br>".$pwd;
}
        }
    } else {
        $_SESSION['result'] = false;
	print "hi";
    }
     dbclose($conn);
}
?>

