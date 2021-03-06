<?php 

    //recebe o nome do arquivo
    function lerArquivo($nomeArquivo) {

        //lê o arquivo como string
        $arquivo = file_get_contents($nomeArquivo); 

        //decodifica o arquivo, transformado-o em array
        $jsonArray = json_decode($arquivo);

        //devolve o array
        return $jsonArray; 
    }

    //busca um funcionário dentro da lista e devolve uma lista com os funcionários econtrados
    function buscarFuncionario($funcionarios, $nome) {

        $funcionariosFiltro = [];
        foreach($funcionarios as $funcionario) {
            if(strpos(strtolower($funcionario->first_name), strtolower($nome)) !== false) {
                $funcionariosFiltro[] = $funcionario;
            } else if(strpos(strtolower($funcionario->last_name), strtolower($nome)) !== false) {
                $funcionariosFiltro[] = $funcionario;
            } else if(strpos(strtolower($funcionario->department), strtolower($nome)) !== false) {
                $funcionariosFiltro[] = $funcionario;
        }
        
    }
    return $funcionariosFiltro;
    }


    function adicionarFuncionario($nomeArquivo, $novoFuncionario) {

        $funcionarios = lerArquivo($nomeArquivo);

        $funcionarios[] = $novoFuncionario;

        $json = json_encode($funcionarios);

        file_put_contents($nomeArquivo, $json);
    }


    function deletarFuncionario($nomeArquivo, $idFuncionario) {

        $funcionarios = lerArquivo($nomeArquivo);

        foreach($funcionarios as $chave => $funcionario) {
            if($funcionario->id == $idFuncionario) {
                unset($funcionarios[$chave]);
            } 
        }
        $json = json_encode(array_values($funcionarios));

        file_put_contents($nomeArquivo, $json);
    }


    function buscarFuncionarioPorId($nomeArquivo, $idFuncionario) {

        $funcionarios = lerArquivo($nomeArquivo);

        foreach($funcionarios as $funcionario) {
            if ($funcionario->id == $idFuncionario) {
                return $funcionario;
            }
        }
        return false;
    }

    function editarFuncionario($nomeArquivo, $funcionarioEditado) {

        $funcionarios = lerArquivo($nomeArquivo);

        foreach($funcionarios as $chave => $funcionario) {
            if($funcionario->id == $funcionarioEditado["id"]) {
                $funcionarios[$chave] = $funcionarioEditado;
            } 
        }
        $json = json_encode(array_values($funcionarios));

        file_put_contents($nomeArquivo, $json);
    }

    //-------------------------------------------------

    function realizarLogin($usuario, $senha, $dados) {

        foreach ($dados as $dado) {
    
            if ($dado->usuario == $usuario && $dado->senha == $senha) {
                
                //variáveis de sessão
                $_SESSION["usuario"] = $dado->usuario;
                $_SESSION["id"] = session_id();
                $_SESSION["data_hora"] = date("d/m/Y - h:i:s");
    
                header("location: area_restrita.php");
                exit;
    
            } 
        }
        header("location: index.php");
    }
    
    
    //Função de verificação de login (verifica se o usuário passou pelo processo de login):
    
    function verificarLogin() {
    
        if ($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))) {
    
            header("location: index.php");
        }
    
    }
    
    
    //Função de finalização de login:
    //efetua a ação de sair do usuário destruindo a sessão
    
    function finalizarLogin() {
    
        session_unset(); //limpa aa variáveis de sessão
        session_destroy(); //destrói a sessão ativa
    
        header("location: index.php");
    
    }
?>