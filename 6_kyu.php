<?php


echo "\n\n========================================= 6-[kyu] ========================================= \n\n";
// https://www.codewars.com/kata/search/php?q=&r%5B%5D=-6&beta=false&order_by=popularity%20desc

// Задачи на регулярные выражения
// https://www.codewars.com/kata/5277c8a221e209d3f6000b56
// https://www.codewars.com/kata/583203e6eb35d7980400002a

// Интересные и непростые задачи, которые пока что не решил (#не решена)
// https://www.codewars.com/kata/59df2f8f08c6cec835000012  
// https://www.codewars.com/kata/568fca718404ad457c000033
// 


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


// 13. [6-kyu], [string] Duplicate Encoder
// https://www.codewars.com/kata/54b42f9314d9229fd6000d9c
// Цель этого упражнения — преобразовать строку в новую строку, где каждый символ в новой строке — это "(", если этот символ встречается в исходной строке только один раз, или ")", если этот символ встречается в исходной строке более одного раза. Игнорируйте регистр букв при определении того, является ли символ дубликатом.
// Примеры
// "din" => "((("
// "recede" => "()()()"
// "Success" => ")())())"
// "(( @" => "))(("
// Сообщения об утверждениях могут быть неясны относительно того, что они отображают в некоторых языках. Если вы видите "...It Should encode XXX", "XXX" — это ожидаемый результат, а не входные данные!
// $this->assertSame('(((', duplicate_encode('din'));
// $this->assertSame('()()()', duplicate_encode('recede'));
// $this->assertSame(')())())', duplicate_encode('Success'), 'should ignore case');
// $this->assertSame('))))))', duplicate_encode('iiiiii'), 'duplicate-only-string');
// $this->assertSame(')))))(', duplicate_encode(' ( ( )'));

function duplicateEncoder($word)
{
    $res = "";
    $word = strtolower($word);
    for ($i = 0; $i < strlen($word); $i++) {
        if (substr_count($word, $word[$i]) === 1) {
            $res .= "(";
        } else {
            $res .= ")";
        }
    }
    return $res;
}
var_dump(duplicateEncoder("(( @"));
echo PHP_EOL;



// 14. [6-kyu], [arrays] Replace With Alphabet Position
// https://www.codewars.com/kata/546f922b54af40e1e90001da
// В этом ката вам необходимо, имея строку, заменить каждую букву ее позицией в алфавите.
// Если что-то в тексте не является буквой, проигнорируйте это и не возвращайте.
// "a" = 1, "b" = 2, etc.
// Example
// Input = "The sunset sets at twelve o' clock."
// Output = "20 8 5 19 21 14 19 5 20 19 5 20 19 1 20 20 23 5 12 22 5 15 3 12 15 3 11"

function alphabet_position($s)
{
    $alphabet = range("a", "z");
    $res = "";
    $s = strtolower($s);
    for ($i = 0; $i < strlen($s); $i++) {
        if (in_array($s[$i], $alphabet)) {
            $res .= array_search($s[$i], $alphabet) + 1 . " ";
        }
    }
    return trim($res);
}
var_dump(alphabet_position("The sunset sets at twelve o' clock."));
echo PHP_EOL;



// 15. [6-kyu], [fundamentals] Does my number look big in this?
// https://www.codewars.com/kata/5287e858c6b5a9678200083c
// Нарциссическое число (или число Армстронга) — это положительное число, которое является суммой своих собственных цифр, каждая из которых возведена в степень количества цифр в данной базе. В этой Кате мы ограничимся десятичной дробью (основанием 10).
// Например, возьмем 153 (3 цифры), что является нарциссическим:
// 1^3 + 5^3 + 3^3 = 1 + 125 + 27 = 153
// и 1652 (4 цифры), что не является:
// 1^4 + 6^4 + 5^4 + 2^4 = 1 + 1296 + 625 + 16 = 1938
// Задача:
// Ваш код должен возвращать true или false (не «true» и «false») в зависимости от того, является ли заданное число нарциссическим числом в десятичной системе счисления.
// Это может быть True и False в вашем языке, например PHP.
// Проверка ошибок на наличие текстовых строк или других недопустимых входных данных не требуется, в функцию будут переданы только допустимые положительные ненулевые целые числа.

function narcis_number($n)
{
    $res = 0;
    $str = strval($n);
    for ($i = 0; $i < strlen($str); $i++) {
        $res += $str[$i] ** strlen($str);
    }
    return $res === $n;

}
var_dump(narcis_number(1938));
echo PHP_EOL;



// 16. [6-kyu], [arrays] Unique In Order - решение работает, но тесты в codewars не проходит
// https://www.codewars.com/kata/54e6533c92449cc251001667
// Реализуйте функцию unique_in_order, которая принимает в качестве аргумента последовательность и возвращает список элементов без элементов с одинаковым значением рядом друг с другом и сохраняет исходный порядок элементов.
// Например:
// uniqueInOrder("AAAABBBCCDAABBB") == {'A', 'B', 'C', 'D', 'A', 'B'}
// uniqueInOrder("ABBCcAD") == {'A', 'B', 'C', 'c', 'A', 'D'}
// uniqueInOrder([1,2,2,3,3]) == {1,2,3}

function uniqueInOrder($list)
{
    if (is_string($list)) {
        $res = [];
        for ($i = 0; $i < strlen($list); $i++) {
            if (!empty($list[$i + 1]) and $list[$i] !== $list[$i + 1]) {
                $res[] = $list[$i];
            }
        }
        if ($res[count($res) - 1] !== $list[strlen($list) - 1]) {
            $res[] = $list[strlen($list) - 1];
        }
    } else if (is_array($list)) {
        $res = [];
        for ($i = 0; $i < count($list); $i++) {
            if (!empty($list[$i + 1]) and $list[$i] !== $list[$i + 1]) {
                $res[] = $list[$i];
            }
        }
        if ($res[count($res) - 1] !== $list[count($list) - 1]) {
            $res[] = $list[count($list) - 1];
        }
    }
    return $res;
}
var_dump(uniqueInOrder("ABBCcAD"));
echo PHP_EOL;



// 17. [6-kyu], [strings] Detect Pangram
// https://www.codewars.com/kata/545cedaa9943f7fe7b000048
// Панграмма — это предложение, которое содержит каждую букву алфавита хотя бы один раз. Например, предложение "The quick brown fox jumps over the lazy dog" является панграммой, потому что в нем хотя бы один раз используются буквы A-Z (регистр не имеет значения).
// Дана строка, определите, является ли она панграммой. Верните True, если это так, и False, если нет. Игнорируйте цифры и знаки препинания.
# Pangrams:
// $result4 = detect_pangram("The quick brown fox jumps over the lazy dog.");
// $this->assertSame(true, $result4);
// $result5 = detect_pangram("1L%r+f4G!e7w V z q6M h4d F3b+t O2n e K^g+c#S^i4i X7c-u P5d7j Y6a(a B");
// $this->assertSame(true, $result5);
// # Not pangrams:
// $result1 = detect_pangram("A pangram is a sentence that contains every single letter of the alphabet at least once.");
// $this->assertSame(false, $result1 );
// $result2 = detect_pangram("5B!e i J x*p F h d!A:o q D y n6L%u9i.G9f2g4C a h+K!m+z:R t!j:B w s C");
// $this->assertSame(false, $result2);

function is_pangrams($str)
{
    $alphabet = range("a", "z");
    $str = strtolower($str);
    $res = [];
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $alphabet)) {
            $res[] = $str[$i];
        }
    }
    sort($res);
    return array_values(array_unique($res)) === $alphabet; // после array_unique, ключи в разброс, поэтому сбрасываем ключи array_values
    // $abc = range('a', 'z');
    // foreach ($abc as $s) {
    //     if (strpos(strtolower($string), $s) === false) { // если элемента нет в алфавите, то сразу false, так проверим все элементы, если false не вернётся, то true;
    //         return false;
    //     }
    // }
    // return true;
}
var_dump(is_pangrams("The quick brown fox jumps over the lazy dog."));
echo PHP_EOL;



// 18. [6-kyu], [algoritm] Tribonacci Sequence
// https://www.codewars.com/kata/556deca17c58da83c00002db/train/php
// Хорошо знаком с большим братом Фибоначчи, он же Трибоначчи.
// Как уже видно из названия, он работает по сути как Фибоначчи, но суммирует последние 3 (а не 2) числа последовательности для генерации следующего. 
// Итак, если мы начнем нашу последовательность Трибоначчи с [1, 1, 1] в качестве начального ввода (т. е. сигнатуры), то получим следующую последовательность:
// [1, 1 ,1, 3, 5, 9, 17, 31, ...]
// Но что, если мы начнем с [0, 0, 1] в качестве сигнатуры? Поскольку начало с [0, 1] вместо [1, 1] по сути сдвигает обычную последовательность Фибоначчи на одну позицию, вы можете подумать, что получите ту же последовательность, сдвинутую на 2 позиции, но это не так, и мы получим:
// [0, 0, 1, 1, 2, 4, 7, 13, 24, ...]
// Ну, вы, возможно, уже догадались, но для ясности: вам нужно создать функцию Фибоначчи что, учитывая массив/список сигнатуры, возвращает первые n элементов - сигнатура включена в последовательность с таким затравкой.
// Сигнатура всегда будет содержать 3 числа; n всегда будет неотрицательным числом; если n == 0, то вернет пустой массив (за исключением C, где возвращается NULL) и будет готов ко всему остальному, что явно не указано ;)
// [Личная благодарность профессору Джиму Фаулеру на Coursera за его потрясающие занятия, которые я действительно рекомендую всем любителям математики, и за то, что он показал мне это математическое любопытство с его обычной заразительной страстью :)]
// $this->assertSame([1,1,1,3,5,9,17,31,57,105], tribonacci([1,1,1],10));
// $this->assertSame([0,0,1,1,2,4,7,13,24,44], tribonacci([0,0,1],10));
// $this->assertSame([0,1,1,2,4,7,13,24,44,81], tribonacci([0,1,1],10));
// $this->assertSame([1,0,0,1,1,2,4,7,13,24], tribonacci([1,0,0],10));
// $this->assertSame([0,0,0,0,0,0,0,0,0,0], tribonacci([0,0,0],10));
// $this->assertSame([1,2,3,6,11,20,37,68,125,230], tribonacci([1,2,3],10));
// $this->assertSame([3,2,1,6,9,16,31,56,103,190], tribonacci([3,2,1],10));
// $this->assertSame([1], tribonacci([1,1,1],1));
// $this->assertSame([], tribonacci([300,200,100],0));

