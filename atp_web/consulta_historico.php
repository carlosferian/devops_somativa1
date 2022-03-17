<?php 
    session_start();
    //print_r($_SESSION);
    if(!isset($_SESSION['autenticado']) or $_SESSION['autenticado'] == 'nao') {
        
        header('Location:login.php?login=erro2');
    } 
    
    $acao = "consulta_historico";
    require 'script_controlador.php';

    //echo '<pre>';
    //print_r($emprestimos);
    //echo '</pre>'

    
    //echo '<pre>';
    //print_r($coisas_emprestadas);
    //echo '</pre>';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empresta Coisas</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col"><?php include 'barra_de_navegacao.php';?></div>
        <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Novo empréstimo cadastrado com sucesso</h5></div>
        <?php } ?>
    </div>

    <div class="row">

        <div class="col-3.5">
            <?php include 'barra_lateral.php' ?>
        </div>
        <div class="col">
            <table class="table table-striped table-inverse table-responsive col-sm-8">
                <thead class="thead-inverse">
                        <th><h3>Histórico de empréstimos<h3></th>
                    <tr>
                        <th>Objeto</th>
                        <th>Data Empréstimo</th>
                        <th>Data Devolução</th>
                        <th>Emprestado para:</th>
                    </tr>
                </thead>
                <tbody>                
                    <?php foreach($emprestimos as $indice => $emprestimo) {?>
                        <tr>                            
                            <td><?php echo $emprestimo->nome_coisa?></td>
                            <td><?php echo $emprestimo->data_emprestimo?></td>
                            <td><?php echo $emprestimo->data_devolucao?></td>
                            <td><?php echo $emprestimo->nome_amigo?>
                            </td>                             
                        </tr> <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div> 
</div>
<div id="rodape"> Rodapé </div>
</body>
</html>