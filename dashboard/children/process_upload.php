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
                        <button type='button' class='close' onclick=\"window.location.href='" . ($redirect ? 'view_children.php' : 'view_child.php?id=' . $_POST['child_id']) . "';\" aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>$message</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick=\"window.location.href='" . ($redirect ? 'view_children.php' : 'view_child.php?id=' . $_POST['child_id']) . "';\">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['child_id'])) {
    $child_id = $_POST['child_id'];

    if (!isset($_FILES["profile_picture"]) || $_FILES["profile_picture"]["error"] == UPLOAD_ERR_NO_FILE) {
        display_modal('Error', 'No file was selected for upload.');
    } else {
        // Directory where uploaded files will be saved
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . basename($_FILES["profile_picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        // $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        // if ($check !== false) {
        //     $uploadOk = 1;
        // } else {
        //     display_modal('Error', 'The uploaded file is not a valid image.');
        //     $uploadOk = 0;
        // }

        // Check if file already exists
        if (file_exists($target_file)) {
            display_modal('Error', 'Sorry, the file already exists.');
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_picture"]["size"] > 500000) { // 500KB limit
            display_modal('Error', 'Sorry, your file is too large. The maximum file size is 500KB.');
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            display_modal('Error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // Do nothing, the error messages are already set and displayed
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                // Update database with the file path
                $sql = "UPDATE person SET profile_picture = '$target_file' WHERE id = $child_id";
                if ($conn->query($sql) === TRUE) {
                    display_modal('Success', 'The file ' . basename($_FILES["profile_picture"]["name"]) . ' has been uploaded.', true);
                } else {
                    display_modal('Error', 'Error updating record: ' . $conn->error);
                }
            } else {
                display_modal('Error', 'Sorry, there was an error uploading your file.');
            }
        }
    }
} else {
    display_modal('Error', 'Invalid request.');
}

$conn->close();
?>
