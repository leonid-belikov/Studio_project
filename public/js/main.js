(function () {
    'use strict';


//--------------------------------------------------------------
//     библиотека переменных и функций
//--------------------------------------------------------------


    // переменная для идентификации страницы

    var title = document.querySelector("title").innerText;
    console.log(title);


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


    // функция, показывающая результат нажатия кнопок меню в личном кабинете

    function showOrderRes(num) {
        for (let i=0; i < orderResColl.length; i++) {
            if (i === num)
                orderResColl[i].style.display = 'block';
            else
                orderResColl[i].style.display = 'none';
        }
    }


    // функция валидации данных

    function validateOwn(formElement) {

        var incorrectList = '';

        for(let i = 0; i < formElement.length; i++) {
            if ((formElement[i].type === 'text')||(formElement[i].type === 'textarea')||(formElement[i].type === 'password')){


                switch (formElement[i].name) {

                    case 'order-title':

                        var inputTitle = formElement[i].value;
                        if (inputTitle !== '') {
                            var matchTitle = inputTitle.match(/\w+/g);

                            if (!matchTitle)
                                incorrectList += 'title\n';
                            else {

                                if (inputTitle !== matchTitle.join(' '))
                                    incorrectList += 'title\n';
                            }
                        } else {
                            incorrectList += 'title\n';
                        }

                        break;

                    case 'order-specific':

                        var inputSpec = formElement[i].value.replace(/\n+/g, ' ');
                        if (inputSpec !== '') {
                            var matchSpec = inputSpec.match(/[.,!?"]*\w+[.,!?"]*/g);

                            if (!matchSpec)
                                incorrectList += 'specification\n';
                            else {

                                if (inputSpec !== matchSpec.join(' '))
                                    incorrectList += 'specification\n';
                            }
                        } else {
                            incorrectList += 'specification\n';
                        }

                        break;

                    case 'order-deadline':

                        var inputDate = formElement[i].value.match(/\d+/g);

                        if (inputDate !== null) {

                            var date = new Date(inputDate[2], inputDate[1] - 1, inputDate[0]);
                            var result = date.getFullYear() === parseInt(inputDate[2]) &&
                                date.getDate() === parseInt(inputDate[0]) &&
                                date.getMonth() === parseInt(inputDate[1]) - 1;

                            if (!result)
                                incorrectList += 'deadline\n';

                        } else {
                            incorrectList += 'deadline\n';
                        }

                        break;

                    case 'order-cost':

                        var inputCost = formElement[i].value;
                        if (inputCost !== '') {
                            var matchCost = inputCost.match(/\d+/);

                            if (!matchCost)
                                incorrectList += 'cost\n';

                        } else {
                            incorrectList += 'cost\n';
                        }

                        break;

                    case 'reg_login':

                        console.log('reg-login');

                        break;

                    case 'reg_pass':

                        console.log('reg-pass');



                }
            }
        }

        console.log('incorrectList =\n' + incorrectList);
        return incorrectList;
    }




//--------------------------------------------------------------
//     скрипты для страниц
//--------------------------------------------------------------


    switch (title)
    {

        // главная страница
        case 'Studio':


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



        // Личный кабинет посетителя
        case 'Personal cabinet':


            var orderArea = document.getElementsByClassName('order-area')[0]; // поле с заказами

            window.onload = function () {


                // проявление поля с заказами

                if (orderArea.style.opacity == 0)
                    setTimeout(function() {
                        fadeIn(orderArea, 75, 40);
                        },
                        500);


                // выезд слева пунктов меню после загрузки страницы

                var slideElems = document.getElementsByClassName('order-menu-item');
                for (let i = 0; i < slideElems.length; i++) {
                    setTimeout(function() {
                            if (slideElems[i].style.left = '-600px') {
                                slideLeft(slideElems[i], -600, 0, 3, 100)}
                        },
                        1500+150*(i+1))
                }

            };


            window.onscroll = function () {

                // изменение фона шапки при прокрутке страницы

                var header = document.getElementById('header');

                if (document.body.scrollTop > 75) {
                    header.style.backgroundColor = '#432c63';
                } else {
                    header.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
                }
            };


            // обработка нажатий по кнопкам меню

            var openOrderButton = document.getElementById("open-order");
            var incOrdersButton = document.getElementById("inc-orders");
            var compOrdersButton = document.getElementById("comp-orders");
            var orderResColl = document.getElementsByClassName("order-res");

            showOrderRes(0);

            openOrderButton.onclick = function () // вывод формы нового заказа
            {
                showOrderRes(0);
            };

            incOrdersButton.onclick = function (event) // вывод текущих заказов
            {

                event.preventDefault();

                var formData = new FormData();

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/order/show_unc', true);
                xhr.send(formData);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState != 4) return;

                    if (xhr.status != 200) {

                        console.log(xhr.status + ': ' + xhr.statusText);
                        // TODO: обработать ошибку
                    } else {
                        var resp = JSON.parse(xhr.responseText);

                        var uncList = '<h2>uncompleted orders</h2>';

                        if(resp.length === 0)
                            uncList += 'The list of uncompleted orders is empty.\nTo place an order, press "make new order".';
                        else {

                            for (let i = 0; i < resp.length; i++) {
                                let str = '<div class="order-item"><h3>Order number</h3><div>' + resp[i]["idOrder"] + ' from ' + resp[i]["orderDate"] +
                                    '</div><h3>Title</h3><div>' + resp[i]["title"] +
                                    '</div><h3>Specification</h3><div>' + resp[i]["specification"] +
                                    '</div><h3>Status</h3><div>' + resp[i]["status"] +
                                    '</div><h3>Cost</h3><div>' + resp[i]["cost"] +
                                    '</div><h3>Period of execution</h3><div>' + resp[i]["deadline"].split('.').reverse().join('.') +
                                    '</div></div>';

                                uncList += str;

                            }
                        }

                        orderResColl[1].innerHTML = uncList;
                    }
                };

                showOrderRes(1);
            };

            compOrdersButton.onclick = function (event) // вывод завершенных заказов
            {

                event.preventDefault();

                var formData = new FormData();

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/order/show_comp', true);
                xhr.send(formData);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState != 4) return;

                    if (xhr.status != 200) {

                        console.log(xhr.status + ': ' + xhr.statusText);
                        // TODO: обработать ошибку
                    } else {
                        var resp = JSON.parse(xhr.responseText);

                        var compList = '<h2>completed orders</h2>';

                        if(resp.length === 0)
                            compList += 'The list of completed orders is empty.\nTo make an order, press "make new order".';
                        else {

                            for (let i = 0; i < resp.length; i++) {
                                let str = '<div class="order-item"><h3>Order number</h3><div>' + resp[i]["idOrder"] + ' from ' + resp[i]["orderDate"] +
                                    '</div><h3>Title</h3><div>' + resp[i]["title"] +
                                    '</div><h3>Specification</h3><div>' + resp[i]["specification"] +
                                    '</div><h3>Status</h3><div>' + resp[i]["status"] +
                                    '</div><h3>Cost</h3><div>' + resp[i]["cost"] +
                                    '</div><h3>Period of execution</h3><div>' + resp[i]["deadline"] +
                                    '</div></div>';

                                compList += str;

                            }
                        }

                        orderResColl[2].innerHTML = compList;
                    }
                };

                showOrderRes(2);
            };




            jQuery('#order_form').submit // обработка данных, введенных в форму заказа
            (
                function (event) {

                    event.preventDefault();

                    var formElement = document.getElementById("order_form");

                    // if (validate(formElement) && validate(formElement) === 'Error')
                    // console.log('validateOwn(formElement) = "' + validateOwn(formElement) + '"');

                    var invalidData = validateOwn(formElement);
                    if (invalidData)
                        alert('An error has occurred. Please enter correct data in the fields:\n' + invalidData);
                    else {
                        formElement['order-deadline'].value =
                            formElement['order-deadline'].value.match(/\d+/g).reverse().join('.');

                        var formData = new FormData(formElement);

                        formElement['order-deadline'].value =
                            formElement['order-deadline'].value.match(/\d+/g).reverse().join('.');

                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '/order/make_new', true);
                        xhr.send(formData);

                        xhr.onreadystatechange = function () {
                            if (xhr.readyState != 4) return;

                            if (xhr.status != 200) {

                                console.log(xhr.status + ': ' + xhr.statusText);
                                // обработать ошибку
                            } else {
                                var resp = xhr.responseText;
                                console.log(resp);

                                var responseDiv;

                                if (orderResColl.length <= 3) {
                                    responseDiv = document.createElement('div');
                                    responseDiv.className = 'order-res';
                                    orderArea.appendChild(responseDiv);
                                }
                                else
                                    responseDiv = orderResColl[3];

                                switch (resp) {
                                    case "All right":
                                        responseDiv.innerText = 'Successfully. Your order is processed.';
                                        break;

                                    case "Smth wrong":
                                        responseDiv.innerText = 'Try again. An error has occurred.';
                                        break;

                                    default:
                                        responseDiv.innerText = 'Your order was successfully registered by number ' + resp + '.\n' +
                                            'You can track the order status on the tab "Uncompleted orders".';
                                }

                                showOrderRes(3);

                            }
                        }
                    }
                }
            );



            break;



        // Страница авторизации
        case 'Log In':

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

                    xhr.onreadystatechange = function () {
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



        // Страница регистрации
        case 'Registration':


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

