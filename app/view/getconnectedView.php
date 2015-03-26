<?php

use Acuney\View\RegTPL;
use Acuney\Router\Router;

class getconnectedView extends View
{
	public static function login()
	{
		$tpl = new RegTPL();
		$tpl->setDirectory('public');
		$tpl->setCacheDirectory('cache');

		if ( isset ( Router::getParams()[0] ) ) 
		{
			$tpl->addVar("error", Router::getParams()[0]);
			$tpl->addVar("duration", 4000);
		}
		else
		{
			$tpl->addVar("error", "");
			$tpl->addVar("duration", 0);
		}

		$tpl->parse(getconnectedModel::$templatefiles['login']);

		ob_start();
		include $tpl->cachedir . getconnectedModel::$templatefiles['login'] . ".cache.php";
		return ob_get_clean();
	}

	public static function register()
	{
		$tpl = new RegTPL();
		$tpl->setDirectory('public');
		$tpl->setCacheDirectory('cache');

		$tpl->parse(getconnectedModel::$templatefiles['register']);

		ob_start();
		include $tpl->cachedir . getconnectedModel::$templatefiles['register'] . ".cache.php";
		return ob_get_clean();		
	}
}