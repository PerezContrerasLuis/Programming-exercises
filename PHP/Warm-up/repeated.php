<?php 
/*
There is a string, s, of lowercase English letters that is repeated infinitely many times. Given an integer, n, find
and print the number of letter a's in the first n letters of the infinite string.
Example
s= 'abcac
n =10
The substring we consider is abcacabcac, the first I0 characters of the infinite string. There are 4 occurrences of
a in the substring.
Function Description
Complete the repeatedString function in the editor below.
repeatedString has the following parameter(s):
• s; a string to repeat
n. the number of characters to consider
Leaderboard
Returns
int. the frequency of a in the substring
Discussions
Input Format
The first line contains a single string, S.
The second line contains an integer, n
Constraints
• 1 5 s| ≤ 100
• 1 ≤ n < 1012
• For 25% of the test cases, m ≤ 10°

*/ 


/*
 * Complete the 'repeatedString' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. LONG_INTEGER n
 */

function repeatedString($s, $n) {
    
    $length = strlen($s);
    $cntLttr = substr_count($s,'a');
    $fndSize = intval($n/$length); 
    $count = intval($fndSize * $cntLttr);

    
    if($n % $length){
        $newString = substr($s,0,($n%$length));
        $count += substr_count($newString,'a');
    }
   
    return $count;
}

$fptr = fopen("php://stdin", "w");

$s = rtrim(fgets(STDIN), "\r\n");

$n = intval(trim(fgets(STDIN)));

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($fptr);