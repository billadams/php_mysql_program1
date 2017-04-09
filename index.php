<?php
    if (!isset($answer)) { $answer = ''; }
    if (!isset($num1)) { $num1 = ''; }
    if (!isset($num2)) { $num2 = ''; }
    if (!isset($random_operator)) { $random_operator = ''; }

    include_once('includes/functions.php');

    if (empty($errors)) {
        // Generate two random numbers;
        $min = 0;
        $max = 100;
        $num1 = generateRandomNumber($min, $max);
        $num2 = generateRandomNumber($min, $max);

        // Generate one of the four operators randomly.
        $random_operator = generateRandomOperator();
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
            <label for="answer">What is <?php echo $num1; ?> <?php echo $random_operator; ?> <?php echo $num2; ?>?</label>
            <input type="text" id="answer" name="answer" placeholder="Your Answer..." autofocus>

            <?php if (!empty($errors)) :
                foreach ($errors as $error) : ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            <input type="hidden" name="num1" value="<?php echo $num1; ?>">
            <input type="hidden" name="num2" value="<?php echo $num2; ?>">
            <input type="hidden" name="operator" value="<?php echo $random_operator; ?>">

            <input type="submit" value="Check Answer">
        </form>
    </div>
</body>
</html>
