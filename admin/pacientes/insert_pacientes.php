<?php
try {
   include '../../conexao.php';

   $name = filter_input(INPUT_POST, 'pat_name', FILTER_DEFAULT);

   $prep = $pdo->prepare("INSERT INTO patients (pat_name) VALUE (:userName)");

   $prep->bindValue(':userName', $name);

   $prep->execute();
   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo $e->getMessage();
}
