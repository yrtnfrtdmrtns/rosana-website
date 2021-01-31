<?php

	define("PATH_BASE", dirname(__FILE__));
	require(PATH_BASE . "/config/dbconfig.php"); 

	if($user->is_loggedin()!="")
	{
		$user->redirect('pages/home.php');
	}

	if(isset($_POST['sign_up']))
	{
		$user_email = trim($_POST['user_email']);
		$user_password = trim($_POST['user_password']);	
		
		if($user_email=="")	
		{
			$error[] = "Provide email id.";	
		}
		else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))	
		{
		    $error[] = 'Please enter a valid email address.';
		}
		else if($user_password=="")	
		{
			$error[] = "Provide password.";
		}
		else if(strlen($user_password) < 3)
		{
			$error[] = "Password must be atleast 6 characters";	
		}
		else
		{
			try
			{
				$stmt = $DB_con->prepare("SELECT user_email FROM users WHERE user_email=:user_email");
				$stmt->execute(array(':user_email'=>$user_email));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
				if($row['user_email']==$user_email) {
					$error[] = "sorry email id already taken.";
				}
				else
				{
					if($user->register_user($user_email,$user_password))	{
						
						$user->redirect('signup.php?joined');
					}
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}	
	}
?>

<!DOCTYPE html>
    <html>
        <?php require(PATH_BASE . "/includes/head.php"); ?>

		<body>
			<div class="container">
		        <form method="post">
		            <input type="text" name="user_email"  value="<?php if(isset($error)){echo $user_email;}?>">
		            <input type="password" name="user_password">
		            <div class="clearfix"></div>
	            	<button type="submit" name="sign_up">Sign up</button>
		        </form>
			</div>
		</body>
	</html>