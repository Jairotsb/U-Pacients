<?php
try {
    include '../../conexao.php';

    $prep = $pdo->prepare(
        "SELECT * FROM schedule s
        INNER JOIN medics m on m.med_id = s.med_id
        INNER JOIN pacients p on p.pac_id = s.pac_id"
    );

    $prep->execute();

    foreach ($prep as $key) {
        extract($key);
        echo "<tr><td>$sch_date</td>";
        echo "<td>$sch_time</td>";
        echo "<td>$med_name</td>";
        echo "<td>$pac_name</td>";
        echo "<td><a href=\"delete_agenda.php?sch_id=$sch_id\"><i class=\"material-icons red-text\">clear</i></a></td>";
        echo "<td><a href=\"form_update_agenda.php?sch_id=$sch_id\"><i class=\"material-icons green-text\">refresh</i></a></td>";
    }
} catch (PDOException $e) {
    echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
