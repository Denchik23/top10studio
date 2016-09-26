<?php

/**
 * Основные функции
 */

/**
 * Формирование запрашиваемой страницы
 *
 * @param $controllerName название контроллера
 * @param string $actionName название функции обработки страницы
 */
function loadPage($controllerName, $actionName = 'index') {
    //Подключаем контроллер
    include_once(PathPrefix .$controllerName. PathPostfix);

    $function = $actionName.'Action';
    //dd($function);
    $function();
}

/**
 * Отладочная функция
 * @param $value переменная
 * @param int $die Флаг
 */
function dd($value, $die=1) {
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';

    if ($die) die;
}

/**
 * @param $date форматируемая дата
 * @return bool|string
 */
function ConvertingDate ($date) {

    if (preg_match('/^([0-9]{2}).([0-9]{2}).([0-9]{4})$/', $date)) {
        return date("Y-m-d", strtotime($date));
    } else {
        if ($date == '0000-00-00') {
            return 'Не указана';
        } else {
            return date("d.m.Y", strtotime($date));
        }
    }

}

/**
 * Получение ip
 * @return mixed
 */
function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


/**
 * Получение браузера пользователя
 * @return string
 */
function get_browserr()
{
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
    elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
    elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
    elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
    elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
    else $browser = "Неизвестный";
    return $browser;
}