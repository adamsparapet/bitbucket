<?php
	
	function articles_all($link) {
		// Запрос
		$query = "SELECT * FROM articles ORDER BY id DESC";
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		// Извлечение из БД
		$n = mysqli_num_rows($result);
		$articles = array();

		for ($i = 0; $i < $n; $i++) { 
			$row = mysqli_fetch_assoc($result);
			$articles[] = $row;
		}

		return $articles;
	}

	function articles_get($link, $id_article) {
		// Запрос
		$query = sprintf("SELECT * FROM articles WHERE id=%d",(int)$id_article);
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link)); //вывод ошибки

		$article = mysqli_fetch_assoc($result);

		return $article; 
	}

	function articles_new($link, $title, $date, $content, $comment) {
		// Подготовка
		$title = trim($title);  // trim убирает все пробелы
		$content = trim($content);
		$comment = trim($comment);

		// Проверка
		if ($title == '') // есть пустой то возвращаем ошибку
			return false;

		// Ввод данных в таблицу
		$t = "INSERT INTO articles (title, date, content, comment) VALUES ('%s', '%s', '%s', '%s')";
        //  mysql_real_escape_string - Экранирует специальные символы
        // sprintf — Возвращает отформатированную строку
		$query = sprintf($t, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $comment));

		
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		return true;
	}

	function articles_edit($link, $id, $title, $date, $content, $comment) {
		// Подготовка
		$title = trim($title); //Удаляет пробелы из начала и конца строки
		$content = trim($content);
		$comment = trim($comment);
		$date = trim($date);
		$id = (int)$id;

		// Проверка
		if ($title == '')
			return false;

		// Запрос
		$sql = "UPDATE articles SET title='%s', content='%s', comment='%s', date='%s' WHERE id='%d'";

		$query= sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $comment),
			mysqli_real_escape_string($link, $date),
			$id);

		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		return mysqli_affected_rows($link); // mysqli_affected_rows  получаем число строк
}

	function articles_delete($link, $id) {
		$id = (int)$id;
		// Проверка
		if ($id == 0)
			return false;

		// Запрос
		$query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));

		return mysqli_affected_rows($link);
	}

	function articles_intro($text, $len = 100) {   // на начальной странице указываем максимальную длинну текста 100 символов
		if (mb_strlen($text) >= $len) {
                preg_match("/.{100}[^.!;?]*[.!;?]/si", $text.". ", $matches);
                $cuttext=$matches[0] .= "..";
                return $cuttext;
        }
        else return $text;
	}

?>