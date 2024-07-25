<!DOCTYPE html>
<html>
<head>
    <title>Add New Child Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container{
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-submit {
            width: 100%;
        }
        .btn-back {
            margin-top: 20px;
        }
        form {
            font-weight: 600;
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
        <h1>Add New Child Record</h1>
        <form action="process_add_child.php" method="POST">
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
                    <label for="county">County:</label>
                    <input type="text" class="form-control" id="county" name="county">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="village">Village:</label>
                    <input type="text" class="form-control" id="village" name="village">
                </div>
                <div class="form-group col-md-4">
                    <label for="date_enrolled">Date Enrolled:</label>
                    <input type="date" class="form-control" id="date_enrolled" name="date_enrolled">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_of_father">Name of Father:</label>
                    <input type="text" class="form-control" id="name_of_father" name="name_of_father" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name_of_mother">Name of Mother:</label>
                    <input type="text" class="form-control" id="name_of_mother" name="name_of_mother" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name_of_child_officer_involved">Name of Child Officer Involved:</label>
                    <input type="text" class="form-control" id="name_of_child_officer_involved" name="name_of_child_officer_involved" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="court_commital">Court Committal:</label>
                    <input type="text" class="form-control" id="court_commital" name="court_commital" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-purple btn-submit" value="Save">
                </div>
            </div>
        </form>
        <button class="btn btn-secondary btn-back" onclick="window.location.href='./children.php'">Back</button>
    </div>
</body>
</html>
