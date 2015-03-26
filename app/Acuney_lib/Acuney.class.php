<?php

namespace Acuney\core;

class Acuney
{
	public static $modeldir;
	public static $viewdir;
	public static $controllerdir;
	public static $templatedir;
	public static $basepath;

	public function set($option, $value)
	{
		if ( property_exists( $this, $option ) )
		{
			self::$$option = $value;
		}
		else
		{
			throw new \Exception("Option ({$option}) isn't found");
		}
	}

	public function get($option)
	{
		if ( property_exists( $this, $option ) )
		{
			return self::$$option;
		}
		else
		{
			throw new \Exception("Option ({$option}) isn't found");
		}
	}
}