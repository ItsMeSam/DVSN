<?php

abstract class View
{
	public $model;
	public $controller;

	public function __construct($controller, $model)
	{
		$this->controller = $controller;
		$this->model = $model;
	}
}
