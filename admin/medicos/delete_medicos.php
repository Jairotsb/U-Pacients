<?php
try {
   include '../../conexao.php';

   $id = $_GET['med_id'];

   $prep = $pdo->prepare('DELETE FROM medics WHERE med_id=:id');
   $prep->bindValue(':id', $id);

   $prep->execute();

   header('Location: form_medicos.php');
} catch (PDOException $e) {
   header('Location: form_medicos.php');
}
