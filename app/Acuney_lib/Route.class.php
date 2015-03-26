<?php

namespace Acuney\Router;

class Route
{

	public $uri = '/';
	public $model;
	public $view;
	public $controller;

	public function __construct($uri, $settings)
	{
		$this->uri = $uri;
		$this->model = $settings['_model'];
		$this->view = $settings['_view'];
		$this->controller = $settings['_controller'];
	}
}