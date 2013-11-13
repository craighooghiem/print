<?php

class ItemOptionDetail extends Eloquent{

	protected $table = 'item_option_details';

	protected $fillable = array('item_option_id', 'name', 'picture');

	public function item_option()
	{
		return $this->belongsTo('ItemOption');
	}

}