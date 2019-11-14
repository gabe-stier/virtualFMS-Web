<?php
    if (!empty($_POST)) {
        session_start();
        if (isset($_POST['username']) && isset($_POST['loginPwd'])) {
            print "test1";
            $usr = $_POST['username'];
            $loginPwd = $_POST['loginPwd'];
            $conn = new mysqli('localhost', 'vfmsUSER', '?uvl=1Crod', 'VFMS');
            $stmt = "SELECT idUSER,password FROM USER WHERE username=?";
            $sql = mysqli_prepare($conn, $stmt);
            mysqli_stmt_bind_param($sql, "s", $usr);
            mysqli_stmt_execute($sql);
            mysqli_stmt_store_result($sql);
            if (mysqli_stmt_num_rows($sql) == 1) {
                mysqli_stmt_bind_result($sql, $uid, $pwd);
                if (mysqli_stmt_fetch($sql)) {
                    if (password_verify($loginPwd, $pwd)) {
                        $_SESSION['result'] = true;
                        $_SESSION['resultCode'] = 1;
                        $_SESSION['sesID'] = $uid;
                        header('location: userPerms.php');
                    } else {
                        session_destroy();
                        $_POST['result'] = false;
                        $_POST['resultCode'] = 10;
                        header('location: index.php');
                    }
                }
            } else {
                session_destroy();
                $_POST['result'] = false;
                if (mysqli_stmt_num_rows($sql) > 1) $_POST['resultCode'] = 26;
                else $_POST['resultCode'] = 25;
                header('location: index.php');
            }
            mysqli_close($conn);
        } else {
            $_POST['result'] = false;
            $_POST['resultCode'] = 20;
            header('location: index.php');
        }
    }
?>
