<!DOCTYPE html>
<?php 
require 'config.php';

?>
<html>
<head>
	<title>Flanger Package</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" href="style/package.css">
    <script src="js/package.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<a href="index.htm">
				<img src="images/logo.png "  alt="Flanger Logo" width="150px" height="75">
				</a>
			</div>
			<div class="search">
				<form method="GET" action="index.htm">
					<input type="search" class="search_box" placeholder="Type Any Song Or Artist ..." name="">
					<button type="submit" class="submit"><img src="images/search_icon.png" ></button>
				</form>
			</div><!-- search -->
			
    </header>
    
<?php 
if(isset($_POST["submitBtn"])){

    $email = $_COOKIE['email'];
    $pack = $_POST["pack"];
    $card_num =$_POST["cardNum"];
    $card_Holder = $_POST["cardname"];
    $purch_date = date('U');

    $sql = "INSERT INTO purchase(email,Purchase_date,card_Holder,card_number) VALUES('$email','$purch_date','$card_Holder','$card_num')";

    if($con->query($sql)){
        echo "<script>";
        echo "alert('Purchase Successfuly')";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Purchase Failed')";
        echo "</script>";
    }

	$query = "UPDATE  creator_user SET pack_no = '$pack' Where email = '$email'";
	
	if($con ->query($query)){

	}
	else{
        echo "<script>";
        echo "alert('Update Failed')";
        echo "</script>";
    }
}


?>




	<div class="content">
		<div class="nav_bar">
			<ul>
				<li><a href="artistHome.php">Home</a></li>
				<li><a href="movie.html">Library</a></li>
				<li><a href="#">Artist</a></li>
				<li><a href="#">Help</a></li>
				<li><a href="#">About</a></li>
			</ul>

        </div><!-- nav_bar -->
             <div class="outer_box">
			
 
                <div class="box1">
                    <div class="price">
                        <h2>$20</h2>
                        <p>Per Week</p>
                    </div>
                        <h3>Weekly Creator Package</h3>
                        <p>Duration - 7days</p>
                        <p>Limit - No limiits</p>  
                        <button onclick="payment('open')"><b style="color: white;">Purchase</b> </button>
                </div>
                 <div class="box1">
                     <div class="price">
                        <h2>$60</h2>
                        <p>Per Month</p>
                    </div>
                    <h3>Monthly Creator Package</h3>
                        <p>Duration - 30days</p>
                        <p>Limit - No limiits</p>  
                        <button onclick="payment('open')"><b style="color: white;">Purchase</b> </button>
                </div>
                 <div class="box1">  
                    <div class="price">
                        <h2>$499</h2>
                        <p>Per Year</p>
                    </div> 
                    <h3>Yearly Creator Package</h3>
                    <p>Duration - 365days</p>
                    <p>Limit - No limiits</p>  
                    <button onclick="payment('open')"><b style="color: white;">Purchase</b> </button>
                </div>

            </div>
        </div><!--  content -->
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
<div class="payment_model">
	<div class="paybox">
        <div class="close"> <button onclick="payment('close')"><b>+</b></button> </div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"  name="paymnt">
			<h4 id="payment_detail">Payment details</h3>

				<table class="payment" >
                    <tr>
                        <td>
                            Select  Your Creator Package :
                        </td>
                    <td>
						<select name="pack">
                            <option class="choose" value="">select </option>
							<option class="choose" value="1">Weekly </option>
							<option class="choose" value="2">Monthly</option>
							<option class="choose" value="3">Yearly</option>
                        </select>
                    </td>   
                    </tr>
					<tr>
						<td>payment method :</td>
					<td>
						<select>
                            <option class="choose" value="">select </option>
							<option class="choose" value="visa">visa </option>
							<option class="choose" value="master">master</option>
							<option class="choose" value="paypal">paypal</option>
							<option class="choose" value="amex">american express</option>
						</select>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
					<img class="payImg" src="images/visa_icon.png" >
					<img class="payImg" src="images/paypal_icon.png" >
					<img class="payImg" src="images/americanEx_icon.png" >
					<img class="payImg" src="images/master_icon.png" >

						
					</td>
					</tr>
					<tr>	
						<td><input class="textBox" type="text" placeholder="Card Number" name="cardNum"></td>
					</tr>
					<tr>
						<td><input class="textBox" type="text" placeholder="Name on card" name="cardname"></td>
					</tr>
					<tr>
						<td>Expire date :</td>
						<td>
						<input class="textBox" type="date" name="day"></td>
					</tr>
					<tr>
						<td><input class="textBox" type="number" placeholder="CVV" max="999" min="0" maxlength="4" name=""></td>
					</tr>
					<tr>
						<td class="cvv"></td>
							<td><p>The CVV Number ("Card Verification Value") on your credit card or debit card is a 3 digit number on VISA®, MasterCard® and Discover® branded credit and debit cards. On your American Express® branded credit or debit card it is a 4 digit numeric code.</p></td>
					</tr>

					<tr>
						<td>Quick Access with :</td>
						<td><img src="images/google_icon.png" >
							<img src="images/fb_icon.png" >
							<img src="images/insta_icon.png" >
							<img src="images/twitter_icon.png" >
						</td>
					</tr>
                </table>
                <input type="submit" value="submit" name="submitBtn" id="submitBtn">
		</form>
	</div>
</div>
</body>
</html>