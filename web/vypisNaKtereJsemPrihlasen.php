<?php
include('oop/vypis.php');
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis na které akce jsem přihlášen</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <h2>Výpis na které akce jsem přihlášen</h2>
        
    </div>
    <div class="content">
    <h2>Zatím nefunguje - dodělám do příštího odeslání  </h2><br>
        <?php
        $vypis = new Vypis();
        ?>
            <p>
            <a href="index.php" class="red">Zpět na hlavní menu</a>
            <a href="vypis.php" class="red">Zpět na stránku s výpisem všech akci</a>
        </p>

    </div>
</body>

</html>