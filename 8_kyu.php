<?php
// codewars 8-kyu [string] [https://www.codewars.com/kata/search/php?q=&r%5B%5D=-8&tags=Fundamentals&beta=false&order_by=popularity%20desc]
// Чтобы понять, как решаются задачи, нужно всё расписать визуально на доске и найти закономерности
// + 21 задачa [8-kyu] [string] 
// + 22 задачи [8-kyu] [mathematics] 
// + 30 задач [8-kyu] [arrays] 
// + 31 задачa [8-kyu] [fundamentals]
// задачи, которые понравились с тегом [понравилась]
// ctrl + shift + е ----- переход по файлам на клавиатуре
// задачи, которые я не смог полностью решить: 
// 1. https://www.codewars.com/kata/56cd44e1aa4ac7879200010b/train/php - нужно знать регулярные выражения



echo "\n\n========================================= [8-kyu], [string] ========================================= \n\n";

// 1. [8-kyu], [string]. Even or Odd
// Create a function that takes an integer as an argument and returns "Even" for even numbers or "Odd" for odd numbers.

function evenOrOdd($number)
{
    if ($number % 2 === 0) {
        return "Even";
    } else {
        return "Odd";
    }
}
echo evenOrOdd(10);
echo PHP_EOL;



// 2. [8-kyu], [string]. Reversed Strings
// Complete the solution so that it reverses the string passed into it.
// 'world'  =>  'dlrow'
// 'word'   =>  'drow'
function solution($str)
{
    return strrev($str);
}
echo solution("world");
echo PHP_EOL;
echo solution("word");
echo PHP_EOL;

// или с помощью массива
function solution_array($str)
{
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $res = $str[(strlen($str) - 1) - $i];
    }
    return $res;
}
echo solution_array("world");
echo PHP_EOL;



// 3. [8-kyu], [string]. Remove exclamation marks
// Write function RemoveExclamationMarks which removes all exclamation marks from a given string. Написать функцию, которая удаляет все восклицательные знаки из этой строки
function remove_exclamation_marks($string)
{
    $out = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] !== "!") {
            $out = $out . $string[$i];
        }
    }
    return $out;
}
var_dump(remove_exclamation_marks("Hello world!")); // Hello world
var_dump(remove_exclamation_marks("H!e!!!ll!o !!wo!r!ld!")); // Hello world
echo PHP_EOL;

// или с помощью replace
function remove_exclamation_marks_1($string)
{
    return str_replace("!", "", $string);
}
var_dump(remove_exclamation_marks_1("Hello world!")); // Hello world
var_dump(remove_exclamation_marks_1("H!e!!!ll!o !!wo!r!ld!")); // Hello world



// 4. [8-kyu], [string]. String repeat. 
// Write a function that accepts an integer n and a string s as parameters, and returns a string of s repeated exactly n times.
// Examples (input -> output)
// 6, "I"     -> "IIIIII"
// 5, "Hello" -> "HelloHelloHelloHelloHello"
function repeatStr($n, $str)
{
    $out = "";
    for ($i = 1; $i <= $n; $i++) {
        $out = $out . $str;
    }
    return $out;
}
var_dump(repeatStr(6, "I"));
var_dump(repeatStr(5, "Hello"));

// или str_repeat($str, $n)

function repeatStr_1($n, $str)
{
    return str_repeat($str, $n);
}
var_dump(repeatStr_1(6, "I"));
var_dump(repeatStr_1(5, "Hello"));



// 5. [8-kyu], [string]. Remove First and Last Character
// It's pretty straightforward. Your goal is to create a function that removes the first and last characters of a string. You're given one parameter, the original string. You don't have to worry about strings with less than two characters.
function remove_char(string $s): string
{
    $res = "";
    for ($i = 1; $i < strlen($s) - 1; $i++) {
        $res = $res . $s[$i];
    }
    return $res;
}
var_dump(remove_char("Hello"));

// или с помощью substr
function remove_char_1(string $s): string
{
    return substr($s, 1, -1);
}
var_dump(remove_char_1("Hello"));
echo PHP_EOL;



// 6. [8-kyu], [string]. Convert a Number to a String!
// We need a function that can transform a number (integer) into a string.
// What ways of achieving this do you know?
// Examples (input --> output):
// 123  --> "123"
// 999  --> "999"
// -100 --> "-100"
function numberToString($num)
{
    return $num . "";
    // или 
    // return "$num";
}
var_dump(numberToString(123));
echo PHP_EOL;



// 7. [8-kyu], [string]. Remove String Spaces. 
// Write a function that removes the spaces from the string, then return the resultant string.
// Examples:
// Input -> Output
// "8 j 8   mBliB8g  imjB8B8  jl  B" -> "8j8mBliB8gimjB8B8jlB"
// "8 8 Bi fk8h B 8 BB8B B B  B888 c hl8 BhB fd" -> "88Bifk8hB8BB8BBBB888chl8BhBfd"
// "8aaaaa dddd r     " -> "8aaaaaddddr"
function no_space(string $s): string
{
    return str_replace(" ", "", $s);
}
var_dump(no_space("8 j 8   mBliB8g  imjB8B8  jl  B")); // "8j8mBliB8gimjB8B8jlB"
echo PHP_EOL;

// или 

function no_space_1(string $s): string
{
    $str = "";
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] !== " ") {
            $str = $str . $s[$i];
        }
    }
    return $str;
}
var_dump(no_space_1("8He l l 1"));
echo PHP_EOL;



// 8. [8-kyu], [string]. Convert a String to a Number!  
// We need a function that can transform a string into a number. What ways of achieving this do you know?
// Note: Don't worry, all inputs will be strings, and every string is a perfectly valid representation of an integral number.
// Examples
// "1234" --> 1234
// "605"  --> 605
// "1405" --> 1405
// "-7" --> -7
function stringToNumber($str)
{
    return (int) ($str); // приведение типов, к числу
    // или 
    // return +($str);
}
var_dump(stringToNumber("1234"));
echo PHP_EOL;



// 9. [8-kyu], [string]. Abbreviate a Two Word Name 
// Write a function to convert a name into initials. This kata strictly takes two words with one space in between them.
// The output should be two capital letters with a dot separating them.
// It should look like this:
// Sam Harris => S.H
// patrick feeney => P.F

function abbrevName($name)
{
    $res = $name[0] . ".";
    for ($i = 0; $i < strlen($name); $i++) {
        if ($name[$i] === " ") {
            $res .= $name[$i + 1];
        }
    }
    return strtoupper($res);
}
var_dump(abbrevName("patrick feeney"));
var_dump(abbrevName("Sam Harris"));
var_dump(abbrevName("Ivan Babenko"));
// или 
function addrevName_1($name)
{
    $res = explode(" ", $name);
    return strtoupper($res[0][0]) . "." . strtoupper($res[1][0]);
}
var_dump(addrevName_1("ivan babenko"));
echo PHP_EOL;



// 10. [8-kyu], [string]. Returning Strings
// Make a function that will return a greeting statement that uses an input; your program should return, "Hello, <name> how are you doing today?".
// [Make sure you type the exact thing I wrote or the program may not execute properly]

function greet($name)
{
    return "Hello, $name how are you doing today?";
}
var_dump(greet("Ivan"));
echo PHP_EOL;



// 11. [8-kyu], [string]. Convert a Boolean to a String
// Implement a function which convert the given boolean value into its string representation.
// Note: Only valid inputs will be given.

function booleanToString($b)
{
    if ($b) {
        return "true";
    } else if ($b === false) {
        return "false";
    }
}
var_dump(booleanToString(false));
var_dump(booleanToString(true));
echo PHP_EOL;

// или через тернарный оператор
function booleanToString_1($b)
{
    return $b ? "true" : "false";
}
var_dump(booleanToString(false));
var_dump(booleanToString(true));
echo PHP_EOL;



// 12. [8-kyu], [string]. You only need one - Beginner
// You will be given an array a and a value x. All you need to do is check whether the provided array contains the value.
// Array can contain numbers or strings. X can be either.
// Return true if the array contains the value, false if not.

function solution_in_array($a, $x)
{
    return in_array($x, $a, true);
}
var_dump(solution_in_array([1, 2, 3, "Hot"], "2")); // false
var_dump(solution_in_array([1, 2, 3, "Hot"], 2)); // true 
var_dump(solution_in_array([1, 2, 3, "Hot"], "hot")); // false
var_dump(solution_in_array([1, 2, 3, "Hot"], "Hot")); // true
echo PHP_EOL;



// 13. [8-kyu], [string]. Fake Binary
// Given a string of digits, you should replace any digit below 5 with '0' and any digit 5 and above with '1'. Return the resulting string.
// Note: input will never be an empty string
// Учитывая строку цифр, вам следует заменить любую цифру ниже 5 на «0», а любую цифру от 5 и выше на «1». Верните полученную строку.
// Примечание: ввод никогда не будет пустой строкой.

function fake_bin(string $str): string
{
    for ($i = 0; $i < strlen($str); $i++) {
        if ((int) ($str[$i]) < 5) {
            $str[$i] = "0";
        } else {
            $str[$i] = "1";
        }
    }
    return $str;
}
var_dump(fake_bin('45385593107843568'));
echo PHP_EOL;



// 14. [8-kyu], [string]. MakeUpperCase
// Write a function which converts the input string to uppercase.

function makeUpperCase(string $input): string
{
    return strtoupper($input);
}
var_dump(makeUpperCase("hello"));
echo PHP_EOL;



// 15. [8-kyu], [string]. Sentence Smash
// Write a function that takes an array of words and smashes them together into a sentence and returns the sentence. You can ignore any need to sanitize words or add punctuation, but you should add spaces between each word. Be careful, there shouldn't be a space at the beginning or the end of the sentence!
// Example
// ['hello', 'world', 'this', 'is', 'great']  =>  'hello world this is great'

function smash(array $words): string
{
    return implode(" ", $words);
}
var_dump(smash(['hello', 'world', 'this', 'is', 'great']));

// или 
function smash_1(array $words): string
{
    $res = "";
    for ($i = 0; $i < count($words); $i++) {
        $res = $res . $words[$i] . " ";
    }
    return trim($res);
}
var_dump(smash_1(['hello', 'world', 'this', 'is', 'great']));
echo PHP_EOL;



// 16. [8-kyu], [string]. DNA to RNA Conversion
// Дезоксирибонуклеиновая кислота, ДНК, является основной молекулой хранения информации в биологических системах. Он состоит из четырех оснований нуклеиновых кислот: гуанина («G»), цитозина («C»), аденина («А») и тимина («Т»).
// Рибонуклеиновая кислота, РНК, является основной молекулой-мессенджером в клетках. РНК несколько отличается от ДНК по химической структуре и не содержит тимина. В РНК тимин заменен другой нуклеиновой кислотой урацилом («U»).
// Создайте функцию, которая переводит заданную строку ДНК в РНК.
// Например:
// "GCAT" => "GCAU"
// Входная строка может иметь произвольную длину, в частности, она может быть пустой. Все введенные данные гарантированно действительны, т. е. каждая входная строка будет состоять только из букв «G», «C», «A» и/или «T».

function dnaToRna($str)
{
    return str_replace("T", "U", $str);
}
var_dump(dnaToRna("GCAT"));
echo PHP_EOL;

// или 

function dnaToRna_1($str)
{
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === "T") {
            $str[$i] = "U";
        }
    }
    return $str;
}
var_dump(dnaToRna_1("GCAT"));
echo PHP_EOL;



// 17. [8-kyu], [string]. If you can't sleep, just count sheep!!
// If you can't sleep, just count sheep!!
// Task:
// Given a non-negative integer, 3 for example, return a string with a murmur: "1 sheep...2 sheep...3 sheep...". Input will always be valid, i.e. no negative integers.
// $this->assertSame('', countsheep(0));
// $this->assertSame('1 sheep...', countsheep(1));
// $this->assertSame('1 sheep...2 sheep...', countsheep(2));
// $this->assertSame('1 sheep...2 sheep...3 sheep...', countsheep(3));

function countsheep($num)
{
    $res = "";
    for ($i = 1; $i <= $num; $i++) {
        $res .= "$i sheep...";
    }
    return $res;
}
var_dump(countsheep(0));
var_dump(countsheep(1));
var_dump(countsheep(2));
var_dump(countsheep(3));
echo PHP_EOL;



// 18. [8-kyu], [string]. Reversed Words
// Complete the solution so that it reverses all of the words within the string passed in.
// Words are separated by exactly one space and there are no leading or trailing spaces.
// Example(Input --> Output):
// "The greatest victory is that which requires no battle" --> "battle no requires which that is victory greatest The"

function reverseWords($str)
{
    return implode(" ", array_reverse(explode(" ", $str)));
}
var_dump(reverseWords("The greatest victory is that which requires no battle"));
echo PHP_EOL;



// 19. [8-kyu], [string]. Convert a string to an array
// Write a function to split a string and convert it into an array of words.
// Examples (Input ==> Output):
// "Robin Singh" ==> ["Robin", "Singh"]
// "I love arrays they are my favorite" ==> ["I", "love", "arrays", "they", "are", "my", "favorite"]

