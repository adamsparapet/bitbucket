<?php
    // Подключение страниц
    require_once 'database.php';
	require_once 'models/articles.php';

$link = mysqli_connect('localhost', 'root', '', 'blog');
	$articles = articles_all($link);

    include 'views/articles.php';


?>