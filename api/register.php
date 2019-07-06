<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['pass'] === $_POST['repeat-pass']) {
        $q = $db->prepare('INSERT INTO user SET name = :name, email = :email, login = :login, pass = :pass');
        $q->bindValue(':name', $_POST['name']);
        $q->bindValue(':email', $_POST['email']);
        $q->bindValue(':login', $_POST['username']);
        $q->bindValue(':pass', password_hash($_POST['pass'], PASSWORD_DEFAULT));

        if ($q->execute()) {
            header('HTTP/1.0 201 Created');
            echo json_encode([
                'id' => (int)$db->lastInsertId(),
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ]);
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    } else {
        header('HTTP/1.0 400 Bad Request');
    }
} else {
    header('405 Method Not Allowed');
}
