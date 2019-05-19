<?php
try {
   include '../../conexao.php';

   $prep = $pdo->prepare("SELECT * FROM medics");

   $prep->execute();

   foreach ($prep as $key) {
      extract($key);
      echo "<tr><td>$med_name</td>";
      echo "<td>$med_esp</td>";
      echo "</td><td><a href=\"delete_medicos.php?med_id=$med_id\"><i class=\"material-icons red-text\">clear</i></a></td>";
      echo "<td><a href=\"form_update_medicos.php?med_id=$med_id\"><i class=\"material-icons green-text\">refresh</i></a></td></tr>";
   }
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