function string_to_array($s)
{
    return explode(" ", $s);
}
var_dump(string_to_array("I love arrays they are my favorite"));
echo PHP_EOL;



// 20. [8-kyu], [string]. Total amount of points
// Our football team has finished the championship.
// Our team's match results are recorded in a collection of strings. Each match is represented by a string in the format "x:y", where x is our team's score and y is our opponents score.
// For example: ["3:1", "2:2", "0:1", ...]
// Points are awarded for each match as follows:
// if x > y: 3 points (win)
// if x < y: 0 points (loss)
// if x = y: 1 point (tie)
// We need to write a function that takes this collection and returns the number of points our team (x) got in the championship by the rules given above.
// Notes:
// our team always plays 10 matches in the championship
// 0 <= x <= 4
// 0 <= y <= 4
// $this->assertSame(30, points(['1:0','2:0','3:0','4:0','2:1','3:1','4:1','3:2','4:2','4:3']));
// $this->assertSame(10, points(['1:1','2:2','3:3','4:4','2:2','3:3','4:4','3:3','4:4','4:4']));
// $this->assertSame(0,  points(['0:1','0:2','0:3','0:4','1:2','1:3','1:4','2:3','2:4','3:4']));
// $this->assertSame(15, points(['1:0','2:0','3:0','4:0','2:1','1:3','1:4','2:3','2:4','3:4']));
// $this->assertSame(12, points(['1:0','2:0','3:0','4:4','2:2','3:3','1:4','2:3','2:4','3:4']));

function points(array $games): int
{
    $res = 0;
    for ($i = 0; $i < count($games); $i++) {
        if ($games[$i][0] > $games[$i][2]) {
            $res += 3;
        } else if ($games[$i][0] === $games[$i][2]) {
            $res++;
        }
    }
    return $res;
}
var_dump(points(['1:0', '2:0', '3:0', '4:0', '2:1', '3:1', '4:1', '3:2', '4:2', '4:3']));
var_dump(points(['1:1', '2:2', '3:3', '4:4', '2:2', '3:3', '4:4', '3:3', '4:4', '4:4']));
var_dump(points(['0:1', '0:2', '0:3', '0:4', '1:2', '1:3', '1:4', '2:3', '2:4', '3:4']));
var_dump(points(['1:0', '2:0', '3:0', '4:0', '2:1', '1:3', '1:4', '2:3', '2:4', '3:4']));
var_dump(points(['1:0', '2:0', '3:0', '4:4', '2:2', '3:3', '1:4', '2:3', '2:4', '3:4']));
echo PHP_EOL;


// 21. [8-kyu], [string]. повернуть строку Twin Peaks с помощью цикла
$str = "Twin Peaks";
$res = "";
for ($i = 0; $i < strlen($str); $i++) {
    $res[$i] = $str[(strlen($str) - 1) - $i];
}
echo $res, "\n";
echo PHP_EOL;



echo "\n\n========================================= [8-kyu], [mathematics] ========================================= \n\n";



// 1. [8-kyu], [mathematics]. Grasshopper - Summation
// Summation
// Write a program that finds the summation of every number from 1 to num. The number will always be a positive integer greater than 0. Your function only needs to return the result, what is shown between parentheses in the example below is how you reach that result and it's not part of it, see the sample tests.
// For example (Input -> Output):
// 2 -> 3 (1 + 2)
// 8 -> 36 (1 + 2 + 3 + 4 + 5 + 6 + 7 + 8)

function summation($n)
{
    $res = 0;
    for ($i = 0; $i <= $n; $i++) {
        $res += $i;
    }
    return $res;
}
var_dump(summation(0));
var_dump(summation(1));
var_dump(summation(2));
var_dump(summation(3));
var_dump(summation(4));
var_dump(summation(8));
echo PHP_EOL;



// 2. [8-kyu], [mathematics]. Basic Mathematical Operations
// Your task is to create a function that does four basic mathematical operations.
// The function should take three arguments - operation(string/char), value1(number), value2(number).
// The function should return result of numbers after applying the chosen operation.
// Examples(Operator, value1, value2) --> output
// ('+', 4, 7) --> 11
// ('-', 15, 18) --> -3
// ('*', 5, 5) --> 25
// ('/', 49, 7) --> 7

function basicOp($op, $val1, $val2)
{
    if ($op === "+") {
        return $val1 + $val2;
    } else if ($op === "-") {
        return $val1 - $val2;
    } else if ($op === "*") {
        return $val1 * $val2;
    } else if ($op === "/") {
        return $val1 / $val2;
    }
}
var_dump(basicOp("+", 4, 7));
var_dump(basicOp('-', 15, 18));
var_dump(basicOp("*", 5, 5));
var_dump(basicOp("/", 49, 7));
echo PHP_EOL;



// 3. [8-kyu], [mathematics]. Century From Year
// Introduction
// The first century spans from the year 1 up to and including the year 100, the second century - from the year 101 up to and including the year 200, etc.
// Task
// Given a year, return the century it is in.
// Examples
// 1705 --> 18
// 1900 --> 19
// 1601 --> 17
// 2000 --> 20
// 2742 --> 28

function centruryFromYear($year): int
{

    $s = floor($year / 100); // floor округляет меньшую сторону
    if ($year - $s * 100 > 0) {
        return $s + 1;
    } else {
        return $s;
    }
}
var_dump(centruryFromYear(1705));
var_dump(centruryFromYear(1900));
var_dump(centruryFromYear(1601));
var_dump(centruryFromYear(2000));
var_dump(centruryFromYear(2742));
echo PHP_EOL;

// или

function centruryFromYear_1($year): int
{
    return ceil($year / 100); // ceil округляет в большую сторону 

}
var_dump(centruryFromYear_1(1705));
var_dump(centruryFromYear_1(1900));
var_dump(centruryFromYear_1(1601));
var_dump(centruryFromYear_1(2000));
var_dump(centruryFromYear_1(2742));
echo PHP_EOL;



// 4. [8-kyu], [mathematics]. Area or Perimeter
// You are given the length and width of a 4-sided polygon. The polygon can either be a rectangle or a square.
// If it is a square, return its area. If it is a rectangle, return its perimeter.
// Example(Input1, Input2 --> Output):
// 6, 10 --> 32
// 3, 3 --> 9
// Note: for the purposes of this kata you will assume that it is a square if its length and width are equal, otherwise it is a rectangle.

function areaOrPerimetr(int $l, int $w)
{
    // if ($l === $w) {
    //     return $l * $w;
    // } else {
    //     return $l * 2 + $w * 2;
    // }
    return ($l === $w) ? $l * $w : $l * 2 + $w * 2;

}
var_dump(areaOrPerimetr(6, 10));
var_dump(areaOrPerimetr(6, 6));
var_dump(areaOrPerimetr(3, 3));
echo PHP_EOL;



// 5. [8-kyu], [mathematics]. Keep Hydrated!
// Nathan loves cycling.
// Because Nathan knows it is important to stay hydrated, he drinks 0.5 litres of water per hour of cycling.
// You get given the time in hours and you need to return the number of litres Nathan will drink, rounded to the smallest value.
// For example:
// time = 3 ----> litres = 1
// time = 6.7---> litres = 3
// time = 11.8--> litres = 5

function litres(float $t): int
{
    return $t * 0.5;
}
var_dump(litres(3));
var_dump(litres(6.7));
var_dump(litres(11.8));
echo PHP_EOL;



// 6. [8-kyu], [mathematics]. Will you make it?
// You were camping with your friends far away from home, but when it's time to go back, you realize that your fuel is running out and the nearest pump is 50 miles away! You know that on average, your car runs on about 25 miles per gallon. There are 2 gallons left.
// Considering these factors, write a function that tells you if it is possible to get to the pump or not.
// Function should return true if it is possible and false if not.

function zeroFuel($distanceToPump, $mpg, $fuelLeft)
{
    return $mpg * $fuelLeft >= $distanceToPump;
    // return ($mpg * $fuelLeft - $distanceToPump >= 0) ? true : false;
    // if ($mpg * $fuelLeft - $distanceToPump >= 0) {
    //     return true;
    // } else {
    //     return false;
    // }
}
var_dump(zeroFuel(50, 25, 2));
var_dump(zeroFuel(100, 50, 1));
echo PHP_EOL;



// 7. [8-kyu], [mathematics]. Quarter of the year
// Учитывая месяц как целое число от 1 до 12, выведите в виде целого числа, к какому кварталу года он принадлежит.
// Например: месяц 2 (февраль) является частью первого квартала; 6-й месяц (июнь) является частью второго квартала; и месяц 11 (ноябрь) является частью четвертого квартала. Кварта́л — единица измерения времени, равная трём месяцам.
// Ограничение:
// 1 <= месяц <= 12
// $this->assertEquals(1, quarterOf(2));
// $this->assertEquals(2, quarterOf(6));
// $this->assertEquals(3, quarterOf(7));

function quarterOf($month)
{
    return ceil($month / 3);
}
var_dump(quarterOf(2));
var_dump(quarterOf(6));
var_dump(quarterOf(7));
var_dump(quarterOf(8));
var_dump(quarterOf(12));
echo PHP_EOL;



// 8. [8-kyu], [mathematics]. Grasshopper - Check for factor
// This function should test if the factor is a factor of base.
// Return true if it is a factor or false if it is not.
// About factors
// Factors are numbers you can multiply together to get another number.
// 2 and 3 are factors of 6 because: 2 * 3 = 6
// You can find a factor by dividing numbers. If the remainder is 0 then the number is a factor.
// You can use the mod operator (%) in most languages to check for a remainder
// For example 2 is not a factor of 7 because: 7 % 2 = 1
// Note: base is a non-negative number, factor is a positive number.

function checkForFactor($base, $factor)
{
    return ($base % $factor === 0) ? true : false;
    // или
    // return $base % $factor === 0;
}
var_dump(checkForFactor(6, 2));
var_dump(checkForFactor(7, 2));
echo PHP_EOL;



// 9. [8-kyu], [mathematics]. Twice as old (-)
// Ваша функция принимает два аргумента:
// текущий возраст отца (лет)
// текущий возраст его сына (лет)
// Вычислите, сколько лет назад отец был вдвое старше сына (или через сколько лет он будет вдвое старше). Ответ всегда больше или равен 0, независимо от того, было ли это в прошлом или в будущем.
// $this->assertSame(22, twice_as_old(36,7));
// $this->assertSame(5, twice_as_old(55,30));
// $this->assertSame(0, twice_as_old(42,21));
// $this->assertSame(20, twice_as_old(22,1));
// $this->assertSame(29, twice_as_old(29,0));

function twice_as_old($dad_years_old, $son_years_old)
{
    return abs($dad_years_old - $son_years_old * 2); // abs -  возвращает абсолютную величину (модуль числа)
}
var_dump(twice_as_old(36, 7));
var_dump(twice_as_old(55, 30));
echo PHP_EOL;



// 10. [8-kyu], [mathematics]. Volume of a Cuboid
// Бобу нужен быстрый способ вычисления объема кубоида с тремя значениями: длиной, шириной и высотой кубоида. Напишите функцию, которая поможет Бобу выполнить эти вычисления. Объем кубоида = длина * ширина * высота 
function get_volume_of_cuboid($length, $width, $height)
{
    return $length * $width * $height;
}
var_dump(get_volume_of_cuboid(1, 2, 2));
echo PHP_EOL;


// 11. [8-kyu], [mathematics]. Count Odd Numbers below n
// Учитывая число n, верните количество положительных нечетных чисел ниже n, ЛЕГКО!
// Примеры (Ввод -> Выход)
// 7 -> 3 (потому что нечетные числа ниже 7 равны [1, 3, 5])
// 15 -> 7 (потому что нечетные числа ниже 15 — это [1, 3, 5, 7, 9, 11, 13])
// Ожидайте больших входов!
// $this->assertSame(7, oddCount(15), "Oops! Wrong.");
// $this->assertSame(7511, oddCount(15023), "Oops! Wrong.");

function oddCount($n): int
{
    $res = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($i % 2 !== 0) {
            $res++;
        }
    }
    return $res;
    // return intdiv($n, 2);
    // return floor($n / 2);
}
var_dump(oddCount(7));
var_dump(oddCount(5));
var_dump(oddCount(15));
var_dump(oddCount(15023));
echo PHP_EOL;
echo PHP_EOL;



// 12. [8-kyu], [mathematics]. Have square or not
// Если число имеет целый квадратный корень, то выведите результат квадратного корня от числа, иначе верните false
// 4 -> 2
// 5 -> false

var_dump(strlen(4)); // 1
var_dump(strlen(sqrt(4))); // 1 
var_dump(strlen(sqrt(5))); // int(15)

function check_square($n)
{
    $res = sqrt($n);
    if (strlen($res) > 1) {
        return "дробное число";
    } else {
        return sqrt($n);
    }
    // или
    // return sqrt($n) === floor(sqrt($n)) ?  "дробное число" : sqrt($n);

}
var_dump(check_square(4)); // 2
var_dump(check_square(55)); // дробное число
echo PHP_EOL;



