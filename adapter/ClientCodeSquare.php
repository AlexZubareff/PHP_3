<?php

/**
 * Клиентский код поддерживает все классы, использующие целевой интерфейс.
 */
function getArea(SquareAreaOld $sideSquare)
{
    echo $sideSquare->squareArea();
}

$square = new SquareAreaOld();
getArea($square);


$squareLib = new SquareAreaLib();
echo $squareLib->getSquareArea();


$squareAdapter = new AdapterSquareArea($squareLib);
getArea($squareAdapter);
