<?php

class HomeModel extends Model
{
	public static $templatefile;

	public function __construct()
	{
		self::$templatefile = "home.tpl";
	}
}