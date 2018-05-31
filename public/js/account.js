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
                    var resp = xhr.responseText;
                    console.log(resp);

                    switch (resp) {

                        case "user already registered":
                            formElement.style.display = "none";
                            result.style.display = "block";
                            result.innerHTML = "Логин занят";
                            break;

                        case "user not add":
                            formElement.style.display = "none";
                            result.style.display = "block";
                            result.innerHTML = "Ошибка регистрации";
                            break;

                        case "user add":
                            formElement.style.display = "none";
                            result.style.display = "block";
                            result.innerHTML = "Регистрация прошла успешно";
                            break;

                    }

                }
            }
        }
    )




}());

