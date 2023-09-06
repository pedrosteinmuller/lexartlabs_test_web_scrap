<?php
function generateId() {
    $pattern = '%04s-%04s-%04s-%04s';
    $id = sprintf($pattern, randomSegment(), randomSegment(), randomSegment(), randomSegment());
    return $id;
}

function randomSegment() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $segment = '';
    for ($i = 0; $i < 4; $i++) {
        $randomChar = $characters[rand(0, strlen($characters) - 1)];
        $segment .= $randomChar;
    }
    return $segment;
}

// Gerar um ID
$id = generateId();
echo "ID gerado: $id";
?>
