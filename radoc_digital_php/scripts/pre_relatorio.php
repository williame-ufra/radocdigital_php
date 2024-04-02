<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=pre_relatorio_submit">
            <div class="col text-center">
                <h2>Preencher relatório</h2><br>
            </div>
            <div class="mb-3">

                <h4>Avaliação do discente</h4>

                Código do docente: <input class="form-control" type="text" placeholder="Digite seu código" name="coddocente" required>

                Nome: <input class="form-control" type="text" placeholder="Digite seu nome" name="nome" required>

                Semestre: <input class="form-control" type="text" placeholder="Digite o semestre" name="semestre" required>

                Período letivo: <input class="form-control" type="text" placeholder="Digite o período letivo" name="pletivo" required>

                <h4>Aula</h4>

                Código da aula: <input class="form-control" type="text" placeholder="Digite o código da aula" name="codaula" required>

                Nome da disciplina: <input class="form-control" type="text" placeholder="Digite o nome da disciplina" name="ndisciplina" required>

                Turma teórica: <input class="form-control" type="text" placeholder="Digite a turma teórica" name="turmteorica" required>

                Turma prática: <input class="form-control" type="text" placeholder="Digite a turma prática" name="turmpratica" required>

                Carga horária teórica: <input class="form-control" type="text" placeholder="Digite a carga horária teórica" name="chteorica" required>

                Carga horária prática: <input class="form-control" type="text" placeholder="Digite a carga horária prática" name="chpratica" required>

                Carga horária total: <input class="form-control" type="text" placeholder="Digite a carga horária total" name="chtotal" required>

                Docentes: <input class="form-control" type="text" placeholder="Digite o nome do docente" name="ndocente" required>

                Docentes ch: <input class="form-control" type="text" placeholder="Digite o ch do docente" name="chdocente" required>

                Semestre: <input class="form-control" type="text" placeholder="Digite o semestre" name="semestre" required>

                Período letivo: <input class="form-control" type="text" placeholder="Digite o período letivo" name="pletivo" required>

                Curso: <input class="form-control" type="text" placeholder="Digite o curso" name="curso" required>

                <h4>Cálculo semanal</h4>

                Graduação: <input class="form-control" type="text" placeholder="Digite a graduação" name="graduacao" required>

                Posgraduação: <input class="form-control" type="text" placeholder="Digite a posgraduação" name="pgraduacao" required>

                Semestre: <input class="form-control" type="text" placeholder="Digite o semestre" name="semestre" required>

                Total: <input class="form-control" type="text" placeholder="Digite o total" name="total" required>

                <h4>Pedagógica complementar</h4>

                Graduação: <input class="form-control" type="text" placeholder="Digite a graduação" name="graduacao" required>

                Posgraduação: <input class="form-control" type="text" placeholder="Digite a posgraduação" name="pgraduacao" required>

                Semestre: <input class="form-control" type="text" placeholder="Digite o semestre" name="semestre" required>

                Total: <input class="form-control" type="text" placeholder="Digite o total" name="total" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Cadastrar<br>

            </div>
        </form>
    </div>
    <br>

</body>

</html>
