
<?php switch ($_SESSION['login']):
    case "lolo":
        $account_link = 'adminroom';
        break;
    default:
        $account_link = 'userroom';
    endswitch; ?>
<a href="/account/<?php echo $account_link; ?>" class="username"><img id="user_icon" src="/images/user_icon.png" alt="logged in as"> <?php echo $_SESSION['login']; ?></a>
<a href="/portfolio">our projects</a>
<a href="/contacts">contact us</a>
<a href="/index/quit">log out</a>