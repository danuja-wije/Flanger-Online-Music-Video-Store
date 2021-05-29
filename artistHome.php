<?php

require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Artist Homepage</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<script src="js/artistHome.js"></script>
</head>
<?php 



if(isset($_POST["submit"])){

	if($_COOKIE['cemail']){
		$email = $_COOKIE['cemail'];
	}
	else if($_COOKIE['email']){
		$email = $_COOKIE['email'];
	}
    $title = $_POST["title"];
    $des = $_POST["description"];
    $price = $_POST["price"];
    $cont_type = $_POST["cont_type"];


    $cont = basename($_FILES["cont"]["name"]);
	$upload_dir = "content/".basename($_FILES["cont"]["name"]);


    $thumb =basename($_FILES["thumb"]["name"]);
    $upload_dir_thumb = "thumbnail/".basename($_FILES["thumb"]["name"]);


    $sql = "INSERT into content(tittle,price,artist_id,thumbnail,description,content_type,content) VALUES('$title','$price','$email','$thumb','$des','$cont_type','$cont')";

	move_uploaded_file($_FILES['cont']['tmp_name'],$upload_dir);

	move_uploaded_file($_FILES['thumb']['tmp_name'],$upload_dir_thumb);

	if( $con->query($sql)){
		echo ('<script>alert("Upload Succesful")</script>');
	}
	else 
		echo ('<script>alert("Upload failed")</script>');
}

?>
<?php
if(isset($_POST["submit2"] )){
	
	$uPemail="";
	if($_COOKIE['cemail']){
		$uPemail = $_COOKIE['cemail'];
	}
	else if($_COOKIE['email']){
		$uPemail = $_COOKIE['email'];
	}
	
	$uPtitle = $_POST["update_title"];
	$uPdes = $_POST["update_description"];
	$uPprice = $_POST["update_price"];
	$uPcont_type = $_POST["update_cont_type"];
	$uPcheck = $_POST["check"];

	$uPthumb = basename($_FILES["update_thumb"]["name"]);
	$uPupload_dir_thumb = "thumbnail/".basename($_FILES["update_thumb"]["name"]);

	$query = "UPDATE content SET thumbnail ='$uPthumb' , price = '$uPprice' ,description = '$uPdes',content_type = '$uPcont_type' ,tittle = '$uPtitle' Where artist_id='$uPemail' AND tittle = '$uPcheck'";

	if($query = $con ->query($query)){
		echo "<script>";
		echo "alert('Update Successful')";
		echo "</script>";
	}
	else {
		echo "<script>";
		echo "alert('Update Fail')";
		echo "</script>";
	}
	move_uploaded_file($_FILES['update_thumb']['tmp_name'],$uPupload_dir_thumb);

}


?>


<?php 

if(isset($_POST["submit3"])){
	
	if($_COOKIE['cemail']){
		$email = $_COOKIE['cemail'];
	}
	else if($_COOKIE['email']){
		$email = $_COOKIE['email'];
	}

	if(!empty($_REQUEST["del"])){

        foreach($_REQUEST["del"] as $value){
			
			$query = "DELETE FROM content WHERE artist_id = '$email' AND tittle = '$value'";

			if($result = $con ->query($query)){
				echo "<script>";
				echo "alert('Delete Successful')";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Delete Fail')";
				echo "</script>";
			}

        }
    }
    else
	{
		echo "<script>";
		echo "alert('No one click')";
		echo "</script>";
	}



}