function tribonacci_sequence($signature, $n)
{
    // if ($n < 3) {
    //     $arr = array_slice($arr, 0, $n);
    // }
    // for ($i = 0; $i < $n - 3; $i++) {
    //     $arr[] = array_sum(array_slice($arr, $i, 3));
    // }
    // return $arr;
    for ($i = $n - 3; $i > 0; $i--) {
        $signature[] = array_sum(array_slice($signature, -3));
    }
    return array_slice($signature, 0);
}
var_dump(tribonacci_sequence([1, 1, 1], 10)); // [1,1,1,3,5,9,17,31,57,105]
echo PHP_EOL;



// 19. [6-kyu], [algoritm] Equal Sides Of An Array
// https://www.codewars.com/kata/5679aa472b8f57fb8c000047
// Вам будет дан массив целых чисел. Ваша задача — взять этот массив и найти индекс N, где сумма целых чисел слева от N будет равна сумме целых чисел справа от N.
// Если индекса, который бы это сделал, нет, верните -1.
// Допустим, вам дан массив {1,2,3,4,3,2,1}:
// Ваша функция вернет индекс 3, потому что на 3-й позиции массива сумма левой стороны индекса ({1,2,3}) и сумма правой стороны индекса ({3,2,1}) обе равны 6.
// Давайте рассмотрим еще один пример.
// Вам дан массив {1,100,50,-51,1,1}:
// Ваша функция вернет индекс 1, потому что в 1-й позиции массива сумма левой стороны индекса ({1}) и сумма правой стороны индекса ({50,-51,1,1}) обе равны 1.
// Последний:
// Вам дан массив {20,10,-80,10,10,15,35}
// В индексе 0 левая сторона равна {}
// Правая сторона равна {10,-80,10,10,15,35}
// Они обе равны 0 при сложении. (Пустые массивы равны 0 в этой задаче)
// Индекс 0 — это место, где левая и правая стороны равны.
// Примечание: Помните, что в большинстве языков индекс массива начинается с 0.
// Входные данные
// Целочисленный массив длиной 0 < arr < 1000. Числа в массиве могут быть любыми целыми положительными или отрицательными.
// Выходные данные
// Наименьший индекс N, где сторона слева от N равна стороне справа от N. Если вы не найдете индекс, соответствующий этим правилам, то вы вернете -1.
// Если вам дан массив с несколькими ответами, верните наименьший правильный индекс.
// $this->assertSame(3,find_even_index(array(1,2,3,4,3,2,1)));
// $this->assertSame(1,find_even_index([1,100,50,-51,1,1]));
// $this->assertSame(-1,find_even_index([1,2,3,4,5,6]));
// $this->assertSame(3,find_even_index([20,10,30,10,10,15,35]));
// $this->assertSame(0,find_even_index([20,10,-80,10,10,15,35]));
// $this->assertSame(6,find_even_index([10,-80,10,10,15,35,20]));
// $this->assertSame(-1,find_even_index(range(1,100)));
// $this->assertSame(0,find_even_index([0,0,0,0,0]),"Should pick the first index if more cases are valid");
// $this->assertSame(3,find_even_index([-1,-2,-3,-4,-3,-2,-1]));
// $this->assertSame(-1,find_even_index(range(-100,-1)));

function find_even_index($arr)
{
    $count = count($arr); // один раз считаем длину и каждый раз в цикле не считаем её, поэтому код быстрее
    for ($i = 0; $i < $count; $i++) {
        if (array_sum(array_slice($arr, 0, $i)) === array_sum(array_slice($arr, $i + 1))) {
            return $i;
        }
    }
    return -1;
    // foreach ($arr as $i => $n) {
    //     if (array_sum(array_slice($arr, 0, $i)) == array_sum(array_slice($arr, $i + 1))) {
    //         return $i;
    //     }
    // }
    // return -1;
}
var_dump(find_even_index([-1, -2, -3, -4, -3, -2, -1]));
echo PHP_EOL;



// 20. [6-kyu], [strings] Split Strings
// https://www.codewars.com/kata/515de9ae9dcfc28eb6000001
// Завершите решение так, чтобы оно разделило строку на пары по два символа. Если строка содержит нечетное количество символов, то она должна заменить отсутствующий второй символ последней пары на подчеркивание ('_').
// Примеры:
// * 'abc' => ['ab', 'c_']
// * 'abcdef' => ['ab', 'cd', 'ef']
// $this->assertSame(["ab", "cd", "ef"], solution("abcdef"));
// $this->assertSame(["ab", "cd", "ef", "g_"], solution("abcdefg"));
// $this->assertSame([], solution(""));

function split_string($str)
{
    if (strlen($str) % 2) {
        $str = $str . "_";
    }
    return ($str ? str_split($str, 2) : []);
    // if (empty($str)) {
    //     return [];
    // }
    // $arr = str_split($str, 2);
    // if (strlen($arr[count($arr) - 1]) < 2) {
    //     $arr[count($arr) - 1] .= "_";
    // }
    // return $arr;

}
var_dump(split_string("a"));
echo PHP_EOL;


// 21. [6-kyu], [strings] Find the unique number
// https://www.codewars.com/kata/585d7d5adb20cf33cb000235
// Есть массив с некоторыми числами. Все числа равны, кроме одного. Попробуйте найти его!
// findUniq([ 1, 1, 1, 2, 1, 1 ]) === 2
// findUniq([ 0, 0, 0.55, 0, 0 ]) === 0.55
// Гарантируется, что массив содержит не менее 3 чисел.
// Тесты содержат очень большие массивы, поэтому подумайте о производительности.
// $this->assertSame(2, find_uniq([1, 1, 1, 2, 1, 1]));
// $this->assertSame(0.55, find_uniq([0, 0, 0.55, 0, 0]));
// $this->assertSame(1, find_uniq([0, 1, 0]));

function find_uniq($a)
{
    sort($a);
    if ($a[0] === $a[1]) {
        return end($a); // $a[count($a) - 1]
    }
    return current($a); // $a[0]
}
var_dump(find_uniq([0, 0, 0, 2, 0]));
echo PHP_EOL;



// 22. [6-kyu], [arrays] Sort the odd
// https://www.codewars.com/kata/578aa45ee9fd15ff4600090d/train/php
// Вам будет дан массив чисел. Вам нужно отсортировать нечетные числа в порядке возрастания, оставив четные числа на исходных позициях.
// Примеры
// [7, 1] => [1, 7]
// [5, 8, 6, 3, 4] => [3, 8, 6, 5, 4]
// [9, 8, 7, 6, 5, 4, 3, 2, 1, 0] => [1, 8, 3, 6, 5, 4, 7, 2, 9, 0]
// $this->assertSame([1, 3, 2, 8, 5, 4], sortArray([5, 3, 2, 8, 1, 4]));
// $this->assertSame([1, 3, 5, 8, 0], sortArray([5, 3, 1, 8, 0]));
// $this->assertSame([], sortArray([]));

function sortArray($arr)
{
    // // [5, 8, 6, 3, 4]
    // $odds = array_filter($arr, function ($n) {
    //     return $n % 2 != 0; // [0 => 5, 3 => 3]
    // });
    // sort($odds); // [0 => 3, 1 => 5]
    // return array_map(function ($n) use (&$odds) {
    //     if ($n % 2 == 0)
    //         return $n; // [8, 6, 4]
    //     return array_shift($odds); // удаление элементов из начала массива
    // }, $arr); // [3, 8, 6, 5, 4]

    $vals = array_filter($arr, fn($v) => $v % 2 != 0); // [0 => 5, 3 => 3]
    $keys = array_keys($vals); // [0 => 0, 1 => 3] // array_keys создаёт массив из ключей
    sort($vals); // [0 => 3, 1 => 5]
    return array_replace($arr, array_combine($keys, $vals)); // [3, 8, 6, 5, 4] <= [5, 8, 6, 3, 4]
    // array_replace - слияние массивов с заменой элементов с одинаковыми индексами, 

    // $odd = [];
    // for ($i = 0; $i < count($arr); $i++) {
    //     if ($arr[$i] % 2 !== 0) {
    //         $odd[] = $arr[$i];
    //     }
    // }
    // sort($odd);
    // for ($i = 0; $i < count($arr); $i++) {
    //     if ($arr[$i] % 2 === 0) {
    //         $arr[$i] = $arr[$i];
    //     } else {
    //         $arr[$i] = array_shift($odd);
    //     }
    // }
    // return $arr;

    // $odd = [];
    // $keys = [];
    // for ($i = 0; $i < count($arr); $i++) {
    //     if ($arr[$i] % 2 !== 0) {
    //         $odd[] = $arr[$i]; // [5, 3]
    //         $arr[$i] = "_"; // [_, 8, 6, _, 4]
    //         $keys[] = $i; // [0, 3]
    //     }
    // }
    // sort($odd); // [0 => 3, 1 => 5]
    // $res = [];
    // for ($i = 0; $i < count($odd); $i++) {
    //     $res[$keys[$i]] = $odd[$i]; // [0 => 3, 3 => 5]
    // }
    // for ($i = 0; $i < count($arr); $i++) {
    //     if ($arr[$i] === "_") {
    //         $arr[$i] = $res[$i]; // [3, 8, 6, 5, 4]
    //     }
    // }
    // return $arr;
}
var_dump(sortArray([5, 8, 6, 3, 4])); // [3, 8, 6, 5, 4]
echo PHP_EOL;



// 23. [6-kyu] Find the missing letter
// https://www.codewars.com/kata/5839edaa6754d6fec10000a2
// Найдите пропущенную букву
// Напишите метод, который принимает массив последовательных (возрастающих) букв в качестве входных данных и возвращает пропущенную букву в массиве.
// Вы всегда получите допустимый массив. И в нем всегда будет не хватать ровно одной буквы. Длина массива всегда будет не менее 2.
// Массив всегда будет содержать буквы только в одном регистре.
// Пример:
// ['a','b','c','d','f'] -> 'e'
// ['O','Q','R','S'] -> 'P'
// (Используйте английский алфавит с 26 буквами!)

