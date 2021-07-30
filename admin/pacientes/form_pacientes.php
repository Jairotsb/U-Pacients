<?php
session_start();

if (!isset($_SESSION['Login'])) {
   header("Location: ..");
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Pacientes</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../src/index.css">
   <link type="text/css" rel="stylesheet" href="../../src/materialize.min.css">
   <link rel="icon" href="../../src/image/logo.png">
   <style>
      .no-bg {
         background: 0
      }
   </style>
</head>

<body>
   <nav class="indigo darken-4">
      <div class="nav-wrapper">
         <a href="clientes.php" class="brand-logo">Pacientes</a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
            <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
            <li><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
            <li><a href="../medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
            <li class="active"><a href="form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
            <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
            <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
         </ul>
      </div>
   </nav>

   <ul class="sidenav" id="mobile-demo">
      <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
      <li><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
      <li><a href="../medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
      <li class="active"><a href="form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
      <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
      <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
   </ul>

   <main>
      <div class="container">
         <div class="card-panel" style="margin-top:25px">
            <h1 class="flow-text" style="margin-top:5px">Registrar Paciente</h1>
            <label>Adicionar um novo paciente</label>
            <div class="divider"></div>

            <form style="margin-top:25px" action="insert_pacientes.php" method="post">
               <div class="row mb-0">
                  <div class="input-field col s12">
                     <label>Nome</label>
                     <input placeholder="Nome" id="nome" type="text" name="pat_name" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do paciente.')" oninput="setCustomValidity('')" required>
                  </div>
               </div>
               <div class="row mb-0">
                  <div class="input-field col s12">
                     <label>Cpf</label>
                     <input placeholder="Cpf" id="cpf" type="text" name="pat_cpf" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o cpf do paciente.')" oninput="setCustomValidity('')" required>
                  </div>
               </div>
               <div class="row mb-0">
                  <div class="input-field col s12">
                     <label>RG</label>
                     <input placeholder="RG" id="rg" type="text" name="pat_rg" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o rg do paciente.')" oninput="setCustomValidity('')" required>
                  </div>
               </div>
               <div class="row mb-0">
                  <div class="input-field col s12">
                     <label>Idade</label>
                     <input placeholder="Idade" id="age" type="text" name="pat_age" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com a idade do paciente.')" oninput="setCustomValidity('')" required>
                  </div>
               </div>

               <input class="btn indigo darken-4" type="submit" value="Registrar" />
            </form>

            <h2 class="flow-text">Pacientes</h2>
            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Nome</th>
                     <th>Remover</th>
                     <th>Alterar</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include 'select_pacientes.php' ?>
               </tbody>
            </table>
         </div>
      </div>
   </main>

   <?php include_once("../components/footer.php")?>

   
   <script type="text/javascript" src="../../src/materialize.min.js"></script>
   <script type="text/javascript">
      M.Sidenav.init(document.querySelectorAll('.sidenav'))
   </script>
</body>

</html>