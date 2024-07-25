<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Child Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .details-container {
            margin-bottom: 20px;
        }
        .container {
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 8px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Child Details</h1>

        <?php
        include '../../db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $child_id = $_GET['id'];

            $sql = "SELECT * FROM person WHERE id = $child_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='text-center mb-4'>";
                if ($row['profile_picture']) {
                    echo "<img class='profile-img img-thumbnail' src='" . $row['profile_picture'] . "'>";
                } else {
                    echo "<img class='profile-img img-thumbnail' src='default.jpg'>";
                }
                echo "</div>";
                echo "<div class='details-container'>";
                echo "<p><strong>First Name:</strong> " . $row['first_name'] . "</p>";
                echo "<p><strong>Last Name:</strong> " . $row['last_name'] . "</p>";
                echo "<p><strong>County:</strong> " . $row['county'] . "</p>";
                echo "<p><strong>Village:</strong> " . $row['village'] . "</p>";
                echo "<p><strong>Date Enrolled:</strong> " . $row['date_enrolled'] . "</p>";
                echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
                echo "<p><strong>Name of Father:</strong> " . $row['name_of_father'] . "</p>";
                echo "<p><strong>Name of Mother:</strong> " . $row['name_of_mother'] . "</p>";
                echo "<p><strong>Court Committal:</strong> " . $row['court_commital'] . "</p>";
                echo "<p><strong>Name of Child Officer Involved:</strong> " . $row['name_of_child_officer_involved'] . "</p>";
                echo "</div>";

                // Add a form to upload profile picture
                echo "<form action='process_upload.php' method='POST' enctype='multipart/form-data' class='form-inline justify-content-center'>";
                echo "<div class='form-group mb-2'>";
                echo "<input type='file' name='profile_picture' accept='image/*' class='form-control-file'>";
                echo "</div>";
                echo "<input type='hidden' name='child_id' value='" . $child_id . "'>";
                echo "<button type='submit' class='btn btn-primary mb-2'>Upload Profile Picture</button>";
                echo "</form>";
                
                // Add a delete button for the profile picture
                if ($row['profile_picture']) {
                    echo "<button class='btn btn-danger mt-2' data-toggle='modal' data-target='#confirmDeleteModal'>Delete Profile Picture</button>";
                }
            } else {
                echo "<div class='alert alert-danger'>Child record not found.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid request.</div>";
        }
        ?>

        <!-- Modal for Delete Confirmation -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this profile picture?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="delete_picture.php?id=<?php echo $child_id; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
