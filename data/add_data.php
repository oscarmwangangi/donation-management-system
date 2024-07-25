<?php
include 'db.php';

$type = $_POST['type'];

switch ($type) {
    case 'person':
        $name = $_POST['name'];
        $county = $_POST['county'];
        $village = $_POST['village'];
        $date_enrolled = $_POST['date_enrolled'];
        $person_type = $_POST['person_type']; // child or adult

        $sql = "INSERT INTO Person (name, county, village, date_enrolled, type) VALUES ('$name', '$county', '$village', '$date_enrolled', '$person_type')";
        break;
    case 'staff':
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact_info = $_POST['contact_info'];
        $date_joined = $_POST['date_joined'];

        $sql = "INSERT INTO Staff (name, role, contact_info, date_joined) VALUES ('$name', '$role', '$contact_info', '$date_joined')";
        break;
    case 'volunteer':
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact_info = $_POST['contact_info'];
        $availability = $_POST['availability'];
        $skills = $_POST['skills'];
        $start_date = $_POST['start_date'];
        $last_updated = $_POST['last_updated'];

        $sql = "INSERT INTO Volunteer (name, role, contact_info, availability, skills, start_date, last_updated) VALUES ('$name', '$role', '$contact_info', '$availability', '$skills', '$start_date', '$last_updated')";
        break;
    case 'boardMember':
        $name = $_POST['name'];
        $position = $_POST['position'];
        $contact_info = $_POST['contact_info'];
        $date_joined = $_POST['date_joined'];

        $sql = "INSERT INTO BoardMember (name, position, contact_info, date_joined) VALUES ('$name', '$position', '$contact_info', '$date_joined')";
        break;
    case 'donation':
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $monthly_deficit = $_POST['monthly_deficit'];
        $yearly_deficit = $_POST['yearly_deficit'];
        $total_quantity = $_POST['total_quantity'];

        $sql = "INSERT INTO Donation (item_name, quantity, monthly_deficit, yearly_deficit, total_quantity) VALUES ('$item_name', '$quantity', '$monthly_deficit', '$yearly_deficit', '$total_quantity')";
        break;
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>






