<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Predefined admin credentials which are hashed to the database (almost same as ecryption)
// $admins = [
//     ['username' => 'admin1', 'password' => password_hash('adminpassword1', PASSWORD_DEFAULT)],
//     ['username' => 'admin2', 'password' => password_hash('adminpassword2', PASSWORD_DEFAULT)],
// ];

// foreach ($admins as $admin) {
//     $sql = "INSERT INTO admin (username, password) VALUES ('{$admin['username']}', '{$admin['password']}')";
//     if ($conn->query($sql) !== TRUE) {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }else{
//         echo "data entry successful";
//     }
// }

// $conn->close();

?>