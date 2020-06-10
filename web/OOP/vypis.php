<?php
class Vypis
{
    function vypis()
    {
        $db = kmenDB();
        $sql = "SELECT * FROM akce;";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class= 'aa'>";
                echo "<div class= 'aa'>" . "Misto konani: " . $row['misto'] . "</div>";
                echo "<h4>" . "Nazev akce: " . $row['nazev'] . "</h4>";
                echo "<h4>" . "Datum zacatku: " . $row['dat_start'] . "</h4>";
                echo "<h4>" . "Datum konce :" . $row['dat_konec'] . "</h4>";
                echo "<h4>" . "cena :" . $row['cena'] . "</h4>";
                echo "<div class= 'aa'>" . "Typ akce:" . $row['typ_akce'] . "</div>";
                echo "<br>";
            }
        }
    }
}
