<?php

function get_conn()
{
    $host = "";
    $user = "";
    $password = "";
    $database = "";

    if (getenv('Environment') === 'Testing') {
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $database = "skeletondb";
    } else {
        $host = "mysql-server";
        $user = "root";
        $password = getenv('mariadbPwd');
        $database = "skeletondb";
    }
    $conn = mysqli_connect($host, $user, $password, $database);
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
    mysqli_close($conn);
    return $rows;
    // var_dump($rows);
}

function authenticate($username, $password)
{
    $conn = get_conn();

    $statement = mysqli_prepare($conn, "select * from users where Username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $res = mysqli_stmt_get_result($statement);


    $row = mysqli_fetch_assoc($res);

    if ($row == null) {
        return false;
    } else if ($row == false) {
        return false;
    }

    mysqli_close($conn);

    if ($row['Password'] === $password) {

        return true;
    } else {

        return false;
    }
}

function delete_note($username, $title)
{
    $conn = get_conn();

    $statement = mysqli_prepare($conn, "Delete From Notes where Username = ? And Title = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $title);
    $res = mysqli_stmt_execute($statement);
    return $res;
}

function create_note($username, $title)
{
    $conn = get_conn();

    $location = 'notes/' . $title . '.txt';
    $statement = mysqli_prepare($conn, "Insert into Notes(Title, Username, location, date) Values (?,?,?,NOW());");
    mysqli_stmt_bind_param($statement, "sss", $title, $username, $location);
    $res = mysqli_execute($statement);
    mysqli_close($conn);
    return $res;
}


function update_note($old, $new, $username)
{
    $conn = get_conn();
    $location = 'notes/' . $new . '.txt';

    $id = get_id($username, $old, $conn);

    $query = "Update Notes Set Title = ?, location = ?, date = NOW() Where NoteID = ?;";
    $statement = mysqli_prepare($conn, $query);
    if (mysqli_stmt_bind_param($statement, "ssi", $new, $location, $id)) {
        $res = mysqli_execute($statement);
    } else {
        return false;
    }
    mysqli_close($conn);
    return $res;
}

function get_id($username, $title, $conn)
{
    $query = "Select NoteID From Notes Where Title = ? And Username = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $title, $username);
    mysqli_execute($stmt);
    $row = mysqli_stmt_get_result($stmt);
    $res = mysqli_fetch_assoc($row);
    return $res['NoteID'];
}
