<?php


// 1. [5-kyu], [mathematics] Moving Zeros To The End
// https://www.codewars.com/kata/52597aa56021e91c93000cb0
// moveZeros([false,1,0,1,2,0,1,3,"a"]) // returns[false,1,1,2,1,3,"a",0,0]
function moveZero($arr)
{
    $arr_zero = [];
    $arr_no_zero = [];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === 0 or $arr[$i] === 0.0) {
            $arr_zero[] = (int) $arr[$i];
        } else {
            $arr_no_zero[] = $arr[$i];
        }
    }
    array_push($arr_no_zero, ...$arr_zero);
    // ...[] - оператор
    return $arr_no_zero;
}
// var_dump(moveZero([false, 1, 0, 1, 2, 0, 1, 3, "a"]));
