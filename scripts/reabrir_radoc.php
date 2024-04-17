<?php

require_once __DIR__ . '/../classes/class.Radoc.php';
require_once __DIR__ . '/../classes/class.Docente.php';

$classeRadoc = new Radoc();
$classeDocente = new Docente();

$radocs = $classeRadoc->recuperaTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
    label {
        margin: 2px;
    }

    /* thead {
        background-color: green;
    } */
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reabrir Radoc</title>
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=reabrir_radoc_submit">
        <a href="?rota=pcppd" class="btn btn-success">Voltar</a>
            <div class="col text-center">
                <h2>Reabrir Radoc</h2><br>
            </div>
            <?php
            foreach ($radocs as $key => $radoc) {
                $docente = $classeDocente->recupera(['id' => $radoc['docente_id']]);
            ?>
                <div class="row">
                    <div class="col text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td style="width:25%">Docente</td>
                                    <td style="width:25%">Cadastro</td>
                                    <td style="width:25%">Ano</td>
                                    <td style="width:25%">Ativo</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $docente['nome_completo'] ?></td>
                                    <td><?= $radoc['cadastro'] ?></td>
                                    <td><?= $radoc['ano'] ?></td>
                                    <td>
                                        <form method="post" action="?rota=reabrir_radoc_submit">
                                            <input type="hidden" name="radoc_id" value="<?= $radoc['id'] ?>">
                                            <?php if($radoc['ativo'] == '1') { ?>
                                            <button type="submit" class="btn btn-warning">Fechar</button> 
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-success">Reabrir</button>   
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
            ?>

        </form>
    </div>
    <br>

</body>

</html>