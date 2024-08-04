<?php

// Github
// ivan_babienko@mail.ru
// Yamaha6843

// codewars 04.08.2024

// 1. [7-kyu], [fundametals]. Shortest Word
// https://www.codewars.com/kata/57cebe1dc6fdc20c57000ac9/train/php
// Просто, если задана строка слов, вернуть длину самого короткого слова(слов).
// Строка никогда не будет пустой, и вам не нужно учитывать различные типы данных.
// $this->assertSame(3, findShort("bitcoin take over the world maybe who knows perhaps"));
// $this->assertSame(3, findShort("turns out random test cases are easier than writing out basic ones"));
// $this->assertSame(2, findShort("Let's travel abroad shall we"));

function findShort($str)
{
    return min(array_map(function ($item) {
        return strlen($item);
    }, explode(" ", $str)));
    // return min(array_map('strlen', (explode(' ', $str))));
}
var_dump(findShort("bitcoin take over the world maybe who knows perhaps"));
echo PHP_EOL;



// 2. [7-kyu], [fundametals]. Two to One
// https://www.codewars.com/kata/5656b6906de340bd1b0000ac/train/php
// Возьмите 2 строки s1 и s2, содержащие только буквы от a до z. Верните новую отсортированную строку, максимально длинную, содержащую различные буквы — каждая взята только один раз — из s1 или s2.
// Примеры:
// a = "xyaabbbccccdefww"
// b = "xxxxyyyyabklmopq"
// longest(a, b) -> "abcdefklmopqwxy"
// a = "abcdefghijklmnopqrstuvwxyz"
// longest(a, a) -> "abcdefghijklmnopqrstuvwxyz"
// $this->revTest(longest("aretheyhere", "yestheyarehere"), "aehrsty");
// $this->revTest(longest("loopingisfunbutdangerous", "lessdangerousthancoding"), "abcdefghilnoprstu");
// $this->revTest(longest("inmanylanguages", "theresapairoffunctions"), "acefghilmnoprstuy");
// $this->revTest(longest("lordsofthefallen", "gamekult"), "adefghklmnorstu");

function longest($a, $b)
{
    $arr = array_unique(str_split($a . $b));
    sort($arr);
    return implode("", $arr);
    //     return count_chars($a.$b, 3);
}
var_dump(longest("xyaabbbccccdefww", "xxxxyyyyabklmopq"));
echo PHP_EOL;



// 3. [7-kyu], [fundametals]. Printer Errors
// https://www.codewars.com/kata/56541980fa08ab47a0000040
// На фабрике принтер печатает этикетки для коробок. Для одного вида коробок принтер должен использовать цвета, которые для простоты названы буквами от a до m.
// Цвета, используемые принтером, записываются в контрольную строку. Например, «хорошая» контрольная строка будет aaabbbbhaijjjm, что означает, что принтер использовал три раза цвет a, четыре раза цвет b, один раз цвет h, затем один раз цвет a...
// Иногда возникают проблемы: нехватка цветов, техническая неисправность и выдается «плохая» контрольная строка, например, aaaxbbbbyyhwawiwjjjwwm с буквами не от a до m.
// Вы должны написать функцию printer_error, которая при заданной строке вернет частоту ошибок принтера в виде строки, представляющей рациональное число, числитель которого — количество ошибок, а знаменатель — длина контрольной строки. Не сокращайте эту дробь до более простого выражения.
// Длина строки больше или равна единице и содержит только буквы от a до z.
// Примеры:
// s="aaabbbbhaijjjm"
// printer_error(s) => "0/14"
// s="aaaxbbbbyyhwawiwjjjwwm"
// printer_error(s) => "8/22"
// $s="aaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
// $this->assertSame("3/56", printerError($s));
// $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
// $this->assertSame("6/60", printerError($s));
// $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyzuuuuu";
// $this->assertSame("11/65", printerError($s));

function print_error($str)
{
    $control_color = range("a", "m");
    $count_error = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (!in_array($str[$i], $control_color)) {
            $count_error++;
        }
    }
    return $count_error . "/" . strlen($str);
}
var_dump(print_error("kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyzuuuuu"));
echo PHP_EOL;



// 4. [7-kyu], [fundametals]. Binary Addition
// https://www.codewars.com/kata/551f37452ff852b7bd000139/train/php
// Реализуйте функцию, которая складывает два числа и возвращает их сумму в двоичном формате. Преобразование может быть выполнено до или после сложения.
// Возвращаемое двоичное число должно быть строкой.
// Примеры: (Input1, Input2 --> Output (объяснение)))
// 1, 1 --> "10" (1 + 1 = 2 в десятичной системе или 10 в двоичной системе)
// 5, 9 --> "1110" (5 + 9 = 14 в десятичной системе или 1110 в двоичной системе)
// Для того, чтобы преобразовать число из десятичной системы счисления в двоичную, необходимо выполнить следующие действия.
// Делим десятичное число на 2 и записываем остаток от деления.
// Результат деления вновь делим на 2 и опять записываем остаток.
// Повторяем операцию до тех пор пока результат деления не будет равен нулю.
// Запишем полученные остатки в обратном порядке и получим искомое число.
// 375 / 2 = 187 (остаток 1)
// 187 / 2 = 93 (остаток 1)
// 93 / 2 = 46 (остаток 1)
// 46 / 2 = 23 (остаток 0)
// 23 / 2 = 11 (остаток 1)
// 11 / 2 = 5 (остаток 1)
// 5 / 2 = 2 (остаток 1)
// 2 / 2 = 1 (остаток 0)
// 1 / 2 = 0 (остаток 1)