function find_missing_letter($array)
{
    $alphabet = range($array[0], $array[count($array) - 1]);
    return array_values(array_diff($alphabet, $array))[0];
    // $alphabet = range("a", "z");
    // $save_upper_array = $array; // сохраняем массив в верхнем регистре, чтобы потом сравнить
    // $array = str_split(strtolower(implode($array))); // массив в нижнем регистре
    // for ($i = 0; $i < count($alphabet); $i++) {
    // if ($alphabet[$i] === $array[0]) {
    // $alphabet_slice = array_slice($alphabet, $i, count($array));
    // }
    // }
    // if ($save_upper_array[0] !== strtolower($save_upper_array[0])) {
    // return strtoupper(implode(array_diff($alphabet_slice, $array)));
    // }
    // return implode(array_diff($alphabet_slice, $array));
}
var_dump(find_missing_letter(['a', 'b', 'c', 'd', 'f']));
var_dump(find_missing_letter(['O', 'Q', 'R', 'S']));
echo PHP_EOL;



// 24. [6-kyu] Build Tower
// https://www.codewars.com/kata/576757b1df89ecf5bd00073b
// Постройте пирамидальную башню как массив/список строк, учитывая положительное целое число этажей. Блок башни представлен символом "*".
// Например, башня с 3 этажами выглядит так:
// [
//   "  *  ",
//   " *** ", 
//   "*****"
// ]
// башня с 6 этажами выглядит так:
// [
//   "     *     ", 
//   "    ***    ", 
//   "   *****   ", 
//   "  *******  ", 
//   " ********* ", 
//   "***********"
// ]

function tower_builder($n)
{
    $tower = [];
    $count = 1;
    for ($i = 1; $i <= $n; $i++) {
        $tower[] = str_repeat(" ", $n - $i) . str_repeat("*", $count) . str_repeat(" ", $n - $i);
        $count = $count + 2;
    }
    return $tower;
}
var_dump(tower_builder(6));
echo PHP_EOL;



// 25. [6-kyu] Highest Scoring Word
// https://www.codewars.com/kata/57eb8fcdf670e99d9b000272
// Учитывая строку слов, вам нужно найти слово с наивысшим баллом.
// Каждая буква слова оценивается в соответствии с ее положением в алфавите: a = 1, b = 2, c = 3 и т. д.
// Например, баллы слова abad составляют 8 (1 + 2 + 1 + 4).
// Вам нужно вернуть слово с наивысшим баллом в виде строки.
// Если два слова имеют одинаковый балл, вернуть слово, которое появляется раньше в исходной строке.
// Все буквы будут строчными, и все входные данные будут действительными.
// $this->assertSame('aa', high('aa b'));
// $this->assertSame('b', high('b aa'));
// $this->assertSame('bb', high('bb d'));
// $this->assertSame('d', high('d bb'));
// $this->assertSame('taxi', high('man i need a taxi up to ubud'));
// $this->assertSame('volcano', high('what time are we climbing up the volcano'));
// $this->assertSame('semynak', high('take me to semynak'));

function high($x)
{
    $alphabet = range("a", "z");
    $points_x = [];
    $res = 0;
    $arr_words = explode(" ", $x);
    for ($i = 0; $i < count($arr_words); $i++) {
        for ($k = 0; $k < strlen($arr_words[$i]); $k++) {
            if (in_array($arr_words[$i][$k], $alphabet)) {
                $res += array_search($arr_words[$i][$k], $alphabet) + 1;
            }
        }
        $points_x[] = $res;
        $res = 0;
    }
    $max = max($points_x);
    $flag_same = substr_count(implode(" ", $points_x), $max);
    asort($points_x);
    $keys = array_keys($points_x);
    if ($flag_same === 1) {
        return $arr_words[$keys[count($keys) - 1]];
    } else {
        return $arr_words[$keys[count($keys) - 2]];
    }
}
var_dump(high("a aa b a")); // [1, 2, 2, 1]#
echo PHP_EOL;



// 26. [6-kyu] Count the smiley faces! - решил, но тесты не проходит
// https://www.codewars.com/kata/583203e6eb35d7980400002a
// Завершите функцию countSmileys, которая должна возвращать общее количество улыбающихся лиц.
// Правила для улыбающегося лица:
// Каждый смайлик должен содержать допустимую пару глаз. Глаза могут быть помечены как : или ;
// Смайлик может иметь нос, но не обязательно. Допустимые символы для носа: - или ~
// Каждое улыбающееся лицо должно иметь улыбающийся рот, который должен быть помечен как ) или D
// Никакие дополнительные символы, кроме упомянутых, не допускаются.
// Допустимые примеры смайликов: :) :D ;-D :~)
// Недопустимые смайлики: ;( :> :} :]
// Пример
// countSmileys([':)', ';(', ';}', ':-D']); // должно возвращать 2;
// countSmileys([';D', ':-(', ':-)', ';~)']); // должно вернуть 3;
// countSmileys([';]', ':[', ';*', ':$', ';-D']); // должно вернуть 1;
// Примечание
// В случае пустого массива верните 0. Вы не будете проходить тестирование с недопустимыми входными данными (входные данные всегда будут массивом). Порядок элементов лица (глаза, нос, рот) всегда будет одинаковым.
// $this->assertSame(0, count_smileys([]));
// $this->assertSame(4, count_smileys([':D',':~)',';~D',':)']));
// $this->assertSame(2, count_smileys([':)',':(',':D',':O',':;']));
// $this->assertSame(1, count_smileys([';]', ':[', ';*', ':$', ';-D']));

function count_smileys($arr)
{
    // :) :D ;-D :~)
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if (str_contains($arr[$i], ":)") or str_contains($arr[$i], ":D") or str_contains($arr[$i], ";-D") or str_contains($arr[$i], ":~)") or str_contains($arr[$i], ":-D") or str_contains($arr[$i], ";~D") or str_contains($arr[$i], ";D") or str_contains($arr[$i], ";~)")) {
            $count++;
        }
    }
    // :D,:D,;D,;D,;-(,:D,:-D,;-(,;o(,:o(,:(,;oD,;oD,:(,;o(
    return $count;
}
var_dump(count_smileys([':D', ':~)', ';~D', ':)']));
echo PHP_EOL;



// 27. [6-kyu] Valid Braces
// https://www.codewars.com/kata/5277c8a221e209d3f6000b56
// Напишите функцию, которая принимает строку фигурных скобок и определяет, является ли порядок фигурных скобок допустимым. Она должна возвращать true, если строка допустима, и false, если она недопустима.
// Все входные строки будут непустыми и будут состоять только из скобок, квадратных скобок и фигурных скобок: ()[]{}.
// Что считается допустимым?
// Строка фигурных скобок считается допустимой, если все фигурные скобки сопоставлены с правильной фигурной скобкой.
// Примеры
// "(){}[]" => True
// "([{}])" => True
// "(}" => False
// "[(])" => False
// "[({})](]" => False
// $this->assertSame(true, validBraces("()"));
// $this->assertSame(false, validBraces("[({}])"));
// assert_valid( "()" )
// assert_invalid( "(}" )
// assert_valid( "[]" )
// assert_invalid("[(])")
// assert_valid( "{}" )
// assert_valid( "{}()[]" )
// assert_valid( "([{}])" )
// assert_invalid( "([}{])" )
// assert_valid( "{}({})[]" )
// assert_valid( "(({{[[]]}}))" )
// assert_invalid( "(((({{" )
// assert_invalid( ")(}{][" )
// assert_invalid( "())({}}{()][][")

function valid_braces($braces)
{
    // $arr_braces = ["[" => "]", "(" => ")", "{" => "}"];
    // $i = 0;
    // while (strlen($braces) >= 2) {
    //     if (isset($braces[$i]) and in_array($braces[$i], $arr_braces)) {
    //         if ($braces[$i - 1] === array_search($braces[$i], $arr_braces)) {
    //             $arr = str_split($braces);
    //             unset($arr[$i], $arr[$i - 1]);
    //             $braces = implode($arr);
    //             $i = 0;
    //         } else {
    //             return false;
    //         }
    //     }
    //     $i++;
    //     if (strlen($braces) === 2) {
    //         if ($braces[$i - 1] !== array_search($braces[$i], $arr_braces)) {
    //             return false;
    //         }
    //     }
    // }
    // if (strlen($braces) < 1) {
    //     return true;
    // }
    // return false;
    // do {
    //     $braces = str_replace(['()', '[]', '{}'], '', $braces, $count);
    // } while ($count);
    // return empty($braces);
    $count = 1;
    while ($count) {
        $braces = str_replace(["()", "[]", "{}"], '', $braces, $count); // $count - количество замен
    }
    return $braces === "";
}
var_dump(valid_braces("[({})](]")); // (]
// var_dump(valid_braces("[({})][]")); // ][
// var_dump(valid_braces("[()])")); // [])
// var_dump(valid_braces("(({{[[]]}}))")); // (]
echo PHP_EOL;



// 28. [6-kyu] Write Number in Expanded Form
// https://www.codewars.com/kata/5842df8ccbd22792a4000245
// Напишите число в развернутой форме
// Вам будет дано число, и вам нужно будет вернуть его как строку в развернутой форме. Например:
// expanded_form(12); // Должно вернуть "10 + 2"
// expanded_form(42); // Должно вернуть "40 + 2"
// expanded_form(70304); // Должно вернуть "70000 + 300 + 4"

function expanded_form($n)
{
    $count = strlen($n) - 1;
    $res = "";
    $n = strval($n);
    for ($i = 0; $i < strlen($n); $i++) {
        if ($n[$i] !== "0") {
            $res .= $n[$i] . str_repeat("0", $count) . " + ";
            $count--;
        } else {
            $count--;
        }
    }
    return substr($res, 0, -3);
}
var_dump(expanded_form(7030470304));
echo PHP_EOL;



// 29. [6-kyu] Is a number prime?
// https://www.codewars.com/kata/5262119038c0985a5b00029f
// Определите функцию, которая принимает целочисленный аргумент и возвращает логическое значение true или false в зависимости от того, является ли целое число простым.
// Согласно Википедии, простое число (или простое число) — это натуральное число больше 1, которое не имеет положительных делителей, кроме 1 и самого себя.
// Требования
// Вы можете предположить, что вам будет дан целочисленный вход.
// Вы не можете предположить, что целое число будет только положительным. Вам могут быть даны также отрицательные числа (или 0).
// ПРИМЕЧАНИЕ о производительности: не требуется никаких сложных оптимизаций, но все равно самые тривиальные решения могут выйти из строя. Числа доходят до 2^31 (или подобных, в зависимости от языка). Цикл вплоть до n или n/2 будет слишком медленным.
// Пример
// is_prime(1) /* false */
// is_prime(2) /* true */
// is_prime(-1) /* false */
// $this->assert False(is_prime(0));
// $this->assert False(is_prime(1));
// $this->assert True(is_prime(2));
// $this->assert True(is_prime(5), 'Your function should work for the example provided in the Kata Description');

