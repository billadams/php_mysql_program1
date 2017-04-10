<?php
    if (!isset($answer)) { $answer = ''; }
    if (!isset($num1)) { $num1 = ''; }
    if (!isset($num2)) { $num2 = ''; }
    if (!isset($random_key)) { $random_key = ''; }
    if (!isset($operator)) { $operator = ''; }

    include_once('includes/functions.php');

    if (empty($errors)) {
        // Generate two random numbers.
        $min = 0;
        $max = 100;
        $num1 = generateRandomNumber($min, $max);
        $num2 = generateRandomNumber($min, $max);

        // Create the $operators array.
        $operators = array('add' => '+', 'subtract' => '-', 'multiply' => '*', 'divide' => '/');
        // Generate one of the four operators randomly.
        $random_key = generateRandomOperator($operators);
        $operator = $operators[$random_key];
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program 1</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Check Your Math Skills</h1>
        </header>
        <form id="check_answer" action="check_answer.php" method="post">
            <p>For division problems, enter your answer to the nearest hundredth (e.g. 2.65). Remember to round up as well! (e.g. 2.657 becomes 2.66).</p>
            <p>For subtraction problems, negative answers are possible.</p>

            <label for="answer">What is <?php echo $num1; ?> <?php echo $operator; ?> <?php echo $num2; ?>?</label>
            <input type="text" id="answer" name="answer" placeholder="Your Answer..." autofocus>

            <?php if (!empty($errors)) :
                foreach ($errors as $error) : ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            <p><a href="./">Request a new equation.</a></p>

            <input type="hidden" name="num1" value="<?php echo $num1; ?>">
            <input type="hidden" name="num2" value="<?php echo $num2; ?>">
            <input type="hidden" name="operator_string" value="<?php echo htmlspecialchars($random_key); ?>">
            <input type="hidden" name="operator" value="<?php echo htmlspecialchars($operator); ?>">

            <input type="submit" value="Check Answer">
        </form>
    </div>
</body>
</html>
