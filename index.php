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
    <script src="script.js" defer></script>
    <title>Empresa X</title>
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
            <button type="button" class="cadastrar" onclick="showFormCadastrar()">Cadastrar</button>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Gender</th>
                <th>IP Address</th>
                <th>Country</th>
                <th>Department</th>
                <th>Ações</th>
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
                <td class="icons">
                    <form action="acoes.php" method="post">
                        <button type="button" onclick="editar(<?= $funcionario->id ?>)"><img src="icons/botao-atualizar.png" alt="atualizar"></button>
                        <button type="button" onclick="deletar(<?= $funcionario->id ?>)"><img src="icons/lixeira-de-reciclagem.png" alt="lixeira"></button>
                    </form>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="cadastrar-novo-funcionario">
            <form action="acoes.php" method="POST">
                <input type="number" name="id" id="id" placeholder="ID">
                <input type="text" name="first_name" id="nomeFuncionario" placeholder="Nome">
                <input type="text" name="last_name" placeholder="Sobrenome">
                <input type="text" name="email" placeholder="E-mail">
                <input type="text" name="gender" placeholder="Sexo">
                <input type="text" name="ip_address" placeholder="Endereço IP">
                <input type="text" name="country" placeholder="País">
                <input type="text" name="department" placeholder="Departamento">
                <button>Cadastrar</button>
                <button type="button">Cancelar</button>
            </form>
        </div>
        <div class="excluir-funcionario">
            <form action="acoes.php" method="POST">
                <h1>Tem certeza de que deseja excluí-lo(a)?</h1>
                <p>Se sim, digite o ID dele(a):</p>
                <input type="text" name="confirmar">
                <button>Excluir</button>
            </form>
        </div>  
    </main>
    <footer>Pedro Monteiro</footer>
</body>
</html>