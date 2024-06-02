<?php

// пароль гитхаб
// Yamaha6843
// майл гитхаб 
// ivan_babienko@mail.ru

// ОПИСАНИЕ: - не проходит тесты
// https://www.codewars.com/kata/557af4c6169ac832300000ba/train/php
// У нашего фруктового парня есть мешок с фруктами (представленный в виде набора ниток), в котором некоторые фрукты гнилые. Он хочет заменить все гнилые кусочки фруктов свежими. Например, для данного ["apple", "rottenBanana", "apple"] заменяемый массив должен быть ["apple", "banana", "apple"]. Ваша задача — реализовать метод, который принимает массив строк, содержащих фрукты, и должен возвращать массив строк, в котором все гнилые фрукты заменены хорошими.
// Примечания
// Если массив имеет значение null/nil/None или пуст, вы должны вернуть пустой массив ([]).
// Название гнилого фрукта будет в этом верблюжьем футляре (rottenFruit).
// Возвращаемый массив должен быть в нижнем регистре.
// $this->assertSame(["apple","banana","kiwi","mango"], removeRotten(["apple","rottenBanana","kiwi","rottenMango"]));

function removeRotten($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if (str_contains($arr[$i], "rotten")) {
            $arr[$i] = strtolower(substr($arr[$i], strlen("rotten")));
        }
    }
    return $arr;
}
var_dump(removeRotten(["apple", "rottenBanana", "kiwi", "rottenMango"]));
var_dump(removeRotten([]));
echo PHP_EOL;

// ОПИСАНИЕ:
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
