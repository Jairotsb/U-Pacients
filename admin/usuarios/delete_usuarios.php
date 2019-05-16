<?php
try {
    include '../../conexao.php';

    $id = $_GET['use_id'];

    $prep = $pdo->prepare("DELETE FROM users WHERE use_id=:id");
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_usuarios.php');
} catch (PDOException $e) {
    header('Location: form_usuarios.php');
}
