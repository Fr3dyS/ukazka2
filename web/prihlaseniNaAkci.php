<?php
include('oop/prihlaseniNaAkci.php');
include('server.php');
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
    <div class="header">
        <h2>Přihlášení na akci</h2>
    </div>

    <form method="post" id="eee" action="prihlaseniNaAkci.php">

        <div class="input-group">
            <label>Název akce:</label>
            <select name="" class="input-group" id="select">
                <?php
                $sql = "SELECT * FROM akce;";
                $test;
                $db = kmenDB();
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['nazev'] . "'>" . $row['nazev'] . "- " . $row['dat_start'] . "- " . $row['dat_konec'] . "-" . $row['cena'] . "-" . $row['misto'] . "</option>";
                        $test = $row['nazev'];
                    }
                }
                $prihlaseni = new PrihlaseniNaAkci();
                $prihlaseni->prihlaseniUzivatele($test);
                ?>
            </select>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="prihlasovaniNaAkci">Přihlášení na akci</button>
            <a href="index.php" class="red">Zpět na hlavní menu</a>
        </div>
        <div>
            Tvé jméno bude vidět v DB, po vybrání akce a stisknutí tlačítka
        </div>
    </form>
</body>

</html>