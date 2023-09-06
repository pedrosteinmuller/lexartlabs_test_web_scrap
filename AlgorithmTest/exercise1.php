<?php
$array = ["a", 10, "b", "hola", 122, 15];

$lettersArray = [];
$numbersArray = [];

foreach ($array as $value) {
    if (is_string($value)) {
        $lettersArray[] = $value;
    } elseif (is_numeric($value)) {
        $numbersArray[] = $value;
    }
}

$highestNumber = max($numbersArray);

echo "Array de letras: ";
print_r($lettersArray);
echo "Array de números: ";
print_r($numbersArray);
echo "Maior número: $highestNumber";
?>
