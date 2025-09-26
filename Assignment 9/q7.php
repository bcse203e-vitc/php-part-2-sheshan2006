<?php
class EmptyArrayException extends Exception {}
function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}
$testArrays = [
    [33, 23, 39, 40, 59], 
    []                    
];
foreach ($testArrays as $arr) {
    try {
        $avg = calculateAverage($arr);
        echo "Average of [" . implode(", ", $arr) . "] = $avg <br>";
    } catch (EmptyArrayException $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}
?>