// 13. [8-kyu], [mathematics]. To square(root) or not to square(root)
// Напишите метод, который будет получать в качестве параметра целочисленный массив и обрабатывать каждое число из этого массива.
// Верните новый массив с обработкой каждого числа входного массива следующим образом:
// Если число имеет целый квадратный корень, возьмите его, в противном случае возведите число в квадрат.
// Пример
// [4,3,9,7,2,1] -> [2,9,3,49,4,1]
// Примечания
// Входной массив всегда будет содержать только положительные числа и никогда не будет пустым или нулевым.

function squareOrSquareRoot($array)
{
    return
        array_map(function ($item) {
            if (strlen(sqrt($item)) > 1) {
                return $item ** 2;
            } else {
                return $item ** 0.5;
            }
        }, $array);
}
var_dump(squareOrSquareRoot([4, 3, 9, 7, 2, 1]));

// или 

function squareOrSquareRoot_1($array)
{
    $res = [];
    for ($i = 0; $i < count($array); $i++) {
        if (strlen(sqrt($array[$i])) > 1) {
            $res[$i] = $array[$i] ** 2;
        } else {
            $res[$i] = sqrt($array[$i]);
        }
    }
    return $res;
}
var_dump(squareOrSquareRoot_1([4, 3, 9, 7, 2, 1]));

// или 

function squareOrSquareRoot_2($array)
{
    $res = [];
    foreach ($array as $key => $value) {
        if (strlen(sqrt($array[$key])) > 1) {
            $res[$key] = $array[$key] ** 2;
        } else {
            $res[$key] = sqrt($array[$key]);
        }
    }
    return $res;

}
var_dump(squareOrSquareRoot_2([4, 3, 9, 7, 2, 1]));

// или 
// intval — Возвращает целочисленное значение переменной
var_dump(intval(4));
var_dump(intval(4.5));
var_dump(sqrt(5));
var_dump(intval(sqrt(4)));
var_dump(intval(sqrt(5)));
var_dump(sqrt(5) == intval(sqrt(5)));
var_dump(sqrt(4) == intval(sqrt(4)));

function squareOrSquareRoot_3($a)
{
    return array_map(function ($n) {
        return sqrt($n) == intval(sqrt($n)) ? sqrt($n) : $n ** 2;
        // или 
        // return sqrt($n) == floor(sqrt($n)) ? sqrt($n) : $n ** 2;
    }, $a);
}
var_dump(squareOrSquareRoot_3([4, 3, 9, 7, 2, 1]));
echo PHP_EOL;



// 14. [8-kyu], [mathematics]. Return the Nth Even Number
// Вернуть N-е четное число
// Пример (Ввод -> Выход)
// 1 -> 0 (первое четное число — 0)
// 3 --> 4 (3-е четное число — 4 (0, 2, 4))
// 100 --> 198
// 1298734 --> 2597466
// Входное значение не будет 0.$this->assertSame(0, nthEven(1));
// $this->assertSame(2, nthEven(2));
// $this->assertSame(4, nthEven(3));
// $this->assertSame(198, nthEven(100));
// 0 – 1-е четное число, 2 – 2-е четное число, 4 – 3-е четное число; и так далее

function nthEven($n)
{
    return $n * 2 - 2;
    // или 
    // return ($n-1) * 2
}
var_dump(nthEven(1));
var_dump(nthEven(2));
var_dump(nthEven(3));
var_dump(nthEven(100));
echo PHP_EOL;



// 15. [8-kyu], [mathematics]. Holiday VIII - Duty Free
// Цель этого ката — подсчитать, сколько бутылок беспошлинного виски вам придется купить, чтобы экономия по сравнению с обычной розничной ценой эффективно покрыла расходы на отпуск.
// Вам будет предоставлена основная цена (normPrice, в фунтах стерлингов), скидка беспошлинной торговли (скидка, в процентах) и стоимость отпуска (в фунтах стерлингов).
// Например, если бутылка обычно стоит 10 фунтов стерлингов, а скидка беспошлинной торговли составляет 10%, вы сэкономите 1 фунт стерлингов за бутылку. Если ваш отпуск будет стоить 500 фунтов стерлингов, вам придется купить 500 бутылок, чтобы сэкономить 500 фунтов стерлингов, поэтому ответ, который вы вернете, должен быть 500.
// Другой пример: если бутылка обычно стоит 12 фунтов стерлингов, а скидка беспошлинной торговли составляет 50%, вы сэкономите 6 фунтов стерлингов за бутылку. Если ваш отпуск будет стоить 1000 фунтов стерлингов, вам придется купить 166,66 бутылок, чтобы сэкономить 1000 фунтов стерлингов, поэтому ваш ответ должен быть 166 бутылок.
// Все входные данные будут целыми числами. Пожалуйста, верните целое число. Округлить вниз.
// $this->assertSame(166, dutyFree(12, 50, 1000));
// $this->assertSame(294, dutyFree(17, 10, 500));
// $this->assertSame(357, dutyFree(24, 35, 3000));

function dutyFree(int $n, int $d, int $h): int
{
    return floor($h / ($n * $d / 100));
}
var_dump(dutyFree(12, 50, 1000));
var_dump(dutyFree(17, 10, 500));
var_dump(dutyFree(24, 35, 3000));



// 16. [8-kyu], [mathematics]. Find the Remainder
// Напишите функцию, которая принимает два целых числа и возвращает остаток от деления большего значения на меньшее.
// Деление на ноль должно возвращать пустое значение.
// Примеры:
// п = 17
// м = 5
// результат = 2 (остаток `17/5`)
// п = 0
// м = -1
// результат = 0 (остаток `0/-1`)

function remainder($a, $b)
{
    if (($a > $b and $b === 0) or ($a < $b and $a === 0)) {
        return 0;
    }
    return ($a > $b) ? ($a % $b) : ($b % $a);
}
var_dump(remainder(17, 5));
var_dump(remainder(1, 0));
var_dump(remainder(-1, 0));
echo PHP_EOL;



// 17. [8-kyu], [mathematics]. Alan Partridge II - Apple Turnover
// Ваша задача проста: если x в квадрате больше 1000, верните «Жарче солнца!!», в противном случае верните «Угощайтесь сотовым йорком за перчаточным ящиком».
// Примечание. Ввод будет либо положительным целым числом (или строкой для нетипизированных языков).

function apple($x)
{
    return (int) $x ** 2 > 1000 ? "Жарче солнца!!" : "Угощайтесь сотовым йорком за перчаточным ящиком";
}
var_dump(apple('50'));
var_dump(apple(5));
echo PHP_EOL;


// 18. [8-kyu], [mathematics]. Area of a Square
// Завершите функцию, которая вычисляет площадь красного квадрата, когда в качестве входных данных задана длина дуги окружности A. Возвращает результат, округленный до двух десятичных знаков.
// Примечание. используйте значение π, указанное на вашем языке (Math::PI, M_PI, math.pi и т. д.).
// Длина дуги - это 1/4 от длины окружности. Значит, длина окружности равна 8 (2*4=8). 
// (8/3,14) / 2 = 1,27....
// 1,27 * 1.27 = 1,61 
// $this->assertSame(0.00, square_area(0));
// $this->assertSame(1.62, square_area(2));
// $this->assertSame(80.00, square_area(14.05));

function square_area($A)
{
    $res = $A * 4;
    $a = ($res / M_PI) / 2;
    return round($a * $a, 2);
}
var_dump(square_area(0));
var_dump(square_area(2));
var_dump(square_area(14.05));
echo PHP_EOL;



// 19. [8-kyu], [mathematics]. Pythagorean Triple
// Given an unsorted array of 3 positive integers [ n1, n2, n3 ], determine if it is possible to form a Pythagorean Triple using those 3 integers.
// A Pythagorean Triple consists of arranging 3 integers, such that:
// a^2 + b^2 = c^2
// Examples
// [5, 3, 4] : it is possible to form a Pythagorean Triple using these 3 integers: 3^2 + 4^2 = 5^2
// [3, 4, 5] : it is possible to form a Pythagorean Triple using these 3 integers: 3^2 + 4^2 = 5^2
// [13, 12, 5] : it is possible to form a Pythagorean Triple using these 3 integers: 5^2 + 12^2 = 13^2
// [100, 3, 999] : it is NOT possible to form a Pythagorean Triple using these 3 integers - no matter how you arrange them, you will never find a way to satisfy the equation a^2 + b^2 = c^2
// Return Values
// For Python: return True or False
// For JavaScript: return true or false
// Other languages: return 1 or 0 or refer to Sample Tests.

function pythagorean_triple($integers)
{
    $a = $integers[0];
    $b = $integers[1];
    $c = $integers[2];
    return
        pow($a, 2) + pow($b, 2) === pow($c, 2) or
        pow($a, 2) + pow($c, 2) === pow($b, 2) or
        pow($b, 2) + pow($c, 2) === pow($a, 2) ?
        true : false;
}
var_dump(pythagorean_triple([5, 3, 4]));
var_dump(pythagorean_triple([3, 4, 5]));
var_dump(pythagorean_triple([13, 12, 5]));
var_dump(pythagorean_triple([100, 3, 999]));
echo PHP_EOL;



// 20. [8-kyu], [mathematics]. Calculate Price Excluding VAT
// Напишите функцию, вычисляющую первоначальную цену продукта без НДС.
// Если цена товара 200,00 и НДС 15%, то конечная цена товара (с НДС) равна: 200,00 + 15% = 230,00. => x + x*1/100 = 230 => x = 230*100/115
// Таким образом, если ваша функция получает на входе 230,00, она должна вернуть 200,00.
// Для целей настоящего Ката НДС всегда составляет 15%.
// Округлите результат до двух десятичных знаков.
// Если задано нулевое значение, верните -1

function excludingVatPrice($price)
{
    return $price < 1 ? -1 : round($price * 100 / 115, 2);

}
var_dump(excludingVatPrice(230));
var_dump(excludingVatPrice(123));
var_dump(excludingVatPrice(0));
echo PHP_EOL;



// 21. [8-kyu], [mathematics]. 
// напишите функцию fn_1, которая выводит последовательно чисел до n (включительно) : 6, 10, 14, 18, ...n

function fn_1($n)
{
    $res = "";
    for ($i = 6; $i <= $n; $i = $i + 4) {
        $res .= $i . " ";
    }
    return trim($res);
}
var_dump(fn_1(18));
echo PHP_EOL;



// 22. [8-kyu], [mathematics]. 
// напишите функцию fn_2, которая выводит последовательно чисел до n (включительно) : 3 6 12 24 ...n
function fn_2($n)
{
    $res = "";
    for ($i = 3; $i <= $n; $i = $i * 2) {
        $res .= $i . " ";
    }
    return trim($res);
}
var_dump(fn_2(60));
echo PHP_EOL;



echo "\n\n========================================= [8-kyu], [arrays] ========================================= \n\n";

// 1. [8-kyu], [arrays]. Напите функцию f01, внутри которой создайте массив, где нулевой элемент равен 100, первый элемент равен 101 и второй элемент равен 102. Функция возвращает массив.

function f01()
{
    return [100, 101, 102];
}
var_dump(f01());
echo PHP_EOL;



// 2. [8-kyu], [arrays]. Напите функцию f02, внутри которой создайте массив, где нулевой элемент равен 100, пятый элемент равен 101 и десятый элемент равен 102. Функция возвращает массив.

function f02()
{
    return [0 => 100, 5 => 101, 10 => 102];
}
var_dump(f02());
var_dump(f02()[0]);
var_dump(f02()[5]);
var_dump(f02()[10]);
// var_dump(f02()[2]); // Undefined array key 2
echo PHP_EOL;



// 3. [8-kyu], [arrays]. Напите функцию f03, которая получает массив как аргумент и возвращает его длину.

function f03($arr)
{
    return count($arr);
}
var_dump(f03([0, 1, 2])); // 3
var_dump(f03([0, 1, 2, 10])); // 4
echo PHP_EOL;



// 4. [8-kyu], [arrays]. Напишите функцию f04, которая получает массив как аргумент и возвращает строку - все элементы массива через нижнее подчёркивание. 

function f04($arr)
{
    return implode("_", $arr);
}
var_dump(f04([1, 3, 5]));

// или 

function f04_($arr)
{
    $res = "";
    for ($i = 0; $i < count($arr); $i++) {
        if ($i === 0) {
            $res = $arr[$i];
            continue;
        }
        $res = $res . "_" . $arr[$i];
    }
    return $res;
}
var_dump(f04_([1, 3, 5])); // 1_3_5
echo PHP_EOL;



