<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Library - You're library administrated with php</title>
    <meta name="description" content="System to manage a library maded with php.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="?page=home">
                <img src="https://www.pngkit.com/png/full/25-254635_open-book-icon-png-download-book-black-and.png" alt="LibraryPHP" width="30" height="24" class="me-2">
                <span>Library<b>PHP</b></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=books">
                            <i class="bi bi-book"></i> Livros
                        </a>
                    </li>
                    <?php if (isset($_SESSION['email'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=users">
                                <i class="bi bi-people"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=admins">
                                <i class="bi bi-person-badge"></i> Administradores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=new-admin">
                                <i class="bi bi-person-plus"></i> Novo Admin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=new-user">
                                <i class="bi bi-person-plus"></i> Novo Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="?page=admin-actions" method="post">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit" class="btn btn-link nav-link">Sair</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=login">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        include("../db/config.php");
        switch (@$_REQUEST["page"]) {
            case 'books':
                include "books.php";
                break;
            case 'update-book':
                include "update-book.php";
                break;
            case 'rented-books':
                include "rented-books.php";
                break;
            case 'new-book':
                include "new-book.php";
                break;
            case 'users':
                include "users.php";
                break;
            case 'new-user':
                include "new-user.php";
                break;
            case 'users-actions':
                include "../actions/user-actions.php";
                break;
            case 'admins':
                include "admins.php";
                break;
            case 'new-admin':
                include "new-admin.php";
                break;
            case 'admin-actions':
                include "../actions/admin-actions.php";
                break;
            case 'book-actions':
                include "../actions/book-actions.php";
                break;
            case 'login':
                include "login.php";
                break;
            case 'logout':
                include "logout.php";
                break;
            default:
                include "home.php";
                break;
        }
        ?>
    </div>
</body>

</html>