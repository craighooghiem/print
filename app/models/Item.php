<?php

class Item extends Eloquent{

	protected $table = 'items';

	protected $fillable = array('name');

	public function order()
	{
		return $this->hasMany('Order');
	}

	public function options()
	{
		return $this->hasMany('ItemOption');
	}

}