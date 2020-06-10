<?php
include('oop/vypis.php');
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis z databaze</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <h2>Výpis z databaze</h2>
    </div>
    <div class="content">
        <?php
        $vypis = new Vypis();
        ?>
        <p>
            <a href="index.php" class="red">Zpět na hlavní menu</a>
        </p>

    </div>
</body>

</html>