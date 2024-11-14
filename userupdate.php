<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="userstyle.css">
</head>

<body style="margin: 0px; ">
    <div class="image">
        <div class="image1">
            <div >
            
            <div class="headerdiv">
            <img style="width: 100px; height: 100px; margin-left: 5px; margin-top: 10px; margin-bottom: 10px;" src="images/logo.jpg">
                    <label class="text" style=" margin-left: 350px;margin-bottom: 20px;position: absolute;margin-top: 30px; color: white">Resourse Booking System</label>
                    <a class="buttoin" href="userpage.php">User Home</a>
                </div>
                <hr>
                <div class="user-options">
                    <div class="dropdown">
                        <button class="dropdown-button">Login </button>
                        <div class="dropdown-content">
                          <a href="userlogin.html">Login as User</a>
                     
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
    
                <div style="margin-top: 50px; margin-left: 130px;" class="div3">
                    <table class="table1">
                        <thead class="table">
                            <tr class="table">
                                <th class="table" scope="col">First Name</th>
                                <th class="table" scope="col">Last Name</th>
                                <th class="table" scope="col">Email</th>
                                <th class="table" scope="col">Password</th>
                                
                                <th class="table" scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody class="tb1">
                            <?php
                            // Assuming you have a valid database connection
                            
                            include 'php.php';
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $email = $_POST['email'];
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $password = $_POST['password'];
                                

                                $updateSql = "UPDATE User1 SET F_Name='$fname', L_Name='$lname', Password='$password' WHERE Username='$email'";

                                if (mysqli_query($conn, $updateSql)) {
                                    echo '<script type="text/javascript">
                                    window.onload = function () { alert("Account Updated !"); 
                                        window.location.href = "userpadate.php";}
                                    </script>';
                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }
                            }

                            $selectSql = "SELECT * FROM User1;";
                            $result = mysqli_query($conn, $selectSql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $email = $row['Username'];
                                    $fname = $row['F_Name'];
                                    $lname = $row['L_Name'];
                                    $password = $row['Password'];
                                    

                                    echo '<tr>
                                        <form method="post" action="" >
                                            <td><input type="text" name="fname" value="' . $fname . '" class="uptable"></td>
                                            <td><input type="text" name="lname" value="' . $lname . '" class="uptable"></td>
                                            <td><input type="hidden" name="email" value="' . $email . '" class="uptable">' . $email . '</td>
                                            <td><input type="password" name="password" value="' . $password . '" class="uptable"></td>
                                            
                                            <td><button type="submit" name="update" class="btn1">Update</button></td>
                                        </form>
                                    </tr>';
                                }
                            }

                            mysqli_close($conn);
                            ?>
                             
    </footer>   
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
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
</body>

</html>