<?php
    require('secure.php');
    $id = $_POST['id'];

    $name = $_POST['name'];
    $preco = $_POST['password'];
    $tipo = $_POST['tipo_de_espetaculo'];
    $capacidade = $_POST['capacidade'];
    $endereco = $_POST['endereco'];
    

$temp = tempnam(".","");
$fpOrigin = fopen("teatro.csv","r");
$fpTemp = fopen($temp,'w');

while (($row = fgetcsv($fpOrigin))!==false){
    if($row[0] != $id){
        fputcsv($fpTemp,$row);
    }else{
        fputcsv($fpTemp, [$name, $preco, $tipo, $capacidade, $endereco]);
    }
}

fclose($fpOrigin);
fclose($fpTemp);

rename($temp,"teatro.csv");
header("location: ./index.php");
exit();
