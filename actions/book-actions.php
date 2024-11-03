<?php

switch ($_REQUEST["action"]) {
    case 'create':
        $title = $_POST['title'];
        $description = $_POST['description'];
        $coverImg = $_POST['cover_img'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO books (title, description, cover_img, quantity) VALUES (:title, :description, :coverImg, :quantity)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':coverImg', $coverImg);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Livro cadastrado com sucesso.')</script>";
            echo "<script>location.href='?page=books'</script>";
        } else {
            echo "<script>alert('Houve um erro ao cadastrar livro.')</script>";
            echo "<script>location.href='?page=new-user'</script>";
        }
        break;
    case 'update':
        # code...
        break;
    case 'delete':
        # code...
        break;
}
