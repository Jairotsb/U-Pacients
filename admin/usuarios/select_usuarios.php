<?php
try {
    include '../../conexao.php';

    $prep = $pdo->prepare("SELECT * FROM users");

    $prep->execute();

    foreach ($prep as $key) {
        extract($key);
        echo "<tr><td>$use_id</td>";
        echo "<td>$use_name</td>";
        echo "<td>$use_email</td>";
        echo "<td><a href=\"delete_usuarios.php?use_id=$use_id\"><i class=\"material-icons red-text\">clear</i></a></td>";
        echo "<td><a href=\"form_update_usuarios.php?use_id=$use_id\"><i class=\"material-icons green-text\">refresh</i></a></td></tr>";
    }
} catch (PDOException $e) {
    echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
