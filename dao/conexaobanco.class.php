<?php
class ConexaoBanco extends PDO {

  private static $instance = null;

  public function __construct($dsn,$user,$pass){

      parent::__construct($dsn,$user,$pass);
  }
  public static function getInstance(){
    if(!isset(self::$instance)){
      try{

        self::$instance = new ConexaoBanco("mysql:dbname=id14846191_camisateen;host=localhost","id14846191_root","NvS_9=Ptn8$)F&zQ");
      }catch(PDOException $e){
        echo "Erro ao conectar! ".$e;
      }
    }
    return self::$instance;
  }
}