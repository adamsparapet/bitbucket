<? include 'template/main.php';?>
<?
if ( $_GET['page'] == 'auth' ) {
    if ( $_SESSION['id'] ) header('location: /');
    ?>
    <div class="col-md-6 mx-auto col-lg-5">
    <form action="/user.php?page=auth" class="p-5 border rounded-3 bg-light" method="post">
        <p class="text-muted text-center">Войти</p>
        <hr class="my-4">
        <?

        if ( $_POST['do_login'] ) {
            $_POST['password'] = md5($_POST['password']);
            $row = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$_POST[login]' AND `password` = '$_POST[password]'");
            if ( mysqli_num_rows($row) ) {
                $ass = mysqli_fetch_assoc($row);
                foreach ($ass as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                header('location: blog/user.php?page=profile');
//                header('location: /');

            }
            else echo '<b>Логин или пароль введены неправильно</b>';
        }

        ?>
        <div class="form-floating mb-3">
            <input class="input form-control" name="login" type="text" placeholder="Логин">
         </div>
        <div class="form-floating mb-3">
            <input class="input form-control" name="password" type="password" placeholder="Пароль">
        </div>
        <input class="button w-100 btn btn-lg btn-primary" name="do_login" type="submit" value="Войти">
    </form>
    </div>
<?}
else if ( $_GET['page'] == 'register' ) {
    if ( $_SESSION['id'] ) header('location: /');
    ?>
    <div class="col-md-6 mx-auto col-lg-5">
    <form action="/user.php?page=register" class="p-5 border rounded-3 bg-light" method="post">
        <p class="text-muted text-center">Регистрация</p>
        <hr class="my-4">
        <?

        if ( $_POST['do_register'] ) {
            $row = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$_POST[login]'");
            if ( mysqli_num_rows($row) ) echo '<b>Логин уже занят,сорян</b>';
            else if ( $_POST['login'] != '' AND $_POST['password'] != '' AND $_POST['password'] == $_POST['password2'] ){
                $_POST['password'] = md5($_POST['password']);
                mysqli_query($link, "INSERT INTO `users` (`login`, `password`) VALUES ('$_POST[login]', '$_POST[password]')");
                echo "<b>Успешная регистрация</b>";
            }else echo "<b>Вы где-то ошиблись,проверьте себя</b>";
        }

        ?>
    <div class="form-floating mb-3">
        <input class="input form-control" name="login" type="text" placeholder="Логин">
    </div>
    <div class="form-floating mb-3">
        <input class="input form-control" name="password" type="password" placeholder="Пароль">
    </div>
    <div class="form-floating mb-3">
        <input class="input form-control" name="password2" type="password" placeholder="Подтвердите пароль">
    </div>
    <input class="button w-100 btn btn-lg btn-primary" name="do_register" type="submit" value="Зарегистрироваться">
    </form>
    </div>
<?}else if ( $_GET['page'] == 'profile' ) {
    if ( !$_SESSION['id'] ) header('location: /');
    ?>
    <h2><b>Вы вошли как: <?=$_SESSION['login']?></b></h2>
<?}else if ( $_GET['page'] == 'logout' ) {
    session_destroy();
    header('location: /');
}

?>
<?php
require 'template/footer.php'
?>