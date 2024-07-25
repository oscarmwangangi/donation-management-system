<?php
include 'db.php';

$type = $_POST['type'];
$id = $_POST['id'];

switch ($type) {
    case 'person':
        $sql = "DELETE FROM Person WHERE id=$id";
        break;
    case 'staff':
        $sql = "DELETE FROM Staff WHERE id=$id";
        break;
    case 'volunteer':
        $sql = "DELETE FROM Volunteer WHERE id=$id";
        break;
    case 'boardMember':
        $sql = "DELETE FROM BoardMember WHERE id=$id";
        break;
    case 'donation':
        $sql = "DELETE FROM Donation WHERE id=$id";
        break;
}

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
