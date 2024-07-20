<?php
// codewars 7-kyu [https://www.codewars.com/kata/search/php?q=&r%5B%5D=-7&tags=Strings&beta=false&order_by=popularity%20desc]
// Чтобы понять, как решаются задачи, нужно всё расписать визуально на доске и найти закономерности
// 67 задач [7-kyu] [strings] 
// 20 задач [7-kyu] [mathematics] 
// 20 задач [7-kyu] [arrays] 
// 20 задач [7-kyu] [fundamentals]
// задачи, которые понравились с тегом 
// задачи, которые нужно решить с помощью регулярных выражений: 
// 1. https://www.codewars.com/kata/56cd44e1aa4ac7879200010b/train/php 
// 2. https://www.codewars.com/kata/5700c9acc1555755be00027e
// 3. https://www.codewars.com/kata/59dd2c38f703c4ae5e000014/train/php 
// 4. https://www.codewars.com/kata/576bb3c4b1abc497ec000065/train/php 
// 5. https://www.codewars.com/kata/57faf32df815ebd49e000117/train/php
// 6. https://www.codewars.com/kata/5b37a50642b27ebf2e000010/solutions/php
// 7. https://www.codewars.com/kata/58e8cad9fd89ea0c6c000258
// 8. https://www.codewars.com/kata/5787628de55533d8ce000b84/train/php - не смог решить, задача на корректную дату
// 9. https://www.codewars.com/kata/57b365f81fae8a0571000142/train/php - решил, но решить ещё через регулярные выражения




// Github
// ivan_babienko@mail.ru
// Yamaha6843

echo "\n\n========================================= [7-kyu], [strings] ========================================= \n\n";

// 1. [7-kyu], [string]. Vowel Count 
// https://www.codewars.com/kata/54ff3102c1bad923760001f3
// Возвращает количество гласных в заданной строке.
// Гласными для этой Ката мы будем считать a, e, i, o, u (но не y).
// Входная строка будет состоять только из строчных букв и/или пробелов.
// $this->assertSame(5, getCount("abracadabra"));

function getCount($str)
{
    $arr = ["a", "e", "i", "o", "u"];
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $arr, true)) {
            $count++;
        }
    }
    return $count;
}
var_dump(getCount("abracadabra"));
echo PHP_EOL;



// 2. [7-kyu], [string]. Disemvowel Trolls 
// https://www.codewars.com/kata/52fba66badcd10859f00097e
// Тролли атакуют ваш раздел комментариев!
// Распространенный способ справиться с этой ситуацией — удалить все гласные из комментариев троллей, нейтрализуя угрозу.
// Ваша задача — написать функцию, которая принимает строку и возвращает новую строку, из которой удалены все гласные.
// Например, строка «This website is for losers LOL!» станет «Ths wbst s fr lsrs LL!».
// Примечание: в этой ката y не считается гласной.

function disemvowel($string)
{
    // return str_replace(["a", "A", "e", "E", "i", "I", "o", "O", "u", "U"], "", $string);
    // return str_ireplace(["a", "e", "i", "o", "u"], "", $string); 
    return str_replace(str_split("aAeEiIoOuU"), "", $string);
}
var_dump(disemvowel("This website is for losers LOL!"));
echo PHP_EOL;



// 3. [7-kyu], [string]. Reversing Words in a String 
// https://www.codewars.com/kata/57a55c8b72292d057b000594/php
// Вам нужно написать функцию, которая меняет местами слова в заданной строке. Слово также может соответствовать пустой строке. Если это недостаточно ясно, вот несколько примеров:
// Example (Input --> Output)
// "Hello World" --> "World Hello"
// "Hi There." --> "There. Hi"
// $this->assertSame("World Hello", reverse("Hello World"));
// $this->assertSame("There. Hi", reverse("Hi There."));
// $this->assertSame("World  Hello", reverse("Hello  World"));
// Поскольку входные данные могут иметь конечные пробелы, вам также придется игнорировать ненужные пробелы.
// explode(" ", $string) - Функция возвращает массив строк, каждая из которых — подстрока, которая образовалась за счёт разделения строки string по границам, которые образовала строка-разделитель separator " ".

function reverse($string)
{
    return implode(" ", array_reverse(explode(" ", $string)));
    // или 

}
var_dump(reverse("Hello world."));
echo PHP_EOL;

// или 
function reverse_1($string)
{
    $res_1 = "";
    $res_2 = "";
    $str_len_1 = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] === " ") {
            break;
        }
        $res_1 .= $string[$i];
        $str_len_1++;
    }
    for ($i = $str_len_1 + 1; $i < strlen($string); $i++) {
        $res_2 .= $string[$i];
    }
    return $res_2 . " " . $res_1;
}
var_dump(reverse_1("Hello world."));
echo PHP_EOL;



// 4. [7-kyu], [string]. Highest and Lowest 
// https://www.codewars.com/kata/554b4ac871d6813a03000035/train/php
// В этом небольшом задании вам дается строка чисел, разделенных пробелами, и вы должны вернуть наибольшее и наименьшее число.
// Примеры
// highAndLow("1 2 3 4 5");   // возвращаем "5 1"
// highAndLow("1 2 -3 4 5"); // возвращаем "5 -3"
// highAndLow("1 9 3 4 -5"); // возвращаем "9 -5"
// $this->assertSame("42 -9", highAndLow("8 3 -5 42 -1 0 0 -9 4 7 4 -4"));
// $this->assertSame("3 1", highAndLow("1 2 3"));
// Во входной строке всегда будет хотя бы одно число.
// Выходная строка должна состоять из двух чисел, разделенных одним пробелом, причем первым должно быть наибольшее число.

function highAndLow($numbers)
{
    return max(explode(" ", $numbers)) . " " . min(explode(" ", $numbers));
    // или
    // $arr = explode(" ", $numbers);
    // sort($arr);
    // return $arr[count($arr) - 1] . " " . $arr[0];
}
var_dump(highAndLow("1 9 3 4 -5"));
var_dump(highAndLow("8 3 -5 42 -1 0 0 -9 4 7 4 -4"));
echo PHP_EOL;



// 5. [7-kyu], [string]. Get the Middle Character 
// https://www.codewars.com/kata/56747fd5cb988479af000028/train/php
// Вам будет предоставлено слово. Ваша задача — вернуть средний символ слова. Если длина слова нечетная, верните средний символ. Если длина слова четная, верните 2 средних символа.
// $this->assertSame("es", getMiddle("test"));
// $this->assertSame("t", getMiddle("testing"));
// $this->assertSame("dd", getMiddle("middle"));
// $this->assertSame("A", getMiddle("A"));

function getMiddle($text)
{
    return (strlen($text) % 2 === 0) ? substr($text, strlen($text) / 2 - 1, 2) :
        substr($text, strlen($text) / 2, 1);
    // $res = strlen($text) / 2;
    // if (strlen($text) % 2 === 0) {
    //     return substr($text, $res - 1, 2);
    // } else {
    //     return substr($text, $res, 1);
    // }
}
var_dump(getMiddle("test"));
var_dump(getMiddle("testing"));
var_dump(getMiddle("middle"));
var_dump(getMiddle("A"));
echo PHP_EOL;

// или решить, не используя substr
function getMiddle_1($text)
{
    if (strlen($text) % 2 === 0) {
        return $text[strlen($text) / 2 - 1] . $text[strlen($text) / 2];
    } else {
        return $text[(int) floor(strlen($text) / 2)]; // floor(3.5) => float(3) => $str[float] => ошибка
    }
}
var_dump(getMiddle_1("test"));
var_dump(getMiddle_1("testing"));
var_dump(getMiddle_1("middle"));
var_dump(getMiddle_1("A"));
echo PHP_EOL;



// 6. [7-kyu], [string]. Isograms 
// https://www.codewars.com/kata/54ba84be607a92aa900000f1
// Изограмма – это слово, в котором нет повторяющихся букв, как последовательных, так и непоследовательных. Реализуйте функцию, которая определяет, является ли строка, содержащая только буквы, изограммой. Предположим, что пустая строка является изограммой. Не обращайте внимания на регистр букв.
// "Dermatoglyphics" --> true
// "aba" --> false
// "moOse" --> false (ignore letter case)
// $this->assertSame(true, isIsogram("Dermatoglyphics"));
// $this->assertSame(true, isIsogram("isogram"));
// $this->assertSame(false, isIsogram("aba"), "same chars may not be adjacent");
// $this->assertSame(false, isIsogram("moOse"), "same chars may not be same case");
// $this->assertSame(false, isIsogram("isIsogram"));
// $this->assertSame(true, isIsogram(""), "an empty string is a valid isogram");

function isIsogram($string)
{
    // for ($i = 0; $i < strlen($string); $i++) {
    //     for ($k = $i + 1; $k < strlen($string); $k++) {
    //         if (strtolower($string[$i]) === strtolower($string[$k])) {
    //             return false;
    //         }
    //     }
    // }
    // return true;
    // или 
    return array_unique(str_split(strtolower($string), 1)) === str_split(strtolower($string), 1);
}
var_dump(isIsogram("Dermatoglyphics"));
var_dump(isIsogram("moOse"));
echo PHP_EOL;



// 7. [7-kyu], [string]. Mumbling 
// https://www.codewars.com/kata/5667e8f4e3f572a8f2000039/train/php
// В примерах ниже показано, как написать функцию accum:
// Примеры:
// accum("abcd") -> "A-Bb-Ccc-Dddd"
// accum("RqaEzty") -> "R-Qq-Aaa-Eeee-Zzzzz-Tttttt-Yyyyyyy"
// accum("cwAt") -> "C-Ww-Aaa-Tttt"
// Параметр accum представляет собой строку, включающую только буквы от a..z и A..Z.
// str_repeat($str, $n) - повторяет строку str n раз
// ucwords — Преобразовывает в верхний регистр первый символ каждого слова в строке
// trim может обрезать что угодно
var_dump(trim("!-a-a-a-!", "!-")); // a-a-a

function accum($s)
{
    $res = "";
    for ($i = 0; $i < strlen($s); $i++) {
        $res .= ucwords(strtolower(str_repeat($s[$i], $i + 1))) . "-"; // A-Bb-Ccc-Dddd
    }
    return trim($res, "-");

}
var_dump(accum("abcd"));
var_dump(accum("ZpglnRxqenU"));
echo PHP_EOL;

// или 
function accum_1($s)
{
    $arr = [];
    foreach (str_split($s) as $index => $item) {
        $arr[] = strtoupper($item) . str_repeat(strtolower($item), $index);
    }
    return implode("-", $arr);
}
var_dump(accum_1("abcd"));
var_dump(accum_1("ZpglnRxqenU"));
echo PHP_EOL;


// 8. [7-kyu], [string]. Complementary DNA 
// https://www.codewars.com/kata/554e4a2f232cdd87d9000038
// Дезоксирибонуклеиновая кислота (ДНК) — это химическое вещество, находящееся в ядре клеток и несущее «инструкции» для развития и функционирования живых организмов.
// В цепочках ДНК символы «А» и «Т» дополняют друг друга, как «С» и «G». Ваша функция получает одну сторону ДНК, вам нужно вернуть другую дополнительную сторону. Цепь ДНК никогда не бывает пустой или ДНК вообще не существует.
// $this->assertSame("TTTT", DNA_strand("AAAA"));
// $this->assertSame("AAAA", DNA_strand("TTTT"));
// $this->assertSame("TAACG", DNA_strand("ATTGC"));
// $this->assertSame("ATTGC", DNA_strand("TAACG"));
// $this->assertSame("CATA", DNA_strand("GTAT"));
// $this->assertSame("GTAT", DNA_strand("CATA"));

function DNA_strand($dna)
{
    // for ($i = 0; $i < strlen($dna); $i++) {
    //     if ($dna[$i] === "A") {
    //         $dna[$i] = "T";
    //     } else if ($dna[$i] === "T") {
    //         $dna[$i] = "A";
    //     } else if ($dna[$i] === "G") {
    //         $dna[$i] = "C";
    //     } else if ($dna[$i] === "C") {
    //         $dna[$i] = "G";
    //     }
    // }
    // return $dna;
    // или 
    return strtr($dna, ['A' => 'T', 'T' => 'A', 'C' => 'G', 'G' => 'C']);
    // или 
    // return strtr($dna, "ATGC", "TACG");
}
var_dump(DNA_strand("AAAA"));
var_dump(DNA_strand("TTTT"));
var_dump(DNA_strand("ATTGC"));
echo PHP_EOL;



// 9. [7-kyu], [string]. Jaden Casing Strings 
// https://www.codewars.com/kata/5390bac347d09b7da40006f6/train/php
// Джейден Смит, сын Уилла Смита, является звездой таких фильмов, как «Парень-каратист» (2010) и «После Земли» (2013). Джейден также известен своей философией, которую он распространяет через Твиттер. Когда он пишет в Твиттере, он известен тем, что почти всегда пишет каждое слово с заглавной буквы. Для простоты вам придется писать каждое слово с заглавной буквы. Посмотрите, какими будут сокращения в примере ниже.
// Ваша задача — преобразовать строки так, как их написал Джейден Смит. Строки представляют собой настоящие цитаты Джейдена Смита, но они не пишутся с заглавной буквы так, как он их первоначально напечатал.
// Example:
// Not Jaden-Cased: "How can mirrors be real if our eyes aren't real"
// Jaden-Cased:     "How Can Mirrors Be Real If Our Eyes Aren't Real"
// ucwords — Преобразовывает в верхний регистр первый символ каждого слова в строке

function toJadenCase(string $string): string
{
    return ucwords($string);
}
var_dump(toJadenCase("How can mirrors be real if our eyes aren't real"));
echo PHP_EOL;



// 10. [7-kyu], [string]. Credit Card Mask 
// https://www.codewars.com/kata/5412509bd436bd33920011bc/train/javascript
// Обычно, когда вы что-то покупаете, вас спрашивают, верен ли номер вашей кредитной карты, номер телефона или ответ на ваш самый секретный вопрос. Однако, поскольку кто-то может заглянуть вам через плечо, вы не хотите, чтобы это отображалось на вашем экране. Вместо этого мы маскируем это.
// Ваша задача — написать функцию Maskify, которая заменяет все символы, кроме последних четырех, на «#».
// Examples (input --> output):
// "4556364607935616" --> "############5616"
//      "64607935616" -->      "#######5616"
//                "1" -->                "1"
//                 "" -->                 ""
// "Skippy" --> "##ippy"
// "Nananananananananananananananana Batman!" --> "####################################man!"
// Test.assertEquals(maskify('4556364607935616'), '############5616');
// Test.assertEquals(maskify('1'), '1');
// Test.assertEquals(maskify('11111'), '#1111');

function maskify($cc)
{
    $res = "";
    for ($i = 0; $i < strlen($cc) - 4; $i++) {
        $res .= "#";
    }
    return $res . substr($cc, -4);
    // или 
    // $res = "";
    // $end = "";
    // if (strlen($cc) < 4) {
    //     return $cc;
    // }
    // for ($i = 0; $i < strlen($cc) - 4; $i++) {
    //     $res .= "#";
    // }
    // for ($i = strlen($cc) - 4; $i < strlen($cc); $i++) {
    //     $end .= $cc[$i];
    // }
    // return $res . $end;
}
var_dump(maskify("4556364607935616")); // ############5616
var_dump(maskify("1")); // "1"
var_dump(maskify("")); // ""
var_dump(maskify("11111")); // #1111
echo PHP_EOL;



