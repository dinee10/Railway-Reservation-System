<?php
include_once 'php.php';

$query = "SELECT MAX(P_ID) AS max_value FROM passenger";
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
$geder = $_POST['gender'];
$NIC = $_POST['nic_passport'];
$phone = $_POST['phone_number'];
$email = $_POST['email'];


$insertMemberStmt = $conn->prepare("INSERT INTO passenger (P_ID,F_name,L_name,Gender,NIC,Phone_No,Email) VALUES (?,?, ?, ?, ?, ?, ?)");

// Bind parameters to the statements
$insertMemberStmt->bind_param("issssss", $nextValue, $first, $last, $gender, $NIC,$phone,$email);

// Execute the statements

if ( $insertMemberStmt->execute()) {
    mysqli_close($conn);
    header("Location:payment.html");
    exit();
} else {
    die("Error inserting data: " . $conn->error);
}


?>



