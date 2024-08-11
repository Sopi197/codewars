<?php


// 21. [7-kyu], [fundametals]. Maximum Multiple
// https://www.codewars.com/kata/57ee99a16c8df7b02d00045f
// Данный двумерный массив целых чисел, верните сглаженную версию массива со всеми целыми числами в отсортированном (возрастающем) порядке.
// Данные [[3, 2, 1], [4, 6, 5], [], [9, 7, 8]], ваша функция должна вернуть [1, 2, 3, 4, 5, 6, 7, 8, 9].

function flatten_and_sort($array)
{
    $str = json_encode($array);
    $res_str = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] !== "[" && $str[$i] !== "]" && $str[$i] !== ",") {
            $res_str .= $str[$i];
        } else {
            $res_str .= "?";
        }
    }
    $arr_str = explode("?", $res_str);
    $arr_str = array_diff($arr_str, [""]);
    $arr_numbers = array_map(function ($item) {
        return (int) $item;
    }, $arr_str);
    sort($arr_numbers);
    return $arr_str;
    // $flatten = array_merge([], ...$a);
    // sort($flatten);
    // return $flatten;
}
var_dump(flatten_and_sort([[1, 3, 5], [100], [2, 4, 6]]));
echo PHP_EOL;



// 22. [7-kyu], [fundametals]. Sum of Minimums!
// https://www.codewars.com/kata/5d5ee4c35162d9001af7d699/train/php
// Дан двумерный (вложенный) список (массив, вектор, .. ) размера m * n, ваша задача — найти сумму минимальных значений в каждой строке.
// Например:
// [ [ 1, 2, 3, 4, 5 ] # минимальное значение строки равно 1
// , [ 5, 6, 7, 8, 9 ] # минимальное значение строки равно 5
// , [ 20, 21, 34, 56, 100 ] # минимальное значение строки равно 20
// ]
// Таким образом, функция должна вернуть 26, поскольку сумма минимумов равна 1 + 5 + 20 = 26.
// Примечание: вам всегда будет предоставлен непустой список, содержащий положительные значения.
// $this->assertSame(9, sum_of_minimums([[ 7,9,8,6,2 ], [6,3,5,4,3], [5,8,7,4,5]]));
// $this->assertSame(76, sum_of_minimums([[11,12,14,54], [67,89,90,56], [7,9,4,3], [9,8,6,7]]));

function sum_of_minimums($numbers)
{
    $res = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $res = $res + min($numbers[$i]);
    }
    return $res;
    // return array_sum(array_map('min', $numbers));
}
var_dump(sum_of_minimums([[7, 9, 8, 6, 2], [6, 3, 5, 4, 3], [5, 8, 7, 4, 5]]));
echo PHP_EOL;




echo "\n\n========================================= 6-[kyu] ========================================= \n\n";


// 1. [6-kyu], [strings]. Stop gninnipS My sdroW!
// https://www.codewars.com/kata/5264d2b162488dc400000001/solutions/php
// Stop gninnipS My sdroW!
// Напишите функцию, которая принимает строку из одного или нескольких слов и возвращает ту же строку, но со всеми словами, в которых пять или более букв перевернуты (как в названии этого ката). Передаваемые строки будут состоять только из букв и пробелов. Пробелы будут включены только в том случае, если присутствует более одного слова.
// "Hey fellow warriors"  --> "Hey wollef sroirraw" 
// "This is a test        --> "This is a test" 
// "This is another test" --> "This is rehtona test"
// $this->assertSame("emocleW", spinWords("Welcome"));
// $this->assertSame("Hey wollef sroirraw", spinWords("Hey fellow warriors"));
// $this->assertSame("This is a test", spinWords("This is a test"));
// $this->assertSame("This is rehtona test", spinWords("This is another test"));
// $this->assertSame("You are tsomla to the last test", spinWords("You are almost to the last test"));
// $this->assertSame("Just gniddik ereht is llits one more", spinWords("Just kidding there is still one more"));
// $this->assertSame("ylsuoireS this is the last one", spinWords("Seriously this is the last one"));

