<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_SESSION['user'])) {
        $q = $db->prepare('SELECT * FROM user WHERE id = ?');
        $q->bindValue(1, $_SESSION['user']['id']);
        $q->execute();

        $user = $q->fetch();

        if ($user) {
            header('HTTP/1.0 200 OK');
            echo json_encode([
                'id' => (int)$user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ]);
        } else {
            header('HTTP/1.0 500 Internal Server Error');
        }
    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
} else {
    header('405 Method Not Allowed');
}
