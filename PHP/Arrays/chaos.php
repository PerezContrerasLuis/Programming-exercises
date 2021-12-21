<?php
/*
Determine the minimum number of bribes that took place to get to a given queue order. 
Print the number of bribes,
 or, if anyone has bribed more than two people, print Too chaotic.
*/ 

$t = intval(trim(fgets(STDIN)));
$answ = array();
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $q_temp = rtrim(fgets(STDIN));
    $q = explode(" ",$q_temp);
    array_walk($q,'intval');

    $jump = 0 ;
    for ($i=$n-1; $i > 0; $i--) { 
        // echo $q[$i];
        if($q[$i] == $i+1) continue;
        if($q[$i-1] == $i+1){
            $tmp = $q[$i];
            $q[$i] = $q[$i-1];
            $q[$i-1] = $tmp;
            $jump ++; 
        } else if($i>1 && $q[$i-2] == $i+1){
            $t = $q[$i];
            $q[$i] = $q[$i-2];
            $q[$i-2] = $q[$i-1];
            $q[$i-1] = $t;
            $jump += 2;
        } else {
            echo "Too chaotic\n";
            //$answ[] = "Too chaotic\n";
            continue 2;
        }
    }
    echo $jump . "\n";
}

 