<?php

require_once __DIR__ . '/../inc/navbar.php';
require_once __DIR__ . '/../classes/class.AvaliacaoDiscente.php';
require_once __DIR__ . '/../classes/class.Aula.php';
require_once __DIR__ . '/../classes/class.PedagogicaComplementar.php';
require_once __DIR__ . '/../classes/class.CalculoSemanal.php';

$classeAvaliacaoDiscente = new AvaliacaoDiscente();
$classeAula = new Aula();
$classePedagogicaComplementar = new PedagogicaComplementar();
$classeCalculoSemanal = new CalculoSemanal();

$usuario = $_SESSION[ 'usuario' ];

$avaliacao = $classeAvaliacaoDiscente->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$aula = $classeAula->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$pedagogicaComplementar = $classePedagogicaComplementar->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );
$calculoSemanal = $classeCalculoSemanal->recupera( [ 'docente_id' => $usuario[ 'id' ] ] );

$sessionMsg = $_SESSION[ 'msg' ] ?? '';
$erro = $_SESSION[ 'erro' ] ?? false;

?>
<script src = 'https://code.jquery.com/jquery-1.9.1.min.js'></script>
<link href = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css' rel = 'stylesheet'>
<script src = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js'></script>
<style>
.div-principal {
    margin-top: 20px;
    margin-bottom:20px ;
}

th {
    text-align: start;

}
</style>

<div class = 'container'>

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
        <div class = 'row'>
        <h2 class = 'text-center mt-5'>Página do Docente</h2>
        <!-- <div style = 'display:flex'> -->
        <div class = 'col text-center'>

        <a href = '?rota=pre_relatorio'><button class = 'btn btn-success mt-5'>Preencher relatório</button></a>

    </div>
        <div class = 'col text-center'>
        <a href = '?rota=relatorio' target = '_blank'><button class = 'btn btn-success mt-5'>Gerar Relatório</button></a><br>
        </div>
        <div class = 'col text-center'>
        <a href = '?rota=pre_relatorio_edit'><button class = 'btn btn-success mt-5'>Editar relatório</button></a>
        </div>

        </div>

        <?php
        if ( isset( $aula ) && isset( $avaliacao ) && isset( $pedagogicaComplementar ) && isset( $calculoSemanal ) ) {

            ?>

            <br/>
            <?php

        }

        ?>

        </div>