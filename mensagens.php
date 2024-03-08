<?php
require_once 'config.php';

$senha = "123";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST['senha'];

    if($senhadigitada === $senha){
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);

    }else{
        echo "senha incorreta";
    }
}

?>




<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Esse é o site com todas as suas melhores receitas, sendo possivel tambem, solicitar receitas que você deseja encontar mas o site ainda nâo tem.">
    <meta name="keywords" content="panela de barro, panela, barro, receita, receitas, fácil, rapdo, ">
    <meta name="author" content="Breno Silva">

    <link rel="shortcut icon" href="src/img/icone.jfif" type="image/x-icon">

    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/mensagens.css">
    <link rel="stylesheet" href="src/css/responsive.css">
    <title>PANELA DE BARRO</title>
</head>
<body>
    <header>
        <h1>PANELA DE BARRO</h1>
        <p>Compartilhe e experimente novas delícias!</p>
    </header>

    <div class="formulario">
        <div class="form">
            <form method="post">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="senha" required>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <?php if(isset($result) && $result->num_rows >0) : ?>
            <h2>MENSAGENS</h2>
            <ul>
                <?php while($row = $result->fetch_assoc()) : ?>

                    <li>
                        <strong>Nome:</strong> <?php echo $row["nome"]; ?> <br>
                        <strong>Mensagem:</strong> <?php echo $row["mensagem"]; ?> <br>
                        <strong>Data e hora:</strong> <?php echo $row["data"]." I ".$row["hora"]; ?> <br>

                    </li>

                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>sem mensagens</p>
        <?php endif; ?>

        <?php if(isset($result) && $result->num_rows >0) : ?>
            <style>
                .form{
                    display:none;
                }
            </style>
        <?php endif; ?>

        <a href="index.html">Inicio</a>
        <a href="javascript:history.back()">Voltar</a>
    </div>
</body>


