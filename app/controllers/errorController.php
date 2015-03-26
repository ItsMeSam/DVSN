<?php

use Acuney\Router\Router;

class errorController extends Controller
{

	public function defaultAction()
	{
		return "page";
	}

	public function ignoredActions()
	{
		return array(
			"defaultAction",
			"setError"
		);
	}

	public function page()
	{
		if ( isset ( Router::getParams()[0] ) )
		{
			$error = Router::getParams()[0];
			$this->setError($error);
		}
		return ErrorModel::$string;
	}

	public function setError($error)
	{
		header("HTTP/1.0 " . $error);
		ErrorModel::$string = $error . ErrorModel::$string;
	}
}