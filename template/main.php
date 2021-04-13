<? require './database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Блог программиста</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<body>
<?php
require 'header.php'
?>
<div id="wrapper">
    <div id="header">
        <? if ( $_SESSION['admin'] ) { ?>
            <div id="left">
                <a class="left" href="http://blog/user.php?page=profile">Админ Панель</a>
            </div>
        <?}
        ?>
        <div id="right">
            <? if ( !$_SESSION['id'] ) {?>
                <a href="/user.php?page=auth">Войти</a>
                <a href="/user.php?page=register">Регистрация</a>
            <?}
            else if ( $_SESSION['id'] ) {?>
                <a href="/user.php?page=logout">Выход</a>
                <a href="/user.php?page=profile">Профиль</a>
                <a href="http://blog/admin/">Редактировать блоги</a>

            <?}
            ?>
           </div>
    </div>
</div>
</body>