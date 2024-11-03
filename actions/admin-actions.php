<?php

switch ($_REQUEST['action']) {
    case 'create':
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = 'INSERT INTO admins (username, email, password) VALUES (:username, :email, :password)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "<script>alert('Administrador cadastrado com sucesso.')</script>";
            echo "<script>location.href='?page=admins'</script>";
        } else {
            echo "<script>alert('Houve um erro ao cadastrar administrador.')</script>";
            echo "<script>location.href='?page=new-admin'</script>";
        }
        break;
    case 'read':
        # code   
        break;
    case 'login':
        # code   
        break;
}
