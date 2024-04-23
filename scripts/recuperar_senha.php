<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <!-- Adicione seus estilos CSS aqui -->
    <link rel="stylesheet" href="seu_arquivo_de_estilos.css">
</head>
<body>
    <div class="container">
        <form class="form-signin" method="POST" action="">
            <h2 class="form-signin-heading text-center">Recuperação de Senha</h2>
            <div style="padding-bottom: 20px;">
                <label for="email" class="sr-only">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar Senha</button>
            <div class="text-center" style="margin-top: 20px;">
                Lembrou? <a href="login.php">Clique aqui</a> para fazer login.
            </div>
        </form>
    </div>
</body>
</html>
