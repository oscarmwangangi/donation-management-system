<!DOCTYPE html>
<html>
<head>
    <title>View Adult Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-img {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
            border-radius: 50%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-back {
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adult Details</h1>

        <?php
        include '../../db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $adult_id = $_GET['id'];

            $sql = "SELECT * FROM adult WHERE id = $adult_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<img class='profile-img img-fluid' src='" . $row['profile_picture'] . "' alt='Profile Picture'>";
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

                // Add a form to upload profile picture
                echo "<form action='process_upload.php' method='POST' enctype='multipart/form-data' class='form-group'>";
                echo "<input type='file' class='form-control-file' name='profile_picture' accept='image/*'>";
                echo "<input type='hidden' name='adult_id' value='" . $adult_id . "'>";
                echo "<button type='submit' class='btn btn-primary mt-3'>Upload Profile Picture</button>";
                echo "</form>";

                // Add a button to delete the profile picture
                if ($row['profile_picture']) {
                    echo "<form action='delete_picture.php' method='GET' class='form-group mt-3'>";
                    echo "<input type='hidden' name='id' value='" . $adult_id . "'>";
                    echo "<button type='submit' class='btn btn-danger'>Delete Profile Picture</button>";
                    echo "</form>";
                }
            } else {
                echo "<div class='alert alert-danger'>Adult record not found.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid request.</div>";
        }
        ?>
        <button class="btn btn-secondary btn-back" onclick="window.location.href='./view_adults.php'">Back</button>
    </div>
</body>
</html>
