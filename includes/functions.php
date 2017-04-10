<?php

function generateRandomNumber($min, $max) {
    return $num = mt_rand($min, $max);
}

function generateRandomOperator($operators) {
    // Get a random key position in the array
    // and return the key in that position.
    return $random_key = array_rand($operators);
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