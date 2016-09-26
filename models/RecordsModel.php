<?php
/**
 * Модель клиентской базы
 */

/**
 * Получение записей с пагинацией
 * @param int $start Начало выборки для пагинации
 * @return array
 */
function GetRecords($start = 0) {

    global $db;

    $PerPage = PerPage;
    $sql = "SELECT * FROM records ORDER BY id DESC LIMIT {?},{?}";

    $result = $db->select($sql, array($start, $PerPage));

    $smartyRs = array();
    foreach ($result as $value) {
        $value['date'] = ConvertingDate($value['date']);
        $smartyRs[] = $value;
    }

    return $smartyRs;
}

/**
 * Колечество записей в таблице
 * @return mixed
 */
function CountClients() {
    global $db;

    $sql = "SELECT * FROM records";
    $result = $db->select($sql);

    return $db->numRows($result);
}

/**
 * @param $data массив с заплняемымы данными
 */
function AddRecords($fields, $data) {

    global $db;

    $str = '';
    foreach ($data as $value) {
        $str.="'{?}',";
    }
    $str = substr($str, 0, -1);
    $sql = "INSERT INTO records (".$fields.") VALUES (".$str.")";

    return $db->query($sql,$data);
}


function delRecord($id) {

    global $db;

    $sql = "DELETE FROM records WHERE id={?}";
    if ($db->query($sql, $id)) return true;
    else return false;

}

/**
 * Получение клиента по id
 * @param $id идентификатор записи
 * @return array|FALSE
 */
function getIdRecord($id) {

    global $db;

    $sql = "SELECT * FROM records WHERE id={?}";
    $result = $db->selectRow($sql, array($id));
    if ($result) {
        if ($result['date'] != '') $result['date'] = ConvertingDate($result['date']);
        return $result;
    }
    else return false;

}