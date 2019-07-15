<?php
session_start();

$host = 'localhost';
$database = 'domowe_wydatki';
$username = 'root';
$password = '';

$db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
