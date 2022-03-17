<?php
    session_start();
    
    require "modelo_usuario.php";
    require "script_usuario.php";
    require "script_conexao.php";

    $usuario_autenticado = false;
    $administrador = false;
    

    $usuario = new Usuario();
    $conexao = new Conexao();
    $usuarioService = new UsuarioService($conexao, $usuario);
    $usuarios = $usuarioService->recuperar('todos');
    //print_r($_POST);

    
    foreach($usuarios as $usuario) {
        if($usuario->email == $_POST['email'] && $usuario->senha == $_POST['senha']) {
            $usuario_autenticado = true;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email; 
            $_SESSION['id'] = $usuario->id_usuario;
            if($usuario->status_administrador){
                $_SESSION['administrador'] = $usuario->id_usuario;

            }

            break;
        }
    }
    if($usuario_autenticado) {
        //echo 'autenticado';
        $_SESSION['autenticado'] = 'sim';
        header('Location: principal.php');
        //print_r($_SESSION);
    } else {
        $_SESSION['autenticado'] = 'nao';
        //print_r($_SESSION);
        header('Location: login.php?login=erro');
    };


    if(isset($_GET['sair'])){
        session_unset();
        header('Location:index.php');
    }
?>