<?php
    require 'php.php';

?>
<?php

if(isset($_POST["submit"])){
    $Cnumber = $_POST["cardNumber"];
    $Cname = $_POST["cardName"];
    $Edate = $_POST["expiryDate"];
    $Cvv = $_POST["cvv"];

    $sql= "INSERT INTO payment1 (payment_id,Card_Number,Cardholder_Name,Expiry_Date,CVV) VALUES('','$Cnumber','$Cname','$Edate','$Cvv')" ;
    if($conn->query($sql)){
      echo "<script>alert('Payment information added successfully ');</script>";
      
    }

    else{
      echo "Error: ". $conn->error;
    }
  }

  echo '<script>window.location.href = "payment.html";</script>';
?>