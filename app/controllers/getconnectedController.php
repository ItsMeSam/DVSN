<?php

class getconnectedController extends Controller
{
	public function defaultAction()
	{
		return "register";
	}

	public function ignoredActions()
	{
		return array(
			"defaultAction"
		);
	}

	public function __construct()
	{
		session_start();
		getconnectedModel::dbConnect(MYSQL_HOST, MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	}

	public function login()
	{
		if ( isset ( $_POST['username'] ) && isset ( $_POST['password'] ) )
		{
			if ( getconnectedModel::authenticate($_POST['username'], $_POST['password']) )
			{
				$_SESSION['login'] = true;
				$_SESSION['username'] = $_POST['username'];
				header('Location: ' . SITE_URL . 'connected');
			}
		}
		return getconnectedView::login();
	}

	public function register()
	{
		if ( isset ( $_FILES['photo'] ) && isset ( $_POST['firstname'] ) && isset ( $_POST['lastname'] ) && isset ( $_POST['username'] ) && isset ( $_POST['password'] ) && isset ( $_POST['email'] ) )
		{
			getconnectedModel::register($_FILES['photo'], $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email']);
		}
		return getconnectedView::register();
	}
}