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
            if (!isset($_FILES['image'])) $errors[] = 'Missing File';
        //If no errors
            if (empty($errors)) { //Proceed

            } else { //Handle error
                $errors = sprintf('<p class="errors">%s</p>', implode('<br>', $errors));
            }
    }