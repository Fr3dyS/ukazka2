<?php

class Login
{
  function prihlaseni()
  {
      $db = kmenDB();
      $jmeno = mysqli_real_escape_string($db, $_POST['jmeno']);
      $heslo = mysqli_real_escape_string($db, $_POST['heslo']);

      $query = "SELECT * FROM uzivatele WHERE jmeno='$jmeno' AND heslo='$heslo'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['jmeno'] = $jmeno;
        $_SESSION['potvrzeno'] = "Právě si se úspěšně přihlásil";
        header('location: index.php');
      } else {
        printf("Heslo nebo jméno bylo špatně zadáno!");
      }
    }
  }
