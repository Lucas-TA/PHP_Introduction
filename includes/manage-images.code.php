<?php
    require_once 'includes/default-library.php';
    
    // Configuration
    $root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
    $CONFIG['images']['directory'] = 'images';
    $CONFIG['images']['display_size'] = '480 x 360';
    $CONFIG['images']['thumbnail_size'] = '240 x 180';
    $CONFIG['images']['icon_size'] = '40x30';
    $CONFIG['images']['scaled_size'] = '50';

    // Initialize variables
    $id = 0;
    $title = $description = '';
    $errors = '';
    $disabled = '';

    // Upload Image
    if (isset($_POST['insert'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        
        $errors = [];

        // Check Text Fields
        if (!$title) $errors[] = 'Missing Title';
        if (!$description) $errors[] = 'Missing Description';
    
        // Check File
        $imagetypes = ['image/gif','image/jpeg','image/png','image/webp'];
        if (!isset($_FILES['image'])) {
            $errors[] = 'Missing File';
        } else {
            switch ($_FILES['image']['error']) {
                case UPLOAD_ERR_OK:
                    //if ($_FILES['image']['size'] > 0x100000) {
                    //  $errors[] = '';
                    //};
                    if (!in_array($_FILES['image']['type'], $imagetypes)) {
                        $errors[] = 'Not a suitable image file';
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $errors[] = 'File too big';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errors[] = 'Missing File';
                    break;
                default:
                    $errors[] = 'Problem with the upload';
            }
        }

        // If no errors
        if (empty($errors)) { // Proceed
            // Get Name
            $name = strtolower(str_replace(' ', '-', $_FILES['image']['name']));

            // Directories for images storage
            $uploadDir = "$root/{$CONFIG['images']['directory']}/";

            $originalDir = $uploadDir . 'originals/';
            $displayDir = $uploadDir . 'display/';
            $thumbnailDir = $uploadDir . 'thumbnails/';
            $iconDir = $uploadDir . 'icons/';
            $scaledDir = $uploadDir . 'scaled/';

            // Create directories if they do not exist
            foreach ([$originalDir, $displayDir, $thumbnailDir, $iconDir, $scaledDir] as $dir) {
                if (!file_exists($dir)) {
                    mkdir($dir, 0755, true);
                }
            }

            // Move the uploaded file to the original directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $originalDir . $name)) {
                // Resize Copies
                resizeImage($originalDir . $name, $displayDir . $name, $CONFIG['images']['display_size']);
                resizeImage($originalDir . $name, $thumbnailDir . $name, $CONFIG['images']['thumbnail_size']);
                resizeImage($originalDir . $name, $iconDir . $name, $CONFIG['images']['icon_size']);
                resizeImage($originalDir . $name, $scaledDir . $name, $CONFIG['images']['scaled_size'], ['method' => 'scale']);

                echo "File uploaded and processed successfully.";
            } else {
                $errors[] = 'Failed to move uploaded file.';
            }
        }
        if (!$errors) {
            $errors = '';
            $title = $description = '';
        }
        // Handle errors
        if (!empty($errors)) {
            echo sprintf('<p class="errors">%s</p>', implode('<br>', $errors));
        }
    }