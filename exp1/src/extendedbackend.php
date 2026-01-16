<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $dobInput = $_POST['dob'];
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $dob = new DateTime($dobInput);
    $now = new DateTime();
    $age = $now->diff($dob)->y;

    echo "Welcome " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Date of Birth: " . $dobInput . "<br>";
    echo "Calculated Age: " . $age . "<br>";
    
    echo "<br><a href='extendedindex.html'>Go Back</a>";

} else {
    echo "Access Denied.";
}
?>
