<?php

require_once __DIR__ . '/../classes/class.Curso.php';
require_once __DIR__ . '/../classes/class.AvaliacaoDiscente.php';
require_once __DIR__ . '/../classes/class.Aula.php';
require_once __DIR__ . '/../classes/class.PedagogicaComplementar.php';
require_once __DIR__ . '/../classes/class.CalculoSemanal.php';

$classeAvaliacaoDiscente = new AvaliacaoDiscente();
$classeAula = new Aula();
$classePedagogicaComplementar = new PedagogicaComplementar();
$classeCalculoSemanal = new CalculoSemanal();
$classes = new Curso();

$usuario = $_SESSION['usuario'];
$avaliacao = $classeAvaliacaoDiscente->recupera(['docente_id' => $usuario['id']]);
$aula = $classeAula->recupera(['docente_id' => $usuario['id']]);
$pedagogicaComplementar = $classePedagogicaComplementar->recupera(['docente_id' => $usuario['id']]);
$calculoSemanal = $classeCalculoSemanal->recupera(['docente_id' => $usuario['id']]);
$cursos = $classes->recuperaTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
    label {
        margin: 2px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=pre_relatorio_edit_submit">
            <a href="?rota=pdocente" class="btn btn-success">Voltar</a>
            <div class="col text-center">
                <h2>Editar relatório</h2><br>
            </div>
            <div class="mb-3">
                <h4>Avaliação do discente</h4>

                <label>Código do docente:</label>
                <input class="form-control" type="text" placeholder="Digite seu código" name="codigo" value="<?= $avaliacao['codigo'] ?? ''  ?>" required>

                <label>Nome: </label>
                <input class="form-control" type="text" placeholder="Digite seu nome" name="nome" value="<?= $avaliacao['nome'] ?? ''  ?>" required>

                <label>Semestre: </label>
                <select class='form-control' name='semestre' required>
                    <option value=''>Selecione</option>
                    <option value='1' <?php echo $avaliacao['semestre'] == '1' ? 'selected' : ''; ?>>1°</option>
                    <option value='2' <?php echo $avaliacao['semestre'] == '2' ? 'selected' : ''; ?>>2°</option>
                </select>

                <label>Período letivo: </label>
                <input class="form-control" type="text" placeholder="Digite o período letivo" name="periodo_letivo" value="<?= $avaliacao['periodo_letivo'] ?? '' ?>" required>
                <br />

                <h4>Aula</h4>

                <label>Código da aula: </label>
                <input class="form-control" type="text" placeholder="Digite o código da aula" name="codaula" value="<?= $aula['codigo']  ?? '' ?>" required>

                <label>Nome da disciplina:</label>
                <input class="form-control" type="text" placeholder="Digite o nome da disciplina" name="ndisciplina" value="<?= $aula['nome']  ?? '' ?>" required>

                <label>Turma teórica:</label>
                <input class="form-control" type="text" placeholder="Digite a turma teórica" name="turmteorica" value="<?= $aula['turmas_teorica'] ?? ''  ?>" required>

                <label>Turma prática: </label>
                <input class="form-control" type="text" placeholder="Digite a turma prática" name="turmpratica" value="<?= $aula['turmas_pratica']  ?? '' ?>" required>

                <label>Carga horária teórica: </label>
                <input class="form-control" type="text" placeholder="Digite a carga horária teórica" name="chteorica" value="<?= $aula['carga_horaria_teorica'] ?? ''  ?>" required>

                <label>Carga horária prática:</label>
                <input class="form-control" type="text" placeholder="Digite a carga horária prática" name="chpratica" value="<?= $aula['carga_horaria_pratica'] ?? ''  ?>" required>

                <label>Carga horária total: </label>
                <input class="form-control" type="text" placeholder="Digite a carga horária total" name="chtotal" value="<?= $aula['carga_horaria_total'] ?? ''  ?>" required>

                <label>Qtd. Docentes: </label>
                <input class="form-control" type="text" placeholder="Digite o nome do docente" name="ndocente" value="<?= $aula['docentes'] ?? ''  ?>" required>

                <label>Docentes ch: </label>
                <input class="form-control" type="text" placeholder="Digite o ch do docente" name="chdocente" value="<?= $aula['docentes_ch'] ?? ''  ?>" required>

                <label>Periodo Letivo: </label>
                <input class="form-control" type="text" placeholder="Digite o ch do docente" name="periodo_letivo" value="<?= $aula['periodo_letivo'] ?? ''  ?>" required>

                <label>Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="">Selecione</option>
                    <option value="1" <?php echo $aula['semestre'] == '1' ? 'selected' : ''; ?>>1°</option>
                    <option value="2" <?php echo $aula['semestre'] == '2' ? 'selected' : ''; ?>>2°</option>
                </select>

                <label>Curso:</label>
                <select class="form-control" name="curso" required>
                    <option value="" selected>Selecione</option>
                    <?php

                    foreach ($cursos as $curso) {
                        $selected = ($aula['curso_id'] == $curso['id']) ? 'selected' : '';
                        echo '<option value="' . $curso['id'] . '" ' . $selected . '>' . $curso['nome'] ?? '' . '</option>';
                    }
                    ?>

                </select>

                <br />
                <h4>Cálculo semanal</h4>

                <label>Graduação:</label>

                <select class='form-control' name='graduacao' required>
                    <option value=''>Selecione</option>
                    <option value='1' <?php echo $calculoSemanal['graduacao'] == '1' ? 'selected' : ''; ?>>Bacharelado</option>
                    <option value='2' <?php echo $calculoSemanal['graduacao'] == '2' ? 'selected' : ''; ?>>Licenciatura</option>
                </select>

                <label>Posgraduação:</label>

                <select class='form-control' name='posgraduacao' required>
                    <option value=''>Selecione</option>
                    <option value='1' <?php echo $calculoSemanal['posgraduacao'] == '1' ? 'selected' : ''; ?>>Bacharelado</option>
                    <option value='2' <?php echo $calculoSemanal['posgraduacao'] == '2' ? 'selected' : ''; ?>>Licenciatura</option>
                </select>

                <label>Total:</label>
                <input class="form-control" type="number" placeholder="Digite o total" name="total" value="<?= $calculoSemanal['total'] ?? ''  ?>" required>

                <br />
                <h4>Pedagógica complementar</h4>

                <label>Graduação:</label>

                <select class='form-control' name='graduacao_pedagogica' required>
                    <option value=''>Selecione</option>
                    <option value='1' <?php echo $pedagogicaComplementar['graduacao'] == '1' ? 'selected' : ''; ?>>Bacharelado</option>
                    <option value='2' <?php echo $pedagogicaComplementar['graduacao'] == '2' ? 'selected' : ''; ?>>Licenciatura</option>
                </select>

                <label>Posgraduação:</label>

                <select class='form-control' name='posgraduacao_pedagogica' required>
                    <option value=''>Selecione</option>
                    <option value='1' <?php echo $pedagogicaComplementar['posgraduacao'] == '1' ? 'selected' : ''; ?>>Bacharelado</option>
                    <option value='2' <?php echo $pedagogicaComplementar['posgraduacao'] == '2' ? 'selected' : ''; ?>>Licenciatura</option>
                </select>

                <label>Total:</label>
                <input class="form-control" type="number" placeholder="Digite o total" name="total_pedagogica" value="<?= $pedagogicaComplementar['total'] ?? ''  ?>" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </form>
    </div>
    <br>
</body>

</html>