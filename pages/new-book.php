<?php
if ($_SESSION['email'] == null) {
    header('Location: ?page=home');
}
?>

<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <form action="?page=book-actions" method="post" class="p-4 rounded shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Adicionar Administrador</h2>

        <input type="hidden" name="action" value="create">

        <div class="form-floating mb-3">
            <input type="text" name="title" placeholder="Digite o nome do usuário" class="form-control">
            <label for="title">Title</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="description" class="form-control" id="description" placeholder="email@exemplo.com" required>
            <label for="description">Description</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" name="cover_img" class="form-control" id="cover_img" placeholder="Digite uma senha" required>
            <label for="cover_img">Cover Image</label>
        </div>

        <div class="form-floating mb-4">
            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Digite uma senha" required>
            <label for="quantity">Quantidade</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>