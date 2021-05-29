<?php
require 'config.php';
?>


<style>
			.suc{
				margin:20px auto;
				border-radius:10px;
	             width: 600px;
	             height: 400px;
	             background: white;
				 color: black;
				 text-align:center;
				 display:flex;
				 justify-content: space-between;
				 align-content: center;
			   }
			.suc h1{
				margin-top:140px;
				margin-left:10px;
				font-size:30px;
			}
			#outBox{
				margin-top:50px;
				width:300px;
				height:300px;
			}
			.close{
				font-size:30px;
				margin-left:575px;
				width:20px;
				height:20px;
				transform: rotate(45deg);
				position:absolute;
				cursor:pointer;
			}
		</style>
		<?php
		if(isset($_POST["submitBtn"])){
			$acc_type = $_POST["acc_type"];
		}
		
		?>
	<div class="suc" id="cl">
		<div class="close" >  <?php if($acc_type === "creator") echo "<a href='package.php'>"; else echo "<a href='#'>"; ?><b>+</b></a></div>
	
	<?php
	if(isset($_POST["submitBtn"])){

		$acc_type = $_POST["acc_type"];
         $fname = $_POST["fname"];
         $lname = $_POST["lname"];
         $email = $_POST["email"];
         $password = $_POST["password"];
         $en_pass = md5($password);
         $del = 1;
	 
		 
		if($acc_type === "fan"){

        			 $sql = "INSERT INTO fan_user(fname,lname,email,password,is_deleted) VALUES('{$fname}','{$lname}','{$email}','{$en_pass}',{$del})";
      			  if($con ->query($sql)){
							  echo ("<script>  
							  function close(){
								document.querySelector('.suc').style.display = 'none';
							}

							  </script><h1>Registration Successful!</h1>"."<div id='outBox'><img src='images/success_icon.png' alt='succsess_Img'></div>");
        			 }
        			 else {
						echo ("<script>  
						function close(){
						  document.querySelector('.suc').style.display = 'none';
					  }

			            </script><h1>Registration Fail!</h1>"."<div id='outBox'></div>");
					 }
		}

		else if($acc_type === "creator"){

			setcookie('email',"{$email}",time()+60*60*20);

			$sql = "INSERT INTO creator_user (fname,lname,email,password,is_deleted) VALUES('{$fname}','{$lname}','{$email}','{$en_pass}',{$del})";
			if($con ->query($sql)){

			

					  echo ("<script>  
					  function close(){
						document.querySelector('.suc').style.display = 'none';
					}

					  </script><h1>Registration Successful!</h1>"."<div id='outBox'><img src='images/success_icon.png' alt='succsess_Img'></div>");
			 }
			 else {
				echo ("<script>  
				function close(){
				  document.querySelector('.suc').style.display = 'none';
			  }

				</script><h1>Registration Fail!</h1>"."<div id='outBox'></div>");
			 }




		}
}

$con ->close();


?>
	</div>	