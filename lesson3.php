<?php

/*
const END_CYCLE = 5;

for($i = 1; $i <= END_CYCLE; $i++){
    echo "Уточка делает $i шаг<br/>";

    for($j = 0; $j < $i; $j++){
        if($i === 5) break(2);
        echo "Топ";
    }

    echo "<br/>";
}


for($i = 1, $steps = ''; $i<END_CYCLE; $i++, $steps .= 'Топ') {}
*/

/*
 *
 * 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:

0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.
3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.
Вывести в цикле значения массива, чтобы результат был таким:

Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)
4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).

Написать функцию транслитерации строк.
5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:

for (…){ // здесь пусто}
8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).
 */


//1
$i=1;
while($i < 100){
    if($i % 3 == 0) echo $i.'<br/>'; $i++;
}

//2
$i = 0;
$n = 10;
do {
    if ($i == 0) {
        echo $i . ' - это ноль<br />';
    } elseif ($i % 2 != 0) {
        echo $i . ' - нечетное число<br />';
    } elseif ($i % 2 == 0) {
        echo $i . ' - четное число<br />';
    }
    $i++;
} while($i <= $n);

//3
$maps = [
    'Москвоская' => ['Москва','Апрелевка', 'ETC'],
    'Питерская' => ['Санкт-Петербург','Питер'],
    'Калужская' => ['Калуга', 'Обнинск', 'Малоярославец']
];

foreach($maps as $key => $map ){
    echo '<b>'.$key.'</b><br/>';

    for($n=0; $n < count($maps[$key]); $n++){
        echo $maps[$key][$n].'<br/>';
    }
}

//4


//5
function trims($string){

    if(!is_string($string)){
        return false;
    }

    return preg_replace('/\s/', '_', $string);
}

echo trims('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');

//6
$menu = [
    'Name1',
    'Name2' => ['SubName2.1','SubName2.2', 'SubName2.3'],
    'Name3' => ['SubName3.1','SubName3.2', 'SubName3.3']
];

function menuCreate($menu)
{
    if (!is_array($menu)) {
        return false;
    }

    $renderMenu[] = '<ul>';
    foreach ($menu as $key => $value) {
        // обрабатываем массив
        if (is_array($value)) {
            $renderMenu[] = '<li>' . $key . menuCreate($value) . '</li>';
        } else {
            $renderMenu[] = '<li>' . $value . '</li>';
        }
    }

    $renderMenu[] = '</ul>';
    return implode($renderMenu);
}

echo menuCreate($menu);
echo'<br/><br/><br/>';

//7

for($i=0; $i<=9; print $i++.' '){}