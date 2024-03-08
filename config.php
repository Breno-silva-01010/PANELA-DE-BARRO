<?php

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'panela_de_barro';

$conn = new mysqli($server, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados. Erro: " . $conn->connect_error);
}

?>