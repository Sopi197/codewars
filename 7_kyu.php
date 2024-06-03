<?php
// codewars 7-kyu [string] [https://www.codewars.com/kata/search/php?q=&r%5B%5D=-7&tags=Strings&beta=false&order_by=popularity%20desc]
// Чтобы понять, как решаются задачи, нужно всё расписать визуально на доске и найти закономерности
// 30 задач [7-kyu] [string] 
// 20 задач [7-kyu] [mathematics] 
// 20 задач [7-kyu] [arrays] 
// 20 задач [7-kyu] [fundamentals]
// задачи, которые понравились с тегом [понравилась]
// задачи, которые я не смог полностью решить: 
// 1. https://www.codewars.com/kata/56cd44e1aa4ac7879200010b/train/php - нужно знать регулярные выражения
// 2. https://www.codewars.com/kata/5700c9acc1555755be00027e


// 1. [7-kyu], [string]. Vowel Count [понравилась]
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



// 2. [7-kyu], [string]. Disemvowel Trolls [понравилась]
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



// 3. [7-kyu], [string]. Reversing Words in a String [понравилась]
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



// 4. [7-kyu], [string]. Highest and Lowest [понравилась]
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



// 5. [7-kyu], [string]. Get the Middle Character [понравилась]
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



// 6. [7-kyu], [string]. Isograms [понравилась]
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



// 7. [7-kyu], [string]. Mumbling [понравилась]
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
    // или
    // return substr($res, 0, strlen($res) - 1);
}
var_dump(accum("abcd"));
var_dump(accum("ZpglnRxqenU"));
echo PHP_EOL;

// или через цикл
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


// 8. [7-kyu], [string]. Complementary DNA [понравилась]
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



// 9. [7-kyu], [string]. Jaden Casing Strings [понравилась]
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



// 10. [7-kyu], [string]. Credit Card Mask [понравилась]
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



// 11. [7-kyu], [string]. String ends with? [понравилась]
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



// 12. [7-kyu], [string]. Remove anchor from URL [понравилась]
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



// 13. [7-kyu], [string]. Reverse words [понравилась]
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



// 14. [7-kyu], [string]. Remove duplicate words [понравилась]
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




// 15. [7-kyu], [string]. Alternate capitalization [понравилась]
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



// 16. [7-kyu], [string]. Alphabet war [понравилась]
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



// 18. [7-kyu], [string]. Convert an array of strings to array of numbers [понравилась]
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



// 19. [7-kyu], [string]. Bumps in the Road [понравилась]
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



// 20. [7-kyu], [string]. All unique [понравилась]
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


// 21. [7-kyu], [string]. Coding Meetup #3 - Higher-Order Functions Series - Is Ruby coming? [понравилась]
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



// 22. [7-kyu], [string]. Spacify [понравилась]
// https://www.codewars.com/kata/57f8ee485cae443c4d000127/train/php
// Измените функцию spacify так, чтобы она возвращала заданную строку с пробелами, вставленными между каждым символом.
// spacify("hello world") // "h e l l o   w o r l d"

function spacify($s)
{
    return implode(" ", str_split($s));
}
var_dump(spacify("hello world"));
echo PHP_EOL;



// 23. [7-kyu], [string]. Coding Meetup #2 - Higher-Order Functions Series - Greet developers [понравилась]
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



// 24. [7-kyu], [string]. Spacify [понравилась]
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



// 25. [7-kyu], [string]. Alphabet symmetry [понравилась]
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



// 26. [7-kyu], [string]. Help the Fruit Guy [понравилась]
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



// 27. [7-kyu], [string]. Sort by Last Char [понравилась]
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



// 28. [7-kyu], [string]. Digits explosion [понравилась]
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



// 29. [7-kyu], [string]. Char Code Calculation [понравилась]
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



// 30. [7-kyu], [string]. Substituting Variables Into Strings: Padded Numbers [понравилась]
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



// 31. [7-kyu], [string]. Numbers to Letters [понравилась]
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



// 32. [7-kyu], [string]. Substituting Variables Into Strings: Padded Numbers [понравилась]
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
    //   return substr_count($s,'.') > 3 ? 'Escaped!' : 'Caught!';

}
var_dump(cat_mouse("C....m"));
var_dump(cat_mouse("C...m"));
+ 29 минут
