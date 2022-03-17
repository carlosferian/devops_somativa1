<?php 
    session_start();
    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'nao') {
        header('Location:login.php?login=erro2');
    } 
    $acao = 'consulta_donos';
    require 'script_controlador.php'; 
    //print_r($usuarios)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empresta Coisas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php include 'barra_de_navegacao.php';?> 
                <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
                    <div class="bg-success pt-2 text-white d-flex justify-content-center">
                    <h5>Novo objeto cadastrado com sucesso</h5>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3.5">
                <?php include 'barra_lateral.php';?>
            </div>
                    
            <div class="col">
            <h2 class="fas fa-align-center">Cadastre um novo objeto</h2><br><br>
        <form method="POST" action="script_controlador.php?acao=cadastra_coisa">
            <div class="form-group">
                <label for="nome_coisa">Nome do objeto</label><br>
                <input class="form-control" name="nome_coisa" type="text">
            </div>
            <div class="form-group">
                <lable for="descricao">Dono</lable><br>
                <select name="id_dono" class="form-control">
                <option selected>Selecione o dono...</option>
                <?php foreach($usuarios as $usuario) {?>
                        <option name="id_dono" value="<?php echo $usuario->id_usuario?>"><?php echo $usuario->nome?></option>

                    <?php }; ?>
                </select>
            </div>
            <div>
            <button class="btn btn-secondary" type="submit" value="enviar">Enviar</button>
        </form>
            </div>
        </div>


    </div>

    
    

   
    

   
</html>