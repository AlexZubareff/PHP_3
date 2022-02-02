<?php

// класс для расчета площади через интерфейы
class CircleAreaOld implements ICircle
{
    function circleArea(int $circumference)
    {
        return pow($circumference, 2)/(4*3.14);
    }
}