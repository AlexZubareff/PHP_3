<?php
/**
 * 1. Создать массив на миллион элементов и отсортировать его различными способами. Сравнить скорости.
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

// Функция определения времени
function getMicrotime()
{
    return microtime(true);
}

// Функция сортировки пузырьковым методом
function bubbleSort(array $array): array
{
    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

//Функция сортировки методом шейкера
function shakerSort ($array): array
{
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do {
        for ($i = $left; $i < $right; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
            }
        }
        $right -= 1;
        for ($i = $right; $i > $left; $i--) {
            if ($array[$i] < $array[$i - 1]) {
                list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
            }
        }
        $left += 1;
    } while ($left <= $right);
    return $array;
}

//Функция быстрой сортировки
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

// Функция пирамидальной сортировки

// Процедура для преобразования в двоичную кучу поддерева с корневым узлом $i, что является индексом в $arr[]. $countArr — размер кучи
function heapify(&$arr, $countArr, $i)
{
    $largest = $i; // Инициализируем наибольший элемент как корень
    $left = 2 * $i + 1; // левый = 2*i + 1
    $right = 2 * $i + 2; // правый = 2*i + 2

// Если левый дочерний элемент больше корня
    if ($left < $countArr && $arr[$left] > $arr[$largest])
        $largest = $left;

//Если правый дочерний элемент больше, чем самый большой элемент на данный момент
    if ($right < $countArr && $arr[$right] > $arr[$largest])
        $largest = $right;

// Если самый большой элемент не корень
    if ($largest != $i) {
        $swap = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $swap;

        // Рекурсивно преобразуем в двоичную кучу затронутое поддерево
        heapify($arr, $countArr, $largest);
    }
}

//Основная функция, выполняющая пирамидальную сортировку
function heapSort(&$arr)
{
    $countArr = count($arr);
// Построение кучи (перегруппируем массив)
    for ($i = $countArr / 2 - 1; $i >= 0; $i--)
        heapify($arr, $countArr, $i);

//Один за другим извлекаем элементы из кучи
    for ($i = $countArr - 1; $i >= 0; $i--) {
        // Перемещаем текущий корень в конец
        $temp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $temp;

        // вызываем процедуру heapify на уменьшенной куче
        heapify($arr, $i, 0);
    }
}

// Тестирование

$arrLength = 99;                        // задаем длинну массива
$arr = setArr($arrLength);              // получаем массив
//echo implode(",",$arr). "\n";

$start_time = getMicrotime();           // получаем время начала сортировки
$sortBubbleArray = bubbleSort($arr);    // выполняем сортировку пузырьковым методом
$end_time = getMicrotime();             // получаем время окончания сортировки

$start_time2 = getMicrotime();          // получаем время начала сортировки
$sortShakerArray = shakerSort($arr);    // выполняем сортировку методом шейкера
$end_time2 = getMicrotime();            // получаем время окончания сортировки

$start_time3 = getMicrotime();          // получаем время начала сортировки
$quickSortArray = quickSort($arr);      // выполняем быструю сортировку
$end_time3 = getMicrotime();            // получаем время окончания сортировки

$start_time4 = getMicrotime();          // получаем время начала сортировки
$pyramidSortArray = heapSort($arr);      // выполняем быструю сортировку
$end_time4 = getMicrotime();            // получаем время окончания сортировки


//Выводим результаты

//echo implode(",",$sortBubbleArray) . "\n";
echo('Время сортировки массива из '.count($arr).' элементов пузырьковым методом составило: '. $end_time - $start_time. ' сек.' ) . "\n";
//echo implode(",",$sortShakerArray) . "\n";
echo('Время сортировки массива из '.count($arr).' элементов методом шейкера составило: '. $end_time2 - $start_time2. ' сек.' ) . "\n";
//echo implode(",",$quickSortArray) . "\n";
echo('Время сортировки массива из '.count($arr).' элементов методом быстрой сортировки составило: '. $end_time3 - $start_time3. ' сек.' ) . "\n";
//echo implode(",",$pyramidSortArray) . "\n";
echo('Время сортировки массива из '.count($arr).' элементов методом пирамидальной сортировки составило: '. $end_time4 - $start_time4. ' сек.' ) . "\n";