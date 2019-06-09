<?php
/*
 * 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:

если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.

2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.

3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.

6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:

22 часа 15 минут
21 час 43 минуты
 */

//1
$a = mt_rand(-500,500);
$b = mt_rand(-500,500);

if($a >= 0 AND $b >= 0){
    echo $a-$b;
}
if($a < 0 AND $b < 0){
    echo $a*$b;
}

//2
$a = mt_rand(0,15);
switch($a) {
    case $a:
        echo $a;
        break;

}

//3
function sum($x,$y){
    return $x + $y;
}

function minus($x,$y){
    return $x - $y;
}

function p($x,$y){
    return $x * $y;
}

function d($x,$y){
    return $x / $y;
}


//4

function mathOperation($arg1, $arg2, $operation){

    switch($operation) {
        case '+':
            echo $arg1 + $arg2;
            break;
        case '-':
            echo $arg1 - $arg2;
            break;
        case '/':
            echo $arg1 / $arg2;
            break;
        case '*':
            echo $arg1 * $arg2;
            break;
    }
}


//5
echo 'Текущий год '.date('Y');

//6

function power($val, $pow) {
    return pow($val, $pow);
}

function power1($val, $pow){
    if($val == 1){ return $val;}

    return $val * power1($val, $pow-1);
}


echo power1(10,2);



?>