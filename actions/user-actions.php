<?php

switch ($_REQUEST['action']) {
    case "create":
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = 'INSERT INTO customers (name, email) VALUES (:name, :email)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário cadastrado com sucesso.')</script>";
            echo "<script>location.href='?page=users'</script>";
        } else {
            echo "<script>alert('Houve um erro ao cadastrar usuário.')</script>";
            echo "<script>location.href='?page=new-user'</script>";
        }
        break;
    case "update":
        // Lógica para atualizar
        break;

    case "delete":
        // Lógica para deletar
        break;
}
