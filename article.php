<?php
	// Подключение страниц
    require_once 'database.php';
	require_once 'models/articles.php';
    // подключение к БД
$link = mysqli_connect('localhost', 'root', '', 'blog');

$article = articles_get($link, $_GET['id']);

	include 'views/article.php';



?>