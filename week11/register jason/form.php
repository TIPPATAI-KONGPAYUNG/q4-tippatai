<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>CS Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="mcss.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="mpage.js"></script>
<script>
	var xmlHttp;

	function checkUsername() {
		document.getElementById("username").className = "thinking";
		
		xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = showUsernameStatus;
		
		var username = document.getElementById("username").value;
		var url = "checkName.php?username=" + username;
		xmlHttp.open("GET", url);
		xmlHttp.send();
	}

	function showUsernameStatus() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			if (xmlHttp.responseText == "okay") {
				document.getElementById("username").className = "approved";

			} else if(xmlHttp.responseText == "denied"){
				document.getElementById("username").className = "denied";
				document.getElementById("username").focus();
				document.getElementById("username").select();
			}
		}
	}
</script>
</head>

<body>

<header>
  <div class="logo">
	<img src="cslogo.jpg" width="200" alt="Site Logo">
  </div>
  <div class="search">
	<form>
	  <input type="search" placeholder="Search the site...">
	  <button>Search</button>
	</form>
  </div>
</header>

<div class="mobile_bar">
  <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
  <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
</div>

<main>
  <article>
	<h1>Lab AJAX no2</h1>
	<form>
		<h1>Lecture P.14-18</h1>
		Username:<input id="username" type="text" onblur="checkUsername()"><br>
		First Name:<input type="text" name="firstname"><br> 
		Last Name:<input type="text" name="lastname"><br> 
		Email:<input type="text" name="email"><br> 
		<input type="submit" value="Register">
	</form>
  </article>
  <?php include_once('nav.php');?>
  <aside>
	<h2>Aside</h2>
	<p>
	  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
	  <br><br>
	</p>
  </aside>
</main>
<footer>
  <a href="#">Sitemap</a>
  <a href="#">Contact</a>
  <a href="#">Privacy</a>
</footer>
</body>
</html>