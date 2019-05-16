<?php
try {
    include '../../conexao.php';

    $prep = $pdo->prepare("SELECT * FROM patients");

    $prep->execute();

    foreach ($prep as $key) {
        extract($key);
        echo "<tr><td>$pat_name</td>";
        echo "<td><a href=\"delete_pacientes.php?pat_id=$pat_id\"><i class=\"material-icons red-text\">clear</i></a></td>";
        echo "<td><a href=\"form_update_pacientes.php?pat_id=$pat_id\"><i class=\"material-icons green-text\">refresh</i></a></td></tr>";
    }
} catch (PDOException $e) {
    echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
