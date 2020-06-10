<?php
class Database
{
    function vytvoreniDB()
    {
        $conn = startDB();
        $sql = "CREATE DATABASE IF NOT EXISTS pololetka";
        mysqli_query($conn, $sql);
    }
    function vytvoreniTabulkyUzivatele()
    {
        $db = kmenDB(); 
        $sql = "CREATE TABLE IF NOT EXISTS  uzivatele (
               id_uzivatel INT(30) AUTO_INCREMENT PRIMARY KEY,
               jmeno  CHAR(30) NOT NULL,
               prijmeni CHAR(30) NOT NULL,
               email CHAR(50)  NOT NULL, 
               datum_narozeni DATE  NOT NULL,
               heslo CHAR(50)  NOT NULL)";
        mysqli_query($db, $sql);
    }
    function vytvoreniTabulkyAkce()
    {
        $db = kmenDB(); 
        $sql = "CREATE TABLE IF NOT EXISTS akce(
                Id_akce INT(30) AUTO_INCREMENT PRIMARY KEY,
                nazev CHAR(30) NOT NULL,
                dat_start DATE NOT NULL,
                dat_konec DATE NOT NULL,
                cena DECIMAL(6,2)  NOT NULL,
                misto CHAR(50)  NOT NULL,
                typ_akce CHAR(50)  NOT NULL)";
        mysqli_query($db, $sql);
    }
    function vytvoreniTabulkyPrihlaseniNaAkci()
    {
        $db = kmenDB(); 
        $sql = "CREATE TABLE IF NOT EXISTS prihlaseniNaAkci(
            id_prihlaseni INT(30) AUTO_INCREMENT PRIMARY KEY,
            jmenoPrihlaseneho CHAR(30) NOT NULL,
            datumPrihlaseni DATE  NOT NULL,
            nazevAkce CHAR(50) NOT NULL
            )";
        mysqli_query($db, $sql);
    }
}
