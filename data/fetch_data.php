<?php
include 'db.php';

$type = $_GET['type'];

switch ($type) {
    case 'admin':
    $sql="SELECT * FROM admin";
    break;
    case 'children':
        $sql = "SELECT * FROM Person WHERE type='child'";
        break;
    case 'adults':
        $sql = "SELECT * FROM Person WHERE type='adult'";
        break;
    case 'staff':
        $sql = "SELECT * FROM Staff";
        break;
    case 'volunteers':
        $sql = "SELECT * FROM Volunteer";
        break;
    case 'boardMembers':
        $sql = "SELECT * FROM BoardMember";
        break;
    case 'donations':
        $sql = "SELECT * FROM Donation";
        break;
    default:
        echo json_encode([]);
        exit();
}

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>
