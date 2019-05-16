<?php
try {
    include '../../conexao.php';

    $id = $_GET['sch_id'];

    $prep = $pdo->prepare("DELETE FROM schedule WHERE sch_id=:id");
    $prep->bindValue(':id', $id);

    $prep->execute();

    header('Location: form_agenda.php');
} catch (PDOException $e) {
    header('Location: form_agenda.php');
}