function spinWords($str)
{
    $arr = explode(" ", $str);
    $arr_new = [];
    for ($i = 0; $i < count($arr); $i++) {
        if (strlen($arr[$i]) >= 5) {
            $arr_new[] = strrev($arr[$i]);
        } else {
            $arr_new[] = $arr[$i];
        }
    }
    return implode(" ", $arr_new);
}
var_dump(spinWords("Hey fellow warriors"));
echo PHP_EOL;



// 2. [6-kyu], [strings]. Who likes it?
// https://www.codewars.com/kata/5266876b8f4bf2da9b000362
// Описание:
// Вы, вероятно, знаете систему «лайков» из Facebook и других страниц. Люди могут «лайкать» записи в блогах, фотографии или другие элементы. Мы хотим создать текст, который должен отображаться рядом с таким элементом.
// Реализуйте функцию, которая принимает массив, содержащий имена людей, которым нравится элемент. Она должна возвращать отображаемый текст, как показано в примерах:
// []                                -->  "no one likes this"
// ["Peter"]                         -->  "Peter likes this"
// ["Jacob", "Alex"]                 -->  "Jacob and Alex like this" 
// ["Max", "John", "Mark"]           -->  "Max, John and Mark like this"
// ["Alex", "Jacob", "Mark", "Max"]  -->  "Alex, Jacob and 2 others like this"
// Примечание: для 4 или более имен число в «и еще 2» просто увеличивается.

function whoLikeIt($arr)
{
    if ($arr === []) {
        return "no one likes this";
    } else if (count($arr) === 1) {
        return $arr[0] . " likes this";
    } else if (count($arr) === 2) {
        return $arr[0] . " and " . $arr[1] . " like this";
    } else if (count($arr) === 3) {
        return $arr[0] . ", " . $arr[1] . " and " . $arr[2] . " like this";
    } else {
        return $arr[0] . ", " . $arr[1] . " and " . count($arr) - 2 . " others like this";
    }
}
var_dump(whoLikeIt(["Alex", "Jacob", "Mark", "Max", "Nastya"]));
echo PHP_EOL;



// 3. [6-kyu], [fundamentals] Find the odd int
// https://www.codewars.com/kata/54da5a58ea159efa38000836
// Данный массив целых чисел, найдите то, которое встречается нечетное количество раз.
// Всегда будет только одно целое число, которое встречается нечетное количество раз.
// Примеры
// [7] должно вернуть 7, потому что оно встречается 1 раз (что нечетно).
// [0] должно вернуть 0, потому что оно встречается 1 раз (что нечетно).
// [1,1,2] должно вернуть 2, потому что оно встречается 1 раз (что нечетно).
// [0,1,0,1,0] должно вернуть 0, потому что оно встречается 3 раза (что нечетно).
// [1,2,2,3,3,3,4,3,3,3,2,2,1] должно вернуть 4, потому что оно встречается 1 раз (что нечетно).
// $this->assertSame(5, findIt([20,1,-1,2,-2,3,3,5,5,1,2,4,20,4,-1,-2,5]));
// $this->assertSame(-1, findIt([1,1,2,-2,5,2,4,4,-1,-2,5]));
// $this->assertSame(5, findIt([20,1,1,2,2,3,3,5,5,4,20,4,5]));
// $this->assertSame(10, findIt([10]));
// $this->assertSame(10, findIt([1,1,1,1,1,1,10,1,1,1,1]));

function findOdd($arr)
{
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        for ($k = 0; $k < count($arr); $k++) {
            if ($arr[$i] === $arr[$k]) {
                $count++;
            }
        }
        if ($count % 2 !== 0) {
            return $arr[$i];
        } else {
            $count = 0;
        }
    }
}
var_dump(findOdd([1, 1, 2, -2, 5, 2, 4, 4, -1, -2, 5]));
echo PHP_EOL;