function is_prime($n)
{
    if ($n <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) { // нет смысла перебирать числа больше корня из числа, которое мы проверяем
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}
var_dump(is_prime(13));
echo PHP_EOL;


// 30. [6-kyu] Consecutive strings
// https://www.codewars.com/kata/56a5d994ac971f1ac500003e
// Вам дан массив(список) strarr строк и целое число k. Ваша задача — вернуть первую самую длинную строку, состоящую из k последовательных строк, взятых в массиве.
// Примеры:
// strarr = ["tree", "foling", "trashy", "blue", "abcdef", "uvwxyz"], k = 2
// Объединяем последовательные строки strarr по 2, получаем:
// treefoling (длина 10) объединение strarr[0] и strarr[1]
// folingtrashy (" 12) объединение strarr[1] и strarr[2]
// trashyblue (" 10) объединение strarr[2] и strarr[3]
// blueabcdef (" 10) объединение strarr[3] и strarr[4]
// abcdefuvwxyz (" 12) объединение strarr[4] и strarr[5]
// Две строки самые длинные: "folingtrashy" и "abcdefuvwxyz".
// Первое, что пришло, это "folingtrashy", поэтому
// longest_consec(strarr, 2) должен вернуть "folingtrashy".
// Таким же образом:
// longest_consec(["zone", "abigail", "theta", "form", "libe", "zas", "theta", "abigail"], 2) --> "abigailtheta"
// n — длина массива строк, если n = 0 или k > n или k <= 0, вернуть "" 
// $this->revTest(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2), "abigailtheta");
// $this->revTest(longestConsec(["ejjjjmmtthh", "zxxuueeg", "aanlljrrrxx", "dqqqaaabbb", "oocccffuucccjjjkkkjyyyeehh"], 1), "oocccffuucccjjjkkkjyyyeehh");
// $this->revTest(longestConsec([], 3), "");

function longestConsec($str_arr, $k)
{
    $longest = ''; // "zoneabigail"
    if ($k > 0) {
        for ($i = 0; $i < count($str_arr) - $k + 1; $i++) {
            $consecutive = implode('', array_slice($str_arr, $i, $k)); // "zoneabigail"
            $longest = strlen($consecutive) > strlen($longest) ? $consecutive : $longest;
        }
    }
    return $longest;
}
var_dump(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2)); // "abigailtheta"
// var_dump(longestConsec([], 3));
echo PHP_EOL;



// 31. [6-kyu] Are they the "same"?
// https://www.codewars.com/kata/550498447451fbbd7600041c
// Дано два массива a и b. Напишите функцию comp(a, b) (orcompSame(a, b)), которая проверяет, содержат ли два массива «одинаковые» элементы с одинаковой кратностью (кратность элемента — это количество раз, когда он встречается). «Одинаковый» здесь означает, что элементы в b являются элементами в квадрате a, независимо от порядка.
// Примеры
// Допустимые массивы
// a = [121, 144, 19, 161, 19, 144, 19, 11]
// b = [121, 14641, 20736, 361, 25921, 361, 20736, 361]
// comp(a, b) возвращает true, потому что в b 121 — это квадрат 11, 14641 — это квадрат 121, 20736 — квадрат 144, 361 — квадрат 19, 25921 — квадрат 161 и т. д. Это становится очевидным, если мы запишем элементы b в виде квадратов:
// a = [121, 144, 19, 161, 19, 144, 19, 11]
// b = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19]
// Недопустимые массивы
// Если, например, мы изменим первое число на что-то другое, comp больше не будет возвращать true:
// a = [121, 144, 19, 161, 19, 144, 19, 11]
// b = [132, 14641, 20736, 361, 25921, 361, 20736, 361]
// comp(a,b) возвращает false, потому что в b 132 не является квадратом какого-либо числа a.
// a = [121, 144, 19, 161, 19, 144, 19, 11]
// b = [121, 14641, 20736, 36100, 25921, 361, 20736, 361]
// comp(a,b) возвращает false, потому что в b 36100 не является квадратом какого-либо числа a.
// Замечания
// a или b могут быть [] или {} (все языки, кроме R, Shell).
// $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
// $a2 = [11 * 11, 121 * 121, 144 * 144, 19 * 19, 161 * 161, 19 * 19, 144 * 144, 19 * 19];
// $this->revTest(comp($a1, $a2), true);
// $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
// $a2 = [11 * 21, 121 * 121, 144 * 144, 19 * 19, 161 * 161, 19 * 19, 144 * 144, 19 * 19];
// $this->revTest(comp($a1, $a2), false);

function comp($arr_1, $arr_2)
{
    if (is_null($arr_1) || is_null($arr_2)) {
        return false;
    }
    $res = array_map(function ($item) {
        return $item ** 2;
    }, $arr_1);
    sort($res);
    sort($arr_2);
    return $res === $arr_2;
}
var_dump(comp([121, 144, 19, 161, 19, 144, 19, 11], [11 * 11, 121 * 121, 144 * 144, 19 * 19, 161 * 161, 19 * 19, 144 * 144, 19 * 19]));
echo PHP_EOL;



// 32. [6-kyu] Mexican Wave
// https://www.codewars.com/kata/58f5c63f1e26ecda7e000029
// В этой простой Кате ваша задача — создать функцию, которая превращает строку в мексиканскую волну. Вам будет передана строка, и вы должны вернуть эту строку в массиве, где заглавная буква — это стоящий человек.
// Правила
// 1. Входная строка всегда будет в нижнем регистре, но может быть пустой.
// 2. Если символ в строке — пробел, то передайте его, как если бы это было пустое место
// Пример
// wave("hello") => {"Hello", "hEllo", "heLlo", "helLo", "hellO"}
// $this->assertSame(["Hello", "hEllo", "heLlo", "helLo", "hellO"], wave("hello"));
// $this->assertSame(["Codewars", "cOdewars", "coDewars", "codEwars", "codeWars", "codewArs", "codewaRs", "codewarS"], wave("codewars"));
// $this->assertSame([], wave(""));
// $this->assertSame(["Two words", "tWo words", "twO words", "two Words", "two wOrds", "two woRds", "two worDs", "two wordS"], wave("two words"));
// $this->assertSame([" Gap ", " gAp ", " gaP "], wave(" gap "));

function mexican_wave($people)
{
    $arr = [];
    for ($i = 0; $i < strlen($people); $i++) {
        if ($people[$i] != " ") {
            $arr[] = substr($people, 0, $i) . strtoupper($people[$i]) . substr($people, $i + 1);
            // $arr[] = str_replace($people[$i], strtoupper($people[$i]), $people);
            // $result[] = substr_replace($people, strtoupper($people[$i]), $i, 1);
        }
    }
    return $arr;

}
var_dump(mexican_wave("two words"));
echo PHP_EOL;



// 33. [6-kyu] Roman Numerals Encoder
// https://www.codewars.com/kata/51b62bf6a9c58071c600001b
// Создайте функцию, принимающую положительное целое число от 1 до 3999 (включая оба) в качестве параметра и возвращающую строку, содержащую римское цифровое представление этого целого числа.
// Современные римские цифры записываются путем выражения каждой цифры отдельно, начиная с самой левой цифры и пропуская любую цифру со значением ноль. Не может быть более 3 одинаковых символов подряд.
// В римских цифрах:
// 1990 отображается: 1000=M + 900=CM + 90=XC; в результате получается MCMXC.
// 2008 записывается как 2000=MM, 8=VIII; или MMVIII.
// 1666 использует каждый римский символ в порядке убывания: MDCLXVI.
// Пример:
// 1 --> "I"
// 1000 --> "M"
// 1666 --> "MDCLXVI"
// Справка:
// Символ Значение
// I 1
// V 5
// X 10
// L 50
// C 100
// D 500
// M 1000
// $this->assertSame("M", solution(1000));
// $this->assertSame("IV", solution(4));
// $this->assertSame("I", solution(1));
// $this->assertSame("MCMXC", solution(1990));
// $this->assertSame("MMVIII", solution(2008));
// I 1
// V 5
// X 10
// L 50
// C 100
// D 500
// M 1000

function roman_encoder($n)
{
    if ($n > 0 and $n < 4000) {
        $res = "";
        $arr = [1 => "I", 5 => "V", 10 => "X", 50 => "L", 100 => "C", 500 => "D", 1000 => "M"]; // 
        $current = strval($n); // 
        $count = strlen($current) - 1;
        for ($i = 0; $i < strlen($current); $i++) {
            if ($current[$i] == 1 or $current[$i] == 2 or $current[$i] == 3) {
                $sum = $current[$i] * 10 ** $count;
                $res .= str_repeat($arr[$sum / $current[$i]], $current[$i]);
                $count--;
            } else if ($current[$i] == 4) {
                $sum = ($current[$i] + 1) * 10 ** $count;
                $res .= $arr[$sum / 10 * 2] . $arr[$sum];
                $count--;
            } else if ($current[$i] == 5) {
                $sum = $current[$i] * 10 ** $count;
                $res .= $arr[$sum];
                $count--;
            } else if ($current[$i] == 6 or $current[$i] == 7 or $current[$i] == 8) {
                $index = $current[$i] - 5; // 1, 2, 3
                $sum = ($current[$i] - $index) * 10 ** $count;
                $res .= $arr[$sum] . str_repeat($arr[10 ** $count], $index);
                $count--;
            } else if ($current[$i] == 9) {
                $sum = ($current[$i] + 1) * 10 ** $count / 10;
                $res .= $arr[$sum] . $arr[($current[$i] + 1) * 10 ** $count];
                $count--;
            } else {
                $count--;
            }
        }
        return $res;
    }
    return "error!";
    // $roman = "";
    // $numerals = ["M" => 1000, "CM" => 900, "D" => 500, "CD" => 400, "C" => 100, "XC" => 90, "L" => 50, "XL" => 40, "X" => 10, "IX" => 9, "V" => 5, "IV" => 4, "I" => 1];
    // foreach ($numerals as $numeral => $value) {
    //     $roman .= str_repeat($numeral, floor($number / $value));
    //     $number = $number % $value;
    // }
    // return $roman;
}
var_dump(roman_encoder(3009)); // "MMMIX"
echo PHP_EOL;



