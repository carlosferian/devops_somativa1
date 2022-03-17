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


    <!--mensagem de confirmação de inclusão de novo usuário com sucesso-->
    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Novo usuário cadastrado com sucesso</h5>
    </div>
    <?php } ?>

    <section class="container">
        <h2>Cadastre-se</h2>
        <form method="POST" action="script_controlador.php?acao=cadastrar_usuario">
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome"><br>
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label for="email">e-mail</label>
                    <input class="form-control" type="email" id="email" name="email"><br>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cpf">CPF</label><br>
                    <input class="form-control" name="cpf" type="text" pattern="\d{3}.\d{3}.\d{3}-\d{2}$" title="Informe com pontos e traços: 000.000.000-00"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="senha">Senha</label><br>
                    <input class="form-control" type="password" name="senha" id="senha"><br>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="senha">Confirme a senha</label>
                    <input class="form-control" type="password" name="senha_confirma">
                    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 0) { ?>
                        <div class="alert alert-danger" role="alert">
                        As senhas não são iguais!
                        </div>
                    <?php } ?>
                </div>
                
            </div>
            <button class="btn btn-secondary" type="submit" value="enviar">Enviar</button>
            </div>
        </form>
    </section>

</html> 