<?php 
class CoisaService {
    private $conexao;
    private $coisa;

    public function __construct(Conexao $conexao, Coisa $coisa){
        $this->conexao = $conexao->conectar();
        $this->coisa = $coisa;
    }
    public function inserir () {
        $querry = 'INSERT INTO coisa(id_dono, nome_coisa) VALUE(:id_dono, :nome_coisa)';
        $stmt = $this->conexao->prepare($querry);
        $stmt->bindValue(':id_dono', $this->coisa->__get('id_dono'));
        $stmt->bindValue(':nome_coisa', $this->coisa->__get('nome_coisa'));
        $stmt->execute();
    }
    public function recuperar($acao) {
        if ($acao == 'consulta_emprestimo') {
            $querry = 'SELECT emprestimo.data_devolucao, emprestimo.id_emprestimo, coisa.nome_coisa, emprestimo.nome_amigo, emprestimo.prazo_devolucao FROM coisa, emprestimo WHERE coisa.id_coisa = emprestimo.id_coisa AND coisa.status_emprestimo = "emprestado" AND emprestimo.data_devolucao IS NULL';
        } else if($acao == 'consulta_todos') {
            $querry = 'SELECT coisa.nome_coisa, coisa.status_emprestimo, usuario.nome FROM coisa, usuario WHERE coisa.id_dono = id_usuario ORDER BY status_emprestimo';
        } else if($acao == 'consulta_disponiveis') {
            $querry = 'SELECT nome_coisa, id_coisa, id_dono FROM coisa WHERE status_emprestimo = "disponível" ORDER BY nome_coisa'; 
        }

        $stmt = $this->conexao->prepare($querry);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    
    public function atualizar(){
    }
    public function remover(){

    }
}


?>