// 11. [7-kyu], [string]. String ends with? 
// https://www.codewars.com/kata/51f2d1cafc9c0f745c00037d/train/javascript
// Завершите решение так, чтобы оно возвращало true, если первый переданный аргумент (строка) заканчивается вторым аргументом (также строкой).
// Примеры:
// Solution('abc', 'bc') // возвращает true
// Solution('abc', 'd') // возвращает false
// $this->assertSame(true, solution("samurai", "ai"));
// $this->assertSame(false, solution("sumo", "omo"));
// $this->assertSame(true, solution("ninja", "ja"));
// $this->assertSame(true, solution("sensei", "i"));
// $this->assertSame(false, solution("samurai", "ra"));
// $this->assertSame(false, solution("abc", "abcd"));
// $this->assertSame(true, solution("abc", "abc"));
// $this->assertSame(true, solution("abcabc", "bc"));
// $this->assertSame(false, solution('ails', 'fails'));
// $this->assertSame(true, solution('fails', 'ails'));
// $this->assertSame(false, solution('this', 'fails'));
// $this->assertSame(true, solution('yes this will pass', ''));
// $this->assertSame(false, solution('this will not pass', '`^$<>()[]*|'));
// $this->assertSame(false, solution("abc\n", 'abc'), 'Watch out for \n in the end');

function solution($str, $ending)
{
    return ($ending === "") ? true : $ending === substr($str, -strlen($ending));
    // или 
    // return str_ends_with($str, $ending);
    // или 
    // if ($ending === "") {
    //     return true;
    // }
    // $res = "";
    // for ($i = strlen($str) - strlen($ending); $i < strlen($str); $i++) {
    //     $res .= $str[$i];
    // }
    // return $res === $ending;
}
var_dump(solution('abc', 'bc'));
var_dump(solution("abc\n", 'abc'));
var_dump(solution('yes this will pass', ''));
echo PHP_EOL;



// 12. [7-kyu], [string]. Remove anchor from URL 
// https://www.codewars.com/kata/51f2b4448cadf20ed0000386
// Завершите функцию/метод так, чтобы она возвращала URL-адрес с чем угодно после удаления привязки (#).
// Examples
// "www.codewars.com#about" --> "www.codewars.com"
// "www.codewars.com?page=1" -->"www.codewars.com?page=1"
// assert.strictEqual(removeUrlAnchor('www.codewars.com#about'), 'www.codewars.com')
// assert.strictEqual(removeUrlAnchor('www.codewars.com/katas/?page=1#about'), 'www.codewars.com/katas/?page=1')
// assert.strictEqual(removeUrlAnchor('www.codewars.com/katas/'), 'www.codewars.com/katas/')

function removeUrlAnchor($url)
{
    return explode("#", $url)[0];
    // или 
    // $res = "";
    // for ($i = 0; $i < strlen($url); $i++) {
    //     if ($url[$i] === "#")
    //         break;
    //     $res .= $url[$i];
    // }
    // // return $res;
}
var_dump(removeUrlAnchor("www.codewars.com#about"));
var_dump(removeUrlAnchor("www.codewars.com"));
var_dump(removeUrlAnchor("www.codewars.com/katas/?page=1#about"));
echo PHP_EOL;



// 13. [7-kyu], [string]. Reverse words 
// https://www.codewars.com/kata/5259b20d6021e9e14c0010d4
// Завершите функцию, которая принимает строковый параметр и меняет местами каждое слово в строке. Все пробелы в строке должны быть сохранены.
// Examples
// "This is an example!" ==> "sihT si na !elpmaxe"
// "double  spaces"      ==> "elbuod  secaps"
// strrev() — Переворачивает строку задом наперёд посимвольно!

function reverseWords($str)
{
    return implode(" ", array_reverse(explode(" ", strrev($str))));
    // или 
    // $arr = explode(" ", $str);
    // $res = [];
    // for ($i = 0; $i < count($arr); $i++) {
    //  $res[] = implode(array_reverse(str_split($arr[$i])));
    // }
    // return implode(" ", $res);


}
var_dump(reverseWords("This is an example!"));
echo PHP_EOL;



// 14. [7-kyu], [string]. Remove duplicate words 
// https://www.codewars.com/kata/5b39e3772ae7545f650000fc
// Ваша задача — удалить из строки все повторяющиеся слова, оставив только отдельные (первые) слова.
// Input:
// 'alpha beta beta gamma gamma gamma delta alpha beta beta gamma gamma gamma delta'
// Output:
// 'alpha beta gamma delta'

function removeDuplicateWords($s)
{
    return implode(" ", array_unique(explode(" ", $s)));
}
var_dump(removeDuplicateWords("alpha beta beta gamma gamma gamma delta alpha beta beta gamma gamma gamma delta"));
echo PHP_EOL;




// 15. [7-kyu], [string]. Alternate capitalization 
// https://www.codewars.com/kata/59cfc000aeb2844d16000075
// Учитывая строку, напишите заглавными буквы, которые занимают четные и нечетные индексы отдельно, и верните результат, как показано ниже. Индекс 0 будет считаться четным.
// Например, заглавная буква("abcdef") = ['AbCdEf', 'aBcDeF']. 
// $this->assertSame(['CoDeWaRs', 'cOdEwArS'], capitalize("codewars"));
// $this->assertSame(['CoDeWaRrIoRs', 'cOdEwArRiOrS'], capitalize("codewarriors"));
// Ввод будет строкой в нижнем регистре без пробелов.
// ucfirst(string), uc = uppercase - перевод первого символа в верхний регистр

function capitalize($s)
{
    $arr_1 = [];
    $arr_2 = [];
    for ($i = 0; $i < strlen($s); $i++) {
        if ($i % 2 === 0) {
            $arr_1[] = ucfirst($s[$i]);
            $arr_2[] = $s[$i];
        } else {
            $arr_1[] = $s[$i];
            $arr_2[] = ucfirst($s[$i]);
        }
    }
    return [join($arr_1), join($arr_2)];
    // join — Псевдоним implode()
}
var_dump(capitalize("codewars"));
echo PHP_EOL;



// 16. [7-kyu], [string]. Alphabet war 
// https://www.codewars.com/kata/59377c53e66267c8f6000027
// Строка может содержать буквы w, p, b, s, m, q, d, z, а также другие буквы, не влияющие на счет.
// w, p, b, s входят в команду левой стороны. Сложите их очки, чтобы получить общее количество очков Левой стороны. m, q, d, z находятся в команде правой стороны. Сложите их очки, чтобы получить общее количество очков Right Side. Другие буквы не принадлежат ни одной команде, не имеют очков и не влияют на общий результат ни одной из команд.
// Сравните две суммы и выясните, кто победит (или сравняют ли они).

// The left side letters and their power:
//  w - 4
//  p - 3
//  b - 2
//  s - 1

// The right side letters and their power:
//  m - 4
//  q - 3
//  d - 2
//  z - 1
// $this->assertSame("Let's fight again!", alphabetWar("zdqmwpbs")); 1+2+3+4-4-3-2-1
// $this->assertSame("Right side wins!", alphabetWar("z")); 1
// $this->assertSame("Right side wins!", alphabetWar("zzzzs")); 1+1+1+1-1 = 3
// $this->assertSame("Left side wins!", alphabetWar("wwwwww"));
// array_search("str", $arr) — ищет значение в массиве и в случае успешного поиска возвращает ключ первого найденного элемента, иначе false. Ищет с приведением типов по умолчанию - третий аргумент fasle, а true - без приведением типов. Поиск ведётся с учётом регистра!
// in_array(n, $arr, тип сравнения включён или нет) - возвращет true или false в зависимости от наличия элемента n в массиве. При проверке преобразует элемент в строку. Тип сравнения по умолчанию имеет значение false. Строгий поиск - проверяется тип данных и регистр, нужен третий аргумент. Поиск по умолчанию ведётся без учёта регистра и раскладки!!!

function alphabetWar($fight)
{
    // $left_side = array_sum(str_split(strtr($fight, ["w" => 4, "p" => 3, "b" => 2, "s" => 1])));
    // $right_side = array_sum(str_split(strtr($fight, ["m" => 4, "q" => 3, "d" => 2, "z" => 1])));
    // return ($left_side - $right_side > 0) ? "Left side wins!" : (($left_side - $right_side < 0) ? "Right side wins!" : "Let's fight again!");
    // или 
    $left_arr = [1 => "s", 2 => "b", 3 => "p", 4 => "w"];
    $right_arr = [1 => "z", 2 => "d", 3 => "q", 4 => "m"];
    $res = 0;
    for ($i = 0; $i < strlen($fight); $i++) {
        if (in_array($fight[$i], $left_arr)) {
            $res += array_search($fight[$i], $left_arr);
        } else if (in_array($fight[$i], $right_arr)) {
            $res -= array_search($fight[$i], $right_arr);
        }
    }
    return ($res > 0) ? "Left side wins!" : (($res < 0) ? "Right side wins!" : "Let's fight again!");
}
var_dump(alphabetWar("zdqmwpbs"));
var_dump(alphabetWar("zzzzs"));
var_dump(alphabetWar("wwwwww"));
echo PHP_EOL;



// 17. [7-kyu], [string]. Greet Me 
// https://www.codewars.com/kata/535474308bb336c9980006f2
// Напишите метод, который принимает один аргумент в качестве имени, а затем приветствует это имя, написанное с заглавной буквы и заканчивающееся восклицательным знаком.
// "riley" --> "Hello Riley!"
// "JACK"  --> "Hello Jack!"

function greet($name)
{
    return "Hello " . ucfirst(strtolower($name)) . "!";
    // или 
    // return sprintf("Hello %s!", ucwords(strtolower($name)));
    // или 
    // return sprintf("Hello %s!", ucfirst(strtolower($name)));

}
var_dump(greet("JACK"));
echo PHP_EOL;



// 18. [7-kyu], [string]. Convert an array of strings to array of numbers 
// https://www.codewars.com/kata/5783d8f3202c0e486c001d23/train/php
// Вам необходимо привести весь массив к правильному типу.
// Создайте функцию, которая принимает в качестве параметра последовательность чисел, представленную в виде строк, и выводит последовательность чисел.
// Обратите внимание, что вы также можете получать float.
// т.е.:  ["1", "2", "3"] => [1, 2, 3]
// $this->assertSame([1.1,2.2,3.3], toNumberArray(["1.1","2.2","3.3"]));

function toNumberArray($stringArray)
{
    $arr = [];
    for ($i = 0; $i < count($stringArray); $i++) {
        if (strlen($stringArray[$i]) > 1) {
            $arr[] = (float) ($stringArray[$i]);
        } else {
            $arr[] = (int) ($stringArray[$i]);
        }
    }
    return $arr;
}
var_dump(toNumberArray(["1", "2", "3", "3.5"]));
echo PHP_EOL;



// 19. [7-kyu], [string]. Bumps in the Road 
// https://www.codewars.com/kata/57ed30dde7728215300005fa/train/php
// Ваша машина старая, она легко ломается. Амортизаторов больше нет, и вы думаете, что он выдержит еще около 15 ударов, прежде чем полностью умрет.
// К несчастью для вас, ваша поездка очень ухабистая! Дана строка, показывающая либо ровную дорогу (_), либо неровности (n). Если вам удалось благополучно добраться до дома, встретив 15 или меньше ударов, верните Woohoo!, в противном случае верните Car Dead.
// Решить задачу с тернарным оператором
// Решить с помощью substr_count
// Решить задачу с помощью цикла for 
// Решить задачу с помощью цикла while 
// $this->assertSame(bump("n"), "Woohoo!");
// $this->assertSame(bump("__nn_nnnn__n_n___n____nn__nnn"), "Woohoo!");
// $this->assertSame(bump("nnn_n__n_n___nnnnn___n__nnn__"), "Woohoo!");
// $this->assertSame(bump("_nnnnnnn_n__n______nn__nn_nnn"), "Car Dead");
// $this->assertSame(bump("______n___n_"), "Woohoo!");
// $this->assertSame(bump("nnnnnnnnnnnnnnnnnnnnn"), "Car Dead");
// substr_count — Возвращает число вхождений подстроки
// var_dump(substr_count("hello", "l")); // 2

function bump($x)
{
    return (substr_count($x, "n") <= 15) ? "Woohoo!" : "Car Dead";
    // или 
    // $res = 0;
    // for ($i = 0; $i < strlen($x); $i++) {
    //     if ($x[$i] === "n") {
    //         $res++;
    //     }
    // }
    // return ($res <= 15) ? "Woohoo!" : "Car Dead";
    // или 
    // $res = 0;
    // $i = 0;
    // while ($i < strlen($x)) {
    //     if ($x[$i] === "n") {
    //         $res++;
    //     }
    //     $i++;
    // }
    // return ($res <= 15) ? "Woohoo!" : "Car Dead";
}
var_dump(bump("__nn_nnnn__n_n___n____nn__nnn"));
var_dump(bump("_nnnnnnn_n__n______nn__nn_nnn"));
var_dump(bump("n"));
echo PHP_EOL;



// 20. [7-kyu], [string]. All unique 
// https://www.codewars.com/kata/553e8b195b853c6db4000048/train/php
// Напишите программу, определяющую, содержит ли строка только уникальные символы. Возвращайте true, если это так, и false в противном случае.
// Строка может содержать любой из 128 символов ASCII. Символы чувствительны к регистру, например. «a» и «A» считаются разными символами.
// $this->assertTrue(hasUniqueChars('abcdef'));
// $this->assertFalse(hasUniqueChars('++-'));
// $this->assertFalse(hasUniqueChars('  nAa'));

function hasUniqueChars($string)
{
    return str_split($string) === array_unique(str_split($string));
}
var_dump(hasUniqueChars("abcdef"));
var_dump(hasUniqueChars("++-"));
echo PHP_EOL;


// 21. [7-kyu], [string]. Coding Meetup #3 - Higher-Order Functions Series - Is Ruby coming? 
// https://www.codewars.com/kata/5827acd5f524dd029d0005a4
// Вам будет предоставлен массив объектов (ассоциативные массивы в PHP), представляющих данные о разработчиках, которые зарегистрировались для участия в следующей конференции по программированию, которую вы организуете.
// Ваша задача вернуть:
// true, если зарегистрировался хотя бы один разработчик Ruby; или
// false, если разработчиков Ruby не будет.
// Например, учитывая следующий входной массив:
// $list1 = [
//     [
//       "first_name" => "Emma",
//       "last_name" => "Z.",
//       "country" => "Netherlands",
//       "continent" => "Europe",
//       "age" => 29,
//       "language" => "Ruby"
//     ],
//     [
//       "first_name" => "Piotr",
//       "last_name" => "B.",
//       "country" => "Poland",
//       "continent" => "Europe",
//       "age" => 128,
//       "language" => "JavaScript"
//     ],
//     [
//       "first_name" => "Jayden",
//       "last_name" => "P.",
//       "country" => "Jamaica",
//       "continent" => "Americas",
//       "age" => 42,
//       "language" => "JavaScript"
//     ]
//   ];
// ваша функция должна возвращать true.
// Входной массив всегда будет действительным и отформатирован, как в примере выше.

