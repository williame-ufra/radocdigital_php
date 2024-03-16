<nav class="container-fluid mt-5 p-2 border rouded-3 shadow-sm bg-success">
    <div class="row align-items-center">
        <div class="col">
            <div class="col text-center mt-3">
                <h4 class="text-center">RELATÓRIO ANUAL DE ATIVIDADES<br>DO DOCENTE-RADOC</h4>
                <a href="?rota=home" class="text-light">Home</a>
                <span class="mx-5"></span>
                <a href="?rota=page1" class="text-light">Cadastro</a>
                <span class="mx-5"></span>
                <a href="?rota=page2" class="text-light">Docente</a>
                <span class="mx-5"></span>
                <a href="?rota=page3" class="text-light">CPPD</a>
            </div>

            <div class="col text-end">
                <span>Usuário logado: <strong><?= $_SESSION['usuario']->cpf_usuario ?></strong></span>
                <span class="mx-2">|</span>
                <a href="?rota=logout" class="text-light">Sair</a>
            </div>
        </div>

    </div>
</nav>