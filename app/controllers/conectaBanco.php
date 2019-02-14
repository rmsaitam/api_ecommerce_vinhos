<?php 
namespace controllers;

  abstract class conectaBanco{

    protected function conecta(){
      try{
        $con = new \PDO("pgsql:host=db;dbname=ecommerce", 
          "saitam", "123456");
        return $con;
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }
  }