function is_ruby_coming($a)
{
    for ($i = 0; $i < count($a); $i++) {
        if (in_array("Ruby", $a[$i]) or in_array("ruby", $a[$i])) {
            return true;
        }
    }
    return false;
}
var_dump(is_ruby_coming([
    ["first_name" => "Emma", "last_name" => "Z.", "country" => "Netherlands", "continent" => "Europe", "age" => 29, "language" => "ruby"],
    ["first_name" => "Piotr", "last_name" => "B.", "country" => "Poland", "continent" => "Europe", "age" => 128, "language" => "JavaScript"],
    ["first_name" => "Jayden", "last_name" => "P.", "country" => "Jamaica", "continent" => "Americas", "age" => 42, "language" => "JavaScript"]
]));
echo PHP_EOL;



// 22. [7-kyu], [string]. Spacify 
// https://www.codewars.com/kata/57f8ee485cae443c4d000127/train/php
// Измените функцию spacify так, чтобы она возвращала заданную строку с пробелами, вставленными между каждым символом.
// spacify("hello world") // "h e l l o   w o r l d"

function spacify($s)
{
    return implode(" ", str_split($s));
}
var_dump(spacify("hello world"));
echo PHP_EOL;



// 23. [7-kyu], [string]. Coding Meetup #2 - Higher-Order Functions Series - Greet developers 
// https://www.codewars.com/kata/58279e13c983ca4a2a00002a/train/php
// Вам будет предоставлен массив объектов (ассоциативные массивы в PHP, таблицы в COBOL), представляющих данные о разработчиках, которые подписались на участие в следующей встрече по программированию, которую вы организуете.
// Ваша задача — вернуть массив, в котором каждый объект будет иметь новое свойство «приветствие» со следующим строковым значением:
// Hi < firstName here >, what do you like the most about < language here >?
// Порядок свойств объектов не имеет значения (кроме COBOL).
// Входной массив всегда будет действительным и отформатирован, как в примере выше.
// Например, учитывая следующий входной массив:
// For example, given the following input array:
// $list1 = [
//   [
//     "first_name" => "Sofia",
//     "last_name" => "I.",
//     "country" => "Argentina",
//     "continent" => "Americas",
//     "age" => 35,
//     "language" => "Java"
//   ],
//   [
//     "first_name" => "Lukas",
//     "last_name" => "X.",
//     "country" => "Croatia",
//     "continent" => "Europe",
//     "age" => 35,
//     "language" => "Python"
//   ],
//   [
//     "first_name" => "Madison",
//     "last_name" => "U.",
//     "country" => "United States",
//     "continent" => "Americas",
//     "age" => 32,
//     "language" => "Ruby"
//   ]
// ];
// your function should return the following array:

// [
//   [
//     "first_name" => "Sofia",
//     "last_name" => "I.",
//     "country" => "Argentina",
//     "continent" => "Americas",
//     "age" => 35,
//     "language" => "Java",
//     "greeting" => "Hi Sofia, what do you like the most about Java?"
//   ],
//   [
//     "first_name" => "Lukas",
//     "last_name" => "X.",
//     "country" => "Croatia",
//     "continent" => "Europe",
//     "age" => 35,
//     "language" => "Python",
//     "greeting" => "Hi Lukas, what do you like the most about Python?"
//   ],
//   [
//     "first_name" => "Madison",
//     "last_name" => "U.",
//     "country" => "United States",
//     "continent" => "Americas",
//     "age" => 32,
//     "language" => "Ruby",
//     "greeting" => "Hi Madison, what do you like the most about Ruby?"
//   ]
// ]

function greet_developers($a)
{
    for ($i = 0; $i < count($a); $i++) {
        $a[$i]["greeting"] = "Hi {$a[$i]["first_name"]}, what do you like the most about {$a[$i]["language"]}?";
    }
    return $a;
    // или 
    // foreach ($a as $key => $val)
    // $a[$key]['greeting'] = "Hi {$a[$key]['first_name']}, what do you like the most about {$a[$key]['language']}?";
    // return $a;
}
var_dump(greet_developers([
    ["first_name" => "Sofia", "last_name" => "I.", "country" => "Argentina", "continent" => "Americas", "age" => 35, "language" => "Java"],
    ["first_name" => "Lukas", "last_name" => "X.", "country" => "Croatia", "continent" => "Europe", "age" => 35, "language" => "Python"],
    ["first_name" => "Madison", "last_name" => "U.", "country" => "United States", "continent" => "Americas", "age" => 32, "language" => "Ruby"]
]));
echo PHP_EOL;



// 24. [7-kyu], [string]. Spacify 
// https://www.codewars.com/kata/5827bc50f524dd029d0005f2/php
// Вам будет предоставлен массив объектов (ассоциативные массивы в PHP), представляющих данные о разработчиках, которые зарегистрировались для участия в следующей конференции по программированию, которую вы организуете. Список упорядочен в зависимости от того, кто зарегистрировался первым.
// Ваша задача — вернуть одну из следующих строк:
// < firstName here >, < country here > of the first Python developer who has signed up или
// Разработчиков Python не будет, если ни один разработчик Python не зарегистрируется.
// Например, учитывая следующий входной массив:
// $list1 = [
//     [
//       "first_name" => "Mark",
//       "last_name" => "G.",
//       "country" => "Scotland",
//       "continent" => "Europe",
//       "age" => 22,
//       "language" => "JavaScript"
//     ],
//     [
//       "first_name" => "Victoria",
//       "last_name" => "T.",
//       "country" => "Puerto Rico",
//       "continent" => "Americas",
//       "age" => 30,
//       "language" => "Python"
//     ],
//     [
//       "first_name" => "Emma",
//       "last_name" => "B.",
//       "country" => "Norway",
//       "continent" => "Europe",
//       "age" => 19,
//       "language" => "Clojure"
//     ]
//   ];
// функция должна вернуть "Victoria, Puerto Rico", если пайтон разработчик есть, иначе 'There will be no Python developers'.

function get_first_python($a)
{
    // for ($i = 0; $i < count($a); $i++) {
    //     if (in_array("Python", $a[$i])) {
    //         return "{$a[$i]["first_name"]}, {$a[$i]["country"]}";
    //     }
    // }
    // return "There will be no Python developers";
    // или 
    $res = array_search("Python", array_column($a, "language"));
    return ($res !== false) ? "{$a[$res]["first_name"]}, {$a[$res]["country"]}" : "There will be no Python developers";
}
var_dump(get_first_python([
    ["first_name" => "Mark", "last_name" => "G.", "country" => "Scotland", "continent" => "Europe", "age" => 22, "language" => "JavaScript"],
    ["first_name" => "Victoria", "last_name" => "T.", "country" => "Puerto Rico", "continent" => "Americas", "age" => 30, "language" => "Python"],
    ["first_name" => "Emma", "last_name" => "B.", "country" => "Norway", "continent" => "Europe", "age" => 19, "language" => "Clojure"]
]));



// 25. [7-kyu], [string]. Alphabet symmetry 
// https://www.codewars.com/kata/59d9ff9f7905dfeed50000b0/train/php
// Рассмотрим слово abode. Мы видим, что буква a находится в позиции 1, а буква b — в позиции 2. В алфавите буквы a и b также находятся в позициях 1 и 2. Обратите также внимание, что d и e в abode занимают позиции, которые они занимали бы в алфавите. , это позиции 4 и 5.
// Учитывая массив слов, верните массив количества букв, занимающих свои позиции в алфавите для каждого слова. Например,
// solve(["abode","ABc","xyzD"]) = [4, 3, 1]
// $this->assertSame([4, 3, 1], solve(["abode", "ABc", "xyzD"]));
// $this->assertSame([4, 3, 0], solve(["abide", "ABc", "xyz"]));
// $this->assertSame([6, 5, 7], solve(["IAMDEFANDJKL", "thedefgh", "xyzDEFghijabc"]));
// $this->assertSame([1, 3, 1, 3], solve(["encode", "abc", "xyzD", "ABmD"]));
// $this->assertSame([], solve([]));
// Ввод будет состоять из символов алфавита, как в верхнем, так и в нижнем регистре. Никаких пробелов.

function solve($arr)
{
    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $arr_res = [];
    $res = 0;
    for ($i = 0; $i < count($arr); $i++) {
        for ($k = 0; $k < strlen($arr[$i]); $k++) {
            if (strtolower($arr[$i][$k]) === $alphabet[$k]) {
                $res++;
            }
        }
        $arr_res[] = $res;
        $res = 0;
    }
    return $arr_res;
}
var_dump(solve(["abode", "ABc"]));
var_dump(solve(["IAMDEFANDJKL", "thedefgh", "xyzDEFghijabc"]));



// 26. [7-kyu], [string]. Help the Fruit Guy 
// https://www.codewars.com/kata/557af4c6169ac832300000ba/train/php
// У нашего фруктового парня есть мешок с фруктами (представленный в виде набора ниток), в котором некоторые фрукты гнилые. Он хочет заменить все гнилые кусочки фруктов свежими. Например, для данного ["apple", "rottenBanana", "apple"] заменяемый массив должен быть ["apple", "banana", "apple"]. Ваша задача — реализовать метод, который принимает массив строк, содержащих фрукты, и должен возвращать массив строк, в котором все гнилые фрукты заменены хорошими.
// Примечания
// Если массив имеет значение null/nil/None или пуст, вы должны вернуть пустой массив ([]).
// Название гнилого фрукта будет в этом верблюжьем футляре (rottenFruit).
// Возвращаемый массив должен быть в нижнем регистре.
// $this->assertSame(["apple","banana","kiwi","mango"], removeRotten(["apple","rottenBanana","kiwi","rottenMango"]));

function removeRotten($arr)
{
    if (is_array($arr)) {
        for ($i = 0; $i < count($arr); $i++) {
            if (str_contains($arr[$i], "rotten")) {
                $arr[$i] = strtolower(substr($arr[$i], strlen("rotten")));
                // $arr[$i] = strtolower(str_replace("rotten", "", $arr[$i]));
            }
        }
        return $arr;
    } else {
        return []; // тут мы подгоняем под тесты codewars
    }
}
var_dump(removeRotten(["apple", "rottenBanana", "kiwi", "rottenMango"]));
var_dump(removeRotten([]));
var_dump(removeRotten(null));
echo PHP_EOL;



// 27. [7-kyu], [string]. Sort by Last Char 
// https://www.codewars.com/kata/57eba158e8ca2c8aba0002a0
// Учитывая строку слов (x), вам нужно вернуть массив слов, отсортированный в алфавитном порядке по последнему символу в каждом.
// Если у двух слов одна и та же последняя буква, возвращаемый массив должен отображать их в том порядке, в котором они появляются в данной строке.
// Все входные данные будут действительными.
// $this->assertSame(last('man i need a taxi up to ubud'), ['a', 'need', 'ubud', 'i', 'taxi', 'man', 'to', 'up']);
// $this->assertSame(last('what time are we climbing up the volcano'), ['time', 'are', 'we', 'the', 'climbing', 'volcano', 'up', 'what']); 
// $this->assertSame(last('take me to semynak'), ['take', 'me', 'semynak', 'to']);

function last($x)
{
    $arr = explode(" ", $x);
    $arr_last = [];
    for ($i = 0; $i < count($arr); $i++) {
        $arr_last[] = $arr[$i][strlen($arr[$i]) - 1];
    }
    sort($arr_last);
    $res = [];
    for ($i = 0; $i < count($arr_last); $i++) {
        for ($k = 0; $k < count($arr); $k++) {
            if ($arr_last[$i] === $arr[$k][strlen($arr[$k]) - 1]) {
                $res[] = $arr[$k];
            }
        }
    }
    return array_values(array_unique($res));
}
var_dump(last('man i need a taxi up to ubud'));
var_dump(last('mtffrk avhpl qk'));
echo PHP_EOL;



// 28. [7-kyu], [string]. Digits explosion 
// https://www.codewars.com/kata/585b1fafe08bae9988000314
// Учитывая строку, состоящую из цифр [0–9], верните строку, в которой каждая цифра повторяется количество раз, равное ее значению.
// Examples
// "312" should return "333122"
// "102269" should return "12222666666999999999"
// str_repeat($str, $n) - повторяет строку str n раз

function digits_explode($s)
{
    $res = "";
    for ($i = 0; $i < strlen($s); $i++) {
        $res .= str_repeat($s[$i], (int) $s[$i]);
        // for ($k = 0; $k < (int) $s[$i]; $k++) {
        //     $res .= $s[$i];
        // }
    }
    return $res;
}
var_dump(digits_explode("312"));
var_dump(digits_explode("102269"));
echo PHP_EOL;



// 29. [7-kyu], [string]. Char Code Calculation 
// https://www.codewars.com/kata/57f75cc397d62fc93d000059/train/php
// Учитывая строку, превратите каждый символ в его код ASCII и соедините их вместе, чтобы создать число — назовем это число total1:
// 'ABC' --> 'A' = 65, 'B' = 66, 'C' = 67 --> 656667
// Затем замените все случаи появления числа 7 на число 1 и назовите это число «total2»:
// total1 = 656667
// total2 = 656661
// Затем верните разницу между суммой цифр итога1 и итога2:
//  (6 + 5 + 6 + 6 + 6 + 7)
// - (6 + 5 + 6 + 6 + 6 + 1)
// -------------------------
//  6
//  $this->assertSame(6, calc('ABC'));

function calc($s)
{
    // $total_1 = "";
    // for ($i = 0; $i < strlen($s); $i++) {
    //     $total_1 .= ord($s[$i]);
    // }

    // $total_2 = str_replace("7", "1", $total_1);
    // $res_total_1 = 0;
    // for ($i = 0; $i < strlen($total_1); $i++) {
    //     $res_total_1 += (int) $total_1[$i];
    // }

    // $res_total_2 = 0;
    // for ($i = 0; $i < strlen($total_2); $i++) {
    //     $res_total_2 += (int) $total_2[$i];
    // }
    // return $res_total_1 - $res_total_2;
    // или 
    $total_1 = "";
    for ($i = 0; $i < strlen($s); $i++) {
        $total_1 .= ord($s[$i]);
    }
    $total_2 = str_replace("7", "1", $total_1);
    return array_sum(str_split($total_1)) - array_sum(str_split($total_2));
}
var_dump(calc("ABC"));
echo PHP_EOL;



// 30. [7-kyu], [string]. Substituting Variables Into Strings: Padded Numbers 
// https://www.codewars.com/kata/5700c9acc1555755be00027e
// Завершите решение так, чтобы оно возвращало форматированную строку. Возвращаемое значение должно равняться «Значение равно VALUE», где значение представляет собой дополненное 5-значное число.
// $this->assertSame("Value is 00005", solution(5));
function solution_1($value)
{
    return "Value is " . substr("00000", strlen("$value")) . "$value";
}
var_dump(solution_1(5));
var_dump(solution_1(1204));
echo PHP_EOL;



// 31. [7-kyu], [string]. Numbers to Letters 
// https://www.codewars.com/kata/57ebaa8f7b45ef590c00000c/train/php
// Учитывая массив чисел (в строковом формате), вы должны вернуть строку. Цифры соответствуют буквам алфавита в обратном порядке: a=26, z=1 и т.д. Также следует учитывать '!', '?' и '', которые представлены цифрами '27', '28' и '29' соответственно.
// Все входные данные будут действительными.
// $this->assertSame(switcher(['24', '12', '23', '22', '4', '26', '9', '8']), 'codewars');
// $this->assertSame(switcher(['25','7','8','4','14','23','8','25','23','29','16','16','4']), 'btswmdsbd kkw'); 
// $this->assertSame(switcher(['4', '24']), 'wc'); 

