<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <form action="?page=admin-actions" method="post" class="p-4 rounded shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Entrar</h2>
        <input type="hidden" name="action" value="login">
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
            <label for="email">E-mail</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" name="password" class="form-control" id="password" placeholder="Digite uma senha" required>
            <label for="password">Senha</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>