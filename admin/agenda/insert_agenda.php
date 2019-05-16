<?php
try {
    include '../../conexao.php';

    $date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
    $time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
    $med_id = filter_input(INPUT_POST, 'med_id', FILTER_DEFAULT);
    $pat_id = filter_input(INPUT_POST, 'pat_id', FILTER_DEFAULT);

    $prep = $pdo->prepare("INSERT INTO schedule (sch_date, sch_time, med_id, pat_id) VALUES (:sch_date, :sch_time, :med_id, :pat_id)");

    $prep->bindValue(':sch_date', $date);
    $prep->bindValue(':sch_time', $time);
    $prep->bindValue(':med_id', $med_id);
    $prep->bindValue(':pat_id', $pat_id);

    $prep->execute();

    header('Location: form_agenda.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
