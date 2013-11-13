<?php

class HomeController extends BaseController 
{
	protected $layout = 'template';

	public function index()
	{
		$data['items'] = Item::all();

		$this->layout->content = View::make('index', $data);
	}

	public function product($product_id)
	{
		$data['product'] = Item::find($product_id);

		$this->layout->content = View::make('product', $data);
	}

}