// 5. [8-kyu], [arrays]. A Needle in the Haystack
// Сможете ли вы найти иголку в стоге сена?
// Напишите функцию findNeedle(), которая принимает массив, полный мусора, но содержащий одну «иглу».
// После того, как ваша функция найдет иглу, она должна вернуть сообщение (в виде строки):
// «найдена игла в позиции» плюс индекс, на котором найдена игла, поэтому:
// Пример (Ввод -> Выход)
// ["сено", "мусор", "сено", "сено", "еще мусор", "игла", "случайный мусор"] --> "найдена игла в позиции 5"

function findNeedle($haystack)
{
    return "found the needle at position " . array_search("needle", $haystack);
}
var_dump(findNeedle(["hay", "junk", "hay", "hay", "moreJunk", "needle", "randomJunk"]));
echo PHP_EOL;


// 6. [8-kyu], [arrays]. Beginner - Lost Without a Map
// Учитывая массив целых чисел, верните новый массив, в котором каждое значение удвоено.
// Например:
// [1, 2, 3] --> [2, 4, 6]

function maps($x)
{
    return array_map(function ($item) {
        return $item * 2;
    }, $x);
}
var_dump(maps([1, 2, 3]));

// или 

function maps_1($x)
{
    $res = [];
    for ($i = 0; $i < count($x); $i++) {
        $res[$i] = $x[$i] * 2;
    }
    return $res;
}
var_dump(maps_1([1, 2, 3]));
echo PHP_EOL;



// 7. [8-kyu], [arrays]. Sum Arrays
// Напишите функцию, которая принимает массив чисел и возвращает сумму чисел. Числа могут быть отрицательными или нецелыми. Если массив не содержит чисел, вам следует вернуть 0.
// Примеры
// Ввод: [1, 5.2, 4, 0, -1]
// Выход: 9.2
// Вход: []
// Выход: 0
// Ввод: [-2,398]
// Выход: -2,398
// Предположения
// Вы можете считать, что вам даны только цифры.
// Вы не можете предположить размер массива.
// Вы можете предположить, что получили массив, и если массив пуст, верните 0.
// Что мы тестируем
// Мы тестируем базовые циклы и математические операции. Это для новичков, которые только изучают циклы и математические операции.
// Опытным пользователям это может показаться чрезвычайно простым, и они легко смогут написать это в одну строку.

function sum(array $a): float
{
    $res = 0;
    for ($i = 0; $i < count($a); $i++) {
        $res += $a[$i];
    }
    return $res;
}
var_dump(sum([1, 5.2, 4, 0, -1]));

// или 

function sum_1(array $a): float
{
    return array_sum($a);
}
var_dump(sum_1([1, 3, 5]));
echo PHP_EOL;



// 8. [8-kyu], [arrays]. Calculate average
// Write a function which calculates the average of the numbers in a given list.
// Note: Empty arrays should return 0.

function find_average($array): float
{
    return count($array) > 0 ? array_sum($array) / count($array) : 0;
}
var_dump(find_average([5, 5, 5, 5, 4]));
var_dump(find_average([]));
echo PHP_EOL;



// 9. [8-kyu], [arrays]. Invert values
// Учитывая набор чисел, верните аддитивную обратную величину каждого из них. Каждое положительное становится отрицательным, а отрицательное становится положительным.
// инвертировать([1,2,3,4,5]) == [-1,-2,-3,-4,-5]
// инвертировать([1,-2,3,-4,5]) == [-1,2,-3,4,-5]
// инвертировать([]) == []
// Вы можете предположить, что все значения являются целыми числами. Не изменяйте входной массив/список.

function invert(array $a): array
{
    return array_map(fn($a) => -$item, $a); // стрелочная функция
}
var_dump(invert([1, 2, 3, 4, 5]));
var_dump(invert([]));
echo PHP_EOL;



// 10. [8-kyu], [arrays]. Invert values - у меня работает, а в codewars нет
// Дан массив целых чисел.
// Напишите функцию, которая возвращает массив, где первый элемент — это количество положительных чисел, а второй элемент — сумма отрицательных чисел. 0 не является ни положительным, ни отрицательным.
// Если входные данные представляют собой пустой массив или имеют значение NULL, верните пустой массив.
// Пример
// Для ввода [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15] вы должны вернуть [10, -65].

function countPositivesSumNegatives($input)
{
    $a = 0;
    $b = 0;
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i] > 0) {
            $a++;
        } else if ($input[$i] < 0) {
            $b += $input[$i];
        } else if ($input[$i] === null) {
            return [];
        }
    }
    return (count($input) > 0) ? [$a, $b] : [];
}
var_dump(countPositivesSumNegatives([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15]));
var_dump(countPositivesSumNegatives([0, 2, 3, 0, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14])); // 8 -50
var_dump(countPositivesSumNegatives([])); // []
var_dump(countPositivesSumNegatives([null])); // []
echo PHP_EOL;



// 11. [8-kyu], [arrays]. Beginner - Reduce but Grow
// Учитывая непустой массив целых чисел, верн результат умножения значений по порядку. Пример:
// [1, 2, 3, 4] => 1 * 2 * 3 * 4 = 24
// $this->assertSame(6, grow([1, 2, 3]));
// $this->assertSame(16, grow([4, 1, 1, 1, 4]));
// $this->assertSame(64, grow([2, 2, 2, 2, 2, 2]));
// array_reduce($arr, function($res, $current), $initial_value) используется для последовательной обработки каждого элемента массива с сохранением промежуточного результата. Проводит математические операции с элементами массива $arr, начиная от $initial_value; $current - текущий элемент, $res - промежуточный результат вычисления. Вначале $res = $initial_value

function grow($a)
{
    return array_reduce($a, function ($res, $current) {
        return $res * $current; // $current - это текущий элемент массива, а $res - старт
    }, 1);
}
var_dump(grow([1, 2, 3, 4]));
var_dump(grow([1, 2, 3]));
var_dump(grow([2, 2, 2, 2, 2, 2]));
echo PHP_EOL;

// или 

function grow_1($a)
{
    if (!empty($a)) {
        return array_product($a);
    }
}
var_dump(grow_1([1, 2, 3, 4]));
var_dump(grow_1([1, 2, 3]));
var_dump(grow_1([2, 2, 2, 2, 2, 2]));
echo PHP_EOL;
// или 

function grow_2($a)
{
    $res = 1;
    for ($i = 0; $i < count($a); $i++) {
        $res *= $a[$i];
    }
    return $res;
}
var_dump(grow_2([1, 2, 3, 4]));
var_dump(grow_2([1, 2, 3]));
var_dump(grow_2([2, 2, 2, 2, 2, 2]));
echo PHP_EOL;



// 12. [8-kyu], [arrays]. Count by X. Задача сложнее 8-kyu, как мне кажется. [понравилась]
// Создайте функцию с двумя аргументами, которая будет возвращать массив первых n кратных x.
// Предположим, что и данное число, и количество раз, которое нужно посчитать, будут положительными числами, большими 0.
// Верните результаты в виде массива или списка (в зависимости от языка).
// Примеры
// Вам важно учитывать индексы, они должны идти от 0 через 1
// countBy(1, 10) // должен вернуть [1,2,3,4,5,6,7,8,9,10]
// countBy(2, 5) // должен вернуть [2,4,6,8,10]

function countBy($x, $n)
{
    $arr = [];
    for ($i = $x; $i <= $x * $n; $i = $i + $x) {
        // $arr[$i] = $i; // таким способом нумерация индексов идёт не с нуля и вообще не через 1, поэтому это не подходит, если важно учивать номер индексов
        array_push($arr, $i);
        // или 
        // $arr[] = $i; - добавляет элементы в пустой массив по очереди с индекса 0 и по 1 далее
    }
    return $arr;
    // return implode(" ", $arr); // implode для наглядности элементов в строку - эта наглядность здесь не нужна
}
var_dump(countBy(1, 10));
var_dump(countBy(2, 5));
var_dump(countBy(3, 6));
echo PHP_EOL;

// или 

function countBy_1($x, $n)
{
    return implode(" ", range($x, $x * $n, $x));
}
var_dump(countBy_1(1, 10)); // "1 2 3 4 5 6 7 8 9 10"
var_dump(countBy_1(2, 5)); // "2 4 6 8 10" 
var_dump(countBy_1(3, 6)); // "3 6 9 12 15 18"
echo PHP_EOL;

// или 

function countBy_2($x, $n)
{
    $arr = [];
    for ($i = 1; $i <= $n; $i++) {
        $arr[] = $i * $x;
    }
    return implode(" ", $arr);
}
var_dump(countBy_2(1, 10)); // "1 2 3 4 5 6 7 8 9 10"
var_dump(countBy_2(2, 5)); // "2 4 6 8 10" 
var_dump(countBy_2(3, 6)); // "3 6 9 12 15 18"
echo PHP_EOL;



// 13. [8-kyu], [arrays]. Get the mean of an array
// Конец учебного года, роковой момент вашего школьного отчета. Необходимо рассчитать средние значения. Все студенты приходят к вам и умоляют вычислить для них средний балл. Вам просто нужно написать сценарий.
// Напишите функцию, которая возвращает среднее значение данного массива, округленное до ближайшего целого числа.
// Массив никогда не будет пустым.
// $this->assertSame(2, get_average([2, 2, 2, 2]));
// $this->assertSame(3, get_average([1, 2, 3, 4, 5]));
// $this->assertSame(1, get_average([1, 1, 1, 1, 1, 1, 1, 2]));

function get_average($a)
{
    return (int) floor(array_sum($a) / count($a)); // внимание на тип данных! => floor, round не меняют тип данных, а нужно целое число вернуть, поэтому его сначала нужно преобразовать до целого. Баллы округляются только в нижнюю сторону
}
var_dump(get_average([2, 2, 2, 2, 2])); // 2
var_dump(get_average([1, 1, 1, 1, 1, 1, 1, 2])); // 1

// или 

function get_average_1($a)
{
    return intdiv(array_sum($a), count($a));
}
var_dump(get_average_1([2, 2, 2, 2, 2])); // 2
var_dump(get_average_1([1, 1, 1, 1, 1, 1, 1, 2])); // 1
echo PHP_EOL;

// intdiv — Делит два числа без остатка
var_dump(intdiv(5, 3)); // 1
echo PHP_EOL;



// 14. [8-kyu], [arrays]. Sum Mixed Array
// Учитывая массив целых чисел в виде строк и чисел, верните сумму значений массива, как если бы все они были числами.
// Верните свой ответ в виде числа.
// $this->assertSame(22, sum_mix([9, 3, '7', '3']));
// $this->assertSame(42, sum_mix(['5', '0', 9, 3, 2, 1, '9', 6, 7]));
// $this->assertSame(41, sum_mix(['3', 6, 6, 0, '5', 8, 5, '6', 2, '0']));

function sum_mix($a)
{
    return array_sum($a);
}
var_dump(sum_mix([9, 3, '7', '3', true, false])); // 23
echo PHP_EOL;



// 15. [8-kyu], [arrays]. Count the Monkeys!
// Вы берете сына в лес посмотреть на обезьян. Вы знаете, что там есть определенное число (n), но ваш сын слишком мал, чтобы просто оценить полное число, ему приходится начинать считать их с 1.
// Как хороший родитель, вы будете сидеть и считать вместе с ним. Учитывая число (n), заполните массив всеми числами до этого числа включительно, но исключая ноль.
// Например (Ввод -> Выход):
// 10 --> [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
// 1 --> [1]

function monkeyCount($n)
{
    $arr = [];
    for ($i = 1; $i <= $n; $i++) {
        $arr[] = $i;
    }
    return implode(" ", $arr); // implode для наглядности в терминале
}
var_dump(monkeyCount(10));

// или 

function monkeyCount_1($n)
{
    return implode(" ", range(1, $n)); // implode для наглядности в терминале
}
var_dump(monkeyCount_1(10));
echo PHP_EOL;



// 16. [8-kyu], [arrays]. Removing Elements - не проходит тесты в конце на codewars
// Возьмите массив и удалите из него каждый второй элемент. Всегда сохраняйте первый элемент и начинайте удаление со следующего элемента.
// Пример:
// [«Сохранить», «Удалить», «Сохранить», «Удалить», «Сохранить», ...] --> [«Сохранить», «Сохранить», «Сохранить», ...]
// Ни один из массивов не будет пустым, так что вам не о чем беспокоиться!
// [1, 2, 3, 4, 5, 6, 7, 8, 9, 10] => [1, 3, 5, 7, 9]

