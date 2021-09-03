<?php

    require("./funcoes.php");

    $funcionarios = lerArquivo("empresaX.json");

    if(isset($_GET["buscarFuncionario"]) && $_GET["buscarFuncionario"] != ""){
        $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>X</title>
</head>
<body>
    <header>
        <h1>Funcionários da empresa X</h1>
        <h3>A empresa conta com <?= count($funcionarios) ?> funcionários</h3>
    </header>
    <main>
        <form>
            <input type="text" value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>" name="buscarFuncionario" placeholder="Buscar Funcionários">
            <button>Buscar</button>
            <button class="cadastrar" onclick="showFormNota('<?= $funcionario['first_name'] ?>')">Cadastrar</button>
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Gender</th>
                <th>IP Address</th>
                <th>Country</th>
                <th>Department</th>
            </tr>
            <?php
            foreach($funcionarios as $funcionario) :
            ?>
            <tr>
                <td><?= $funcionario->id ?></td>
                <td><?= $funcionario->first_name ?></td>
                <td><?= $funcionario->last_name ?></td>
                <td><?= $funcionario->email ?></td>
                <td><?= $funcionario->gender ?></td>
                <td><?= $funcionario->ip_address ?></td>
                <td><?= $funcionario->country ?></td>
                <td><?= $funcionario->department ?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="cadastrar-novo-funcionario">
            <form action="GET">
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="sobrenome" placeholder="Sobrenome">
                <input type="text" name="email" placeholder="E-mail">
                <input type="text" name="sexo" placeholder="Sexo">
                <input type="text" name="enderecoIp" placeholder="Endereço IP">
                <input type="text" name="pais" placeholder="País">
                <input type="text" name="departamento" placeholder="Departamento">
                <button>Cadastrar</button>
                <button onclick="exitFormNota()">Cancelar</button>
            </form>
        </div>   
    </main>
    <footer>Pedro Monteiro</footer>
</body>
</html>