<!DOCTYPE html>
<html>
<head>
    <title>Add New Staff Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
        }
        .form-control {
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
        <h1>Add New Staff Record</h1>
        <form action="process_add_staff.php" method="POST">
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Add your Contact" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="date_joined">Date Joined:</label>
                    <input type="date" class="form-control" id="date_joined" name="date_joined">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-purple btn-block" value="Save">
                </div>
            </div>
        </form>
        <button class="btn btn-secondary mt-3 btn-back" onclick="window.location.href='./staff.php'">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
