<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-top: 30px;
            color: #333;
        }
        .content {
            margin-top: 30px;
        }
        .btn-lg {
            height: 70px;
          
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-purple {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: white;
        }
        .btn-purple:hover {
            background-color: #5a2a8c;
            border-color: #5a2a8c;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .image {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        img {
            max-width: 100%;
            height: auto;
            max-height: 70vh;
            object-fit: cover;
            box-shadow: rgba(128, 0, 128, 0.6) 0px 7px 29px 0px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        img:hover {
            transform: scale(1.05);
            box-shadow: rgba(128, 0, 128, 0.9) 0px 15px 30px 0px;
        }
        .button-container {
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Staff Page</h1>
        
        <div class="container row">
        <div class="col-md-6 mb-4">
             <div class="button-container">
                 <a href="add_staff.php" class="btn btn-purple btn-lg">
                <i class="fas fa-user-plus"></i> Add New Staff Record
                </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="button-container">
                    <a href="view_staffs.php" class="btn btn-info btn-lg">
                        <i class="fas fa-eye"></i> View Existing Data
                    </a>
             </div>
                    </div>
             <div class="col-md-2 mb-4">
                 <div class="button-container">
                    <a href="../dashboard.php" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
            </div>
                 </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
