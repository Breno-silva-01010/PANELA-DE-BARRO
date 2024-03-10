<?php
require_once 'config.php';

$nome = $_POST['nome'];
$mensagem = $_POST['receita'];
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

$smtp = $conn->prepare("INSERT INTO mensagens (nome, mensagem, data, hora) VALUES (?,?,?,?)");

$smtp->bind_param("ssss", $nome, $mensagem, $data_atual, $hora_atual);

if ($smtp->execute()) {
    echo "Mensagem enviada";
} else {
    echo "Erro ao enviar a mensagem: " . $smtp->error;
}

$smtp->close();
$conn->close();

?>
