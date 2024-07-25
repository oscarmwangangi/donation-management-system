<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">View Existing Data</h1>

        <form action="view_volunteers.php" method="GET" class="form-inline justify-content-center mb-4">
            <input type="text" name="search" placeholder="Search by First Name" class="form-control mr-2">
            <input type="submit" value="Search" class="btn btn-primary mr-2">
            <label for="sort" class="mr-2">Sort by:</label>
            <select name="sort" id="sort" class="form-control mr-2">
                <option value="first_name" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'first_name') echo 'selected'; ?>>Alphabetical</option>
                <option value="start_date" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'start_date') echo 'selected'; ?>>Date</option>
            </select>
            <input type="submit" value="Sort" class="btn btn-secondary">
        </form>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Start Date</th>
                    <th>Last Updated</th>
                    <th>Availability</th>
                    <th>Skills</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../db.php';

                $sql = "SELECT * FROM volunteer";
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    $search = $_GET['search'];
                    $sql .= " WHERE first_name LIKE '%$search%'";
                }

                // Sorting
                if (isset($_GET['sort']) && $_GET['sort'] == 'start_date') {
                    $sql .= " ORDER BY start_date ASC";
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
                        echo "<td>".$row["start_date"]."</td>";
                        echo "<td>".$row["last_updated"]."</td>";
                        echo "<td>".$row["availability"]."</td>";
                        echo "<td>".$row["skills"]."</td>";
                        echo "<td> 
                                <a href='update_volunteer.php?id=".$row["id"]."' class='btn btn-sm btn-warning'>Update</a> | 
                                <a href='delete_volunteer.php?id=".$row["id"]."' class='btn btn-sm btn-danger' onclick='return confirmDelete(".$row["id"].")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <button class="btn btn-secondary mt-3" onclick="window.location.href='./volunteer.php'">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
