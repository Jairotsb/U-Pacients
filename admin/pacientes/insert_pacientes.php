<?php
try {
   include '../../conexao.php';

   $name = filter_input(INPUT_POST, 'pat_name', FILTER_DEFAULT);
   $cpf =  filter_input(INPUT_POST, 'pat_cpf', FILTER_DEFAULT);
   $rg =  filter_input(INPUT_POST, 'pat_rg', FILTER_DEFAULT);
   $age =  filter_input(INPUT_POST, 'pat_age', FILTER_DEFAULT);

   $prep = $pdo->prepare("INSERT INTO patients (pat_name, pat_rg, pat_cpf, pat_age) VALUE (:userName, :userRg, :userCpf, :userAge)");

   $prep->bindValue(':userName', $name);
   $prep->bindValue(':userRg', $rg);
   $prep->bindValue(':userCpf', $cpf);
   $prep->bindValue(':userAge', $age);

   $prep->execute();
   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo $e->getMessage();
}
