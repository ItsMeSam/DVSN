<?php

include "app/bootstrap.php";

use Acuney\Router\RouteGroup;
use Acuney\Router\Route;
use Acuney\Router\Router;


$routegroup = new RouteGroup();

$routegroup->attach(
	new Route(
		"/DVSN/home",
		array(
			"_model"		=> "homeModel",
			"_controller"	=> "homeController",
			"_view"			=> "homeView"
		)
	)
);

$routegroup->attach(
	new Route(
		"/DVSN/",
		array(
			"_model"		=> "homeModel",
			"_controller"	=> "homeController",
			"_view"			=> "homeView"
		)
	)
);

$routegroup->attach(
	new Route(
		"/DVSN/getconnected",
		array(
			"_model" 		=> "getconnectedModel",
			"_controller"	=> "getconnectedController",
			"_view"			=> "getconnectedView"
		)
	)
);

$routegroup->attach(
	new Route(
		"/DVSN/connected",
		array(
			"_model"		=> "connectedModel",
			"_controller"	=> "connectedController",
			"_view"			=> "connectedView"
		)
	)
);

$errorroute = new Route(
	"/DVSN/error",
	array(
		"_model"			=> "errorModel",
		"_controller"		=> "errorController",
		"_view"				=> "errorView"
	)
);

$routegroup->attach(
	$errorroute
);

$router = new Router($routegroup);
$router->setErrorHandler($errorroute);

if ( $router->matchCurrent() )
{
	$router->draw($router->current());
	echo $router->run();
}
else
{
	echo $router->handleError("404 Not Found");
}