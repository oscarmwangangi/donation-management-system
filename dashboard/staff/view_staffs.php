<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            margin-top: 20px;
        }
        .table thead th {
            text-align: center;
        }
        .table tbody td {
            text-align: center;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Existing Data</h1>

        <form action="view_staffs.php" method="GET" class="form-inline justify-content-center mb-3">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by First Name">
            <input type="submit" class="btn btn-primary mr-2" value="Search">
            <label for="sort" class="mr-2">Sort by:</label>
            <select name="sort" id="sort" class="form-control mr-2">
                <option value="first_name" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'first_name') echo 'selected'; ?>>Alphabetical</option>
                <option value="date_joined" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_joined') echo 'selected'; ?>>Date</option>
            </select>
            <input type="submit" class="btn btn-primary" value="Sort">
        </form>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Date Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../db.php';

                $sql = "SELECT * FROM staff";
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
                        echo "<td>".$row["role"]."</td>";
                        echo "<td>".$row["date_joined"]."</td>";
                        echo "<td>
                                <a href='update_staff.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Update</a>
                                <a href='delete_staff.php?id=".$row["id"]."' class='btn btn-danger btn-sm' onclick='return confirmDelete(".$row["id"].")'>Delete</a>
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
        <button onclick="window.location.href='./staff.php'" class="btn btn-secondary btn-back">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
