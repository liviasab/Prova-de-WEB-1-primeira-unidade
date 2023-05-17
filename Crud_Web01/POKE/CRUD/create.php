<?php
require('secure.php');

$name = $_POST['name'];
$preco = $_POST['password'];
$tipo = $_POST['tipo_de_espetaculo'];
$capacidade = $_POST['capacidade'];
$endereco = $_POST['endereco'];

$fp = fopen("teatro.csv","r");

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name){
        header("location: ./index.php");
        exit();
    }
}
$fp = fopen("teatro.csv","a");

fputcsv($fp,[$name,$preco,$tipo,$capacidade,$endereco]);
header("location: ./index.php")

?>