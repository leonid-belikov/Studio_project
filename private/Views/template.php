<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
<header style="background-color: lavender; text-align: center; font-size: 50px">STUDIO</header>
<ul style="background-color: antiquewhite">
    <li><a href="/">На главную</a></li>
    <li><a href="/portfolio">Наши проекты</a></li>
    <li><a href="/account/registration">Регистрация</a></li>
    <li><a href="/contacts">Контакты</a></li>
</ul>

<?php include $view; ?>

<footer style="margin-top: 15px; background-color: lavender; text-align: center">STUDIO.2018</footer>
</body>
<script src="/js/account.js"></script>
</html>