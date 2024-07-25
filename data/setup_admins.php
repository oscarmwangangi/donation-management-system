<?php
include 'db.php'; // Include your database connection file

// Check if the Admin table exists
$table_check = "SHOW TABLES LIKE 'Admin'";
$result = $conn->query($table_check);

if ($result->num_rows == 0) {
    // Create the Admin table
    $create_table_sql = "CREATE TABLE Admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL
    )";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "Table Admin created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
} else {
    echo "Table Admin already exists<br>";
}

// Hash the passwords using password_hash()
$admin1_password = password_hash('admin1password', PASSWORD_BCRYPT);
$admin2_password = password_hash('admin2password', PASSWORD_BCRYPT);
$admin3_password = password_hash('admin3password', PASSWORD_BCRYPT);

// Insert admin users into the database
$insert_sql = "INSERT INTO Admin (username, password) VALUES
    ('admin1', '$admin1_password'),
    ('admin2', '$admin2_password'),
    ('admin3', '$admin3_password')";

// Execute the insert query
if ($conn->query($insert_sql) === TRUE) {
    echo "Admin users created successfully<br>";
} else {
    echo "Error inserting admin users: " . $conn->error . "<br>";
}

$conn->close(); // Close the database connection
?>
