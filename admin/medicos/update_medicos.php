<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'med_name', FILTER_DEFAULT);

    $prep = $pdo->prepare("UPDATE medics SET med_name=:userName WHERE med_id=:id");

    $prep->bindValue(':userName', $name);
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_medicos.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
