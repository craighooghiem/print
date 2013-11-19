<?php

class ShippingAddress extends Eloquent{

	protected $table = 'shipping_address';

	protected $fillable = array('street_no', 'address', 'postal', 'city', 'province', 'telephone');

	public function orders()
	{
		return $this->belongsTo('Order');
	}

}