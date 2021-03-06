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
		$data['state_arr'] = array( "ON" => "Ontario",
			"AB" => "Alberta",
			"BC" => "British Columbia",
			"MB" => "Manitoba",
			"NB" => "New Brunswick",
			"NL" => "Newfoundland and Labrador",
			"NS" => "Nova Scotia",
			"NT" => "Northwest Territories",
			"NU" => "Nunavut",
			"PE" => "Prince Edward Island",
			"QC" => "Quebec",
			"SK" => "Saskatchewan",
			"YT" => "Yukon",
			"divider" => "---------------",
			"AL" => "Alabama",
			"AK" => "Alaska",
			"AZ" => "Arizona",
			"AR" => "Arkansas",
			"CA" => "California",
			"CO" => "Colorado",
			"CT" => "Connecticut",
			"DE" => "Delaware",
			"DC" => "District of Columbia",
			"FL" => "Florida",
			"GA" => "Georgia",
			"HI" => "Hawaii",
			"ID" => "Idaho",
			"IL" => "Illinois",
			"IN" => "Indiana",
			"IA" => "Iowa",
			"KS" => "Kansas",
			"KY" => "Kentucky",
			"LA" => "Louisiana",
			"ME" => "Maine",
			"MD" => "Maryland",
			"MA" => "Massachusetts",
			"MI" => "Michigan",
			"MN" => "Minnesota",
			"MS" => "Mississippi",
			"MO" => "Missouri",
			"MT" => "Montana",
			"NE" => "Nebraska",
			"NV" => "Nevada",
			"NH" => "New Hampshire",
			"NJ" => "New Jersey",
			"NM" => "New Mexico",
			"NY" => "New York",
			"NC" => "North Carolina",
			"ND" => "North Dakota",
			"OH" => "Ohio",
			"OK" => "Oklahoma",
			"OR" => "Oregon",
			"PA" => "Pennsylvania",
			"RI" => "Rhode Island",
			"SC" => "South Carolina",
			"SD" => "South Dakota",
			"TN" => "Tennessee",
			"TX" => "Texas",
			"UT" => "Utah",
			"VT" => "Vermont",
			"VA" => "Virginia",
			"WA" => "Washington",
			"WV" => "West Virginia",
			"WI" => "Wisconsin",
			"WY" => "Wyoming");

		$this->layout->content = View::make('product', $data);
	}

	public function post_product($product_id)
	{
		Input::flash();
		$validator = Validator::make(
		    array(	
		    	'quantity' => Input::get('quantity'),
	    		'salutation' => Input::get('salutation'),
	    		'first_name' => Input::get('fname'),
	    		'last_name' => Input::get('lname'),
	    		'company_name' => Input::get('company_name'),
	    		'email' => Input::get('email'), 
	    		'confirm_email' => Input::get('confirm_email'), 
	    		'street no' => Input::get('street_no'),
	    		'postal' => Input::get('postal'), 
	    		'city' => Input::get('city'), 
	    		'telephone' => Input::get('telephone1'), 
	    		'telephone' => Input::get('telephone2'), 
	    		'telephone' => Input::get('telephone3')
		    	),
		    array(	
		    	'quantity' => array('required'),
	    		'salutation' => array('required'),
	    		'first_name' => array('required'),
	    		'last_name' => array('required'),
	    		'company_name' => array('required'),
	    		'email' => array('required', 'email', 'same:confirm_email'), 
	    		'confirm_email' => array('required', 'email', ), 
	    		'street no' => array('required'),
	    		'postal' => array('required'), 
	    		'city' => array('required'), 
	    		'telephone' => array('required'), 
	    		'telephone' => array('required'), 
	    		'telephone' => array('required')
		    	)
		);

		if($validator->fails() )
        {
            return Redirect::to('product/'.$product_id)->withErrors($validator);
        }

        $user = User::create(array('salutation' => Input::get('salutation'), 
			'fname' => Input::get('fname'), 
			'lname' => Input::get('lname' ), 
			'company_name' => Input::get('company_name'), 
			'email' => Input::get('email'), 
			'street_no' => Input::get('street_no'), 
			'address' => Input::get('address'), 
			'postal' => Input::get('postal'), 
			'city' => Input::get('city'), 
			'province' => Input::get('province'), 
			'telephone' => Input::get('telephone1').'-'.Input::get('telephone2').'-'.Input::get('telephone3')
        ));

        if($user->save() )
        {
        	$details = Input::get('details') != '' ? json_encode(Input::get('details') ) : '-';

        	$street_no = Input::get('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)' ? Input::get('street_no2') : Input::get('street_no');
        	$address = Input::get('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)' ? Input::get('address2') : Input::get('address');
        	$postal = Input::get('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)' ? Input::get('postal2') : Input::get('postal');
        	$city = Input::get('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)' ? Input::get('city2') : Input::get('city');
        	$province = Input::get('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)' ? Input::get('province2') : Input::get('province');

        	//creating the shipping address
        	$s_address = ShippingAddress::create(array(
        		'street_no' => $street_no,
        		'address' => $address,
        		'postal' => $postal,
        		'city' => $city,
        		'province' => $province
        	));

        	$order = Order::create(array('user_id' => $user->id, 
				'item_id' => $product_id,
				'pickup_delivery' => Input::get('pickup_delivery'), 
				'quantity' => Input::get('quantity'), 
				'details' => $details,
				'shipping_address_id' => $s_address->id
        	));

        	if($order->save() )
        	{
        		if(Input::get('photos') != null)
        		{
        			foreach(Input::get('photos') as $p)
	        		{
		        		$photo = Photo::create(
		        			array(
		        				'order_id' => $order->id, 
								'original_name' => substr($p, 14), 
								'photo_name' => $p
							)
		        		);
	        		}
	        	}

	        	$photos = Input::get('photos') != null ? Input::get('photos') : 'n/a';
	        	
	        	$data = array(
        			'product' => Input::get('product_name'),
    		        'fname' => Input::get('fname'), 
					'lname' => Input::get('lname' ), 
					'company_name' => Input::get('company_name'), 
					'email' => Input::get('email'), 
					'street_no' => Input::get('street_no'), 
					'address' => Input::get('address'), 
					'postal' => Input::get('postal'), 
					'city' => Input::get('city'), 
					'province' => Input::get('province'), 
					'telephone' => Input::get('telephone1').'-'.Input::get('telephone2').'-'.Input::get('telephone3'),
					'quantity' => Input::get('quantity'),
					'pickup_delivery' => Input::get('pickup_delivery'),
					'details' => $details,
					'photos' => $photos,
					'shipping_street_no' => $street_no, 
					'shipping_address' => $address, 
					'shipping_postal' => $postal, 
					'shipping_city' => $city, 
					'shipping_province' => $province, 
        		);
	        	//send the email here
	        	Mail::send('mail', $data, function($message)
				{
				    $message->to('craig.hooghiem@gmail.com', 'Print Plus')->subject('Online Order Placed');
				    $message->from('orders@print-plus.ca', 'Print Plus Orders');
				});
        	}
        }

		return Redirect::to('/success');
	}

	public function success()
	{
		$this->layout->content = View::make('success');
	}

}

