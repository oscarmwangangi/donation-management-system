<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="assets/script.js" defer></script> <!-- Include script.js -->
    <style>
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .back-button {
            margin-bottom: 15px;
        }
        .form-inline .form-group {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Existing Data</h1>

        <form action="view_children.php" method="GET" class="form-inline justify-content-center mb-3">
           
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by First Name">
            </div>
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
            <div class="form-group ml-3">
                <label for="sort" class="mr-2">Sort by:</label>
                <select name="sort" id="sort" class="form-control">
                    <option value="first_name" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'first_name') echo 'selected'; ?>>Alphabetical</option>
                    <option value="date_enrolled" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_enrolled') echo 'selected'; ?>>Date</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Sort" class="btn btn-primary ml-2">
            </div>
        </form>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>County</th>
                    <th>Village</th>
                    <th>Date Enrolled</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../db.php';

                $sql = "SELECT * FROM person";
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    $search = $_GET['search'];
                    $sql .= " WHERE first_name LIKE '%$search%'";
                }

                // Sorting
                if (isset($_GET['sort']) && $_GET['sort'] == 'date_enrolled') {
                    $sql .= " ORDER BY date_enrolled ASC";
                } else {
                    $sql .= " ORDER BY first_name ASC";
                }

                $result = $conn->query($sql);
                $counter = 1;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$counter++."</td>";
                        echo "<td>".$row["first_name"]."</td>";
                        echo "<td>".$row["last_name"]."</td>";
                        echo "<td>".$row["county"]."</td>";
                        echo "<td>".$row["village"]."</td>";
                        echo "<td>".$row["date_enrolled"]."</td>";
                        echo "<td>
                                <a href='view_child.php?id=".$row["id"]."' class='btn btn-info btn-sm'>View</a> 
                                <a href='update_child.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Update</a> 
                                <a href='delete_child.php?id=".$row["id"]."' class='btn btn-danger btn-sm delete-link' onclick='return confirmDelete(".$row["id"].")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="form-group back-button">
                <button onclick="window.location.href='./children.php'" class="btn btn-secondary">Back</button>
            </div>
    </div>
</body>
</html>
