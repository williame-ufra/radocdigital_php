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

$usuario = $_SESSION['usuario'];

$avaliacao = $classeAvaliacaoDiscente->recupera(['docente_id' => $usuario['id']]);
$aula = $classeAula->recupera(['docente_id' => $usuario['id']]);
$pedagogicaComplementar = $classePedagogicaComplementar->recupera(['docente_id' => $usuario['id']]);
$calculoSemanal = $classeCalculoSemanal->recupera(['docente_id' => $usuario['id']]);

$sessionMsg = $_SESSION['msg'] ?? '';
$erro = $_SESSION['erro'] ?? false;

?>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<style>
    .div-principal {
        margin-top: 20px;
        margin-bottom:20px ;
    }

    th {
        text-align: start;

    }
</style>

<div class="container">
    
    <?php if ($erro && isset($sessionMsg) && $sessionMsg != '') { ?>
        <script type="text/javascript">
            toastr.error('<?= $sessionMsg ?>')
        </script>
    <?php } elseif(isset($sessionMsg) && $sessionMsg != '') { ?>
        <script type="text/javascript">
            toastr.success('<?= $sessionMsg ?>')
        </script>
    <?php } 
       $_SESSION[ 'msg' ] = '';
    ?>

    <h2 class="text-center mt-5">Página docente</h2>
    <div style="display:flex">
        <!-- <div class="col text-center"> -->
            <?php
            if($aula && $avaliacao && $pedagogicaComplementar && $calculoSemanal ) {
            ?>
                <a href="?rota=pre_relatorio_edit"><button class="btn btn-success mt-5">Editar relatório</button></a>
            <?php
            }else{

                ?>
                <a href="?rota=pre_relatorio"><button class="btn btn-success mt-5">Preencher relatório</button></a>

            <?php
            }

            ?>
    </div>
    <?php
    if (isset($aula) && isset($avaliacao) && isset($pedagogicaComplementar) && isset($calculoSemanal)) {

    ?>
    <div class="row">
        <div class="col text-center div-principal">
            <table class="table table-bordered table-striped">
                <thead>
                    <!-- Cabeçalhos de Avaliação do Discente -->
                    <tr>
                        <th colspan="12"><h4><b>Avaliação do Discente</b></h4></th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Semestre</th>
                        <th colspan="12">Período Letivo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dados da Avaliação do Discente -->
                    <tr>
                        
                        <td><?= $avaliacao['codigo'] ?? '' ?></td>
                        <td><?= $avaliacao['nome'] ?? '' ?></td>
                        <td><?php 
                        if(isset($avaliacao['semestre'])){
                            $avaliacao['semestre'] == '1' ? '1° semestre' : '2° semestre' ;
                        }
                        ?></td>
                        <td colspan="12"><?= $avaliacao['periodo_letivo'] ?? '' ?> período</td>
                    </tr>
                </tbody>
                <thead>
                    <!-- Cabeçalhos da Aula -->
                    <tr>
                        <th colspan="12"><h4><b>Aula</b></h4></th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Nome da Disciplina</th>
                        <th>Turma Teórica</th>
                        <th>Turma Prática</th>
                        <th>Carga Horária Teórica</th>
                        <th>Carga Horária Prática</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dados da Aula -->
                    <tr>
                        <td><?= $aula['codigo'] ?? '' ?></td>
                        <td><?= $aula['nome'] ?? '' ?></td>
                        <td><?= $aula['turmas_teorica'] ?? '' ?></td>
                        <td><?= $aula['turmas_pratica'] ?? '' ?></td>
                        <td><?= $aula['carga_horaria_teorica'] ?? '' ?> horas</td>
                        <td><?= $aula['carga_horaria_pratica'] ?? '' ?> horas</td>
                    </tr>
                </tbody>
                <thead>
                    <!-- Cabeçalhos de Pedagógica Complementar -->
                    <tr>
                        <th colspan="12"><h4><b>Pedagógica Complementar</b></h4></th>
                    </tr>
                    <tr>
                        <th>Graduação</th>
                        <th>Pós-graduação</th>
                        <th colspan="12">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dados de Pedagógica Complementar -->
                    <tr>
                        <td><?= $pedagogicaComplementar['graduacao'] ?? '' ?></td>
                        <td><?= $pedagogicaComplementar['posgraduacao'] ?? '' ?></td>
                        <td colspan="12"><?= $pedagogicaComplementar['total'] ?? '' ?></td>
                    </tr>
                </tbody>
                <thead>
                    <!-- Cabeçalhos de Cálculo Semanal -->
                    <tr>
                        <th colspan="12"><h4><b>Cálculo Semanal</b></h4></th>
                    </tr>
                    <tr>
                        <th>Graduação</th>
                        <th>Pós-graduação</th>
                        <th colspan="12">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dados de Cálculo Semanal -->
                    <tr>
                        <td><?= $calculoSemanal['graduacao'] ?? '' ?></td>
                        <td><?= $calculoSemanal['posgraduacao'] ?? '' ?></td>
                        <td colspan="12"><?= $calculoSemanal['total'] ?? '' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<br/>
    <?php

    }

    ?>

</div>