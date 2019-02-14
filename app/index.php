<?php
$loader = require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

$app->get('/vinhos/', function() use ($app){
	(new \controllers\Vinhos($app))->lista();
});

$app->get('/vinhos/:id', function($id) use ($app){
	(new \controllers\Vinhos($app))->get($id);
});

$app->options('/vinhos/', function() use ($app){
	(new \controllers\Vinhos($app))->inserir();
});$app->post('/vinhos/', function() use ($app){
	(new \controllers\Vinhos($app))->inserir();
});

$app->put('/vinhos/:id', function($id) use ($app){
	(new \controllers\Vinhos($app))->editar($id);
});

$app->options('/vinhos/:id', function($id) use ($app){
	(new \controllers\Vinhos($app))->excluir($id);
});$app->delete('/vinhos/:id', function($id) use ($app){
	(new \controllers\Vinhos($app))->excluir($id);
});

$app->post('/vendas/', function() use ($app){
  (new \controllers\Vendas($app))->finalizar();
});

$app->run();
