<?php
/**
 *  4. * Выписав первые шесть простых чисел, получим 2, 3, 5, 7, 11 и 13. Очевидно, что 6-е простое число — 13.
 *  Какое число является 10001-м простым числом?
 **/
// Функция определения времени
function getMicrotime() {
    return microtime(true);
}


function simpleItem(int $maxCount, int $requiredValue)
{
    $start = getMicrotime(true);
    $count = 0;                 // счетчик порядка найденных простых чисел

    for ($i = 2; $i <= $maxCount; $i++)
    {
        $flag = true;
        for ($j = 2; $j <= $i/2; $j++)
            if( $i % $j == 0)
                $flag = false;
        if($flag)
            $count++;
        if($count===$requiredValue){
            $end = getMicrotime(true);
            echo($count.'-ым простым числом является число: '.$i). "\n";
            echo('Время работы скрипта: '. $end-$start. ' сек.' );
            break;
        }
    }
}

$maxCount = 10000;          // в пределах от 2 до $maxCount будем искать простые числа
$requiredValue = 50;        // какое по порядку нам нужно найти простое число
echo simpleItem($maxCount,$requiredValue);