function removeEveryOther($array)
{
    $arr = [];
    for ($i = 0; $i < count($array); $i++) {
        if ($i % 2 === 0) {
            $arr[] = $array[$i];
        }
    }
    return $arr;
}
var_dump(removeEveryOther([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
var_dump(removeEveryOther(["Сохранить", "Удалить", "Сохранить", "Удалить", "Сохранить",]));
var_dump(removeEveryOther([]));
var_dump(removeEveryOther([0, 2, 4, 6, 8, 10, 12, 14]));
echo PHP_EOL;

// или 

function removeEveryOther_1($array)
{
    return array_filter($array, function ($i) {
        return !($i % 2);
    }, ARRAY_FILTER_USE_KEY);
}
var_dump(removeEveryOther_1([0, 2, 4, 6, 8, 10, 12, 14]));

var_dump(!(3 % 2)); // false: 3 % 2 = 1 => !(true) => false
var_dump(!(2 % 2)); // true
echo PHP_EOL;



// 17. [8-kyu], [arrays]. Find numbers which are divisible by given number
// Завершите функцию, которая принимает два аргумента и возвращает все числа, которые делятся на заданный делитель. Первый аргумент — массив чисел, второй — делитель.
// Пример (Ввод1, Ввод2 --> Вывод)
// [1, 2, 3, 4, 5, 6], 2 --> [2, 4, 6]

function divisibleBy($numbers, $divisor)
{
    $arr = [];
    for ($i = 0; $i < count($numbers); $i++) {
        if ($numbers[$i] % $divisor === 0) {
            $arr[] = $numbers[$i];
        }
    }
    return $arr;

}
var_dump(divisibleBy([1, 2, 3, 4, 5, 6], 2));
echo PHP_EOL;



// 18. [8-kyu], [arrays]. Arguments to Binary addition
// Учитывая массив, добавьте все числовые элементы и верните двоичный эквивалент этой суммы; чтобы сделать код пуленепробиваемым, нужно добавить что-либо, кроме числа, как 0, поскольку оно не может быть добавлено.
// Если ваш язык может обрабатывать двоичные файлы с плавающей запятой, предположим, что массив не будет содержать числа с плавающей запятой или двойные значения.
// arr2bin([1,2]) == '11'
// arr2bin([1,2,'a']) == '11'
// arr2bin([]) == '0'
// decbin — Переводит число из десятичной системы счисления в двоичную: decbin(int $num): string
var_dump(decbin(10)); // '1010'
echo PHP_EOL;

function arr2bin($arr)
{
    return decbin(array_sum($arr));
}
var_dump(arr2bin([1, 2]));
var_dump(arr2bin([]));
var_dump(arr2bin([1, 2, 3, 4, 5]));
var_dump(arr2bin([true, true, false, 15]));
echo PHP_EOL;



// 19. [8-kyu], [arrays]. Is there a vowel in there?. [понравилась]
// Учитывая массив чисел, проверьте, не являются ли какие-либо из чисел кодами символов для гласных в нижнем регистре (a, e, i, o, u).
// Если да, измените значение массива на строку этой гласной.
// Верните полученный массив.
// $this->assertSame(["e",121,"e"], isVow([101,121,101]));
// $this->assertSame(["u","a",107,"u"], isVow([117,97,107,117]));

// chr() - Возвращает символ по его коду
var_dump(chr(101)); // e

function isVow(array $a)
{
    $arr = ["a", "e", "i", "o", "u"];
    $res = [];
    for ($i = 0; $i < count($a); $i++) {
        $res[$i] = $a[$i]; // e 121 е
        for ($k = 0; $k < count($arr); $k++) {
            if (chr($a[$i]) === $arr[$k]) {
                $res[$i] = chr($a[$i]);
            }
        }
    }
    return implode(" ", $res);
}
var_dump(isVow([101, 121, 101]));
// var_dump(isVow([117, 97, 107, 117]));

// или 

function isVow_1(array $a)
{
    $arr = ["a", "e", "i", "o", "u"];
    $res = [];
    for ($i = 0; $i < count($a); $i++) {
        if (in_array(chr($a[$i]), $arr, true)) {
            $res[] = chr($a[$i]);
        } else {
            $res[] = $a[$i];
        }
    }
    return implode(" ", $res);
}
var_dump(isVow_1([101, 121, 101]));




// 20. [8-kyu], [arrays]. CSV representation of array
// Создайте функцию, которая возвращает CSV-представление двумерного числового массива.
// Пример:
// вход:
// [[ 0, 1, 2, 3, 4 ], [ 10,11,12,13,14 ], [ 20,21,22,23,24 ], [ 30,31,32,33,34 ]] => "0,1,2,3,4\n10,11,12,13,14\n20,21,22,23,24\n30,31,32,33,34"
// Длина массива > 2.
// Примечание: вам не следует экранировать \n, он должен работать как новая строка.

function toCsvText($array)
{
    $res = "";
    for ($i = 0; $i < count($array); $i++) {
        $res .= implode(",", $array[$i]) . "\\n";
    }
    $res[strlen($res) - 1] = " ";
    $res[strlen($res) - 2] = " ";
    return trim($res);

}
var_dump(toCsvText([[0, 1, 2, 3, 4], [10, 11, 12, 13, 14], [20, 21, 22, 23, 24], [30, 31, 32, 33, 34]]));
echo PHP_EOL;



// 21. [8-kyu], [arrays]. I love you, a little , a lot, passionately ... not at all. [понравилась]
// Кто помнит время, проведенное на школьном дворе, когда девочки брали цветок и рвали его лепестки, произнося каждую из следующих фраз каждый раз, когда отрывали лепесток:
// "Я тебя люблю"
// "немного"
// "много"
// "страстно"
// "безумно"
// "нисколько"
// Если лепестков больше 6, вы начинаете сначала со слов «Я люблю тебя» для 7 лепестков, «немного» для 8 лепестков и так далее.
// Когда оторвался последний лепесток, раздались крики волнения, мечты, нахлынувшие мысли и эмоции.
// Ваша цель в этом ката — определить, какую фразу сказали бы девушки на последнем лепестке цветка с заданным количеством лепестков. Количество лепестков всегда больше 0.
// $this->assertSame("a lot", how_much_i_love_you(3));
// $this->assertSame("not at all", how_much_i_love_you(6));
// $this->assertSame("I love you", how_much_i_love_you(7));

function how_much_i_love_you($nb_petals)
{
    $arr = [1 => "I love you", 2 => "a little", 3 => "a lot", 4 => "passionately", 5 => "madly", 6 => "not at all"];
    if ($nb_petals <= 6 and $nb_petals >= 1) {
        return $arr[$nb_petals];
    } else if ($nb_petals > 6) {
        while ($nb_petals > 6) {
            $nb_petals = $nb_petals - count($arr); // 94 - 6 = 86 
        }
        return $arr[$nb_petals];
    } else if ($nb_petals < 1) {
        while ($nb_petals < 1) {
            $nb_petals = $nb_petals + count($arr);
        }
        return $arr[$nb_petals];
    }

}
var_dump(how_much_i_love_you(3));
var_dump(how_much_i_love_you(6));
var_dump(how_much_i_love_you(7));
var_dump(how_much_i_love_you(94));
var_dump(how_much_i_love_you(14));
echo PHP_EOL;
var_dump(how_much_i_love_you(0));
var_dump(how_much_i_love_you(-2));
var_dump(how_much_i_love_you(-15));

// или 

function how_much_i_love_you_1(int $n): string
{
    return ["I love you", "a little", "a lot", "passionately", "madly", "not at all"][($n - 1) % 6];
}
var_dump(how_much_i_love_you_1(94));
echo PHP_EOL;



// 22. [8-kyu], [arrays]. Find the Difference in Age between Oldest and Youngest Family Members
// На ежегодном семейном собрании семья любит узнавать возраст самого старшего из ныне живущих членов семьи и возраста самого младшего члена семьи и вычислять разницу между ними.
// Вам будет предоставлен массив возрастов всех членов семьи в любом порядке. Возраст будет указан в целых числах, поэтому 5-месячному ребенку будет присвоен «возраст», равный 0. Верните новый массив (кортеж в Python) с [самый младший возраст, самый старший возраст, разница между самым младшим и самым старым возраст].
// $this->assertSame([6, 82, 76], differenceInAges([82, 15, 6, 38, 35]));
// $this->assertSame([14, 99, 85], differenceInAges([57, 99, 14, 32]));

function differenceInAges($ages)
{
    return [min($ages), max($ages), max($ages) - min($ages)];
}
var_dump(implode(" ", differenceInAges([82, 15, 6, 38, 35])));
var_dump(implode(" ", differenceInAges([57, 99, 14, 32])));
echo PHP_EOL;



// 23. [8-kyu], [arrays]. Multiple of index. [понравилась]
// Вернуть новый массив, состоящий из элементов, кратных их собственному индексу во входном массиве (длина > 1).
// Some cases:
// [22, -6, 32, 82, 9, 25] =>  [-6, 32, 25]
// [68, -1, 1, -7, 10, 10] => [-1, 10]
// [-56,-85,72,-26,-14,76,-27,72,35,-21,-67,87,0,21,59,27,-92,68] => [-85, 72, 0, 68]
// $this->assertEquals([-6, 32, 25], multipleOfIndex([22, -6, 32, 82, 9, 25]));
// $this->assertEquals([-1, 10], multipleOfIndex([68, -1, 1, -7, 10, 10]));
// $this->assertEquals([-11], multipleOfIndex([11, -11]));
// $this->assertEquals([-85, 72, 0, 68], multipleOfIndex([-56,-85,72,-26,-14,76,-27,72,35,-21,-67,87,0,21,59,27,-92,68]));
// $this->assertEquals([38, -44, -99], multipleOfIndex([28,38,-44,-99,-13,-54,77,-51]));
// $this->assertEquals([-49, 8, -60, 35], multipleOfIndex([-1,-49,-1,67,8,-60,39,35]));
// $this->assertEquals([0, 2, 6], multipleOfIndex([0, 2, 3, 6, 9])); !!!!

function multipleOfIndex(array $arr): array
{
    $res = [];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === 0) {
            $res[] = $arr[$i];
        } else if ($arr[$i] !== 0 and $i === 0) {
            continue;
        } else if ($arr[$i] % $i === 0 and $i !== 0) {
            $res[] = $arr[$i];
        }
    }
    return $res;
}
var_dump(implode(" ", multipleOfIndex([22, -6, 32, 82, 9, 25])));
var_dump(implode(" ", multipleOfIndex([68, -1, 1, -7, 10, 10])));
var_dump(implode(" ", multipleOfIndex([-56, -85, 72, -26, -14, 76, -27, 72, 35, -21, -67, 87, 0, 21, 59, 27, -92, 68])));
var_dump(implode(" ", multipleOfIndex([28, 38, -44, -99, -13, -54, 77, -51])));
var_dump(implode(" ", multipleOfIndex([0, 2, 0]))); // 0 2 0
var_dump(implode(" ", multipleOfIndex([1, 2, 0]))); // 0 2 0
echo PHP_EOL;



// 24. [8-kyu], [arrays]. My head is at the wrong end!
// Вы в зоопарке... все сурикаты выглядят странно. Что-то пошло ужасно не так – кто-то поменялся местами!
// Спасите животных, переключив их обратно. Вам будет предоставлен массив, который будет иметь три значения (хвост, тело, голова). Ваша задача — перестроить массив так, чтобы животное располагалось правильно (голова, тело, хвост).
// То же самое касается всех остальных массивов/списков, которые вы получите в тестах: вам нужно изменить позиции элементов с той же самой логикой.
// $this->assertSame(["head", "body", "tail"], fixTheMeerkat(["tail", "body", "head"]));
// $this->assertSame(["heads", "body", "tails"], fixTheMeerkat(["tails", "body", "heads"]));
// $this->assertSame(["top", "middle", "bottom"], fixTheMeerkat(["bottom", "middle", "top"]));
// $this->assertSame(["upper legs", "torso", "lower legs"], fixTheMeerkat(["lower legs", "torso", "upper legs"]));
// $this->assertSame(["sky", "rainbow", "ground"], fixTheMeerkat(["ground", "rainbow", "sky"]));

function fixTheMeerkat($arr)
{
    return array_reverse($arr);
}
var_dump(fixTheMeerkat(["tail", "body", "head"]));
echo PHP_EOL;



// 25. [8-kyu], [arrays]. Find Multiples of a Number
// В этом простом упражнении вы создадите программу, которая принимает значение целое число и возвращает список его кратных значений до другого значения предела. Если предел кратен целому числу, его также следует включить. В функцию будут передаваться только положительные целые числа, не состоящие из 0. Предел всегда будет выше базового.
// Например, если переданные параметры — (2, 6), функция должна вернуть [2, 4, 6], поскольку 2, 4 и 6 кратны от 2 до 6.
// $this->assertEquals([5, 10, 15, 20, 25], findMultiples(5, 25));
// $this->assertEquals([1, 2], findMultiples(1, 2));
// $this->assertEquals([5], findMultiples(5, 7));
// $this->assertEquals([4, 8, 12, 16, 20, 24], findMultiples(4, 27));
// $this->assertEquals([11, 22, 33, 44], findMultiples(11, 54));

function findMultiples(int $integer, int $limit): array
{
    $res = [];
    for ($i = $integer; $i <= $limit; $i = $i + $integer) {
        $res[] = $i; // 11 22 33 44
    }
    return $res;
}
var_dump(implode(" ", findMultiples(5, 25)));
var_dump(implode(" ", findMultiples(11, 54)));
var_dump(implode(" ", findMultiples(5, 7)));
var_dump(implode(" ", findMultiples(1, 2)));
echo PHP_EOL;



// 26. [8-kyu], [arrays]. Find Multiples of a Number [понравилась]
// Вам будет предоставлен список строк. Вы должны отсортировать его в алфавитном порядке (с учетом регистра и на основе значений символов ASCII), а затем вернуть первое значение.
// Возвращаемое значение должно быть строкой и содержать «***» между каждой буквой.
// Не следует удалять или добавлять элементы из/в массив.
// $this->assertSame('b***i***t***c***o***i***n', twoSort(["bitcoin", "take", "over", "the", "world", "maybe", "who", "knows", "perhaps"]));
// $this->assertSame('a***r***e', twoSort(["turns", "out", "random", "test", "cases", "are", "easier", "than", "writing", "out", "basic", "ones"])); 
// $this->assertSame('a***b***o***u***t', twoSort(["lets", "talk", "about", "javascript", "the", "best", "language"])); 
// $this->assertSame('c***o***d***e', twoSort(["i", "want", "to", "travel", "the", "world", "writing", "code", "one", "day"])); 
// $this->assertSame('L***e***t***s', twoSort(["Lets", "all", "go", "on", "holiday", "somewhere", "very", "cold"])); 

function twoSort($s)
{
    sort($s);
    $res = "";
    for ($i = 0; $i < strlen($s[0]); $i++) {
        $res = $res . $s[0][$i] . " ";
    }
    $res = trim($res);
    return str_replace(" ", "***", $res);
}
var_dump(twoSort(["bitcoin", "take", "over", "the", "world", "maybe", "who", "knows", "perhaps"])); // "b***i***t***c***o***i***n"
var_dump(twoSort(["Lets", "all", "go", "on", "holiday", "somewhere", "very", "cold"])); // "L***e***t***s"

// или 
var_dump(implode("***", (str_split("bitcoin")))); // "b***i***t***c***o***i***n"

function twoSort_1($s)
{
    sort($s);
    return implode("***", str_split($s[0]));
}
var_dump(twoSort_1(["bitcoin", "take", "over", "the", "world", "maybe", "who", "knows", "perhaps"])); // "b***i***t***c***o***i***n"
var_dump(twoSort_1(["Lets", "all", "go", "on", "holiday", "somewhere", "very", "cold"])); // "L***e***t***s"
var_dump(twoSort_1(["turns", "out", "random", "test", "cases", "are", "easier", "than", "writing", "out", "basic", "ones"])); // "a***r***e"
echo PHP_EOL;



// 27. [8-kyu], [arrays]. Filter out the geese. 
// Напишите функцию, которая принимает список строк в качестве аргумента и возвращает отфильтрованный список, содержащий те же элементы, но с удаленными «гусями».
// Гуси — это любые строки в следующем массиве, который предварительно заполняется в вашем решении:
//  ["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"]
// Например, если этот массив был передан в качестве аргумента:
// ["Mallard", "Hook Bill", "African", "Crested", "Pilgrim", "Toulouse", "Blue Swedish"]
// Ваша функция вернет следующий массив:
// ["Mallard", "Hook Bill", "Crested", "Blue Swedish"]
// Элементы в возвращаемом массиве должны быть в том же порядке, что и в исходном массиве, переданном в вашу функцию, хотя и без удаления «гусей». Обратите внимание, что все строки будут в том же регистре, что и предоставленные, и некоторые элементы могут повторяться.
// ["Mallard", "Hook Bill", "Crested", "Blue Swedish"], gooseFilter(["Mallard", "Hook Bill", "African", "Crested", "Pilgrim", "Toulouse", "Blue Swedish"]));
// ["Mallard", "Barbary", "Hook Bill", "Blue Swedish", "Crested"], gooseFilter(["Mallard", "Barbary", "Hook Bill", "Blue Swedish", "Crested"]));
// [], gooseFilter(["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"]));
// Пример: есть список a = [1, 2, 3, 4] подаётся список b = [1, 3, 5, 8, 9] фильтруем так, чтобы, в итоге, в b не было ничего из a ... получаем список [5, 8, 9] 

function gooseFilter($birds)
{
    $geese = ["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"];
    $res = [];
    for ($i = 0; $i < count($birds); $i++) {
        if (!in_array($birds[$i], $geese, true)) {
            $res[] = $birds[$i];
        }
    }
    return $res;

}
var_dump(gooseFilter(["Mallard", "Hook Bill", "African", "Crested", "Pilgrim", "Toulouse", "Blue Swedish"]));
echo PHP_EOL;
//  или 

function gooseFilter_1($birds)
{
    $geese = ["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"];
    return array_values(array_diff($birds, $geese));
}
var_dump(gooseFilter_1(["Mallard", "Hook Bill", "African", "Crested", "Pilgrim", "Toulouse", "Blue Swedish"]));
echo PHP_EOL;
// или 

function gooseFilter_2($birds)
{
    $geese = ["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"];
    return array_values(array_filter($birds, function ($birds) use ($geese) {
        return !in_array($birds, $geese);
    }));
}
var_dump(gooseFilter_2(["Mallard", "Hook Bill", "African", "Crested", "Pilgrim", "Toulouse", "Blue Swedish"]));
echo PHP_EOL;



// 28. [8-kyu], [arrays].
// Создайте функцию  для удаления строчных гласных (a, e, i, o, u) в заданной строке. "hello" --> "hll", "codewars" --> "cdwrs" 
// функция должна удалять буквы не зависимо от регистра, т.е. заглавные тоже должна удалять !
// Примеры:
// Hello => hll
// hello => hll
// Apple => ppl

function delete_letter($str)
{
    $letters = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U"];
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if (!in_array($str[$i], $letters, true)) {
            $res = $res . $str[$i];
        }
    }
    return $res;
}
;
var_dump(delete_letter("Hello")); // Hll
var_dump(delete_letter("Apple")); // ppl
echo PHP_EOL;
// или 

