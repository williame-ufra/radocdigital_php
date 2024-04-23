<?php

require_once __DIR__ . '/../classes/class.Campus.php';
require_once __DIR__ . '/../classes/class.Instituto.php';
require_once __DIR__ . '/../classes/class.Docente.php';

$classeCampus = new Campus();
$classeInstituto = new Instituto();
$classeDocente = new Docente();

$campi = $classeCampus->recuperaTodos();
$institutos = $classeInstituto->recuperaTodos();

$usuario = $_SESSION['usuario'];
$docente = $classeDocente->recupera(['cpf' => $usuario['cpf']]);

$sessionMsg = $_SESSION[ 'msg' ] ?? '';
$erro = $_SESSION[ 'erro' ] ?? false;


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
    <title>Cadastrar</title>
    <!--<link rel="stylesheet" href="estilo.css">-->
    <script src = 'https://code.jquery.com/jquery-1.9.1.min.js'></script>
    <link href = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css' rel = 'stylesheet'>
    <script src = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js'></script>
</head>

<body>
        <?php if ( $erro && isset( $sessionMsg ) && $sessionMsg != '' ) {
            ?>
            <script type = 'text/javascript'>
            toastr.error( '<?= $sessionMsg ?>' )
            </script>
            <?php } elseif ( isset( $sessionMsg ) && $sessionMsg != '' ) {
        ?>
        <script type = 'text/javascript'>
        toastr.success( '<?= $sessionMsg ?>' )
        </script>
        <?php }

        $_SESSION[ 'msg' ] = '';
        ?>
    <div class="container p-5">
        <!-- <form method="post" action="?rota=cadastro_submit"> -->
        <a href="?rota=pcppd" class="btn btn-success">Voltar</a>
            <div class="col text-center">
                <h2>Meus Dados</h2><br>
                
            </div>
            <div class="mb-3">
                <label>Nome:</label> 
                <input class="form-control" type="text" placeholder="Digite seu nome" value="<?=$docente['nome_completo'] ?>" name="name" disabled>

                <label>CPF:</label>  <input class="form-control cpf" type="text" placeholder="Digite seu CPF" 
                value="<?=$docente['cpf'] ?>" name="cpf" disabled  minlength="11" maxlength="11">

                <label>Siape:</label>  <input class="form-control" type="text" placeholder="Digite seu siape" 
                value="<?=$docente['siape'] ?>" name="siape" disabled>

                <label>E-mail:</label>  <input class="form-control" type="email" placeholder="Digite seu e-mail" 
                value="<?=$docente['email'] ?>" name="email" disabled>

                <!-- <label>Senha: </label> <input class="form-control" type="password" placeholder="Digite sua senha" 
                value="<?=$docente['senha'] ?>" name="senha" disabled> -->

                <label>Classe:</label> 
                <select class="form-select" name="classe" disabled>
                    <option value="">Selecione</option>
                    <option value="1" <?= $docente['classe'] == '1' ? 'selected':'' ?>>A</option>
                    <option value="2" <?= $docente['classe'] == '2' ? 'selected':'' ?>>B</option>
                    <option value="3" <?= $docente['classe'] == '3' ? 'selected':'' ?>>C</option>
                    <option value="4" <?= $docente['classe'] == '4' ? 'selected':'' ?>>D</option>
                    <option value="5" <?= $docente['classe'] == '5' ? 'selected':'' ?>>E</option>
                </select>

                <label>Vínculo estatutário:</label> 
                <select class="form-select" name="vinculo_estatutario" disabled>
                    <option value="">Selecione</option>
                    <option value="S" <?= $docente['vinculo_estatutario'] == 'S' ? 'selected':'' ?>>Sim</option>
                    <option value="N" <?= $docente['vinculo_estatutario'] == 'N' ? 'selected':'' ?>>Não</option>
                </select>

                <label>Regime de trabalho:</label> 
                <select class="form-select" name="regime" disabled>
                    <option value="">Selecione</option>
                    <!-- <option value="DE"<?= $docente['regime'] == '1' ? 'selected':'' ?>>DE</option> -->
                    <option value="20"<?= $docente['regime'] == '20' ? 'selected':'' ?>>20h</option>
                    <option value="40"<?= $docente['regime'] == '40' ? 'selected':'' ?>>40h</option>
                </select>


                <label>Titulação:</label> 
                <select class="form-select" name="titulacao" disabled>
                    <option value="">Selecione</option>
                    <option value="1" <?= $docente['titulacao'] == '1' ? 'selected':'' ?>>Graduação</option>
                    <option value="2" <?= $docente['titulacao'] == '2' ? 'selected':'' ?>>Especialização</option>
                    <option value="3" <?= $docente['titulacao'] == '3' ? 'selected':'' ?>>Mestre</option>
                    <option value="4" <?= $docente['titulacao'] == '4' ? 'selected':'' ?>>Doutor</option>
                </select>

                <label>Campus:</label> 

                <select class="form-select" name="campus" disabled>
                    <option value="">Selecione</option>
                    <?php
                    foreach ($campi as $key => $campus) {
                    ?>
                        <option value="<?= $campus['id'] ?>" <?= $docente['campus_id'] == $campus['id'] ? 'selected':'' ?>><?= $campus['cidade'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <label>Instituto:</label> 

                <select class="form-select" name="instituto" disabled>
                    <option value="">Selecione</option>
                    <?php
                    foreach ($institutos as $key => $instituto) {
                    ?>
                        <option value="<?= $instituto['id'] ?>" <?= $docente['instituto_id'] == $instituto['id'] ? 'selected':'' ?>><?= $instituto['sigla'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <label>Data: </label>  <?php isset($docente['data_nascimento']) ? $docente['data_nascimento'] : '' ?>
                <input class="form-control" type="date" placeholder="Digite a data" 
                value="<?= substr($docente['data_nascimento'], 0, 10) ?>" name="data_nascimento" disabled>
            </div>
            <div>
                <!-- <button type="submit" class="btn btn-success">Alterar</button> -->
                <a href="?rota=meus_dados_edit" class="btn btn-success">Editar</a>
            </div>
        <!-- </form> -->
    </div>
    <br>

</body>

</html>

