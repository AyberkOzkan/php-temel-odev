<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çevre ve Alan Sonuçları</title>
</head>
<body>
    <h1>Çevre ve Alan Sonuçları</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $shape = $_POST["shape"];
       $a = floatval($_POST["a"]);
       $b = isset($_POST["b"]) ? floatval($_POST["b"]) : 0;
       $c = isset($_POST["c"]) ? floatval($_POST["c"]) : 0;
   
       // Seçilen şekle göre hesaplama yapın
       if ($shape === "kare") {
           if ($a <= 0) {
               echo "<p>Kenar uzunluğu pozitif bir değer olmalıdır.</p>";
           } else {
               $alan = $a * $a;
               $cevre = 4 * $a;
               echo "<p>Kare Alanı: $alan</p>";
               echo "<p>Kare Çevresi: $cevre</p>";
           }
       } elseif ($shape === "dikdortgen") {
           if ($a <= 0 || $b <= 0) {
               echo "<p>Kenar uzunlukları pozitif değerler olmalıdır.</p>";
           } else {
               $alan = $a * $b;
               $cevre = 2 * ($a + $b);
               echo "<p>Dikdörtgen Alanı: $alan</p>";
               echo "<p>Dikdörtgen Çevresi: $cevre</p>";
           }
       } elseif ($shape === "ucgen") {
           if ($a <= 0 || $b <= 0 || $c <= 0) {
               echo "<p>Kenar uzunlukları pozitif değerler olmalıdır.</p>";
           } elseif ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
               echo "<p>Bu kenar uzunlukları ile üçgen oluşturulamaz.</p>";
           } else {
               $s = ($a + $b + $c) / 2;
               $alan = sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
               $cevre = $a + $b + $c;
               echo "<p>Üçgen Alanı: $alan</p>";
               echo "<p>Üçgen Çevresi: $cevre</p>";
           }
       }
    }
   ?>
</body>
</html>
