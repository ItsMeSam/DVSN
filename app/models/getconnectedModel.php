<?php

class getconnectedModel extends Model
{
	private static $pdo;

	public static $templatefiles = array(
		"login"		=> "login.tpl",
		"register"  => "register.tpl"
	);

	//.. Register user
	public static function addImage($image)
	{
		$filedest = "userimages/" . basename($image['name']);

		if ( move_uploaded_file($image['tmp_name'], $filedest) )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function dbConnect($host, $db, $user, $pass, $charset = "utf8")
	{
		self::$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db . ";charset=" . $charset, $user, $pass);
	}

	public static function register($image, $firstname, $lastname, $username, $password, $email)
	{
		if ( !isset(self::$pdo) )
		{
			return false;
		}

		$stmt = self::$pdo->prepare("
			INSERT INTO dvsn_user(firstname, lastname, username, password, email, image, ip)
			VALUES(:firstname, :lastname, :username, :password, :email, :image, :ip)
		");

		if ( self::addImage($image) )
		{
			$stmt->execute(array(
				"firstname" => $firstname,
				"lastname"	=> $lastname,
				"username" 	=> $username,
				"password"	=> md5($password),
				"email"		=> $email,
				"image"		=> $image['name'],
				"ip"		=> $_SERVER['REMOTE_ADDR']
			));
			return true;
		}
		else
		{
			return false;
		}
	}

	//.. Login user
	public static function authenticate($username, $password)
	{
		if ( !isset(self::$pdo) )
		{
			return false;
		}

		$stmt = self::$pdo->prepare("
			SELECT COUNT(username) as user
			FROM dvsn_user
			WHERE username=:username AND password=:password
		");

		$stmt->execute(array(
			"username" 		=> $username,
			"password"		=> md5($password)
		));

		$op = $stmt->fetch(PDO::FETCH_OBJ);

		if ( $op->user >= 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}