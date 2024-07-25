<!DOCTYPE html>
<html>
<head>
    <title>Add New Board Member Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container{
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
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
        <h1>Add New Board Member Record</h1>
        <form action="process_add_boardmember.php" method="POST" class="row">
            <div class="form-group col-md-4">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input name="email" type="email" id="new-email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group col-md-4">
                <label for="position">Position:</label>
                <input name="position" type="text" id="new-position" class="form-control" placeholder="Position" required>
            </div>
            <div class="form-group col-md-4">
                <label for="contact">Contact:</label>
                <input name="contact" type="text" id="new-contact" class="form-control" placeholder="Add your Contact" required>
            </div>
            <div class="form-group col-md-4">
                <label for="date_joined">Date Joined:</label>
                <input type="date" id="date_joined" name="date_joined" class="form-control">
            </div>
            <div class="form-group col-12">
                <input type="submit" value="Save" class="btn btn-purple btn-block">
            </div>
        </form>
        <button onclick="window.location.href='./boardmember.php'" class="btn btn-secondary mt-3">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
