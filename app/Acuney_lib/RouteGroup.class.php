<?php

namespace Acuney\Router;

class RouteGroup
{
	private $routes;

	/*
	* @param {Route} $route 
	*
	* @return void
	*/
	public function attach(Route $route)
	{
		$this->routes[$route->uri] = $route;
	}

	/*
	* @param {string} $route
	*
	* @return void
	*/
	public function remove($route)
	{
		unset($this->routes[$routes]);
	}

	/*
	* @param {string} $route
	*
	* @return $this->routes[$route] || void
	*/
	public function pluck($route)
	{
		if ( isset ( $this->routes[$route] ) )
		{
			return $this->routes[$route];
		}
	}

	/*
	* @param {string} $route
	*
	* @return true || false 
	*/
	public function exist($route)
	{
		if ( isset ( $this->routes[$route] ) )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}