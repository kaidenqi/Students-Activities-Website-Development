<?php

function combine($arr)
{
    $newArr = array();
    foreach($arr as $value)
    {
        $newVal = "'" . $value . "'";
        array_push($newArr, $newVal);
    }
    return $newArr;
}

function addRecord($sql, $table_name, $arr)
{
    $connected = mysqli_connect("localhost", "root", "", $sql);
    $newArr = combine($arr);
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE 
            TABLE_SCHEMA = 'se_sql' AND TABLE_NAME = '$table_name'";
    $header = mysqli_query($connected, $query);
    // $arr_table_name = array();
    while($row = mysqli_fetch_assoc($header))
    {
        $result[] = $row;
    }

    $columArr = array_column($result, 'COLUMN_NAME');
    $keys = implode(",", $columArr);
    $values = implode(",", $newArr);
    $insertArr = "INSERT INTO $table_name ($keys) VALUE ($values)";
    if(mysqli_query($connected, $insertArr) === false)
    {
        echo "ffffff";
    }

    unset($columArr);
    unset($result);
    unset($newArr);
    mysqli_free_result($header);
    mysqli_close($connected);
}

function searchRecord($sql, $table_name, $searchKey, $searchValue)
{
    $connected = mysqli_connect("localhost", "root", "", $sql);
    $query = "SELECT * FROM $table_name where $searchKey = '$searchValue'";
    $result = mysqli_query($connected, $query);
    $record = array();
    while($obj = mysqli_fetch_object($result))
    {
        array_push($record, $obj);
    }
    mysqli_close($connected);
    return $record;          // return obj as resluts, maybe include several objects
}

function updateRecord($sql, $table_name, $arr)
{
    
}

function deleteRecord($sql, $table_name, $key)
{

}

function isExist($sql, $table_name) {
    $connected = mysqli_connect("localhost", "root", "", $sql);
    $query = "SELECT 1 FROM $table_name";
    $isExist = mysqli_query($connected, $query);
    mysqli_close($connected);
    return $isExist;
}


?>