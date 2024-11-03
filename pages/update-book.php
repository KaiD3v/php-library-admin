<?php
if (!isset($_SESSION["email"])) {
    header('Location: ?page=home');
    exit();
}

// Verifique se 'id' está presente na requisição e é um número
if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
    echo "<script>alert('ID do livro inválido.');</script>";
    echo "<script>location.href='?page=books';</script>";
    exit();
}

$id = intval($_REQUEST['id']); // Converta o ID para um número inteiro

$sql = "SELECT * FROM books WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ); // Use PDO::FETCH_OBJ para obter um objeto

if (!$row) {
    echo "<script>alert('Livro não encontrado.');</script>";
    echo "<script>location.href='?page=books';</script>";
    exit();
}
?>

<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <form action="?page=book-actions" method="post" class="p-4 rounded shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Editar Livro</h2>

        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row->id); ?>">

        <div class="form-floating mb-3">
            <input type="text" name="title" value="<?php echo htmlspecialchars($row->title); ?>" placeholder="Digite o nome do livro" class="form-control" required>
            <label for="title">Title</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="description" value="<?php echo htmlspecialchars($row->description); ?>" class="form-control" id="description" placeholder="Descrição do livro" required>
            <label for="description">Description</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" name="cover_img" value="<?php echo htmlspecialchars($row->cover_img); ?>" class="form-control" id="cover_img" placeholder="URL da imagem de capa" required>
            <label for="cover_img">Cover Image</label>
        </div>

        <div class="form-floating mb-4">
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($row->quantity); ?>" class="form-control" id="quantity" placeholder="Quantidade de livros" required>
            <label for="quantity">Quantidade</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>