function delete_letter_1($str)
{
    $letters = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U"];
    return str_replace($letters, "", $str);
}
var_dump(delete_letter_1("Apple")); // ppl
var_dump(delete_letter_1("AppleEh")); // pplh
echo PHP_EOL;



// 29. [8-kyu], [arrays].
// Завершите функцию квадратной суммы, чтобы она возводила в квадрат каждое переданное ей число, а затем суммировала результаты. Например, для массива [1, 2, 2] нужно вернуть 9: 1^2 + 2^2 + 2^2 = 9
// array_reduce($arr, function($res, $current), $initial_value) используется для последовательной обработки каждого элемента массива с сохранением промежуточного результата. Проводит математические операции с элементами массива $arr, начиная от $initial_value; $current - текущий элемент, $res - промежуточный результат вычисления. Вначале $res = $initial_value

function summ_sol($arr)
{
    return array_reduce($arr, function ($res, $current) {
        return $res + $current ** 2; // 9
    }, 0);
}
var_dump(summ_sol([1, 2, 2]));
echo PHP_EOL;
// или 

function summ_sol_1($arr)
{
    $res = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $res = $res + $arr[$i] ** 2;
    }
    return $res;
}
var_dump(summ_sol_1([1, 2, 2])); // 9
echo PHP_EOL;



// 30. [8-kyu], [arrays].
// Вы получаете массив чисел, возвращаете сумму всех положительных. Пример [1,-4,7,12] => 1 + 7 + 12 = 20. Примечание: если суммировать нечего, сумма по умолчанию равна 0.

function array_sum_positite($arr)
{
    return array_sum(array_filter($arr, function ($item) {
        if ($item >= 0) {
            return $item;
        }
    }));
}
var_dump(array_sum_positite([1, -4, 7, 12])); // 20
var_dump(array_sum_positite([1, -4, 7, -12])); // 8
var_dump(array_sum_positite([-1, -4, -7, -12])); // 0
echo PHP_EOL;
// или 

function array_sum_positive_1($arr)
{
    $res = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] >= 0) {
            $res = $res + $arr[$i];
        }
    }
    return $res;
}
var_dump(array_sum_positive_1([1, -4, 7, 12])); // 20
var_dump(array_sum_positive_1([-1, -4, -7, -12])); // 0
echo PHP_EOL;



echo "\n\n========================================= [8-kyu], [fundamentals] ========================================= \n\n";

// 1) [8 kyu]. [fundamentals] 
// Cоздать функцию, которая удаляет первый и последний символы строки. Вам дан один параметр, исходная строка. Вам не нужно беспокоиться о строках, содержащих менее двух символов.
// substr($str) Возвращает подстроку строки string, начинающейся с start символа по счету и длиной length символов.

function remove_first_last($str)
{
    return substr($str, 1, -1);
}
var_dump(remove_first_last("1hello1"));
echo PHP_EOL;



// 2) [8 kyu]. [fundamentals]
// Цель состоит в том, чтобы создать функцию двух входных данных числа и операции, которая "возводит" число в степень (т.е. умножает число на само себя в степени). Примечание. Math.pow и некоторые другие математические функции, такие как eval() и **, отключены.
// например:
// (2, 3) => 8
// (3, 3) => 27

function pow_number($a, $b)
{
    $res = 1;
    for ($i = 1; $i <= $b; $i++) { // 3
        $res = $res * $a; // 
    }
    return $res;
}
var_dump(pow_number(2, 3));
var_dump(pow_number(2, 4));
var_dump(pow_number(3, 3));
echo PHP_EOL;



// 3) [8 kyu]. [fundamentals]
// Рассмотрим массив/список овец, где некоторые овцы могут отсутствовать на своем месте. Нам нужна функция, которая подсчитывает количество овец, присутствующих в массиве (true означает наличие).
// const arrayOfSheep = [true, true, true, false, true, true, true, true, true, false, true, false, true, false, false, true, true, true, true, true, false, false, true, true]

function sheep_counting($arr)
{
    $res = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === true) {
            $res++;
        }
    }
    return $res;
}
var_dump(sheep_counting([true, true, true, false, true, true, true, true, true, false, true, false, true, false, false, true, true, true, true, true, false, false, true, true]));
echo PHP_EOL;



// 4) [8 kyu]. [fundamentals]. 
// Вы должны вернуть false, даже не используя слово false...

function returned_false($arg)
{
    return $arg !== $arg;
}
var_dump(returned_false(1));
echo PHP_EOL;



// 5) [8 kyu]. [fundamentals]. Opposites Attract
// Тимми и Сара думают, что влюблены, но где они живут, они узнают об этом только тогда, когда сорвут каждый по цветку. Если у одного цветка четное количество лепестков, а у другого нечетное, это означает, что они влюблены.
// Напишите функцию, которая будет принимать количество лепестков каждого цветка и возвращать true, если они влюблены, и false, если нет.
// $this->assertTrue(lovefunc(1, 4));
// $this->assertFalse(lovefunc(2, 2));
// $this->assertTrue(lovefunc(0, 1));
// $this->assertFalse(lovefunc(0, 0));

function lovefunc($flower1, $flower2)
{
    return (bool) (($flower1 + $flower2) % 2);
    // или 
    // return ($flower1 + $flower2) % 2 === 0 ? false : true;
}
var_dump(lovefunc(1, 4)); // true
var_dump(lovefunc(2, 2)); // false
var_dump(lovefunc(0, 1)); // true
var_dump(lovefunc(0, 0)); // false
echo PHP_EOL;



// 6) [8 kyu]. [fundamentals]. Beginner Series #2 Clock
// Часы показывают h часов, m минут и s секунд после полуночи.
// Ваша задача — написать функцию, возвращающую время с полуночи в миллисекундах.
// Пример:
// ч = 0
// м = 1
// с = 1
// результат = 61000
// Входные ограничения:
// 0 <= час <= 23
// 0 <= м <= 59
// 0 <= с <= 59
// $this->assertSame(61000, past(0, 1, 1));
// $this->assertSame(3661000, past(1, 1, 1));
// $this->assertSame(0, past(0, 0, 0));
// $this->assertSame(3601000, past(1, 0, 1));
// $this->assertSame(3600000, past(1, 0, 0));

function past($h, $m, $s)
{
    return $h * 60 * 60 * 1000 + $m * 60 * 1000 + $s * 1000;
}
var_dump(past(0, 1, 1));
var_dump(past(1, 1, 1));
var_dump(past(0, 0, 0));
var_dump(past(1, 0, 1));
var_dump(past(1, 0, 0));
echo PHP_EOL;



// 7) [8 kyu]. [fundamentals]. Beginner Series #1 School Paperwork
// Ваши одноклассники попросили вас скопировать для них кое-какие документы. Вы знаете, что одноклассников n, а в документах m страниц.
// Ваша задача — посчитать, сколько пустых страниц вам нужно. Если n < 0 или m < 0, вернуть 0.
// Пример:
// п= 5, м=5: 25
// п=-5, м=5: 0
// $this->assertSame(25, paperwork(5, 5), 'Failed at paperwork(5, 5)');
// $this->assertSame(0, paperwork(-5, 5), 'Failed at paperwork(-5, 5)');
// $this->assertSame(0, paperwork(5, -5), 'Failed at paperwork(5, -5)');
// $this->assertSame(0, paperwork(-5, -5), 'Failed at paperwork(-5, -5)');
// $this->assertSame(0, paperwork(5, 0), 'Failed at paperwork(5, 0)');

