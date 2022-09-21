<?php
require_once "Registros.php";

header('Content-Type: application/json');
$data = [];

$type = $_REQUEST['type'] ?? null;
$id = $_REQUEST['id'] ?? 0 ;
$deleted = $_REQUEST['deleted'] ?? 0; 

$reg = new Registros;
$reg ->setId($id);


if ($type === "duvida") 
{
    $reg->setDeleted($deleted);
    $reg->setType($type);

    $data["registros"] = $reg->filterRegistroType();
}

die(json_encode($data));