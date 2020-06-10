<?php

class PrihlaseniNaAkci
{
    function prihlaseniUzivatele($nazev)
    {
        $db = kmenDB();
        $jmeno = "admin";
        if (isset($_POST['prihlasovaniNaAkci'])) {
            $user_check_query = "SELECT * FROM prihlaseninaacki WHERE jmenoPrihlaseneho='$jmeno' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                if ($user['jmeno'] === $jmeno) {
                    array_push($error, "Jméno už existuje v DB");
                }
            }
            if (count($error) == 0) {
                $query = "INSERT INTO prihlaseninaakci (id_prihlaseni, jmenoPrihlaseneho, datumPrihlaseni, nazevAkce)
                 VALUES('','$jmeno', DATE(NOW()), '$nazev')";
                mysqli_query($db, $query);
                header('location: index.php');
                $_SESSION['uspech'] = "Právě si se úspěšně přihlásil na akci";
                $_SESSION['pripojeniAkce'] = "Jsi připojen do akce:";
                $_SESSION['nazev'] = $nazev;
            } else {
                header('Location: prihlaseniNaAkci.php');
            }
        }
    }
}
