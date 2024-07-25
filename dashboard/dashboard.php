<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    // include '../logout.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }
        #dashboard {
            margin-top: 40px;
        }
        .dash-btn {
            width: 60%; /* Reduced width */
            height: 120px; /* Increased height */
            padding: 20px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;
            margin: 0 auto; /* Center align the buttons */
        }
        .dash-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .logout-btn {
            float: right;
            margin-top: 10px;
            border-radius: 12px;
        }
        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }
        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }
        h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #333;
        }
        .col-md-6 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div id="dashboard" class="container">
        <a href="../logout.php" class="btn btn-danger logout-btn btn-lg">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <h2 class="text-center">Dashboard</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="children/children.php" class="btn btn-primary dash-btn">
                    <i class="fas fa-child"></i> Children
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="adult/adult.php" class="btn btn-success dash-btn">
                    <i class="fas fa-user"></i> Adults
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="donation/donation.php" class="btn btn-warning dash-btn">
                    <i class="fas fa-donate"></i> Donation
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="staff/staff.php" class="btn btn-info dash-btn">
                    <i class="fas fa-user-tie"></i> Staff
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="volunteer/volunteer.php" class="btn btn-secondary dash-btn">
                    <i class="fas fa-hands-helping"></i> Volunteers
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="boardmember/boardmember.php" class="btn btn-dark dash-btn">
                    <i class="fas fa-users"></i> Board Members
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
