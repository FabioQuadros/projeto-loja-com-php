<?php
require 'conexaobanco.class.php';

class UsuarioDAO {

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function cadastrarUsuario($u){
    try {
      $stat = $this->conexao->prepare("insert into cad_adm(id_adm,nome,login,senha)values(null,?,?,?)");
      $stat->bindValue(1,$u->nome);
      $stat->bindValue(2,$u->login);
      $stat->bindValue(3,$u->senha);
      $stat->execute();
    } catch (PDOException $e) {
      echo "Erro ao cadastrar usuario".$e;
    }
  }

  public function alterarUsuario($u){
    try {
      $stat = $this->conexao->prepare("update cad_adm set nome=?, login=?, senha=?, where id_adm=?");
      $stat->bindValue(1,$u->nome);
      $stat->bindValue(2,$u->login);
      $stat->bindValue(3,$u->senha);      
      $stat->bindValue(4,$u->id_adm);
      $stat->execute();
    } catch (PDOException $e) {
      echo "Erro ao alterar usuario".$e;
    }
  }

  public function buscarUsuario(){
    try{
      $stat = $this->conexao->query("select * from cad_adm");
      $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');
  		return $array;
    }catch(PDOException $e){
      echo "Erro ao filtrar usuario! ".$e;
    }
  }

  public function filtrarUsuario($query){
    try{
      $stat = $this->conexao->query("select * from cad_adm ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');
  		return $array;
    }catch(PDOException $e){
      echo "Erro ao filtrar usuario! ".$e;
    }
  }

  public function deletarUsuario($id){
    try {
   $stat = $this->conexao->prepare("delete from cad_adm where id_adm = ?");
   $stat->bindValue(1, $id);
   $stat->execute();
    } catch (PDOException $pe) {
   echo "Erro ao excluir!".$pe;
    }
  }

  public function verificarUsuario($u){
    try{
      $stat = $this->conexao->query("select * from cad_adm where login='$u->nome' and senha='$u->senha'");
      $usuario = null;
      $usuario = $stat->fetchObject($usuario);
      return $usuario;
    }catch(PDOException $e){
      echo "Erro ao verificar usuario! ".$e;
    }
  }
}