// 34. [6-kyu] Roman Numerals Decoder
// https://www.codewars.com/kata/51b6249c4612257ac0000005
// Создайте функцию, которая принимает римскую цифру в качестве аргумента и возвращает ее значение в виде десятичного целого числа. Вам не нужно проверять форму римской цифры.
// Современные римские цифры записываются путем выражения каждой десятичной цифры числа, которое должно быть закодировано, отдельно, начиная с самой левой цифры и пропуская все нули. Так, 1990 отображается как "MCMXC" (1000 = M, 900 = CM, 90 = XC), а 2008 отображается как "MMVIII" (2000 = MM, 8 = VIII). Римская цифра для 1666, "MDCLXVI", использует каждую букву в порядке убывания.
// Example:
// "MM"      -> 2000
// "MDCLXVI" -> 1666
// "M"       -> 1000
// "CD"      ->  400
// "XC"      ->   90
// "XL"      ->   40
// "I"       ->    1
// I => 1
// V => 5
// X => 10
// L => 50
// C => 100
// D => 500
// M => 1000
// $this->assertSame(1000, solution("M"));
// $this->assertSame(50, solution("L"));
// $this->assertSame(4, solution("IV"));
// $this->assertSame(2017, solution("MMXVII"));
// $this->assertSame(1337, solution("MCCCXXXVII"));
// M 1000 CM 900 D 500 CD 400 C 100 XC 90 L 50 XL 40 X 10 IX 9 V 5 IV 4 I 1

function roman_decoder($roman)
{
    $arr = ["I" => 1, "IV" => 4, "V" => 5, "IX" => 9, "X" => 10, "XL" => 40, "L" => 50, "XC" => 90, "C" => 100, "CD" => 400, "D" => 500, "CM" => 900, "M" => 1000];
    $sum = 0;
    for ($i = 0; $i < strlen($roman); $i++) {
        if (isset($roman[$i + 1]) and $arr[$roman[$i]] < $arr[$roman[$i + 1]]) {
            $sum -= $arr[$roman[$i]];
        } else {
            $sum += $arr[$roman[$i]];
        }
    }
    return $sum;
}
var_dump(roman_decoder("MMXIV"));
echo PHP_EOL;



// 35. [6-kyu] CamelCase Method
// https://www.codewars.com/kata/587731fda577b3d1b0001196
// Напишите метод (или функцию, в зависимости от языка), который преобразует строку в camelCase, то есть все слова должны иметь заглавную первую букву и удалять пробелы.
// Примеры (ввод --> вывод):
// "hello case" --> "HelloCase"
// "camel case word" --> "CamelCaseWord"
// $this->assertSame("TestCase", camel_case("test case"));
// $this->assertSame("CamelCaseMethod", camel_case("camel case method"));
// $this->assertSame("SayHello", camel_case("say hello "));
// $this->assertSame("CamelCaseWord", camel_case(" camel case word"));
// $this->assertSame("", camel_case(""));

function camel_case($s)
{
    return str_replace(' ', '', ucwords($s));
    // return ucwords("hello happy"); // Hello Happy
    // $res = "";
    // for ($i = 0; $i < strlen($s); $i++) {
    // if ($i === 0) {
    // $s[$i] = strtoupper($s[$i]);
    // }
    // if ($s[$i] === " " and isset($s[$i + 1])) {
    // $res .= "";
    // $s[$i + 1] = strtoupper($s[$i + 1]);
    // } else {
    // $res .= $s[$i];
    // }
    // }
    // return trim($res);
}
var_dump(camel_case(" camel case word"));
echo PHP_EOL;



// 36. [6-kyu] Simple Encryption #1 - Alternating Split
// https://www.codewars.com/kata/57814d79a56c88e3e0000786/train/php
// Реализуйте алгоритм псевдошифрования, который, имея строку S и целое число N, объединяет все нечетные символы S со всеми четными символами S, этот процесс должен быть повторен N раз.
// Примеры:
// encrypt("012345", 1) => "135024"
// encrypt("012345", 2) => "135024" -> "304152"
// encrypt("012345", 3) => "135024" -> "304152" -> "012345"
// encrypt("01234", 1) => "13024"
// encrypt("01234", 2) => "13024" -> "32104"
// encrypt("01234", 3) => "13024" -> "32104" -> "20314"
// Вместе с функцией шифрования следует также реализовать функцию дешифрования, которая обращает процесс.
// Если строка S является пустым значением или целое число N не является положительным, вернуть первый аргумент без изменений.
// По сути, описание говорит вам, что нужно сделать (чтобы зашифровать), — это разделить строку(и) на две группы: одна группа — это части строки в нечетном индексе, а другая группа — части строки в четном индексе. Затем просто объедините эти две группы, и у вас получится метод шифрования.
// $this->assertSame("This is a test!", encrypt("This is a test!", 0));
// $this->assertSame("hsi  etTi sats!", encrypt("This is a test!", 1));
// $this->assertSame("s eT ashi tist!", encrypt("This is a test!", 2));
// $this->assertSame(" Tah itse sits!", encrypt("This is a test!", 3));
// $this->assertSame("This is a test!", encrypt("This is a test!", 4));
// $this->assertSame("This is a test!", encrypt("This is a test!", -1));
// $this->assertSame("hskt svr neetn!Ti aai eyitrsig", encrypt("This kata is very interesting!", 1));
// $this->assertSame("This is a test!", decrypt("This is a test!", 0));
// $this->assertSame("This is a test!", decrypt("hsi  etTi sats!", 1));
// $this->assertSame("This is a test!", decrypt("s eT ashi tist!", 2));
// $this->assertSame("This is a test!", decrypt(" Tah itse sits!", 3));
// $this->assertSame("This is a test!", decrypt("This is a test!", 4));
// $this->assertSame("This is a test!", decrypt("This is a test!", -1));
// $this->assertSame("This kata is very interesting!", decrypt("hskt svr neetn!Ti aai eyitrsig", 1));

function encrypt($text, $n)
{
    if ($text === null) {
        return null;
    }
    for ($k = 0; $k < $n; $k++) {
        $even = "";
        $odd = "";
        for ($i = 0; $i < strlen($text); $i++) {
            if ($i % 2 !== 0) {
                $odd .= $text[$i];
            } else {
                $even .= $text[$i];
            }
        }
        $text = $odd . $even;
    }
    return $text;
}
var_dump(encrypt("This is a test!", 1)); // hsi  etTi sats!

function decrypt($text, $n)
{
    if ($text === null) {
        return null;
    }
    $res = "";
    if ($n <= 0) {
        return $text;
    }
    for ($k = 0; $k < $n; $k++) {
        $res = "";
        $one = substr($text, floor(strlen($text) / 2)); // Ti sats!
        $two = substr($text, 0, strlen($text) / 2); // hsi  et
        for ($i = 0; $i < strlen($text); $i++) {
            if (isset($one[$i]) and isset($two[$i])) {
                $res .= $one[$i] . $two[$i];
            }
        }
        if (strlen($text) % 2 !== 0) {
            $res .= $one[strlen($one) - 1];
        }
        $text = $res;
    }
    return $res;
}
var_dump(decrypt("This is a test!", -1));
echo PHP_EOL;


// 37. [6-kyu] WeIrD StRiNg CaSe
// https://www.codewars.com/kata/52b757663a95b11b3d00062d
// Напишите функцию, которая принимает строку и возвращает ту же строку, в которой все четные индексированные символы в каждом слове заглавные, а все нечетные индексированные символы в каждом слове строчные. Только что объясненная индексация начинается с нуля, поэтому индекс с нуля четный, поэтому этот символ должен быть заглавным, и вам нужно начинать заново для каждого слова.
// Переданная строка будет состоять только из буквенных символов и пробелов (' '). Пробелы будут присутствовать только в том случае, если слов несколько. Слова будут разделены одним пробелом (' ').
// Примеры:
// "String" => "StRiNg"
// "Weird string case" => "WeIrD StRiNg CaSe"

function toWeirdCase($string)
{
    $arr = explode(" ", $string);
    foreach ($arr as $value => $key) {

    }
}
var_dump(toWeirdCase("Weird string case"));
echo PHP_EOL;



// 38. [6-kyu] IP Validation
// https://www.codewars.com/kata/515decfd9dcfc23bb6000006 
// Описание:
// Напишите алгоритм, который будет определять допустимые адреса IPv4 в формате с точкой и десятичной дробью. IP-адреса следует считать допустимыми, если они состоят из четырех октетов со значениями от 0 до 255 включительно.
// Примеры допустимых входных данных:
// 1.2.3.4
// 123.45.67.89
// Примеры недопустимых входных данных:
// 1.2.3
// 1.2.3.4.5
// 123.456.78.90
// 123.045.067.089
// Примечания:
// Ведущие нули (например, 01.02.03.04) считаются недопустимыми
// Входные данные гарантированно представляют собой одну строку

function ip_validation($str)
{
    $arr = explode(".", $str);
    if (count($arr) === 4) {
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < 0 or $arr[$i] > 255) {
                return false;
            } else if (strlen($arr[$i]) > 1) {
                if ($arr[$i][0] === "0") {
                    return false;
                }
            }
        }
    } else {
        return false;
    }
    return true;
}
var_dump(ip_validation("abc.def.ghi.jkl"));
echo PHP_EOL;



// 39. [6-kyu] Make the Deadfish Swim
// https://www.codewars.com/kata/51e0007c1f9378fa810002a9/train/php
// Напишите простой парсер, который будет анализировать и запускать Deadfish.
// Deadfish имеет 4 команды, каждая длиной в 1 символ:
// i увеличивает значение (изначально 0)
// d уменьшает значение
// s возводит значение в квадрат
// o выводит значение в возвращаемый массив
// Недопустимые символы следует игнорировать.
// $this->assertSame([ 8, 64 ], parse("iiisdoso"));
// $this->assertSame([ 8, 64 ], parse("iiisxxxdoso"));

