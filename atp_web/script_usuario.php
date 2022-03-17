<?php 
class UsuarioService {
    private $conexao;
    private $usuario;

    public function __construct(Conexao $conexao, Usuario $usuario){
        $this->conexao = $conexao->conectar();
        $this->usuario = $usuario;
    }
    public function inserir () {
        $querry = 'insert into usuario(nome, email, senha, cpf) values(:nome, :email, :senha, :cpf)';
        $stmt = $this->conexao->prepare($querry);
        $stmt->bindValue(':nome', $this->usuario->__get('nome'));
        $stmt->bindValue(':email', $this->usuario->__get('email'));
        $stmt->bindValue(':senha', $this->usuario->__get('senha'));
        $stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
        $stmt->execute();
    }
    public function recuperar($perfil) {
        if($perfil == "todos"){
            $querry = 'SELECT id_usuario, nome, email, senha, status_administrador FROM `usuario` WHERE 1';
        }else if($perfil == "dono") {
            $querry = 'SELECT id_usuario, nome FROM usuario INNER JOIN coisa ON usuario.id_usuario = coisa.id_dono';
        }
        
        $stmt = $this->conexao->prepare($querry);
        //$stmt->bindValue(':email', $this->usuario->__get('email'));
        //$stmt->bindValue(':senha', $this->usuario->__get('senha'));
        $stmt->execute();    
        return $stmt->fetchAll(PDO::FETCH_OBJ);  

    }
    public function alterar($acao){
        if($acao == 'altera_nome') {
            $querry = 'UPDATE usuario SET nome = :nome WHERE id_usuario = :id';
            $stmt = $this->conexao->prepare($querry);
            $stmt->bindValue(':nome', $this->usuario->__get('nome'));
            $stmt->bindValue(':id', $this->usuario->__get('id'));

        } else if ($acao == 'altera_email') {
            $querry = 'UPDATE usuario SET email = :email WHERE id_usuario = :id';
            $stmt = $this->conexao->prepare($querry);
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':id', $this->usuario->__get('id'));

        } else if ($acao == 'altera_senha') {
            $querry = 'UPDATE usuario SET senha = :senha WHERE id_usuario = :id';
            $stmt = $this->conexao->prepare($querry);
            $stmt->bindValue(':senha', $this->usuario->__get('senha'));
            $stmt->bindValue(':id', $this->usuario->__get('id'));
        }        
        $stmt->execute();
           

    }
    public function remover(){

    }
}


?>