function paperwork(int $n, int $m): int
{
    return ($n < 0 or $m < 0) ? 0 : $n * $m;
}
var_dump(paperwork(5, 5)); // 25
var_dump(paperwork(5, -5)); // 0
var_dump(paperwork(-5, 5)); // 0
var_dump(paperwork(-5, -5)); // 0
var_dump(paperwork(0, 0)); // 0
echo PHP_EOL;



// 8) [8 kyu]. [fundamentals]. How good are you really?
// В вашем классе был тест, и вы его сдали. Поздравляем!
// Но вы амбициозный человек. Вы хотите знать, лучше ли вы, чем средний ученик в вашем классе.
// Вы получаете массив с результатами тестов ваших сверстников. Теперь подсчитайте среднее значение и сравните свой результат!
// Верните true, если вам лучше, иначе — false!
// Примечание:
// Ваши баллы не включены в массив баллов вашего класса. Не забывайте о них при подсчете среднего балла!
// $this->assertEquals(true, betterThanAverage([2, 3], 5));
// $this->assertEquals(true, betterThanAverage([100, 40, 34, 57, 29, 72, 57, 88], 75));
// $this->assertEquals(true, betterThanAverage([12, 23, 34, 45, 56, 67, 78, 89, 90], 69));
// $this->assertEquals(false, betterThanAverage([41, 75, 72, 56, 80, 82, 81, 33], 50));
// $this->assertEquals(false, betterThanAverage([29, 55, 74, 60, 11, 90, 67, 28], 21));

function betterThanAverage($classPoints, $yourPoints)
{
    return array_sum($classPoints) / count($classPoints) < $yourPoints;
}
var_dump(betterThanAverage([2, 3], 5)); // true
var_dump(betterThanAverage([100, 40, 34, 57, 29, 72, 57, 88], 75)); // true
var_dump(betterThanAverage([12, 23, 34, 45, 56, 67, 78, 89, 90], 69)); // true
var_dump(betterThanAverage([41, 75, 72, 56, 80, 82, 81, 33], 50)); // false
var_dump(betterThanAverage([29, 55, 74, 60, 11, 90, 67, 28], 21)); // false
echo PHP_EOL;



// 9) [8 kyu]. [fundamentals]. Calculate BMI
// Напишите функцию bmi, вычисляющую индекс массы тела (bmi = вес/рост^2).
// если ИМТ <= 18,5, верните «Недостаточный вес»
// если ИМТ <= 25,0, верните «Нормальный»
// если ИМТ <= 30,0, верните «Избыточный вес»
// если ИМТ > 30, вернуть «Ожирение»
// $this->assertEquals("Underweight", bmi(50, 1.80));
// $this->assertEquals("Normal", bmi(81, 1.80));
// $this->assertEquals("Overweight", bmi(90, 1.80));
// $this->assertEquals("Obese", bmi(110, 1.80));
// в функциях switch case используется с return 

function bmi($weight, $height)
{
    $res_bmi = $weight / $height ** 2;
    switch ($res_bmi) {
        case $res_bmi <= 18.5:
            return "Underweight";
        case $res_bmi <= 25.0:
            return "Normal";
        case $res_bmi <= 30:
            return "Overweight";
        case $res_bmi > 30:
            return "Obese";
    }
}
var_dump(bmi(50, 1.80));
var_dump(bmi(81, 1.80));
var_dump(bmi(90, 1.80));
var_dump(bmi(110, 1.80));
echo PHP_EOL;
// или 

function bmi_1($weight, $height)
{
    $res_bmi = $weight / $height ** 2;
    return $res_bmi <= 18.5 ? "Underweight" : ($res_bmi <= 25.0 ? "Normal" : ($res_bmi <= 30 ? "Overweight" : "Obese"));
}
var_dump(bmi_1(50, 1.80));
var_dump(bmi_1(65, 1.71));
echo PHP_EOL;



// 10) [8 kyu]. [fundamentals]. Reversed sequence
// Создайте функцию, которая возвращает массив целых чисел от n до 1, где n>0.
// Пример: n=5 --> [5,4,3,2,1]

function reverseSeq($n)
{
    return range($n, 1);
}
var_dump(implode(" ", reverseSeq(5))); // 5 4 3 2 1
echo PHP_EOL;
// или 

function reverseSeq_1($n)
{
    $res = [];
    for ($i = $n; $i >= 1; $i--) {
        $res[] = $i;
    }
    return $res;
}
var_dump(implode(" ", reverseSeq_1(5))); // 5 4 3 2 1
echo PHP_EOL;
// или 

function reverseSeq_2($n)
{
    $res = [];
    for ($i = $n; $i >= 1; $i--) {
        $res[] = $i;
    }
    return $res;
}
var_dump(implode(" ", reverseSeq_2(5))); // 5 4 3 2 1
echo PHP_EOL;



// 11) [8 kyu]. [fundamentals]. Is he gonna survive?
// Герой направляется в замок, чтобы выполнить свою миссию. Однако ему сказали, что замок окружен парой могущественных драконов! Чтобы убить дракона требуется 2 пули, наш герой понятия не имеет, сколько пуль он должен нести. Предполагая, что он возьмет определенное количество пуль и двинется вперед, чтобы сразиться с другим определенным заданным количеством драконов, выживет ли он?
// Возвращайте true, если да, и false в противном случае :)
// $this->assertSame(True, hero(10,5));
// $this->assertSame(False, hero(7,4));
// $this->assertSame(False, hero(4,5));
// $this->assertSame(True, hero(100,40));
// $this->assertSame(False, hero(1500,751));
// $this->assertSame(False, hero(0,1));

function hero(int $bullets, int $dragons)
{
    return $bullets >= $dragons * 2;
}
var_dump(hero(10, 5));
var_dump(hero(7, 4));
echo PHP_EOL;



// 12) [8 kyu]. [fundamentals]. Rock Paper Scissors!
// Давайте играть! Вы должны вернуть, какой игрок выиграл! В случае ничьей верните Draw!. 
// Камень (rock)
// ножницы (scissors)
// бумага (paper)
// "scissors", "paper" --> "Player 1 won!"
// "scissors", "rock" --> "Player 2 won!"
// "paper", "paper" --> "Draw!"

function rpc($p1, $p2)
{
    if (
        $p1 === "scissors" and $p2 === "paper"
        or $p1 === "paper" and $p2 === "rock"
        or $p1 === "rock" and $p2 === "scissors"
    ) {
        return "Player 1 won!";
    } else if ($p1 === $p2) {
        return "Draw!";
    } else {
        return "Player 2 won!";
    }
}
var_dump(rpc("scissors", "paper"));
var_dump(rpc("scissors", "rock"));
var_dump(rpc("paper", "paper"));
echo PHP_EOL;



// 13) [8 kyu]. [fundamentals]. Find Maximum and Minimum Values of a List
// Ваша задача — создать две функции (max и min или максимум и минимум и т. д., в зависимости от языка), которые получают на вход список целых чисел и возвращают наибольшее и наименьшее число из этого списка соответственно. Вы можете считать, что пустых массивов/векторов не будет.
// * [4,6,2,1,9,63,-134,566]         -> max = 566, min = -134
// * [-52, 56, 30, 29, -54, 0, -110] -> min = -110, max = 56
// * [42, 54, 65, 87, 0]             -> min = 0, max = 87
// * [5]                             -> min = 5, max = 5
function maximum($array)
{
    return max($array);
}
var_dump(maximum([42, 54, 65, 87, 0])); // 87

function minimum($array)
{
    return min($array);
}
var_dump(minimum([42, 54, 65, 87, 0])); // 0
echo PHP_EOL;



// 14) [8 kyu]. [fundamentals]. Grasshopper - Grade book
// Завершите функцию так, чтобы она находила среднее значение трех переданных ей оценок и возвращала буквенное значение, связанное с этой оценкой.
// Числовой балл Буквенная оценка
// 90 <= оценка <= 100 'А'
// 80 <= оценка < 90 «B»
// 70 <= оценка < 80 'C'
// 60 <= оценка < 70 'D'
// 0 <= оценка < 60 'F'
// Все проверенные значения находятся в диапазоне от 0 до 100. Нет необходимости проверять отрицательные значения или значения, превышающие 100.
// $this->assertSame('B', getGrade(84, 79, 85));

function getGrade($a, $b, $c)
{
    $avg = ($a + $b + $c) / 3;
    if ($avg >= 90 and $avg <= 100) {
        return "A";
    } else if ($avg >= 80 and $avg < 90) {
        return "B";
    } else if ($avg >= 70 and $avg < 80) {
        return "C";
    } else if ($avg >= 60 and $avg < 70) {
        return "D";
    } else {
        return "F";
    }
}
var_dump(getGrade(84, 79, 85));
echo PHP_EOL;



// 15) [8 kyu]. [fundamentals]. L1: Set Alarm [понравилась]
// Напишите функцию с именем setAlarm/set_alarm/set-alarm/setalarm (в зависимости от языка), которая получает два параметра. Первый параметр, «занят», имеет значение true, когда вы работаете, а второй параметр, «отпуск», истинен, когда вы находитесь в отпуске.
// Функция должна возвращать true, если вы работаете, а не в отпуске (поскольку именно при таких обстоятельствах вам необходимо установить будильник). В противном случае он должен вернуть false. Примеры:
// $this->assertSame(false, setAlarm(true, true));
// $this->assertSame(false, setAlarm(false, true));
// $this->assertSame(true, setAlarm(true, false));
// $this->assertSame(false, setAlarm(false, false));

function setAlarm(bool $employed, bool $vacation): bool
{
    return $employed and !$vacation;
    // или 
    // return ($employed === true and $vacation === false) ? true : false;
}
var_dump(setAlarm(false, true));
var_dump(setAlarm(true, false));
echo PHP_EOL;



// 16) [8 kyu]. [fundamentals]. The Feast of Many Beasts [понравилась]
// У всех животных праздник! Каждое животное приносит одно блюдо. Есть только одно правило: блюдо должно начинаться и заканчиваться теми же буквами, что и название животного. For example, the great blue heron is bringing garlic naan and the chickadee is bringing chocolate cake.
// Напишите функцию «праздник», которая принимает имя животного и блюдо в качестве аргументов и возвращает true или false, чтобы указать, разрешено ли зверю принести блюдо на пир.
// Предположим, что зверь и блюдо всегда представляют собой строки в нижнем регистре и каждая из них состоит как минимум из двух букв. зверь и блюдо могут содержать дефисы и пробелы, но они не появятся в начале или конце строки. Они не будут содержать цифр.
// $this->assertSame(true, feast("great blue heron", "garlic naan"));
// $this->assertSame(true, feast("chickadee", "chocolate cake"));
// $this->assertSame(false, feast("brown bear", "bear claw"));

function feast($beast, $dish)
{
    return $beast[0] === $dish[0] && $beast[-1] == $dish[-1];
    // или 
    // return ($beast[0] === $dish[0] and $beast[strlen($beast) - 1] === $dish[strlen($dish) - 1]) ?: false;
}
var_dump(feast("great blue heron", "garlic naan"));
var_dump(feast("chickadee", "chocolate cake"));
var_dump(feast("brown bear", "bear claw"));
echo PHP_EOL;



// 17) [8 kyu]. [fundamentals]. Sum without highest and lowest number [понравилась]
// Суммируйте все числа данного массива, кроме самого высокого и самого низкого элемента (по значению, а не по индексу!).
// Самый высокий или самый низкий элемент соответственно представляет собой один элемент, даже если их несколько с одинаковым значением. То есть, если самых больших или самых малых элементов несколько, то нужно учитывать только один элемент, а остальные пропускать.
// Пример
// [6, 2, 1, 8, 10] => 16
// [1, 1, 11, 2, 3] => 6
// Проверка ввода
// Если вместо массива указано пустое значение (null, None, Nothing и т. д.), или данный массив представляет собой пустой список или список только с 1 элементом, верните 0.

function sumArray($array)
{
    return (count($array) > 0) ? array_sum($array) - max($array) - min($array) : 0;
}
var_dump(sumArray([6, 2, 1, 8, 10])); // 16
var_dump(sumArray([1, 1, 11, 2, 3])); // 6
var_dump(sumArray([null])); // 0
var_dump(sumArray([])); // 0
echo PHP_EOL;



// 18) [8 kyu]. [fundamentals]. What is between?
// Завершите функцию, которая принимает два целых числа (a, b, где a < b) и возвращает массив всех целых чисел между входными параметрами, включая их.
// Например:
// (1, 4) => [1, 2, 3, 4]
// $this->assertEquals([-2, -1, 0, 1, 2], between(-2, 2));

function between(int $a, int $b): array
{
    return range($a, $b);
}
var_dump(between(1, 4));
var_dump(between(-2, 2));
echo PHP_EOL;



