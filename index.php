<?php
session_start();
if (isset($_SESSION['Login'])) {
    header('Location: admin/home.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/index.css">
    <link type="text/css" rel="stylesheet" href="src/materialize.min.css">
    <link rel="icon" href="src/image/logo.png">
</head>

<body>
    <?php
    include 'conexao.php';
    $prep = $pdo->prepare('SELECT * FROM users');

    if ($prep->execute()) {
        $data = $prep->fetchAll();
    }
    ?>
    <nav class="indigo darken-4">
        <div class="nav-wrapper">
            <a href="./" class="brand-logo center"><?php echo $prep->rowCount() > 0 ? 'Login' : 'Registro' ?></a>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="card-panel">
                    <?php
                    if ($prep->rowCount() > 0) :
                        ?>
                        <h6>Seja bem-vindo. Logue com seu e-mail e senha abaixo.</h6>
                        <form action="login.php" method="post">
                            <div class="input-field">
                                <label>E-mail</label>
                                <input class="validate" type="email" name="email" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com seu e-mail.')" oninput="setCustomValidity('')" required />
                            </div>

                            <div class="input-field">
                                <label>Senha</label>
                                <input class="validate" type="password" name="senha" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com sua senha.')" oninput="setCustomValidity('')" required />
                            </div>
                            <input class="btn indigo darken-4" type="submit" value="Logar" />
                        </form>
                    <?php
                else :
                    ?>
                        <h6>Página de Registro</h6>
                        <form action="insert_firstUser.php" method="post">
                            <div class="row">
                                <div class="input-field col s12 m-0">
                                    <label>Nome</label>
                                    <input class="validate" type="text" name="name" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com seu nome.')" oninput="setCustomValidity('')" required>
                                </div>

                                <div class="input-field col s12 m-0">
                                    <label>E-mail</label>
                                    <input class="validate" type="email" name="email" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com seu e-mail.')" oninput="setCustomValidity('')" required>
                                </div>

                                <div class="input-field col s12 m6 m-0">
                                    <label>Senha</label>
                                    <input class="validate" type="password" name="password" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com sua senha.')" oninput="setCustomValidity('')" required>
                                </div>

                                <div class="input-field col s12 m6 m-0">
                                    <label>Repita a senha</label>
                                    <input class="validate" type="password" name="newPassword" oninvalid="this.setCustomValidity('Por favor, preencha esse campo com sua senha.')" oninput="setCustomValidity('')" required>
                                </div>
                                <input class="btn indigo darken-4" type="submit" value="Registrar">
                            </div>
                        </form>
                    <?php
                endif;
                ?>
                </div>
            </div>
        </div>
    </main>

    <?php include_once("admin/components/footer.php")?>

    <script type="text/javascript" src="src/materialize.min.js"></script>
</body>

</html>