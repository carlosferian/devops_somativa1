<?php
session_start();
if(!isset($_SESSION['autenticado']) or $_SESSION['autenticado'] == 'nao') {
        header('Location:login.php?login=erro2');
    } 
?>

<?php 
    $acao = "consulta_todos";
    require 'script_controlador.php';
    
    //echo '<pre>';
    //print_r($coisas_emprestadas);
    //echo '</pre>';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empresta Coisas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="row">
        <div class="col"><?php include 'barra_de_navegacao.php';?></div>
        <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Novo empréstimo cadastrado com sucesso</h5></div>
        <?php } ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3.5">
                <?php include 'barra_lateral.php' ?>
            </div>

            <div class="col">
                <table class="table table-striped table-inverse table-responsive col">
                    <thead class="thead-inverse">
                        <tr>
                            <th><h3>Todos os objetos<h3></th>
                        </tr>
                        <tr>
                            <th>Objeto</th>
                            <th>Dono</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($coisas_emprestadas as $indice => $coisa) {?>
                        <tr>
                            <td>
                                <?php echo $coisa->nome_coisa?>
                            </td>
                            <td>
                                <?php echo $coisa->nome?>
                            </td>
                            <td>
                                <?php echo $coisa->status_emprestimo?>
                            </td>
                        </tr> <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="rodape"> Rodapé </div>
</body>
</html>