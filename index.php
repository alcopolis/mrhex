<?php require 'inc/connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>MR.Hex</title>

	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body id="home" style="text-align:  center; color: #333;">
	
	<div class="wrapper">
		<img src="images/myrep-logo.png"  style="width:500px; display: block; margin: 0 auto;" />
		<img src="images/compfest-logo.png"  style="width:250px;  display: block; margin: 0 auto;" />

        <p style="margin-top: 30px; padding-bottom: 10px; font-weight: bold;">Ayo daftar dan mainkan game ini untuk mendapatkan poin!</p>
         
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" name="nama" value="<?php if (count($_POST) > 0) echo htmlspecialchars($_POST['nama']);?>" placeholder="Nama Lengkap" />
			<input type="email" name="email" value="<?php if (count($_POST) > 0) echo htmlspecialchars($_POST['email']);?>" placeholder="Email" />
			<input type="text" name="phone" value="<?php if (count($_POST) > 0) echo htmlspecialchars($_POST['phone']);?>" placeholder="No. HP/Telepon" />
			<input type="submit" value="Masuk" />
		</form>

		<?php
			if($validation_err != ''){
				echo '<div id="err-msg">
				<h3>Login Gagal</h3>
				<ul>' . $validation_err . '</ul></div>';
			}
		?>

		<div id="partners">
			<span style="color:#999; font-size:14px; ">Partners</span>
			<p><img src="images/omen-by-hp.png" style="height: 40px; margin:10px 5px;" /> <img src="images/fox.png" style="height: 40px; margin:10px 20px;"/></p>	
		</div>
		
	</div>
</body>
</html>