<?php
try {
   include '../../conexao.php';

   $nome = filter_input(INPUT_POST, 'med_name', FILTER_DEFAULT);
   $esp = filter_input(INPUT_POST, 'med_esp', FILTER_DEFAULT);

   $prep = $pdo->prepare("INSERT INTO medics (med_name, med_esp) VALUE (:nome, :especialidade)");

   $prep->bindValue(':nome', $nome);
   $prep->bindValue(':especialidade', $esp);

   $prep->execute();
   header('Location: form_medicos.php');
} catch (PDOException $e) {
   echo $e->getMessage();
}
