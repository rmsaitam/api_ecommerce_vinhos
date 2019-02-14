<?php 

namespace controllers;

  require_once 'conectaBanco.php';

  class Vendas extends conectaBanco{
    public function finalizar(){
      global $app;
      $dados = json_decode($app->request->getBody(), true);
      $dados = (sizeof($dados)==0)? $_POST : $dados;
      $keys = array_keys($dados);
      $sth = $this->conecta()->prepare("INSERT INTO vendas
        (data, descricao, frete)
        VALUES (:date, :descricao, :frete)
        RETURNING id");
      $sth ->bindValue(':date',$dados['date']);
      $sth ->bindValue(':descricao',$dados['descricao']);
      $sth ->bindValue(':frete',$dados['frete']);

      $sth->execute();
      $data = $sth->fetch();
      $lastId = $data[0];

      unset($dados['date']);
      unset($dados['descricao']);
      unset($dados['frete']);

      $this->vincularVinho($lastId, $dados['vinhos']);

      $app->render('default.php',["data"=>['id'=>$lastId]],200);
    }

    private function vincularVinho($idVenda, $dados){
      $quantidade_vinhos = count($dados);
      for($i=0; $i<$quantidade_vinhos; $i++){
        $vinhos = $dados[$i];
        $keys = array_keys($vinhos);

        $sth = $this->conecta()->prepare("INSERT INTO venda_vinho
          (venda_id ,".implode(',', $keys).")
          VALUES (:venda_id, :".implode(",:", $keys).")
          RETURNING id");
        $sth ->bindValue(':venda_id', $idVenda);
        foreach ($vinhos as $key => $value) {
          $sth ->bindValue(':'.$key,$value);
        }
        $sth->execute();
      }
    }
  }
