<?php

// класс для расчета площади через интерфейы
class SquareAreaOld implements ISquare
{
    function squareArea(int $sideSquare)
    {
        return pow($sideSquare, 2);
    }
}