function parse_function($data)
{
    $arr = [];
    $res = 0;
    for ($i = 0; $i < strlen($data); $i++) {
        if ($data[$i] === "i") {
            $res++;
        } else if ($data[$i] === "d") {
            $res--;
        } else if ($data[$i] === "s") {
            $res = $res ** 2;
        } else if ($data[$i] === "o") {
            $arr[] = $res;
        }
    }
    return $arr;
}
var_dump(parse_function("iiisxxxdoso"));
echo PHP_EOL;



// 40. [6-kyu] Sums of Parts
// https://www.codewars.com/kata/5ce399e0047a45001c853c2b
// Рассмотрим этот пример (массив, записанный в общем формате):
// ls = [0, 1, 3, 6, 10]
// Его следующие части:
// ls = [0, 1, 3, 6, 10]
// ls = [1, 3, 6, 10]
// ls = [3, 6, 10]
// ls = [6, 10]
// ls = [10]
// ls = []
// Соответствующие суммы (объединенные в список): [20, 20, 19, 16, 10, 0]
// Функция parts_sums (или ее варианты на других языках) будет принимать в качестве параметра список ls и возвращать список сумм его частей, как определено выше.
// Другие примеры:
// ls = [1, 2, 3, 4, 5, 6]
// parts_sums(ls) -> [21, 20, 18, 15, 11, 6, 0]
// ls = [744125, 935, 407, 454, 430, 90, 144, 6710213, 889, 810, 2579358]
// parts_sums(ls) -> [10037855, 9293730, 9292795, 9292388, 9291934, 9291504, 9291414, 9291270, 2581057, 2580168, 2579358, 0]
// Обратите внимание на производительность: в некоторых списках тысячи элементов.

function parts_sums($list)
{
    $arr[] = $sum = array_sum($list); // первый элемент добавляется на этом этапе
    $count_list = sizeof($list);
    for ($i = 0; $i < $count_list; $i++) {
        $sum = $sum - $list[$i];
        $arr[] = $sum;
    }
    return $arr;
    // быстрее чем
    // $count_list = sizeof($list);
    // for ($i = 0; $i <= $count_list; $i++) {
    //     $arr[] = array_sum(array_slice($list, $i));
    // }
    // return $arr;
}
var_dump(parts_sums([0, 1, 3, 6, 10])); // 20 19 16 10 0
echo PHP_EOL;



// 41. [6-kyu] Help the bookseller !
// https://www.codewars.com/kata/54dc6f5a224c26032800005c/train/php
// У продавца книг есть много книг, классифицированных по 26 категориям, обозначенным как A, B, ... Z. Каждая книга имеет код c из 3, 4, 5 или более символов. Первый символ кода — заглавная буква, которая определяет категорию книги.
// В списке товаров продавца книг за каждым кодом c следует пробел и положительное целое число n (int n >= 0), которое указывает количество книг с этим кодом на складе.
// Например, фрагмент списка может быть следующим:
// L = {"ABART 20", "CDXEF 50", "BKWRK 25", "BTSQZ 89", "DRTYM 60"}.
// или
// L = ["ABART 20", "CDXEF 50", "BKWRK 25", "BTSQZ 89", "DRTYM 60"] или ....
// Вам будет предоставлен список товаров (например, L) и список категорий заглавными буквами, например:
// M = {"A", "B", "C", "W"}
// или
// M = ["A", "B", "C", "W"] или ...
// и ваша задача — найти все книги L с кодами, принадлежащими каждой категории M, и суммировать их количество по каждой категории.
// Для списков L и M из примера вам нужно вернуть строку (в Haskell/Clojure/Racket/Prolog это список пар):
// (A : 20) - (B : 114) - (C : 50) - (W : 0)
// где A, B, C, W — категории, 20 — сумма уникальной книги категории A, 114 — сумма, соответствующая «BKWRK» и «BTSQZ», 50 — «CDXEF», а 0 — категории «W», поскольку нет кода, начинающегося с W.
// Если L или M пусты, возвращаемая строка — «» (Clojure/Racket/Prolog должны вернуть пустой массив/список вместо этого).
// В результате коды и их значения находятся в том же порядке, что и в M.
// См. «Примеры тестов» для возврата.
// $b = ["BBAR 150", "CDXE 515", "BKWR 250", "BTSQ 890", "DRTY 600"];
// $c = ["A", "B", "C", "D"];
// $res = "(A : 0) - (B : 1290) - (C : 515) - (D : 600)";
// $b = ["ABAR 200", "CDXE 500", "BKWR 250", "BTSQ 890", "DRTY 600"];
// $c = ["A", "B"];
// $res = "(A : 200) - (B : 1140)";

function solution($listArt, $listCat)
{
    if (empty($listArt) or empty($listCat)) {
        return "";
    }
    for ($i = 0; $i < count($listCat); $i++) {
        $number = 0;
        for ($k = 0; $k < count($listArt); $k++) {
            if ($listCat[$i] == $listArt[$k][0]) {
                for ($x = 0; $x < strlen($listArt[$k]); $x++) {
                    if ($listArt[$k][$x] === " ") {
                        $number += substr($listArt[$k], $x + 1);
                    }
                }
            }
        }
        $arr_numbers[] = $number;
    }
    $res = "";
    for ($i = 0; $i < count($listCat); $i++) {
        if ($i === count($listCat) - 1) {
            $res .= "($listCat[$i] : $arr_numbers[$i])";
        } else {
            $res .= "($listCat[$i] : $arr_numbers[$i]) - ";
        }
    }
    return $res;
}
var_dump(solution(["BBAR 150", "CDXE 515", "BKWR 250", "BTSQ 890", "DRTY 600"], ["A", "B", "C", "D"]));
// (A : 0) - (B : 1290) - (C : 515) - (D : 600)
echo PHP_EOL;



// 42. [6-kyu] Find the missing term in an Arithmetic Progression
// https://www.codewars.com/kata/52de553ebb55d1fca3000371
// Арифметическая прогрессия определяется как прогрессия, в которой существует постоянная разница между последовательными членами заданного ряда чисел. Вам предоставляются последовательные элементы арифметической прогрессии. Однако есть одна загвоздка: ровно один член из исходного ряда отсутствует в наборе чисел, которые вам даны. Остальная часть заданного ряда совпадает с исходным AP. Найдите отсутствующий член.
// Вам нужно написать функцию, которая получает список, размер списка всегда будет составлять не менее 3 чисел. Отсутствующий член никогда не будет первым или последним.
// P.S. Это пример вопроса из задания инженера Facebook на interviewstreet.
// Пример
// findMissing([1, 3, 5, 9, 11]) == 7
// $this->assertSame(4, findMissing([1, 2, 3, 5]));
// $this->assertSame(7, findMissing([1, 3, 5, 9, 11]));
// $this->assertSame(400, findMissing([100, 200, 300, 500]));

function findMissing($list)
{
    $count_list = sizeof($list);
    for ($i = 0; $i < $count_list - 2; $i++) {
        if ($list[$i + 1] - $list[$i] < $list[$i + 2] - $list[$i + 1]) {
            return $list[$i + 1] + ($list[$i + 1] - $list[$i]);
        } else if ($list[$i + 1] - $list[$i] > $list[$i + 2] - $list[$i + 1]) {
            return $list[$i] + ($list[$i + 2] - $list[$i + 1]);
        }
    }
    return $list[0];

    // $arr = [];
    // $count_list = sizeof($list);
    // for ($i = 0; $i < $count_list - 1; $i++) {
    //     $arr[] = $list[$i + 1] - $list[$i];
    // }
    // sort($arr);
    // if ($arr[0] !== $arr[1]) {
    //     $flag = $arr[1];
    // } else {
    //     $flag = $arr[0]; // 2
    // }
    // for ($i = 0; $i < $count_list - 1; $i++) {
    //     if ($list[$i + 1] - $list[$i] !== $flag) { // !== 2
    //         return $list[$i] + $flag;
    //     } else if ($count_list < 4) {
    //         return $list[$i] + $arr[0];
    //     }
    // }
    // return $list[0];
}
var_dump(findMissing([0, 2, 3]));
var_dump(findMissing([0, 1, 3]));
var_dump(findMissing([1, 2, 3, 5]));
echo PHP_EOL;



// 43. Encrypt this!
// https://www.codewars.com/kata/5848565e273af816fb000449/train/php
// Ваше сообщение представляет собой строку, содержащую слова, разделенные пробелами.
// Вам нужно зашифровать каждое слово в сообщении, используя следующие правила:
// Первая буква должна быть преобразована в ее код ASCII.
// Вторая буква должна быть заменена последней буквой
// Проще говоря: во входных данных нет специальных символов.
// Примеры:
// encryptThis("Hello") === "72olle"
// encryptThis("good") === "103doo"
// encryptThis("hello world") === "104olle 119drlo"
// $this->assertSame("65", encryptThis("A"));
// $this->assertSame("65 119esi 111dl 111lw 108dvei 105n 97n 111ka", encryptThis("A wise old owl lived in an oak"));
// $this->assertSame("84eh 109ero 104e 115wa 116eh 108sse 104e 115eokp", encryptThis("The more he saw the less he spoke"));
// $this->assertSame("84eh 108sse 104e 115eokp 116eh 109ero 104e 104dare", encryptThis("The less he spoke the more he heard"));
// $this->assertSame("87yh 99na 119e 110to 97ll 98e 108eki 116tah 119esi 111dl 98dri", encryptThis("Why can we not all be like that wise old bird"));
// $this->assertSame("84kanh 121uo 80roti 102ro 97ll 121ruo 104ple", encryptThis("Thank you Piotr for all your help"));

