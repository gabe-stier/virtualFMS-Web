<?php
session_start();
$dir = '/var/protected';
$me = "<script>alert('test')</script>";
$slev = "AdmiN TesT";
$ip = "192.168.0.19";
! Not needed.
//function files($loc) {
//    $me = "<script>alert(\'test\')</script>";
//    foreach (new DirectoryIterator($loc) as $file) if ($file->isFile()) {
//        print "<li>" . $file->getFilename() . "\t" . "<form action='download.php' method='post'><input type='hidden' name='filename' value='" . $file->getFilename() . "'><input type='hidden' name='file' value='" . $file->getPathname() . "'><button class='btn btn-primary' type='submit'>Download</button></form> " .
//        "</li>\n";
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
	<!link rel="stylesheet" href="./index.css"> // Not needed. 
	<link rel="stylesheet" href="../VFMS/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    // Take out for this section. Need Light Buttons here instead
    
	<script type="text/javascript">
//		function readFile() {
//			window.open('../VFMS/readfile.php', '_blank', 'height=400,width=400');
//		}
//
//		function openLoginWindow() {
//			window.open('../VFMS/login.html', '_blank', 'height=400,width=400');
//		}
//
//		function openSignUpWindow() {
//			window.open('../VFMS/signup.html', '_blank', 'height=400,width=400');
//		}
//		var toggler = document.getElementsByClassName("caret");
//		var i;

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
        ! Added variable slev for determining security level. Call for function at page load to determine user type & permissions based on either UID or Session. 
        
		<div class="row justify-content-center">
			<?php
if (testSessionId() == 0) { ?>
			<div class="col-sm-2">
				<button class="btn btn-success" onclick="openLoginWindow()">Login</button></div>
			<div class="col-sm-2"><button class="btn btn-secondary" onclick="openSignUpWindow()">Sign Up</button></div><?php
} else { ?> <button class="btn btn-danger" onclick="window.location.href='logout.php'">Logout</button>

			<?php
}
?>
		</div>
	</div>
	<hr>
</header>

<body>
	<div title="Light Buttons">
		<?php if (testSessionId() != 0) { ?>
		<ul id="treeFile" onclick="labels()">
			<?=files($dir); ?>
		</ul>
		<?php
} else { ?>
		<p> You can not access the light controller while you are not logged in! </p>
		<?php
} ?></div>
    <div>
        <div class="col-sm-2">
				<button class="btn btn-secondary" onclick="document.url.href('$ip/?red=0&green=0%blue=1')">Blue Test</button></div>
    </div>
</body>

</html>
