<?php
	require_once '../database.php';
	require_once '../models/articles.php';

$link = mysqli_connect('localhost', 'root', '', 'blog');

	if (isset($_GET['action'])) 
		$action = $_GET['action'];
	else
		$action = "";

	if ($action == "add") {   // добавление данных
		if (!empty($_POST)) {  //получение с помощью метода post
			articles_new($link, $_POST['title'], $_POST['date'], $_POST['content'], $_POST['comment']);
			header("Location: index.php");
		}
		include("../views/article_admin.php");
	} else if ($action == "edit") {    //редактирование
		if (!isset($_GET['id']))
			header("Location: index.php");
		$id = (int)$_GET['id'];

		if (!empty($_POST) && $id > 0) {
			articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content'], $_POST['comment']);
			header("Location: index.php");
		}

		$article = articles_get($link, $id);
		include("../views/article_admin.php");
	
	} else if ($action == "delete") {
		$id = $_GET['id'];
		$article = articles_delete($link, $id);
		header("Location: index.php");
	
	} else {
		$articles = articles_all($link);
		include("../views/articles_admin.php");
	}
	
	

?>