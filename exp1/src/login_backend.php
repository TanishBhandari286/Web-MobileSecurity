<?php
// 1. Define Correct Credentials (Hardcoded for this experiment)
$valid_email = "admin@example.com";
$valid_pass = "password123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 2. Capture Logging Details
    $ip_address = $_SERVER['REMOTE_ADDR']; // Gets user IP
    $timestamp = date("Y-m-d H:i:s");
    
    // 3. Prepare Log Entry
    // Format: [Time] - IP - Email - Password - STATUS
    $status = ($email === $valid_email && $password === $valid_pass) ? "SUCCESS" : "FAILED";
    $logEntry = "[$timestamp] IP: $ip_address | Email: $email | Pass: $password | Status: $status" . PHP_EOL;
    
    // 4. Save to File
    // FILE_APPEND ensures we add to the end of the file, not overwrite it
    file_put_contents("login_logs.txt", $logEntry, FILE_APPEND);

    // 5. Check Login and Display Result
    echo '<body style="font-family: sans-serif; text-align: center; padding-top: 50px;">';
    
    if ($status === "SUCCESS") {
        echo '<h1 style="color: green;">Login Successful!</h1>';
        echo '<p>Welcome back, Admin.</p>';
    } else {
        echo '<h1 style="color: red;">Login Failed</h1>';
        echo '<p>Invalid email or password.</p>';
    }
    
    echo '<br><a href="login.html">Try Again</a>';
    echo '</body>';
}
?>
