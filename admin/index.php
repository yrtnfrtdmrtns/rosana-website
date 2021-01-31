<?php 
	define("PATH_BASE", dirname(__FILE__));
	require(PATH_BASE . "/config/dbconfig.php"); 

	if($user->is_loggedin()!="")
	{
		$user->redirect('pages/home.php');
	}

	if(isset($_POST['sign_in']))
	{
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
			
		if($user->user_login($user_email,$user_password))
		{
			$user->redirect("pages/home.php");
		}
		else
		{
			$error = "Email or Password incorrect.";
		}	
	}
?>

<!DOCTYPE html>
    <html>
        <head>
			<meta charset="UTF-8">
			<meta name="description" content="">
			<meta name="keywords" content="">
			<meta name="author" content="">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>YRTNFRTD</title>

			<link rel="stylesheet" type="text/css" href="assets/css/layout.css">
		</head>

        <body id="login-body">
            <div class="container-fluid">    
                <div class="row">
	                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4" id="login"> 
	                    <form method="post">
	                    	<?php
		            			if(isset($error))
		            			{
		                        ?>
		                            <div class="notification error">
		                                <p><?php echo $error; ?></p>
		                            </div>
		                        <?php
		            			}
	            			?>
	                        <label>Email</label>
	                        <input type="text" name="user_email" required>
	                        <label>Password</label>
	                        <input type="password" name="user_password" required>
	                        <button name="sign_in">Login</button>
	                    </form>
	                </div>
	            </div>
            </div>
        </body>
    </html>