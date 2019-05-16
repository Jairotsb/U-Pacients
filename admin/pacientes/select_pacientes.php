<?php
try {
    include '../../conexao.php';

    $prep = $pdo->prepare("SELECT * FROM pacients");

    $prep->execute();

    foreach ($prep as $key) {
        extract($key);
        echo "<tr><td>$pac_name</td>";
        echo "<td><a href=\"delete_pacientes.php?use_id=$pac_id\"><i class=\"material-icons red-text\">clear</i></a></td>";
        echo "<td><a href=\"form_update_pacientes.php?pac_id=$pac_id\"><i class=\"material-icons green-text\">refresh</i></a></td></tr>";
    }
} catch (PDOException $e) {
    echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
