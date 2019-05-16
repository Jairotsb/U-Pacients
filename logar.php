<?php
try {
    include 'conexao.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $novaSenha = MD5($senha);

    $prep = $pdo->prepare("SELECT * FROM users WHERE use_email=:use_email and use_password=:use_password");
    $prep->bindValue(":use_email", $email);
    $prep->bindValue(":use_password", $novaSenha);

    $prep->execute();
    $data = $prep->fetchAll();

    if ($prep->rowCount() > 0) {
        session_start();
        $_SESSION["Login"]["email"] = $email;
        $_SESSION["Login"]["name"] = $data[0]['use_name'];
        header('Location: admin/home.php');
    } else {
        header('Location: index.php');
    }
} catch (PDOException $e) {
    echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
