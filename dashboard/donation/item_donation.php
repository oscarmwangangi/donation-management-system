
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item Donation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Item</h1>
        <a href="view_donation.php" class="btn btn-info">View Existing Data</a>
        <form action="item_donation.php" method="POST">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" name="item_name" id="item_name" class="form-control" required placeholder="Item Name">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required placeholder="Quantity">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
             <a href="donation.php" class="btn btn-secondary">Back</a>

             <?php
include '../../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $original_quantity = $quantity; // Set original_quantity same as quantity initially

    $sql = "INSERT INTO donation (item_name, quantity, original_quantity) VALUES ('$item_name', '$quantity', '$original_quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New record created successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$conn->close();
?>
        </form>
        
       
    </div>
</body>
</html>
