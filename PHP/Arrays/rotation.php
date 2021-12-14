<?php

/*
 * Complete the 'rotLeft' function below.
 *A left rotation operation on an array shifts each of the array's elements 1 unit to
the left. For example, if 2 left rotations are performed on array [1, 2, 3, 4, 5,
then the array would become B, 1, 5, 1, 2). Note that the lowest index item
moves to the highest index in a rotation. This is called a circular array.
Given an array a of n integers and a number, d, perform d left rotations on the
array. Return the updated array to be printed as a single line of space-separated
integers.
Function Description
Complete the function rotLeft in the editor below
rotLeft has the following parameter(s).
• int a[n]: the array to rotate
int d: the number of rotations
Returns
• int a'[n]: the rotated array
Input Format
The first line contains two space-separated integers n and d, the size of a and
the number of left rotations.
The second line contains n space-separated integers, each an ali].
 */

function rotLeft($a, $d) {
    $ArrTmp = str_split($a[0]);

    $rotate = array_slice($ArrTmp, 0, $d);
    $newArr = array_slice($ArrTmp, $d);

    $FinalArr = array_merge($newArr,$rotate);

    return $FinalArr;
   
}

$fptr = fopen("php://stdin", "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$d = intval($first_multiple_input[1]);

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotLeft($a, $d);
print_r($result);
fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
