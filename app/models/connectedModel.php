<?php

class connectedModel extends Model
{
	public static $pdo;
	public static $templatefiles = array(
		"profile" 	=> "profile.tpl",
		"feed" 		=> "feed.tpl"
	);

	public static function dbConnect($host, $db, $user, $pass, $charset = "utf8")
	{
		self::$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db . ";charset=" . $charset, $user, $pass);
	}

	//.. Profile
	public static function userInfo($id)
	{
		if ( !isset ( self::$pdo ) )
		{
			return false;
		}

		$stmt = self::$pdo->prepare("
			SELECT firstname, lastname, username, image, ip
			FROM dvsn_user
			WHERE id=" . $id
		);

		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	//.. Feed
	public static function messages()
	{
		if ( !isset ( self::$pdo ) )
		{
			return false;
		}

		$stmt = self::$pdo->prepare("
			SELECT title, contents, `by`
			FROM dvsn_feed
		");
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function addMessage($title, $contents, $name)
	{
		if ( !isset ( self::$pdo ) )
		{
			return false;
		}

		$stmt = self::$pdo->prepare("
			INSERT INTO dvsn_feed(title, contents, `by`)
			VALUES(:title, :contents, :author)
		");

		$stmt->execute(array(
			"title" 	=> $title,
			"contents" 	=> $contents,
			"author"	=> $name
		));
	}

	public static function logout()
	{
		if ( isset ( $_POST['logout'] ) )
		{
			if ( isset ( $_SESSION['login'] ) && isset ( $_SESSION['username'] ) )
			{
				unset($_SESSION['login']);
				unset($_SESSION['username']);
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}