?>


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
				 <label ><?php   if($_COOKIE['cemail']) echo $_COOKIE['cemail']; else echo $_COOKIE['email']; ?> </label>
				 <select name="user" id="user">
					 <option value="Profile">Profile</option>
					 <option value="Income">Income </option></select>
					 <form action="logout.php" method="POST"><input type="submit" id="log_out" name="log_out" id="log_out" value = "log out"></form>
					
					 
			</div>
		<div class="content">
			
	</header>
	<div class="nav_bar">
		<ul>
			<li><a href="artistHome.php" class="active">Home</a></li>
			<li><a href="#">Library</a></li>
			<li><a href="#">Artist</a></li>
			<li><a href="#">Help</a></li>
			<li><a href="#">About</a></li>
		</ul>

	</div><!-- nav_bar -->

		<div class = "control_box">
			<button onclick="display('open')">Upload Content</button>
			<button onclick="update('click')">Edit Content</button>
			<button onclick="deleteB('open')">Delete Content</button>
		</div>
		<div class="bac">
			
		<div class="event_box1">
			<div class="close" onclick="display('close')"><b>+</b></div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

				<h2>Select Content</h2>
				<input type="file" id="upload_video" name = "cont" >
				<h2>Title :</h2><br>
				<input type="text" name="title" id="title" ><br>
				<h2>Choose Thumbnail :</h2><br>
				<input type="file" id="Thumbnail"  name="thumb"><br>
				<h2>Description :</h2><br>
                <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
				<h2>Enter Price :</h2><br>
				<input type="text" name="price"><br>
                <h2>Enter Content Type :</h2><br>
                <input type="text" name="cont_type"><br>
              
				<input type="submit" id='submitBtn1' name="submit" >


			</form>

		</div>
		
	</div>
	<div class="bac2">
			
		<div class="event_box2">
			<div class="close2" onclick="update('end')"><b>+</b></div>
			<h1>Select Content</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
				<div class="content">
					<?php 
					if($_COOKIE['cemail']){
						$email = $_COOKIE['cemail'];
					}
					else if($_COOKIE['email']){
						$email = $_COOKIE['email'];
					}
						$sql = "SELECT * from content where artist_id = '$email'";

					$result = $con ->query($sql);
					
					
					if(mysqli_num_rows($result)> 0){
						$row = mysqli_fetch_array($result);
							echo "<div id = 'cont_img'>";
							echo "<div id='btnclick'>";
							echo "<input type='radio' name='check' value ='".$row['tittle']."'>";
							echo "<img src='thumbnail/".$row['thumbnail']."' alt='content'  height='100px' width='100px'>"."&nbsp&nbsp&nbsp";
							echo "<p>Tittle :".$row['tittle']."&nbsp&nbsp&nbsp";
							echo "Price :".$row['price']."&nbsp&nbsp&nbsp";
							echo "Content Type :".$row['content_type']."&nbsp&nbsp&nbsp";
							echo "Description :".$row['description']."&nbsp&nbsp&nbsp </p>";
							echo "</div>";
							echo "</div><br>";
						while($row = mysqli_fetch_array($result)){
							echo "<div id = 'cont_img'>";
							echo "<div id='btnclick'>";
							echo "<input type='radio' name='check' value ='".$row['tittle']."'>";
							echo "<img src='thumbnail/".$row['thumbnail']."' alt='content'  height='100px' width='100px'>"."&nbsp&nbsp&nbsp";
							echo "<p>Tittle :".$row['tittle']."&nbsp&nbsp&nbsp";
							echo "Price :".$row['price']."&nbsp&nbsp&nbsp";
							echo "Content Type :".$row['content_type']."&nbsp&nbsp&nbsp";
							echo "Description :".$row['description']."&nbsp&nbsp&nbsp </p>";
							echo "</div>";
							echo "</div><br>";
						}
					}
					else
						echo "No any content found";

					?>
				</div><br>

				<div id="forum"></div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

				
				<h2>Title :</h2><br>
				<input type="text" name="update_title" id="title" ><br>
				<h2>Choose Thumbnail :</h2><br>
				<input type="file" id="Thumbnail"  name="update_thumb"><br>
				<h2>Description :</h2><br>
                <textarea name="update_description" id="description" cols="30" rows="10"></textarea><br>
				<h2>Enter Price :</h2><br>
				<input type="text" name="update_price"><br>
                <h2>Enter Content Type :</h2><br>
                <input type="text" name="update_cont_type"><br><br>
              
				<input type="submit" name="submit2" id='submitBtn1' value="Confirm">


			</form>

		</div>
		
	</div>

	<div class="bac3">
			
		<div class="event_box3">
			<div class="close3" onclick="deleteB('close')"><b>+</b></div>
			<h1>Select Content</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
				<div class="content">
					<?php 
						$sql = "SELECT * from content where artist_id = '$email'";

					$result = $con ->query($sql);
					
					
					if(mysqli_num_rows($result)> 0){
						$row = mysqli_fetch_array($result);
							echo "<div id = 'cont_img'>";
							echo "<div id='btnclick'>";
							echo "<input type='checkbox' name='del[]' value ='".$row['tittle']."'>";
							echo "<img src='thumbnail/".$row['thumbnail']."' alt='content'  height='100px' width='100px'>"."&nbsp&nbsp&nbsp";
							echo "<p>Tittle :".$row['tittle']."&nbsp&nbsp&nbsp";
							echo "Price :".$row['price']."&nbsp&nbsp&nbsp";
							echo "Content Type :".$row['content_type']."&nbsp&nbsp&nbsp";
							echo "Description :".$row['description']."&nbsp&nbsp&nbsp </p>";
							echo "</div>";
							echo "</div><br>";
						while($row = mysqli_fetch_array($result)){
							echo "<div id = 'cont_img'>";
							echo "<div id='btnclick'>";
							echo "<input type='checkbox' name='del[]' value ='".$row['tittle']."'>";
							echo "<img src='thumbnail/".$row['thumbnail']."' alt='content'  height='100px' width='100px'>"."&nbsp&nbsp&nbsp";
							echo "<p>Tittle :".$row['tittle']."&nbsp&nbsp&nbsp";
							echo "Price :".$row['price']."&nbsp&nbsp&nbsp";
							echo "Content Type :".$row['content_type']."&nbsp&nbsp&nbsp";
							echo "Description :".$row['description']."&nbsp&nbsp&nbsp </p>";
							echo "</div>";
							echo "</div><br>";
						}
					}
					else
						echo "No any content found";

					?>
				</div><br>
				
				<input type="submit" name="submit3" id='submitBtn1' value="delete">


			</form>

		</div>
		
	</div>
	
		
			<fieldset><legend>Your Uploads</legend>
				<div class="field1">
					<div class="content_box1" >
						<div class="card">
							<div class="detail">
								<h3>Emerald City</h3>
								<p>A modern reimagining of the stories that led to 'The Wizard of Oz' </p>
								<id class="rate"><p>******</p>
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/vlog.jpg" alt="Movies" class="cont1_img">
					</div>
					<div class="content_box1">
						<div class="card">
							<div class="detail">
								<h3>Kin(2018)</h3>
								<p>Chased by a vengeful criminal, the feds and a gang of otherworldly soldiers, a recently released ex-con, and his adopted teenage brother are forced to go on the run with a weapon of mysterious origin as their only protection.
									</p>
								<id class="rate"><p>******</p>
								
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/song2.jpg"  alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card">
							<div class="detail">
								<h3>Legacies </h3>
								<p>Hope Mikaelson, a tribrid daughter of a Vampire/Werewolf hybrid, makes her way in the world. </p>
								<id class="rate"><p>******</p>
							
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/song4.webp" alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card">
							<div class="detail">
								<h3>TI 19 Championship</h3>
								<p>TI 19 Championship Full video </p>
								<id class="rate"><p>******</p>
								
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/song5.jfif" alt="Movies" class="cont1_img">
					
					</div>
					<div class="content_box1">
						<div class="card">
							<div class="detail">
								<h3>Jungle Cruise</h3>
								<p>Based on Disneyland's theme park ride where a small riverboat takes a group of travelers through a jungle filled with dangerous animals and reptiles but with a supernatural element. </p>
								<id class="rate"><p>******</p>
								
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/edu.jpg" alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card">
							<div class="detail">
							<h3>Jungle Cruise</h3>
							<p>Based on Disneyland's theme park ride where a small riverboat takes a group of travelers through a jungle filled with dangerous animals and reptiles but with a supernatural element. </p>
								
							<id class="rate"><p>******</p>
							
								</id>
							</div>
							<button><h6>watch trailer</h6></button>
						</div>
						<img src="images/contentArtist/song3.jpg" alt="Movies" class="cont1_img">
					
					</div>
				</div>
				<button class="expmore" ><a href="#"><h3>Explore More</h3></a></button>
			</fieldset>	
		
			<fieldset><legend>Top Content artist</legend>
				
				<div class="field1">
					<div class="content_box1" >
						<div class="card" id="edit">
							<div class="detail">
								<h3>Boby</h3>
								<id class="rate"><p>9.3/10</p>
								</id>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p1.jfif" alt="Movies" class="cont1_img">
					</div>
					<div class="content_box1">
						<div class="card" id="edit">
							<div class="detail">
								<h3>Kate</h3>

								<div class="rate"><p>9/10</p></div>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p2.jpg"  alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card" id="edit">
							<div class="detail">
								<h3>Moriaty</h3>
								
								<div class="rate"><p>8.7/10</p>
							
								</div>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p3.jpg"  alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card" id="edit">
							<div class="detail">
								<h3>Alex</h3>
							
								<div class="rate"><p>8.5/10</p>
								
								</div>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p4.jpg" alt="Movies" class="cont1_img">
					
					</div>
					<div class="content_box1">
						<div class="card" id="edit">
							<div class="detail">
								<h3>Jerry RIg</h3>
							
								<div class="rate"><p>8.2/10</p>
								
								</div>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p5.jpg" alt="Movies" class="cont1_img">
						
					</div>
					<div class="content_box1">
						<div class="card" id="edit">
							<div class="detail">
								<h3>Unbox Therepy</h3>
								
								<div class="rate"><p>8/10</p>
							
								</div>
							</div>
							<button ><h6>Profile</h6></button>
						</div>
						<img src="images/contentArtist/p6.jpg"  alt="Movies" class="cont1_img">
					
					</div>
				</div>
				<button class="expmore"><a href="#"><h3>Explore More</h3></a></button>
			</fieldset>	
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