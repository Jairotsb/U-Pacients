<?php
try {
    include '../../conexao.php';

    $nome = filter_input(INPUT_POST, 'use_name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'use_email', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'use_password', FILTER_DEFAULT);

    $prep = $pdo->prepare("INSERT INTO users (use_name, use_email, use_password) VALUES (:userName, :use_email, :use_password)");

    $prep->bindValue(':userName', $nome);
    $prep->bindValue(':use_email', $email);
    $prep->bindValue(':use_password', MD5($senha));

    $prep->execute();
    header('Location: form_usuarios.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
