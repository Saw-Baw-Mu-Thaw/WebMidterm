<?php

function get_conn()
{
    $conn = mysqli_connect("127.0.0.1", "root", "", "skeletondb");
    if ($conn === false) {
        echo mysqli_connect_error() . '</br>';
        die();
    }
    return $conn;
}

function get_notes($username)
{
    $conn = get_conn();

    $query = "select * from Notes where Username = ?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, 's', $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    die($rows);
}

function authenticate($username, $password)
{
    $conn = get_conn();

    $statement = mysqli_prepare($conn, "select * from users where Username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $res = mysqli_stmt_get_result($statement);

    $row = mysqli_fetch_assoc($res);

    print_r($row);

    if ($row['Password'] === $password) {
        // echo 'true';
        return true;
    } else {
        // echo 'false';
        return false;
    }
}
