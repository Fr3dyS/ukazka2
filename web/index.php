<?php
session_start();
if (!isset($_SESSION['jmeno'])) {
	$_SESSION['msg'] = "Musíš být nejdříve přihlášen";
	header('location: login.php');
}
$_SESSION['vitej'] = "Vítej";
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['jmeno']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Plán akci</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		.cena {
			float: left;
		}
	</style>
</head>

<body>
	<h3>Toho erroru co tu svíti se vůbec neboj. Běž se zaregistrovat.</h3>
	<div class="header">
		<h2>Plán akci</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['uspech'])) : ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['uspech'];
					unset($_SESSION['uspech']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['jmeno'])) : ?>
			<div class="center">
				<?php echo $_SESSION['vitej']; ?>
				<strong><?php echo $_SESSION['jmeno']; ?></strong></p>
				<?php
				if (isset($_SESSION['pripojeniAkce'])) {
					echo $_SESSION['pripojeniAkce'];
					echo "<strong>" . $_SESSION['nazev'] . "</strong>";
					unset($_SESSION['pripojeniAkce']);
					unset($_SESSION['nazev']);
				}
				?>
				<p><a href="akce.php">Vlad akci</a></p>
				<p><a href="prihlaseniNaAkci.php">Přihlášení na akci</a></p>
				<p class="Delete"><a href="delete.php">Mazaní</a></p>
				<p><a href="vypis.php">Výpis akci</a></p>
				<p><a href="vypisNaKtereJsemPrihlasen.php">Výpis akci na které jsem přihlášen</a></p>
				<p> <a href="index.php?logout='1'" style="color: red;">Odhlášení</a></p>

			</div>
		<?php endif ?>
	</div>
</body>

</html>