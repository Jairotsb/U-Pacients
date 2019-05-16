<?php
try {
   include '../../conexao.php';

   $nome = filter_input(INPUT_POST, 'med_name', FILTER_DEFAULT);

   $prep = $pdo->prepare("INSERT INTO medics (med_name) VALUE (:nome)");

   $prep->bindValue(':nome', $nome);

   $prep->execute();
   header('Location: form_medicos.php');
} catch (PDOException $e) {
   echo $e->getMessage();
}
