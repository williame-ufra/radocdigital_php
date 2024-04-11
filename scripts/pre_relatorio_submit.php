<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $semestre = isset($_POST['semestre']) ? $_POST['semestre'] : '';
    $periodo_letivo = isset($_POST['pletivo']) ? $_POST['pletivo'] : '';
    $turmas_teorica = isset($_POST['turteoricas']) ? $_POST['turteoricas'] : '';
    $turmas_pratica = isset($_POST['turpraticas']) ? $_POST['turpraticas'] : '';
    $carga_horaria_teorica = isset($_POST['chteorica']) ? $_POST['chteorica'] : '';
    $carga_horaria_pratica = isset($_POST['chpratica']) ? $_POST['chpratica'] : '';
    $carga_horaria_total = isset($_POST['chtotal']) ? $_POST['chtotal'] : '';
    $docentes = isset($_POST['docentes']) ? $_POST['docentes'] : '';
    $docentes_ch = isset($_POST['docentesch']) ? $_POST['docentesch'] : '';
    $curso = isset($_POST['curso']) ? $_POST['curso'] : '';
    $graduacao = isset($_POST['graduacao']) ? $_POST['graduacao'] : '';
    $posgraduacao = isset($_POST['posgraduacao']) ? $_POST['posgraduacao'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';

    echo '<pre>';
    var_dump($curso);
    echo '<pre>';
    die();

    $bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

    $result1 = $bd->insert("INSERT INTO avaliacao_discente (codigo, nome, semestre, periodo_letivo, radoc_id) 
    SELECT :codigo, :nome, :semestre, :periodo_letivo, id
    FROM radoc_digital.radoc", [
        ':codigo' => $codigo,
        ':nome' => $nome,
        ':semestre' => $semestre,
        ':periodo_letivo' => $periodo_letivo,
    ]);




    $result2 = $bd->insert("INSERT INTO aula (codigo, nome, turmas_teorica, turmas_pratica, carga_horaria_teorica, carga_horaria_pratica, carga_horaria_total, docentes, docentes_ch, semestre, periodo_letivo, curso_id) VALUES (:codigo, :nome, :turmas_teorica, :turmas_pratica, :carga_horaria_teorica, :carga_horaria_pratica, :carga_horaria_total, :docentes, :docentes_ch, :semestre, :periodo_letivo, :curso_id)", [
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
        ':periodo_letivo' => $periodo_letivo,
        ':curso_id' => $curso,
    ]);



    $result3 = $bd->insert("INSERT INTO calculo_semanal (codigo, nome, graduacao, posgraduacao, semestre, total) VALUES (:codigo, :nome, :graduacao, :posgraduacao, :semestre, :total)", [
        ':codigo' => $codigo,
        ':nome' => $nome,
        ':graduacao' => $graduacao,
        ':posgraduacao' => $posgraduacao,
        ':semestre' => $semestre,
        ':total' => $total,
    ]);

    $result4 = $bd->insert("INSERT INTO pedagogica_complementar (codigo, nome, graduacao, posgraduacao, semestre, total) VALUES (:codigo, :nome, :graduacao, :posgraduacao, :semestre, :total)", [
        ':codigo' => $codigo,
        ':nome' => $nome,
        ':graduacao' => $graduacao,
        ':posgraduacao' => $posgraduacao,
        ':semestre' => $semestre,
        ':total' => $total,
    ]);
}
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