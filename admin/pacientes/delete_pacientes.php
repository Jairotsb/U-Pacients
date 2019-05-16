<?php
try {
   include '../../conexao.php';

   $id = $_GET['use_id'];

   $prep = $pdo->prepare("DELETE FROM pacients WHERE pac_id='$id'");

   $prep->execute();

   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   header('Location: form_pacientes.php');
}
