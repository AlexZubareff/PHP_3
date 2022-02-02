<?php


class AdapterSquareArea implements ISquare
{
    private $squareAreaLib;
    public function __construct(SquareAreaLib $squareAreaLib)
    {
        $this->squareAreaLib=$squareAreaLib;
    }
    public function squareArea(int $sideSquare)
    {
        return $this->squareAreaLib->getSquareArea();
    }
}

