<?php
session_start();
$dir = '/var/protected';
$me = "<script>alert('test')</script>";
function files($loc) {
    $me = "<script>alert(\'test\')</script>";
    foreach (new DirectoryIterator($loc) as $file) if ($file->isFile()) {
        print "<li>" . $file->getFilename() . "\t" . "<form action='download.php' method='post'><input type='hidden' name='filename' value='" . $file->getFilename() . "'><input type='hidden' name='file' value='" . $file->getPathname() . "'><button type='submit'>Download</button></form> " .
        //	."<button>Download</button>
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
var_dump($_SESSION);
?>

<html><head>
	<title>Virtual File Management System</title>
	<link rel="stylesheet" href="styles/indexVFMS.css">
	<script type="text/javascript">
	function readFile(){
		window.open('readfile.php','_blank','height=400,width=400');
	}
	function openLoginWindow(){
		window.open('login.html','_blank','height=400,width=400');
	}
	function openSignUpWindow(){
		window.open('signup.html','_blank','height=400,width=400');
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
if (testSessionId() == 0) { ?>
 	<button onclick="openLoginWindow()">Login</button><button onclick="openSignUpWindow()">Sign Up</button><?php
} else { ?>
	<button onclick="window.location.href='logout.php'">Logout</button>

<?php
}
?>
<button>Calculator</button>
</header>

<body>
<div title="Files" class="fileViewer">
	<?php if (testSessionId() != 0) { ?>
		<ul id="treeFile" onclick="labels()">
			<?=files($dir); ?>
		</ul>
	<?php
} else { ?>
		<p> You can not access the file system while you are not logged in! </p>
	<?php
} ?></div>
</body></html>
