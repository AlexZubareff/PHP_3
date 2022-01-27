<?php
// ЖЕСТКОЕ КОДИРОВАНИЕ.
// В данном случае параметры соединения с базой данных прописаны жестко.
// Для учебного или тестового проекта это еще подойдет, но для реального проекта с несколькими пользователями,
//с разной степенью доступа нет.

$servername = "localhost";
$username = "root";
$password = "Qas6932";
$dbname = "shop";

// Создаем соединение
$connect = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($connect, "utf8");

// ПРоверяем соединение
if (!$connect) {
    die("Соединение с Базой данных не установлено!");
}


//СЛЕПАЯ ВЕРА
//желательно проверять корректные ли данные пришли в перемнной number, чтобы при обращении в БД не возникло ошибок

if ($connect){
    if (isset($_GET['number'])) {
        $number = $_GET['number']; //Получаем переменную number из GET запроса
        $querySelectProd = "SELECT * FROM products LIMIT $number,10";
        $res = mysqli_query($connect, $querySelectProd); // Получаем ссылку на данные из БД



// ШИФРОВАННЫЙ, ТАИНСТВЕННЫЙ КОД
// В данном случае, для большей наглядности и понимания нужно было именовать переменные более четко $hour, $minute и т.д.

        function getTime() {
            $h = date("H")-1;
            $m = date("i");
            if ($h==1 || $h==21) {
                $hours = "час";}
            elseif (($h>=2 && $h<=4) || ($h>=22 && $h<=24)) {
                $hour = "часа";}
            else {$hour = "часов";}
            if (($m<20) || ($m>10))
            {$min = "минут";}
            elseif (($m % 10) === 1) {
                $min = "минута";}
            elseif ((($m % 10)>=2) && (($m % 10)<=4)) {
                $min = "минуты";}
            else {
                $min = "минут";}
            echo $h . $hour . " " . $m . $min;
        }

        getTime();