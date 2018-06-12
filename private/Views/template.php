<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
    <header style="background-color: lavender; text-align: center; font-size: 50px">
        <a href="/" style="text-decoration: none">
            STUDIO
        </a>

        <?php if (!$_SESSION['auth']) :?>
        <a href="/account/authorization">Войти</a>
        <?php else: ?>
        <a href="/index/quit">Выйти</a>
        <?php endif; ?>
    </header>


    <ul style="background-color: antiquewhite">
        <li><a href="/portfolio">Наши проекты</a></li>

        <?php
        if ($_SESSION['auth']) :?>
            <li><a href="/account/userroom">Личный кабинет</a></li>
        <?php else: ?>
            <li><a href="/account/registration">Регистрация</a></li>
        <?php endif; ?>

        <li><a href="/contacts">Контакты</a></li>
    </ul>


    <?php include $view; ?>


    <footer style="margin-top: 15px; background-color: lavender; text-align: center">STUDIO.2018</footer>
</body>
<script src="/js/account.js"></script>
</html>