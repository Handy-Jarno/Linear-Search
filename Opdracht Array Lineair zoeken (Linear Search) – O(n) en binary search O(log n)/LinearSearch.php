<?php
$array = [];
for ($i = 0; $i < 10000; $i++) {
    $array[] = rand(1, 20000);
}
sort($array);

$target = $array[rand(0, 9999)];

function linearSearch($array, $target) {
    foreach ($array as $element) {
        if ($element == $target) {
            return true;
        }
    }
    return false;
}

function binarySearch($array, $target, $low, $high) {
    if ($low > $high) {
        return false;
    }
    $mid = intdiv($low + $high, 2);
    if ($array[$mid] == $target) {
        return true;
    } elseif ($array[$mid] > $target) {
        return binarySearch($array, $target, $low, $mid - 1);
    } else {
        return binarySearch($array, $target, $mid + 1, $high);
    }
}

$start_time = microtime(true);
$found_linear = linearSearch($array, $target);
$end_time = microtime(true);
echo "Lineair zoeken: " . ($found_linear ? "gevonden" : "niet gevonden") . ", tijd: " . ($end_time - $start_time) . " seconden\n";

$start_time = microtime(true);
$found_binary = binarySearch($array, $target, 0, count($array) - 1);
$end_time = microtime(true);
echo "Binair zoeken: " . ($found_binary ? "gevonden" : "niet gevonden") . ", tijd: " . ($end_time - $start_time) . " seconden\n";
?>
