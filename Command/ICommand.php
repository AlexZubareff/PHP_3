<?php
// Интерфейс команд

interface Command
{
    public function execute();
    public function undo();
}
