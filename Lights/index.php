<?php
        session_start();
        var_dump($_SESSION);
        $dir = '/var/protected';
        $me = "<script>alert('test')</script>";
    $gname;

        function testSessionId() {
            if (isset($_SESSION['sesID'])) {
                return 1;
            } else {
                return 0;
            }
        }
/*    function displayGroup() {
        switch($guid) {
            case 1:
                $gname = "User";
                break;
            case 2:
                $gname = "System Admin";
                break;
            case 3:
                $gname = "Domain Admin";
                break;
            default:
                $gname = "Not Defined";
        }
    }*/
?>

<html>

<head>
        <title>Light Controller</title>
        <link rel="stylesheet" href="../VFMS/bootstrap-4.3.1-dist/css/bootstrap.min.css">

        <script type="text/javascript">
                function labels() {
                        for (i = 0; i < toggler.length; i++) {
                                toggler[i].addEventListener("click", function() {
                                        this.parentElement.querySelector(".nested").classList.toggle("active");
                                        this.classList.toggle("caret-down");
                                });
                        }
                }

                function openLoginWindow() {
                        window.open('../VFMS/login.html', '_blank', 'height=400,width=400');
                }

                function openSignUpWindow() {
                        window.open('../VFMS/signup.html', '_blank', 'height=400,width=400');
                }

        </script>
</head>
<header>
        <div class="container vertical-center">
			<center>
                        <h1>Light Change</h1>
                </center>
                <br>
                <h3 style="padding-top: 100px;padding-left: 100px;">Your Privilege Level: <?php echo $name ?></h3>

                <div class="row justify-content-center">
                        <?php
                                if (testSessionId() == 0) { ?>
                        <div class="col-sm-2">
                                <button class="btn btn-success" onclick="openLoginWindow()">Login</button></div>
                        <div class="col-sm-2"><button class="btn btn-secondary" onclick="openSignUpWindow()">Sign Up</button></div><?php
                                } else { ?> <button class="btn btn-danger" onclick="window.location.href='../VFMS/logout.php'">Logout</button>

                        <?php
                                }
                        ?>
                        <div class="col-sm-2"><button class="btn btn-dark" onclick="window.location.href='../Calculator/'">Calculator</button></div>
                        <div class="col-sm-2"><button class="btn btn-warning" onclick="window.location.href='../VFMS/'">File System</button></div>
                </div>
        </div>
        <hr>
</header>

<body>
        <div title="Light Buttons" class="row justify-content-center">
                <?php
                        if (testSessionId() != 0) {
                ?>
                <form target="lights" method="get">
                        <div class="row justify-content-center">
                                <?php   if ($_SESSION['red'] == 'T') { ?>
                                <div class="col-sm-1">

                                        <label>Red: </label>
                                        <input type='checkbox' name='red' id='red'>
                                        <?php
                                                }
                                        ?>
                                </div>
                                <?php
                                                if ($_SESSION['blue'] == 'T') {
                                        ?>
                                <div class="col-sm-1">
                                        <label>Blue: </label>
                                        <input type='checkbox' name='blue' id='blue'>
                                        <?php
                                                }
                                        ?>
                                </div>
                                <?php
                                                if ($_SESSION['green'] == 'T') {
                                        ?>
                                <div class="col-sm-1">
                                        <label>Green: </label>
                                        <input type='checkbox' name='green' id='green'> <?php
                                                }
                                        ?> </div> <?php
                                                        //displayGroup(guid);?>
							<center>
                                        <!--    <input class="btn btn-secondary" type="submit" placeholder="Submit"> -->
                                        <input class="btn btn-secondary" type="submit" placeholder="Submit" onclick="setIframeSrc(); return false;">
                                        <script>
                                                function setIframeSrc() {
                                                        if (document.getElementById('red').checked)
                                                                var red = 'on';
                                                        else
                                                                var red = 'off';

                                                        if (document.getElementById('blue').checked)
                                                                var blue = 'on';
                                                        else
                                                                var blue = 'off';

                                                        if (document.getElementById('green').checked)
                                                                var green = 'on';
                                                        else
                                                                var green = 'off';
                                                        document.getElementById('lights').src = 'http://192.168.137.145/?red=' + red + '&blue=' + blue + '&green=' + green + ' ';
                                                }

                                        </script>
                                        </center>
                                </div>
                </form>
                <center><iframe name='lights' id='lights' src='http://192.168.137.145/' style='border: none; font-family: "Courier New", monospace;'></iframe></center><?php
                                                } else {
                                        ?>
                <p> You can not access the light controller while you are not logged in! </p>

                <?php
                                                }
                                        ?>
                <!--     <form action="http://192.168.0.19" method="get"> -->
                <!--     <form action="http://192.168.137.178 method="get"> -->

                <!--
                    <div class="col-sm-1"><label>Red: </label>
                        <input type="checkbox" name="red" id="red"></div>
                    <div class="col-sm-1"><label>Blue: </label>
                <input type="checkbox" name="blue" id="blue"></div>
                    <div class="col-sm-1"><label>Green: </label>
                        <input type="checkbox" name="green" id="green"></div><br>
-->


        </div>
</body>

</html>
