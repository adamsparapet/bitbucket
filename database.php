<?php 
// Подключение к базе данных

$link = mysqli_connect('localhost', 'root', '', 'blog');
//        or die("Error: ".mysqli_error($link)); // вывод ошибки
//		if(!mysqli_set_charset($link, "utf8")) {
//			printf("Error: ".mysqli_error($link));
//		}
//		return $link;


//session_start();
if ( !$link ) exit('MySql Error');
session_start();
?>