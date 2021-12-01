<?php 

/*
There is a new mobile game that starts with consecutively numbered clouds. Some of the clouds are
thunderheads and others are cumulus. The player can jump on any cumulus cloud having a number that is equal
to the number of the current cloud plus 1 or 2. The player must avoid the thunderheads. Determine the
minimum number of jumps it will take to jump from the starting postion to the last cloud. It is always posible to
win the game.
For each game, you will get an array of clouds numbered O if Ihey are safe or 1 if they must be avoided.
Example
C= 0,1, 0,0, 0,1, 0
Index the array from O ,. . 6. The number on each cloud is its index in the list so the player must avoid the clouds
at indices 1 and 5. They could follow these two paths: 0 -> 2 > 4 > 6or0 -2 > 3 -> 4 > 6. The first path
takes 3 jumps while the second takes 4. Return 3.
Function Description
Complete the jumpingOnClouds function in the editor below
jumpingOnClouds has the following parameter(s):
• int c[n]; an array of binary integers
Returns
• int: the minimum number of jumps required
Input Format
The first line contains an integer n, the total number of clouds. The second line contains n space-separated
binary integers describing clouds c|i] where 0 ≤i < n.
Constraints
• 2 ≤ n ≤ 100
• c/i] E {0,1}
• cl0= cn-1=0
Output Format
Print the minimum number of jumps needed to win the game.
Sample Input 0                   
    7
    0 0 1 0 0 1 0
Sample Output 0
    4
*/

function jumpingOnClouds($c) {
    $jump = 0;
    for ($i=0; $i < count($c) ; $i++){
        if($i == 0 ){
            if($c[$i+1]== 0){
                if($c[$i+2]== 0){
                    $jump++;
                    $i = $i+2;
                }else{
                    $jump++;
                    $i++;
                }
            }else{
                $i++;
            }
        }else{
            if($c[$i]== 0){
                if($c[$i-1]== 1){
                    $jump++;
                }else{
                    if(($i)!=(count($c)-1)){
                        if($c[$i+1]== 0){
                            $jump++;
                            $i++;
                        }else{
                            $jump++;
                        }
                    }else{
                        $jump++;
                    }
                }
            }else{ 
                if(($i)!=(count($c)-1)){
                    if($c[$i+1]== 0){
                        $jump++;
                        $i++;
                    }else{
                        $i++;
                    }
                }else{
                    $jump++;
                }
            }
        }
    }

    return $jump;
}

$fptr = fopen("php://stdin", "w");

$n = intval(trim(fgets(STDIN)));

$c_temp = rtrim(fgets(STDIN));

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);

fwrite($fptr, $result . "\n");

fclose($fptr);


?>