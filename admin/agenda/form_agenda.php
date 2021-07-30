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
   <title>Agenda</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../src/index.css">
   <link type="text/css" rel="stylesheet" href="../../src/materialize.min.css">
   <link rel="icon" href="../../src/image/logo.png">
   <style>
      .no-bg {
         background: 0
      }

      .datepicker-date-display {
         background-color: #1a237e
      }

      .datepicker-day-button:focus {
         color: white !important;
         background-color: #1a237e
      }

      .select-dropdown li>span {
         color: rgba(0, 0, 0, .9)
      }

      .datepicker-done,
      .datepicker-cancel,
      .timepicker-close {
         color: #1a237e !important
      }

      .is-today {
         color: #1a237e !important
      }

      td.is-selected,
      .month-prev:active,
      .month-prev:focus,
      .month-next:active,
      .month-next:focus,
      .timepicker-digital-display {
         background-color: #1a237e !important
      }

      td.is-selected.is-today {
         color: white !important
      }

      .timepicker-canvas-bg,
      .timepicker-canvas-bearing {
         fill: cyan !important
      }

      .timepicker-canvas line {
         stroke: #1a237e
      }

      .timepicker-tick:hover {
         background-color: #1a237e
      }

      .datepicker-controls .select-month input {
         width: 80px
      }
   </style>
</head>

<body>
   <nav class="indigo darken-4">
      <div class="nav-wrapper">
         <a href="clientes.php" class="brand-logo">Agenda</a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
            <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
            <li class="active"><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
            <li><a href="../medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
            <li><a href="../pacientes/form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
            <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
            <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
         </ul>
      </div>
   </nav>

   <ul class="sidenav" id="mobile-demo">
      <li><a href="../home.php"><i class="material-icons left">home</i>Home</a></li>
      <li><a href="../agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
      <li><a href="../medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
      <li><a href="../pacientes/form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
      <li><a href="../usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
      <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
   </ul>

   <main>
      <div class="container">
         <div class="card-panel" style="margin-top:25px">
            <h1 class="flow-text" style="margin-top:5px">Adicionar uma Agenda</h1>
            <label>Adicionar uma nova agenda</label>
            <div class="divider"></div>

            <form action="insert_agenda.php" method="post">
               <div style="margin-top:15px" class="row">
                  <div class="input-field col s12 m6">
                     <label>Data</label>
                     <input placeholder="Data" name="date" type="text" class="datepicker" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Horário</label>
                     <input placeholder="Horário" name="time" type="text" class="timepicker" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="med_id" required>
                        <?php
                        include '../../conexao.php';
                        $prep = $pdo->prepare("SELECT med_id, med_name FROM medics");

                        if ($prep->execute()) {
                           $data = $prep->fetchAll();
                        }

                        foreach ($data as $key) {
                           extract($key);
                           echo "<option value=\"$med_id\">$med_name</option>";
                        }
                        ?>
                     </select>
                     <label>Médicos</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="pat_id" required>
                        <?php
                        $prep = $pdo->prepare("SELECT pat_id, pat_name FROM patients");

                        if ($prep->execute()) {
                           $data = $prep->fetchAll();
                        }

                        foreach ($data as $key) {
                           extract($key);
                           echo "<option value=\"$pat_id\">$pat_name</option>";
                        }
                        ?>
                     </select>
                     <label>Pacientes</label>
                  </div>
               </div>

               <input class="btn indigo darken-4" type="submit" value="Adicionar" />
            </form>

            <h2 class="flow-text">Agendas marcadas</h2>
            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Data</th>
                     <th>Horário</th>
                     <th>Médico</th>
                     <th>Paciente</th>
                     <th>Remover</th>
                     <th>Alterar</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include 'select_agenda.php' ?>
               </tbody>
            </table>
         </div>
      </div>
   </main>

   <?php include_once("../components/footer.php")?>

   <script type="text/javascript" src="../../src/materialize.min.js"></script>
   <script type="text/javascript">
      M.Sidenav.init(document.querySelectorAll('.sidenav'))
      M.Datepicker.init(document.querySelectorAll('.datepicker'), {
         format: 'yyyy-mm-dd'
      })
      M.Timepicker.init(document.querySelectorAll('.timepicker'))
      M.FormSelect.init(document.querySelectorAll('select'))
   </script>
</body>

</html>