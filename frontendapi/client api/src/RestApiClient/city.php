<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Módosítás</title>
</head>
<body class="modositasPage">
    


<?php



if (isset($_POST['countyId'])) {
    require_once 'ItemRepositoryVarosok.php';
    $countyId = $_POST['countyId']; 
   
    $itemRepositoryVarosok = new ItemRepositoryVarosok();
    $city = $itemRepositoryVarosok->getCityByCountyId($countyId);
}

    echo '
<form method="post" action="city.php">
    <input type="hidden" name="countyId" value="' . $countyId . '"> 
    <input type="text" name="city" value="' . $_POST['city'] . '">
    <button type="submit" name="btn-save" method="post" class="btn-save">Mentés</button>
    <button type="submit" name="btn-cancel" method="post" class="btn-cancel">Mégse</button>
</form>';



?> 




</body>
</html> 



