<?php
if (!isset($_SESSION["email"])) {
    header('Location: ?page=home');
}
?>

<h1>User Page</h1>
<table class='table table-hover'>
    <?php
    $sql = "SELECT * FROM customers";

    $res = $pdo->query($sql);

    $qtd = $res->rowCount();

    if ($qtd > 0) {
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Name</th>";
        echo "<th>E-Mail</th>";
        echo "<th>Actions</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = $res->fetchObject()) {
            echo "<tr>";
            echo "<td>$row->id</td>";
            echo "<td>$row->name</td>";
            echo "<td>$row->email</td>";
            echo "<td><button onclick=\"location.href='?page=users-actions&action=delete&id=" . $row->id . "'\" class='btn btn-danger'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</tbody>";
    } else {
        echo "<p class='alert alert-danger'>Ainda não há nenhum usuário cadastrado.</P>";
    }

    ?>
</table>