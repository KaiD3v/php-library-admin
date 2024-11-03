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