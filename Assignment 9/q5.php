<?php
$filename = "action.log";
function addLog($username, $action, $filename) {
    $timestamp = date("Y-m-d H:i:s");
    $logEntry = "$username – $timestamp – $action" . PHP_EOL;
    file_put_contents($filename, $logEntry, FILE_APPEND | LOCK_EX);
}
addLog("admin", "Logged In", $filename);
addLog("user1", "Viewed Dashboard", $filename);
addLog("guest", "Logged Out", $filename);
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$lastLogs = array_slice($lines, -5);
echo "<h2>Last 5 Log Entries</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Username</th><th>Date & Time</th><th>Action</th></tr>";
foreach ($lastLogs as $log) {
    // Split the log line into parts
    $parts = explode(" – ", $log);
    echo "<tr>";
    echo "<td>{$parts[0]}</td>";
    echo "<td>{$parts[1]}</td>";
    echo "<td>{$parts[2]}</td>";
    echo "</tr>";
}
echo "</table>";
?>

