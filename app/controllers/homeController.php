<?php

class HomeController extends Controller
{
	public function defaultAction()
	{
		return "index";
	}

	public function ignoredActions()
	{
		return array(
			"defaultAction"
		);
	}

	public function index()
	{
		return HomeView::output();
	}
}