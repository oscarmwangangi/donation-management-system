<!DOCTYPE html>
<html>
<head>
    <title>Add New Volunteer Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
        <h1>Add New Volunteer Record</h1>
        <form action="process_add_volunteer.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="availability">Availability:</label>
                    <input type="text" class="form-control" id="availability" name="availability" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="skills">Skills:</label>
                    <input type="text" class="form-control" id="skills" name="skills" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-4">
                    <label for="last_updated">Last Updated:</label>
                    <input type="date" class="form-control" id="last_updated" name="last_updated">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-purple btn-block">Save</button>
            </div>
        </form>
        <button class="btn btn-secondary" onclick="window.location.href='./volunteer.php'">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
