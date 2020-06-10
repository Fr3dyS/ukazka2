<?php
include('server.php');
include('oop/login.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Plán akci</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="validate.js"></script>
</head>

<body>
	<center class="pryc">
		<h5>Toho erroru co tu svíti se vůbec neboj-te. Běž-te se zaregistrovat.</h5>
		<h6>Když bude vytvořená DB už nebude vidět</h6>
	</center>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" id="fg" action="login.php">
		<?php
		include('errory.php');
		include('oop/database.php');
		?>
		<div class="input-group">
			<label>Jméno</label>
			<input type="text" name="jmeno">
		</div>
		<div class="input-group">
			<label>Heslo</label>
			<input type="password" name="heslo">
		</div>
		<div class="input-group">
			<button type="submit" class="btn login" name="prihlaseniUzivatel">Login</button>
			Nejsi ještě členem? <a href="registrace.php" class="btn red registr">Zaregistruj se!</a>
		</div>
		<p>
			<a href="registrace.php"></a>
		</p>
		<?php
		$database = new Database();
		$database->vytvoreniDB();
		$database->vytvoreniTabulkyAkce();
		$database->vytvoreniTabulkyUzivatele();
		$database->vytvoreniTabulkyPrihlaseniNaAkci();


		if (isset($_POST['prihlaseniUzivatel'])) {
			$login = new Login();
			$login->prihlaseni();
		}
		?>
	</form>
	<script>
		$("#fg").validate({
			rules: {
				jmeno: {
					required: true,
					minlength: 2
				},
				heslo: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				jmeno: {
					required: "nebylo vloženo jméno",
					minlength: "jméno musí být větší jak dva znaky"
				},
				heslo: {
					required: "nebylo vloženo heslo",
					minlength: "heslo musí být větší jak dva znaky"
				}
			}
		});
	</script>
</body>

</html>