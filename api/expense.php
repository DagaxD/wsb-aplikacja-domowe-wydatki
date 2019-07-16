<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_SESSION['user'])) {
        $q = $db->prepare('SELECT * FROM expense WHERE user_id = ?');
        $q->bindValue(1, $_SESSION['user']['id']);

        if ($q->execute()) {
            header('HTTP/1.0 200 OK');
            echo json_encode(array_map(
                function ($item) {
                    return [
                        'id' => (int)$item['id'],
                        'user_id' => (int)$item['user_id'],
                        'name' => $item['name'],
                        'amount' => number_format($item['amount'], 2, '.', ''),
                        'date' => date('Y-m-d', strtotime($item['date'])),
                        'repeating' => (int)$item['repeating'] === 1,
                        'planned' => (int)$item['planned'] === 1,
                        'income' => (int)$item['income'] === 1,
                    ];
                },
                $q->fetchAll()
            ));
        } else {
            header('HTTP/1.0 500 Internal Server Error');
        }
    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        $q->bindValue(':user_id', $_SESSION['user']['id']);
        $q->bindValue(':name', $_POST['name']);
        $q->bindValue(':amount', number_format($_POST['amount'], 2, '.', ''));
        $q->bindValue(':date', date('Y-m-d', $_POST['date']));
        $q->bindValue(':repeating', $_POST['repeating'] === '1');
        $q->bindValue(':planned', $_POST['planned'] === '1');
        $q->bindValue(':income', $_POST['income'] === '1');

        if ($q->execute()) {
            header('HTTP/1.0 201 Created');
            echo json_encode([
                'id' => (int)$db->lastInsertId(),
                'user_id' => $_SESSION['user']['id'],
                'name' => $_POST['name'],
                'amount' => number_format($_POST['amount'], 2, '.', ''),
                'date' => date('Y-m-d', $_POST['date']),
                'repeating' => $_POST['repeating'] === '1',
                'planned' => $_POST['planned'] === '1',
                'income' => $_POST['income'] === '1',
            ]);
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (!empty($_SESSION['user'])) {
        $q = $db->prepare('SELECT * FROM expense WHERE id = ?');
        $q->bindValue(1, $_GET['id']);
        $q->execute();

        $expense = $q->fetch();

        if ($expense) {
            if ((int)$expense['user_id'] === $_SESSION['user']['id']) {
                $q = $db->prepare('DELETE FROM expense  WHERE id = ?');
                $q->bindValue(1, $_GET['id']);

                if ($q->execute()) {
                    header('HTTP/1.0 204 No Content');
                } else {
                    header('HTTP/1.0 500 Internal Server Error');
                }
            } else {
                header('HTTP/1.0 403 Forbidden');
            }
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
} else {
    header('405 Method Not Allowed');
}
