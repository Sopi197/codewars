<?php


// 1. [5-kyu] Moving Zeros To The End
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

// 2. [5-kyu] Human Readable Time
// https://www.codewars.com/kata/52685f7382004e774f0001f7/train/php
// Напишите функцию, которая принимает неотрицательное целое число (секунды) в качестве входных данных и возвращает время в удобном для восприятия формате (ЧЧ:ММ:СС)
// ЧЧ = часы, дополненные до 2 цифр, диапазон: 00–99
// ММ = минуты, дополненные до 2 цифр, диапазон: 00–59
// СС = секунды, дополненные до 2 цифр, диапазон: 00–59
// Максимальное время никогда не превышает 359999 (99:59:59)
// Вы можете найти несколько примеров в тестовых установках.
// $this->assertSame('00:00:00', human_readable(0));
// $this->assertSame('00:00:05', human_readable(5));
// $this->assertSame('00:01:00', human_readable(60));
// $this->assertSame('23:59:59', human_readable(86399));
// $this->assertSame('99:59:59', human_readable(359999));

function human_readable($seconds)
{
    return sprintf('%02d:%02d:%02d', $seconds / 3600, ($seconds % 3600) / 60, $seconds % 60);
    // $hour = $seconds / 60 / 60;
    // $hours_res = floor($hour);
    // $min = ($hour - $hours_res) * 60;
    // $min_res = floor($min);
    // $sec = round(($min - $min_res) * 60);
    // if($seconds <= 59) {
        // $hours_res = "00";
        // $min_res = "00";
    // }
    // if($seconds < 10 or $sec < 10) {
        // $sec = "0" . $sec;
    // }
    // if($sec == 0) {
        // $sec = "00";
    // }
    // if($min_res < 10 and $seconds >= 60) {
        // $min_res = "0" . $min_res;
    // }
    // if($hours_res < 10 and $seconds >= 60) {
        // $hours_res = "0" . $hours_res;
    // }
    // return implode(":", [$hours_res, $min_res, $sec]);
}
var_dump(human_readable(340562));

