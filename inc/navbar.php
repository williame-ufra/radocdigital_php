<?php
$usuario_logado = $_SESSION['usuario'];
?>

<style>
    .navbar-brand {
        margin-left: 20px;
        font-size: 1.5rem;
        font-weight: bold;
    }
    .nav-link {
        color: white !important;
        margin-right: 15px;
    }
    .nav-link:hover {
        text-decoration: underline;
    }
    .user-info {
        color: white;
    }
    .navheigth{
        min-height: 150px;
    }

    .mr-200{
        margin-right: 200px;
    }

    .mr-10{
        margin-right: 50px;
    }

    .ufra{
        font-size: 30px;
    }

</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-success navheigth">
    <div class="container">
        <a class="navbar-brand mr-200 ufra" href="#">UFRA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mr-10">
                    <a class="nav-link" href="?rota=home">Home</a>
                </li>
                <li class="nav-item mr-10">
                    <a class="nav-link" href="?rota=pdocente">Docente</a>
                </li>
                <li class="nav-item mr-10">
                    <a class="nav-link" href="?rota=pcppd">CPPD</a>
                </li>
                <li class="nav-item mr-10">
                    <a class="nav-link" href="?rota=meus_dados">Meus Dados</a>
                </li>
            </ul>
            <span class="user-info me-3">Usuário logado: <strong><?= $usuario_logado['nome_completo'] ?? 'Desconhecido' ?></strong></span>
            <a href="?rota=logout" class="btn btn-outline-light">Sair</a>
        </div>
    </div>
</nav>
