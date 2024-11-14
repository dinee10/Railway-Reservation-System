<?php
include_once 'php.php';

$query = "SELECT MAX(User_ID) AS max_value FROM User1";
$result = mysqli_query($conn, $query);

if ($result === false) {
    die("Error executing the query: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($row === null) {
    $maxValue = 0;
} else {
    $maxValue = $row['max_value'];
}

$nextValue = $maxValue + 1;


$first = $_POST['first_name'];
$last = $_POST['last_name'];
$gender = $_POST['gender'];
$NIC = $_POST['nic_passport'];
$Address = $_POST['Address'];
$phone = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];

$insertUserStmt = $conn->prepare("INSERT INTO User1 (User_ID,F_name,L_name,Gender,NIC,Address,Phone_Number,Username,Password) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters to the statements
$insertUserStmt->bind_param("issssssss", $nextValue, $first, $last, $gender, $NIC,$Address,$phone,$email,$password);

// Execute the statements

if ( $insertUserStmt->execute()) {
    mysqli_close($conn);
    $successMessage = "You have successfully signed up to the page!";
    
    // Redirect to "hp.html" with the success message
    header("Location: userlogin.html?message=" . urlencode($successMessage));

    exit();
} else {
    die("Error inserting data: " . $conn->error);
}


?>



