<?php
session_start();
function kmenDB()
{
    return new mysqli("localhost", "root", '', "pololetka");
}
function startDB()
{
    return new mysqli("localhost", "root", '');
}
$db = kmenDB();
$error = array();

if (isset($_POST['registrovanyUzivatel'])) {
    $jmeno = mysqli_real_escape_string($db, $_POST['jmeno']);
    $prijmeni = mysqli_real_escape_string($db, $_POST['prijmeni']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $heslo = mysqli_real_escape_string($db, $_POST['heslo']);
    $heslo2 = mysqli_real_escape_string($db, $_POST['heslo2']);
    $date = mysqli_real_escape_string($db, $_POST['datum']);

    if ($date > date("Y-m-d")) {
        array_push($error, "Musíš zadat realné narození");
    }

    $user_check_query = "SELECT * FROM uzivatele WHERE jmeno='$jmeno' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['jmeno'] === $jmeno) {
            array_push($error, "Jméno už existuje v DB");
        }
        if ($user['prijmeni'] === $prijmeni) {
            array_push($error, "Příjmení už existuje v DB");
        }

        if ($user['email'] === $email) {
            array_push($error, "Email existuje v DB");
        }
    }
    if (count($error) == 0) {
        $query = "INSERT INTO uzivatele (id_uzivatel, jmeno, prijmeni, email, datum_narozeni, heslo) 
                VALUES('','$jmeno','$prijmeni', '$email', '$date', '$heslo2')";
        mysqli_query($db, $query);
        $_SESSION['jmeno'] = $jmeno;
        $_SESSION['uspech'] = "Právě si se úspěšně zaregistroval ";
        header('location: index.php');
    }
}