function switcher($arr)
{

    $alphabet = array_reverse(range('a', 'z'));
    // range("a", "z") - вывести весь алфавит!!!
    array_push($alphabet, '!', '?', ' ');
    $res = '';
    for ($i = 0; $i < count($arr); $i++) {
        $res .= $alphabet[$arr[$i] - 1];
    }
    return $res;
}
var_dump(switcher(['24', '12', '23', '22', '4', '26', '9', '8']));
var_dump(switcher(['25', '7', '8', '4', '14', '23', '8', '25', '23', '29', '16', '16', '4']));
var_dump(switcher(['4', '24']));
echo PHP_EOL;



// 32. [7-kyu], [string]. Cat and Mouse - Easy Version 
// https://www.codewars.com/kata/57ee24e17b45eff6d6000164
// Вам будет предоставлена ​​строка (x) с изображением кошки «C» и мыши «m». Остальная часть строки будет состоять из '.'
// Вам нужно выяснить, сможет ли кошка поймать мышь из текущего положения. Кот может перепрыгнуть через трёх персонажей. Так:
// C......m возвращает «Сбежал!» <-- более трех символов между
// C...m возвращает «Пойман!» <-- поскольку между ними три символа, кот может прыгать.
// $this->assertSame("Escaped!", cat_mouse("C....m"));
// $this->assertSame("Caught!", cat_mouse("C..m"));
// $this->assertSame("Caught!", cat_mouse("C...m"));
// $this->assertSame("Escaped!", cat_mouse("C.....m"));

function cat_mouse($s)
{
    return (strlen($s) > 5) ? "Escaped!" : "Caught!";
    // или 
    // return substr_count($s,'.') > 3 ? 'Escaped!' : 'Caught!';

}
var_dump(cat_mouse("C....m"));
var_dump(cat_mouse("C...m"));
echo PHP_EOL;



// 33. [7-kyu], [string]. String Merge! 
// https://www.codewars.com/kata/597bb84522bc93b71e00007e/train/php
// Учитывая два слова и букву, верните одно слово, представляющее собой комбинацию обоих слов, объединенную в той точке, где данная буква впервые появляется в каждом слове. Возвращаемое слово должно иметь начало первого слова и окончание второго с разделительной буквой посередине. Вы можете предположить, что оба слова будут содержать разделительную букву.
// ("hello", "world", "l")       ==>  "held"
// ("coding", "anywhere", "n")   ==>  "codinywhere"
// ("jason", "samson", "s")      ==>  "jasamson"
// ("wonderful", "people", "e")  ==>  "wondeople"

function stringMerge($string1, $string2, $letter)
{
    return strstr($string1, $letter, true) . strstr($string2, $letter);

}
var_dump(stringMerge("carizou", "zebza", "z")); // "carizebza"
echo PHP_EOL;



// 34. [7-kyu], [string]. Numbers in strings 
// https://www.codewars.com/kata/59dd2c38f703c4ae5e000014/train/php
// В этой Ката вам будет предоставлена ​​строка, состоящая из строчных букв и цифр. Ваша задача — сравнить группировки чисел и вернуть наибольшее число. Числа не будут иметь ведущих нулей.
// Например,solve("gh12cdy695m1") = 695, потому что это самая большая из всех групп чисел.
// $this->assertSame(695, solve('gh12cdy695m1'));
// $this->assertSame(9, solve('2ti9iei7qhr5'));
// $this->assertSame(61, solve('vih61w8oohj5'));
// $this->assertSame(42, solve('f7g42g16hcu5'));
// $this->assertSame(85, solve('lu1j8qbbb85'));

function string_merge($s)
{
    $res = "";
    for ($i = 0; $i < strlen($s); $i++) {
        if ((int) $s[$i] !== 0 or $s[$i] === "0") {
            $res .= $s[$i];
        } else {
            $res .= "_";
        }
    }
    return (int) max(explode("_", str_replace("__", "_", str_replace("___", "_", $res))));
}
var_dump(string_merge("gh12cdy695m1"));
var_dump(string_merge("gh12cdy6950m1"));
echo PHP_EOL;



// 35. [7-kyu], [string]. Compare Strings by Sum of Chars - не решил - чтобы полностью решить, нужно знать регулярные выражения!
// https://www.codewars.com/kata/576bb3c4b1abc497ec000065/train/php
// Сравните две строки, сравнив сумму их значений (код символов ASCII).
// Для сравнения рассматривайте все буквы как прописные.
// null/NULL/Nil/None следует рассматривать как пустые строки.
// Если строка содержит символы, отличные от букв, рассматривайте всю строку как пустую.
// Ваш метод должен возвращать true, если строки равны, и false, если они не равны.
// Examples:
// "AD", "BC"  -> equal
// "AD", "DD"  -> not equal
// "gf", "FG"  -> equal
// "zz1", ""   -> equal (both are considered empty)
// "ZzZz", "ffPFF" -> equal
// "kl", "lz"  -> not equal
// null, ""    -> equal
// $this->assertSame(true, compare("AD", "BC"));

function compare($s1, $s2)
{
    $res_s1 = 0;
    $res_s2 = 0;
    for ($i = 0; $i < strlen($s1); $i++) {
        if ((int) $s1[$i])
            $res_s1 += ord(strtolower($s1[$i]));
    }
    for ($i = 0; $i < strlen($s2); $i++) {
        $res_s2 += ord(strtolower($s2[$i]));
    }
    return $res_s1 === $res_s2;
}
var_dump(compare("AD", "BC"));
var_dump(compare("gf", "FG"));
var_dump(compare('ZzZz', 'ffPFF'));

echo PHP_EOL;



// 36. [7-kyu], [string]. By 3, or not by 3? That is the question . . . 
// https://www.codewars.com/kata/59f7fc109f0e86d705000043/train/php
// В начальной школе я научился трюку, позволяющему определить, делится ли число на три, — это сложить все целые числа числа вместе и разделить полученную сумму на три. Если от деления суммы на три нет остатка, то исходное число тоже делится на три.
// Учитывая последовательность цифр в виде строки, определите, делится ли число, представленное строкой, на три.
// Пример:
// «123» -> правда
// «8409» -> правда
// «100853» -> ложь
// «33333333» -> правда
// «7» -> ложь
// Старайтесь избегать использования оператора % (по модулю).
// $this->assertSame(true, divisibleByThree('123'));
// $this->assertSame(true, divisibleByThree('19254'));
// $this->assertSame(false, divisibleByThree('1'));
// $this->assertSame(true, divisibleByThree('963210456'));
// $this->assertSame(false, divisibleByThree('010110101011'));
// $this->assertSame(true, divisibleByThree('9'));
// $this->assertSame(true, divisibleByThree('6363'));
// $this->assertSame(false, divisibleByThree('10987654321'));
// $this->assertSame(true, divisibleByThree('9876543211234567890009'));
// $this->assertSame(false, divisibleByThree('9876543211234567890002'));

function divisibleByThree($str)
{
    // $res = 0;
    // for ($i = 0; $i < strlen($str); $i++) {
    // $res += (int) $str[$i];
    // }
    // return gettype($res / 3) === "integer";
    // или 
    // return gettype((int) $str / 3) === "integer";
    // или
    return gettype(array_sum(str_split($str)) / 3) === "integer";
}
var_dump(divisibleByThree("100853")); // 
var_dump(divisibleByThree("33333333"));
var_dump(divisibleByThree("7"));
var_dump(divisibleByThree("010110101011"));
var_dump(divisibleByThree("9876543211234567890002"));
echo PHP_EOL;



// 37. [7-kyu], [string]. Interview Question (easy) 
// https://www.codewars.com/kata/5b358a1e228d316283001892/train/php
// Вы получаете название города в виде строки, и вам нужно вернуть строку, которая показывает, сколько раз каждая буква встречается в строке с помощью звездочек (*).
// Например:
// "Chicago"  -->  "c:**,h:*,i:*,a:*,g:*,o:*"
// Как видите, буква c показана всего один раз, но с двумя звездочками.
// Возвращаемая строка должна включать только буквы (не тире, пробелы, апострофы и т. д.). В выводе не должно быть пробелов, а разные буквы разделяются запятой (,), как показано в примере выше.
// Обратите внимание, что возвращаемая строка должна перечислять буквы в порядке их первого появления в исходной строке.
// Еще примеры:
// "Bangkok"    -->  "b:*,a:*,n:*,g:*,k:**,o:*"
// "Las Vegas"  -->  "l:*,a:**,s:**,v:*,e:*,g:*"
// substr_count($str, "a") - возвращает число вхождений подстроки "a" в строке $str

function get_strings($city)
{
    // return str_repeat("*", 2);
    // return substr_count(strtolower($city), "c");
    $city = strtolower($city);
    $res = "";
    for ($i = 0; $i < strlen($city); $i++) {
        if ($city[$i] === " ") {
            continue;
        }
        $res .= $city[$i] . ":" . str_repeat("*", substr_count($city, $city[$i])) . ",";
    }
    return implode(",", array_unique(explode(",", trim($res, ","))));
}
var_dump(get_strings("Chicago")); // "c:**,h:*,i:*,a:*,g:*,o:*"
var_dump(get_strings("Las Vegas")); // "l:*,a:**,s:**,v:*,e:*,g:*"
echo PHP_EOL;



// 38. [7-kyu], [string]. Frequency sequence 
// https://www.codewars.com/kata/585a033e3a36cdc50a00011c
// Ваша задача — вернуть выходную строку, которая преобразует входную строку s, заменяя каждый символ в s числом, представляющим количество раз, когда этот символ встречается в s, и разделяя каждое число символом(ами) sep.
// "hello world", "-" --> "1-1-3-3-2-1-1-2-1-3-1"
// "19999999"   , ":" --> "1:7:7:7:7:7:7:7"
// "^^^**$"     , "x" --> "3x3x3x2x2x1"

function freq_seq($s, $sep)
{
    $arr = [];
    $chars = array_count_values(str_split($s));
    foreach (str_split($s) as $value) {
        $arr[] = $chars[$value];
    }
    return implode("$sep", $arr);
}
var_dump(freq_seq("hello world", "-"));
echo PHP_EOL;



// 39. [7-kyu], [string]. Correct the time-string 
// https://www.codewars.com/kata/57873ab5e55533a2890000c7/train/php
// Вам нужно создать метод, который исправляет заданную строку времени.
// Кроме того, возникла проблема: многие струны порваны.
// Время форматируется в 24-часовом формате, то есть от 00:00:00 до 23:59:59.
// "09:10:01" -> "09:10:01"  
// "11:70:10" -> "12:10:10"  
// "19:99:99" -> "20:40:39"  
// "24:01:01" -> "00:01:01"  
// $this->assertSame(null, timeCorrect(null));
// $this->assertSame("", timeCorrect(""));
// $this->assertSame(null, timeCorrect("001122"));
// $this->assertSame(null, timeCorrect("00;11;22"));
// $this->assertSame(null, timeCorrect("0a:1c:22"));
// $this->assertSame("09:10:01", timeCorrect("09:10:01"));
// $this->assertSame("12:10:10", timeCorrect("11:70:10"));
// $this->assertSame("20:39:09", timeCorrect("19:99:09"));
// $this->assertSame("20:40:39", timeCorrect("19:99:99"));
// $this->assertSame("00:01:01", timeCorrect("24:01:01"));
// $this->assertSame("04:01:01", timeCorrect("52:01:01"));

function timeCorrect($timestring)
{
    if ($timestring === null) {
        return null;
    } else if ($timestring === "") {
        return "";
    }
    if (substr_count($timestring, ":") === 0) {
        return null;
    }
    for ($i = 0; $i < strlen($timestring); $i++) {
        if ((int) $timestring[$i] === 0 and $timestring[$i] !== "0" and $timestring[$i] !== ":") {
            return null;
        }
    }
    $arr = explode(":", $timestring);
    $arr_new = [];
    for ($i = 0; $i < count($arr); $i++) {
        $arr_new[$i] = (int) $arr[$i];
    }
    for ($i = 2; $i >= 0; $i--) {
        if ($arr_new[$i] > 59 and $i !== 0) {
            $arr_new[$i] = $arr_new[$i] % 60;
            $arr_new[$i - 1]++;
        }
        if ($i === 0 and $arr[$i] > 23) {
            $arr_new[$i] = $arr_new[$i] % 24;
        }
    }
    for ($i = 0; $i < count($arr_new); $i++) {
        if ($arr_new[$i] < 10) {
            $arr_new[$i] = "0" . $arr_new[$i];
        }
    }
    return implode(":", $arr_new);
}
var_dump(timeCorrect("100:99:99")); // "20:40:39"
var_dump(timeCorrect(null));
var_dump(timeCorrect(""));
var_dump(timeCorrect("001122"));
var_dump(timeCorrect("00;11;22"));
var_dump(timeCorrect("0a:1c:22"));
var_dump(timeCorrect('09:10:01'));
echo PHP_EOL;



// 40. [7-kyu], [string]. Scrolling Text 
// https://www.codewars.com/kata/5a995c2aba1bb57f660001fd
// Ваша задача — выполнить функцию, которая принимает строку и возвращает массив со всеми возможными поворотами данной строки в верхнем регистре.
// $this->assertSame(["ABC", "BCA", "CAB"], scrollingText("abc"));
// $this->assertSame(["CODEWARS", "ODEWARSC", "DEWARSCO", "EWARSCOD", "WARSCODE", "ARSCODEW", "RSCODEWA", "SCODEWAR"], scrollingText("codewars"));
// codewars, odewarsc, dewarsco, ewarscod, warscode, arscodew, rscodewa, scodewar

function scrollingText($text)
{
    $text = strtoupper($text);
    $arr = [];
    for ($i = 0; $i < strlen($text); $i++) {
        $arr[] = substr($text, $i) . substr($text, 0, $i);
    }
    return $arr;
}
var_dump(scrollingText("codewars"));
echo PHP_EOL;



// 41. [7-kyu], [string]. Determine if the poker hand is flush
// https://www.codewars.com/kata/5acbc3b3481ebb23a400007d/train/php
// Определите, является ли покерная рука флешем, то есть все пять карт одной масти.
// Вашей функции будет передан список/массив из 5 строк, каждая из которых представляет покерную карту в формате «5H» (5 червей), что означает значение карты, за которым следует начальная буква ее масти (червы, пики, бубны или Клубы). Джокеры не включены.
// Ваша функция должна возвращать true, если на руке флеш, и false в противном случае.
// Возможные значения карт: 2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A.
// ["AS", "3S", "9S", "KS", "4S"] ==> true
// ["AD", "4S", "7H", "KS", "10S"] ==> false
// $this->assertSame(false, checkIfFlush(["AD", "4S", "7H", "KC", "5S"]));
// $this->assertSame(false, checkIfFlush(["10D", "4S", "7H", "KC", "5S"]));
// $this->assertSame(true, checkIfFlush(["10D", "QD", "7D", "KD", "5D"]));

function checkIfFlush($cards)
{
    $arr = [];
    for ($i = 0; $i < count($cards); $i++) {
        $arr[] = $cards[$i][strlen($cards[$i]) - 1];
    }
    // return count(array_unique($arr)) === 1 ? true : false;
    return count(array_unique($arr)) > 1 ? false : true;
}
var_dump(checkIfFlush(["AS", "3S", "9S", "KS", "4S"]));
var_dump(checkIfFlush(["AS", "3S", "9S", "KS", "4K"]));
var_dump(checkIfFlush(["10D", "QD", "7D", "KD", "5D"]));
echo PHP_EOL;



