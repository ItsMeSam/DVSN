<?php

use Acuney\View\RegTPL;

class connectedView extends View
{

	public static function profile($id)
	{
		$tpl = new RegTPL();
		$tpl->setDirectory("public");
		$tpl->setCacheDirectory("cache");

		$userinfo = connectedModel::userInfo($id);
		if ( $userinfo == NULL )
		{
			$tpl->addVar("firstname", "No profile was found with this ID");
			$tpl->addVar("lastname", "");
			$tpl->addVar("username", "");
			$tpl->addVar("imagepath", "");
		}
		else
		{
			$tpl->addVar("firstname", $userinfo->firstname);
			$tpl->addVar("lastname", $userinfo->lastname);
			$tpl->addVar("username", $userinfo->username);
			$tpl->addVar("imagepath", SITE_URL . "userimages/" . $userinfo->image);
		}

		$tpl->parse(connectedModel::$templatefiles['profile']);

		ob_start();
		include $tpl->cachedir . connectedModel::$templatefiles['profile'] . ".cache.php";
		return ob_get_clean();
	}

	public static function feed()
	{
		$tpl = new RegTPL();
		$tpl->setDirectory("public");
		$tpl->setCacheDirectory("cache");

		$msg = connectedModel::messages();

		if ( !is_array($msg) )
		{
			$msg = array();
		}

		$tpl->addVar("feed", $msg);
		$tpl->addVar("username", $_SESSION['username']);

		$tpl->parse(connectedModel::$templatefiles['feed']);

		ob_start();
		include $tpl->cachedir . connectedModel::$templatefiles['feed'] . ".cache.php";
		return ob_get_clean();
	}
}