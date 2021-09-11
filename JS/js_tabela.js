const modal = document.querySelector("#modal");
const container = document.querySelector(".container");
const h1 = document.querySelector("#titulo");
const botao = document.querySelector("#botao");
const id_prod = document.querySelector("#id");
const quant_prod = document.querySelector("#quant");
const valor_prod = document.querySelector("#valor");
const desc_prod = document.querySelector("#desc");

function OnModal(){
    modal.removeAttribute("hidden", "hidden");
    id_prod.setAttribute("hidden", "hidden");
    quant_prod.removeAttribute("hidden", "hidden");
    valor_prod.removeAttribute("hidden", "hidden");
    desc_prod.removeAttribute("hidden", "hidden");
    h1.innerHTML="Cadastrar";
    botao.value="Cadastrar";
    container.style.opacity = ".2";
}

function OffModal(){
    modal.setAttribute("hidden", "hidden");
    id_prod.setAttribute("hidden", "hidden");
    container.style.opacity = "1";
}

function OnModalE(){
    modal.removeAttribute("hidden", "hidden");
    id_prod.removeAttribute("hidden", "hidden");
    quant_prod.removeAttribute("hidden", "hidden");
    valor_prod.removeAttribute("hidden", "hidden");
    desc_prod.removeAttribute("hidden", "hidden");
    container.style.opacity = ".2";
    h1.innerHTML="Editar";
    botao.value="Editar";
}

function OnModalD(){
    modal.removeAttribute("hidden", "hidden");
    id_prod.removeAttribute("hidden", "hidden");
    quant_prod.setAttribute("hidden", "hidden");
    valor_prod.setAttribute("hidden", "hidden");
    desc_prod.setAttribute("hidden", "hidden");
    container.style.opacity = ".2";
    h1.innerHTML="Deletar";
    botao.value="Deletar";
}