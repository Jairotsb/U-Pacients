<?php
try {
   include '../../conexao.php';

   $name = filter_input(INPUT_POST, 'pac_name', FILTER_DEFAULT);

   $prep = $pdo->prepare("INSERT INTO pacients (pac_name) VALUE (:userName)");

   $prep->bindValue(':userName', $name);

   $prep->execute();
   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo $e->getMessage();
}
