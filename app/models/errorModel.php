<?php

class errorModel extends Model
{
	public static $string;

	public function __construct()
	{
		self::$string = " - Oops.. an error occured..";
	}
}