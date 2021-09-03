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
    function buscarFuncionario($funcionarios, $first_name) {

        $funcionariosFiltro = [];
        foreach($funcionarios as $funcionario) {
            if($funcionario->first_name == $first_name) {
                $funcionariosFiltro[] = $funcionario;
            }
        }
        return $funcionariosFiltro;
    }

?>