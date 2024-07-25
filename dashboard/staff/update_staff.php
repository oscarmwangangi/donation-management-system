<!DOCTYPE html>
<html>
<head>
    <title>Update Staff Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            margin-top: 20px;
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-purple {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Staff Record</h1>

        <?php
        include '../../db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $staff_id = $_GET['id'];

            $sql = "SELECT * FROM staff WHERE id = $staff_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $role = $row['role'];
                $date_joined = $row['date_joined'];
                $contact = $row['contact_info'];
            } else {
                echo "<div class='alert alert-danger'>Staff record not found.</div>";
                exit();
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['staff_id'])) {
            $staff_id = $_POST['staff_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $date_joined = $_POST['date_joined'];
            $contact = $_POST['contact'];

            $sql = "UPDATE staff SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    email = '$email',
                    role = '$role',
                    date_joined = '$date_joined',
                    contact_info = '$contact'
                    WHERE id = $staff_id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        $('#successModal').modal('show');
                    });
                </script>";
            } else {
                echo "<div class='alert alert-danger'>Error updating record: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid request.</div>";
            exit();
        }
        $conn->close();
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?php echo $role; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="date_joined">Date Joined:</label>
                    <input type="date" class="form-control" id="date_joined" name="date_joined" value="<?php echo $date_joined; ?>">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-purple btn-block">Update</button>
            </div>
        </form>
        <button class="btn btn-secondary btn-back" onclick="window.location.href='./staff.php'">Back</button>
                <!-- Success Modal -->
                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Record updated successfully.
                    </div>
                    <div class="modal-footer">
                        <a href="view_staffs.php" class="btn btn-primary">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
