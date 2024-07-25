<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .form-inline {
            justify-content: center;
            margin-bottom: 20px;
        }
        .thread-dark{
           background-color: #343a40;
           color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Existing Data</h1>
        <form action="view_boardmembers.php" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by First Name">
            </div>
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-primary ml-2">
            </div>
            <div class="form-group ml-4">
                <label for="sort" class="mr-2">Sort by:</label>
                <select name="sort" id="sort" class="form-control">
                    <option value="first_name" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'first_name') echo 'selected'; ?>>Alphabetical</option>
                    <option value="date_joined" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_joined') echo 'selected'; ?>>Date</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Sort" class="btn btn-secondary ml-2">
            </div>
        </form>

        <table class="table table-striped">
            <thead class="thread-dark">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Position</th>
                    <th>Date Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../db.php';

                $sql = "SELECT * FROM boardmember";
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    $search = $_GET['search'];
                    $sql .= " WHERE first_name LIKE '%$search%'";
                }

                // Sorting
                if (isset($_GET['sort']) && $_GET['sort'] == 'date_joined') {
                    $sql .= " ORDER BY date_joined ASC";
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
                        echo "<td>".$row["contact_info"]."</td>";
                        echo "<td>".$row["position"]."</td>";
                        echo "<td>".$row["date_joined"]."</td>";
                        echo "<td> 
                                <a href='update_boardmember.php?id=".$row["id"]."' class='btn btn-sm btn-warning'>Update</a> 
                                <a href='delete_boardmember.php?id=".$row["id"]."' class='btn btn-sm btn-danger' onclick='return confirmDelete(".$row["id"].")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='./boardmember.php'" class="btn btn-secondary">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        function confirmDelete(id) {
            return confirm('Are you sure you want to delete this record?');
        }
    </script> -->
</body>
</html>
