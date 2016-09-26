<?php
// Устанавливаем переменную img_dir, которая примет значение пути к папке со шрифтами и (если потребуется) изображениями
define ( 'DOCUMENT_ROOT', dirname ( __FILE__ ) );
//define("img_dir", DOCUMENT_ROOT."/captcha/"); // Если скрипт отказывается работать, то скорее всего ваш сервер не поддерживает $HTTP_SERVER_VARS. В таком случае, закомментируйте эту строчку и раскомментируйте следующую.

// Подключаем генератор текста

include("random.php");

$captcha = generate_code();

// Используем сессию (если нужно - раскомментируйте строчки тут и в go.php)
session_start();
$_SESSION['captcha']=$captcha;
//session_destroy();

// Вносим в куки хэш капчи. Куки будет жить 120 секунд.
//$cookie = md5($captcha);

//$cookietime = time()+600; // Можно указать любое другое время
//setcookie("captcha2", $cookie, $cookietime, '/');
		
// Пишем функцию генерации изображения
function img_code($code) // $code - код нашей капчи, который мы укажем при вызове функции
{
	$img_dir = $_SERVER['DOCUMENT_ROOT'].'/captcha/';
	// Отправляем браузеру Header'ы
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                   
		header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");         
		header("Cache-Control: post-check=0, pre-check=0", false);           
		header("Pragma: no-cache");                                           
		header("Content-Type:image/png");
	// Количество линий. Обратите внимание, что они накладываться будут дважды (за текстом и на текст). Поставим рандомное значение, от 3 до 7.
		$linenum = rand(2, 5); 
	// Задаем фоны для капчи. Можете нарисовать свой и загрузить его в папку /img. Рекомендуемый размер - 150х70. Фонов может быть сколько угодно
		$img_arr = array(
			"capbckg.png"
		);
	// Шрифты для капчи. Задавать можно сколько угодно, они будут выбираться случайно
		$font_arr = array();
			$font_arr[0]["fname"] = "LondrinaSketch.ttf";	// Имя шрифта. Я выбрал Droid Sans, он тонкий, плохо выделяется среди линий.
			$font_arr[0]["size"] = rand(20, 25);				// Размер в pt
		
	// Генерируем "подстилку" для капчи со случайным фоном
		$n = rand(0,sizeof($font_arr)-1);
		$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
		$im = imagecreatefrompng ($img_dir . $img_fn); 
	// Рисуем линии на подстилке
		for ($i=0; $i<$linenum; $i++)
		{
			$color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
			imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
		}
		$color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200)); // Опять случайный цвет. Уже для текста.

	// Накладываем текст капчи				
		$x = rand(0, 35);
		for($i = 0; $i < strlen($code); $i++) {
			$x+=15;
			$letter=substr($code, $i, 1);
			imagettftext ($im, $font_arr[$n]["size"], rand(1, 3), $x, rand(30, 35), $color, $img_dir.$font_arr[$n]["fname"], $letter);
		}
	// Опять линии, уже сверху текста
		for ($i=0; $i<$linenum; $i++)
		{
			$color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
			imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
		}
	// Возвращаем получившееся изображение
		ImagePNG ($im);
		ImageDestroy ($im);
}
img_code($captcha) // Выводим изображение

?>