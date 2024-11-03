<?php
if ($_SESSION['email'] == null) {
    header('Location: ?page=home');
    exit();
}
?>

<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <form action="?page=users-actions" method="post" class="p-4 rounded shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Adicionar Usuário</h2>

        <input type="hidden" name="action" value="create">

        <div class="form-floating mb-3">
            <input type="text" name="name" id="name" placeholder="Digite o nome do usuário" class="form-control">
            <label for="name">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
            <label for="email">E-mail</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>