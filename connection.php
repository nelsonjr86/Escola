<?php
$host = '127.0.0.1';
$db   = 'escola1'; //Qual Nome do Banco de dados que esta usando?
$user = 'root'; // Usuario o nome do seu usuario do banco?
$pass = ''; // Senha do bando de dados utilizado?
$sgbd = 'mysql'; // Estolha um ba SGDB: pgsql, mysql

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO("$sgbd:host=$host;dbname=$db", $user, $pass, $opt);
    /*** echo a message saying we have connected ***/
//    echo 'Conectado para o banco de dados<br />';

    /*** close the database connection ***/
//    $pdo = null;
}catch(PDOException $e){
    echo $e->getMessage();
}