// 4. [6-kyu], [mathematics] Multiples of 3 or 5
// https://www.codewars.com/kata/514b92a657cdc65150000006
// Если мы перечислим все натуральные числа ниже 10, которые кратны 3 или 5, мы получим 3, 5, 6 и 9. Сумма этих кратных равна 23.
// Завершите решение так, чтобы оно возвращало сумму всех кратных 3 или 5 чисел ниже переданного числа.
// Кроме того, если число отрицательное, верните 0.
// Примечание: если число кратно и 3, и 5, посчитайте его только один раз.
// $this->assertSame(23, solution(10));

function multiples_sol($number)
{
    $sum = 0;
    for ($i = 0; $i < $number; $i++) {
        if ($i % 3 === 0 or $i % 5 === 0) {
            $sum += $i;
        }
    }
    return $sum;
}
var_dump(multiples_sol(10));
echo PHP_EOL;


// 5. [6-kyu], [arrays] Array.diff
// https://www.codewars.com/kata/523f5d21c841566fde000009
// Ваша цель в этом ката — реализовать функцию разности, которая вычитает один список из другого и возвращает результат.
// Она должна удалить все значения из списка a, которые присутствуют в списке b, сохраняя их порядок.
// arrayDiff([1,2],[1]) == [2]
// Если значение присутствует в b, все его вхождения должны быть удалены из другого:
// arrayDiff([1,2,2,2,3],[2]) == [1,3]
// $this->assertSame([2], arrayDiff([1,2], [1]), "a was [1,2], b was [1], expected [2]");
// $this->assertSame([2,2], arrayDiff([1,2,2], [1]), "a was [1,2,2], b was [1], expected [2,2]");
// $this->assertSame([1], arrayDiff([1,2,2], [2]), "a was [1,2,2], b was [2], expected [1]");
// $this->assertSame([1,2,2], arrayDiff([1,2,2], []), "a was [1,2,2], b was [], expected [1,2,2]");
// $this->assertSame([], arrayDiff([], [1,2]), "a was [], b was [1,2], expected []");
// $this->assertSame([3], arrayDiff([1, 2, 3], [1,2]), "a was [1, 2, 3], b was [1,2], expected [3]");

function arrayDiff($a, $b)
{
    return array_values(array_diff($a, $b));
}
var_dump(arrayDiff([1, 2], [1]));
echo PHP_EOL;



// 6. [6-kyu], [mathematics]  Sum of Digits / Digital Root
// https://www.codewars.com/kata/541c8630095125aba6000c00
// Цифровой корень — это рекурсивная сумма всех цифр числа.
// Дано n, возьмите сумму цифр числа n. Если это значение имеет более одной цифры, продолжайте уменьшать таким образом, пока не получится однозначное число. Входные данные будут неотрицательным целым числом.
// Примеры
// 16 --> 1 + 6 = 7
// 942 --> 9 + 4 + 2 = 15 --> 1 + 5 = 6
// 132189 --> 1 + 3 + 2 + 1 + 8 + 9 = 24 --> 2 + 4 = 6
// 493193 --> 4 + 9 + 3 + 1 + 9 + 3 = 29 --> 2 + 9 = 11 --> 1 + 1 = 2

function digitalRoot($number)
{
    function sum($n)
    {
        $res = array_sum(str_split(strval($n)));
        if ($res > 9) {
            return sum($res);
        } else {
            return $res;
        }
    }
    return sum($number);
    // return 1 + ($n - 1) % 9;
    // или 
    // $res = 0;
    // $str = strval($n);
    // for ($i = 0; $i < strlen($str); $i++) {
    //     $res += $str[$i]; // 6
    // }
    // или 
    // while (strlen($number) > 1) {
    //     $number = array_sum(str_split($number));
    // }
    // return $number;
}
var_dump(digitalRoot(942));
echo PHP_EOL;


