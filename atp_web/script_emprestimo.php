<?php 
class EmprestimoService {
    private $conexao;
    private $emprestimo;

    public function __construct(Conexao $conexao, Emprestimo $emprestimo) {
        $this->conexao = $conexao->conectar();
        $this->emprestimo = $emprestimo;
    }

    public function inserir() {
        $querry = 'INSERT INTO emprestimo(id_coisa, nome_amigo, email_amigo) VALUE (:id_coisa, :nome_amigo, :email_amigo); UPDATE coisa SET status_emprestimo = "Emprestado" WHERE id_coisa = :id_coisa';
        $stmt = $this->conexao->prepare($querry);
        $stmt->bindValue(':id_coisa', $this->emprestimo->__get('id_coisa'));
        $stmt->bindValue(':nome_amigo', $this->emprestimo->__get('nome_amigo'));
        $stmt->bindValue(':email_amigo', $this->emprestimo->__get('email_amigo'));
        //$stmt->bindValue(':data_devolucao', $this->emprestimo->__get('data_devolucao'));
        $stmt->execute();
    }

    public function recuperar(){
        $querry = 'SELECT coisa.nome_coisa, emprestimo.data_emprestimo, emprestimo.data_devolucao, emprestimo.nome_amigo FROM coisa RIGHT JOIN emprestimo ON coisa.id_coisa = emprestimo.id_coisa';

        $stmt = $this->conexao->prepare($querry);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar(){

    }
    public function devolver(){
        $querry = 'UPDATE coisa SET status_emprestimo = "Disponível" WHERE id_coisa = (SELECT id_coisa FROM emprestimo WHERE id_emprestimo = :id_emprestimo); UPDATE emprestimo SET data_devolucao = :data_devolucao WHERE id_emprestimo = :id_emprestimo'; 
        

        $stmt = $this->conexao->prepare($querry);
        $stmt->bindValue(':id_emprestimo', $this->emprestimo->__get('id_emprestimo'));
        $stmt->bindValue(':data_devolucao', $this->emprestimo->__get('data_devolucao'));
        $stmt->execute();

    }
}


?>