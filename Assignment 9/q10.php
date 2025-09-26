<?php
$inputFile = "students.txt";
$errorFile = "errors.log";
file_put_contents($errorFile, "");
if (!file_exists($inputFile)) {
    die("Error: $inputFile not found!");
}
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/";
$validStudents = [];
foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) !== 3) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }
    $name = trim($parts[0]);
    $email = trim($parts[1]);
    $dob = trim($parts[2]);
    if (!preg_match($emailPattern, $email)) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }
    try {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
    } catch (Exception $e) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    $validStudents[] = [
        "name" => $name,
        "email" => $email,
        "age" => $age
    ];
}
if (!empty($validStudents)) {
    echo "<h2>Valid Student Records</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";
    foreach ($validStudents as $student) {
        echo "<tr>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['email']}</td>";
        echo "<td>{$student['age']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No valid student records found!";
}
if (file_exists($errorFile) && filesize($errorFile) > 0) {
    echo "<p style='color:red;'>Some records were invalid and saved to <b>$errorFile</b></p>";
}
?>

