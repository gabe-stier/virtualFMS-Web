<?php
session_start();
$dir = '/var/protected';
function files($loc){
	foreach(new DirectoryIterator($loc) as $file)
		if($file->isFile()){
print "<li>".$file->getFilename()."</li>\n";
        }else if ($file != '..' && $file != '.'){
            print "<li><span class=\"caret\">".$file->getFilename()."</span><ul class=\"nested\">";
			files($file->getPathname());
            print "</ul></li>";
        }
}
function testSessionId(){
	if( isset($_SESSION['sesID'])){return 1;}else{return 0;}
}
var_dump($_SESSION);
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
        var toggler = document.getElementsByClassName("caret");
        var i;
		function labels(){
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
	<h1>Basher's Group</h1>
<?php
 if(testSessionId() == 0){?>
 	<button onclick="openLoginForm()">Login</button><button>Sign Up</button><?php 
 }else{?>
	<button onclick="window.location.href='logout.php'">Logout</button>

<?php }
?>
<button>Calculator</button>
</header>

<body>
	<div class="form-popup" id="loginForm">
		<form action="login.php" class="form-container" method='post'>
			<h1>Login</h1>

			<label for="email"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="pwd"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="loginPwd" required>

			<button type="submit" class="btn">Login</button>
			<button type="submit" class="btn cancel" onclick="closeLoginForm()">Close</button>
		</form>
	</div>
	<div title="Files" class="fileViewer"><?php if(testSessionId() !=0) { ?><ul id="treeFile" onclick="labels()"><?= files($dir); ?></ul><?php }else{?> <p> You can not access the file system while you are not logged in! </p><?php }?></div>
</body></html>
