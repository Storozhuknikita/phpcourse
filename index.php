<?php
$a = 5;
$b = '05';
var_dump($a == $b);         // Почему true?

var_dump((int)'012345');     // Почему 12345?

var_dump((float)123.0 === (int)123.0); // Почему false?

var_dump((int)0 === (int)'hello, world'); // Почему true?

?>