function encryptThis($text)
{
    // Первая буква должна быть преобразована в ее код ASCII.
    // Вторая буква должна быть заменена последней буквой
    $res = "";
    $arr = explode(" ", $text);
    $count_arr = sizeof($arr);
    for ($i = 0; $i < $count_arr; $i++) {
        if (strlen($arr[$i]) > 2) {
            // смена символов строки местами
            [$arr[$i][1], $arr[$i][-1]] = [$arr[$i][-1], $arr[$i][1]];
        }
        $res .= ord($arr[$i][0]) . substr($arr[$i], 1) . " ";
    }
    return trim($res);

    // $arr = explode(" ", $text);
    // $arr_count = sizeof($arr);
    // $arr_ord = [];
    // for ($i = 0; $i < $arr_count; $i++) {
    //     $arr_ord[] = ord($arr[$i][0]);
    //     if (strlen($arr[$i]) > 3) {
    //         $arr[$i] = $arr_ord[$i] . $arr[$i][-1] . substr($arr[$i], 2, strlen($arr[$i]) - 3) . $arr[$i][1];
    //     } else if (strlen($arr[$i]) === 3) {
    //         $arr[$i] = $arr_ord[$i] . $arr[$i][-1] . $arr[$i][1];
    //     } else {
    //         if (isset($arr[$i][1])) {
    //             $arr[$i] = $arr_ord[$i] . $arr[$i][1];
    //         } else {
    //             $arr[$i] = $arr_ord[$i];
    //         }
    //     }
    // }
    // return implode(" ", $arr);
}
var_dump(encryptThis("AB")); // "65dB"
var_dump(encryptThis("good")); // "103doo" 
var_dump(encryptThis("A")); // "65"
var_dump(encryptThis("hello world")); // "104olle 119drlo"
// var_dump(encryptThis("ABdE")); // "65EdB"
// var_dump(encryptThis("Hello")); // "72olle"
echo PHP_EOL;



// 44. Meeting - не решена
// https://www.codewars.com/kata/59df2f8f08c6cec835000012
// Джон пригласил друзей. Его список:
// s = "Fred:Corwill;Wilfred:Corwill;Barney:Tornbull;Betty:Tornbull;Bjon:Tornbull;Raphael:Corwill;Alfred:Corwill";
// Можете ли вы создать программу, которая
// делает эту строку заглавной
// отсортирует ее в алфавитном порядке по фамилии.
// Если фамилии одинаковые, отсортируйте их по имени. Фамилия и имя гостя приводятся в результате в скобках, разделенных запятой.
// Таким образом, результатом встречи(й) функций будет:
// "(CORWILL, ALFRED)(CORWILL, FRED)(CORWILL, RAPHAEL)(CORWILL, WILFRED)(TORNBULL, BARNEY)(TORNBULL, BETTY)(TORNBULL, BJON)"
// Может случиться так, что в двух разных семьях с одинаковой фамилией у двух людей также будут одинаковые имена.
//     "Alexis:Wahl;John:Bell;Victoria:Schwarz;Abba:Dorny;Grace:Meta;Ann:Arno;Madison:STAN;Alex:Cornwell;Lewis:KERN;Megan:Stan;Alex:Korn", =>
//     "(ARNO, ANN)(BELL, JOHN)(CORNWELL, ALEX)(DORNY, ABBA)(KERN, LEWIS)(KORN, ALEX)(META, GRACE)(SCHWARZ, VICTORIA)(STAN, MADISON)(STAN, MEGAN)(WAHL, ALEXIS)"
//     "John:Gates;Michael:Wahl;Megan:Bell;Paul:Dorries;James:Dorny;Lewis:Steve;Alex:Meta;Elizabeth:Russel;Anna:Korn;Ann:Kern;Amber:Cornwell" =>
//     "(BELL, MEGAN)(CORNWELL, AMBER)(DORNY, JAMES)(DORRIES, PAUL)(GATES, JOHN)(KERN, ANN)(KORN, ANNA)(META, ALEX)(RUSSEL, ELIZABETH)(STEVE, LEWIS)(WAHL, MICHAEL)"
// делает эту строку заглавной
// отсортирует ее в алфавитном порядке по фамилии.
// Если фамилии одинаковые, отсортируйте их по имени. Фамилия и имя гостя приводятся в результате в скобках, разделенных запятой.
/*
1) возвести строку в верхний регистр
2) получить массив фамилий
3) сортируем массив фамилий по алфавиту
4) считаем одинаковые фамилии
3) там, где фамилии одинаковые - сортируем по имени именно этот участок
4) там где фамилий 1 сортируем по фамилии
*/

function meeting($s)
{
    $s = strtoupper($s);
    $arr = explode(";", $s);
    // return $arr; // массив неотсортированный: имя и фамилия
    $count_arr = sizeof($arr);
    $surnames = [];
    for ($i = 0; $i < $count_arr; $i++) {
        for ($k = 0; $k < strlen($arr[$i]); $k++) {
            if ($arr[$i][$k] === ":") {
                $surnames[] = substr($arr[$i], $k + 1);
            }
        }
    }
    sort($surnames); // отсортированные фамилии
    // return $surnames; // CORWILL CORWILL 
    $arr_names = [];
    // $res = "";
    // for ($i = 0; $i < $count_arr; $i++) {
    //     if (substr_count($s, $surnames[$i]) > 1) {
    //         for ($k = 0; $k < $count_arr; $k++) {
    //             for ($x = 0; $x < strlen($arr[$k]); $i++) {
    //                 if ($arr[$k][$x] === ":") {
    //                     // $arr_names[] = substr($arr[$k], $k + 1)
    //                 }
    //             }
    //         }
    //     }
    // }
    // return $res;


    // return implode(" ", $surnames);
}
var_dump(meeting("Fred:Corwill;Wilfred:Corwill;Barney:Tornbull;Betty:Tornbull;Bjon:Tornbull;Raphael:Corwill;Alfred:Corwill"));
echo PHP_EOL;



// 45. Consonant value
// https://www.codewars.com/kata/59c633e7dcc4053512000073
// Дана строка в нижнем регистре, которая содержит только буквы алфавита и не содержит пробелов, вернуть наибольшее значение подстрок согласных. Гласными являются любые буквы алфавита, кроме «aeiou».
// Присвоим следующие значения: a = 1, b = 2, c = 3, .... z = 26.
// Например, для слова «zodiacs» вычеркнем гласные. Получаем: "z d cs"
// Согласные подстроки: "z", "d" и "cs", а значения z = 26, d = 4 и cs = 3 + 19 = 22. Наибольшее значение — 26.
// solve("zodiacs") = 26
// Для слова "strength" resolve("strength") = 57
// Согласные подстроки: "str" ​​и "ngth" со значениями "str" ​​= 19 + 20 + 18 = 57 и "ngth" = 14 + 7 + 20 + 8 = 49. Наибольшее значение — 57.
// $this->assertSame(26, solve("zodiac"));
// $this->assertSame(80, solve("chruschtschov"));
// $this->assertSame(38, solve("khrushchev"));
// $this->assertSame(57, solve("strength"));
// $this->assertSame(73, solve("catchphrase"));
// $this->assertSame(103, solve("twelfthstreet"));
// $this->assertSame(80, solve("mischtschenkoana"));

function solve($s)
{
    $arr = ["a", "e", "i", "o", "u"]; // 
    $alphabet = range("b", "z"); // 1 b = 0
    $strlen_s = strlen($s);
    $numbers = [];
    $res = 0;
    for ($i = 0; $i < $strlen_s; $i++) {
        if (!in_array($s[$i], $arr)) {
            $res += array_search($s[$i], $alphabet) + 2;
        }
        $numbers[] = $res;
        if (in_array($s[$i], $arr)) {
            $res = 0;
        }
    }
    return max($numbers);
}
var_dump(value: solve("zodiacs"));
echo PHP_EOL;



// 46. Playing with passphrases
// https://www.codewars.com/kata/559536379512a64472000053/train/php
// Все знают парольные фразы. Можно выбирать парольные фразы из стихотворений, песен, названий фильмов и т. д., но часто их можно угадать из-за общих культурных ссылок. Вы можете сделать свои парольные фразы более сильными разными способами. Один из них следующий:
// выберите текст заглавными буквами, включая или не включая цифры и небуквенные символы, сдвиньте каждую букву на заданное число, но преобразованная буква должна быть буквой (круговой сдвиг), замените каждую цифру ее дополнением к 9, сохраните такие небуквенные и нецифровые символы, сделайте каждую букву в нижнем регистре в нечетной позиции, каждую букву в верхнем регистре в четной позиции (первый символ находится в позиции 0), переверните весь результат.
// 9-5=4, which is the complement number to 9.
// ваш текст: "BORN IN 2015!", сдвиг 1
// "BORN IN 2015!" => "CPSO JO 7984!" => "CpSo jO 7984!" => "!4897 Oj oSpC"
// С более длинными парольными фразами лучше иметь небольшую и простую программу. Вы бы ее написали?
// $this->revTest(playPass("I LOVE YOU!!!", 1), "!!!vPz fWpM J");
// $this->revTest(playPass("I LOVE YOU!!!", 0), "!!!uOy eVoL I");
// $this->revTest(playPass("AAABBCCY", 1), "zDdCcBbB");
// $this->revTest(playPass("MY GRANMA CAME FROM NY ON THE 23RD OF APRIL 2015", 2), "4897 NkTrC Hq fT67 GjV Pq aP OqTh gOcE CoPcTi aO");

function playPass($s, $n)
{
    $res = "";
    $alphabet = range("A", "Z");
    $strlen_s = strlen($s) - 1;
    for ($i = $strlen_s; $i >= 0; $i--) {
        if (in_array($s[$i], $alphabet)) {
            if ($i % 2 !== 0) {
                if (array_search($s[$i], $alphabet) + $n > 25) {
                    $res .= strtolower($alphabet[array_search($s[$i], $alphabet) + $n - 26]);
                } else {
                    $res .= strtolower($alphabet[array_search($s[$i], $alphabet) + $n]);
                }
            } else {
                if (array_search($s[$i], $alphabet) + $n > 25) {
                    $res .= $alphabet[array_search($s[$i], $alphabet) + $n - 26];
                } else {
                    $res .= $alphabet[array_search($s[$i], $alphabet) + $n];
                }
            }
        } else if ($s[$i] == " ") {
            $res .= " ";
        } else if (intval($s[$i]) !== 0 || $s[$i] === "0") {
            $res .= 9 - $s[$i];
        } else {
            $res .= $s[$i];
        }
    }
    return $res;
}
var_dump(playPass("MY GRANMA CAME FROM NY ON THE 23RD OF APRIL 2015", 10));
echo PHP_EOL;



// 47. Pyramid Array
// https://www.codewars.com/kata/515f51d438015969f7000013/train/php
// Напишите функцию, которая при задании числа >= 0 возвращает массив подмассивов возрастающей длины.
// pyramid(0) => [ ]
// pyramid(1) => [ [1] ]
// pyramid(2) => [ [1], [1, 1] ]
// pyramid(3) => [ [1], [1, 1], [1, 1, 1] ]
// Примечание: подмассивы должны быть заполнены единицами

