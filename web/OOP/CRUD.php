<?php
class CRUD
{
    function delete()
    {
        $db = kmenDB();
        $sql = "SELECT Id_akce FROM `akce`";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['Id_akce'] . ". ";
                if (isset($_POST['mazaniZDB'])) {
                    $id = mysqli_real_escape_string($db, $_POST['deleteID']);
                    $idD = "";
                    $sqlL = "SELECT * FROM akce WHERE id_akce='$idD';";
                    $sql = "DELETE FROM akce WHERE id_akce='$id';";
                    $results = mysqli_query($db, $sql);
                    if ($_POST["deleteID"] == $row['Id_akce']) {
                        header('Location: index.php');
                        $_SESSION['uspech'] = "Právě si se úspěšně smazal akci";
                    } else {
                        $_SESSION['wrong'] = "Zadal si špatné ID - zkus to znovu";
                    }
                }
            }
        }
    }
    function updateAkce()
    {
        $db = kmenDB();
        if (isset($_POST['updateDat'])) {
            $nazev = mysqli_real_escape_string($db, $_POST['updateNazev']);
            $id =  mysqli_real_escape_string($db, $_POST['id']);
            if ($id <  1) {
                array_push($error, "ID musí být větší jak 1");
            }
            if (count($error) == 0) {
                $sql = "UPDATE akce SET misto='$nazev' WHERE id_akce='$id';";
                mysqli_query($db, $sql);
                $_SESSION['pripojeniAkce'] = "Právě si se úspěšně změnil adresu na: ";
                $_SESSION['nazev'] = $nazev;
                header('location: index.php');
            }
        }
    }
}
