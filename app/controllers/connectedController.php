<?php

use Acuney\Router\Router;

class connectedController extends Controller
{
	public function defaultAction()
	{
		return "feed";
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
		connectedModel::dbConnect(MYSQL_HOST, MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	}

	public function profile()
	{
		if ( !isset($_SESSION['login']) )
		{
			header('Location: ' . SITE_URL . 'getconnected/login/You need to be signed in to view this page');
			return false;
		}

		if ( isset ( Router::getParams()[0] ) )
		{
			return connectedView::profile(Router::getParams()[0]);
		}
		else
		{
			return connectedView::profile(1);
		}
	}

	public function feed()
	{
		if ( !isset($_SESSION['login']) )
		{
			header('Location: ' . SITE_URL . 'getconnected/login/You need to be signed in to view this page');
			return false;
		}

		if ( connectedModel::logout() ) 
		{
			header('Location: ' . SITE_URL);			
		}

		if ( isset ( $_POST['feed_title'] ) && isset ( $_POST['feed_contents'] ) )
		{
			connectedModel::addMessage($_POST['feed_title'], $_POST['feed_contents'], $_POST['username']);
		}

		return connectedView::feed();
	}
}