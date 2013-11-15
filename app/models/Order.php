<?php

class Order extends Eloquent{

	protected $table = 'orders';

	protected $fillable = array('user_id', 'item_id', 'pickup_delivery', 'quantity', 'details');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function item()
	{
		return $this->hasOne('Item');
	}

	public function photos()
	{
		return $this->hasMany('Photo');
	}

}