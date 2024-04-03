<?php
// Verifica se a requisição foi feita usando o método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os parâmetros do formulário para tabela avaliação do docente
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';
    $periodo_letivo = isset($_POST['pletivo']) ? $_POST['pletivo'] : '';
    // Recebe os parâmetros do formulário para tabela aula
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $turmas_teorica = isset($_POST['turteoricas']) ? $_POST['turteoricas'] : '';
    $turmas_pratica = isset($_POST['turpraticas']) ? $_POST['turpraticas'] : '';
    $carga_horaria_teorica = isset($_POST['chteorica']) ? $_POST['chteorica'] : '';
    $carga_horaria_pratica = isset($_POST['chpratica']) ? $_POST['chpratica'] : '';
    $carga_horaria_total = isset($_POST['chtotal']) ? $_POST['chtotal'] : '';
    $docentes = isset($_POST['docentes']) ? $_POST['docentes'] : '';
    $docentes_ch = isset($_POST['docentesch']) ? $_POST['docentesch'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';
    $periodo_letivo = isset($_POST['pletivo']) ? $_POST['pletivo'] : '';
    $curso = isset($_POST['curso']) ? $_POST['curso'] : '';
    // Recebe os parâmetros do formulário para tabela cálculo semanal
    $graduacao = isset($_POST['graduacao']) ? $_POST['graduacao'] : '';
    $posgraduacao = isset($_POST['posgraduacao']) ? $_POST['posgraduacao'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';
    // Recebe os parâmetros do formulário para tabela pedagógica complementar
    $graduacao = isset($_POST['graduacao']) ? $_POST['graduacao'] : '';
    $posgraduacao = isset($_POST['posgraduacao']) ? $_POST['posgraduacao'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';
}

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$result = $bd->insert("INSERT INTO avaliacao_discente (codigo, nome, semestre, periodo_letivo) VALUES (:codigo, :nome, :semestre, :periodo_letivo)", [
    ':codigo' => $codigo,
    ':nome' => $nome,
    ':semestre' => $semestre,
    ':periodo_letivo' => $periodo_letivo,
]);

$result = $bd->insert("INSERT INTO aula (codigo, nome, turmas_teorica, turmas_pratica, carga_horaria_teorica, carga_horaria_pratica, carga_horaria_total, docentes, docentes_ch, semestre, periodo_letivo, curso_id) VALUES (:codigo, :nome, :turmas_teorica, :turmas_pratica, :carga_horaria_teorica, :carga_horaria_pratica, :carga_horaria_total, :docentes, :docentes_ch, :semestre, :periodo_letivo, :curso_id)", [
    ':codigo' => $codigo,
    ':nome' => $nome,
    ':turmas_teorica' => $turmas_teorica,
    ':turmas_pratica' => $turmas_pratica,
    ':carga_horaria_teorica' => $carga_horaria_teorica,
    ':carga_horaria_pratica' => $carga_horaria_pratica,
    ':carga_horaria_total' => $carga_horaria_total,
    ':docentes' => $docentes,
    ':docentes_ch' => $docentes_ch,
    ':semestre' => $semestre,
    ':peeriodo_letivo' => $periodo_letivo,
    ':curso_id' => $curso,
]);

$result = $bd->insert("INSERT INTO  calculo_semanal (codigo, nome, semestre, periodo_letivo) VALUES (:codigo, :nome, :semestre, :periodo_letivo)", [
    ':codigo' => $codigo,
    ':nome' => $nome,
    ':semestre' => $semestre,
    ':periodo_letivo' => $periodo_letivo,
]);

$result = $bd->insert("INSERT INTO  pedagogica_complementar (codigo, nome, semestre, periodo_letivo) VALUES (:codigo, :nome, :semestre, :periodo_letivo)", [
    ':codigo' => $codigo,
    ':nome' => $nome,
    ':semestre' => $semestre,
    ':periodo_letivo' => $periodo_letivo,
]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Dados cadastrados com sucesso</p>
</body>

</html>
