<?php
header('Access-Control-Allow-Headers: X-Requested-With ,Origin, Content-Type, X-Auth-Token , Authorization');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,HEAD,POST,DELETE ');
header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);
