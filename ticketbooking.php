<?php
require 'php.php';

if (isset($_POST["submit"])) {
    $From =$_POST["From"];
    $To = $_POST["To"];
    $Date = $_POST["Date"];
    $Class =$_POST["Class"];

    $sql = "INSERT INTO book(booking_id,dfrom,dto,ddate,dclass)
            VALUES ('', '$From', '$To', '$Date', '$Class')";

    if ($conn->query($sql)) {
        echo "<script>alert('Ticket Booking successful');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}

echo '<script>window.location.href = "passenger.html";</script>';
?>