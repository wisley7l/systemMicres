console.log('Controlador de Funções em Js');

function cadastramedicao(cod) {
  console.log(cod);
  if (isNaN(cod) != true || cod != undefined) {
    console.log("OK"); // cadastra medição
  }else {
    console.log("novo"); // lista peneu
  }

}

function listafunc(){
  window.location.href = "/listafunc.php";
}
function listaempresa(){
  window.location.href = "/listaempresa.php";
}
function cadastraempresa(){
  window.location.href = "/cadastraempresa.php";
}


function clickcadastraempresa(){
  var cnpj = $("input#cnpj-cad")[0].value;
  var nome = $("input#nomeempresa-cad")[0].value;
  if(cnpj.toString().length != 14){
  alert("Seu CNPJ não possui 14 Digitos o que imposibilita seu cadastro!");
  }else {
    window.location.href = "/cadastraempresa.php?cnpj=" + cnpj + "&nome=" + nome ;
  }
  console.log();
  // window.location.href = "/cadastraempresa.php";
}
//

function buscaempresa(id) {

  window.location.href = "/buscaempresa.php?cnpj=" + cnpj;

}
