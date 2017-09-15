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

	$conn = new mysqli($server, $user, $pass, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}




// ------------- Main Script ------------//

	$GLOBALS['validation_err'] = '';
	

	if($_POST){
		
		$is_valid = GUMP::is_valid($_POST, array(
				'name' => 'required|alpha_numeric|min_len,3', 
				'email' => 'required|valid_email|min_len,6', 
				'phone' => 'required|numeric|max_len,12|min_len,6'
			));

		if($is_valid === TRUE){
			addUser($conn, $_POST);
		}else{
			foreach($is_valid as $err){
				$validation_err .= '<span class="msg">' . $err . '</span>';
			}
		}	
		
	}





// ------------ Data CRUD Function -------------//

	function addUser($conn, $loginData = null){
		// Add new player if not exist into db and retrieve the inserted data ID
		$sql = "INSERT INTO leads (name, email, phone) VALUES ('" . $loginData['name'] . "','" . $loginData['email'] . "','" . $loginData['phone'] . "')";

		if ($conn->query($sql) === TRUE) {
		    $sql = "SELECT id, name, score FROM leads WHERE email = '" . $loginData['email'] . "'";
		    $result = $conn->query($sql);

		    //var_dump($result->fetch_assoc());

		    header("Location: index.html");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	function updateUserScore($id){
		//echo Update player score in db
	}





// ------------- Utility ------------ //

	function validateForm($input){

	}

?>