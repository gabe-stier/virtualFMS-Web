<?php
session_start();
$usr_id = $_SESSION['sesID'];
$conn = new mysqli('localhost', 'vfmsUSER', '?uvl=1Crod', 'VFMS');
$stmt = "SELECT download,upload FROM PERMS where idUser=?";
$sql = mysqli_prepare($conn, $stmt);
mysqli_stmt_bind_param($sql, "i", $usr_id);
mysqli_stmt_execute($sql);
mysqli_stmt_store_result($sql);
if (mysqli_stmt_num_rows($sql) == 1) {
    mysqli_stmt_bind_result($sql, $down, $up);
    mysqli_stmt_fetch($sql);
    $_SESSION['download'] = $down;
    $_SESSION['upload'] = $up;
} else {
    $_SESSION['billy'] = "error";
}
$light = "SELECT red, blue, green FROM VFMS.LIGHT_PERMS WHERE userID=?";
$Lsql = mysqli_prepare($conn, $light);
mysqli_stmt_bind_param($Lsql, "i", $usr_id);
mysqli_stmt_execute($Lsql);
mysqli_stmt_store_result($Lsql);
if (mysqli_stmt_num_rows($Lsql) == 1) {
    mysqli_stmt_bind_result($Lsql, $red, $blue, $green);
    mysqli_stmt_fetch($Lsql);
    $_SESSION['red'] = $red;
    $_SESSION['blue'] = $blue;
    $_SESSION['green'] = $green;
} else {
    $_SESSION['billy'] = "error";
}
mysqli_close($conn);

?>
<html>
<script type='text/javascript'>
                window.onunload = refreshParent;

                function refreshParent() {
                        window.opener.location.reload();
                }
                window.close();

        </script>

</html>
