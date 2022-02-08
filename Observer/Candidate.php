<?php
/*
 * Класс конкретного соискателя
 */

class Candidate extends AbstractCandidate
{
    public function notify($vacancy)
    {
       echo "Ура! Еще одна вакснсия".$vacancy.".".$this->getName()." Смотри быстрее, а то уйдёт!!!";
    }
}