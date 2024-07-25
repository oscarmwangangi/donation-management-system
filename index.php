<?php
session_start();
require 'db.php';

// Prevent browser caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Check if the admin table is empty
$sql = "SELECT COUNT(*) as count FROM admin";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    // Predefined admin credentials
    $admins = [
        ['username' => 'admin1', 'password' => password_hash('adminpassword1', PASSWORD_DEFAULT)],
        ['username' => 'admin2', 'password' => password_hash('adminpassword2', PASSWORD_DEFAULT)],
    ];

    foreach ($admins as $admin) {
        $sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin['username'], $admin['password']);
        $stmt->execute();
    }
}

// Initialize error message variable
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard/dashboard.php"); // Redirect to the dashboard page
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid username.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.6s ease-in-out;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
        }
        .login-container label {
            font-size: 1rem;
            color: #333;
        }
        .login-container input {
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
            background-color: #6f42c1;
            color: white;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #5a2a8c;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-bottom: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <?php if (!empty($error_message)) { echo "<p class='error-message text-center'>$error_message</p>"; } ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
