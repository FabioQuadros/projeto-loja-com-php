<?php
class Usuario{
    private $id_adm;
    private $nome;
    private $login;
    private $senha;

    public function __construct(){}
    public function __destruct(){}

    public function __get($a){return $this->$a;}
    public function __set($a, $b){$this->$a = $b;}

    public function __toString(){
        nl2br("Nome: $this->nome Login: $this->login senha:$this->senha");
    }
}