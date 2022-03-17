<?php 
    require "modelo_coisa.php";
    require "modelo_emprestimo.php";
    require "modelo_usuario.php";
    require "script_conexao.php";
    require "script_usuario.php";
    require "script_coisa.php";
    require "script_emprestimo.php";

    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //echo $acao;

    if ($acao == 'cadastrar_usuario') {
        if($_POST['senha'] == $_POST['senha_confirma']) {
            $usuario = new Usuario();
            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);
            $usuario->__set('cpf', $_POST['cpf']);  
            $conexao = new Conexao();  
            $usuarioService = new UsuarioService($conexao, $usuario);
            $usuarioService->inserir();
            header('Location: cadastra_usuario.php?inclusao=1');
        } else {
            header('Location: cadastra_usuario.php?inclusao=0');
        }

    }

    else if ($acao == 'altera_senha'){
        $usuario = new Usuario();
        $usuario->__set('senha', $_POST['senha']);
        $usuario->__set('id', $_GET['id']);
        $conexao = new Conexao(); 
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->alterar($acao);
        print_r($usuario);
        header('Location: altera_dados.php?alterado=1');
    }
    else if ($acao == 'altera_nome'){
        $usuario = new Usuario();
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('id', $_GET['id']);
        $conexao = new Conexao(); 
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->alterar($acao);
        header('Location: altera_dados.php?alterado=1');
    }
    else if ($acao == 'altera_email'){
        $usuario = new Usuario();        
        $usuario->__set('email', $_POST['email']);     
        $usuario->__set('id', $_GET['id']);   
        $conexao = new Conexao();  
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->alterar($acao);
        //print_r($usuario);
        //print_r($usuarioService);
        header('Location: altera_dados.php?alterado=1');
    }

    else if ($acao == 'cadastra_coisa') {
        $coisa = new Coisa();
        $coisa->__set('nome_coisa', $_POST['nome_coisa']);        
        $coisa->__set('id_dono', $_POST['id_dono']);  
    
        $conexao = new Conexao();  
    
        $$coisaService = new CoisaService($conexao, $coisa);
        $$coisaService->inserir();
    
        header('Location: cadastra_coisa.php?inclusao=1');
    }

    else if ($acao =='cadastra_emprestimo') {        
        $emprestimo = new Emprestimo();
        //$emprestimo ->__set('id_dono', $_POST['id_dono']);
        $emprestimo ->__set('id_coisa', $_POST['id_coisa']);
        $emprestimo ->__set('nome_amigo', $_POST['nome_amigo']);
        $emprestimo ->__set('email_amigo', $_POST['email_amigo']);
         
        $conexao = new Conexao();  
    
        $emprestimoService = new EmprestimoService($conexao, $emprestimo);
        $emprestimoService->inserir();
                
        header('Location: cadastra_emprestimo.php?inclusao=1');
    }

    else if ($acao == 'consulta_emprestimo') {
        $coisa = new Coisa();
        $conexao = new Conexao();
        $coisaService = new CoisaService($conexao, $coisa);
        $coisas_emprestadas = $coisaService->recuperar($acao);


    }
    else if ($acao == 'consulta_todos') {
        $coisa = new Coisa();
        $conexao = new Conexao();
        $coisaService = new CoisaService($conexao, $coisa);
        $coisas_emprestadas = $coisaService->recuperar($acao);
    }   
    else if ($acao == "devolver") {
        $emprestimo = new Emprestimo();
        $emprestimo->__set('id_emprestimo', $_GET['id_emprestimo']);
        $emprestimo->__set('data_devolucao', date("yy-m-d"));
        $conexao = new Conexao();
        $emprestimoService = new EmprestimoService($conexao, $emprestimo);
        $emprestimoService->devolver();
        header('Location: principal.php');
        //print_r($emprestimo);

    }
    else if($acao == "consulta_disponiveis"){
        $coisa = new Coisa();
        $conexao = new Conexao();
        $coisaService = new CoisaService($conexao, $coisa);
        $coisas_disponiveis = $coisaService->recuperar($acao);
    }
    else if($acao == 'consulta_donos') {
        $usuario = new Usuario();
        $conexao = new Conexao();
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarios = $usuarioService->recuperar('todos');
    }
    else if($acao == "consulta_historico") {
        $historico = new Emprestimo();
        $conexao = new Conexao();
        $emprestimoService = new EmprestimoService($conexao, $historico);
        $emprestimos = $emprestimoService->recuperar();

    }


?>