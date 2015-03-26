<?php

use Acuney\View\RegTPL;
use Acuney\Router\Router;

class HomeView extends View
{
	public static function output()
	{
		$tpl = new RegTPL();
		$tpl->setDirectory('public');
		$tpl->setCacheDirectory('cache');

		if ( isset ( Router::getParams()[0] ) )
		{
			$tpl->addVar('param', htmlentities(urldecode(Router::getParams()[0])));
		}
		else
		{
			$tpl->addVar('param', 'no parameter has been used');
		}
		$tpl->parse(HomeModel::$templatefile);

		ob_start();
		include $tpl->cachedir . HomeModel::$templatefile . ".cache.php";
		return ob_get_clean();
	}
}
