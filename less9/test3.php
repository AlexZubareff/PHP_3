<?php
/**
 *        3. Подсчитать практически количество шагов при поиске описанными в методичке алгоритмами.
 **/

// Функция определения времени
function getMicrotime()
{
    return microtime(true);
}

// Получаем массив данных
function setArr($length):array
{
    $arr = [];
    for ($i=0; $i<=$length;$i++){
        $arr[$i] = rand(1,$length);
    }
    return $arr;
}

// Подготовим данные, отсртируем массив методом быстрой сортировки
function quickSort(array $arr): array
{
    $count= count($arr);
    if ($count <= 1) {
        return $arr;
    }

    $first_val = $arr[0];
    $left_arr = array();
    $right_arr = array();

    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] <= $first_val) {
            $left_arr[] = $arr[$i];
        } else {
            $right_arr[] = $arr[$i];
        }
    }

    $left_arr = quickSort($left_arr);
    $right_arr = quickSort($right_arr);

    return array_merge($left_arr, array($first_val), $right_arr);
}

// Случайным образом определяем значение элемента которое будем искать в дальнейшем
function defineRandomlyItem(array $array)
{
    $rand_keys = array_rand($array, 1);
    return $array[$rand_keys];
}

// Функция линейного поиска. Находим первый элемент удовлетворяющий условиям поиска и определяем количество шагов сделанных для этого.
function LinearSearch(array $array, int $num): int
{
    $count = count($array);
    $step = 0;
    for ($i=0; $i < $count; $i++) {
        $step++;
        if ($array[$i] == $num)
            break;
    }
    return $step;
}

// Функция бинарного поиска
function binarySearch($myArray, $num): int
{
//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    $step = 0;

    while ($left <= $right) {
        $step++;
//находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left)/2);
//если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            return $step;
        }

        elseif ($myArray[$middle] > $num) {
//сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        }
        elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    return $step;
}

// Функция Интерполяционного поиска
function InterpolationSearch($myArray, $num): int
{
    $start = 0;
    $last = count($myArray) - 1;
    $step = 0;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {
        $step++;
        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            return $step;
        }

        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        }

        else {
            $last = $pos - 1;
        }
    }
    return $step;
}


// Тестируем

$arrLength = 999;                                 // длинна массива
$arr = setArr($arrLength);                      // генерируем массив
echo 'Исходный массив:'. "\n";
echo implode(",",$arr). "\n";

$arr = quickSort($arr);                         // отсортируем массив
echo 'Отсортированный массив:'. "\n";
echo implode(",",$arr). "\n";

echo 'Значение элемента, который ищем:'. "\n";
$num = defineRandomlyItem($arr);                // случайным образом находим какой элемент будем искать
echo $num . "\n";


$start_time = getMicrotime();                   // получаем время начала поиска
$linerSearchItem = LinearSearch($arr, $num);    // выполняем поиск линейным методом
$end_time = getMicrotime();                     // получаем время окончания поиска
echo 'ЛИНЕЙНЫЙ ПОИСК' . "\n";
echo 'Количество шагов: '. $linerSearchItem. "\n";
echo('Время поиска элемента: '. $end_time - $start_time. ' сек.' ) . "\n";

$start_time1 = getMicrotime();                   // получаем время начала поиска
$binarySearchItem = binarySearch($arr, $num);    // выполняем поиск биннарным методом
$end_time1 = getMicrotime();                     // получаем время окончания поиска
echo 'БИНАРНЫЙ ПОИСК' . "\n";
echo 'Количество шагов: '. $binarySearchItem. "\n";
echo('Время поиска элемента: '. $end_time1 - $start_time1. ' сек.' ) . "\n";

$start_time2 = getMicrotime();                                    // получаем время начала поиска
$InterpolationSearchItem = InterpolationSearch($arr, $num);       // выполняем поиск методом интерполяции
$end_time2 = getMicrotime();                                      // получаем время окончания поиска
echo 'ИНТЕРПОЛЯЦИОННЫЙ ПОИСК' . "\n";
echo 'Количество шагов: '. $InterpolationSearchItem. "\n";
echo('Время поиска элемента: '. $end_time2 - $start_time2. ' сек.' ) . "\n";
