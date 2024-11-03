<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Városok</title>
</head>
<body>
    <h1>Városok Projektfeladat</h1>
    <nav">
    <ul>
        
        <h2>Megyék:</h2>
        
    </ul>
</nav>

     <div class="megyek"> 
        <?php

    require_once('ItemRepositoryVarosok.php');
    $itemRepositoryVarosok = new ItemRepositoryVarosok();
    

        if(!isset($counties)) {
            $counties = $itemRepositoryVarosok->getAllCounties();
        }


        $counties = $itemRepositoryVarosok->getAllCounties();
        
        if(!isset($cimerek)) {
            $cimerek = $itemRepositoryVarosok->getAllFlags();
        }


        $cimerek = $itemRepositoryVarosok->getAllFlags();


        echo '<table>';

        echo '<tr class="megyekHeader"><td><p>Megnevezés</p></td>';
        echo '<td style="padding: 28px;"></td>';
        echo '<td><p>Címer</p></td>';
        echo '<td style="padding: 0 15px;"></td>';
        echo '<td><p>Zászló</p></td>';
        echo '<td style="padding: 0 15px;"></td>';
        echo '<td><p>Megyeszékhely</p></td>';
        echo '<td style="padding: 0 15px;"></td>';
        echo '<td><p>Lakosság</p></td></tr>';
        
        
        for ($i = 0; $i < count($counties); $i++) {
            
            echo '<tr>';
            
          
                  echo '<td>
                  <div class="county-flag-container">
                      <a href="counties.php?countyId=' . $counties[$i]['countyId'] . '">
                          <button class="megyegombok">' . $counties[$i]['county'] . '</button>
                      </a>
                  </div>
                </td>';
                

            echo '<td style="padding: 0 15px;"></td>';
            
            
            echo '<td>
                    <div class="county-flag-container">
                        <img src="' . $cimerek[$i]['cimer'] . '" alt="megyecimer">
                    </div>
                  </td>';
            
            echo '<td style="padding: 0 15px;"></td>';

           
            echo '<td>
                    <div class="county-flag-container">
                        <img src="' . $cimerek[$i]['zaszlo'] . '" alt="megyecimer">
                    </div>
                  </td>';

            echo '<td style="padding: 0 15px;"></td>';

            
            echo '<td>
            <div class="county-flag-container">
                <a>
                    <p class="szek_lakos">' . $cimerek[$i]['szekhely'] . '</p>
                </a>
            </div>
            </td>';

            echo '<td style="padding: 0 15px;"></td>';

            
            echo '<td>
            <div class="county-flag-container">
                <a>
                    <p class="szek_lakos">' . $cimerek[$i]['lakosokszama'] . '</p>
                </a>
            </div>
            </td>';
            echo '<tr><td colspan="9"><hr class="megyevonal"></td></tr>';
            
        



            
            echo '</tr>';
        }

        

            
        
        echo '</table>'; 


        ?>






    </div> 
    
</body>
</html> 