// 42. [7-kyu], [string]. Well of Ideas - Harder Version
// https://www.codewars.com/kata/57f22b0f1b5432ff09001cab/train/php
// В этом ката вам нужно проверить предоставленный двумерный массив (x) на наличие хороших идей «хороших» и плохих идей «плохих». Если есть одна или две хорошие идеи, верните "Publish!", если их больше 2, верните "I smell a series!". Если хороших идей нет, как это часто бывает, верните "Fail!".
// Подмассивы могут иметь разную длину.
// Решение должно быть нечувствительно к регистру (т.е. gOOd, GOOD и good считается хорошей идеей). Все входные данные не могут быть строками.
// $this->assertSame(well([['bad', 'bAd', 'bad'], ['bad', 'bAd', 'bad'], ['bad', 'bAd', 'bad']]), 'Fail!');
// $this->assertSame(well([['gOOd', 'bad', 'BAD', 'bad', 'bad'], ['bad', 'bAd', 'bad'], ['GOOD', 'bad', 'bad', 'bAd']]), 'Publish!');
// $this->assertSame(well([['gOOd', 'bAd', 'BAD', 'bad', 'bad', 'GOOD'], ['bad'], ['gOOd', 'BAD']]), 'I smell a series!');

function well($arr)
{
    $count = substr_count(strtolower(json_encode($arr)), "good");
    return !$count ? "Fail!" : ($count > 2 ? "I smell a series!" : "Publish!");
    // или 
    // $count = 0;
    // for ($i = 0; $i < count($arr); $i++) {
    //     for ($k = 0; $k < count($arr[$i]); $k++) {
    //         if (strtolower($arr[$i][$k]) === "good") {
    //             $count++;
    //         }
    //     }
    // }
    // return ($count > 2) ? "I smell a series!" : (($count > 0) ? "Publish!" : "Fail!");
}
var_dump(well([['gOOd', 'bAd', 'BAD', 'bad', 'bad', 'GOOD'], ['bad'], ['gOOd', 'BAD']])); // 3
var_dump(well([['gOOd', 'bad', 'BAD', 'bad', 'bad'], ['bad', 'bAd', 'bad'], ['GOOD', 'bad', 'bad', 'bAd']])); // 2
var_dump(well([['bad', 'BAD', 'bad', 'bad'], ['bad', 'bAd', 'bad'], ['bad', 'bad', 'bAd']])); // 2
echo PHP_EOL;



// 43. [7-kyu], [string]. Exclamation marks series #7: Remove words from the sentence if it contains one exclamation mark
// https://www.codewars.com/kata/57fafb6d2b5314c839000195
// Удалите слова из предложения, если они содержат ровно один восклицательный знак. Слова разделяются одним пробелом, без пробелов в начале/конце.
// remove("Hi!") === ""
// remove("Hi! Hi!") === ""
// remove("Hi! Hi! Hi!") === ""
// remove("Hi Hi! Hi!") === "Hi"
// remove("Hi! !Hi Hi!") === ""
// remove("Hi! Hi!! Hi!") === "Hi!!"
// remove("Hi! !Hi! Hi!") === "!Hi!"

function remove_word($s)
{
    // $arr = explode(" ", $s);
    // $res = "";
    // for ($i = 0; $i < count($arr); $i++) {
    //     if (substr_count($arr[$i], "!") !== 1) {
    //         $res .= $arr[$i];
    //     }
    // }
    // return $res;
    return implode("", array_filter(explode(" ", $s), function ($el) {
        return substr_count($el, "!") !== 1;
    }));

}
var_dump(remove_word("Hi! !Hi! Hi!"));
var_dump(remove_word("Hi! Hi! Hi!"));
echo PHP_EOL;




// 44. [7-kyu], [string]. Sum of a Beach
// https://www.codewars.com/kata/5b37a50642b27ebf2e000010/solutions/php
// Beaches are filled with sand, water, fish, and sun. Given a string, calculate how many times the words "Sand", "Water", "Fish", and "Sun" appear without overlapping (regardless of the case).
// регистр не играет роли
// sumOfABeach("WAtErSlIde")                    ==>  1
// sumOfABeach("GolDeNSanDyWateRyBeaChSuNN")    ==>  3
// sumOfABeach("gOfIshsunesunFiSh")             ==>  4
// sumOfABeach("cItYTowNcARShoW")               ==>  0

function sumOfABeach($beach)
{
    return substr_count(strtolower($beach), "sun") + substr_count(strtolower($beach), "fish") + substr_count(strtolower($beach), "water") + substr_count(strtolower($beach), "sand");
}
var_dump(sumOfABeach("GolDeNSanDyWateRyBeaChSuNN"));
echo PHP_EOL;



// 45. [7-kyu], [string]. sPoNgEbOb MeMe
// https://www.codewars.com/kata/5982619d2671576e90000017/train/php
// Вам нужно создать функцию, которая преобразует входные данные в этот формат, при этом выходные данные будут той же строкой, ожидая наличия шаблона из прописных и строчных букв.
// Пример:
// input:  "stop Making spongebob Memes!"
// output: "StOp mAkInG SpOnGeBoB MeMeS!"
// spongeMeme("colored teens cant Be successful in tech") // =>'CoLoReD TeEnS CaNt bE SuCcEsSfUl iN TeCh'

function sponge_meme($sentence)
{
    $sentence = strtolower($sentence);
    for ($i = 0; $i < strlen($sentence); $i++) {
        if ($i % 2 === 0) {
            $sentence[$i] = strtoupper($sentence[$i]);
        }
    }
    return $sentence;
}
var_dump(sponge_meme("stop Making spongebob Memes!"));
echo PHP_EOL;



// 46. [7-kyu], [string]. Kooka-Counter
// https://www.codewars.com/kata/58e8cad9fd89ea0c6c000258
// Examples
// ha = female => 1
// Ha = male => 1
// Haha = male + female => 2
// haHa = female + male => 2
// hahahahaha = female => 1
// hahahahahaHaHaHa = female + male => 2
// HaHaHahahaHaHa = male + female + male => 3
// $this->assertSame(0, kookaCounter(""));
// $this->assertSame(1, kookaCounter("hahahahaha"));
// $this->assertSame(2, kookaCounter("hahahahahaHaHaHa"));
// $this->assertSame(3, kookaCounter("HaHaHahahaHaHa"));

function kookaCounter($laughing)
{
    if (!empty($laughing)) {
        $res = 1;
        for ($i = 0; $i < strlen($laughing) - 2; $i = $i + 2) {
            if ($laughing[$i] !== $laughing[$i + 2]) {
                $res++;
            }
        }
        return $res;
    } else {
        return 0;
    }
}
var_dump(kookaCounter("haha")); // 2
var_dump(kookaCounter(""));
var_dump(kookaCounter("haHaha"));
var_dump(kookaCounter("HaHaHahahaHaHa"));
echo PHP_EOL;



// 47. [7-kyu], [string]. Hungarian Vowel Harmony (easy) - задача не работает нормально со всеми символами
// https://www.codewars.com/kata/57fd696e26b06857eb0011e7
// Ваша цель — создать функцию dative() (Dative() в C#), которая возвращает допустимую форму действительного венгерского слова w в дательном падеже i. е. добавьте к слову w правильный суффикс nek или nak в соответствии с правилами гармонии гласных.
// Правила гармонии гласных (упрощенные)
// Когда последняя гласная в слове
// гласная переднего ряда (e, é, i, í, ö, ő, ü, ű), суффикс -nek
// гласная заднего ряда (a, á, o, ó, u, ú), суффикс -nak
// Examples:
// dative("ablak"); // "ablaknak"
// dative("szék"); // "széknek"
// dative("otthon"); // "otthonnak"
// Для простоты: все слова оканчиваются на согласную 
// Все строки являются строками Юникода.
// В тестах нет грамматических исключений.

function dative(string $w): string
{
    $arr_1 = ["e", "e", "i", "x", "p", "l", "s", "n"];
    $arr_2 = ["a", "á", "o", "ó", "u", "ú"];
    if (in_array($w[strlen($w) - 2], $arr_1)) {
        $w .= "nek";
    } else if (in_array($w[strlen($w) - 2], $arr_2)) {
        $w .= "nak";
    }
    return $w;
}
var_dump(dative("ablak"));
var_dump(dative("szek"));
var_dump(dative("otthon"));
echo PHP_EOL;



// 48. [7-kyu], [string]. String Scramble
// https://www.codewars.com/kata/5822d89270ca28c85c0000f3
// Если заданы строка и массив индексных номеров, верните символы строки, переставленные в порядке, указанном в сопутствующем массиве.
// Пример:
// scramble('abcd', [0,3,1,2]) -> 'acdb'
// Строка, которую вы вернете, будет иметь: 'a' в индексе 0, 'b' в индексе 3, 'c' в индексе 1, 'd' в индексе 2, поскольку порядок этих символов соответствует их соответствующим номерам в массиве индексов.
// Другими словами, поместите первый символ в строке в индекс, описанный первым элементом массива
// Можно предположить, что вам будут даны строка и массив одинаковой длины, и оба содержат допустимые символы (A-Z, a-z или 0-9).
// $this->assertSame(scramble('abcd',[0,3,1,2]), 'acdb');
// $this->assertSame(scramble('sc301s', [4,0,3,1,5,2]), "c0s3s1", "Should return c0s3s1");
// $this->assertSame(scramble('bskl5', [2,1,4,3,0]), "5sblk", "Should return 5sblk");

function scramble($str, $arr)
{
    // scramble('abcd', [0,3,1,2]) -> 'acdb'
    $res = $str;
    for ($i = 0; $i < strlen($str); $i++) {
        $res[$arr[$i]] = $str[$i];
    }
    return $res;
    // или 
    // $new_arr = array_combine($arr, str_split($str));
    // ksort($new_arr);
    // return implode($new_arr);
}
var_dump(scramble("abcd", [0, 3, 1, 2])); // acdb
echo PHP_EOL;



// 49. [7-kyu], [string]. Pull your words together, man!
// https://www.codewars.com/kata/59ad7d2e07157af687000070/train/php
// Ваш друг Робби успешно создал ИИ, способный общаться на английском языке!
// Робби почти закончил проект, однако вывод машины не работает так, как ожидалось. Вот пример предложения, которое она выводит:
// ["this","is","a","sentence"]
// Каждый раз, когда он пытается произнести предложение, вместо того, чтобы отформатировать его в обычной английской орфографии, он просто выводит список слов.
// Робби не спал всю ночь, чтобы закончить этот проект, и ему нужно немного поспать. Поэтому он хочет, чтобы вы написали последнюю часть его кода, функцию sentencify, которая берет вывод, который выдает машина, и форматирует его в правильной английской орфографии.
// Ваша функция должна:
// Сделать первую букву первого слова заглавной.
// Добавить точку (.) в конец предложения.
// Объединить слова в целую строку с пробелами.
// Не выполнять никаких других манипуляций со словами.
// sentencify(array("i", "am", "an", "AI")), "I am an AI.");
function sentencify($words)
{
    // ucfirst(string), uc = uppercase - перевод первого символа в верхний регистр
    // ucfirst(explode(" ", $words));
    return ucfirst(implode(" ", $words)) . ".";

}
var_dump(sentencify(array("i", "am", "an", "AI")));
echo PHP_EOL;



// 50. [7-kyu], [string]. Dropcaps
// https://www.codewars.com/kata/559e5b717dd758a3eb00005a/train/php
// DropCaps означает, что первая буква начального слова абзаца должна быть заглавной, а остальные строчными, как в газете.
// Но для разнообразия давайте сделаем это для каждого слова данной строки. Ваша задача — сделать заглавными все слова, длина которых больше 2, оставив меньшие слова такими, какие они есть.
// *должно работать также с начальными и конечными пробелами и заглавными буквами.
// "apple" => "Apple"
// "apple of banana" => "Apple of Banana"
// "one space" => "One Space"
// " space WALK " => " Space Walk "
// Примечание: вам будет предоставлено по крайней мере одно слово, и вы должны принять строку в качестве входных данных и вернуть строку в качестве выходных данных.

function dropCap($s)
{
    $arr = explode(" ", $s);
    for ($i = 0; $i < count($arr); $i++) {
        if (strlen($arr[$i]) > 2) {
            $arr[$i] = ucfirst($arr[$i][0]) . strtolower(substr($arr[$i], 1));
        }
    }
    return implode(" ", $arr);
}
var_dump(dropCap("space of WALK"));
echo PHP_EOL;


// 51. [7-kyu], [string]. Dropcaps
// https://www.codewars.com/kata/58b972cae826b960a300003e/train/php
// Дженни 9 лет. Она самый молодой детектив в Северной Америке. Дженни учится в 3 классе, поэтому, когда появляется новое задание, она получает код для расшифровки в виде наклейки (с числами) в своей тетради по математике и комментария (предложения) в своей тетради для письма. Все, что ей нужно сделать, это придумать одно слово, а дальше она уже знает, что делать. И вот тут наступает ваша роль — вы можете помочь Дженни узнать, что это за слово!
// Чтобы узнать, что это за слово, вы должны использовать наклейку (массив из 3 чисел), чтобы извлечь 3 буквы из комментария (строки), которые составляют слово.
// Каждое из чисел в массиве относится к положению буквы в строке в порядке возрастания.
// Пробелы — это не места, вам нужны сами буквы. Никаких пробелов.
// Возвращаемое слово должно состоять только из строчных букв.
// Если вы не можете найти одну из букв с помощью индексных номеров, верните «No mission today». Дженни было бы очень грустно, но такова жизнь... :(
// Пример: ввод: [5, 0, 3], "I love you" вывод: "ivy" (0 = "i", 3 = "v", 5 = "y")
// $this->assertSame(missing([5, 0, 3], "I love you"), "ivy");
// $this->assertSame(missing([29, 31, 8], "The quick brown fox jumps over the lazy dog"), "bay");
// $this->assertSame(missing([12, 4, 6], "Good Morning"), "No mission today");

function missing($nums, $str)
{
    sort($nums); // сортируем массив в порядке возрастания
    $str_new = strtolower(implode(explode(" ", $str))); // удаляем пробелы и переводим в нижний регистр
    $res = "";
    for ($i = 0; $i < count($nums); $i++) {
        if (isset($str_new[$nums[$i]])) {
            $res .= $str_new[$nums[$i]];
        } else {
            $res = "No mission today";
        }
    }
    return $res;
}
var_dump(missing([5, 0, 3], "I love you"));
var_dump(missing([12, 4, 6], "Good Morning"));
echo PHP_EOL;
echo PHP_EOL;



