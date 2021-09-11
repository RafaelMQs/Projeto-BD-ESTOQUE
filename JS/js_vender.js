let formV = document.getElementById("formV");
let formAdd = document.getElementById("formAdd");
let idV = document.getElementById("idV");
let quantV = document.getElementById("quantV");
let idAdd = document.getElementById("idAdd");
let quantAdd = document.getElementById("quantAdd");

formV.addEventListener("submit", (event) => {
    event.preventDefault();
    const form_dataV = new FormData(formV);

    const Vender = fetch('../PHP/processo/vender.php', {
        method: 'POST',
        body: form_dataV
    }).then(response => response.json()).then(data => data)

    console.log(Vender);

    var tb = document.querySelector(".tabela");
    var tb_linhas = tb.rows.length;
    var linhas = tb.insertRow(tb_linhas);

    var cellId = linhas.insertCell(0);
    var cellQuantV = linhas.insertCell(1);
    var cellQuantAdd = linhas.insertCell(2);

    cellId.innerHTML = idV.value;
    cellQuantV.innerHTML = quantV.value;

});

formAdd.addEventListener("submit", (event) => {
    event.preventDefault();
    const form_dataAdd = new FormData(formAdd);

    const Adicionar = fetch('../PHP/processo/adiciona.php', {
        method: 'POST',
        body: form_dataAdd
    }).then(response => response.json()).then(data => data)

    console.log(Adicionar);
    if (idAdd.value == "" & quantAdd.value == "") {
        alert("Campos Vazios");
    } else if(idAdd.value == "" | quantAdd.value == ""){
        alert("Um Dos Campos Esta Vazio");
    } else {
        var tb = document.querySelector(".tabela");
        var tb_linhas = tb.rows.length;
        var linhas = tb.insertRow(tb_linhas);

        var cellId = linhas.insertCell(0);
        var cellQuantV = linhas.insertCell(1);
        var cellQuantAdd = linhas.insertCell(2);

        cellId.innerHTML = idAdd.value;
        cellQuantAdd.innerHTML = quantAdd.value;
    }

});
