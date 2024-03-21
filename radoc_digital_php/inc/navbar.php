<?php
$usuario_logado = $_SESSION['usuario'];
?>

<nav class="container-fluid mt-5 p-2 border rounded-3 shadow-sm bg-success">
    <div class="row align-items-center">
        <div class="col">
            <div class="col text-center mt-3">
                <h4 class="text-center">RELATÓRIO ANUAL DE ATIVIDADES<br>DO DOCENTE-RADOC</h4>
                <a href="?rota=home" class="text-light">Home</a>
                <span class="mx-5"></span>
                <a href="?rota=cadastro" class="text-light">Cadastro</a>
                <span class="mx-5"></span>
                <a href="?rota=pdocente" class="text-light">Docente</a>
                <span class="mx-5"></span>
                <a href="?rota=pcppd" class="text-light">CPPD</a>
            </div>

            <div class="col text-end">
                <span>Usuário logado: <strong><?= $usuario_logado['login'] ?></strong></span>
                <span class="mx-2">|</span>
                <a href="?rota=logout" class="text-light">Sair</a>
            </div>
        </div>
    </div>
</nav>
