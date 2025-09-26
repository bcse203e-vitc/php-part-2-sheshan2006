<?php
$emails = [
    "ranjan@example.com",
    "don-email@",
    "steve@site",
    "seetha123@gmail.com",
    "ram@mail.co.in",
    "invalid@.com",
    "@mhhgnguser.com"
];
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/";
echo "<h2>Valid Email Addresses</h2>";
foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        echo $email . "<br>";
    }
}
?>

