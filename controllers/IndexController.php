<?php

/*
 * Контроллер главной страницы
 */

//Подключение модели
include_once('../models/RecordsModel.php');


function indexAction() {

    $cur_page = 1;

    if (isset($_GET['page']) && $_GET['page'] > 0) {
        $cur_page = $_GET['page'];
    }

    $start = ($cur_page - 1) * PerPage;

    $rsClients = GetRecords($start);
    $CountClients = CountClients();
    $num_pages = ceil($CountClients / PerPage);

    $pagination = [
        //'start' => $start,
        'cur_page' => $cur_page,
        'num_pages' => $num_pages,
        'CountClients' => $CountClients
    ];
    //dd($pagination);

    //Я обычно использую шаблонизатор Smarty или blabe, но в тз на чистом php поэтому как то так
    include(TemplatePrefix.'index'.TemplatePostfix);
}

/**
 * Функция добавления записи
 */
function addAction() {

    $Formdata = array();
    $strfields = '';
    $timplate = 'addRecord';

    if (isset($_POST['email'])) {
        if (($_POST['name'] == '') || ($_POST['email'] == '') || ($_POST['text'] == '') || ((md5($_POST['codeCap']) != md5($_SESSION['captcha'])))) {
            if (($_POST['name'] == '')) $FormError[] = 'Заполните имя';
            if (($_POST['email'] == '')) $FormError[] = 'Заполните email';
            if (($_POST['text'] == '')) $FormError[] = 'Напишите какой нибудь текст';
            if ((md5($_POST['codeCap']) != md5($_SESSION['captcha']))) $FormError[] = 'Код капчи неверен';
            $Formdata = $_POST;
            //dd($_POST);

        } else {
            foreach ($_POST as $key => $value) {
                if (($value != '') && ($key != 'codeCap')) {
                    $strfields .= $key.',';
                    $Formdata[] = $value;
                }
            }
            $strfields .= 'ip,browser';
            $Formdata[] = get_ip();
            $Formdata[] = get_browserr();

            if (AddRecords($strfields, $Formdata)) $success = 'Запись успешно добавлена.';
            else $error = 'Ошибка! Запись не добавлена.';
            $pagetitle = 'Добавление нового клиента';
            $timplate = 'message';
        }

    }

    include(TemplatePrefix.$timplate.TemplatePostfix);
}


/**
 * Показ данных записи
 */
function showAction() {

    $dataAj = array();
    if (isset($_GET['id'])) $id = $_GET['id']; else return false;
    $id = intval($id);

    $GetIdRecord = getIdRecord($id);
    if ($GetIdRecord) {
        $dataAj['success'] = true;
        $dataAj['dataRecord'] = '
<table class="table table-bordered">
    <tbody>
    <tr>
        <th class="active">Имя:</th>
        <th>'.$GetIdRecord['name'].'</th>
    </tr>
    <tr>
        <th class="active">E-mail клиента:</th>
        <th>'.$GetIdRecord['email'].'</th>
    </tr>
    <tr>
        <th class="active">Домашняя страница:</th>
        <th>'.$GetIdRecord['homepage'].'</th>
    </tr>
    <tr>
        <th class="active">Дата добавления:</th>
        <th>'.$GetIdRecord['date'].'</th>
    </tr>
    <tr>
        <th class="active">Ip пользователя:</th>
        <th>'.$GetIdRecord['ip'].'</th>
    </tr>
    <tr>
        <th class="active">Браузер пользователя:</th>
        <th>'.$GetIdRecord['browser'].'</th>
    </tr>
    <tr>
        <th class="active">Коментарий:</th>
        <th>'.$GetIdRecord['text'].'</th>
    </tr>
    </tbody>
</table>';
    } else {
        $dataAj['success'] = false;
    }

    echo json_encode($dataAj);

}



/**
 * удаление записи
 * @throws
 */
function delAction() {

    global $statusArray;

    if (isset($_GET['id'])) $id = $_GET['id']; else throw http404;

    $pagetitle = 'Удаление данных клиента';

    if (delRecord($id)) $success = 'Клиент №-'.$id.' успешно Удален.';
    else $error = 'Ошибка! Клиент не удален.';

    include(TemplatePrefix.'message'.TemplatePostfix);

}