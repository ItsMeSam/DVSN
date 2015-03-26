<?php

namespace Acuney\Router;

class Router
{
	public $routes;

	public $controller;
	public $view;
	public $model;

	private $errorhandler = array();

	public function __construct(RouteGroup $group)
	{
		$this->routes = $group;
	}

	public function match($uri)
	{
		/*
		* If $uri exists in $this->routes,
		* return true and otherwise return
		* false. After returning true, you
		* might use the draw() method with 
		* the current $uri.
		*/
		if ( $this->routes->exist($uri) )
		{
			return true;
		}
		else
		{
			return false;	
		}		
	}

	public function matchCurrent()
	{
		/*
		* If $_SERVER['REQUEST_URI'] exists 
		* in $this->routes,
		* return true and otherwise return
		* false. After returning true, you
		* might use the draw() method with 
		* $_SERVER['REQUEST_URI'].
		*/

		if ( $this->routes->exist($this->current()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function split()
	{
		$url = (isset($_GET['uri']) ? trim($_GET['uri'],'/') : '/');
		$url = explode('/', $url);
		return $url;
	}

	public function current()
	{
		return \Acuney\Core\Acuney::$basepath . '/' . $this->split()[0];
	}

	public function method()
	{
		$method = (isset($this->split()[1]) && $this->split()[1] != "" && !in_array($this->split()[1], $this->controller->ignoredActions()) ? $this->split()[1] : $this->controller->defaultAction());

		return $method;
	}

	public static function getParams()
	{
		$url = (isset($_GET['uri']) ? trim($_GET['uri'],'/') : '/');
		$url = explode('/', $url);
		array_shift($url);
		array_shift($url);

		return $url;
	}

	public function draw($uri)
	{
		/*
		* For error checking, don't use this
		* for any $_SERVER['REQUEST_URI'],
		* make sure you use match() instead
		* and when it returns true, use this
		* method.
		*/
		if ( !$this->routes->exist($uri) )
		{
			throw new \Exception("Route ({$uri}) doesn't exist");
			return false;
		}

		/*
		* Include all the needed classes and
		* then make an instantiance of them.
		* All instantiances will be saved in
		* an property of this class so you 
		* can use the controller before
		* using the run() method in this class.
		*/
		include \Acuney\Core\Acuney::$modeldir . $this->routes->pluck($uri)->model . ".php";
		include \Acuney\Core\Acuney::$controllerdir . $this->routes->pluck($uri)->controller . ".php";
		include \Acuney\Core\Acuney::$viewdir . $this->routes->pluck($uri)->view . ".php";

		$m = $this->routes->pluck($uri)->model;
		$this->model = new $m;

		$c = $this->routes->pluck($uri)->controller;
		$this->controller = new $c($this->model);

		$v = $this->routes->pluck($uri)->view;
		$this->view = new $v($this->controller, $this->model);
	}

	public function setErrorHandler(Route $errorroute)
	{
		$this->errorhandler = $errorroute;
	}

	public function handleError($error)
	{
		if ( $this->errorhandler != array() )
		{
			include \Acuney\Core\Acuney::$modeldir . $this->errorhandler->model . ".php";
			include \Acuney\Core\Acuney::$controllerdir . $this->errorhandler->controller . ".php";
			include \Acuney\Core\Acuney::$viewdir . $this->errorhandler->view . ".php";

			$m = $this->errorhandler->model;
			$m = new $m();	

			$c = $this->errorhandler->controller;
			$c = new $c($m);

			$v = $this->errorhandler->view;
			$v = new $v($c, $m);

			$c->setError($error);
			return $c->page();
		}
		else
		{
			return false;
		}
	}

	public function run()
	{
		if ( is_a($this->view, 'View') && is_a($this->model, 'Model') && is_a($this->controller, 'Controller') && method_exists($this->controller, $this->method()))
		{
			return $this->controller->{$this->method()}();
		}
		else
		{
			return $this->handleError("404 Not Found");
		}
	}
}