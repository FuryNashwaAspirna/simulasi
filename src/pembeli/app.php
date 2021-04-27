<?php

session_start();
$dbconnect = mysqli_connect('localhost', 'root', '', 'elektronik');

function queryData($query)
{
    global $dbconnect;
    $data = mysqli_query($dbconnect, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}
