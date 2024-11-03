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
            echo "<script>location.href='?page=new-book'</script>";
        }
        break;
    case 'update':
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $coverImg = $_POST['cover_img'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE books SET title = :title, description = :description, cover_img = :coverImg, quantity = :quantity WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':coverImg', $coverImg);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Livro atualizado com sucesso.')</script>";
            echo "<script>location.href='?page=books'</script>";
        } else {
            echo "<script>alert('Houve um erro ao atualizar livro.')</script>";
            echo "<script>location.href='?page=edit-book&id={$id}'</script>";
        }
        break;
    case 'delete':
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_REQUEST["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Livro deletado com sucesso.')</script>";
            echo "<script>location.href='?page=books'</script>";
        } else {
            echo "<script>alert('Houve um erro ao deletar usuário.')</script>";
            echo "<script>location.href='?page=books'</script>";
        }
        break;
    case 'rent':
        $customerId = $_POST['customer_id'];
        $bookId = $_POST['book_id'];
        $rentedBooksQtd = $_POST['rented_books_qtd'];

        // Verificar se a quantidade disponível é suficiente
        $sqlCheck = "SELECT quantity FROM books WHERE id = :bookId";
        $stmtCheck = $pdo->prepare($sqlCheck);
        $stmtCheck->bindParam(':bookId', $bookId);
        $stmtCheck->execute();
        $book = $stmtCheck->fetchObject();

        if ($book && $book->quantity >= $rentedBooksQtd) {
            // Inserir registro na tabela rentals
            $sql = "INSERT INTO rentals (customer_id, book_id, rented_books_qtd) VALUES (:customerId, :bookId, :rentedBooksQtd)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':customerId', $customerId);
            $stmt->bindParam(':bookId', $bookId);
            $stmt->bindParam(':rentedBooksQtd', $rentedBooksQtd);

            if ($stmt->execute()) {
                // Atualizar a quantidade de livros na tabela books
                $newQuantity = $book->quantity - $rentedBooksQtd;
                $sqlUpdate = "UPDATE books SET quantity = :newQuantity WHERE id = :bookId";
                $stmtUpdate = $pdo->prepare($sqlUpdate);
                $stmtUpdate->bindParam(':newQuantity', $newQuantity);
                $stmtUpdate->bindParam(':bookId', $bookId);

                if ($stmtUpdate->execute()) {
                    echo "<script>alert('Livro alugado com sucesso.')</script>";
                } else {
                    echo "<script>alert('Houve um erro ao atualizar a quantidade do livro.')</script>";
                }

                echo "<script>location.href='?page=books'</script>";
            } else {
                echo "<script>alert('Houve um erro ao alugar livro.')</script>";
                echo "<script>location.href='?page=books'</script>";
            }
        } else {
            echo "<script>alert('Quantidade insuficiente de livros disponíveis para aluguel.')</script>";
            echo "<script>location.href='?page=books'</script>";
        }

        break;
}
