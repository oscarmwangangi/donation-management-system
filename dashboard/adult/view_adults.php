<!DOCTYPE html>
<html>
<head>
    <title>View Existing Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-back {
            margin-top: 20px;
        }
        table {
            margin-top: 20px;
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

        <form action="view_adults.php" method="GET" class="form-inline justify-content-center">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="search" placeholder="Search by First Name">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
            <div class="form-group mx-sm-3 mb-2">
                <label for="sort" class="mr-2">Sort by:</label>
                <select name="sort" id="sort" class="form-control">
                    <option value="first_name" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'first_name') echo 'selected'; ?>>Alphabetical</option>
                    <option value="date_enrolled" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_enrolled') echo 'selected'; ?>>Date</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary mb-2">Sort</button>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="thread-dark">
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

                $sql = "SELECT * FROM adult";
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
                                <a href='view_adult.php?id=".$row["id"]."' class='btn btn-info btn-sm'>View</a> 
                                <a href='update_adult.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Update</a> 
                                <a href='delete_adult.php?id=".$row["id"]."' class='btn btn-danger btn-sm' onclick='return confirmDelete(".$row["id"].")'>Delete</a>
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
        <button class="btn btn-secondary btn-back" onclick="window.location.href='./adult.php'">Back</button>
    </div>
</body>
</html>
