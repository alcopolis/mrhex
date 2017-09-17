<?php require 'inc/connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>MyRepublic CompFest Games</title>

	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body style="text-align:  center; color: #333;">
	
	<div class="wrapper">
		<h1>MyRepublic Logo</h1>
		<h2>CompFest Logo</h2>

        <p>Lorem ipsum dolor sit amet</p>
         
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" name="name" value="<?php if (count($_POST) > 0) echo htmlspecialchars($_POST['name']);?>" placeholder="Nama Lengkap" />
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

		<p><span class="partners">Omen HP Logo</span> <span class="partners">Fox Ch Logo</span></p>	
	</div>
</body>
</html>