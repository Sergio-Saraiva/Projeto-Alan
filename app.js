//requisição da api
var hcnpj = document.getElementById('cnpj');
hcnpj.addEventListener("blur", function () {
    var cnpj = hcnpj.value.replace('.', '').replace('.', '').replace('/', '').replace('-', '');
    console.log(cnpj); 
    var url = "https://cors-anywhere.herokuapp.com/https://www.receitaws.com.br/v1/cnpj/" + cnpj;

    console.log(url);

    if(cnpj != "______________"){
        axios.get(url, {type: 'GET', crossDomain: true, dataType: 'jsonp', headers :{
            "Access-Control-Allow-Origin":"*",
            "Content-Type": "application/jsonp",
        }}).then(function(response) {
            console.log(response);
            renderElement(response);
        }).catch(function(error) {
            console.log(error);
        })
    }
});  

//mostrar dados recebidos da api
function renderElement(json) {
    var status = json.data.status; 
    if( status == "OK" ){
        var rsocial = document.getElementById('rsocial');
        rsocial.value = json.data.nome;

        var fantasia = document.getElementById('fantasia');
        fantasia.value = json.data.fantasia;

        var email = document.getElementById('email');
        email.value = json.data.email;

        var logradouro = document.getElementById('logradouro');
        logradouro.value = json.data.logradouro;
        
        var numero = document.getElementById('numero');
        numero.value = json.data.numero;

        var bairro = document.getElementById('bairro');
        bairro.value = json.data.bairro;
        
        var telefone = document.getElementById('telefone');
        var aux = json.data.telefone;
        aux = aux.substring(0, 14);
        telefone.value = aux;

        var cidade = document.getElementById('cidade');
        cidade.value = json.data.municipio;

        var estado = document.getElementById('estado');
        estado.value = json.data.uf;

        var cep = document.getElementById('cep');
        cep.value = json.data.cep;
    }else{
        window.alert("CNPJ inválido ou não encontrado, digite os dados manualmente.");
    }
    
}

//responsavel por mudar o tipo de formulario
btn1 = document.getElementById('botao-juridica');
btn2 = document.getElementById('botao-fisica');
btn1.addEventListener("click", function () {
    document.getElementById('pessoa-fisica').style.display = "none";
    document.getElementById('pessoa-juridica').style.display="block";
});
btn2.addEventListener("click", function () {
    document.getElementById('pessoa-fisica').style.display = "block";
    document.getElementById('pessoa-juridica').style.display="none";
});

//responsavel por aceitar varios telefones
var inputOriginal = document.getElementById('telefone');
    inputOriginal.setAttribute('name', 'telefone[]');

//Responsável pela criação de mais campos de telefone
var c=1;
addtelefone = document.getElementById('addtelefone');
addtelefone.addEventListener("click", function () {
    c++;
    var div = document.createElement('div');
    div.setAttribute('class', 'form-group col-md-4');
    div.setAttribute('id', 'telefone-div'+c);
    
    var label = document.createElement('label');
    label.setAttribute('for', 'telefone'+c);
    label.innerHTML = 'Telefone '+ c;

    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'number');
    input.setAttribute('id', 'telefone'+c);
    input.setAttribute('name', 'telefone[]');
    input.setAttribute('placeholder', '(__)_____-____');

    var divT = document.getElementById('divT');
    divT.appendChild(div);
    div.appendChild(label);
    div.appendChild(input);

    
    console.log("add:", c);
});
//responsavel por remover o ultimo campo de telefone
subtelefone = document.getElementById('subtelefone');
subtelefone.addEventListener("click", function () {
    var elemento = document.getElementById('telefone-div'+c);
    elemento.parentNode.removeChild(elemento);
    c--;
    console.log(c);
});

//responsavel por adicionar mais campos de endereço
var e = 1;
var addendereco = document.getElementById('addendereco');
addendereco.addEventListener("click", function () {
   var divEnd = document.getElementById('divEnd');
   var div = document.createElement('div');
   div.setAttribute('class', 'form-group');
   var label = document.createElement('label');
   label.setAttribute('for', 'nome');
   label.innerHTML = 'Nome';
   var input = document.createElement('input');
   input.setAttribute('class', 'form-control');
   input.setAttribute('type', 'text');
   input.setAttribute('name', 'nome[]');
   input.setAttribute('id', 'nome');

   divEnd.appendChild(div);
   div.appendChild(label);
   div.appendChild(input);

   div2 = document.createElement('div')
   div2.setAttribute('class', 'form-row');
   var divlog = document.createElement('div');
   divlog.setAttribute('class', 'form-group col-md-6');
   var divN = document.createElement('div');
   divN.setAttribute('class', 'form-group col-md-2');
   var divB = document.createElement('div'); 
   divB.setAttribute('class', 'form-group col-md-4');
   
    var labelLog = document.createElement('label');
    labelLog.setAttribute('for','logradouro');
    labelLog.innerHTML = 'Logradouro';

    var inputLog = document.createElement('input');
    inputLog.setAttribute('class', 'form-control');
   inputLog.setAttribute('type', 'text');
   inputLog.setAttribute('name', 'logradouro[]');
   inputLog.setAttribute('id', 'logradouro');


   divEnd.appendChild(div2);
   div2.appendChild(divlog);
   divlog.appendChild(labelLog);
   labelLog.appendChild(inputLog);
   div2.appendChild(divN);
   div2.appendChild(divB);

   
});

// var addendereco = document.getElementById('addendereco');
// addendereco.addEventListener("click", function () {
    
// })


