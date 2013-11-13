<?php

class ItemOption extends Eloquent{

	protected $table = 'item_options';

	protected $fillable = array('item_id', 'name');

	public function item()
	{
		return $this->belongsTo('Item');
	}

	public function details()
	{
		return $this->hasMany('ItemOptionDetail');
	}

}