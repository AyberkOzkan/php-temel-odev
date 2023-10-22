<!-- Verilen dizideki boş elemanları temizleyerek 
    belirtilen adette rastgele değerlerden dizi oluşturan bir fonksiyon yazın. 
    (array_map(), array_filter() ve array_rand() fonksiyonlarını kullanarak.) 
-->
<?php
echo "<pre>";
function planets($planets, $number){
    $planets = array_filter($planets, function($value){
        return !empty($value);
    });

    // shuffle($planets);
    $randomKeys = array_rand($planets, $number);
    $selectedPlanets = array_map(function($key) use ($planets) {
        return $planets[$key];
    }, $randomKeys);
    return $selectedPlanets;
}

$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];

print_r(planets($planets, 2));
print_r(planets($planets, 3));
print_r(planets($planets, 2));
print_r(planets($planets, 4));
print_r(planets($planets, 5));

echo "<pre>"

?>