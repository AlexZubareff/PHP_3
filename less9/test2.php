<?php
/**
 *    2. Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!
 **/


// Получаем массив данных
function setArr($length):array
{
    $arr = [];
    for ($i=0; $i<=$length;$i++){
        $arr[$i] = rand(1,$length);
    }
    return $arr;
}

// Случайным образом определяем значение элемента которое будем искать в дальнейшем
function defineRandomlyItem(array $array)
{
    $rand_keys = array_rand($array, 1);
    return $array[$rand_keys];
}

// Находим и удаляем элементы значение которых совпадает с определенным ранее значением.
function deleteItem(array $array, int $num):array
{
    $count = count($array);

    for ($i=0; $i < $count; $i++) {
        if ($array[$i] == $num)
            unset($array[$i]);
    }
    return $array;
}

// Выводим данные

$arrLength = 99;
$arr = setArr($arrLength);
echo 'Исходный массив:'. "\n";
echo implode(",",$arr). "\n";

echo 'Значение элемента, который ищем:'. "\n";
$num = defineRandomlyItem($arr);
echo $num . "\n";

echo 'Новый массив (без элемента '.$num.'):'. "\n";
$newArray = deleteItem($arr,$num);
echo implode(",",$newArray) . "\n";