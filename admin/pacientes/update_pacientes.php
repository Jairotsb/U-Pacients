<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'pat_name', FILTER_DEFAULT);

    $prep = $pdo->prepare("UPDATE patients SET pat_name=:userName WHERE pat_id=:id");

    $prep->bindValue(':userName', $name);
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_pacientes.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
