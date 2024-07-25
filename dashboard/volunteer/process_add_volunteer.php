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
        <title>$title</title>
    </head>
    <body>
        <div class='modal show' tabindex='-1' role='dialog' style='display: block; background: rgba(0,0,0,0.5);'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>$title</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>$message</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick=\"window.location.href='" . ($redirect ? 'view_volunteers.php' : 'javascript:history.back()') . "';\">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $role = $_POST['role'];
        $contact = $_POST['contact'];
        $availability = $_POST['availability'];
        $skills = $_POST['skills'];
        $start_date = $_POST['start_date'];
        $last_updated = $_POST['last_updated'];



        $sql = "INSERT INTO volunteer (first_name, last_name, role, contact_info, availability, skills, start_date, last_updated) 
        VALUES ('$first_name', '$last_name', '$role', '$contact', '$availability', '$skills', '$start_date', '$last_updated')";
    

    if ($conn->query($sql) === TRUE) {
        display_modal('Success', 'New record created successfully', true);
    } else {
        display_modal('Error', 'Error: ' . $conn->error);
    }
}

$conn->close();
?>


