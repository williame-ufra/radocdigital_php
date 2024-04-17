<?php
require_once __DIR__ . '/../classes/class.Radoc.php';

$classeRadoc = new Radoc();

$radocs = $classeRadoc->recuperaTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
    label{
        margin:2px;
    }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reabrir Radoc</title>
    <!--<link rel="stylesheet" href="estilo.css">-->
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=cadastro_submit">
            <div class="col text-center">
                <h2>Reabrir Radoc</h2><br>
            </div>
           
            <div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
    <br>

</body>

</html>