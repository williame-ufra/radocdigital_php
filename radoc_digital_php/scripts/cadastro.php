<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <!--<link rel="stylesheet" href="estilo.css">-->
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=cadastro_submit">
            <div class="col text-center">
                <h2>Cadastro do docente</h2><br>
            </div>
            <div class="mb-3">
                Nome: <input class="form-control" type="text" placeholder="Digite seu nome" name="name" required>

                CPF: <input class="form-control" type="text" placeholder="Digite seu CPF" name="cpf" required>

                Siape: <input class="form-control" type="text" placeholder="Digite seu siape" name="siape" required>

                E-mail: <input class="form-control" type="email" placeholder="Digite seu e-mail" name="email" required>

                Classe: <label for="" class="form-label"></label>
                <select class="form-select">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>

                Vínculo estatutário: <label for="" class="form-label"></label>
                <select class="form-select">
                    <option value="SIM">Sim</option>
                    <option value="NÃO">Não</option>
                </select>

                Regime de trabalho: <input class="form-control" type="text" placeholder="Digite seu regime de trabalho" name="rtrabalho" required>

                Titulação: <label for="" class="form-label"></label>
                <select class="form-select">
                    <option value="GD">Graduação</option>
                    <option value="ESP">Especialização</option>
                    <option value="MST">Mestre</option>
                    <option value="DC">Doutor</option>
                </select>


                Campus: <label for="" class="form-label"></label>
                <select class="form-select">
                    <option value="BEL">Belém</option>
                    <option value="PARAG">Paragominas</option>
                    <option value="CAP">Capanema</option>
                    <option value="CAPIT">Capitão Poço</option>
                    <option value="TOME">Tomé-Açu</option>
                    <option value="PARAU">Parauapebas</option>
                </select>


                Instituto: <label for="" class="form-label"></label>
                <select class="form-select">
                    <option value="ICA">ICA</option>
                    <option value="ISARH">ISARH</option>
                    <option value="ISPA">ISPA</option>
                    <option value="ICIBE">ICIBE</option>
                </select>

                Data: <input class="form-control" type="date" placeholder="Digite a data" name="data" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Cadastrar<br>

            </div>
        </form>
    </div>
    <br>

</body>

</html>

