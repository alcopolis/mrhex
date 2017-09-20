<?php 

// ----------- Validation Class -------------//
	require "gump.class.php";


// ------------ Connect to DB -------------//

	require "db.php";

	$conn = new mysqli($server, $user, $pass, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}




// ------------- Main Script ------------//

	$GLOBALS['validation_err'] = '';
	

	if($_POST){

		//Set session for user identifier for updating the score
	    session_start();
	    /*$_SESSION['nama'] = '';
		$_SESSION['email'] = '';*/	
		
		$is_valid = GUMP::is_valid($_POST, array(
				'nama' => 'required|min_len,3', 
				'email' => 'required|valid_email|min_len,6', 
				'phone' => 'required|numeric|max_len,12|min_len,6'
			));


		if($is_valid === TRUE){
			if(is_exist($conn, $_POST)){
				// If true sent to games pages

				$_SESSION['nama'] = $_POST['nama'];
				$_SESSION['email'] = $_POST['email'];
				
				header("Location: mrhex.php");
			}else{
				// If false adds the user
				addUser($conn, $_POST);
			}
		}else{
			foreach($is_valid as $err){
				$validation_err .= '<li class="msg">' . $err . '</li>';
			}
		}	
		
	}




// ------------ Data CRUD Function -------------//

	function addUser($conn, $loginData = null){
		// Add new player if not exist into db and retrieve the inserted data ID

		$sql = "INSERT INTO leads (nama, email, phone) VALUES ('" . $loginData['nama'] . "','" . $loginData['email'] . "','" . $loginData['phone'] . "')";

		if ($conn->query($sql) === TRUE) {

		    //Set session for user identifier for updating the score
		    session_start();
		    $_SESSION['nama'] = $loginData['nama'];
    		$_SESSION['email'] = $loginData['email'];

		    header("Location: mrhex.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	


// ------------- AJAX ------------ //

	if(isset($_POST['action'])){
		echo $_POST['action']();
	}
	

	function getUserData(){
		//echo 'AJAX function call';
		$returnData = json_encode(array(
			'nama'=>$_SESSION['nama'],
			'email'=>$_SESSION['email']
		));

		echo $returnData;
	}


	function updateUserScore(){
		$data = $_POST['data'];

		$upconn = mysql_connect('localhost', 'root', '');
		
		// if (!$upconn) {
		//     die("Connection failed: " . $upconn->connect_error);
		//     echo 'connection error';
		// }

		$sql = "UPDATE leads SET score='" . $data['score'] . "' WHERE email='" . $data['email'] . "'";
		
		mysql_select_db('hextris');
		$retval = mysql_query($sql, $upconn);

		if(! $retval ) {
	      die('Could not update data: ' . mysql_error());
	    }
	    echo "Updated data successfully";
	    mysql_close($upconn);
	}


	function getHighscores(){
		$limit = 1;
		$dataReturn = null;

		$upconn = mysql_connect('localhost', 'root', '');
		$sql = "SELECT * FROM leads ORDER BY score DESC LIMIT " . $limit;
		
		mysql_select_db('hextris');
		$retval = mysql_query($sql, $upconn);

		while($row = mysql_fetch_array($retval)){
			//var_dump($row);
			$dataReturn = $row['score'] . '<span style="font-size:11px; display:block;">' . $row['nama'] . '</span>';
		}


		if(isset($_POST)){
			// ajax call
			echo $dataReturn;
		}else{
			// not ajax call for scoreboard page
			//echo "Not ajax call";
			return false;
		}
	}


// ------------- Utility ------------ //

	function is_exist($conn, $data){
		$sql = "SELECT id, nama FROM leads WHERE email = '" . $data['email'] . "'";
		$result = $conn->query($sql);

		if($result->fetch_row() > 0){
			return true;
		}else{
			return false;
		}
	}




	
?>