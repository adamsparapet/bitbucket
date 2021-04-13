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
<div class="container">
    <?php
    require '../template/header.php'
    ?>
		<div class="row">
		<form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
			<label style="width: 100%">
				Название
				<input type="text" name="title" value="<?=$article['title']?>" class="form-item form-control " autofocus required>
			</label>
			<label style="width: 100%">
				Дата
				<input type="date" name="date" value="<?=$article['date']?>" class="form-item form-control"  required>
			</label>
			<label style="width: 100%">
				Содержимое
				<textarea name="content" value="" class="form-item form-control"  id="exampleFormControlTextarea1" rows="3" required><?=$article['content']?></textarea>
			</label style="width: 100%">
            <label style="width: 100%">
                Комментарии
                <input type="text" name="comment" value="<?=$article['comment']?>" class="form-item form-control " autofocus required>
            </label>
<!--			<input type="submit" value="Сохранить" class="btn btn-success">-->
            <button type="submit" class="btn btn-success">Сохранить</button>
           </form>
		</div>
		</div>
<?php
require '../template/footer.php'
?>

<script>
// библиотека SweetAlert2. Всплывающее окно
    document.querySelector('.btn-success').addEventListener('click', success);
    function success(){
        swal('Данные сохранены');
    }
</script>
</body>
</html>