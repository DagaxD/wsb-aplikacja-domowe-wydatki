<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_SESSION['user'])) {
        $q = $db->prepare('INSERT INTO expense SET
            user_id = :user_id,
            name = :name,
            amount = :amount,
            date = :date,
            repeating = :repeating,
            planned = :planned,
            income = :income
        ');

        var_dump($_POST);   
        $q->bindValue(':user_id', $_SESSION['user']['id']);
        $q->bindValue(':name', $_POST['name']);
        $q->bindValue(':amount', number_format($_POST['amount'], 2, '.', ''));
        $q->bindValue(':date', date('Y-m-d'));
        $q->bindValue(':repeating', $_POST['repeating'] === '1');
        $q->bindValue(':planned', $_POST['planned'] === '1');
        $q->bindValue(':income', $_POST['income'] === '1');


        var_dump($q);
        $result = $q->execute();
        var_dump($result);
        if ($result) {
            header('HTTP/1.0 201 Created');
            echo json_encode([
                'id' => (int)$db->lastInsertId(),
                'user_id' => $_SESSION['user']['id'],
                'name' => $_POST['name'],
                'amount' => number_format($_POST['amount'], 2, '.', ''),
                'date' => date('Y-m-d'),
                'repeating' => $_POST['repeating'] === '1',
                'planned' => $_POST['planned'] === '1',
                'income' => $_POST['income'] === '1',
            ]);
        } else {
            print_r($db->errorInfo());
            header('HTTP/1.0 400 Bad Request');
        }
    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
} else {
    header('405 Method Not Allowed');
}
