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
   <title>Médicos</title>
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
         <a href="clientes.php" class="brand-logo">Médicos</a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
            <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
            <li><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
            <li class="active"><a href="form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
            <li><a href="../pacientes/form_pacientes.php">P<i class="material-icons left">local_hotel</i>acientes</a></li>
            <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
            <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
         </ul>
      </div>
   </nav>

   <ul class="sidenav" id="mobile-demo">
      <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
      <li><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
      <li class="active"><a href="form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
      <li><a href="../pacientes/form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
      <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
      <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
   </ul>

   <main>
      <div class="container">
         <div class="card-panel" style="margin-top:25px">
            <h1 class="flow-text" style="margin-top:5px">Registrar Médico</h1>
            <label>Adicionar um novo médico</label>
            <div class="divider"></div>

            <form style="margin-top:25px" action="insert_medicos.php" method="post">
               <div class="row">
                  <div class="input-field col s12">
                     <label>Nome</label>
                     <input placeholder="Nome" id="nome" type="text" name="med_name" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do médico.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s12">
                     <label>Especialidade</label>
                     <input placeholder="Especialidade" id="esp" type="text" name="med_esp" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com a especialidade do médico.')" oninput="setCustomValidity('')" required>
                  </div>
               </div>

               <input class="btn indigo darken-4" type="submit" value="Registrar" />
            </form>

            <h2 class="flow-text">Médicos</h2>
            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Nome</th>
                     <th>Especialidade</th>
                     <th>Remover</th>
                     <th>Alterar</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include 'select_medicos.php' ?>
               </tbody>
            </table>
         </div>
      </div>
   </main>

   <footer class="page-footer indigo darken-4">
      <div class="container">
         <div class="row">
            <div class="col l6 s12">
               <h5 class="white-text">Contato</h5>
               <p class="grey-text text-lighten-4">
                  Email: <?= $_SESSION['Login']['email'] ?>
               </p>
               <p class="grey-text text-lighten-4">
                  Usuário: <?= $_SESSION['Login']['name'] ?>
               </p>
            </div>
            <div class="col l4 offset-l2 s12">
               <h5 class="white-text">Links</h5>
               <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/lucas8bit">Facebook</a></li>
                  </li>
                  <li><a class="grey-text text-lighten-3" href="https://twitter.com/lucasnaja0">Twitter</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="footer-copyright">
         <div class="container">
            © 2019 Lucas Bittencourt
         </div>
      </div>
   </footer>

   <script type="text/javascript" src="../../src/materialize.min.js"></script>
   <script type="text/javascript">
      M.Sidenav.init(document.querySelectorAll('.sidenav'))
   </script>
</body>

</html>