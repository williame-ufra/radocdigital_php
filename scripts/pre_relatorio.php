<?php

require_once __DIR__ . '/../classes/class.Curso.php';

$classes = new Curso();

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
        <form method="post" action="?rota=pre_relatorio_submit">
            <a href="?rota=pdocente" class="btn btn-success">Voltar</a>
            <div class="col text-center">
                <h2>Preencher relatório</h2><br>
            </div>
            <div class="mb-3">
                <h4>Avaliação do discente</h4>

                <label>Código do docente:</label>
                <input class="form-control" type="text" placeholder="Digite seu código" name="codigo" required>

                <label>Nome: </label>
                <input class="form-control" type="text" placeholder="Digite seu nome" name="nome" required>

                <label>Semestre: </label>
                <select class='form-control' name='semestre' required>
                    <option value=''>Selecione</option>
                    <option value='1'>1°</option>
                    <option value='2'>2°</option>
                </select>

                <label>Período letivo: </label>
                <input class="form-control" type="text" placeholder="Digite o período letivo" name="periodo_letivo" required>
                <br />

                <h4>Aula</h4>

                <label>Código da aula: </label>
                <input class="form-control" type="text" placeholder="Digite o código da aula" name="codaula" required>

                <label>Nome da disciplina:</label>
                <input class="form-control" type="text" placeholder="Digite o nome da disciplina" name="ndisciplina" required>

                <label>Turma teórica:</label>
                <input class="form-control" type="number" placeholder="Digite a turma teórica" name="turmteorica" required>

                <label>Turma prática: </label>
                <input class="form-control" type="number" placeholder="Digite a turma prática" name="turmpratica" required>

                <label>Carga horária teórica: </label>
                <input class="form-control" type="number" placeholder="Carga horária teórica" name="chteorica" required>

                <label>Carga horária prática:</label>
                <input class="form-control" type="number" placeholder="Carga horária prática" name="chpratica" required>

                <label>Carga horária total: </label>
                <input class="form-control" type="number" placeholder="Carga horária total" name="chtotal" required>

                <label>Qtd. Docentes: </label>
                <input class="form-control" type="text" placeholder="Quantidade de docentes" name="ndocente" required>

                <label>Docentes ch: </label>
                <input class="form-control" type="text" placeholder="Carga horária docentes" name="chdocente" required>

                <label>Periodo Letivo: </label>
                <input class="form-control" type="text" placeholder="Periodo letivo" name="periodo_letivo" required>

                <label>Semestre:</label>
                <select class="form-control" name="semestre" required>
                <option value="" >Selecione</option>
                    <option value="1" >1°</option>
                    <option value="2">2°</option>
                </select>

                <label>Curso:</label>
                <select class="form-control" name="curso" required>
                    <option value="" selected>Selecione</option>
                    <?php

                    foreach ($cursos as $curso) {
                        // $selected = ($curso['id'] == ) ? 'selected' : '';
                        echo '<option value="' . $curso['id'] . '" ' . '' . '>' . $curso['nome'] . '</option>';
                    }
                    ?>

                </select>

                <br />
                <h4>Cálculo semanal</h4>

                <label>Graduação:</label>
                
                <select class='form-control' name='graduacao' required>
                    <option value=''>Selecione</option>
                    <option value='1'>Bacharelado</option>
                    <option value='2'>Licenciatura</option>
                </select>

                <label>Posgraduação:</label>
                
                <select class='form-control' name='posgraduacao' required>
                    <option value=''>Selecione</option>
                    <option value='1'>Bacharelado</option>
                    <option value='2'>Licenciatura</option>
                </select>

                <label>Total:</label>
                <input class="form-control" type="number" placeholder="Digite o total" name="total" required>

                <br />
                <h4>Pedagógica complementar</h4>

                <label>Graduação:</label>

                <select class='form-control' name='graduacao_pedagogica' required>
                    <option value=''>Selecione</option>
                    <option value='1'>Bacharelado</option>
                    <option value='2'>Licenciatura</option>
                </select>

                <label>Posgraduação:</label>

                <select class='form-control' name='posgraduacao_pedagogica' required>
                    <option value=''>Selecione</option>
                    <option value='1'>Bacharelado</option>
                    <option value='2'>Licenciatura</option>
                </select>

                <label>Total:</label>
                <input class="form-control" type="number" placeholder="Digite o total" name="total_pedagogica" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
    <br>
</body>

</html>