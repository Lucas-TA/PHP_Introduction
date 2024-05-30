<?php 
    //initialize
    $id = 0;
    $title = $description = '';
    $errors = '';
    $disabled = '';

    //Upload Image
    if (isset($_POST['insert'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        
        $errors = [];
        //Check Text Fields
            if (!$title) $errors[] = 'Missing Title';
            if (!$description) $errors[] = 'Missing Description';
        //Check File
            $imagetypes = ['image/gif','image/jpeg','image/png','image/webp'];
            if (!isset($_FILES['image'])) {
                $errors[] = 'Missing File';
            } else switch ($_FILES['image']['error']) {
                case UPLOAD_ERR_OK:
                    //if ($_FILES['image']['size'] > 0x100000) {
                    //  $errors[] = '';
                    //};
                    if (!in_array($_FILES['image']['type'], $imagetypes)) {
                        $errors[] = 'Not a suitable image file';
                    };
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
        //If no errors
            if (empty($errors)) { //Proceed
                //Get Name

                //Add to the database

                //Keep Original File

                //Resize Copies

                //Finish Up
                
            } else { //Handle error
                $errors = sprintf('<p class="errors">%s</p>', implode('<br>', $errors));
            }
    }