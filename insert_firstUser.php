<?php
try {
    include 'conexao.php';

    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_DEFAULT);

    if ($password === $newPassword) {
        $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $prep = $pdo->prepare("INSERT INTO users (use_name, use_email, use_password) VALUES (:userName, :email, :userPassword)");

        $prep->bindValue(':userName', $name);
        $prep->bindValue(':email', $email);
        $prep->bindValue(':userPassword', MD5($password));

        $prep->execute();
    }

    header('Location: ./');
} catch (PDOException $e) {
    echo $e->getMessage();
}
