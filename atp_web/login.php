<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empresta Coisas</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!--barra de navegação-->
    <?php include 'barra_de_navegacao.php';?>
    <section class="container">
        <h2>Login</h2>
        <form action="script_autentica.php", method="POST">
        <div class="form-row">
            <div class="col-md-6">
                <label for="e-mail">E-mail</label><br>
                <input class="form-control" type="text" name="email"><br>
                <?php
                    if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                    <div class='text-danger'>Usuário ou senha invalido(s)</div>
                <?php }; ?> 
                <?php
                    if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                    <div class='text-danger'>Faça login antes de acessar à página</div>
                <?php }; ?> 
            </div>
            <div class="col-md-3">
                <label for="senha">Senha</label><br>
                <input class="form-control" type="password" name="senha"><br>               
            </div>

        </div>
        <button class="btn btn-secondary" type="submit" value="enviar">Enviar</button>
        </form>
    </section>

</html>