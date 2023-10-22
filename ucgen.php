<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ODEV - 1</title>
</head>
<body>
<?php
    function cizUcgen($satirSayisi) {
        // İç içe geçmiş for ve while döngüleri kullanarak üçgeni çiziyoruz.
        for ($i = 1; $i <= $satirSayisi; $i++) {
            $j = 1;
            echo '<p>'; 
            while ($j <= $i) {
                echo "* ";
                $j++;
            }
            echo '</p>'; 
        }
    }

    // Fonksiyonu çağırarak üçgeni çizelim.
    cizUcgen(10);
?>
</body>
</html>
