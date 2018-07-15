<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <a href="/"><img src="/images/Logo.png" alt="STUDIO"></a>
                </div>
                <div class="col-10 align-items-center header-menu">

                <?php

                if ($_SESSION['auth']) :
                    require "menu_auth.php";
                else :
                    require "menu_not_auth.php";
                endif;
                ?>

                </div>
            </div>
        </div>
    </header>


    <div id="content"><?php include $view; ?></div>


    <footer>
        <div class="container">
            <div class="row">
                <?php

                if ($_SESSION['auth']) :
                    require "menu_auth.php";
                else :
                    require "menu_not_auth.php";
                endif;
                ?>

            </div>
            <div class="row justify-content-center">
                <p>2018 All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
<script src="/js/main.js"></script>
<!--<script src="/js/account.js"></script>-->
<!--<script src="/js/order.js"></script>-->

</html>
