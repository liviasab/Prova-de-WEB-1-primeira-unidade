<?php
require('secure.php');

$name = $_GET['name'];

$fp = fopen("teatro.csv","r");

$found = false;
$data = null;

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name){
        $found = true;
        $data = $row;
    }
}

if(!$found){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Atualização</h>
    <h3>Name: <?=$data[0]?></h3>
    <h3>Preço: <?=$data[1]?></h3>
    <h3>Capacidade: <?=$data[3]?></h3>
    <h3>Endereço: <?=$data[4]?></h3>


    <form action="update.php" method="POST">
        <input type="hidden" value="<?=$data[0]?>" name="id">
       
        <label>Name</label>
        <input value="<?=$data[0]?>" type="text" name="name">

        <label>Preço</label>
        <input value="<?=$data[1]?>" type="number" min="1" name="password">

        <select name="tipo_de_espetaculo">
            <option value="1" <?=$data[2] == 1 ? "selected" : "" ?>>Drama</option>
            <option value="0" <?=$data[2] == 0 ? "selected" : "" ?>>Comedia</option>
            <option value="2" <?=$data[2] == 2 ? "selected" : "" ?>>Musical</option>
        </select>
        <label>Capacidade</label>
        <input value="<?=$data[3]?>"type="number" min="1" name="capacidade">
        
        <label>Endereço</label>
        <input value="<?=$data[4]?>" type="text" name="endereco">
       
        <button>Save</button>
    </form>
</body>
</html>