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
  window.location.href = "/cadastraempresa.php?cnpj=" + "&info=c&json=";
}
//
function cadastrafuncionario(){
  window.location.href = "/cadastrafunc.php?cpf=" + "&info=c&json=";
}
//
function buscaempresa(cnpj) {
  window.location.href = "/buscaempresa.php?cnpj=" + cnpj;
}
//
function editaempresa(cnpj) {
  window.location.href = "/cadastraempresa.php?cnpj=" + cnpj + "&info=u&json=" ;
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
  window.location.href = "/cadastrafunc.php?cpf=" + cpf + "&info=u&json=" ;
}
//
function deletefuncionario(cpf,nome,tipo) {
  // alert("TEM CERTEZA QUE DESEJA DELETAR FUNCIONÁRIO DE CPF: "+cpf+" NOME: " + nome +" ?");
  // window.location.href = "/cadastrafunc.php?cpf=" + cpf + "&info=u&json=" ;
  var x;
  //recebemos o valor do botão pressionado ok ou cancelar em uma variavel
  var r=confirm("TEM CERTEZA QUE DESEJA DELETAR FUNCIONÁRIO DE CPF: "+cpf+" NOME: " + nome +" ?");
  if (r==true){
    var json = 'cpf,'+ cpf + ','+ nome + ','+ tipo;
    var v1 = MD5(json);
    window.location.href = "/cadastrafunc.php?cpf=" + cpf + "&info=d&json=" + v1;
  }
}


function clickcadastraempresa(){
  var cnpj = $("input#cnpj-cad")[0].value;
  var nome = $("input#nomeempresa-cad")[0].value;

  var json = 'cpf,'+ cnpj + ','+ nome;
  var v1 = MD5(json);
  var url = window.location.search;
  var s = url.split("&")[1].split("=")[1];
  if(cnpj.toString().length != 14){
  alert("Seu CNPJ não possui 14 Digitos o que imposibilita seu cadastro!");
  }else {
    // window.location.href = "/cadastraempresa.php?cnpj=" + cnpj + "&nome=" + nome ;
    // console.log(cpf);
    // console.log(nome);
    // console.log(json);
    // window.location.href = "/cadastrafunc.php?cpf=" + cnpj + "&info=" + s + "&json=" + v1;
  }
}

function clickcadastrafunc(){
  console.log("OK");
  var cpf = $("input#cpf-cad")[0].value;
  var nome = $("input#nome-cad")[0].value;
  var radio1 = $("input#r-adm-cad")[0].checked;
  var radio = $("input#r-func-cad")[0].checked;
  // console.log(radio1);
  // console.log(radio);
  if (radio1 == true) {
  var tipo = 0
  }
  if (radio == true) {
  var tipo = 1
  }
  // var json = '{"cpf":'+ cpf + ',"nome":'+ nome + ',"tipo":'+ tipo + ' }'
  var json = 'cpf,'+ cpf + ','+ nome + ','+ tipo;
  var v1 = MD5(json);
  var url = window.location.search;
  var s = url.split("&")[1].split("=")[1];
  // console.log(s);
  if(cpf.toString().length != 11){
  alert("Seu CPF não possui 11 Digitos o que imposibilita seu cadastro!");
  }else {
    console.log(cpf);
    console.log(nome);
    console.log(json);
    window.location.href = "/cadastrafunc.php?cpf=" + cpf + "&info=" + s + "&json=" + v1;
  }
}
