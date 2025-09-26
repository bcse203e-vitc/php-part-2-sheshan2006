<?php
$originalFile = "datas.txt";
if (!file_exists($originalFile)) {
    die("Error: $originalFile not found!");
}
$pathInfo = pathinfo($originalFile);
$filename = $pathInfo['filename'];
$extension = isset($pathInfo['extension']) ? "." . $pathInfo['extension'] : "";
$timestamp = date("Y-m-d_H-i");
$backupFile = $filename . "_" . $timestamp . $extension;
if (copy($originalFile, $backupFile)) {
    echo "Backup created: <b>$backupFile</b>";
} else {
    echo "Failed to create backup.";
}
?>

