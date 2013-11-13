<?php

class User extends Eloquent{

	protected $table = 'users';

	protected $fillable = array('salutation', 'fname', 'lname', 'company_name', 'email', 'street_no', 'address', 'postal', 'city', 'province', 'telephone');

	public function orders()
	{
		return $this->hasOne('Order');
	}

}