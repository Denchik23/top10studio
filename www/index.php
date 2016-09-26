<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once ('../config/config.php');             //Инициализация настроек
include_once ('../library/DataBase.php');        //Подключеня к Mysql
include_once ('../library/mainFunctions.php');     //Основные функции
session_start();

//Определяем контроллер в get
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

//Определяем функцию контроллера в get
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


//Подключаем базу
$db = DataBase::getDB();

loadPage($controllerName, $actionName);