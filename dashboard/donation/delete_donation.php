<?php
include '../../db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $donation_id = $conn->real_escape_string($_GET['id']);

    $sql = "DELETE FROM donation WHERE id = $donation_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_donation.php?status=success");
    } else {
        header("Location: view_donation.php?status=error");
    }
} else {
    header("Location: view_donation.php?status=error");
}

$conn->close();
?>
