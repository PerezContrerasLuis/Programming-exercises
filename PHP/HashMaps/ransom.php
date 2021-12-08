<?php
/*
Given the words in the magazine and the words in the ransom note, print Yes if he can replicate his ransom note exactly using whole words from the magazine; otherwise, print No.

Example
 $magazine = "attack at dawn"  $note= "Attack at dawn"

The magazine has all the right words, but there is a case mismatch. The answer is "No".
*/
function checkMagazine($magazine, $note)
{

    if (is_null($magazine) || is_null($note) ||  empty($magazine) || empty($note)) {
        echo "No";
        exit();
    }

    $answer = "Yes";

    // we create a temporal hash
    $temp = array();
    for ($i = 0; $i < count($note); $i++) {
        if (array_key_exists($note[$i], $temp)) {
            $temp[$note[$i]]++;
        } else {
            $temp[$note[$i]] = 1;
        }
    }

    $tempM = array();
    for ($i = 0; $i < count($magazine); $i++) {
        if (array_key_exists($magazine[$i], $tempM)) {
            $tempM[$magazine[$i]]++;
        } else {
            $tempM[$magazine[$i]] = 1;
        }
    }


    foreach ($temp as $key => $value) {
        if (array_key_exists($key, $tempM)) {
            if ($value > $tempM[$key]) {
                echo "No"; 
                exit();
            }
        } else {
            echo "No";
            exit();
        }
    }
    echo $answer;
}

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$m = intval($first_multiple_input[0]);

$n = intval($first_multiple_input[1]);

$magazine_temp = rtrim(fgets(STDIN));

$magazine = preg_split('/ /', $magazine_temp, -1, PREG_SPLIT_NO_EMPTY);

$note_temp = rtrim(fgets(STDIN));

$note = preg_split('/ /', $note_temp, -1, PREG_SPLIT_NO_EMPTY);

checkMagazine($magazine, $note);
