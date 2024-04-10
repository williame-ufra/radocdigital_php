<?php

// verificar se existe erro na seção
$erro = $_SESSION['erro'] ?? null;

unset($_SESSION['erro']);

?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-4">

            <div class="card bg-light p-5 shadow mt-5">

                <h3 class="text-secondary">AUTENTICAÇÃO RADOC</h3>

                <hr>

                <form action="?rota=login_submit" method="post">
                    <div class="mb-3">
                        <label for="text_usuario">Usuário</label>
                        <input type="text" placeholder="Digite seu CPF" name="text_usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="text_senha">Senha</label>
                        <input type="password" placeholder="Digite sua Senha" name="text_senha" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Entrar" class="btn btn-success w-100">
                    </div>
                    <br>
                    <a href="?rota=cadastro" class="nav-link text-success d-flex justify-content-center">Ainda não é cadastrado?</a>
                    <br>
                    <a href="recuperar_senha" class="nav-link text-success d-flex justify-content-center">Esqueceu sua senha?</a>
                </form>

                <?php if (!empty($erro)) : ?>
                    <div class="alert alert-danger mt-3 p-2 text-center">
                        <?= $erro ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>