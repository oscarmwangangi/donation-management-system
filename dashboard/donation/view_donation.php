<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
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
        <h1>View Existing Data</h1>
        <form action="view_donation.php" method="GET" class="form-inline justify-content-center mb-3">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Name">
            </div>
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Original Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../db.php';

                $sql = "SELECT * FROM donation";
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    $search = $conn->real_escape_string($_GET['search']);
                    $sql .= " WHERE item_name LIKE '%$search%'";
                }

                $result = $conn->query($sql);
                $counter = 1;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$counter++."</td>";
                        echo "<td>".$row["item_name"]."</td>";
                        echo "<td>".$row["quantity"]."</td>";
                        echo "<td>".$row["original_quantity"]."</td>";
                        echo "<td>
                                <a href='update_donation.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Update</a> 
                                <a href='delete_donation.php?id=".$row["id"]."' class='btn btn-danger btn-sm delete-link'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="form-group">
            <button onclick="window.location.href='item_donation.php'" class="btn btn-secondary">Back</button>
        </div>

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
                        Record deleted successfully.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="redirectToViewDonation()">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Error deleting record.
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

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                const status = urlParams.get('status');
                if (status === 'success') {
                    $('#successModal').modal('show');
                } else if (status === 'error') {
                    $('#errorModal').modal('show');
                }
            }
        });
    </script>
</body>
</html>
