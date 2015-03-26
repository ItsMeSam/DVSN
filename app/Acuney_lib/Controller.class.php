<?php

abstract class Controller
{
	public $model;

	public function __construct($model)
	{
		$this->model = $model;
	}
}