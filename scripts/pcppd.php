<?php

require_once __DIR__ . '/../inc/navbar.php';
require_once __DIR__ . '/../classes/class.Docente.php';

$usuario = $_SESSION[ 'usuario' ] ?? '';

$classeDocente = new Docente();

$docente = $classeDocente->recupera(['id' => $usuario[ 'id' ] ] );

$sessionMsg = $_SESSION[ 'msg' ] ?? '';
$erro = $_SESSION[ 'erro' ] ?? false;

?>
<script src = 'https://code.jquery.com/jquery-1.9.1.min.js'></script>
<link href = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css' rel = 'stylesheet'>
<script src = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js'></script>

<?php if ( $erro && isset( $sessionMsg ) && $sessionMsg != '' ) {
    ?>
    <script type = 'text/javascript'>
    toastr.error( '<?= $sessionMsg ?>' )
    </script>
    <?php

} elseif ( isset( $sessionMsg ) && $sessionMsg != '' ) {
    ?>
    <script type = 'text/javascript'>
    toastr.success( '<?= $sessionMsg ?>' )
    </script>
    <?php }

    $_SESSION[ 'msg' ] = '';

    ?>

    <div class = 'container'>

    <div class = 'row'>
    <h2 class = 'text-center mt-5'>Página CPPD</h2>

    <!-- <div class = 'col text-center'>
    <a href = '?rota=cadastro'><button class = 'btn btn-success mt-5'>Cadastrar professor</button></a><br>
    </div> -->

    <div class = 'col text-center'>
    <a href = '?rota=reabrir_radoc.php'><button class = 'btn btn-success mt-5'>Reabertura do radoc</button></a><br>
    </div>

    <?php if($docente['cppd'] == '1'){ ?>
        <div class = 'col text-center'>
        <a href = '?rota=permissao_cppd' target = '_blank'><button class = 'btn btn-success mt-5'>Usuários</button></a><br>
        </div>
    <?php } ?>

    <!-- <div class = 'col text-center'>
    <a href = '?rota=imp_dec.php><button ' class = 'btn btn-success mt-5'>Imprimir declaração</button></a><br>
    </div>

    <div class = 'col text-center'>
    <a href = '?rota=preencher_dec.php'><button class = 'btn btn-success mt-5'>Preencher declaração</button></a><br>
    </div> -->

    <!-- <div class = 'col text-center'>
    <a href = '?rota=relatorio' target = '_blank'><button class = 'btn btn-success mt-5'>Gerar Relatório</button></a><br>
    </div> -->

    <!-- <div class = 'col text-center'>
    <a href = '?rota=teste-email' ><button class = 'btn btn-success mt-5'>Teste Email</button></a><br>
    </div> -->

    </div>

    </div>