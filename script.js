"use strict"

function showFormNota(nomeFuncionario) {
    document.querySelector(".container-form-nota").style.display = "flex"
    document.getElementById("nomeAluno").value = nomeAluno
}

function exitFormNota() {
    document.querySelector(".container-form-nota").style.display = "none"
}