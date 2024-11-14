<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="userstyle.css">
    
</head>

<body style="margin: 0px; ">
    <div class="image">
        <div class="image1">
            <div >
           
            <div class="headerdiv">
            <img style="width: 100px; height: 100px; margin-left: 5px; margin-top: 10px; margin-bottom: 10px;" src="images/logo.jpg">
                    <label class="text" style=" margin-left: 350px;margin-bottom: 20px;position: absolute;margin-top: 30px; color:white; ">Train Booking System</label>
                    <a class="buttoin" href="userpage.php">User Home</a>
                </div>
                <hr>
                <div>
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
    
                </div>
                <div style="margin-top: 50px; margin-left: 150px;" class="div3">
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

                            include 'php.php';
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            if (isset($_POST['deleteemail'])) {
                                $email = $_POST['deleteemail'];

                                $deleteSql = "DELETE FROM User1 WHERE Username='$email'";

                                if (mysqli_query($conn, $deleteSql)) {
                                    echo '<script type="text/javascript">
                                    window.onload = function () { alert("Deleted !"); 
                                        window.location.href = "userdelete.php";}
                                    </script>';
                                } else {
                                    echo "Error deleting record: " . mysqli_error($conn);
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
                                        <td>' . $fname . '</td>
                                        <td>' . $lname . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $password . '</td>
                                        
                                        <td>
                                            <form method="post" action="">
                                                <input type="hidden" name="deleteemail" value="' . $email . '">
                                                <button type="submit" class="btn1" >Delete</button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            }
                            ?>
                             
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
    </footer>   
</body>

</html>