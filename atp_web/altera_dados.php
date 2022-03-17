<?php
session_start();
//print_r($_SESSION);
if(!isset($_SESSION['autenticado']) or $_SESSION['autenticado'] == 'nao') {
        
        header('Location:login.php?login=erro2');
    } else {
        $acao = "consulta_donos";
        require 'script_controlador.php';
        foreach($usuarios as $usuario){
            if ($usuario->id_usuario == $_SESSION['id']){
                $usuario_logado = $usuario;
            break;
            }
        }
    }

?>
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
    <?php if(isset($_GET['alterado']) && $_GET['alterado'] == 1) { ?>
                    <div class="bg-success pt-2 text-white d-flex justify-content-center">
                    <h5>Alteração cadastrada com sucesso</h5>
                </div>
                <?php } ?>

    <div class="row">
        <div class="col-3.5">
            <?php include 'barra_lateral.php';?>
        </div>

    <div class="col">
        <h2 class="fas fa-align-center">Alterar dados cadastrais</h2>
        <form action="script_controlador.php?acao=altera_nome&id=<?php echo $_SESSION['id'];?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome: <strong><?php echo $usuario_logado->nome; ?></strong></label><br>
                <input class="form-control" type="text" name="nome">
                <button class="btn btn-secondary" type="submit" value="altera_nome">Alterar</button><br>
            </div>
            </form>
            <form action="script_controlador.php?acao=altera_email&id=<?php echo $_SESSION['id'];?>" method="POST">
            <div class="form-group">
                <label for="email">e-mail:  <strong><?php echo $usuario_logado->email; ?></strong></label><br>
                <input class="form-control" type="email" name="email">
                <button class="btn btn-secondary" type="submit" value="altera_email">Alterar</button><br>
            </div>
            </form>
            <form action="script_controlador.php?acao=altera_senha&id=<?php echo $_SESSION['id'];?>" method="POST">
            <div class="form-group">
                <label for="senha">Senha</label><br>
                <input  class="form-control" type="password" name="senha">                
                <button class="btn btn-secondary" type="submit" value="altera-senha">Alterar</button><br>
            </div>
        </form>
    </div>

</html>