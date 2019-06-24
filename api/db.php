<?php

$host = 'localhost';
$database = 'baza';
$username = 'root';
$password = '';

$db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);