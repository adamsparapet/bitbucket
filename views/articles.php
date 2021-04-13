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

            <div class="row g-5 py-5">
                <div class="col-md-6">
                    <?php foreach($articles as $a): ?>
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="height: 230px; ">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">
                               <?=$a['title']?>
                            </h3>
                            <div class="mb-1 text-muted"><?=$a['date']?></div>
                            <p class="card-text mb-auto"><?=articles_intro($a['content'])?></p>
                            <a href="article.php?id=<?=$a['id']?>" class="stretched-link">Продолжить чтение...</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200px" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Изображение" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".5em">Фото</text></svg>
                        </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col-md-6">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h3 class="fst-italic">Поле для рекламы</h3>
                        <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">March 2014</a></li>
                            <li><a href="#">February 2014</a></li>
                            <li><a href="#">January 2014</a></li>
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                            <li><a href="#">June 2013</a></li>
                            <li><a href="#">May 2013</a></li>
                            <li><a href="#">April 2013</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>

		</div>
        <?php
        require 'template/footer.php'
        ?>
	</body>

</html>