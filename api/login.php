<?php
include 'db.php';

$q = $db->prepare('SELECT * FROM user WHERE login = ?');
$q->bindValue(1, $_POST['login']);
$q->execute();

$user = $q->fetch();

if ($user) {
    if (password_verify($_POST['pass'], $user['pass'])) {
        header('HTTP/1.0 200 OK');
        echo json_encode([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    } else {
        header('HTTP/1.0 400 Bad Request');
    }
} else {
    header('HTTP/1.0 400 Bad Request');
}