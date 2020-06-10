<?php
session_start();
class PridavaniAkci
{
    function pridavaniAkciDoDB()
    {
        $db = new mysqli("localhost", "root", '', "pololetka"); 
        if (isset($_POST['pridavaniDoDB'])) {
            $datumStartu = mysqli_real_escape_string($db, $_POST['dateStart']);
            $datumKonce = mysqli_real_escape_string($db, $_POST['dateKonec']);
            $mistoKonani = mysqli_real_escape_string($db, $_POST['misto']);
            $nazevAkce = mysqli_real_escape_string($db, $_POST['akce']);
            $typAkce = mysqli_real_escape_string($db, $_POST['typ']);
            $cena = mysqli_real_escape_string($db, $_POST['cena']);
            if ($datumKonce < $datumStartu) {
                array_push($error, "Datum startu musí být menší jak datum konce ");
            }
            if (count($error) == 0) {

                $akce = "INSERT INTO akce (Id_akce, nazev, dat_start, dat_konec, cena, misto, typ_akce) VALUES('','$nazevAkce','$datumStartu', '$datumKonce', '$cena', '$mistoKonani','$typAkce')";
                mysqli_query($db, $akce);
                $_SESSION['uspech'] = "Právě si úspěšně vložil akci do databaze";
                header('location: index.php');
            }
        }
    }
}
