<?php
include('server.php');
include('OOP/CRUD.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="validate.js"></script>
    
</head>

<body>
    <div class="header">
        <h2>Odebírání akcí podle ID</h2>
    </div>

    <form method="post" id="fg" action="delete.php">
        <?php include('errory.php');
        if (isset($_SESSION['wrong'])) {
            echo $_SESSION['wrong'];
            unset($_SESSION['wrong']);
        } ?>
        <div class="input-group">
            <label>ID:</label>
            <input type="number" name="deleteID">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="mazaniZDB">Odeber akci podle ID</button>
            <a href="index.php" class="red">Zpět na hlavní menu</a>
        </div>
        <div> Můžete odstranit akci s id :
            <?php
            $delete = new CRUD();
            $delete->delete();
            ?>
        </div>
       
    </form>
    <script>
        $("#fg").validate({
            rules: {
                deleteID: {
                    required: true,
                }
            },
            messages: {
                deleteID: {
                    required: "nebylo vloženo id",
                }
            }
        });
    </script>
</body>

</html>