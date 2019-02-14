# api_ecommerce_vinhos

**Premissas:** Ter o Git, Docker e Docker-composer instalados

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

Feito!
