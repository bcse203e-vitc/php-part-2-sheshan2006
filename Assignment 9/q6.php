<?php
echo "<h2>Current Date & Time</h2>";
echo date("d-m-Y H:i:s") . "<br><br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST['dob'];  
    if (!empty($dob)) {
        $today = new DateTime();
        $birthDate = new DateTime($dob);
        $nextBirthday = new DateTime(date("Y") . "-" . $birthDate->format("m-d"));
        if ($nextBirthday < $today) {
            $nextBirthday->modify('+1 year');
        }
        $interval = $today->diff($nextBirthday);
        echo "<h3>Days left until your next birthday: " . $interval->days . " days</h3>";
    } else {
        echo "<p style='color:red;'>Please enter your date of birth!</p>";
    }
}
?>
<form method="post">
    <label for="dob">Enter your Date of Birth (YYYY-MM-DD): </label>
    <input type="date" name="dob" required>
    <button type="submit">Check</button>
</form>

