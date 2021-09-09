<?php

$connection = new mysqli($dataBase['host'],$dataBase['userName'], $dataBase['passWord'], $dataBase['name']);
if ($connection->connect_error) die($connection->connect_error);

function createTable($name, $query) //create a mysql table
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}


function queryMysql($query) //run mysql code
{
    global $connection;
    mysqli_query($connection, "set names 'utf8'");
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}


function AntiUnWord($var) //anti-unlegual words
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}
?>