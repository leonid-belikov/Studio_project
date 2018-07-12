(function () {
    'use strict';


//--------------------------------------------------------------
//     библиотека переменных и функций
//--------------------------------------------------------------


    // переменная для идентификации страницы

    var title = document.querySelector("title").innerText;
    // console.log(title);


    // ...

    if ((title !== 'Studio')&&(title !== 'Personal cabinet')) {
        var content = document.getElementById('content');
        content.style.paddingTop = '100px';
    }


    // функция, обеспечивающая плавное проявление элемента

    function fadeIn(elem, delay, numIter) {

        // elem - проявляемый элемент
        // delay - задержка в мс после каждой изменения прозрачности (итерации)
        // numInter - количество итераций в процессе изменения прозрачности от 0 к 1

        for (let i = 1; i <= numIter; i++) {
            setTimeout(
                function () {
                    elem.style.opacity = i / numIter;
                }, delay * i
            )
        }
    }


    // функция, обеспечивающая плавный выезд элемента слева

    function slideLeft(elem, begin, end, delay, numIter) {

        // elem - ... элемент
        // delay - задержка в мс после каждого изменения ... (итерации)
        // numInter - количество итераций в процессе изменения ...

        let step = (end - begin) / numIter;

        for (let i = 1; i <= numIter; i++) {
            setTimeout(
                function () {
                    elem.style.left = parseInt(elem.style.left) + step + 'px';
                    elem.style.opacity = i / numIter;
                }, delay * i
            )
        }
    }






//--------------------------------------------------------------
//     скрипты для страниц
//--------------------------------------------------------------


    switch (title)
    {

        case 'Studio': // главная страница


            window.onload = function () {


                // проявление слогана на начальном экране после загрузки страницы

                setTimeout(
                    function () {
                        var fadeTag = document.querySelector(".head-wrapper");
                        if (fadeTag)
                            fadeIn(fadeTag, 100, 100);
                    }, 1500
                )
            };


            window.onscroll = function () {


                // изменение фона шапки при прокрутке страницы


                var header = document.getElementById('header');

                if (document.body.scrollTop > 75) {
                    header.style.backgroundColor = '#432c63';
                } else {
                    header.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
                }


                // проявление элементов при прокрутке страницы

                let fadeElemColl = document.getElementsByClassName('fade-in');

                let pageHeight = document.documentElement.clientHeight;

                if (fadeElemColl) {

                    for (let i = 0; i < fadeElemColl.length; i++) {
                        var fadeElem = fadeElemColl[i];

                        if ((fadeElem.style.opacity == 0) && (pageHeight - fadeElem.getBoundingClientRect().bottom >= 20)) {
                            fadeIn(fadeElem, 100, 10);
                        }
                    }
                }

            };
            break;


        case 'Personal cabinet': // Личный кабинет посетителя


            window.onload = function () {


                // проявление поля с заказами

                var fadeElem = document.getElementsByClassName('order-area')[0];
                if (fadeElem.style.opacity == 0)
                    setTimeout(function() {
                        fadeIn(fadeElem, 75, 40);
                        },
                        500);


                // выезд слева пунктов меню после загрузки страницы

                var slideElems = document.getElementsByClassName('order-menu-item');
                for (let i = 0; i < slideElems.length; i++) {
                    setTimeout(function() {
                            if (slideElems[i].style.left = '-600px') {
                                slideLeft(slideElems[i], -600, 0, 3, 100)}
                        },
                        2000+150*(i+1))
                }

            };


            // обработка нажатий по кнопкам меню

            var orderButton = document.getElementById("open-order");

            orderButton.onclick = function (e) {
                e.preventDefault();
                var orderDiv = document.getElementById("order-div");
                orderDiv.style.display = 'block';
            };


            break;


        case 'Log In':          // Страница авторизации


            jQuery('#auth_form').submit(
                function (event) {
                    event.preventDefault();

                    var result = document.getElementById("result");
                    var reg_link = document.getElementById("reg_link");

                    var formElement = document.getElementById("auth_form");
                    var formData = new FormData(formElement);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/account/authorization_user', true);
                    xhr.send(formData);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState != 4) return;

                        if (xhr.status != 200) {

                            console.log(xhr.status + ': ' + xhr.statusText);
                            // обработать ошибку
                        } else {
                            var resp = xhr.responseText;
                            console.log(resp);

                            switch (resp) {

                                case "user is not registered":
                                    result.innerHTML = "Пользователь не зарегистрирован. Измените логин и попробуйте снова.";
                                    result.style.display = "block";
                                    reg_link.style.display = "block";
                                    break;

                                case "wrong password":
                                    result.style.display = "block";
                                    result.innerHTML = "Пароль неверный. Измените пароль и попробуйте снова.";
                                    break;

                                case "login successful":
                                    formElement.style.display = "none";
                                    result.style.display = "block";
                                    result.innerHTML = "Вход выполнен. Добро пожаловать, " + formData.get('auth_login');
                                    break;

                            }

                        }
                    }
                }
            );
        break;


        case 'Registration':    // Страница регистрации


            jQuery('#reg_form').submit(
                function (event) {
                    event.preventDefault();

                    var result = document.getElementById("result");

                    var formElement = document.getElementById("reg_form");
                    var formData = new FormData(formElement);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/account/registration_user', true);
                    xhr.send(formData);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState != 4) return;

                        if (xhr.status != 200) {

                            console.log(xhr.status + ': ' + xhr.statusText);
                            // обработать ошибку
                        } else {
                            var reg_resp = xhr.responseText;
                            console.log(reg_resp);

                            switch (reg_resp) {

                                case "user already registered":
                                    result.style.display = "block";
                                    result.innerHTML = "Логин занят. Измените логин и попробуйте снова.";
                                    break;

                                case "user not add":
                                    formElement.style.display = "none";
                                    result.style.display = "block";
                                    result.innerHTML = "Ошибка регистрации.";
                                    break;

                                case "user add":
                                    formElement.style.display = "none";
                                    result.style.display = "block";
                                    result.innerHTML = "Регистрация прошла успешно.";
                                    break;

                            }

                        }
                    }
                }
            );
        break;



    }




}());

