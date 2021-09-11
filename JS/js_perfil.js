const usuario = document.querySelector('#usuario');
const nome = document.querySelector('#nome');
const senha = document.querySelector('#senha');
const atualizar_btn = document.querySelector('#atualizar');
const editar_btn = document.querySelector('#editar');
const arquivo = document.querySelector('#arquivo');


editar_btn.addEventListener("click", editar);
function editar(){
    usuario.classList.remove("disabled");
    usuario.removeAttribute('disabled');

    nome.classList.remove("disabled");
    nome.removeAttribute('disabled');

    senha.classList.remove("disabled");
    senha.removeAttribute('disabled');

    atualizar_btn.removeAttribute("hidden");
    editar_btn.setAttribute("hidden", "hidden");

    arquivo.classList.remove("disabled");
    arquivo.removeAttribute('disabled');

}