<?php
if (!isset($_SESSION["email"])) {
    header('Location: ?page=home');
}
?>

<h1>Livros Alugados</h1>
<?php
$sql = "SELECT rentals.*, books.title AS book_title, customers.name AS customer_name FROM rentals 
        JOIN books ON rentals.book_id = books.id 
        JOIN customers ON rentals.customer_id = customers.id";
$res = $pdo->query($sql);
$qtd = $res->rowCount();

if ($qtd > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Livro</th>
                <th>Quantidade</th>
                <th>Data de Aluguel</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($rental = $res->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$rental['id']}</td>";
        echo "<td>{$rental['customer_name']}</td>";
        echo "<td>{$rental['book_title']}</td>";
        echo "<td>{$rental['rented_books_qtd']}</td>";
        echo "<td>{$rental['rented_at']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p class='alert alert-warning'>Não há alugueis registrados.</p>";
}
?>