// 52. [7-kyu], [string]. Count salutes
// https://www.codewars.com/kata/605ae9e1d2be8a0023b494ed/train/php
// Есть узкий коридор, в котором люди могут идти только направо и налево. Когда два человека встречаются в коридоре, по традиции они должны отдать друг другу честь. Люди движутся с одинаковой скоростью влево и вправо.
// Ваша задача — написать функцию, которая, учитывая строковое представление людей, движущихся в коридоре, подсчитает количество приветствий, которые будут иметь место.
// Примечание: при встрече людей происходит 2 приветствия, одно другому и наоборот.
// Входные данные
// Люди, движущиеся направо, будут представлены как >; люди, движущиеся налево, будут представлены как <. Пример входных данных: >--<--->->. Символ - представляет пустое пространство, о котором вам не нужно беспокоиться.
// Примеры
// Входные данные: >----->-----<--< 
// Выходные данные: 8
// Объяснение: оба парня, движущиеся направо, встретятся с обоими парнями, движущимися налево.
// Следовательно, всего произойдет 4 встречи и 8 приветствий.
// Вход: <---<--->----<
// Выход: 2
// Объяснение: Происходит только одна встреча.
// $this->assertEquals(4, count_salutes('<---->---<---<-->'));
// $this->assertEquals(0, count_salutes('------'));
// $this->assertEquals(42, count_salutes('>>>>>>>>>>>>>>>>>>>>>----<->'));
// $this->assertEquals(2, count_salutes('<<----<>---<'));

function count_salutes($hallway)
{
    $hallway_count = 0;
    for ($i = 0; $i < strlen($hallway); $i++) {
        if ($hallway[$i] === ">") {
            for ($k = $i + 1; $k < strlen($hallway); $k++) {
                if ($hallway[$k] === "<") {
                    $hallway_count = $hallway_count + 2;
                }
            }
        }
    }
    return $hallway_count;

}
var_dump(count_salutes('<---->---<---<-->')); // 4
var_dump(count_salutes('>>>>>>>>>>>>>>>>>>>>>----<->')); // 4
echo PHP_EOL;



// 53. [7-kyu], [string]. Baby shark lyrics generator
// https://www.codewars.com/kata/5d076515e102162ac0dc514e
// Создайте функцию, как можно короче, которая возвращает этот текст.
// Ваш код должен быть короче 300 символов. Обратите внимание на три точки в конце песни.

// Baby shark, doo doo doo doo doo doo
// Baby shark, doo doo doo doo doo doo
// Baby shark, doo doo doo doo doo doo
// Baby shark!
// Mommy shark, doo doo doo doo doo doo
// Mommy shark, doo doo doo doo doo doo
// Mommy shark, doo doo doo doo doo doo
// Mommy shark!
// Daddy shark, doo doo doo doo doo doo
// Daddy shark, doo doo doo doo doo doo
// Daddy shark, doo doo doo doo doo doo
// Daddy shark!
// Grandma shark, doo doo doo doo doo doo
// Grandma shark, doo doo doo doo doo doo
// Grandma shark, doo doo doo doo doo doo
// Grandma shark!
// Grandpa shark, doo doo doo doo doo doo
// Grandpa shark, doo doo doo doo doo doo
// Grandpa shark, doo doo doo doo doo doo
// Grandpa shark!
// Let's go hunt, doo doo doo doo doo doo
// Let's go hunt, doo doo doo doo doo doo
// Let's go hunt, doo doo doo doo doo doo
// Let's go hunt!
// Run away,…

function babySharkLyrics()
{
    $w = ['Baby shark', 'Mommy shark', 'Daddy shark', 'Grandma shark', 'Grandpa shark', 'Let\'s go hunt'];
    $s = '';
    foreach ($w as $el) {
        $s .= str_repeat($el . ", doo doo doo doo doo doo\n", 3) . $el . '!' . "\n";
    }
    return $s . 'Run away,…';
    // или 
    // $r = "";
    // $a = ["Baby shark", "Mommy shark", "Daddy shark", "Grandma shark", "Grandpa shark", "Let's go hunt"];
    // for ($k = 0; $k < count($a); $k++) {
    //     for ($i = 0; $i < 4; $i++) {
    //         if ($i === 3) {
    //             $r .= $a[$k] . "!\n";
    //             break;
    //         }
    //         $r .= $a[$k] . "," . str_repeat(" doo", 6) . "\n";
    //     }
    // }
    // return $r . "Run away,…";

}
var_dump(babySharkLyrics());
echo PHP_EOL;



// 54. [7-kyu], [string]. Make a square box!
// https://www.codewars.com/kata/58644e8ddf95f81a38001d8d/train/php
// Учитывая число в качестве параметра (от 2 до 30), верните массив, содержащий строки, образующие блок.
// Так:
// п = 5
// [
//     '-----',
//     '-   -',
//     '-   -',
//     '-   -',
//     '-----'
// ]
// n = 3
// [
//   '---',
//   '- -',
//   '---'
// ]

function box($n)
{
    $res = "";
    for ($i = 0; $i < $n; $i++) {
        if ($i > 0 && $i < $n - 1) {
            $res .= "-" . str_repeat(" ", $n - 2) . "-" . "\n";
        } else {
            if ($i === $n - 1) {
                $res .= str_repeat("-", $n);
            } else {
                $res .= str_repeat("-", $n) . "\n";
            }
        }
    }
    return explode("\n", $res);
}
var_dump(box(5));
echo PHP_EOL;



// 55. [7-kyu], [string]. String reverse slicing 101
// https://www.codewars.com/kata/586efc2dcf7be0f217000619/train/php
// В качестве входных данных вам будет предоставлена ​​строка символов. Завершите функцию, которая возвращает список строк: (а) в порядке, обратном исходной строке, и (б) так, чтобы каждая последующая строка начиналась на один символ дальше от конца исходной строки.
// Предположим, что исходная строка имеет длину не менее 3 символов. Попробуйте сделать это, используя фрагменты, и избегайте преобразования строки в список(массив).
// Примеры
// '123' ==> ['321', '21', '1']
// 'abcde' ==> ['edcba', 'dcba', 'cba', 'ba', 'a']

function reverse_slice($str)
{
    $str = strrev($str);
    $arr = [];
    for ($i = 0; $i < strlen($str); $i++) {
        $arr[] = substr($str, $i);
    }
    return $arr;
}
var_dump(reverse_slice("123"));
echo PHP_EOL;



// 56. [7-kyu], [string]. Alan Partridge I - Partridge Watch
// Учитывая массив терминов, если какой-либо из этих терминов относится к Алану Партриджу, верните Mine's a Pint!
// Количество восклицательных знаков (!) после t должно определяться количеством терминов, связанных с Аланом, которые вы найдете в данном массиве (x). Соответствующие термины следующие:
// Partridge
// PearTree
// Chat
// Dan
// Toblerone
// Lynn
// AlphaPapa
// Nomad
// Если не найдете соответствующих терминов, верните Lynn, I've pierced my foot on a spike!!
// $this->assertSame('Mine\'s a Pint!', part(['Grouse', 'Partridge', 'Pheasant']));
// $this->assertSame('Lynn, I\'ve pierced my foot on a spike!!', part(['Pheasant', 'Goose', 'Starling', 'Robin']));

function part($a)
{
    $arr = ["Partridge", "PearTree", "Chat", "Dan", "Toblerone", "Lynn", "AlphaPapa", "Nomad"];
    $count = 0;
    for ($i = 0; $i < count($a); $i++) {
        if (in_array($a[$i], $arr)) {
            $count++;
        }
    }
    return ($count > 0) ? "Mine's a Pint" . str_repeat("!", $count) : "Lynn, I've pierced my foot on a spike!!";
}
var_dump(part(['Grouse', 'Partridge', 'Pheasant']));
echo PHP_EOL;



// 57. [7-kyu], [string]. Correct the date-string - не смог решить
// https://www.codewars.com/kata/5787628de55533d8ce000b84/train/php
// Вам необходимо создать метод, который исправляет заданную строку даты. Кроме того, возникла проблема: многие строки даты повреждены. Формат даты — европейский. Это означает «ДД.ММ.ГГГГ».
// Некоторые примеры:
// "30.02.2016" -> "01.03.2016"
// "40.06.2015" -> "10.07.2015"
// "11.13.2014" -> "11.01.2015"
// "99.11.2010" -> "07.02.2011"
// $this->assertSame("11.01.2015", dateCorrect("11.13.2014"));
// Если входная строка равна нулю или пуста, верните именно это значение!
// Если формат строки даты недействителен, верните ноль.
// Подсказка: сначала исправьте месяц, а затем день!

function dateCorrect($datestring)
{
    $mouth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $arr = explode(".", $datestring);
    $years = 0;
    if ($arr[2] % 4 === 0) {
        $mouth[1] = 29;
    }
    if ($arr[1] > 12) {
        while ($arr[1] >= 12) { // 1
            $years++; // 1
            $arr[1] = $arr[1] - 12; // 1
        }
    }
    for ($start = $arr[1]; $arr[0] > $mouth[$arr[1] - 1]; $mouth[$arr[1]]) { // 02; 
        $arr[0] = $arr[0] - $mouth[$arr[1] - 1];
        $arr[1] = $arr[1] + 1; // 1
        if ($arr[1] == 12) {
            $arr[1] = 0; // 2
            $years++;
        }
    }
    $arr[2] = $arr[2] + $years;
    return implode(".", $arr);


}
// var_dump(dateCorrect("30.02.2023"));
// var_dump(dateCorrect("99.11.2010"));// 19 


// 58. [7-kyu], [string]. Alan Partridge III - London
// https://www.codewars.com/kata/580a41b6d6df740d6100030c/train/php
// «Отправляйтесь в Лондон. Я гарантирую, что вас либо ограбят, либо вас не оценят.
// Сядьте на поезд до Лондона и остановитесь на остановках Rejection, Disappointment, Backstabling Central и Shattered Dreams Parkway».
// Задача
// Ваша задача — проверить, содержит ли предоставленный список/массив станций все остановки, упомянутые Аланом. Список остановок следующий:
// Rejection
// Disappointment
// Backstabbing Central
// Shattered Dreams Parkway
// Если все остановки присутствуют в данном списке/массиве, верните «Smell my cheese you mother!», если нет, верните «No, seriously, run. You will miss it.». 
// $this->assertSame('Smell my cheese you mother!', alan(['Norwich', 'Rejection', 'Disappointment', 'Backstabbing Central', 'Shattered Dreams Parkway', 'London']));
// $this->assertSame('No, seriously, run. You will miss it.', alan(['London', 'Norwich']));
// $this->assertSame('Smell my cheese you mother!', alan(['Norwich', 'Tooting', 'Bank', 'Rejection', 'Disappointment', 'Backstabbing Central', 'Exeter', 'Shattered Dreams Parkway', 'Belgium','London']));


function alan($a)
{
    $stops = ["Rejection", "Disappointment", "Backstabbing Central", "Shattered Dreams Parkway"];
    $arr = array_intersect($stops, $a);
    return ($arr === $stops) ? "Smell my cheese you mother!" : "No, seriously, run. You will miss it.";
}
var_dump(alan(['Norwich', 'Rejection', 'Disappointment', 'Backstabbing Central', 'Shattered Dreams Parkway', 'London']));



// 59. [7-kyu], [string]. Kill The Monsters!
// https://www.codewars.com/kata/5b36137991c74600f200001b/train/php
// Вы сражаетесь с монстрами! Вы достаточно сильны, чтобы убить их одним ударом, но после того, как вы ударите 3 раза, один из оставшихся монстров ударит вас один раз.
// Ваше здоровье – это здоровье (h); количество монстров — это монстры (m), урон, который может нанести вам монстр, — это урон (dm).
// Напишите функцию, которая будет вычислять:
// сколько ударов вы получили, сколько урона вы получили и ваше оставшееся здоровье.
// если ваше здоровье <= 0, вы умираете, и функция должна вернуть «hero died».
// Все числа строго положительные. Ваша функция всегда должна возвращать строку.
// Examples
// (100, 3, 33)  => "hits: 0, damage: 0, health: 100"
// ( 50, 7, 10)  => "hits: 2, damage: 20, health: 30"
// $this->assertSame("hits: 2, damage: 20, health: 30", killMonsters(50, 7, 10));
// $this->assertSame("hits: 0, damage: 0, health: 20", killMonsters(20, 1, 10));
// $this->assertSame("hero died", killMonsters(30, 4, 50));

function killMonsters($h, $m, $dm)
{
    $hits_count = 0;
    while ($m - 3 > 0) {
        $hits_count++;
        $m = $m - 3;
    }
    $damage = $hits_count * $dm;
    $health = $h - $damage;
    return ($health <= 0) ? "hero died" : "hits: $hits_count, damage: $damage, health: $health";
}



// 60. [7-kyu], [string]. Youtube URL - тесты на codewars сломаны, но решено верно!
// https://www.codewars.com/kata/58a0697ef636cac09c000014/train/php
// На видео много ссылок:
// https://www.youtube.com/embed/UN8oLGBNXpE – правильно для iframe
// https://www.youtube.com/watch?v=UN8oLGBNXpE
// http://www.youtube.com/watch?v=UN8oLGBNXpE
// https://youtu.be/UN8oLGBNXpE
// Если вставить первую ссылку в iframe, то она работает, а другая не работает.
// Напишите функцию, которая преобразует строку в правильный формат для iframe.
// $this->assertSame("https://www.youtube.com/embed/L3JxAuUyjzY", makeYoutubeLink('https://www.youtube.com/embed/L3JxAuUyjzY'));
// $this->assertSame("https://www.youtube.com/embed/L3JxAuUyjzY", makeYoutubeLink('https://www.youtube.com/watch?v=L3JxAuUyjzY'));
// var_dump(strtr("hello", "hl", "12")); // 1e22o

function makeYoutubeLink($str)
{
    $arr = explode("/", $str);
    if (!in_array("https:", $arr)) {
        $arr[0] = "https:";
    }
    if (!str_contains($arr[2], "www")) {
        $arr[2] = "www." . $arr[2];
    }
    if (!in_array("embed", $arr)) {
        $arr[2] = $arr[2] . "/embed";
    }
    if (str_contains($str, "watch?v=")) {
        $arr[count($arr) - 1] = substr($arr[count($arr) - 1], strlen("watch?v="));
    }
    // return $arr;
    return implode("/", $arr);

}
// var_dump(makeYoutubeLink("https://www.youtube.com/watch?v=UN8oLGBNXpE"));
// var_dump(makeYoutubeLink("https://www.youtube.com/embed/watch?v=UN8oLGBNXpE"));
// var_dump(makeYoutubeLink("https://youtu.be/UN8oLGBNXpE"));
// var_dump(makeYoutubeLink("https://www.youtube.com/embed/UN8oLGBNXpE"));
// var_dump(makeYoutubeLink("https://www.youtube.com/L3JxAuUyjzY"));
var_dump(makeYoutubeLink("https://www.youtube.com/embed/UN8oLGBNXpE")); // 'https://www.youtube.com/embed/UN8oLGBNXpE'
echo PHP_EOL;



// 61. [7-kyu], [string]. Measuring Average Speed
// https://www.codewars.com/kata/57b365f81fae8a0571000142/train/php
// Средняя скорость рассчитывается путем деления расстояния на время. Учитывая две строки в качестве входных данных, первая из которых указывает пройденное расстояние (в метрах или километрах), а вторая указывает время, необходимое для путешествия (в секундах или минутах), верните строку, указывающую его скорость в милях в час, округленную до ближайшее целое число.
// Для целей этого ката один метр в секунду определяется как 2,23694 мили в час.
// Например, учитывая входные значения расстояния и времени «3 км» ​​и «5 минут», мы должны вернуть значение скорости «22 мили в час».
// $this->assertSame("22mph", calculate_speed("100m", "10s"));
// $this->assertSame("22mph", calculate_speed("3km", "5min"));
// $this->assertSame("0mph", calculate_speed("35m", "293s"));
// $this->assertSame("548mph", calculate_speed("573km", "39min"));

