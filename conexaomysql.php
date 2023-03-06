<?php 

$usuario = '';
$senha = '';
$database = '';
$host = '';

$con = new mysqli($host, $usuario, $senha, $database);

if($con->error) {
    die("Falha na conexão com o banco de dados! " . $con->error);
}