<?php

class HomeController extends BaseController 
{
	protected $layout = 'template';

	public function index()
	{
		$this->layout->content = View::make('index');
	}

}