<?php
include_once 'php.php';

$query = "SELECT MAX(R_ID) AS max_value FROM Review";
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

$email = $_POST['email'];
$msg = $_POST['message'];


// Retrieve the M_Id from the member table based on the email
$memberQuery = "SELECT User_ID FROM User1 WHERE Username = '$email'";
$memberResult = mysqli_query($conn, $memberQuery);

if ($memberResult === false) {
    die("Error executing the query: " . mysqli_error($conn));
}

$memberRow = mysqli_fetch_assoc($memberResult);

if ($memberRow === null) {
    die("Error: Member with email '$email' not found.");
}

$memberId = $memberRow['User_ID'];

// Insert the data into the 'Review' table
$sql = "INSERT INTO Review (R_ID, Review, User_ID)
        VALUES ('$nextValue', '$msg', '$memberId')";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location:contact.html");
    exit();
} else {
    die("Error inserting data: " . mysqli_error($conn));
}






