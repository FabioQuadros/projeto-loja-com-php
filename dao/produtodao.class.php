<?php
require 'conexaobanco.class.php';
class ProdutoDAO {
    private $conexao = null;

   public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
   }
   public function __destruct(){}

   public function cadastrarProduto($p){
       try{
            $stat = $this->conexao->prepare("insert into produto(nome_produto,tamanho,valor,nome_personalizado,imagens,descricao,tipo) values(?,?,?,?,?,?,?)");
            $stat->bindValue(1,$p->nome_produto);
            $stat->bindValue(2,$p->tamanho);
            $stat->bindValue(3,$p->valor);
            $stat->bindValue(4,$p->nome_personalizado);
            $stat->bindValue(5,$p->imagens);
            $stat->bindValue(6,$p->descricao);
            $stat->bindValue(7,$p->tipo);
            $stat->execute();
       }catch(PDOExeption $e){
        echo "erro ao cadastrar PRODUTO".$e;
       }
   }

   public function buscarProduto(){
    try {
       $stat = $this->conexao->query("select * from produto");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
       return $array;
    }catch(PDOException $pe){
       echo "erro ao buscar!".$pe;
    }
  }
}