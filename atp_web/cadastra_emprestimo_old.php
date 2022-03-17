<?php 
    session_start();
    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'nao') {
        header('Location:login.php?login=erro2');
    } 
    $acao = 'consulta_disponiveis';
    require 'script_controlador.php';
    
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
    <!--barra de navegação-->
    <?php include 'barra_de_navegacao.php';?>
    </div>
    <!--mensagem de confirmação de inclusão de novo usuário com sucesso-->
    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Novo empréstimo cadastrado com sucesso</h5>
    </div>
    <?php } ?>  
      
    <div class="container app">
        <h2>Cadastro de Empréstimo</h2><br>
        <form method="POST" action="script_controlador.php?acao=cadastra_emprestimo">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome_coisa">Nome do objeto</label><br>
                    <select name="id_coisa" class="form-control">
                    <option selected>Selecione o objeto...</option>
                    <?php foreach($coisas_disponiveis as $coisa) {?>
                        <option name="id_coisa" value="<?php echo $coisa->id_coisa?>"><?php echo $coisa->nome_coisa?></option>
                    <?php }; ?>
                    
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="data_devolucao">Data da devolucao (opcional)</label><br>
                    <input class="form-control" type="date" name="data_devolucao"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3"> 
                    <label for="destinatario">Nome do destinatário</label><br>
                    <input class="form-control" type="text" name="nome_amigo"><br>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="contato_destinatario">E-mail do destinatário</label><br>
                    <input class="form-control" type="email" name="email_amigo"><br>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" value="#">Enviar</button>
        </form>
    </div>
</html>