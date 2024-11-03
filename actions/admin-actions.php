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
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = 'SELECT * FROM admins WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $admin['password'])) {
                    session_start();
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['email'] = $admin['email'];

                    echo "<script>alert('Login realizado com sucesso!');</script>";
                    echo "<script>location.href='?page=admins';</script>";
                } else {
                    echo "<script>alert('Senha incorreta!');</script>";
                    echo "<script>location.href='?page=login';</script>";
                }
            } else {
                echo "<script>alert('Usuário não encontrado!');</script>";
                echo "<script>location.href='?page=login';</script>";
            }
        }
        break;
}
