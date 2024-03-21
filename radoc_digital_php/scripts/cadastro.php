<?php

require_once  __DIR__ . '/../inc/navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <!--<link rel="stylesheet" href="estilo.css">-->
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=cadastro_submit">
            <div class="col text-center">
                <h2>Cadastro do docente</h2><br>
            </div>
            <div class="mb-3">
                Nome: <input class="form-control" type="text" placeholder="Digite seu nome" name="name" required>

                CPF: <input class="form-control" type="text" placeholder="Digite seu CPF" name="cpf" required>

                Siape: <input class="form-control" type="text" placeholder="Digite seu siape" name="siape" required>

                E-mail: <input class="form-control" type="email" placeholder="Digite seu e-mail" name="email" required>

                Classe: <input class="form-control" type="text" placeholder="Digite sua classe" name="classe" required>

                Vínculo: <input class="form-control" type="text" placeholder="Digite seu vínculo" name="vinculo" required>

                Regime de trabalho: <input class="form-control" type="text" placeholder="Digite seu regime de trabalho" name="rtrabalho" required>

                Titulação: <input class="form-control" type="text" placeholder="Digite a sua titulação" name="titulacao" required>

                Campus: <input class="form-control" type="text" placeholder="Digite seu campus" name="campus" required>

                Instituto: <input class="form-control" type="text" placeholder="Digite seu instituto" name="instituto" required>

                Data: <input class="form-control" type="text" placeholder="Digite a data" name="data" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Cadastrar<br>

            </div>
        </form>
    </div>
    <br>

</body>

</html>




<!--<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h4>page1</h4>
            <p class="mt-5"></p>
        </div>

    </div>

</div>-->