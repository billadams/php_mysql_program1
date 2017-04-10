<?php
    $answer = filter_input(INPUT_POST, 'answer', FILTER_VALIDATE_FLOAT);
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator_string = filter_input(INPUT_POST, 'operator_string');
    $operator = filter_input(INPUT_POST, 'operator');

    include_once('includes/functions.php');

    if ($operator_string == 'add') {
        $result = add($num1, $num2);
    } else if ($operator_string == 'subtract') {
        $result = subtract($num1, $num2);
    } else if ($operator_string == 'multiply') {
        $result = multiply($num1, $num2);
    } else {
        $result = number_format(divide($num1, $num2), 2);
    }
    $errors = array();
    if ($answer === FALSE) {
        $error_message = 'Please enter an answer in decimal format.';
        $errors[] = $error_message;
    }

    if (!empty($errors)) {
        include('index.php');
        exit();
    }
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Answer</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Your Result</h1>
        </header>
        <div id="result">
            <?php if ($result != $answer) : ?>
                <h2 class="incorrect">INCORRECT!</h2>
            <?php else : ?>
                <h2 class="correct">CORRECT!</h2>
            <?php endif; ?>
            <p>Your answer: <?php echo number_format($answer, 2); ?></p>
            <p>Correct answer: <?php echo number_format($result, 2); ?></p>
            <a href="index.php">Try another equation</a>
        </div>
    </div>
</body>
</html>