function pyramid($n)
{
    $arr = [];
    $add = [];
    for ($i = 0; $i < $n; $i++) {
        $add[] = 1;
        $arr[] = $add;
    }
    return $arr;
}
var_dump(pyramid(0));
echo PHP_EOL;



// 48. Fibonacci, Tribonacci and friends
// https://www.codewars.com/kata/556e0fccc392c527f20000c5
// Если вы закончили ката последовательности Трибоначчи, то вы уже знаете, что у мистера Фибоначчи есть по крайней мере старший брат. Если нет, то быстро взгляните на него, чтобы понять, как все работает.
// Что ж, пора немного расширить семейство: представьте себе Квадрибоначчи, начинающуюся с подписи из 4 элементов, и каждый следующий элемент является суммой 4 предыдущих, Пентабоначчи (ну, Чинквебоначчи, вероятно, звучало бы немного более по-итальянски, но это также звучало бы действительно ужасно) с подписью из 5 элементов, и каждый следующий элемент является суммой 5 предыдущих, и так далее.
// Ну, угадайте что? Вам нужно построить функцию Xbonacci, которая принимает подписи из X элементов — и помните, что каждый следующий элемент является суммой последних X элементов — и возвращает первые n элементов так засеянной последовательности.
// длина заданного исходного массива представляет собой количество элементов для суммирования.
// если вам дано Xibonnaci([1,1,1],20), добавьте сумму последних 3 элементов на каждой итерации и верните массив длиной 20. если вам дано Xibonnaci([1,1,1,1,1],10), добавьте сумму последних 5 элементов на каждой итерации и верните массив длиной 10. если вам дано Xibonnaci([1,0,0,0,0,0,0,1],15), добавьте сумму последних 8 элементов на каждой итерации и верните массив длиной 15.
// xbonacci {1,1,1,1} 10 = {1,1,1,1,4,7,13,25,49,94}
// xbonacci {0,0,0,0,1} 10 = {0,0,0,0,1,1,2,4,8,16}
// xbonacci {1,0,0,0,0,0,1} 10 = {1,0,0,0,0,0,1,2,3,6}
// xbonacci {1,1} создает последовательность Фибоначчи
// $this->assertEquals([0,1,1,2,3,5,8,13,21,34], Xbonacci([0,1],10));
// $this->assertEquals([1,1,2,3,5,8,13,21,34,55], Xbonacci([1,1],10));
// $this->assertEquals([0,0,0,0,1,1,2,4,8,16], Xbonacci([0,0,0,0,1],10));
// $this->assertEquals([1,0,0,0,0,0,1,2,3,6], Xbonacci([1,0,0,0,0,0,1],10));
// $this->assertEquals([1,0,0,0,0,0,0,0,0,0,1,1,2,4,8,16,32,64,128,256], Xbonacci([1,0,0,0,0,0,0,0,0,0],20));
// $this->assertEquals([0.5,0,0,0,0,0,0,0,0,0], Xbonacci([0.5,0,0,0,0,0,0,0,0,0],10));
// $this->assertEquals([0.5,0,0,0,0,0,0,0,0,0,0.5,0.5,1,2,4,8,16,32,64,128], Xbonacci([0.5,0,0,0,0,0,0,0,0,0],20));
// $this->assertEquals([0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0], Xbonacci([0,0,0,0,0,0,0,0,0,0],20));
// $this->assertEquals([1,2,3,4,5,6,7,8,9], Xbonacci([1,2,3,4,5,6,7,8,9,0],9));
// $this->assertEquals([], Xbonacci([1,2,3,4,5,6,7,8,9,0],0));

function Xbonacci($s, $n)
{
    $count = sizeof($s);
    $size = $n - $count;
    if ($size < 0) {
        $s = array_slice($s, 0, $n);
    }
    for ($i = 0; $i < $size; $i++) {
        $s[] = array_sum(array_slice($s, $i));
    }
    return $s;
}
var_dump(Xbonacci([1, 2, 3, 4, 5, 6, 7, 8, 9, 0], 9));
echo PHP_EOL;


// 49. Fibonacci, Tribonacci and friends
// https://www.codewars.com/kata/58223370aef9fc03fd000071/train/php
// Дано целое число, вернуть строку с дефисами '-' до и после каждой нечетной цифры, но не начинать и не заканчивать строку дефисом.
// Пример:
// 274 -> '2-7-4'
// 6815 -> '68-1-5'

function sol($n)
{
    $str = strval($n);
    $strlen = strlen($str);
    $res = "";
    for($i = 0; $i < $strlen; $i++) {
        if(intval($str[$i]) % 2 !== 0) {
            if(isset($str[$i + 1]) and intval($str[$i + 1]) % 2 === 0) {
                $res .= "-" . $str[$i] . "-";
            } else {
                $res .= "-" . $str[$i];
            }
        } else {
            $res .= $str[$i];
        }
    }
    return trim($res, "-");
}
var_dump(sol(1));









// когда мы ищем простые числа циклом, то нет смысла перебирать числа больше корня из числа, которое мы проверяем $i <= sqrt($n)
// ...[] - оператор spread - вытаскивает элементы из массива
// strlen(943) = 3 - преобразует в строку автоматически
// str_split(943) = ["9", "4", "3"] - преобразует в строку автоматически
// перемельман - арифметика для развлечения
// книги по математике перельман
// грокаем алгоритмы
// array_values($arr) возвращает индексный массив со всеми значениями массива array и сбрасывает ключи 









// 120 минут 22 июня 2 задачи
// 60 минут 23 июня 1 задача
// 40 минут 27 июня  1 задача
// 30 минут 28 июня  1 задача
// 60 минут 29 июня 2 задачи
// 60+37 минут 30 июня 3 задачи
// 1 июня спал
// 2 июня был с Настей, не занимался!
// 60 минут 3 июня 3 задачи codewars [mathematics] + теория массивы ассоциативные 
// 4 июня ездил со своей девушкой
// 5 июня спал
// 6 июня 3 задачи [mathematics] 40 минут 
// 7 июня был у Насти в гостях и готовился 
// 15 июля 30 минут 3 задачи codewars
// 23 июля 60 минут 3 задачи codewars
// 24 июля 30 минут 3 задачи codewars
// 25 июля  3 задачи codewars и Обход массива циклами в PHP | Базовый курс PHP-7 [Андрей андриевский] 90 минут 
// 26 июля 3 задачи codewars 30 мин 
// 27 июля отдыхал со своей девушкой
// 28 июля 120 мин codewars 3 задачи  Функции работы с массивами в PHP | Базовый курс PHP-7 | Базовый курс PHP-7 [Андрей андриевский], Объявление и вызов функции в PHP | Базовый курс PHP-7, Объявление и вызов функции в PHP | Базовый курс PHP-7
// 29 июля 2 задачи codewars 60 мин 
// 30 июля 2 задачи codewars 120 мин 
// 31 июля был с Настей, не занимался! 
// 01 августа занимался 30 мин codewars 1 задача 
// 02 августа был с Настей, не занимался! 
// 03 августа занимался 120 мин codewars 6 задач
// 04 августа занимался 120 мин codewars 4 задачи
// 05 августа занимался 60 мин codewars 6 задач
// 06 августа ничего не делал
// 07 августа ничего не делал, хотел спать и отдыхал с Настей
// 09 августа 2 задачи 7-kyu и 3 задачи 6-kyu 60 мин
// 10 августа 8 задач 6-kyu и 1 задача 5-kyu codewars за 2.5 часа
// 11 августа 4 задачи codewars 6-kyu 30 минут
// 12 августа 3 задачи codewars 6-kyu, Работа с параметрами функций в PHP | Базовый курс PHP-7 120 минут 
// 13 загонялся, общался с Настей 
// 14 августа 3 задачи codewars 6-kyu 30 минут
// 15 августа 3 задачи codewars 6-kyu 120 минут
// 16 августа 2 задачи codewars 6-kyu 120 минут
// 17 августа 1 задачa codewars 6-kyu 2.5 часа
// 18 августа 2 задачи codewars 6-kyu 120 минут
// 21 августа 1 задачa codewars 6-kyu 30 минут
// 26 августа 1 задачa codewars 6-kyu 180 минут
// 27 августа 1 задачa codewars 6-kyu 20 минут Глобальные и статические переменные в PHP | Базовый курс PHP-7
// 28 августа 1 задача codewars 5 мин
// 29 августа 1 задача codewars 40 мин
// 30.08 - теория по рекурсии 30 мин и 10 мин 1 задача codewars
// 31.08 - 10 мин 1 задача codewars 6-kyu и 20 мин решение 2х задач на рекурсию  
// 01.08 - 10 мин 1 задача codewars 6-kyu 60 мин Вложенные и динамические функции в PHP | Базовый курс PHP-7, а также Замыкания в PHP | Базовый курс PHP-7
// 01.08 - 10 мин 1 задача codewars 6-kyu 60 мин Вложенные и динамические функции в PHP | Базовый курс PHP-7, а также Замыкания в PHP | Базовый курс PHP-7
// 02.08 1 задача codewars 6-kyu 40 минут
// 05.08 1 задача codewars 6-kyu 40 минут + 20 минут теория UTF-8_and_mbstring Базовый курс PHP-7
// 06.08 1 задача codewars 6-kyu 90 минут + 60 мин Функции для работы с символами в PHP | Базовый курс PHP-7 и Работа с НТМL-кодом в PHP | Базовый курс PHP-7 
// 07.09 - 60 мин 1 задача codewars + 30 мин Работа с НТМL-кодом в PHP | Базовый курс PHP-7
// 08.09 - 60 мин 1 задача codewars + 90 мин теория () Базовый курс PHP-7 и Работа с НТМL-кодом в PHP | Базовый курс PHP-7 + 16_serialize + json-формат в php
// 09.09 - ничего не делал, ленился, загонялся после работы
// 10.09 - 1 задача codewars 6-kyu 30 минут
// 11.09 - 19_GET_parametrs Базовый курс PHP-7 60 минут + 20 минут 1 задача codewars
// 12.09 - 1 задача codewars 6-kyu 33 минуты + 110 минут работа с html формой в php | Базовый курс PHP-7
// 13.09 - 1 задача codewars 6-kyu 10 минут + 30 минут работа с html формой в php | Базовый курс PHP-7
// 14.09 - 1 задача codewars 6-kyu 20 минут + 