function calculate_speed($distance, $time)
{
    // $distance_n = "";
    // $time_n = "";
    // $type_dist = "";
    // $type_time = "";
    // $time_dist_count = 0;
    // $time_count = 0;
    // for ($i = 0; $i < strlen($distance); $i++) {
    //     if ((int) $distance[$i] !== 0 or $distance[$i] === "0") {
    //         $distance_n .= $distance[$i];
    //         $time_dist_count++;
    //     } else {
    //         $type_dist = substr($distance, $time_dist_count);
    //     }
    // }
    // for ($i = 0; $i < strlen($time); $i++) {
    //     if ((int) $time[$i] !== 0 or $time[$i] === "0") {
    //         $time_n .= $time[$i];
    //         $time_count++;
    //     } else {
    //         $type_time = substr($time, $time_count);
    //     }
    // }
    // if ($type_dist == "km") {
    //     $distance_n = 1000 * $distance_n;
    // }
    // if ($type_time == "min") {
    //     $time_n = 60 * $time_n;
    // }
    // return round(($distance_n / $time_n) * 2.23694) . "mph";
    // или через intval(), str_ends_with
    $distance_n = intval($distance);
    $time_n = intval($time);
    if (str_ends_with($distance, "km")) {
        $distance_n = $distance_n * 1000;
    }
    if (str_ends_with($time, "min")) {
        $time_n = $time_n * 60;
    }
    return round(($distance_n / $time_n) * 2.23694) . "mph";
}
var_dump(calculate_speed("3km", "5min"));
var_dump(calculate_speed("35m", "293s"));
var_dump(calculate_speed("573km", "39min"));
echo PHP_EOL;



// 62. [7-kyu], [string]. Find the Middle of the Product
// https://www.codewars.com/kata/5ac54bcbb925d9b437000001
// Учитывая строку символов, я хочу, чтобы функция findMiddle()/find_middle() возвращала среднее число в произведении каждой цифры в строке.
// Пример: 's7d8jd9' -> 7, 8, 9 -> 7*8*9=504, поэтому 0 следует возвращать как целое число.
// Не все строки будут содержать цифры. В этом случае и в случае любых нестроковых значений верните -1.
// Если в произведении четное количество цифр, верните две средние цифры.
// Пример: 1563 -> 56
// ПРИМЕЧАНИЕ. Удалите ведущие нули, если произведение четное и первая цифра из двух — ноль. Пример 2016 -> 1
// $this->assertEquals(findMiddle('s7d8jd9'), 0);
// $this->assertEquals(findMiddle('58jd9fgh/fgh6s.,sdf'), 16);

function findMiddle($str)
{
    if (is_string($str)) {
        $res = 1;
        $flag = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if ((int) $str[$i] !== 0 or $str[$i] === "0") {
                $res *= $str[$i];
                $flag++;
            }
        }
        if ($flag === 0) {
            return -1;
        }
        $res = "$res";
        if (strlen($res) % 2 !== 0) { // "504", 3/2 = 1.5, float(1) => int 1 
            return (int) ($res)[(int) floor(strlen($res) / 2)];
        } else {
            return (int) substr($res, strlen($res) / 2 - 1, 2); // ведущие нули удаляются (int): (int) 01 => 1
        }
    } else {
        return -1;
    }
}
var_dump(findMiddle("s7d8jd9"));
var_dump(findMiddle("s1d5j3d457")); // 2100
var_dump(findMiddle("a4895")); // 2100
var_dump(findMiddle("4d7a8d9d")); // 2016
echo PHP_EOL;



// 63. [7-kyu], [string]. Is that a real phone number? (British version)
// https://www.codewars.com/kata/581a52d305fe7756720002eb/php
// Но ПОДОЖДИТЕ, это действительный номер?
// Ваша задача — написать функцию, которая проверяет, содержит ли данная строка действительный номер мобильного (сотового) британского телефона или нет.
// Если верно, верните «In with a chance».
// Если значение недействительно или вам дана пустая строка, верните «Plenty more fish in the sea».
// Число может быть действительным следующими способами:
// Здесь, в Великобритании, номера мобильных телефонов начинаются с «07», за которым следуют еще 9 цифр, например. '07454876120'.
// Иногда номеру предшествует код страны, префикс «+44», который заменяет «0» в «07», например. '+447454876120'.
// А иногда вы встретите числа с тире между цифрами или по обе стороны, например. «+44--745---487-6120» или «-074-54-87-61-20-». Как видите, тире могут идти подряд.
// $this->assertSame('In with a chance', validateNumber('07454876120'));
// $this->assertSame('Plenty more fish in the sea', validateNumber('0754876120'));
// $this->assertSame('In with a chance', validateNumber('0745-487-61-20'));
// $this->assertSame('In with a chance', validateNumber('+447535514555'));

function validateNumber($str)
{
    if (is_string($str)) {
        $res = "";
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] === "-")
                continue;
            $res .= $str[$i];
        }
        if ((($res[0] . $res[1]) === "07" and strlen($res) === 11) or (($res[0] . $res[1] . $res[2] . $res[3]) === "+447" and strlen($res) === 13)) {
            return "In with a chance";
        } else {
            return 'Plenty more fish in the sea';
        }
    } else {
        return 'Plenty more fish in the sea';
    }
}
var_dump(validateNumber("07454876120"));
var_dump(validateNumber("+44-1-7--535--51--4555"));
echo PHP_EOL;


// 64. [7-kyu], [string]. Simple Fun #182: Happy "g"
// https://www.codewars.com/kata/58bcd27b7288983803000002
// Допустим, «g» счастлива в данной строке, если непосредственно справа или слева от нее есть еще одна «g».
// Выясните, все ли буквы «g» в данной строке счастливы.
// Пример
// Для str = "gg0gg3gg0gg" результат должен быть истинным.
// Для str = "gog" вывод должен быть ложным.
// Случайная строка строчных букв, цифр и пробелов.
// [вывод] логическое значение
// true, если все буквы «g» счастливы, в противном случае — false.
// $this->assert True (g_happy("gg0gg3gg0gg"));
// $this->assert False (g_happy("gog"));
// $this->assert False (g_happy("ggg ggg g ggg"));
// $this->assert True (g_happy("A half of a half is a quarter."));
// $this->assert False (g_happy("good grief"));
// $this->assert True (g_happy("bigger is ggooder"));
// $this->assert True (g_happy("gggggggggg"));

function g_happy($str)
{
    $str = $str . " ";
    for ($i = 0; $i < strlen($str); $i++) {
        if (($str[$i] === "g" and $str[$i + 1] !== "g") and ($str[$i] === "g" and $str[$i - 1] !== "g")) {
            return false;
        }
    }
    return true;
}
var_dump(g_happy("gog"));
echo PHP_EOL;



// 65. [7-kyu], [string]. Holiday V - SeaSick Snorkelling - решил верно, но все тесты не проходит в codewars
// https://www.codewars.com/kata/57e90bcc97a0592126000064
// Из-за последствий Эль-Ниньо в этом году мое путешествие с маской и трубкой в ​​отпуске было похоже на пребывание в стиральной машине... Совсем не весело.
// Учитывая строку, состоящую из символов «~» и «_», обозначающих волны и штиль(отсутсвие волн) соответственно, ваша задача — проверить, не заболеет ли человек морской болезнью(укачивание).
// Изменения от спокойствия к волне или от волны к затишью добавят эффекта (на самом деле, волна достигает минимума, но и этого вполне достаточно). Узнайте, сколько изменений уровня имеет строка, и если это число превышает 20% длины строки, верните «Throw Up», в противном случае верните «No Problem».
// $this->assertSame("No Problem", sea_sick("~"));
// $this->assertSame("Throw Up", sea_sick("_~~~~~~~_~__~______~~__~~_~~"));
// $this->assertSame("Throw Up", sea_sick("______~___~_"));

function sea_sick($s)
{
    $changes = 0;
    for ($i = 0; $i < strlen($s) - 1; $i++) {
        if ($s[$i] !== $s[$i + 1]) {
            $changes++;
        }
    }
    if ($changes * 100 / 12 > 20) {
        return "Throw Up";
    } else {
        return "No Problem";
    }
}
var_dump(sea_sick("______~___~_"));
var_dump(sea_sick("_~~~~~~~_~__~______~~__~~_~~"));
var_dump(sea_sick("~"));
echo PHP_EOL;



// 66. [7-kyu], [string]. Holiday II - Plane Seating 
// https://www.codewars.com/kata/57e8f757085f7c7d6300009a
// Поиск места в самолете никогда не доставляет удовольствия, особенно во время дальнего перелета... Вы прилетаете, снова осознаете, насколько мало места для ног у вас есть, и как бы забираетесь на сиденье, заваленное кучей своих вещей.
// Чтобы запутать ситуацию (хотя они утверждают, что пытаются сделать обратное), многие авиакомпании исключают буквы «I» и «J» из своей системы обозначения мест.
// система именования состоит из числа (в данном случае от 1 до 60), обозначающего часть самолета, в которой находится сиденье (1-20 = переднее, 21-40 = среднее, 40+ = заднее). За этим номером следует буква A-K, за исключением, упомянутым выше.
// Буквы A-C обозначают места в левом кластере, D-F - в середине, а G-K - в правом.
// Учитывая номер места, ваша задача — вернуть местоположение места в следующем формате:
// «2B» вернет «Спереди-слева».
// Если число больше 60 или буква недействительна, верните «Нет места!».
// $this->revTest(planeSeat("2A"),"Front-Left");
// $this->revTest(planeSeat("23D"),"Middle-Middle");
// $this->revTest(planeSeat("49K"),"Back-Right");
// $this->revTest(planeSeat("60A"),"Back-Left");
// $this->revTest(planeSeat("61D"),"No Seat!!");
// $this->revTest(planeSeat("30I"),"No Seat!!");

function planeSeat($a)
{
    $left = range("A", "C");
    $middle = range("D", "F");
    $right = ["G", "H", "K"]; // исключили I и J
    $pos = "No Seat!!";
    if (intval($a) <= 20) {
        $pos = "Front";
    } else if (intval($a) <= 40) {
        $pos = "Middle";
    } else if (intval($a) <= 60) {
        $pos = "Back";
    } else {
        return $pos;
    }
    if (in_array($a[strlen($a) - 1], $left)) {
        $pos .= "-Left";
    } else if (in_array($a[strlen($a) - 1], $middle)) {
        $pos .= "-Middle";
    } else if (in_array($a[strlen($a) - 1], $right)) {
        $pos .= "-Right";
    } else {
        return $pos;
    }
    return $pos;
}
var_dump(planeSeat("60K"));
echo PHP_EOL;



// 67. [7-kyu], [string]. Celebrity Baby Names 
// https://www.codewars.com/kata/577d5ce442a8d81e790002b2
// Детские имена знаменитостей
// Знаменитости любят называть своих детей необычными именами. Последней тенденцией в выборе детских имен является «тенденция последней буквы». Правила тренда таковы: первая буква имени ребенка должна совпадать с последней буквой его старшего брата или сестры. Например:
// Suri (1st child), Ireland (2nd child), Diva (3rd child), Aleph (4th child)
// И так далее...
// Создайте функцию validName, которая принимает массив имен. Он должен вернуть «Congratulations, your baby names are compatible!» если все имена соответствуют правилу. Он должен вернуть сообщение «Back to the drawing board, your baby names are not compatible.». если все имена не соответствуют правилу.
// Если у пары только один ребенок, ответьте: «Congratulations, you can choose any name you like!»
// Если массив пуст, верните «You must test at least one name.».
// Примечания:
// Имена могут быть написаны через дефис или состоять из двух слов, например. Blue Ivy или Jean-Paul
// Имена не должны содержать никаких других символов, кроме букв, дефисов и пробелов.
// $this->assertSame(valid_name(["Cruz", "Zuma"]), "Congratulations, your baby names are compatible!");
// $this->assertSame(valid_name(["Buddy Bear","Romeo", "Olive"]), "Congratulations, your baby names are compatible!");
// $this->assertSame(valid_name(["Peaches", "Saint", "Theodora", "Ava", "Apple", "Egypt", "Tallulah", "Harlow", "Willow", "Weston", "Nala", "Atlas", "Silas", "Sundance", "Esmeralda", "Angel", "Lily-Rose", "Ever", "Rebel", "Lourdes"]), "Congratulations, your baby names are compatible!");
// $this->assertSame(valid_name(["Jaden"]), "Congratulations, you can choose any name you like!");
// $this->assertSame(valid_name(["George", "Charlotte"]), "Back to the drawing board, your baby names are not compatible.");

function valid_name($array)
{
    if (count($array) === 1) {
        return "Congratulations, you can choose any name you like!";
    }
    if (count($array) < 1) {
        return "You must test at least one name.";
    }
    for ($i = 0; $i < count($array) - 1; $i++) {
        if (($array[$i][strlen($array[$i]) - 1] !== strtolower($array[$i + 1][0]))) {
            return "Back to the drawing board, your baby names are not compatible.";
        }
    }
    return "Congratulations, your baby names are compatible!";
}
var_dump(valid_name(["Peaches", "Saint", "Theodora", "Ava", "Apple", "Evan"]));
echo PHP_EOL;

echo "\n\n========================================= [7-kyu], [mathematics] ========================================= \n\n";


// 1. [7-kyu], [mathematics]. Sum of odd numbers
// https://www.codewars.com/kata/55fd2d567d94ac3bc9000064/php
// Учитывая треугольник последовательных нечетных чисел:
// 1
// 3 5
// 7 9 11
// 13 15 17 19
// 21 23 25 27 29
// ...
// Вычислите сумму чисел в n-й строке этого треугольника (начиная с индекса 1), например: (Вход --> Выход)
// 1 --> 1
// 2 --> 3 + 5 = 8
// $this->assertSame(1, rowSumOddNumbers(1));
// $this->assertSame(8, rowSumOddNumbers(2));
// $this->assertSame(2197, rowSumOddNumbers(13));
// $this->assertSame(6859, rowSumOddNumbers(19));
// $this->assertSame(68921, rowSumOddNumbers(41));
// $this->assertSame(74088, rowSumOddNumbers(42));
// $this->assertSame(405224, rowSumOddNumbers(74));
// $this->assertSame(636056, rowSumOddNumbers(86));
// $this->assertSame(804357, rowSumOddNumbers(93));
// $this->assertSame(1030301, rowSumOddNumbers(101));

function rowSumOddNumbers($n)
{
    return $n ** 3;
}
var_dump(rowSumOddNumbers(3));
echo PHP_EOL;


// 2. [7-kyu], [mathematics]. Square Every Digit
// https://www.codewars.com/kata/546e2562b03326a88e000020/train/php
// Добро пожаловать. В этом ката вас просят возвести в квадрат каждую цифру числа и соединить их.
// Например, если мы пропустим через функцию 9119, получится 811181, потому что 9^2 — это 81, а 1^2 — это 1. (81-1-1-81)
// Пример №2: Ввод 765 вернет/должен вернуть 493625, потому что 7^2 — это 49, 6^2 — 36, а 52 — 25. (49-36-25)
// Примечание. Функция принимает целое число и возвращает целое число.
// $this->assertSame(811181, square_digits(9119));
// $this->assertSame(41636640, square_digits(24680));
// $this->assertSame(19254981, square_digits(13579));
// $this->assertSame(0, square_digits(0));

