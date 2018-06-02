<ul>

    <?php if (!$_SESSION['auth']) :?>
        <li><a href="/account/authorization">Войти</a></li>
    <?php else: ?>
        <li><a href="/quit">Выйти</a></li>
    <?php endif; ?>
</ul>

<div><h2>STUDIO. Главная страница</h2></div>