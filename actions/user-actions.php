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

    case "delete":
        $sql = "DELETE FROM customers WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_REQUEST["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário deletado com sucesso.')</script>";
            echo "<script>location.href='?page=users'</script>";
        } else {
            echo "<script>alert('Houve um erro ao deletar usuário.')</script>";
            echo "<script>location.href='?page=users'</script>";
        }

        break;
}
