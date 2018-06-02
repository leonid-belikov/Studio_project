(function () {
    'use strict';

    // регистрация пользователя

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



    // авторизация пользователя

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
    )




}());

