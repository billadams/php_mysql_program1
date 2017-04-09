<?php
    $answer = filter_input(INPUT_POST, 'answer', FILTER_VALIDATE_INT);

    $errors = array();
    if ($answer === FALSE) {
        $error_message = 'Please enter an answer in integer format.';
        $errors[] = $error_message;
    }

    if (!empty($errors)) {
        include('index.php');
        exit();
    }