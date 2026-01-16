<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Collect Input
    $username = htmlspecialchars($_POST['username']);
    $dobInput = $_POST['dob'];

    // 2. Calculate Age
    $dob = new DateTime($dobInput);
    $now = new DateTime();
    $age = $now->diff($dob)->y;

    echo "<h1>Welcome " . $username . "</h1>";
    echo "<p>Your age is " . $age . ".</p>";
    
} else {
    echo "Please submit the form first.";
}
?>
