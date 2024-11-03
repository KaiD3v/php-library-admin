<?php
session_start();
if ($_SESSION['email'] == null) {
    header('Location: ?page=home');
}
?>
<h1>Admin Page</h1>