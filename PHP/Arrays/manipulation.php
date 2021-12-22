<?php

/*
 * Starting with a 1-indexed array of zeros and a list of operations, 
 * for each operation add a value to each the array element between two given indices, inclusive. 
 * Once all operations have been performed, return the maximum value in the array.
 *  Complete the 'arrayManipulation' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. 2D_INTEGER_ARRAY queries
 */

function arrayManipulation($n, $queries) {
    //create array with zeros
    $mat = array();
    $max = 0 ;
    for($i = 0; $i<$n; $i++){
        $mat[] = 0;
    }
    for($i=0; $i<count($queries); $i++){
        for($a=($queries[$i][0]-1);$a<$queries[$i][1];$a++){
            $mat[$a] += $queries[$i][2]; 
            $max = $max < $mat[$a]? $mat[$a]: $max;
        }
    }
   //sort($mat);
   //print_r($mat);
//    return $mat[$n-1];
   return $max;
}

$fptr = fopen("php://stdin", "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$queries = array();

for ($i = 0; $i < $m; $i++) {
    $queries_temp = rtrim(fgets(STDIN));

    $queries[] = array_map('intval', preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = arrayManipulation($n, $queries);

fwrite($fptr, $result . "\n");

fclose($fptr);
