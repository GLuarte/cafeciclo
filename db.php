<?php
$dsn = 'mysql:host=localhost;dbname=cafeciclo';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}