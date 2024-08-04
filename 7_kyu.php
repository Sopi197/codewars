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


// 5. [7-kyu], [fundametals]. Growth of a Population - тесты codewars не пропускают, они сломаны
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
    // return array_sum(array_column($bus_stops, 0)) - array_sum(array_column($bus_stops, 1));
    // return array_reduce($bus_stops, function ($peopleCount, $stop) {
    // return $peopleCount + $stop[0] - $stop[1];
    // });
}
var_dump(number([[10, 0], [30, 5], [5, 8]]));
echo PHP_EOL;

// boolval() - приведение к типу boolean
// intval() - приведение к типу int
// strval() - приведение к типу string 


// 7. [7-kyu], [fundametals]. Count the Digit
// https://www.codewars.com/kata/566fc12495810954b1000030
// Описание:
// Возьмите целое число n (n >= 0) и цифру d (0 <= d <= 9) в качестве целого числа.
// Возведите в квадрат все числа k (0 <= k <= n) между 0 и n.
// Подсчитайте количество цифр d, использованных при записи всех k**2.
// Реализуйте функцию, принимающую n и d в качестве параметров и возвращающую это количество.
// Примеры:
// n = 10, d = 1
// k*k равны 0, 1, 4, 9, 16, 25, 36, 49, 64, 81, 100
// Мы используем цифру 1 в: 1, 16, 81, 100. Тогда общее количество равно 4.
// Функция, если в качестве аргумента заданы n = 25 и d = 1, должна вернуть 11, поскольку
// k*k, содержащие цифру 1, равны:
// 1, 16, 81, 100, 121, 144, 169, 196, 361, 441.
// Таким образом, существует 11 цифр 1 для квадратов чисел от 0 до 25.
// Обратите внимание, что 121 имеет удвоенную цифру 1.
// $this->revTest(nbDig(5750, 0), 4700);
// $this->revTest(nbDig(11011, 2), 9481);
// $this->revTest(nbDig(12224, 8), 7733);

function countTheDigit($n, $d)
{
    $str = "";
    for ($i = 0; $i <= $n; $i++) {
        $str .= $i ** 2 . " ";
    }
    return substr_count($str, strval($d));
}
var_dump(countTheDigit(5750, 0));
echo PHP_EOL;



// 8. [7-kyu], [fundametals]. Sort array by string length
// https://www.codewars.com/kata/57ea5b0b75ae11d1e800006c
// Напишите функцию, которая принимает массив строк в качестве аргумента и возвращает отсортированный массив, содержащий те же строки, упорядоченные от самой короткой к самой длинной.
// Например, если этот массив был передан в качестве аргумента:
// ["Telescopes", "Glasses", "Eyes", "Monocles"]
// Ваша функция вернет следующий массив:
// ["Eyes", "Glasses", "Monocles", "Telescopes"]
// Все строки в массиве, переданном вашей функции, будут иметь разную длину, поэтому вам не придется решать, как упорядочить несколько строк одинаковой длины.
// $this->assertEquals(["I", "To", "Beg", "Life"], sortByLength(["Beg", "Life", "I", "To"]));
// $this->assertEquals(["", "Pizza", "Brains", "Moderately"], sortByLength(["", "Moderately", "Brains", "Pizza"]));
// $this->assertEquals(["Short", "Longer", "Longest"], sortByLength(["Longer", "Longest", "Short"]));

function sortByLength($toSort)
{
    $arr_lenth = [];
    for ($i = 0; $i < count($toSort); $i++) {
        $arr_lenth[] = strlen($toSort[$i]);
    }
    sort($arr_lenth); // [1, 2, 3, 4]
    $arr_res = [];
    for ($i = 0; $i < count($arr_lenth); $i++) {
        for ($k = 0; $k < count($toSort); $k++) {
            if ($arr_lenth[$i] === strlen($toSort[$k])) {
                $arr_res[] = $toSort[$k];
            }
        }
    }
    return $arr_res;
    // usort($toSort, fn($a, $b) => strlen($a) - strlen($b));
    // return $toSort;
}
var_dump(sortByLength(["Beg", "Life", "I", "To"])); // ["I", "To", "Beg", "Life"]
echo PHP_EOL;



// 9. [7-kyu], [fundametals]. Find the stray number
// https://www.codewars.com/kata/57f609022f4d534f05000024
// Описание:
// Вам дан массив целых чисел нечетной длины, в котором все они одинаковы, за исключением одного единственного числа.
// Завершите метод, который принимает такой массив и возвращает это единственное другое число.
// Входной массив всегда будет допустимым! (нечетная длина >= 3)
// Примеры
// [1, 1, 2] ==> 2
// [17, 17, 3, 17, 17, 17, 17] ==> 3
// $this->assertSame(2, stray([1, 1, 2]));
// $this->assertSame(4, stray([4, 2, 2, 2, 2]));
// $this->assertSame(5, stray([4, 4, 4, 5, 4, 4, 4]));

function stray($arr)
{
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if (isset($arr[$i + 1]) and $arr[0] !== $arr[$i + 1]) {
            $count++;
        }
        if ($count > 1) {
            return $arr[0];
        } else {
            return $arr[$i + 1];
        }
    }
}
var_dump(stray([17, 17, 17, 3, 17, 17, 17]));

// https://www.codewars.com/kata/555eded1ad94b00403000071
// https://www.codewars.com/kata/5949481f86420f59480000e7
// https://www.codewars.com/kata/55908aad6620c066bc00002a




// 03.08.2024 120 мин 6 задач 7_kyu fundamentals codewars
