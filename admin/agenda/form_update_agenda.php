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
    <title>Atualizar Agenda</title>
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
            <a href="clientes.php" class="brand-logo">Atualizar Agenda</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="../exit.php"><i class="material-icons left">close</i>Sair</a></li>
    </ul>

    <main>
        <div class="container">
            <div class="card-panel" style="margin-top:25px">
                <h1 class="flow-text" style="margin-top:5px">Atualizar Agenda</h1>
                <label>Atualizar uma agenda</label>
                <div class="divider"></div>

                <?php
                include '../../conexao.php';

                $id = $_GET['sch_id'];
                $prep = $pdo->prepare(
                    "SELECT * FROM schedule s
                    INNER JOIN medics m on m.med_id = s.med_id
                    INNER JOIN pacients p on p.pac_id = s.pac_id
                    WHERE s.sch_id=:id
                    ORDER BY s.sch_date, s.sch_time DESC"
                );

                $prep->bindValue(":id", $id);
                $prep->execute();
                $data = $prep->fetchAll();

                extract($data[0]);
                $m_id = $data[0]['med_id'];
                $p_id = $data[0]['pac_id']
                ?>

                <form action="update_agenda.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <label>ID</label>
                            <input value="<?= $sch_id ?>" name="id" type="text" class="datepicker" readonly>
                        </div>

                        <div class="input-field col s12 m6">
                            <label>Data</label>
                            <input value="<?= $sch_date ?>" name="sch_date" type="text" class="datepicker" required>
                        </div>

                        <div class="input-field col s12 m6">
                            <label>Horário</label>
                            <input value="<?= $sch_time ?>" name="sch_time" type="text" class="timepicker" required>
                        </div>

                        <div class="input-field col s12 m6">
                            <select name="med_id" required>
                                <?php
                                $prep = $pdo->prepare("SELECT med_id, med_name FROM medics");

                                if ($prep->execute()) {
                                    $data = $prep->fetchAll();
                                }

                                foreach ($data as $key) {
                                    extract($key);
                                    echo "<option value=\"$med_id\" " . ($med_id === $m_id ? "selected" : "") . ">$med_name</option>";
                                }
                                ?>
                            </select>
                            <label>Médicos</label>
                        </div>

                        <div class="input-field col s12 m6">
                            <select name="pac_id" required>
                                <?php
                                $prep = $pdo->prepare("SELECT pac_id, pac_name FROM pacients");

                                if ($prep->execute()) {
                                    $data = $prep->fetchAll();
                                }

                                foreach ($data as $key) {
                                    extract($key);
                                    echo "<option value=\"$pac_id\" " . ($pac_id === $p_id ? "selected" : "") . ">$pac_name</option>";
                                }
                                ?>
                            </select>
                            <label>Pacientes</label>
                        </div>
                    </div>

                    <input class="btn indigo darken-4" type="submit" value="Atualizar" />
                    <a class="btn indigo darken-4" href="form_agenda.php">Cancelar</a>
                </form>
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
        M.Datepicker.init(document.querySelectorAll('.datepicker'), {
            format: 'yyyy-mm-dd'
        })
        M.Timepicker.init(document.querySelectorAll('.timepicker'))
        M.FormSelect.init(document.querySelectorAll('select'))
    </script>
</body>

</html>