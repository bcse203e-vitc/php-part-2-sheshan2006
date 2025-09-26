<?php
$filename = "products.txt";
if (!file_exists($filename)) {
    die("Error: File not found!");
}
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$products = [];
foreach ($lines as $line) {
    list($name, $price) = explode(",", $line);
    $products[] = ["name" => trim($name), "price" => (int)trim($price)];
}
usort($products, function ($a, $b) {
    return $a['price'] <=> $b['price'];
});
echo "<h2>Product List</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Product Name</th><th>Price</th></tr>";
foreach ($products as $product) {
    echo "<tr>";
    echo "<td>{$product['name']}</td>";
    echo "<td>{$product['price']}</td>";
    echo "</tr>";
}
echo "</table>";
?>

