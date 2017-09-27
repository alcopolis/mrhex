<?php
		//require 'inc/connection.php';

	 	session_start();

		if($_SESSION['email'] === null || $_SESSION['email'] == ''){
			header("Location: index.php");
		}
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>MR.Hex</title>
		<meta name="apple-itunes-app" content="app-id=903769553"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, minimal-ui"/>
		<meta property="og:title" content="MR.Hex"/>
		<meta property="og:description" content="An addictive puzzle game inspired by Tetris."/>
		<meta property="og:type" content="website"/>
		<link rel="icon" type="image/png" href="favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="style/fa/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<script type='text/javascript' src="vendor/hammer.min.js"></script>
		<script type='text/javascript' src="vendor/js.cookie.js"></script>
		<script type='text/javascript' src="vendor/jsonfn.min.js"></script>
		<script type='text/javascript' src="vendor/keypress.min.js"></script>
		<script type='text/javascript' src="vendor/jquery.js"></script>
		<script type='text/javascript' src="js/save-state.js"></script>
		<script type='text/javascript' src="js/view.js"></script>
		<script type='text/javascript' src="js/wavegen.js"></script>
		<script type='text/javascript' src="js/math.js"></script>
		<script type='text/javascript' src="js/Block.js"></script>
		<script type='text/javascript' src="js/Hex.js"></script>
		<script type='text/javascript' src="js/Text.js"></script>
		<script type='text/javascript' src="js/comboTimer.js"></script>
		<script type='text/javascript' src="js/checking.js"></script>
		<script type='text/javascript' src='js/update.js'></script>
		<script type='text/javascript' src='js/render.js'></script>
		<script type='text/javascript' src="js/input.js"></script>
		<script type='text/javascript' src="js/main.js"></script>
		<script type='text/javascript' src="js/initialization.js"></script>
		<script src="vendor/sweet-alert.min.js"></script>
		<link rel="stylesheet" href="style/rrssb.css"/>
	</head>
	<body>
		
		<canvas id="canvas"></canvas>
		<div id="overlay" class="faded overlay"></div>
		
		<div id='startBtn' ></div>
		
		<div id="helpScreen" class='unselectable'>
			<div id='inst_main_body'></div>
		</div>
		
		<img id="openSideBar" class='helpText' src="./images/btn_help.svg"/>
		
		<div class="faded overlay"></div>
		<img id="pauseBtn" src="./images/btn_pause.svg"/>
		<img id='restartBtn' src="./images/btn_restart.svg"/>
		<div id="mr-logo" class="logo">
			<a href="./"><img src="images/myrep-logo.png" style="width: 100%;" /></a>
		</div>

		
		
		<div id='highScoreInGameText'>
			<div id='highScoreInGameTextHeader'>HIGH SCORES</div><div id='currentHighScore'></div>
		</div>
		<div id="gameoverscreen">
			<div id='container'>
				<h1 id="game-over">GAME OVER</h1>
				
				<div id="PointBox">
					<div id='cScore'>1843</div>
					<div class='GOTitle'>Selamat! Kamu Mendapatkan</div>
					<div id='cPoint'>1823</div>
				</div>
			</div>

			<div id="bottomContainer">
				<div id="partners">
					<span style="color:#999; font-size:14px; text-align: center; display: block;">Partners</span>
					<p style="text-align: center;"><img src="images/omen-by-hp.png" style="height: 40px; margin:10px 5px;" /> <img src="images/fox.png" style="height: 40px; margin:10px 20px;"/></p>	
				</div>	
			</div>

			<div id='buttonCont'>
					
			</div>
		</div>
		<script type="text/javascript" src='vendor/rrssb.min.js'></script>
	</body>
</html>
