<?php
require('./secure.php');

$fp = fopen("teatro.csv", "r");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de teatro</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        
       
    </style>
</head>

<body>
    <a href="../logout.php">logout</a>
    <h1>Crud de teatro</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Preço</th>
            <th>Tipo</th>
            <th>Capacidade</th>
            <th>Endereço</th>
        </tr>
        <?php while (($row = fgetcsv($fp)) !== false) : ?>
            <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td>
                    <?php
                    if ($row[2] == 1) {
                        echo 'Drama';
                    } else if ($row[2] == 2) {
                        echo 'Comedia';
                    } else {
                        echo 'Musical';
                    }
                    ?>
                </td>
                <td><?= $row[3] ?></td>
                <td><?= $row[4] ?></td>
               
                <td><a href="delete.php?name=<?= $row[0] ?>">Delete</a></td>
                <td><a href="edit.php?name=<?= $row[0] ?>">Edit</a></td>
            </tr>
        <?php endwhile ?>
    </table>
    <form action="create.php" method="POST">
        <label>Nome</label>
        <input type="text" name="name">
       
        <label>Preço</label>
        <input type="number" min="1" name="password">
       
        <label>Tipo de espetáculo</span>
            <select name="tipo_de_espetaculo">
                <option value="1">Drama</option>
                <option value="0">Comedia</option>
                <option value="2">Musical</option>
            </select>
        <label>Capacidade</label>
        <input type="number" min="1" name="capacidade">
       
        <label>Endereço</label>
        <input type="text" name="endereco">
            <button>Send</button>
    </form>
</body>
</html>