function binary_addition($a, $b)
{
    if ($a === 0 and $b === 0) {
        return "0";
    } else {
        $c = $a + $b;
        $res = "";
        while ($c / 2 != 0) { // 0
            $res = ($c % 2) . $res; // 1110
            $c = floor($c / 2); // 0
        }
        return $res;
    }
    // return decbin($a + $b)
}
var_dump(binary_addition(10, 4)); // 1110
echo PHP_EOL;


// 5. [7-kyu], [fundametals]. Growth of a Population
// https://www.codewars.com/kata/563b662a59afc2b5120000c6/train/php
// В небольшом городе население p0 = 1000 в начале года. Население регулярно увеличивается на 2 процента в год, и, более того, в город приезжает 50 новых жителей в год. Сколько лет нужно городу, чтобы его население стало больше или равно p = 1200 жителей?
// В конце первого года будет:
// 1000 + 1000 * 0,02 + 50 => 1070 жителей
// В конце второго года будет:
// 1070 + 1070 * 0,02 + 50 => 1141 житель (** количество жителей — целое число **)
// В конце третьего года будет:
// 1141 + 1141 * 0,02 + 50 => 1213
// Понадобится целых 3 года.
// $this->assertSame(15, nbYear(1500, 5, 100, 5000));
// $this->assertSame(10, nbYear(1500000, 2.5, 10000, 2000000));

function nbYear($p0, $percent, $aug, $p)
{
    for ($i = 0; $p0 <= $p; $i++) {
        $p0 = $p0 + $p0 * $percent / 100 + $aug;
    }
    return $i;
}
var_dump(nbYear(1500000, 2.5, 10000, 2000000));
echo PHP_EOL;


// 6. [7-kyu], [fundametals]. Number of People in the Bus
// https://www.codewars.com/kata/5648b12ce68d9daa6b000099/train/php
// По городу движется автобус, который забирает и высаживает людей на каждой остановке.
// Вам предоставляется список (или массив) пар целых чисел. Элементы каждой пары представляют количество людей, которые заходят в автобус (первый элемент), и количество людей, которые выходят из автобуса (второй элемент) на остановке.
// Ваша задача — вернуть количество людей, которые все еще находятся в автобусе после последней остановки (после последнего массива). Несмотря на то, что это последняя остановка, автобус может быть не пустым, и некоторые люди все еще могут находиться внутри автобуса, они, вероятно, спят там :D
// Посмотрите на тестовые случаи.
// Пожалуйста, помните, что тестовые случаи гарантируют, что количество людей в автобусе всегда >= 0. Поэтому возвращаемое целое число не может быть отрицательным.
// Второе значение в первой паре в массиве равно 0, так как автобус пуст на первой остановке.
// $this->assertSame(21, number([[3,0],[9,1],[4,8],[12,2],[6,1],[7,8]]));
// $this->assertSame(5, number([[10,0],[3,5],[5,8]]));
// $this->assertSame(17, number([[3,0],[9,1],[4,10],[12,2],[6,1],[7,10]]));
// $this->assertSame(0, number([[0,0]]));

function number($bus_stops)
{
    $count_entrance = 0;
    $count_exit = 0;
    for ($i = 0; $i < count($bus_stops); $i++) {
        $count_entrance = $count_entrance + $bus_stops[$i][0];
        $count_exit = $count_exit + $bus_stops[$i][1];
    }
    return $count_entrance - $count_exit;
    // $str = json_encode($bus_stops); //  "[[10,0],[3,5],[5,8]]"
    // $res = "";
    // for ($i = 0; $i < strlen($str); $i++) {
    //     if ($str[$i] !== "[" and $str[$i] !== "]" and $str[$i] !== ",") {
    //         $res .= $str[$i];
    //     } else {
    //         $res .= " ";
    //     }
    // }
    // $arr = explode(" ", trim($res));
    // $arr_new = [];
    // for ($i = 0; $i < count($arr); $i++) {
    //     if (strlen($arr[$i]) >= 1) {
    //         $arr_new[] = $arr[$i];
    //     }
    // }
    // $count_entrance = 0;
    // $count_exit = 0;
    // for ($i = 0; $i < count($arr_new); $i++) {
    //     if ($i % 2 === 0) {
    //         $count_entrance += $arr_new[$i];
    //     } else {
    //         $count_exit += $arr_new[$i];
    //     }
    // }
    // return $count_entrance - $count_exit;
}
var_dump(number([[10, 0], [30, 5], [5, 8]]));
echo PHP_EOL;

// boolval() - приведение к типу boolean
// intval() - приведение к типу int
// strval() - приведение к типу string 







// 03.08.2024 120 мин 6 задач 7_kyu fundamentals codewars
