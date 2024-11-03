<h1 class="text-center my-4">Books Page</h1>

<?php
if (isset($_SESSION['email'])) {
    echo "
    <nav class='navbar navbar-expand-lg navbar-light bg-light mb-4'>
        <div class='container'>
            <ul class='navbar-nav me-auto'>
                <li class='nav-item'>
                    <a href='?page=new-book' class='btn btn-primary'>Adicionar Livro</a>
                </li>
            </ul>
        </div>
    </nav>
    ";
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alugar Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Você está prestes a alugar um livro. Confirme sua ação.</p>
                <!-- Aqui você pode adicionar mais detalhes sobre o livro que está sendo alugado -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Confirmar Aluguel</button>
            </div>
        </div>
    </div>
</div>

<div class="row g-4"> <!-- Gutter para espaçamento entre colunas e linhas -->
    <?php
    $sql = "SELECT * FROM books";
    $res = $pdo->query($sql);
    $qtd = $res->rowCount();

    if ($qtd > 0 and isset($_SESSION['email'])) {
        while ($row = $res->fetchObject()) {
            echo "
            <div class='col-12 col-sm-6 col-lg-4'>
                <div class='card h-100 shadow-sm'>
                    <img src='{$row->cover_img}' class='card-img-top' alt='Imagem de capa do livro' style='height: 300px; object-fit: cover;'>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$row->title}</h5>
                        <p class='card-text flex-grow-1'>{$row->description}</p>
                        <p><b>Quantidade:</b> {$row->quantity}</p>
                        <div class='mt-3'>
                            <a href='?page=edit-book&id={$row->id}' class='btn btn-warning'>Editar</a>
                            <button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-success'>Alugar</button>
                            <a href='?page=delete-book&id={$row->id}' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja deletar este livro?\")'>Deletar</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    } else if ($qtd > 0 and !isset($_SESSION["email"])) {
        while ($row = $res->fetchObject()) {
            echo "
                <div class='col-12 col-sm-6 col-lg-4'> <!-- Responsivo: 1 por linha em mobile, 2 em tablets, 3 em desktops -->
                    <div class='card h-100 shadow-sm'>
                        <img src='{$row->cover_img}' class='card-img-top' alt='Imagem de capa do livro' style='height: 300px; object-fit: cover;'>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title'>{$row->title}</h5>
                            <p class='card-text flex-grow-1'>{$row->description}</p>
                            <p><b>Quantidade:</b> {$row->quantity}</p>
                            
                        </div>
                    </div>
                </div>";
        }
    } else {
        echo "<p class='alert alert-danger'>Não há nenhum livro disponível.</p>";
    }
    ?>
</div>