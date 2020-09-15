<?php
class Produto{
    private $id_produto;
    private $nome_produto;
    private $valor;
    private $tamanho;
    private $nome_personalizado;
    private $imagens;
    private $descricao;
    private $tipo;

    public function __construtc(){}
    public function __destrutc(){}

    public function __get($a){return $this->$a;}
    public function __set($a,$b){$this->$a=$b;}

    public function __toString(){
        nl2br("
            Nome do produto:$this->nome_produto
            valor:$this->valor
            tamanho:$this->tamanho
            nome personalizado:$this->nome_personalizado
            imagens:$this->imagens
            descrição:$this->descricao
            tipo:$this->tipo
        ");
    }

}