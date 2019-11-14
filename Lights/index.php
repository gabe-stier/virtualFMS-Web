<?php
session_start();
$dir = '/var/protected';
$me = "<script>alert('test')</script>";
$slev = "getGroup";

//function files($loc) {
//    $me = "<script>alert(\'test\')</script>";
//    foreach (new DirectoryIterator($loc) as $file) if ($file->isFile()) {
//        print "<li>" . $file->getFilename() . "\t" . "<form action='download.php' method='post'><input type='hidde$//        "</li>\n";
//    } else if ($file != '..' && $file != '.') {
//        print "<li><span class=\"caret\">" . $file->getFilename() . "</span><ul class=\"nested\">";
//        files($file->getPathname());
//        print "</ul></li>";
//    }
//}
function testSessionId() {
    if (isset($_SESSION['sesID'])) {
        return 1;
    } else {
        return 0;
    }
}
?>

<html>

<head>
        <title>Light Controller</title>
        <link rel="stylesheet" href="../VFMS/bootstrap-4.3.1-dist/css/bootstrap.min.css">

        <script type="text/javascript">
//              function readFile() {
//                      window.open('../VFMS/readfile.php', '_blank', 'height=400,width=400');
//              }
//
//              function openLoginWindow() {
//                      window.open('../VFMS/login.html', '_blank', 'height=400,width=400');
//              }
//
//              function openSignUpWindow() {
//                      window.open('../VFMS/signup.html', '_blank', 'height=400,width=400');
//              }
//              var toggler = document.getElementsByClassName("caret");
//              var i;

                function labels() {
                        for (i = 0; i < toggler.length; i++) {
                                toggler[i].addEventListener("click", function() {
                                        this.parentElement.querySelector(".nested").classList.toggle("active");
                                        this.classList.toggle("caret-down");
                                });
                        }
                }
        function buttons(slev) {
            if ($slev == "AdmiN TesT")
                {
               
                    // Show all buttons
                }
            else if ($slev == "System Admin")
                {
                    // Show r,g, b, off buttons
                }
            else if ($slev == "User")
                {
                    // Show b, off buttons
                }
        }

        </script>
</head>
<header>
        <div class="container vertical-center">

                <center>
                        <h1>Light Change</h1>
                </center>
                <br>
            <h3 style="padding-top: 100px;padding-left: 100px;">Your Privilege Level: <?php echo $slev ?></h3>

                <div class="row justify-content-center">
                        <?php
if (testSessionId() == 0) { ?>
                        <div class="col-sm-2">
                                <button class="btn btn-success" onclick="openLoginWindow()">Login</button></div>
                        <div class="col-sm-2"><button class="btn btn-secondary" onclick="openSignUpWindow()">Sign Up$
} else { ?> <button class="btn btn-danger" onclick="window.location.href='../VFMS/logout.php'">Logout</button>

                        <?php
}
?>
                        <div class="col-sm-2"><button class="btn btn-dark" onclick="window.location.href='../Calcula$            <div class="col-sm-2"><button class="btn btn-warning" onclick="window.location.href='../VFMS/'">File Sys$                </div>
        </div>
        <hr>
</header>

<body>
        <div title="Light Buttons" class="row justify-content-center">
                <?php if (testSessionId() != 0) { ?>
                <ul id="treeFile" onclick="labels()">
                        <?=files($dir); ?>
                </ul>
                <?php
} else { ?>
                <p> You can not access the light controller while you are not logged in! </p>
                <?php
} ?></div>
<!-- <form action="http://192.168.0.19" method="get"> -->
<!-- <form action="http://192.168.137.178 method="get"> -->
         <form target="lights" method="get">
    <div class="row justify-content-center">

            

            <div class="col-sm-1"><label>Red: </label>
                <input type="checkbox" name="red" id="red"></div>
            <div class="col-sm-1"><label>Blue: </label>
                <input type="checkbox" name="blue" id="blue"></div>
            <div class="col-sm-1"><label>Green: </label>
                <input type="checkbox" name="green" id="green"></div><br>


    </div>
            <center>
                <!--    <input class="btn btn-secondary" type="submit" placeholder="Submit"> -->
                        <input class="btn btn-secondary" type="submit" placeholder="Submit" onclick="setIframeSrc();$
                    <script>
                            function setIframeSrc(){
                                    if( document.getElementById('red').checked)
                                        var red = 'on';
                                    else
                                        var red = 'off';

                                    if( document.getElementById('blue').checked)
                                        var blue = 'on';
                                    else
                                        var blue = 'off';

                                    if( document.getElementById('green').checked)
                                        var green = 'on';
                                    else
                                        var green = 'off';
												     
												     
//                                      document.getElementById('red').value = red;
//                                      document.getElementById('blue').value = blue;
//                                      document.getElementById('green').value = green;
//                                  alert('red -> ' + red + '\nblue -> ' + blue + '\ngreen -> ' + green);
//                              alert(document.getElementById('red').value + '\n' + document.getElementById('blue').$                                    document.getElementById('lights').src ='http://192.168.137.145/?red='+red+'&blue$//                              document.getElementById('iframe').location = 'http
                            }
                    </script>
        </center></form>
<iframe name='lights' id='lights' src='http://192.168.137.145/' style='border: none;'></iframe>
</body>

</html>
