<?php
	session_start();
	$dir = '/var/protected';
	$me = "<script>alert('test')</script>";
	function files($loc) {
	    $me = "<script>alert(\'test\')</script>";
	    foreach (new DirectoryIterator($loc) as $file) if ($file->isFile()) {
		print "<li>" . $file->getFilename() . "\t" . "<form action='download.php' method='post'><input type='hidden' name='filename' value='" . $file->getFilename() . "'><input type='hidden' name='file' value='" . $file->getPathname() . "'><button class='btn btn-primary' type='submit'>Download</button></form> " .
		"</li>\n";
	    } else if ($file != '..' && $file != '.') {
		print "<li><span class=\"caret\">" . $file->getFilename() . "</span><ul class=\"nested\">";
		files($file->getPathname());
		print "</ul></li>";
	    }
	}
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
	<title>Virtual File Management System</title>
	<link rel="stylesheet" href="./index.css">
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<script type="text/javascript">
		function readFile() {
			window.open('readfile.php', '_blank', 'height=400,width=400');
		}

		function openLoginWindow() {
			window.open('login.html', '_blank', 'height=400,width=400');
		}

		function openSignUpWindow() {
			window.open('signup.html', '_blank', 'height=400,width=400');
		}
		var toggler = document.getElementsByClassName("caret");
		var i;

		function labels() {
			for (i = 0; i < toggler.length; i++) {
				toggler[i].addEventListener("click", function() {
					this.parentElement.querySelector(".nested").classList.toggle("active");
					this.classList.toggle("caret-down");
				});
			}
		}

	</script>
</head>
<header>
	<div class="container vertical-center">

		<center>
			<h1>Basher's Group</h1>
		</center>
		<hr>
		<div class="row justify-content-center">
			<?php
				if (testSessionId() == 0) { ?>
					<div class="col-sm-2">
					<button class="btn btn-success" onclick="openLoginWindow()">Login</button></div>
					<div class="col-sm-2"><button class="btn btn-secondary" onclick="openSignUpWindow()">Sign Up</button></div><?php
				} else {
			?>
					<button class="btn btn-danger" onclick="window.location.href='logout.php'">Logout</button>
			<?php
				}
			?>
			
			<div class="col-sm-2"><button class="btn btn-dark" onclick="window.location.href='../Calculator/'">Calculator</button></div>
            		<div class="col-sm-2"><button class="btn btn-warning" onclick="window.location.href='../Lights/'">Light Controller</button></div>
		
		</div>
	</div>
	<hr>
</header>

<body>
	<div title="Files">
		<?php 
			if (testSessionId() != 0) { ?>
				<ul id="treeFile" onclick="labels()">
					<?=files($dir); ?>
				</ul>
		<?php
			} else {
		?>
			<p> You can not access the file system while you are not logged in! </p>
		<?php
			}
		?>
	</div>
</body>
</html>
