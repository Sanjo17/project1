
<!DOCTYPE html>
<html>
    
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css">
	<script>
		function check()
            {        
                 
                   var name=document.getElementById("username").value;
                   var phone=document.getElementById("phone").value;
                   var pass=document.getElementById("pass").value;
                   var repass=document.getElementById("repass").value;               

                   if((name=="")||(!(isNaN(name))))
                   {
			alert("please enter the correct name");
			document.getElementById("name").value="";
			document.getElementById("name").focus();

		   }

                   else if((phone.length<10)||(isNaN(phone)))
		   {
			alert("please enter the Phone correctly")
			document.getElementById("phone").value="";
			document.getElementById("phone").focus();
		   }

		   else if(pass=="")
		   {
			alert("please enter a strong password")
			document.getElementById("password").value="";
			document.getElementById("password").focus();
		   }


            
		   else if(pass!=repass){
			alert("Password didnot match")
			document.getElementById("password").value="";
			document.getElementById("password").focus();
		   }
                     

		   else
                   {
                         x=confirm("you have entered the datas correctly,want to submit the form");
                         if(x)
                            return true;
                   }
               return false;
         }
                   



	</script>
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://media0.giphy.com/media/gjg8EiBK0NlfAGHS2y/giphy.gif?cid=ecf05e47aim7wg37w1j9d2243wdujit0s4hm8nfo0osykwku&ep=v1_gifs_related&rid=giphy.gif&ct=g" class="brand_logo" alt="Logo">
					</div>
				</div>
                <?php
                if(isset($_GET['sign-up']))
                {
                ?>
				<div class="d-flex justify-content-center form_container">
					<form action="index1.php" method="POST" onsubmit="return check()">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="username" name="su_username" class="form-control input_user" value="" placeholder="username"  />
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="text" id="phone" name="su_contact_no" class="form-control input_pass" value="" placeholder="contact no"  />
						</div>
						<div class="form-group">
							
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="pass" name="su_password" class="form-control input_pass" value="" placeholder="password"  />
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="repass" name="su_rewrite_password" class="form-control input_pass" value="" placeholder="retype password"  />
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="sumbit"  id="sign_up_btn" name="sign_up_btn" class="btn login_btn" >Sign up</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Already created account <a href="index1.php" class="ml-2">Sign In</a>
					</div>
					
				</div>
				<?php  
                }
                else
                {
                  ?>
						<div class="d-flex justify-content-center form_container">
							<form>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" name="" class="form-control input_user" value="" placeholder="username">
								</div>
								<div class="input-group mb-2">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-key"></i></span>
									</div>
									<input type="password" name="" class="form-control input_pass" value="" placeholder="password">
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customControlInline">
										<label class="custom-control-label" for="customControlInline">Remember me</label>
									</div>
								</div>
									<div class="d-flex justify-content-center mt-3 login_container">
							<button type="button" name="button" class="btn login_btn">Login</button>
						</div>
							</form>
						</div>
				
						<div class="mt-4">
							<div class="d-flex justify-content-center links">
								Don't have an account? <a href="?sign-up=1" class="ml-2">Sign Up</a>
							</div>
							<div class="d-flex justify-content-center links">
								<a href="#">Forgot your password?</a>
							</div>
						</div>
                  <?php 
                }
                ?>
				
			</div>
		</div>
	</div>
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>

<?php
require_once("config.php");
 
if(isset($_POST['sign_up_btn']))
 {  
	$su_username=mysqli_real_escape_string($db,$_POST["su_username"]);
	$su_condact_no=mysqli_real_escape_string($db,$_POST["su_contact_no"]);
	$su_password=mysqli_real_escape_string($db,$_POST["su_password"]);
	$su_retype_password=mysqli_real_escape_string($db,$_POST["su_retype_password"]); 
	$su_user_role="voter";
		if($su_password == $su_retype_password)
		{
            //insert query
			mysqli_query($db, "INSERT INTO users(username,contact_no,password,user_role) VALUES('".$su_username."','".$su_contact_no."','".$su_password."','".$su_user_role."')") or die(mysqli_error($db));
		?>
		<script> location.assign("index1.php?sign-up=1&registered=1"); </script>
		<?php
		}
		else
		{ ?>
		  <script> location.assign("index1.php?sign-up=1&invalid=1"); </script>
		
		<?php

		}
 }
?>