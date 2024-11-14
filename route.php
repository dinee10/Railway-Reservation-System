<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expressbook Railways</title>
    <link rel="stylesheet" href="route.css">
</head>

<body>
    <header>
        <div class = "container">
        <a href="homepage.html"> <img src = "images/logo.jpg"class = "hello"></a>
    </div>
        <div class="logo">
            <h1>Expressbook Railways</h1>
        </div>
        <div class="user-options">
        <div class="user-options">
            <div class="dropdown">
                <button class="dropdown-button">Login </button>
                <div class="dropdown-content">
                  <a href="studentlogin.html">Login as User</a>
             
                  <a href="Stafflogin.html">Login as Admin</a>
                  <a href="customerservicelogin.html">Login as Customerservicer </a>
                  </div></div>
            <a href="registration.html">Sign Up</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="traintable.php">Train Schedule</a></li> 
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#feedbacks">Feedbacks</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </nav>
    <p id="datetime"></p>
    <script>   function displayDateTime()
			{    var now = new Date();
				 var date = now.toDateString(); 
				 var time = now.toLocaleTimeString();
				 var dateTimeString = date + ' ' + time; 
				 document.getElementById('datetime').innerHTML = dateTimeString;   }    
			 displayDateTime(); 
		   </script>
    
    
    <?php
            
    include_once 'php.php';


    if (isset($_POST['cancel'])) {
        $bookingId = $_POST['cancel'];
    
        // Delete associated records in the handle table
        $handleSql = "DELETE FROM Route WHERE Route_ID = ?";
        $handleStmt = $conn->prepare($handleSql);
        $handleStmt->bind_param("i", $bookingId);
        $handleStmt->execute();
    }

$query = "SELECT MAX(Route_ID) AS max_value FROM Route";
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


$sql = "SELECT * FROM Route";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Route_Id</th><th>Arrival_Time</th><th>No_of_stops</th><th>Depart_Time</th><th>Operation</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Route_ID"] . "</td>";
        echo "<td>" . $row["Arrival_Time"] . "</td>";
        echo "<td>" . $row["No_of_stops"] . "</td>";
        echo "<td>" . $row["Depart_Time"] . "</td>";
        echo '<td><form method="POST" action="route.php">';
     echo '<button type="submit" name="delete" value="' . $row["Route_ID"] . '">delete</button>';
        
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No trips found.";
}

// Close the database connection
$conn->close();
?>
    
    <footer>
        <div class="social-links">
            <a href="https://www.facebook.com">Facebook</a>
            <a href="https://www.twitter.com">Twitter</a>
            <a href="https://www.instagram.com">Instagram</a>
            <a href="https://www.google.com">Google</a>
        </div>
        <div class="copyright">
            &copy; 2023 Expressbook Railways
        </div>
    </footer>
