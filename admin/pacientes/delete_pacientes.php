<?php
try {
   include '../../conexao.php';

   $id = $_GET['pat_id'];

   $prep = $pdo->prepare("DELETE FROM patients WHERE pat_id=:id");
   $prep->bindValue(':id', $id);

   $prep->execute();

   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   header('Location: form_pacientes.php');
}
