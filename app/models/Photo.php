<?php

class Photo extends Eloquent{

	protected $table = 'photos';

	protected $fillable = array('order_id', 'original_name', 'photo_name');

	public function order()
	{
		return $this->belongsTo('Order');
	}

}