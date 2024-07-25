<?php
include '../../db.php';

function display_modal($title, $message, $redirect = false) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
        <title>Modal</title>
    </head>
    <body>
        <div class='modal show' tabindex='-1' role='dialog' style='display: block; background: rgba(0,0,0,0.5);'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>$title</h5>
                        <button type='button' class='close' onclick=\"window.location.href='" . ($redirect ? 'view_children.php' : 'javascript:history.back()') . "';\" aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>$message</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick=\"window.location.href='" . ($redirect ? 'view_children.php' : 'javascript:history.back()') . "';\">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>";
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $child_id = $_GET['id'];

    $sql = "SELECT profile_picture FROM person WHERE id = $child_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profile_picture = $row['profile_picture'];

        if ($profile_picture && file_exists($profile_picture)) {
            unlink($profile_picture);
        }

        $sql = "UPDATE person SET profile_picture = NULL WHERE id = $child_id";
        if ($conn->query($sql) === TRUE) {
            display_modal('Success', 'Profile picture deleted successfully', true);
        } else {
            display_modal('Error', 'Error updating record: ' . $conn->error);
        }
    } else {
        display_modal('Error', 'Child record not found.');
    }
} else {
    display_modal('Error', 'Invalid request.');
}

$conn->close();
?>
