<?php
$dir = '/var/protected';
function files($loc){
	foreach(new DirectoryIterator($loc) as $file)
		if($file->isFile())
			print $file->getPathname()."\n";
		else if ($file != '..' && $file != '.')
			files($file->getPathname());
}
?>

<html><head>
	<title>Virtual File Management System</title>
	<link rel="stylesheet" href="styles/indexVFMS.css">
	<script type="text/javascript">
		function openLoginForm() {
			document.getElementById("loginForm").style.display = "block";
		}

		function closeLoginForm() {
			document.getElementById("loginForm").style.display = "none";
		}
		
	</script>
</head>
<header>
	<h1>Basher's Group</h1><button onclick="openLoginForm()" href="indexVFMS.js">Login</button><button>Sign Up</button><button style="display: none">Log Out</button><button>Calculator</button>
</header>

<body>
	<div class="form-popup" id="loginForm">
		<form action="/action_page.php" class="form-container">
			<h1>Login</h1>

			<label for="email"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="pwd"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pwd" required>

			<button type="submit" class="btn">Login</button>
			<button type="submit" class="btn cancel" onclick="closeLoginForm()">Close</button>
		</form>
	</div>
	<div title="Files" class="fileViewer"><ul id="treeFile"><?= echo files($dir) ?></ul></div>
</body></html>