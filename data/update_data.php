<?php
include 'db.php';

$type = $_POST['type'];
$id = $_POST['id'];

switch ($type) {
    case 'person':
        $name = $_POST['name'];
        $county = $_POST['county'];
        $village = $_POST['village'];
        $date_enrolled = $_POST['date_enrolled'];

        $sql = "UPDATE Person SET name='$name', county='$county', village='$village', date_enrolled='$date_enrolled' WHERE id=$id";
        break;
    case 'staff':
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact_info = $_POST['contact_info'];
        $date_joined = $_POST['date_joined'];

        $sql = "UPDATE Staff SET name='$name', role='$role', contact_info='$contact_info', date_joined='$date_joined' WHERE id=$id";
        break;
    case 'volunteer':
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact_info = $_POST['contact_info'];
        $availability = $_POST['availability'];
        $skills = $_POST['skills'];
        $start_date = $_POST['start_date'];
        $last_updated = $_POST['last_updated'];

        $sql = "UPDATE Volunteer SET name='$name', role='$role', contact_info='$contact_info', availability='$availability', skills='$skills', start_date='$start_date', last_updated='$last_updated' WHERE id=$id";
        break;
    case 'boardMember':
        $name = $_POST['name'];
        $position = $_POST['position'];
        $contact_info = $_POST['contact_info'];
        $date_joined = $_POST['date_joined'];

        $sql = "UPDATE BoardMember SET name='$name', position='$position', contact_info='$contact_info', date_joined='$date_joined' WHERE id=$id";
        break;
    case 'donation':
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $monthly_deficit = $_POST['monthly_deficit'];
        $yearly_deficit = $_POST['yearly_deficit'];
        $total_quantity = $_POST['total_quantity'];

        $sql = "UPDATE Donation SET item_name='$item_name', quantity='$quantity', monthly_deficit='$monthly_deficit', yearly_deficit='$yearly_deficit', total_quantity='$total_quantity' WHERE id=$id";
        break;
}

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
