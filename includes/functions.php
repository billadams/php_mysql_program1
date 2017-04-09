<?php

function generateRandomNumber($min, $max) {
    return $num = mt_rand($min, $max);
}

function generateRandomOperator() {
    // Create an array of possible operators. Get a random position
    // in the array and return the operator in that position.
    $operators = array('+', '-', '*', '/');
    $random_num = mt_rand(0, 3);

    return $random_operator = $operators[$random_num];
}

function add($num1, $num2) {
    return $num1 + $num2;
}

function subtract($num1, $num2) {
    return $num1 - $num2;
}

function multiply($num1, $num2) {
    return $num1 * $num2;
}

function divide($num1, $num2) {
    if ($num2 == 0) {
        // Handle divide by 0, loop until 0 is not returned.
        while ($num2 == 0) {
            $num2 = generateRandomNumber(0, 100);
        }
    }

    return $num1 / $num2;
}