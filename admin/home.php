<?php
session_start();

if (!$_SESSION['Login']) {
    header("Location: ..");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página inicial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/index.css">
    <link type="text/css" rel="stylesheet" href="../src/materialize.min.css">
    <link rel="icon" href="../src/image/logo.png">
</head>

<body>
    <nav class="indigo darken-4">
        <div class="nav-wrapper">
            <a href="#!" style="margin-left: 10px" class="brand-logo">Home</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="home.php"><i class="material-icons left">home</i>Home</a></li>
                <li><a href="agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
                <li><a href="medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
                <li><a href="pacientes/form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
                <li><a href="usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
                <li><a href="exit.php"><i class="material-icons left">close</i>Sair</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="agenda/form_agenda.php">Agenda</a></li>
        <li><a href="medicos/form_medicos.php">Médicos</a></li>
        <li><a href="pacientes/form_pacientes.php">Pacientes</a></li>
        <li><a href="usuarios/form_usuarios.php">Usuários</a></li>
        <li><a href="exit.php">Sair</a></li>
    </ul>

    <main>
        

        
    </main>

    <?php include_once("./components/footer.php")?>

    <script src="../src/materialize.min.js"></script>
    <script>
        M.Sidenav.init(document.querySelectorAll('.sidenav'))
        M.Collapsible.init(document.querySelectorAll('.collapsible'))
    </script>
</body>

</html>