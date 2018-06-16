(function () {
    'use strict';

    // изменение свойств шапки при прокрутке страницы

    var header = document.getElementById('header');
    window.onscroll = function () {
        if (document.body.scrollTop > 100) {
            header.style.backgroundColor = 'rgba(50, 0, 90, 1)';
        } else {
            header.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
        }
    };



}());

