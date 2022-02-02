<?php
class AdapterCircle implements ICircle
{
    private $circleAreaLib;
    public function __construct(CircleAreaLib $circleAreaLib)
    {
        $this->circleAreaLib=$circleAreaLib;
    }
    public function circleArea(int $circumference)
    {

        return $this->circleAreaLib->getCircleArea();
    }
}