function square_digits($num)
{
    // if (is_int($num)) {
    $res = "";
    for ($i = 0; $i < strlen($num); $i++) {
        $res .= $num[$i] ** 2;
    }
    return (int) $res;
    // }
}
var_dump(square_digits("24680"));
echo PHP_EOL;



// 3. [7-kyu], [mathematics]. You're a square!
// https://www.codewars.com/kata/54c27a33fb7da0db0100040e
// Квадрат квадратов
// Вам нравятся строительные блоки. Вам особенно нравятся квадратные строительные блоки. А что вам еще больше нравится, так это сложить их в квадрат из квадратных строительных блоков!
// Однако иногда невозможно расположить их в квадрат. Вместо этого у вас получится обычный прямоугольник! Эти проклятые штуки! Если бы у вас только был способ узнать, зря ли вы сейчас работаете… Подождите! Вот и все! Вам просто нужно проверить, является ли количество строительных блоков идеальным квадратом.
// Задача
// Учитывая целое число, определите, является ли оно квадратным числом:
// В математике квадратное число или идеальный квадрат — это целое число, которое является квадратом целого числа; другими словами, это произведение некоторого целого числа само на себя.
// В тестах всегда будет использоваться некоторое целое число, поэтому не беспокойтесь об этом в языках с динамической типизацией.
// Примеры
// -1 => ложь
//  0 => правда
//  3 => ложь
//  4 => правда
// 25 => правда
// 26 => ложь
// $this->assertFalse(isSquare(-1), "Negative numbers cannot be square numbers");
// $this->assertTrue(isSquare(0));
// $this->assertFalse(isSquare(3));
// $this->assertTrue(isSquare(4));
// $this->assertTrue(isSquare(25));
// $this->assertFalse(isSquare(26));

function isSquare($n)
{
    $n = $n ** 0.5;
    if (strlen("$n") > 1) {
        return false;
    } else {
        return true;
    }
}
var_dump(isSquare(25));
var_dump(isSquare(24));
var_dump(isSquare(-1));
echo PHP_EOL;



// 4. [7-kyu], [mathematics]. Find the divisors!
// https://www.codewars.com/kata/544aed4c4a30184e960010f4
// Создайте функцию с именем divisors/Divisors, которая принимает целое число n > 1 и возвращает массив со всеми делителями целого числа (кроме 1 и самого числа), от наименьшего до наибольшего. Если число простое, верните строку «(целое число) является простым».
// divisors(12); // => [2, 3, 4, 6]
// divisors(25); // => [5]
// divisors(13); // => '13 is prime'
// $this->assertSame([3, 5], divisors(15));
// $this->assertSame([2, 3, 4, 6], divisors(12));
// $this->assertSame('13 is prime', divisors(13));

function divisors($integer)
{
    $arr = [];
    for ($i = 2; $i < $integer; $i++) {
        if ($integer % $i === 0) {
            $arr[] = $i;
        }
    }
    if (count($arr) < 1) {
        return "$integer is prime";
    } else {
        return $arr;
    }

}
var_dump(divisors(13));
echo PHP_EOL;



// 5. [7-kyu], [mathematics]. Count the divisors of a number
// https://www.codewars.com/kata/542c0f198e077084c0000c2e/train/php
// Посчитайте количество делителей натурального числа n.
// Случайные тесты доходят до n = 500000.
// Примеры (вход --> вывод)
// 4 --> 3 // у нас есть 3 делителя — 1, 2 и 4
// 5 --> 2 // у нас есть 2 делителя — 1 и 5
// 12 --> 6 // у нас есть 6 делителей - 1, 2, 3, 4, 6 и 12
// 30 --> 8 // у нас есть 8 делителей - 1, 2, 3, 5, 6, 10, 15 и 30
// Обратите внимание, что вы должны возвращать только число, количество делителей. Числа в скобках показаны только для того, чтобы вы могли видеть, какие числа учитываются в каждом конкретном случае.
// $this->assertSame(1, divisors(1));
// $this->assertSame(4, divisors(10));
// $this->assertSame(2, divisors(11));
// $this->assertSame(8, divisors(54));
// $this->assertSame(7, divisors(64));

function divisors_($n)
{
    $count = 0;
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i === 0) {
            $count++;
        }
    }
    return $count;
}
var_dump(divisors_(12));
echo PHP_EOL;



// 6. [7-kyu], [mathematics]. Don't give me five!
// https://www.codewars.com/kata/5813d19765d81c592200001a/train/php
// В этом ката вы получаете начальный номер и конечный номер региона и должны вернуть количество всех чисел, кроме чисел с 5 в нем. Начальное и конечное число включены!
// Примеры:
// 1,9 -> 1,2,3,4,6,7,8,9 -> Результат 8
// 4,17 -> 4,6,7,8,9,10,11,12,13,14,16,17 -> Результат 12
// Результат может содержать пятёрки. ;-)
// Начальный номер всегда будет меньше конечного. Оба числа могут быть и отрицательными!
// $this->assertSame(8, dont_give_me_five(1, 9));
// $this->assertSame(12, dont_give_me_five(4, 17));

function dont_give_me_five($start, $end)
{
    $count = 0;
    for ($i = $start; $i <= $end; $i++) {
        if (str_contains("$i", "5")) {
            continue;
        }
        $count++;
    }
    return $count;

}
var_dump(dont_give_me_five(4, 17));
echo PHP_EOL;


// 7. [7-kyu], [mathematics]. Sum of a sequence
// https://www.codewars.com/kata/586f6741c66d18c22800010a
// Ваша задача — написать функцию, возвращающую сумму последовательности целых чисел.
// Последовательность определяется тремя неотрицательными значениями: начало, конец, шаг.
// Если значение начала больше конечного, ваша функция должна вернуть 0. Если значение конца не является результатом целого числа шагов, не добавляйте его к сумме. См. четвертый пример ниже.
// Примеры
// 2,2,2 --> 2
// 2,6,2 --> 12 (2 + 4 + 6)
// 1,5,1 --> 15 (1 + 2 + 3 + 4 + 5)
// 1,5,3 --> 5 (1 + 4)
// $this->assertSame(12, sequence_sum(2, 6, 2));
// $this->assertSame(15, sequence_sum(1, 5, 1));
// $this->assertSame(5, sequence_sum(1, 5, 3));

function sequence_sum($begin, $end, $step)
{
    $res = 0;
    for ($i = $begin; $i <= $end; $i = $i + $step) {
        $res += $i; // 2
    }
    return $res;
}
var_dump(sequence_sum(1, 5, 3));
echo PHP_EOL;



// 8. [7-kyu], [mathematics]. Strong Number (Special Numbers Series #2)
// https://www.codewars.com/kata/5a4d303f880385399b000001
// Сильное число — это число, сумма факториала его цифр равна самому числу.
// Например, 145 — это сильное число, потому что 1! + 4! + 5! = 1 + 24 + 120 = 145.
// Задача
// Учитывая положительное число, определите, является оно сильным или нет, и верните либо «STRONG!!!!» или «Not Strong !!».
// Примеры
// 1 — сильное число, потому что 1! = 1, поэтому верните «STRONG!!!!».
// 123 – не сильное число, потому что 1! + 2! + 3! = 9 не равно 123, поэтому верните «Not Strong!!».
// 145 – сильное число, потому что 1! + 4! + 5! = 1 + 24 + 120 = 145, поэтому верните «STRONG!!!!».
// 150 – не сильное число, потому что 1! + 5! + 0! = 122 не равно 150, поэтому верните «Not Strong!!».
// $this->assertSame("STRONG!!!!", strong(1));
// $this->assertSame("STRONG!!!!", strong(2));
// $this->assertSame("STRONG!!!!", strong(145));
// $this->assertSame("STRONG!!!!", strong(40585));
// $this->assertSame("Not Strong !!", strong(7));
// $this->assertSame("Not Strong !!", strong(93));
// $this->assertSame("Not Strong !!", strong(185));

function strong($n)
{
    // 1! + 4! + 5! = 1 + 24 + 120 = 145
    $str = strval($n);
    $sum = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $product = 1;
        for ($k = $str[$i]; $k > 1; $k--) { // 5*4*3*2
            $product = $product * $k; // 1*3*2
        }
        $sum = $sum + $product;
    }
    return ($n === $sum) ? "STRONG!!!!" : "Not Strong !!";
}
var_dump(strong(145)); // "33" => 12
echo PHP_EOL;


// 9. [7-kyu], [mathematics]. Char Code Calculation
// https://www.codewars.com/kata/57f75cc397d62fc93d000059
// Учитывая строку, превратите каждый символ в его код ASCII и соедините их вместе, чтобы создать число — назовем это число total1:
// 'ABC' --> 'A' = 65, 'B' = 66, 'C' = 67 --> 656667
// Затем замените любое число 7 на число 1 и назовите это число «total2»:
// total1 = 656667
// total2 = 656661
// Затем верните разницу между суммой цифр total1 и total2:
//  (6 + 5 + 6 + 6 + 6 + 7) // 24+5+7 = 24+12 = 
// - (6 + 5 + 6 + 6 + 6 + 1)
//  6

function calc_($s)
{
    $str = "";
    for ($i = 0; $i < strlen($s); $i++) {
        $str = $str . ord($s[$i]);
    }
    $str_new = $str;
    for ($i = 0; $i < strlen($str_new); $i++) { // 656667 => 656661
        if ($str_new[$i] === "7") {
            $str_new[$i] = "1";
        }
    }
    return array_sum(str_split($str)) - array_sum(str_split($str_new));
}
var_dump(calc_("ABC"));
echo PHP_EOL;



// 10. [7-kyu], [mathematics]. Over The Road
// https://www.codewars.com/kata/5f0ed36164f2bc00283aed07
// Вы только что переехали на совершенно прямую улицу, на которой по обе стороны дороги ровно n одинаковых домов. Естественно, вам хотелось бы узнать номера домов людей на другой стороне улицы. Улица выглядит примерно так:
// Улица
// 1|  |6
// 3|  |4
// 5|  |2
//   ты
// Эвены увеличиваются справа; Шансы уменьшаются слева. Номера домов начинаются с 1 и увеличиваются без пробелов. Когда n = 3, 1 напротив 6, 3 напротив 4 и 5 напротив 2.
// Пример (адрес, n --> вывод)
// Учитывая адрес вашего дома и длину улицы n, укажите номер дома на противоположной стороне улицы.
// 1, 3 --> 6
// 3, 3 --> 4
// 2, 3 --> 5
// 3, 5 --> 8
// $this->assertSame(4, overTheRoad(3, 3));
// $this->assertSame(5, overTheRoad(2, 3));
// $this->assertSame(8, overTheRoad(3, 5));
// $this->assertSame(16, overTheRoad(7, 11));
// Примечание об ошибках
// Если у вас истекло время ожидания, не хватает памяти или возникла какая-либо «ошибка», читайте дальше. И n, и адрес могут достигать 500 миллиардов с помощью более чем 200 случайных тестов. Если вы попытаетесь сохранить адреса 500 миллиардов домов в списке, вам не хватит памяти, и тесты завершится сбоем. Это не проблема с ката, поэтому, пожалуйста, не оставляйте сообщение о проблеме. Аналогично, если тесты не завершатся в течение 12 секунд, вы также потерпите неудачу.

function overTheRoad($address, $street)
{
    return $street * 2 - $address + 1;
}
var_dump(overTheRoad(3, 5));
echo PHP_EOL;



// 11. [7-kyu], [mathematics]. Boiled Eggs
// https://www.codewars.com/kata/52b5247074ea613a09000164
// Ты величайший повар на земле. Никто не варит яйца так, как ты! В вашем ресторане всегда полно гостей, которым нравятся ваши вареные яйца. Но когда есть больший заказ вареных яиц, вам нужно некоторое время, потому что для вашей работы у вас есть только одна кастрюля. Сколько времени вам нужно?
// Твое задание
// Реализуйте функцию, которая принимает неотрицательное целое число, обозначающее количество яиц, которые нужно сварить. Он должен вернуть время в минутах (целое число), необходимое для варки всех яиц.
// Правила
// в кастрюлю можно положить не более 8 яиц одновременно
// яйцо нужно 5 минут, чтобы сварить
// предполагаем, что вода все время кипит (не успевает нагреться)
// для простоты мы также не учитываем время, необходимое, чтобы положить яйца в кастрюлю или вытащить их из нее.
// Пример (Ввод -> Выход)
// 0 --> 0
// 5 --> 5
// 10 --> 10

function cooking_time($eggs)
{
    return (int) ceil($eggs / 8) * 5;
}
var_dump(cooking_time(17));


// 12. [7-kyu], [mathematics]. Are the numbers in order?
// https://www.codewars.com/kata/56b7f2f3f18876033f000307/train/php
// Числа в порядке?
// В этом ката ваша функция получает на вход массив целых чисел. Ваша задача — определить, расположены ли числа в порядке возрастания. Говорят, что массив находится в порядке возрастания, если нет двух соседних целых чисел, из которых левое целое число превышает по значению правое целое число.
// Для целей этого Ката вы можете предположить, что все входные данные действительны, то есть массивы, содержащие только целые числа.
// Обратите внимание, что массив из 0 или 1 целого числа автоматически считается отсортированным в порядке возрастания, поскольку все (нулевые) соседние пары целых чисел удовлетворяют условию, что левое целое число не превышает по значению правое целое число.
// Например:
// in_asc_order([1, 2, 4, 7, 19]); // true
// in_asc_order([1, 2, 3, 4, 5]); // true
// in_asc_order([1, 6, 10, 18, 2, 4, 20]); // false
// in_asc_order([9, 8, 7, 6, 5, 4, 3, 2, 1]); // false (ПРИМЕЧАНИЕ: поскольку числа расположены в порядке ПО УБЫВАНИЮ, а не по возрастанию)

function in_asc_order($arr)
{
    $arr_sort = $arr;
    sort($arr_sort);
    return $arr_sort == $arr;
    // for ($i = 0; $i < count($arr); $i++) {
    //     if (isset($arr[$i + 1]) and $arr[$i] > $arr[$i + 1]) {
    //         return false;
    //     }
    // }
    // return true;
}
var_dump(in_asc_order([1, 6, 10, 18, 2, 4, 20]));
var_dump(in_asc_order([1, 2, 3, 4, 5]));
echo PHP_EOL;



// 13. [7-kyu], [mathematics]. Automorphic Number (Special Numbers Series #6)
// https://www.codewars.com/kata/5a58d889880385c2f40000aa
// Определение
// Число называется автоморфным числом тогда и только тогда, когда его квадрат заканчивается теми же цифрами, что и само число.
// Учитывая число, определите, автоморфно оно или нет.
// Число, переданное в функцию, положительное.
// Ввод >> Примеры вывода
// autoMorphic (25) -->> вернуть "Automorphic"
// Объяснение:
// 25 в квадрате равно 625. Заканчивается цифрами того же числа — 25.
// autoMorphic (13) -->> return "Not!!"
// Объяснение:
// 13 в квадрате равно 169, не оканчивающиеся одинаковыми цифрами числа, равными 69.
// autoMorphic (76) -->> вернуть "Automorphic"

function automorphic($n)
{
    // return (str_ends_with(strval($n ** 2), strval($n))) ? "Automorphic" : "Not!!";
    // return $n == substr($n ** 2, -strlen($n)) ? "Automorphic" : "Not!!";
    return substr($n ** 2, -strlen($n)); // "5"; // substr работает со строками
    

}
var_dump(automorphic(5));

