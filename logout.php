<!DOCTYPE html>
<html>
<head>
	<title>Flanger Homepage</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<script src="js/artistHome.js"></script>
</head>
<body>
	<div class="wrapper">
	<header>
			<div class="logo">
				<a href="index.htm">
				<img src="images/logo.png "  alt="Flanger Logo">
				</a>
			</div>
			<div class="search">
				<form method="GET" action="index.htm">
					<input type="search" class="search_box" placeholder="Type Any Song Or Artist ..." name="">
					<button type="submit" class="submit"><img src="images/search_icon.png" ></button>
				</form>
			</div><!-- search -->
			<div class="top_bar_buttons">
				 <button id ="b2" ><img src="images/user_icon.png" width="20px" height="20px"></button>
				 <label for="">User ID </label>
				 <select name="user" id="user">
					 <option value="Profile">Profile</option>
					 <option value="Income">Income </option></select>
					 <form action="logout.php" method="POST"><input type="submit" name="log_out" id="log_out" value = "log out"></form>
					
					 
			</div>
		<div class="content">
			
	</header>
	<div class="nav_bar">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="movie">Library</a></li>
			<li><a href="#">Artist</a></li>
			<li><a href="#">Help</a></li>
			<li><a href="#">About</a></li>
		</ul>

	</div><!-- nav_bar -->

<?php


if(isset($_COOKIE['cemail'])){
	setcookie('cemail','NULL',-time()+60*60*24);
	echo "<h1>Successful Log Out.!</h1>";
}
 
else if(isset($_COOKIE['email'])){
	setcookie('email','NULL',-time()+60*60*24);
	echo "<h1>Successful Log Out.!</h1>";
}
	

?>

<footer>
			<table >
				<tr>
					<th>
						<div class="footer_logo">
							<a href="index.htm">
							<img src="images/logo.png "  alt="Flanger Logo" width="150px" height="75">
							</a>
						</div><!-- footer_logo -->
					</th>
					<th>
						<h3>EXPLORE</h3>
					</th>
					<th>
						<h3>HELP</h3>
					</th>
					<th>
						<h3>ABOUT</h3>
					</th>
				</tr>
				<tr>
					<td>
						<div class="location" >
							<ul>
								<li><img src="images/location_icon.png" height="15px" width="15px"> High level Road<br>Colombo 07<br>Sri Lanka</li>
								<li><img src="images/phone_icon.png" height="15px" width="15px"> (+94)112 567 3465</li>
								<li><img src="images/mail_icon.png" height="15px" width="15px"> support@flanger.com</li>
							</ul>
						</div>
					</td>
					<td>
						<div class="EXPLORE" >
							<ul>
								 <li>News</li>
									<li>ARTIST ON FLANGER</li>
								 <li>VIDEO FALLERY</li>
									<li>Price Guid</li>
									<li>GIFT CARD</li>
							</ul>
						</div>
					</td>
					<td>
						<div class="help" >
							<ul>
								<li>HELP CENTER</li>
									<li>FLANGER PROTECTION</li>
								<li>SHOPPING GUID</li>
							</ul>
						</div>
					</td>
					<td>
						<div class="about">
							<ul>
								<li>ABOUT FLANGER</li>
								<li>PRIVACY POLICY</li>
								<li>NEWSELLER SIGN UP</li>
								<li>CONTACT SUPPORT</li>
							</ul>
						</div>
					</td>
				</tr>
			</table>
			<button id="fdback">Feedback</button>
			<p id="reseved">&copy; 2020 FlangerCo.Ltd All Right Reseved</p>
		</footer>
</div><!-- wrapper -->

</body>
</html>