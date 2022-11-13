<?php

$text = 'основной элемент ферма гау является является является пояс верхний и нежный почти всегда он параллелен 
однако для большой прогон является пример полигональный в этот случай конструкция ферма  ферма ферма 
значительно усложняться и и она потеряет дом дом дом одно из своих своих своих своих своих своих преимуществ простота.
Упрощение:';
$arr = preg_split("/[\s,.!-]+/", trim($text, '. \t\n\r\0\x0B'));

$wordRepead = [];
foreach (array_count_values($arr) as $word => $count) {
    if ($count > 1) {
        $wordRepead[$word] = $count;
    }
}

echo 'top ' . (count($wordRepead));
echo '<br>';
arsort($wordRepead);
$wordSort = [];

foreach ($wordRepead as $word => $count) {
    $sortWord = array_keys($wordRepead, $count);
    $sortWord = array_fill_keys($sortWord, $count);
    ksort($sortWord);
    $wordSort[] = $sortWord;
    while (($i = array_search($count, $wordRepead)) !== false) {
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

