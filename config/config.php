<?php

//Константы для обращения к контроллеру
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');
define('PerPage', 8);

//>Испльзуемый шаблон
$template = 'default';

//Пути к шаблонам
define('TemplatePrefix', '../views/'.$template.'/');
define('TemplatePostfix', '.php');

//Путь к файлам шаблона в веб пространстве
define('TemplateWebPath', '../templates/'.$template.'/');
//>
