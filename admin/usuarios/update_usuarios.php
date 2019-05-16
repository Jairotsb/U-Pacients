<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'use_name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'use_email', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'use_password', FILTER_DEFAULT);

    $oldData = $pdo->prepare("SELECT use_password FROM users");
    $oldData->execute();

    $data = $oldData->fetchAll();

    $prep = $pdo->prepare("UPDATE users SET use_name=:userName, use_email=:email, use_password=:userPassword WHERE use_id=:id");

    $prep->bindValue(':userName', $name);
    $prep->bindValue(':email', $email);
    $prep->bindValue(':userPassword', $senha === '' ? $data[0]['use_password'] : MD5($senha));
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_usuarios.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
