<?php
$inputFile = "data.txt";
$outputFile = "numbers.txt";
if (!file_exists($inputFile)) {
    die("Error: data.txt not found!");
}
$content = file_get_contents($inputFile);
$pattern = "/\b[6-9][0-9]{9}\b/"; 
preg_match_all($pattern, $content, $matches);
$numbers = array_unique($matches[0]);
if (!empty($numbers)) {
    file_put_contents($outputFile, implode(PHP_EOL, $numbers));
    echo "<h3>Extracted Mobile Numbers:</h3>";
    echo nl2br(implode(PHP_EOL, $numbers));
    echo "<br><br>Numbers saved to <b>$outputFile</b>";
} else {
    echo "No valid mobile numbers found!";
}
?>

