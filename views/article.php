<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Блог программиста</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	</head>
<body>
<div class="container">
<?php
require 'template/header.php'
?>
        <div class="col-md-8">
        <article class="blog-post">
            <h2 class="blog-post-title"><?=$article['title']?></h2>
            <p class="blog-post-meta">Дата публикации: <?=$article['date']?></p>

            <p><?=$article['content']?></p>
            <p>Комментарии:<?=$article['comment']?></p>
            <hr>
        </article>
        </div>
</div>
<?php
require 'template/footer.php'
?>