// 19) [8 kyu]. [fundamentals]. Is the string uppercase? [понравилась] - ПОЛНОСТЬЮ РЕШИТЬ НЕ УДАЛОСЬ НА 19.05.2024, НУЖНО ЗНАТЬ РЕГУЛЯРНЫЕ ВЫРАЖЕНИЯ
// Создайте метод, чтобы проверить, написана ли строка только ЗАГЛАВНЫМИ БУКВАМИ.
// В этом Ката говорится, что строка написана ЗАГЛАВНЫМИ буквами, если она не содержит ни одной строчной буквы, поэтому любая строка, вообще не содержащая букв, тривиально считается написанной ЗАГЛАВНЫМИ буквами.
// Examples (input -> output)
// "c" -> False
// "C" -> True
// "hello I AM DONALD" -> False
// "HELLO I AM DONALD" -> True
// "ACSKLDFJSgSKLDFJSKLDFJ" -> False
// "ACSKLDFJSGSKLDFJSKLDFJ" -> True
// str_contains(string, "i") - функция, которая возращает true или false, ищет символ в строке, возращает true при поиске пустой строки, чувствительна к регистру, языковой раскладке
// strtoupper(string) - перевод всех символов строки в верхний регистр
// strtolower(string) - перевод всех символов строки в нижний регистр

function is_uppercase($str)
{
    for ($i = 0; $i < strlen($str); $i++) {
        if (str_contains($str, strtolower($str[$i])) and $str[$i] != " ") {
            if ($str[$i] === "#") {
                continue;
            }
            return false;
        }
    }
    return true;
}
var_dump(is_uppercase("ACSKLDFJSgSKLDFJSKLDFJ"));
var_dump(is_uppercase("ACSKLDFJSGSKLDFJSKLDFJ"));
var_dump(is_uppercase("hello I AM DONALD"));
var_dump(is_uppercase("C"));
var_dump(is_uppercase("HELLO I  AM DONALD"));
var_dump(is_uppercase("#HELLO I AM DONALD"));
var_dump(is_uppercase("!HELLO I AM DONALD"));
echo PHP_EOL;



// 20) [8 kyu]. [fundamentals]. Grasshopper - Terminal game move function [понравилась]
// Функция перемещения терминала в игре
// В этой игре герой движется слева направо. Игрок бросает кубик и дважды перемещает количество мест, указанное на кубике.
// Создайте функцию для терминальной игры, которая принимает текущую позицию героя и делает бросок (1-6) и возвращает новую позицию.
// $this->assertSame(8, move(0, 4));
// $this->assertSame(15, move(3, 6));
// $this->assertSame(12, move(2, 5));

function move($pos, $roll)
{
    return $pos + $roll * 2;
}
var_dump(move(0, 4));
var_dump(move(3, 6));
echo PHP_EOL;



// 21) [8 kyu]. [fundamentals]. Student's Final Grade
// Создайте функцию FinalGrade, которая вычисляет итоговую оценку студента в зависимости от двух параметров: оценки за экзамен и количества выполненных проектов.
// Эта функция должна принимать два аргумента: экзамен — оценка за экзамен (от 0 до 100); проекты - количество реализованных проектов (от 0 и выше);
// Эта функция должна возвращать число (окончательную оценку). Существует четыре типа итоговых оценок:
// 100, если оценка за экзамен более 90 или количество выполненных проектов более 10.
// 90, если оценка за экзамен больше 75 и количество выполненных проектов не менее 5.
// 75, если оценка за экзамен более 50 и количество выполненных проектов не менее 2.
// 0, в остальных случаях
// Примеры (Входы -> Выход):
// 100, 12 --> 100
// 99, 0 --> 100
// 10, 15 --> 100
// 85, 5 --> 90
// 55, 3 --> 75
// 55, 0 --> 0
// 20, 2 --> 0
// *Используйте операции сравнения и логические операторы.

function finalGrade($exam, $projects)
{
    if ($exam > 90 || $projects > 10)
        return 100;
    else if ($exam > 75 && $projects >= 5)
        return 90;
    else if ($exam > 50 && $projects >= 2)
        return 75;
    else
        return 0;
}
var_dump(finalGrade(100, 12));
var_dump(finalGrade(85, 5));
var_dump(finalGrade(55, 3));
echo PHP_EOL;



// 22) [8 kyu]. [fundamentals]. Super Duper Easy
// Make a function that returns the value multiplied by 50 and increased by 6. If the value entered is a string it should return "Error".

function problem($x)
{
    return (gettype($x) === "string") ? "Error" : $x * 50 + 6;
}
var_dump(problem(10));
var_dump(problem('cat'));
echo PHP_EOL;


// 23) [8 kyu]. [fundamentals]. Lario and Muigi Pipe Problem
// Похоже, какой-то сантехник-хулиган и его брат снова бегают и портят ваши трубы.
// Трубы, соединяющие этапы вашего уровня, необходимо починить, прежде чем вы получите новые жалобы.
// Трубы правильные, если каждая трубка после первой на 1 больше предыдущей.
// Задача
// Учитывая список уникальных чисел, отсортированных в порядке возрастания, верните новый список так, чтобы значения увеличивались на 1 для каждого индекса от минимального значения до максимального значения (оба включены).
// $this->assertSame([1,2,3,4,5,6,7,8,9], pipeFix([1,2,3,5,6,8,9]));
// $this->assertSame([1,2,3,4,5,6,7,8,9,10,11,12], pipeFix([1,2,3,12]));
// $this->assertSame([6,7,8,9], pipeFix([6,9]));
// $this->assertSame([-1,0,1,2,3,4], pipeFix([-1,4]));
// $this->assertSame([1,2,3], pipeFix([1,2,3]));
// Input:  1,3,5,6,7,8 Output: 1,2,3,4,5,6,7,8

function pipeFix($numbers)
{
    return range($numbers[0], $numbers[count($numbers) - 1]);
    // или 
    // return range(min($numbers), max($numbers));
}
var_dump(implode(" ", pipeFix([1, 3, 5, 6, 7, 8])));
var_dump(implode(" ", pipeFix([1, 2, 3, 12])));
var_dump(implode(" ", pipeFix([-1, 4])));
echo PHP_EOL;



// 24) [8 kyu]. [fundamentals]. Drink about
// Kids drink toddy.
// Teens drink coke.
// Young adults drink beer.
// Adults drink whisky.
// Make a function that receive age, and return what they drink.
// Rules:
// Children under 14 old.
// Teens under 18 old.
// Young under 21 old.
// Adults have 21 or more.
// Examples: (Input --> Output)
// 13 --> "drink toddy"
// 17 --> "drink coke"
// 18 --> "drink beer"
// 20 --> "drink beer"
// 30 --> "drink whisky"

function people_with_age_drink(int $old): string
{
    return ($old < 14) ? "drink toddy" : ($old < 18 ? "drink coke" : ($old < 21 ? "drink beer" : "drink whisky"));
}
var_dump(people_with_age_drink(13));
var_dump(people_with_age_drink(20));
var_dump(people_with_age_drink(29));
echo PHP_EOL;



// 25) [8 kyu]. [fundamentals]. All Star Code Challenge #18 [понравилась]
// Создайте функцию, которая принимает строку и один символ и возвращает целое число вхождений второго аргумента в первый.
// Если вхождений не обнаружено, должно быть возвращено значение 0.
// ("Hello", "o")  ==>  1
// ("Hello", "l")  ==>  2
// ("", "z")       ==>  0

function strCount($str, $letter)
{
    $res = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === $letter) {
            $res++;
        }
    }
    return $res;
    // или 
    // return substr_count($str, $letter);
}
var_dump(strCount("Hello", "o"));
var_dump(strCount("", "o"));
echo PHP_EOL;



// 26) [8 kyu]. [fundamentals]. Is it a palindrome? [понравилась]
// Напишите функцию, которая проверяет, является ли данная строка (без учета регистра) палиндромом.
// Палиндром — это слово, число, фраза или другая последовательность символов, которая читается как в обратном, так и в прямом направлении, например, madam or racecar.
// $this->assertTrue(isPalindrome("a"));
// $this->assertTrue(isPalindrome("aba"));
// $this->assertTrue(isPalindrome("Abba"));
// $this->assertFalse(isPalindrome("hello"));
// $this->assertTrue(isPalindrome("Bob"));
// $this->assertTrue(isPalindrome("Madam"));
// $this->assertTrue(isPalindrome("AbBa"));
// $this->assertTrue(isPalindrome(""));

function isPalindrome(string $str): bool
{
    return strtolower($str) == strtolower(implode("", array_reverse(str_split($str))));
    // или 
    // return strtolower($str) === strtolower(strrev($str));
}
var_dump(isPalindrome("hello")); // false
var_dump(isPalindrome("madam")); // true
var_dump(isPalindrome("racecar")); // true
var_dump(isPalindrome("a")); // true 
var_dump(isPalindrome("AbBa")); // true
echo PHP_EOL;
// или 

function isPalindrome_1($str)
{
    $res = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $res = $res . $str[$i];
    }
    return strtolower($str) === strtolower($res);
}
var_dump(isPalindrome_1("hello")); // false
var_dump(isPalindrome_1("madam")); // true
echo PHP_EOL;



// 27) [8 kyu]. [fundamentals]. Correct the mistakes of the character recognition software [понравилась]
// Программное обеспечение для распознавания символов широко используется для оцифровки печатных текстов. Таким образом, тексты можно редактировать, искать и сохранять на компьютере.
// Когда документы (особенно довольно старые, написанные на пишущей машинке) оцифрованы, программы распознавания символов часто допускают ошибки.
// Ваша задача — исправить ошибки в оцифрованном тексте. Вам придется справиться только со следующими ошибками:
// S ошибочно интерпретируется как 5
// О неверно интерпретируется как 0
// I неправильно интерпретируется как 1
// Тестовые случаи содержат числа только по ошибке.
// $this->assertSame("LONDON",correct("L0ND0N"));
// $this->assertSame("DUBLIN",correct("DUBL1N"));
// $this->assertSame("SINGAPORE",correct("51NGAP0RE"));
// $this->assertSame("BUDAPEST",correct("BUDAPE5T"));
// $this->assertSame("PARIS",correct("PAR15"));

function correct($string)
{
    // for ($i = 0; $i < strlen($string); $i++) {
    // if ($string[$i] === "1") {
    // $string[$i] = "I";
    // } else if ($string[$i] === "0") {
    // $string[$i] = "O";
    // } else if ($string[$i] === "5") {
    // $string[$i] = "S";
    // }
    // }
    // return $string;
    // или 
    return str_replace([0, 1, 5], ["O", "I", "S"], $string);
    // или 
    // return strtr($string, "015", "OIS");
}
var_dump(correct("DUBL1N"));
var_dump(correct("L0ND0N"));
var_dump(correct("51NGAP0RE"));
echo PHP_EOL;



// 28) [8 kyu]. [fundamentals]. [понравилась]
// Напишите фукнцию, которая будет переводить на новую строку столько раз, какое число ей передано. 
// Например:
// (1) => 
// 
// (2) =>
// 
// 
// и так далее

function new_line(int $n = 1)
{
    for ($i = 0; $i < $n; $i++) {
        echo "\n";
    }
}
new_line(0);
echo PHP_EOL;



// 29) [8 kyu]. [fundamentals]. get character from ASCII Value
// Write a function which takes a number and returns the corresponding ASCII char for that value.
// Example:
// 65 --> 'A'
// 97 --> 'a'
// 48 --> '0
// For ASCII table, you can refer to http://www.asciitable.com/
function getChar($c)
{
    return chr($c);
}
var_dump(getChar(97));
echo PHP_EOL;



// 30) [8 kyu]. [fundamentals]. Grasshopper - Terminal game combat function
// Создайте боевую функцию, которая принимает текущее здоровье игрока и количество полученного урона и возвращает новое здоровье игрока. Здоровье не может быть меньше 0.
// $this->assertSame(95, combat(100, 5));
// $this->assertSame(84, combat(92, 8));
// $this->assertSame(0, combat(20, 30));

function combat($health, $damage)
{
    return ($health >= $damage) ? $health - $damage : 0;
}
var_dump(combat(90, 10));
var_dump(combat(20, 30));
echo PHP_EOL;



// 31) [8 kyu]. [fundamentals]. No zeros for heros [понравилась]. Сложнее 8-kyu
// Числа, оканчивающиеся нулями, скучны.
// В вашем мире им может быть весело, но не здесь.
// Избавься от них. Только конечные.
// 1450 -> 145
// 960000 -> 96
// 1050 -> 105
// -1050 -> -105
// $this->doTest(1450, 145);
// $this->doTest(960000, 96);
// $this->doTest(1050, 105);
// $this->doTest(-1050, -105);
// $this->doTest(-105, -105);
// $this->doTest(0, 0);

function noBoringZeros(int $n): int
{
    while ($n % 10 === 0 and $n !== 0) {
        $n = $n / 10;
    }
    return $n;
}
var_dump(noBoringZeros(960500));
var_dump(noBoringZeros(-105));
var_dump(noBoringZeros(0));