// 7. [6-kyu], [string] Create Phone Number
// https://www.codewars.com/kata/525f50e3b73515a6db000b83/train/php
// Напишите функцию, которая принимает массив из 10 целых чисел (от 0 до 9) и возвращает строку этих чисел в виде номера телефона.
// Пример
// createPhoneNumber([1,2,3,4,5,6,7,8,9,0]); // => возвращает "(123) 456-7890"
// Возвращаемый формат должен быть правильным, чтобы выполнить это задание.
// Не забудьте пробел после закрывающих скобок!
// $this->assertSame('(123) 456-7890', createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]));
// $this->assertSame('(111) 111-1111', createPhoneNumber([1, 1, 1, 1, 1, 1, 1, 1, 1, 1]));

function createPhoneNumber($numbersArray)
{
    $str = implode($numbersArray);
    return "(" . substr($str, 0, 3) . ") " . substr($str, 3, 3) . "-" . substr($str, -4);
    // $phoneNum = "($a[0]$a[1]$a[2]) $a[3]$a[4]$a[5]-$a[6]$a[7]$a[8]$a[9]";
    // форматирует строку
    // return sprintf("(%d%d%d) %d%d%d-%d%d%d%d", ...$digits);
    // return vsprintf("(%d%d%d) %d%d%d-%d%d%d%d", $numbersArray);
}
var_dump(createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]));
echo PHP_EOL;


// 8. [6-kyu], [string] Bit Counting
// https://www.codewars.com/kata/526571aae218b8ee490006f4
// Напишите функцию, которая принимает целое число в качестве входных данных и возвращает количество битов, которые равны единице в двоичном представлении этого числа. Вы можете гарантировать, что входные данные неотрицательны.
// Пример: двоичное представление числа 1234 — 10011010010, поэтому в этом случае функция должна вернуть 5

function countBits($n)
{
    return substr_count(decbin($n), "1");
}
var_dump(countBits(1234));
echo PHP_EOL;



// 9. [6-kyu], [algorithms] Find The Parity Outlier
// https://www.codewars.com/kata/5526fc09a1bbd946250002dc
// Вам дан массив (длиной не менее 3, но может быть очень большим), содержащий целые числа. Массив либо полностью состоит из нечетных целых чисел, либо полностью состоит из четных целых чисел, за исключением одного целого числа N. Напишите метод, который принимает массив в качестве аргумента и возвращает этот «выброс» N.
// Примеры
// [2, 4, 0, 100, 4, 11, 2602, 36] --> 11 (единственное нечетное число)
// [160, 3, 1719, 19, 11, 13, -21] --> 160 (единственное четное число)
// [160, 3, 1719, 19, 11, 13, -21] --> 160 (the only even number)

function findOddEven($integers)
{
    $even = [];
    $odd = [];
    for ($i = 0; $i < count($integers); $i++) {
        if ($integers[$i] % 2 === 0) {
            $even[] = $integers[$i];
        } else {
            $odd[] = $integers[$i];
        }
    }
    return ($even > $odd) ? $odd[0] : $even[0];
    // или 
    // $count_even = 0;
    // $count_odd = 0;
    // for ($i = 0; $i < count($integers); $i++) {
    //     if ($integers[$i] % 2 === 0) {
    //         $count_even++;
    //     } else {
    //         $count_odd++;
    //     }
    // }
    // for ($i = 0; $i < count($integers); $i++) {
    //     if ($count_even > $count_odd) {
    //         if ($integers[$i] % 2 !== 0) {
    //             return $integers[$i];
    //         }
    //     } else if ($count_even < $count_odd) {
    //         if ($integers[$i] % 2 === 0) {
    //             return $integers[$i];
    //         }
    //     }
    // }
}
var_dump(findOddEven([2, 4, 0, 100, 4, 11, 2602, 36]));
echo PHP_EOL;


