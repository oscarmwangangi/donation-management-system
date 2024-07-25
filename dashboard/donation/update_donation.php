<!DOCTYPE html>
<html>
<head>
    <title>Update Donation Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
            /* box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px; */
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Donation Record</h1>

        <?php
        include '../../db.php';

        $showModal = false; // Variable to control modal visibility

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $donation_id = $conn->real_escape_string($_GET['id']);

            $sql = "SELECT * FROM donation WHERE id = $donation_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $item_name = $row['item_name'];
                $quantity = $row['quantity'];
                $original_quantity = $row['original_quantity'];
            } else {
                echo "<div class='alert alert-danger'>Donation record not found.</div>";
                exit();
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['donation_id'])) {
            $donation_id = $conn->real_escape_string($_POST['donation_id']);
            $item_name = $conn->real_escape_string($_POST['item_name']);
            $quantity = $conn->real_escape_string($_POST['quantity']);

            $sql = "UPDATE donation SET 
                    item_name = '$item_name',
                    quantity = '$quantity'
                    WHERE id = $donation_id";

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

        <form action="update_donation.php" method="POST">
            <input type="hidden" name="donation_id" value="<?php echo $donation_id; ?>">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button> 
            <a href="view_donation.php" class="btn btn-secondary">Back</a>
        </form>

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
                        <button type="button" class="btn btn-primary" onclick="redirectToViewDonation()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function redirectToViewDonation() {
            window.location.href = 'view_donation.php';
        }
    </script>
</body>
</html>
