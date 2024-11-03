<?php
session_start()
?>

<h1>Home Page</h1>
<?php
if (isset($_SESSION['email'])) {
    echo "Bem-vindo, " . $_SESSION['email'];
} else {
    echo "Você não está logado.";
}
?>