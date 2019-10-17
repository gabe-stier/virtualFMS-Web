<?php
    include 'db.php';
    $conn = dbconnect();
    $sql = $conn->prepare("SELECT * FROM VFMS.USER");
    $stmt = "SELECT * FROM VFMS.USER WHERE username=?";
$usr ='admin';
$sql = mysqli_prepare($conn,$stmt);
mysqli_stmt_bind_param($sql,"s",$usr);
mysqli_stmt_execute($sql);
mysqli_stmt_store_result($sql);

//    $sql->bind_param("s",$usr);
  //  $sql->execute();

if (mysqli_stmt_num_rows($sql) > 0) {
    // output data of each row
        mysqli_stmt_bind_result($sql,$uid,$name,$usr,$pwd,$salt);
if(    mysqli_stmt_fetch($sql))
        print "pwd: " . $pwd . " - salt: " . $salt . "<br>";

} else {
    echo "0 results";}
$conn->close();
?>
