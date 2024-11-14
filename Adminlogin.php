<?php
session_start();


include_once 'php.php';

// Process the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["adminemail"];
    $password = $_POST["adminPassword"];

    // Prepare and execute a database query
    $query = "SELECT * FROM Administrator WHERE Email='$username'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) > 0) {
        // User exists, check password
        $user = mysqli_fetch_assoc($result);
        if ($password == $user["Password"]) {
            // Login successful
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['login_time'] = time(); // Store login time in session
            header("Location:route.php"); // Redirect to the home page or any other desired page
            exit();
        } else {
            // Login failed - Incorrect password
            echo "Invalid password.";
        }
    } else {
        // Login failed - User not found
        echo "Invalid username.";
    }
}

// Check if the session has expired
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > 2)) {
    // Session has expired, destroy the session and redirect to the login page or any other desired page
    session_destroy();
    header("Location:route.php");
    exit();
}
?>