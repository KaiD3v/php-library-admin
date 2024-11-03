<h1 class="text-center my-4">Books Page</h1>

<?php
if (isset($_SESSION['email'])) {
    echo "
    <nav class='navbar navbar-expand-lg navbar-light bg-light mb-4'>
        <div class='container'>
            <ul class='navbar-nav me-auto'>
                <li class='nav-item px-4'>
                    <a href='?page=new-book' class='btn btn-primary'>Adicionar Livro</a>
                </li>
                <li class='nav-item'>
                    <a href='?page=rented-books' class='btn btn-primary'>Livros Alugados</a>
                </li>
            </ul>
        </div>
    </nav>
    ";
}
?>

<div class="row g-4">
    <?php
    $sql = "SELECT * FROM books";
    $res = $pdo->query($sql);
    $qtd = $res->rowCount();

    echo "
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Alugar Livro</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <p>Você está prestes a alugar um livro. Confirme sua ação.</p>
                    <h1 id='modalBookTitle'></h1> <!-- Atualizado via JS -->
                    
                    <form id='rentForm' action='?page=book-actions' method='POST'>
                        <input type='hidden' id='modalBookId' name='book_id' value=''> <!-- Campo oculto para armazenar o ID do livro -->
                        <input type='hidden' value='rent' name='action'/>
                        
                        <div class='mb-3'>
                            <label for='rented_books_qtd' class='form-label'>Selecione a quantidade:</label>
                            <input type='number' name='rented_books_qtd' id='rented_books_qtd' class='form-control' min='1' required/>
                        </div>
                        <div class='mb-3'>
                            <label for='customer_id' class='form-label'>Selecione um cliente:</label>
                            <select id='customer_id' name='customer_id' class='form-select' required>
                                <option value=''>Selecione um cliente</option>";

    $sql2 = "SELECT * FROM customers";
    $res2 = $pdo->query($sql2);
    while ($customer = $res2->fetchObject()) {
        echo "<option value='{$customer->id}'>{$customer->name}</option>";
    }

    echo "                      </select>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                            <button type='submit' class='btn btn-primary'>Confirmar Aluguel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
";

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
                            <button 
                                data-bs-toggle='modal' 
                                data-bs-target='#exampleModal' 
                                data-title='{$row->title}' 
                                data-id='{$row->id}' 
                                class='btn btn-success'>Alugar
                            </button>
                            <a href='?page=delete-book&id={$row->id}' class='btn btn-danger' onclick='return confirm(\"Você tem certeza que deseja deletar este livro?\")'>Deletar</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    } else if ($qtd > 0 and !isset($_SESSION["email"])) {
        while ($row = $res->fetchObject()) {
            echo "
                <div class='col-12 col-sm-6 col-lg-4'>
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

<script>
    const modal = document.getElementById('exampleModal');
    modal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget; // Botão que abriu o modal

        const title = button.getAttribute('data-title');
        const id = button.getAttribute('data-id');

        const modalTitle = modal.querySelector('.modal-title');
        const modalBodyInput = modal.querySelector('#modalBookId'); // Corrigido para pegar o input pelo ID
        modalTitle.textContent = 'Alugar Livro: ' + title; // Atualiza o título
        modalBodyInput.value = id; // Atualiza o input com o ID do livro
    });
</script>