<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Városok</title>
</head>
<body style="margin: auto; width: 29%; text-align: center;">
    <a class="vissza" href="./indexvarosok.php"><i></i>Kezdőlap</a>
    <h1 class="varosok">Városok</h1>
    <table class="varosokthead">
        <thead>
            <th>#id</th><th>Megnevezés</th><th>Műveletek</th>
        </thead>
        <tbody>
            <div class="felsok">
                <form method="post" action="counties.php">
                    <input type="text" name="needle" value="">
                    <button type="submit" name="btn-search" method="post" class="btn-search-for">Keres</button>
                </form><br>
                <form method="post" action="">
                    <!--
                    <input type="hidden" name="countyId" value="<?php $countyId ?>"> -->
                    <input type="number" name="countyId" value="">
                    <!-- <input type="hidden" name="city value="<?php $city['city']?>">  -->
                    <input type="text" name="city" value="">
                    <button type="submit" name="btn-save-new" method="post" class="btn-save-new">Új Hozzáadása</button>
                </form>
            </div>

            <?php
            require_once('ItemRepositoryVarosok.php');
            $itemRepositoryVarosok = new ItemRepositoryVarosok();

            if (isset($_POST['btn-cancel'])) {
                header('Location: counties.php');
                
            }


            if (isset($_POST['btn-save'])) {
                $city = $_POST['city'];
                $countyId = $_POST['countyId'];
                $itemRepositoryVarosok->updateCity($city,$countyId);           
                
            }


            if (isset($_POST['btn-delete'])) {
                //$countyId = $_POST['countyId'];
                $city= $_POST['city'];

                $itemRepositoryVarosok->deleteCity($city);
            }

            if (isset($_POST['btn-save-new'])) {
                $city = $_POST['city'];
                $countyId = $_POST['countyId'];

                $itemRepositoryVarosok->saveCity($city,$countyId);
            }

            if (isset($_POST['btn-search'])) {
                $needle = $_POST['needle'];

                $cities = $itemRepositoryVarosok->searchCity($needle);
            }

            $countyId = isset($_GET['countyId']) ? intval($_GET['countyId']) : 0;

            if (!isset($cities)) {
                $cities = $itemRepositoryVarosok->getCityByCountyId($countyId);
            }

            if (!isset($flags)) {
                $flags = $itemRepositoryVarosok->getCountyFlagById($countyId);
            }

           

            foreach ($cities as $city) {
                echo ''
                //var_dump($city)
                . '<tr>'
                    . '<td>' . $city['countyId'] . '</td>'
                    . '<td>' . $city['city'] . '</td>'
                    . '<td><div style="display: flex">'
                        . '<form method="post" action="city.php">
                            <input type="hidden" name="countyId" value="' . $city['countyId'] . '">
                            <input type="hidden" name="city" value="' . $city['city'] . '">
                            <button type="submit" class="modositasgomb">
                                <i>Módosítás</i>
                            </button>
                            </form>'

                            . '<form method="post" action="">
                            <button type="submit" id="btn-delete" name="btn-delete" class="torlesgomb">
                                <i>Törlés</i>
                            </button>
                            <input type="hidden" name="city" value="' . $city['city']. '">
                            </form>'
                    . '</div></td>'
                . '</tr>';
            
            }
            ?>
        </tbody>

    </table>
</body>
</html>



