<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'med_name', FILTER_DEFAULT);
    $esp = filter_input(INPUT_POST, 'med_esp', FILTER_DEFAULT);

    $prep = $pdo->prepare("UPDATE medics SET med_name=:userName, med_esp=:userEsp WHERE med_id=:id");

    $prep->bindValue(':userName', $name);
    $prep->bindValue(':userEsp', $esp);
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_medicos.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
