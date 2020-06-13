console.log('Controlador de Funções em Js');

function cadastramedicao(cod) {
  // console.log(cod);
  if (isNaN(cod) != true || cod != undefined) {
    console.log("OK"); // cadastra medição
  }else {
    console.log("novo"); // lista peneu
  }
}
//
function listafunc(){
  window.location.href = "/listafunc.php";
}
//
function listaempresa(){
  window.location.href = "/listaempresa.php";
}
//
function cadastraempresa(){
  window.location.href = "/cadastraempresa.php";
}
//
function buscaempresa(cnpj) {
  window.location.href = "/buscaempresa.php?cnpj=" + cnpj;
}
//
function buscaveiculo(placa) {
  // console.log("PLACA" + placa);
  window.location.href = "/buscaveiculo.php?placa=" + placa;
}
//
function buscapneu(cod) {
  // console.log("PLACA" + cod);
  window.location.href = "/buscapneu.php?cod=" + cod;
}
//
function buscafunc(cpf) {
  window.location.href = "/cadastrafunc.php?cpf=" + cpf + "&json=u" ;
}

function clickcadastraempresa(){
  var cnpj = $("input#cnpj-cad")[0].value;
  var nome = $("input#nomeempresa-cad")[0].value;
  if(cnpj.toString().length != 14){
  alert("Seu CNPJ não possui 14 Digitos o que imposibilita seu cadastro!");
  }else {
    window.location.href = "/cadastraempresa.php?cnpj=" + cnpj + "&nome=" + nome ;
  }
}

function clickcadastrafunc(){
  console.log("OK");
  var cpf = $("input#cpf-cad")[0].value;
  var nome = $("input#nome-cad")[0].value;
  var radio1 = $("input#r-adm-cad")[0].checked;
  // var radio = $("input#r-func-cad")0].checked;
  // console.log(radio1);
  // console.log(radio);
  // if (radio1 == true) {
  // var tipo = 0
  // }
  // if (radio == true) {
  // var tipo = 1
  // }
  console.log(tipo);
  // if(cpf.toString().length != 11){
  // alert("Seu CPF não possui 14 Digitos o que imposibilita seu cadastro!");
  // }else {
  //   window.location.href = "/cadastraempresa.php?cnpj=" + cnpj + "&nome=" + nome ;
  // }
}
