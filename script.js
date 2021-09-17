"use strict"

function showFormCadastrar() {
    document.querySelector(".cadastrar-novo-funcionario").style.display = "flex"
}

function exitFormCadastrar() {
    document.querySelector(".cadastrar-novo-funcionario").style.display = "none"
}

function deletar(idFuncionario) {
    let confirmacao = confirm("Realmente deseja deletar este(a) funcionário(a)?")

    //se confirmar que quer apagar, redireciona para o arquivo de ação
    if (confirmacao) {
        //redireciona à acaoDeletar
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}


function editar(idFuncionario) {

    window.location = "editar.php?id=" + idFuncionario;

}