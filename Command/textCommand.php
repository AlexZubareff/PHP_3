<?php
// Класс resiver содержит реализацию любой команды

class textCommand
{
    public function state()
    {
        //функция записи состояния документа перед операцией
        echo 'Write state'. PHP_EOL;
    }
    public function previousState()
    {
        //Функция возврата к предыдущему состоянию текста
        echo 'Back to previous state'. PHP_EOL;
    }

    public function select()
    {
        // функция выделения текста
        echo 'Select text'. PHP_EOL;
    }
    public function unSelect()
    {
        // функция отмены выделения текста
        echo 'UnSelect text'. PHP_EOL;
    }

    public function copy()
    {
        // функция копирования текста
        echo 'Copy text'. PHP_EOL;
    }
    public function unCopy()
    {
        // функция отмены копирования текста
        echo 'UnCopy text'. PHP_EOL;
    }

    public function cut()
    {
        // функция вырезания текста
        echo 'Cut text'. PHP_EOL;
    }

    public function unCut()
    {
        // функция отмены вырезания текста
        echo 'UnCut text'. PHP_EOL;
    }

    public function paste()
    {
        // функция вставки текста
        echo 'Paste text'. PHP_EOL;
    }

    public function unPaste()
    {
        // функция отмены вставки текста
        echo 'UnPaste text'. PHP_EOL;
    }

}
