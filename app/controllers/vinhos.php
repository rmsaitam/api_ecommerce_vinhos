<?php 

namespace controllers;

  require_once 'conectaBanco.php';

  class Vinhos extends conectaBanco{

    public function lista(){
      global $app;
      $sth = $this->conecta()->prepare("SELECT * FROM vinhos");
      $sth->execute();
      $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
      $app->render('default.php',["data"=>$result],200);
    }

    public function get($id){
      global $app;
      $sth = $this->conecta()->prepare("SELECT * FROM vinhos WHERE id = :id");
      $sth ->bindValue(':id',$id);
      $sth->execute();
      $result = $sth->fetch(\PDO::FETCH_ASSOC);
      $app->render('default.php',["data"=>$result],200);
    }

    public function inserir(){
      global $app;
      $dados = json_decode($app->request->getBody(), true);
      $dados = (sizeof($dados)==0)? $_POST : $dados;
      $keys = array_keys($dados);
      $sth = $this->conecta()->prepare("INSERT INTO vinhos (".implode(',', $keys).") VALUES (:".implode(",:", $keys).") RETURNING id");
      foreach ($dados as $key => $value) {
        $sth ->bindValue(':'.$key,$value);
      }
      $sth->execute();
      $data = $sth->fetch();
      $lastId = $data[0];
      $app->render('default.php',["data"=>['id'=>$lastId]],200);
    }

    public function editar($id){
      global $app;
      $dados = json_decode($app->request->getBody(), true);
      $dados = (sizeof($dados)==0)? $_POST : $dados;
      $sets = [];
      foreach ($dados as $key => $VALUES) {
        $sets[] = $key." = :".$key;
      }

      $sth = $this->conecta()->prepare("UPDATE vinhos SET ".implode(',', $sets)." WHERE id = :id");
      $sth ->bindValue(':id',$id);
      foreach ($dados as $key => $value) {
        $sth ->bindValue(':'.$key,$value);
      }
      //Retorna status da edição
      $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
    }

    public function excluir($id){
      global $app;
      $sth = $this->conecta()->prepare("DELETE FROM vinhos WHERE id = :id");
      $sth ->bindValue(':id',$id);
      $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
    }

  }