<?php

/**
 * Клиентский код поддерживает все классы, использующие целевой интерфейс.
 */

// получаем площадь через старый интерфейс
$getAreaOld = new CircleAreaOld();
echo $getAreaOld->circleArea();

// получаем площадь через библиотеку
$getAreaLib = new CircleAreaLib();
echo $getAreaLib->getCircleArea();

// получаемплощадь через адаптер
$getAreaAdapter = new AdapterCircle();
echo  $getAreaAdapter->circleArea();
