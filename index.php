<?php

$text = 'основной элемент ферма гау является является является пояс верхний и нежный почти всегда он параллелен 
однако для большой прогон является пример полигональный в этот случай конструкция ферма  ферма ферма 
значительно усложняться и и она потеряет дом дом дом одно из своих своих своих своих своих своих преимуществ простота.
Упрощение:';
$arr = preg_split("/[\s,.!-]+/", trim($text, '. \t\n\r\0\x0B')); //разбиваем на массив

$wordRepead = [];
foreach (array_count_values($arr) as $word => $count) { //получаем количество повторений сслов больше 1 раза
    if ($count > 1) {
        $wordRepead[$word] = $count;
    }
}

echo 'top ' . (count($wordRepead));
echo '<br>';
arsort($wordRepead); //сортировка значений по убыванию
$wordSort = [];

foreach ($wordRepead as $word => $count) { //сортируем по алфавиту слова которые встречаются одинаковое количество раз в тексте
    $sortWord = array_keys($wordRepead, $count); // получаем все ключи которые имет одно и то же значение
    $sortWord = array_fill_keys($sortWord, $count); //создаём массив где ключь слово, значение - количество повторений (для
    // сортировки по алфавиту только тех слов которые встречаются одинаковое количество раз)
    ksort($sortWord); //сортировка по алфавиту слов с одинаковым значением
    $wordSort[] = $sortWord;
    while (($i = array_search($count, $wordRepead)) !== false) { //удаляю элемент что бы выполнить поиск слов с другим значением
        unset($wordRepead[$i]);
    }
}
foreach ($wordSort as $key => $value) {
    if (!empty($value)) {
        foreach ($wordSort[$key] as $k => $word) {
            $sort[$k] = $word;
        }
    }
}

foreach ($sort as $word => $top) {
    echo "$word -  $top <br>";
}