// 10. [6-kyu], [strings] Convert string to camel case
// https://www.codewars.com/kata/517abf86da9663f1d2000003
// Завершите метод/функцию так, чтобы он преобразовывал слова, разделенные тире/подчеркиванием, в camel case. Первое слово в выходных данных должно быть написано заглавными буквами, только если исходное слово было написано заглавными буквами (известно как верхний camel case, также часто называемый Pascal case). Следующие слова должны всегда быть написаны заглавными буквами.
// "the-stealth-warrior" преобразуется в "theStealthWarrior"
// "The_Stealth_Warrior" преобразуется в "TheStealthWarrior"
// "The_Stealth-Warrior" преобразуется в "TheStealthWarrior"

function convertCamelCase($str)
{
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === "_" or $str[$i] === "-") {
            $res .= strtoupper($str[$i + 1]);
            $i = $i + 1;
        } else {
            $res .= $str[$i];
        }
    }
    return $res;
}
var_dump(convertCamelCase("The_Stealth_Warrior"));
echo PHP_EOL;


// 11. [6-kyu], [mathematics] Persistent Bugger.
// https://www.codewars.com/kata/55bf01e5a717a0d57e0000ec
// Напишите функцию persistence, которая принимает положительный параметр num и возвращает его мультипликативную устойчивость, которая представляет собой количество раз, которое вы должны умножить цифры в num, пока не достигнете одной цифры.
// 39 --> 3 (потому что 3*9 = 27, 2*7 = 14, 1*4 = 4 и 4 имеет только одну цифру, есть 3 умножения)
// 999 --> 4 (потому что 9*9*9 = 729, 7*2*9 = 126, 1*2*6 = 12 и, наконец, 1*2 = 2, есть 4 умножения)
// 4 --> 0 (потому что 4 уже является однозначным числом, нет умножения)

function persistence($n)
{
    $count = 0;
    while (strlen($n) > 1) {
        $n = array_product(str_split($n));
        $count++;
    }
    return $count;
}
var_dump(persistence(39));
echo PHP_EOL;


// 12. [6-kyu], [string] Counting Duplicates - не проходит тесты, но решено верно
// https://www.codewars.com/kata/54bf1c2cd5b56cc47f0007a1
// Подсчитайте количество дубликатов
// Напишите функцию, которая будет возвращать количество различных нечувствительных к регистру буквенных символов и числовых цифр, которые встречаются во входной строке более одного раза. Можно предположить, что входная строка содержит только буквы (как заглавные, так и строчные) и числовые цифры.
// Пример
// "abcde" -> 0 # символы не повторяются более одного раза
// "aabbcde" -> 2 # 'a' и 'b'
// "aabBcde" -> 2 # 'a' встречается дважды, а 'b' дважды (`b` и `B`)
// "indivisibility" -> 1 # 'i' встречается шесть раз
// "Indivisibilities" -> 2 # 'i' встречается семь раз, а 's' встречается дважды
// "aA11" -> 2 # 'a' и '1'
// "ABBA" -> 2 # 'A' и 'B' встречаются дважды

function duplicateCount($text)
{
    $str = "";
    $text = strtolower($text);
    for ($i = 0; $i < strlen($text); $i++) {
        if (substr_count($text, $text[$i]) >= 2) {
            $str .= $text[$i];
        }
    }
    return count(array_unique(str_split($str)));
}
var_dump(duplicateCount(1));
echo PHP_EOL;


// 12. [6-kyu], [string] 
// 












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
    return $arr_no_zero;
}
// var_dump(moveZero([false, 1, 0, 1, 2, 0, 1, 3, "a"]));






// https://www.codewars.com/kata/search/php?q=&r%5B%5D=-6&beta=false&order_by=popularity%20desc

// strlen(943) = 3
// str_split(943) = ["9", "4", "3"]
// перемельман - арифметика для развлечения
// книги по математике перельман
// грокаем алгоритмы
// array_values($arr) возвращает индексный массив со всеми значениями массива array и сбрасывает ключи 







// 09 августа 2 задачи 7-kyu и 3 задачи 6-kyu 60 мин
// 10 августа 8 задач 6-kyu и 1 задача 5-kyu codewars за 2.5 часа
