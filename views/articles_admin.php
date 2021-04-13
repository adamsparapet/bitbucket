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
        require '../template/header.php'
        ?>
			<div>
				<a href="index.php?action=add" >Добавить статью</a>
				<table class="admin-table" style="width: 100%">
					<tr>
						<th>Дата</th>
						<th>Заголовок</th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach($articles as $a): ?>
					<tr>
						<td><?=$a['date']?></td>
						<td><?=$a['title']?></td>
						<td><a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
						<td><a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
					</tr>
					<?php endforeach ?>					
				</table>								
			</div>
    </div>
        <?php
        require '../template/footer.php'
        ?>
	</body>
	
</html>