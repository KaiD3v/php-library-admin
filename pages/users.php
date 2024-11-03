<?php
if ($_SESSION['email'] == null) {
    header('Location: ?page=home');
}
?>

<h1>User Page</h1>