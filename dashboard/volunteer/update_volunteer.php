<!DOCTYPE html>
<html>
<head>
    <title>Update Volunteer Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .container {
            margin-top: 20px;
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 20px;
        }
    .btn-purple {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
        }
</style>
<body>
    <div class="container">
        <h1 class="text-center my-4">Update Volunteer Record</h1>

        <?php
        include '../../db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $volunteer_id = $_GET['id'];

            $sql = "SELECT * FROM volunteer WHERE id = $volunteer_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $role = $row['role'];
                $availability = $row['availability'];
                $contact = $row['contact_info'];
                $last_updated = $row['last_updated'];
            } else {
                echo "<div class='alert alert-danger'>Volunteer record not found.</div>";
                exit();
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['volunteer_id'])) {
            $volunteer_id = $_POST['volunteer_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $last_updated = $_POST['last_updated'];
            $contact = $_POST['contact'];

            $sql = "UPDATE volunteer SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    email = '$email',
                    role = '$role',
                    last_updated = '$last_updated',
                    contact_info = '$contact'
                    WHERE id = $volunteer_id";

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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row">
            <input type="hidden" name="volunteer_id" value="<?php echo $volunteer_id; ?>">

            <div class="form-group col-md-4">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $first_name; ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input name="email" type="email" id="new-email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="role">Role:</label>
                <input name="role" type="text" id="new-role" class="form-control" placeholder="Role" value="<?php echo $role; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $contact; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="last_updated">Last Updated:</label>
                <input type="date" id="last_updated" name="last_updated" class="form-control" value="<?php echo $last_updated; ?>">
            </div>

            <div class="form-group col-12">
                <input type="submit" value="Update" class="btn btn-purple btn-block">
            </div>
        </form>
        <button class="btn btn-secondary mt-3" onclick="window.location.href='./volunteer.php'">Back</button>

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
                        <a href="view_volunteers.php" class="btn btn-primary">OK</a>
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
