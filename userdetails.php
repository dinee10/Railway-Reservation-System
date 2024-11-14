<?php
include 'php.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display details</title>
    <link rel="stylesheet" href="userstyle.css">
</head>

<body style="margin: 0px; ">
    <div class="image">
        <div class="image1">
            <div >
           
                <div class="headerdiv">
                    <img style="width: 100px; height: 100px; margin-left: 5px; margin-top: 10px; margin-bottom: 10px;" src="images/logo.jpg">
                    <label class="text" style=" margin-left: 350px;margin-bottom: 20px;position: absolute;margin-top: 30px; color: white">Train Booking System</label>
                    <a class="buttoin" href="userpage.php">User Home</a>
                </div>
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
    
                <hr>
                <div style="margin-top: 50px; margin-left: 150px;" class="div3">
                    <table class="table1">
                        <thead class="table">
                            <tr class="table">
                                <th class="table" scope="col">First Name</th>
                                <th class="table" scope="col">Last Name</th>
                                <th class="table" scope="col">Email</th>
                                <th class="table" scope="col">Password</th>
                                

                            </tr>
                        </thead>
                        <tbody class="tb1">
                            <?php
                            $sql = "SELECT * FROM User1;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $fname = $row['F_Name'];
                                    $lname = $row['L_Name'];
                                    $email = $row['Username'];
                                    $password = $row['Password'];
                                    
                                    echo '<tr>
            
                                <td>' . $fname . '</td>
                                <td>' . $lname . '</td>
                                <td>' . $email . '</td>
                                <td>' . $password . '</td>
                                
                               
                               
                                </tr>';
                                }
                            }
                            ?>
                             <footer>
         
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
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
</body>

</html>