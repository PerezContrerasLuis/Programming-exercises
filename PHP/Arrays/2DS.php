<?php

/*
 * Complete the 'hourglassSum' function below.
 *
 * There are 16 hourglasses in "arr". An hourglass sum is the sum of an hourglass' values. Calculate the hourglass sum for every hourglass in "arr", then print the maximum hourglass sum. The array will always be  6 x 6.

Example : 
-9 -9 -9  1 1 1 
 0 -9  0  4 3 2
-9 -9 -9  1 2 3
 0  0  8  6 6 0
 0  0  0 -2 0 0
 0  0  1  2 4 0

The 16 hourglass sums are:
-63, -34, -9, 12, 
-10,   0, 28, 23, 
-27, -11, -2, 10, 
  9,  17, 25, 18

The highest hourglass sum is 28  from the hourglass beginning at row 1, column 2.
0 4 3
  1
8 6 6
 */

$fptr = fopen("php://stdin", "r");
$arr = array();

for ($arr_i = 0; $arr_i < 6; $arr_i++) {
    $arr_temp = fgets($fptr);
    $arr[] = explode(" ", $arr_temp);
    array_walk($arr[$arr_i], 'intval');
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);


//function to count 16 hourglass
function hourglassSum($arr)
{
    $sum = 0;
    $asw = 0;

    //iterates controlling the rows 0-3 representing the 4 hourglasses
    for ($f = 0; $f <= 3; $f++) {
        //iterates controlling the columns 0-3 representing the 4 hourglasses
        for ($c = 0; $c <= 3; $c++) {
            //// control the iterations that make up each hourglass, 3 rows and three columns
            for ($fi = $f; $fi <= ($f + 2); $fi++) {
                for ($ci = $c; $ci <= ($c + 2); $ci++) {
                    //if the row is the middle one, the first column and the last column are not taken into account
                    if ($fi == (($f + 2) - 1)) {
                        $sum += $arr[$fi][$ci + 1];
                        $ci = ($c + 2);
                    } else {
                        $sum += intval($arr[$fi][$ci]);
                    }
                }
            }
            if ($f == 0 & $c == 0) {
                $asw = $sum;
            } else {
                $asw = $sum > $asw ? $sum : $asw;
            }

            $sum = 0;
        }
    }
    return $asw;
}
