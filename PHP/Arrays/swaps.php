<?php

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {
    $swaps = 0;
    for($i = 0; $i < count($arr); $i++){
        if($arr[$i] == $i+1) continue;
        $temp = $arr[$i];
        $vl = array_search($i+1,$arr);
        $arr[$i] = $arr[$vl];
        $arr[$vl] = $temp;
        $swaps ++;  
        if($i+2<count($arr) && $arr[$i+2] == $i +3 ){
            $i = $i + 2;
        }else if($i+1<count($arr) && $arr[$i+1] == $i +2 ){
            $i = $i + 1;
        }
    }
    return $swaps;
}

$fptr = fopen("php://stdin", "r");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = minimumSwaps($arr);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);