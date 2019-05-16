<?php
try {
    include '../../conexao.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $date = filter_input(INPUT_POST, 'sch_date', FILTER_DEFAULT);
    $time = filter_input(INPUT_POST, 'sch_time', FILTER_DEFAULT);
    $med_id = filter_input(INPUT_POST, 'med_id', FILTER_DEFAULT);
    $pat_id = filter_input(INPUT_POST, 'pat_id', FILTER_DEFAULT);

    $prep = $pdo->prepare("UPDATE schedule SET sch_date=:sch_date, sch_time=:sch_time, med_id=:med_id, pat_id=:pat_id WHERE sch_id=:id");

    $prep->bindValue(':id', $id);
    $prep->bindValue(':sch_date', $date);
    $prep->bindValue(':sch_time', $time);
    $prep->bindValue(':med_id', $med_id);
    $prep->bindValue(':pat_id', $pat_id);

    $prep->execute();

    header('Location: form_agenda.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
