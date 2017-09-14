<?php 

// ----------- Validation Class -------------//
	require "gump.class.php";

	/*$gump = new GUMP();

	$gump->validation_rules(array(
		'name'    => 'required|alpha_numeric|max_len,50|min_len,6',
		'email'   => 'required|valid_email',
		'phone' => 'required'
	));

	$gump->filter_rules(array(
		'name' => 'trim|sanitize_string',
		'email'    => 'trim|sanitize_email',
	));

	$validated_data = $gump->run($_POST);

	if($validated_data === false) {
		echo $gump->get_readable_errors(true);
	} else {
		print_r($validated_data); // validation successful
	}*/






// ------------ Connect to DB -------------//
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "hextris";
	$table = "leads";

	$conn = new mysqli($server, $user, $pass);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}






// ------------- Main Script ------------//




// ------------ Data CRUD Function -------------//

	function update(){
		//echo "Connected successfully";
	}





// ------------- Utility ------------ //

	function validateForm($input){

	}

?>