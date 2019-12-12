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


axios.get("https://servicodados.ibge.gov.br/api/v1/localidades/estados").then(function (response) {
    console.log(response);
    renderElementEstado(response);
}).catch(function (error) {
    console.log(error);
});

//mostrar dados recebidos da api de estados
function renderElementEstado(json) {
    var select = document.getElementById('estado');
    var tam = json.data.length;

    for(i = 0; i<tam; i++){
        var option = document.createElement('option');
        option.value = json.data[i].sigla;
        option.innerHTML = json.data[i].nome;
        select.appendChild(option);    
    }
    
}


//mostrar dados recebidos da api de cnpj
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
   e++;
   var divEnd = document.getElementById('divEnd');
   
   //cria elemento de nome
   var div = document.createElement('div');
   div.setAttribute('class', 'form-group');
   div.setAttribute('id', 'div'+e);
   var label = document.createElement('label');
   label.setAttribute('for', 'nome');
   label.innerHTML = 'Nome '+e;
   var input = document.createElement('input');
   input.setAttribute('class', 'form-control');
   input.setAttribute('type', 'text');
   input.setAttribute('name', 'nome[]');
   input.setAttribute('id', 'nome');

   divEnd.appendChild(div);
   div.appendChild(label);
   div.appendChild(input);


   //cira elementos de logradouro numero e bairro
   div2 = document.createElement('div')
   div2.setAttribute('class', 'form-row');
   div2.setAttribute('id', 'div2'+e);
   var divlog = document.createElement('div');
   divlog.setAttribute('class', 'form-group col-md-6');
   var divN = document.createElement('div');
   divN.setAttribute('class', 'form-group col-md-2');
   var divB = document.createElement('div'); 
   divB.setAttribute('class', 'form-group col-md-4');
   
   var labelLog = document.createElement('label');
   labelLog.setAttribute('for','logradouro');
   labelLog.innerHTML = 'Logradouro '+e;

   var inputLog = document.createElement('input');
   inputLog.setAttribute('class', 'form-control');
   inputLog.setAttribute('type', 'text');
   inputLog.setAttribute('name', 'logradouro[]');
   inputLog.setAttribute('id', 'logradouro');
   
   var labelN = document.createElement('label');
   labelN.setAttribute('for','numero');
   labelN.innerHTML = 'Nº '+e;

   var inputN = document.createElement('input');
   inputN.setAttribute('class', 'form-control');
   inputN.setAttribute('type', 'number');
   inputN.setAttribute('name', 'numero[]');
   inputN.setAttribute('id', 'numero');

   var labelB = document.createElement('label');
   labelB.setAttribute('for','bairro');
   labelB.innerHTML = 'Bairro '+e;

   var inputB = document.createElement('input');
   inputB.setAttribute('class', 'form-control');
   inputB.setAttribute('type', 'text');
   inputB.setAttribute('name', 'bairro[]');
   inputB.setAttribute('id', 'bairro');


   divEnd.appendChild(div2);
   div2.appendChild(divlog);
   divlog.appendChild(labelLog);
   divlog.appendChild(inputLog);
   div2.appendChild(divN);
   divN.appendChild(labelN);
   divN.appendChild(inputN);
   div2.appendChild(divB);
   divB.appendChild(labelB);
   divB.appendChild(inputB);

    //cria elementos de cidade, estado e cep
    var div3 = document.createElement('div');
    div3.setAttribute('class', 'form-row');
    div3.setAttribute('id', 'div3'+e);
    var divC = document.createElement('div');
    divC.setAttribute('class', 'form-group col-md-4');
    var divE = document.createElement('div');
    divE.setAttribute('class', 'form-group col-md-4');
    var divCep = document.createElement('div');
    divCep.setAttribute('class', 'form-group col-md-4');

    var labelC = document.createElement('label');
    labelC.setAttribute('for','cidade');
    labelC.innerHTML = 'Cidade '+e;

    var inputC = document.createElement('input');
    inputC.setAttribute('class', 'form-control');
    inputC.setAttribute('type', 'text');
    inputC.setAttribute('name', 'cidade[]');
    inputC.setAttribute('id', 'cidade');

    var labelE = document.createElement('label');
    labelE.setAttribute('for','estado');
    labelE.innerHTML = 'Estado '+e;

    var selectE = document.createElement('select');
    selectE.setAttribute('class', 'custom-select');
    selectE.setAttribute('name', 'estado[]');
    selectE.setAttribute('id', 'estado');

    var labelCep = document.createElement('label');
    labelCep.setAttribute('for','cep');
    labelCep.innerHTML = 'CEP '+e;

    var inputCep = document.createElement('input');
    inputCep.setAttribute('class', 'form-control');
    inputCep.setAttribute('type', 'number');
    inputCep.setAttribute('name', 'cep[]');
    inputCep.setAttribute('id', 'cep');

    divEnd.appendChild(div3);
    div3.appendChild(divC);
    divC.appendChild(labelC);
    divC.appendChild(inputC);

    div3.appendChild(divE)
    divE.appendChild(labelE);
    divE.appendChild(selectE);

    div3.appendChild(divCep);
    divCep.appendChild(labelCep);
    divCep.appendChild(inputCep);

    renderElementEstado();   
});

var subendereco = document.getElementById('subendereco');
subendereco.addEventListener("click", function () {
    var div = document.getElementById('div'+e);
    var div2 = document.getElementById('div2'+e);
    var div3 = document.getElementById('div3'+e);
    
    div.parentNode.removeChild(div);
    div2.parentNode.removeChild(div2);
    div3.parentNode.removeChild(div3);
    e--;
})

// var addendereco = document.getElementById('addendereco');
// addendereco.addEventListener("click", function () {
    
// })


