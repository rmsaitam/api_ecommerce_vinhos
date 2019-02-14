# api_ecommerce_vinhos

**Premissas:** Ter o Git, Docker e Docker-composer instalados

Ambiente de desenvolvimento no Docker com Webserver Apache 2, linguagem PHP 7.2 e SGBD PostgreSQL 9.4

Utilizado biblioteca para migrations (Phinx) e rotas (Slim).

**Clonar o repositório**

`git clone https://github.com/rmsaitam/api_ecommerce_vinhos.git`

**Acessar o diretório do repositório clonado**

`cd api_ecommerce_vinhos`

**Build do ambiente**

`docker-compose build ; docker-compose up -d`

**Executar o composer para instalar as libs Phinx (migrations) e Slim (rotas)**

`docker exec -it teste-SoftExpert composer install`

**Executar o migrations**

`docker exec -it teste-SoftExpert vendor/bin/phinx migrate`

Para testar as rotas, use a ferramenta Postman com as respectivas rotas.


**Apenas se quiser acessar o container DB (opcional)**

Acessar o container do banco de dados - SGBD Postgres

`docker exec -it postgres-teste_SoftExpert bash`

Conectar na base
`psql -h 127.0.0.1 -U saitam -d ecommerce`

Listar as tabelas criadas pelo migrations Phinx

`\d`

```
ecommerce-# \d
                List of relations
 Schema |        Name        |   Type   | Owner  
--------+--------------------+----------+--------
 public | phinxlog           | table    | saitam
 public | venda_vinho        | table    | saitam
 public | venda_vinho_id_seq | sequence | saitam
 public | vendas             | table    | saitam
 public | vendas_id_seq      | sequence | saitam
 public | vinhos             | table    | saitam
 public | vinhos_id_seq      | sequence | saitam
(7 rows)

```

Feito!
