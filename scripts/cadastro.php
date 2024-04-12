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
</head>

<body>
    <div class="container p-5">
        <form method="post" action="?rota=cadastro_submit">
            <div class="col text-center">
                <h2>Cadastro do docente</h2><br>
            </div>
            <div class="mb-3">
                <label>Nome:</label> 
                <input class="form-control" type="text" placeholder="Digite seu nome" name="name" required>

                <label>CPF:</label>  <input class="form-control" type="text" placeholder="Digite seu CPF" name="cpf" required>

                <label>Siape:</label>  <input class="form-control" type="text" placeholder="Digite seu siape" name="siape" required>

                <label>E-mail:</label>  <input class="form-control" type="email" placeholder="Digite seu e-mail" name="email" required>

                <label>Senha: </label> <input class="form-control" type="password" placeholder="Digite sua senha" name="senha" required>

                <label>Classe:</label> 
                <select class="form-select" name="classe" required>
                    <option value="">Selecione</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                    <option value="5">E</option>
                </select>

                <label>Vínculo estatutário:</label> 
                <select class="form-select" name="vinculo" required>
                    <option value="">Selecione</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>

                <label>Regime de trabalho:</label> 
                <select class="form-select" name="regime_de_trabalho" required>
                    <option value="">Selecione</option>
                    <option value="DE">DE</option>
                    <option value="20">20h</option>
                    <option value="40">40h</option>
                </select>


                <label>Titulação:</label> 
                <select class="form-select" name="titulacao" required>
                    <option value="">Selecione</option>
                    <option value="1">Graduação</option>
                    <option value="2">Especialização</option>
                    <option value="3">Mestre</option>
                    <option value="4">Doutor</option>
                </select>

                <label>Campus:</label> 
                <select class="form-select" name="campus" required>
                    <option value="">Selecione</option>
                    <option value="1">Belém</option>
                    <option value="2">Paragominas</option>
                    <option value="3">Capanema</option>
                    <option value="4">Capitão Poço</option>
                    <option value="5">Tomé-Açu</option>
                    <option value="6">Parauapebas</option>
                </select>

                <label>Instituto:</label> 
                <select class="form-select" name="instituto" required>
                    <option value="">Selecione</option>
                    <option value="1">ICA</option>
                    <option value="2">ISARH</option>
                    <option value="3">ISPA</option>
                    <option value="4">ICIBE</option>
                </select>

                <label>Data:</label>  <input class="form-control" type="date" placeholder="Digite a data" name="data" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
    <br>

</body>

</html>