<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'pac_name', FILTER_DEFAULT);

    $prep = $pdo->prepare("UPDATE pacients SET pac_name=:userName WHERE pac_id=:id");

    $prep->bindValue(':userName', $name);
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_pacientes.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
