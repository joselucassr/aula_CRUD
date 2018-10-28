<?php
$utf8 = header("Content-Type: text/html; charset=utf-8");

$server = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'db_cadastro';

$link = new mysqli($server, $user, $pass, $db_name);
$link -> set_charset('utf8');