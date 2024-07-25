<!DOCTYPE html>
<html>
<head>
    <title>Update Adult Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        form{
            font-weight: 600;
        }
        .update{
            background-color: #5a2a91;
            color: white;
        }
        .update:hover{
            opacity: 0.7;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Adult Record</h1>

        <?php
        include '../../db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $adult_id = $_GET['id'];

            $sql = "SELECT * FROM adult WHERE id = $adult_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $county = $row['county'];
                $village = $row['village'];
                $date_enrolled = $row['date_enrolled'];
                $name_of_father = $row['name_of_father'];
                $name_of_mother = $row['name_of_mother'];
                $contact = $row['contact'];
                $name_of_child_officer_involved = $row['name_of_child_officer_involved'];
                $court_commital = $row['court_commital'];
            } else {
                echo "<div class='alert alert-danger'>Adult record not found.</div>";
                exit();
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adult_id'])) {
            $adult_id = $_POST['adult_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $county = $_POST['county'];
            $village = $_POST['village'];
            $date_enrolled = $_POST['date_enrolled'];
            $name_of_father = $_POST['name_of_father'];
            $name_of_mother = $_POST['name_of_mother'];
            $contact = $_POST['contact'];
            $name_of_child_officer_involved = $_POST['name_of_child_officer_involved'];
            $court_commital = $_POST['court_commital'];

            $sql = "UPDATE adult SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    county = '$county',
                    village = '$village',
                    date_enrolled = '$date_enrolled',
                    name_of_father = '$name_of_father',
                    name_of_mother = '$name_of_mother',
                    contact = '$contact',
                    name_of_child_officer_involved = '$name_of_child_officer_involved',
                    court_commital = '$court_commital'
                    WHERE id = $adult_id";

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
            <input type="hidden" name="adult_id" value="<?php echo $adult_id; ?>">

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
                    <label for="county">County:</label>
                    <input type="text" class="form-control" id="county" name="county" value="<?php echo $county; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="village">Village:</label>
                    <input type="text" class="form-control" id="village" name="village" value="<?php echo $village; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="date_enrolled">Date Enrolled:</label>
                    <input type="date" class="form-control" id="date_enrolled" name="date_enrolled" value="<?php echo $date_enrolled; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_of_father">Name of Father:</label>
                    <input type="text" class="form-control" id="name_of_father" name="name_of_father" value="<?php echo $name_of_father; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name_of_mother">Name of Mother:</label>
                    <input type="text" class="form-control" id="name_of_mother" name="name_of_mother" value="<?php echo $name_of_mother; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_of_child_officer_involved">Name of Child Officer Involved:</label>
                    <input type="text" class="form-control" id="name_of_child_officer_involved" name="name_of_child_officer_involved" value="<?php echo $name_of_child_officer_involved; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="court_commital">Court Committal:</label>
                    <input type="text" class="form-control" id="court_commital" name="court_commital" value="<?php echo $court_commital; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn- btn-block update" value="Update">
                </div>
            </div>
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
                        <a href="view_adults.php" class="btn btn-primary">OK</a>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-secondary" href="view_adults.php">Back</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
