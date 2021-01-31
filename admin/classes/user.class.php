<?php
class User
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function register_user($user_email,$user_password)
	{
		try
		{
			$new_password = MD5($user_password);
			
			$stmt = $this->db->prepare("INSERT INTO users(user_email, user_password) 
		                                               VALUES(:user_email, :user_password)");
												  
			$stmt->bindparam(":user_email", $user_email);
			$stmt->bindparam(":user_password", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function user_login($user_email,$user_password)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM users WHERE user_email=:user_email LIMIT 1");
			$stmt->execute(array(':user_email'=>$user_email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if($userRow['user_password']==MD5($user_password))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					$_SESSION['user_level'] = $userRow['user_level'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>