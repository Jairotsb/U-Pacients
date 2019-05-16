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
    <title>Atualizar Usuário</title>
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
            <a href="clientes.php" class="brand-logo">Atualizar Usuário</a>
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
                <h1 class="flow-text" style="margin-top:5px">Atualizar Usuário</h1>
                <label>Atualizar usuário selecionado</label>
                <div class="divider"></div>

                <?php
                include '../../conexao.php';

                $id = $_GET['use_id'];
                $prep = $pdo->prepare("SELECT * FROM users WHERE use_id=:id");

                $prep->bindValue(':id', $id);
                $prep->execute();
                $data = $prep->fetchAll();

                extract($data[0]);
                ?>

                <form style="margin-top:25px" action="update_usuarios.php" method="post">
                    <div class="row mb-0">
                        <div class="input-field col s12">
                            <label>ID</label>
                            <input value="<?= $use_id ?>" type="text" name="id" readonly>
                        </div>

                        <div class="input-field col s12">
                            <label>Nome</label>
                            <input value="<?= $use_name ?>" placeholder="Nome" type="text" name="use_name" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o seu nome.')" oninput="setCustomValidity('')" required>
                        </div>

                        <div class="input-field col s12">
                            <label>E-mail</label>
                            <input value="<?= $use_email ?>" placeholder="E-mail" type="email" name="use_email" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com seu e-mail.')" oninput="setCustomValidity('')" required>
                        </div>

                        <div class="input-field col s12">
                            <label>Senha</label>
                            <input placeholder="Senha" id="senha" type="password" name="use_password" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com sua senha.')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <input class="btn indigo darken-4" type="submit" value="Atualizar" />
                    <a href="form_usuarios.php" class="btn indigo darken-4">Cancelar</a>
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
    </script>
</body>

</html>