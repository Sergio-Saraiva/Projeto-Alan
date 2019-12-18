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

var estados;
axios.get("https://servicodados.ibge.gov.br/api/v1/localidades/estados").then(function (response) {
    console.log(response);
    estados = response;
    renderElementEstado(response, '', '');
}).catch(function (error) {
    console.log(error);
});

//mostrar dados recebidos da api de estados

function renderElementEstado(json, e, ef) {
    var select = document.getElementById('estado'+e);
    var selectf = document.getElementById('estadof'+ef);
    var tam = json.data.length;

    for(i = 0; i<tam; i++){
        var option = document.createElement('option');
        option.value = json.data[i].sigla;
        option.innerHTML = json.data[i].nome;
        select.appendChild(option);    
    }
    for(i = 0; i<tam; i++){
        var option = document.createElement('option');
        option.value = json.data[i].sigla;
        option.innerHTML = json.data[i].nome;
        selectf.appendChild(option);    
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
    btn1.setAttribute('class','btn btn-primary');
    btn2.setAttribute('class','btn btn-secondary');
});
btn2.addEventListener("click", function () {
    document.getElementById('pessoa-fisica').style.display = "block";
    document.getElementById('pessoa-juridica').style.display="none";
    btn1.setAttribute('class','btn btn-secondary');
    btn2.setAttribute('class','btn btn-primary');
});

//responsavel por aceitar varios telefones
var inputOriginal = document.getElementById('telefone');
    inputOriginal.setAttribute('name', 'telefone[]');

var inputOriginalf = document.getElementById('telefonef');
inputOriginalf.setAttribute('name', 'telefone[]');

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
   var h1 = document.createElement('h1');
   h1.innerHTML = "Endereço "+e;
   var hr = document.createElement('hr');
   
   //cria elemento de nome
   var div = document.createElement('div');
   div.setAttribute('class', 'form-group');
   div.setAttribute('id', 'div'+e);
   var label = document.createElement('label');
   label.setAttribute('for', 'nome'+e);
   label.innerHTML = 'Titulo '+e;
   var input = document.createElement('input');
   input.setAttribute('class', 'form-control');
   input.setAttribute('type', 'text');
   input.setAttribute('name', 'nome[]');
   input.setAttribute('id', 'nome'+e);

   divEnd.appendChild(div);
   div.appendChild(h1);
   div.appendChild(hr);
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
   labelLog.setAttribute('for','logradouro'+e);
   labelLog.innerHTML = 'Logradouro '+e;

   var inputLog = document.createElement('input');
   inputLog.setAttribute('class', 'form-control');
   inputLog.setAttribute('type', 'text');
   inputLog.setAttribute('name', 'logradouro[]');
   inputLog.setAttribute('id', 'logradouro'+e);
   
   var labelN = document.createElement('label');
   labelN.setAttribute('for','numero'+e);
   labelN.innerHTML = 'Nº '+e;

   var inputN = document.createElement('input');
   inputN.setAttribute('class', 'form-control');
   inputN.setAttribute('type', 'number');
   inputN.setAttribute('name', 'numero[]');
   inputN.setAttribute('id', 'numero'+e);

   var labelB = document.createElement('label');
   labelB.setAttribute('for','bairro'+e);
   labelB.innerHTML = 'Bairro '+e;

   var inputB = document.createElement('input');
   inputB.setAttribute('class', 'form-control');
   inputB.setAttribute('type', 'text');
   inputB.setAttribute('name', 'bairro[]');
   inputB.setAttribute('id', 'bairro'+e);


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
    labelC.setAttribute('for','cidade'+e);
    labelC.innerHTML = 'Cidade '+e;

    var inputC = document.createElement('input');
    inputC.setAttribute('class', 'form-control');
    inputC.setAttribute('type', 'text');
    inputC.setAttribute('name', 'cidade[]');
    inputC.setAttribute('id', 'cidade'+e);

    var labelE = document.createElement('label');
    labelE.setAttribute('for','estado'+e);
    labelE.innerHTML = 'Estado '+e;

    var selectE = document.createElement('select');
    selectE.setAttribute('class', 'custom-select');
    selectE.setAttribute('name', 'estado[]');
    selectE.setAttribute('id', 'estado'+e);

    var option = document.createElement('option');
    option.innerHTML = "Selecione o Estado"
    option.selected;
    

    var labelCep = document.createElement('label');
    labelCep.setAttribute('for','cep'+e);
    labelCep.innerHTML = 'CEP '+e;

    var inputCep = document.createElement('input');
    inputCep.setAttribute('class', 'form-control');
    inputCep.setAttribute('type', 'number');
    inputCep.setAttribute('name', 'cep[]');
    inputCep.setAttribute('id', 'cep'+e);

    divEnd.appendChild(div3);
    div3.appendChild(divC);
    divC.appendChild(labelC);
    divC.appendChild(inputC);

    div3.appendChild(divE)
    divE.appendChild(labelE);
    divE.appendChild(selectE);
    selectE.appendChild(option);

    div3.appendChild(divCep);
    divCep.appendChild(labelCep);
    divCep.appendChild(inputCep);

    renderElementEstado(estados,e, '');   
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
});

//Adiciona campo de telefone pessoa física;
var tf = 0;
var addtelefonef = document.getElementById('addtelefonef');
addtelefonef.addEventListener("click", function () {
    tf++;
    var div = document.createElement('div');
    div.setAttribute('class', 'form-group col-md-4');
    div.setAttribute('id', 'telefone-divf'+tf);
    
    var label = document.createElement('label');
    label.setAttribute('for', 'telefone'+tf);
    label.innerHTML = 'Telefone '+ tf;

    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'number');
    input.setAttribute('id', 'telefone'+tf);
    input.setAttribute('name', 'telefone[]');
    input.setAttribute('placeholder', '(__)_____-____');

    var divTf = document.getElementById('divTf');
    divTf.appendChild(div);
    div.appendChild(label);
    div.appendChild(input);

    
    console.log("add:", c);
});

//Remove o ultimo campo de telefone adicionado
var subtelefonf = document.getElementById('subtelefonef');
subtelefonf.addEventListener("click", function () {
    var elemento = document.getElementById('telefone-divf'+tf);
    elemento.parentNode.removeChild(elemento);
    tf--;
    console.log(tf);
});


//Adiciona mais campos de endereço no formulário de pessoa física;
var ef = 1;
var addenderecof = document.getElementById('addenderecof');
addenderecof.addEventListener("click", function () {
    ef++;
    var divEnd = document.getElementById('divEndf');
    var h1 = document.createElement('h1');
    h1.innerHTML = "Endereço "+ef;
    var hr = document.createElement('hr');
    
    //cria elemento de nome
    var div = document.createElement('divf');
    div.setAttribute('class', 'form-group');
    div.setAttribute('id', 'divf'+ef);
    var label = document.createElement('label');
    label.setAttribute('for', 'nome'+ef);
    label.innerHTML = 'Nome '+ef;
    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'nome[]');
    input.setAttribute('id', 'nomef'+ef);
 
    divEnd.appendChild(div);
    div.appendChild(h1);
    div.appendChild(hr);
    div.appendChild(label);
    div.appendChild(input);
 
 
    //cira elementos de logradouro numero e bairro
    div2 = document.createElement('div')
    div2.setAttribute('class', 'form-row');
    div2.setAttribute('id', 'div2f'+ef);
    var divlog = document.createElement('div');
    divlog.setAttribute('class', 'form-group col-md-6');
    var divN = document.createElement('div');
    divN.setAttribute('class', 'form-group col-md-2');
    var divB = document.createElement('div'); 
    divB.setAttribute('class', 'form-group col-md-4');
    
    var labelLog = document.createElement('label');
    labelLog.setAttribute('for','logradouro'+ef);
    labelLog.innerHTML = 'Logradouro '+ef;
 
    var inputLog = document.createElement('input');
    inputLog.setAttribute('class', 'form-control');
    inputLog.setAttribute('type', 'text');
    inputLog.setAttribute('name', 'logradouro[]');
    inputLog.setAttribute('id', 'logradourof'+ef);
    
    var labelN = document.createElement('label');
    labelN.setAttribute('for','numero'+ef);
    labelN.innerHTML = 'Nº '+ef;
 
    var inputN = document.createElement('input');
    inputN.setAttribute('class', 'form-control');
    inputN.setAttribute('type', 'number');
    inputN.setAttribute('name', 'numero[]');
    inputN.setAttribute('id', 'numerof'+ef);
 
    var labelB = document.createElement('label');
    labelB.setAttribute('for','bairro'+ef);
    labelB.innerHTML = 'Bairro '+ef;
 
    var inputB = document.createElement('input');
    inputB.setAttribute('class', 'form-control');
    inputB.setAttribute('type', 'text');
    inputB.setAttribute('name', 'bairro[]');
    inputB.setAttribute('id', 'bairrof'+ef);
 
 
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
     div3.setAttribute('id', 'div3f'+ef);
     var divC = document.createElement('div');
     divC.setAttribute('class', 'form-group col-md-4');
     var divE = document.createElement('div');
     divE.setAttribute('class', 'form-group col-md-4');
     var divCep = document.createElement('div');
     divCep.setAttribute('class', 'form-group col-md-4');
 
     var labelC = document.createElement('label');
     labelC.setAttribute('for','cidade'+ef);
     labelC.innerHTML = 'Cidade '+ef;
 
     var inputC = document.createElement('input');
     inputC.setAttribute('class', 'form-control');
     inputC.setAttribute('type', 'text');
     inputC.setAttribute('name', 'cidade[]');
     inputC.setAttribute('id', 'cidadef'+ef);
 
     var labelE = document.createElement('label');
     labelE.setAttribute('for','estadof'+ef);
     labelE.innerHTML = 'Estado '+ef;
 
     var selectE = document.createElement('select');
     selectE.setAttribute('class', 'custom-select');
     selectE.setAttribute('name', 'estado[]');
     selectE.setAttribute('id', 'estadof'+ef);
 
     var option = document.createElement('option');
     option.innerHTML = "Selecione o Estado"
     option.selected;
     
 
     var labelCep = document.createElement('label');
     labelCep.setAttribute('for','cep'+ef);
     labelCep.innerHTML = 'CEP '+ef;
 
     var inputCep = document.createElement('input');
     inputCep.setAttribute('class', 'form-control');
     inputCep.setAttribute('type', 'number');
     inputCep.setAttribute('name', 'cep[]');
     inputCep.setAttribute('id', 'cepf'+ef);
 
     divEnd.appendChild(div3);
     div3.appendChild(divC);
     divC.appendChild(labelC);
     divC.appendChild(inputC);
 
     div3.appendChild(divE)
     divE.appendChild(labelE);
     divE.appendChild(selectE);
     selectE.appendChild(option);
 
     div3.appendChild(divCep);
     divCep.appendChild(labelCep);
     divCep.appendChild(inputCep);
 
     renderElementEstado(estados, '', ef);
})

var subenderecof = document.getElementById('subenderecof');
subenderecof.addEventListener("click", function () {
    var div = document.getElementById('divf'+ef);
    var div2 = document.getElementById('div2f'+ef);
    var div3 = document.getElementById('div3f'+ef);
    
    div.parentNode.removeChild(div);
    div2.parentNode.removeChild(div2);
    div3.parentNode.removeChild(div3);
    ef  --;
});
//--------------------------------------------------------------

//funções para adicionar e remover contato de responsaveis
var cont= 1;
var addcontato = document.getElementById('addcontato');
addcontato.addEventListener("click", function () {
    cont++;
    var divCont = document.getElementById('divCont');
    //começo criação dos campos responsavel
    var div = document.createElement('div');
    div.setAttribute('class', 'form-row');
    div.setAttribute('id', 'divResp'+cont);

    divResp = document.createElement('div');
    divResp.setAttribute('class', 'form-group col-md-6');

    labelResp = document.createElement('label');
    labelResp.setAttribute('for', 'nomeResponsavel'+cont);
    labelResp.innerHTML = 'Nome do Responsável '+cont;

    inputResp = document.createElement('input');
    inputResp.setAttribute('class', 'form-control');
    inputResp.setAttribute('type', 'text');
    inputResp.setAttribute('name', 'nomeResponsavel[]');
    inputResp.setAttribute('id', 'nomeResponsavel'+cont);

    divCont.appendChild(div);
    div.appendChild(divResp);
    divResp.appendChild(labelResp);
    divResp.appendChild(inputResp);
    //fim criação dos campos de responsavel


    //inicio criação de campos do setor
    divSetor = document.createElement('div');
    divSetor.setAttribute('class', 'form-group  col-md-6');

    labelSetor = document.createElement('label');
    labelSetor.setAttribute('for', 'setor'+cont);
    labelSetor.innerHTML = 'Setor';

    inputSetor = document.createElement('input');
    inputSetor.setAttribute('class', 'form-control');
    inputSetor.setAttribute('type', 'text');
    inputSetor.setAttribute('name', 'setor[]');
    inputSetor.setAttribute('id', 'setor'+cont);

    divCont.appendChild(div);
    div.appendChild(divSetor);
    divSetor.appendChild(labelSetor);
    divSetor.appendChild(inputSetor);

    //fim da criação de campos do setor

    //inicio criação de campos de email
    div1 = document.createElement('div');
    div1.setAttribute('class', 'form-row');
    div1.setAttribute('id', 'divRespCont'+cont);

    divEmail = document.createElement('div');
    divEmail.setAttribute('class', 'form-group  col-md-6');
    divEmail.setAttribute('id', 'divEmailC'+cont);

    labelEmail = document.createElement('label');
    labelEmail.setAttribute('for', 'emailcont'+cont);
    labelEmail.innerHTML = 'E-mail';

    inputEmail = document.createElement('input');
    inputEmail.setAttribute('class', 'form-control');
    inputEmail.setAttribute('type', 'text');
    inputEmail.setAttribute('name', 'email[]');
    inputEmail.setAttribute('id', 'emailcont'+cont);

    var iE = document.createElement('i');
    iE.setAttribute('class', 'far fa-plus-square');
    iE.setAttribute('id', 'addEmailC'+cont);
    iE.setAttribute('onclick', 'addEmailC('+cont+')');

    var iE1 = document.createElement('i');
    iE1.setAttribute('class', 'far fa-minus-square');
    iE1.setAttribute('id', 'subEmailC'+cont);
    iE1.setAttribute('onclick', 'subEmailC('+cont+')');

    divCont.appendChild(div1);
    div1.appendChild(divEmail);
    divEmail.appendChild(labelEmail);
    divEmail.appendChild(iE);
    divEmail.appendChild(iE1);
    divEmail.appendChild(inputEmail);
    //fim da criação de campo de email

    //inicio criação campos de telefone
    divTel = document.createElement('div');
    divTel.setAttribute('class', 'form-group  col-md-6');
    divTel.setAttribute('id',  'divTel'+cont)

    labelTel = document.createElement('label');
    labelTel.setAttribute('for', 'telefonecont'+cont);
    labelTel.innerHTML = 'Telefone';

    inputTel = document.createElement('input');
    inputTel.setAttribute('class', 'form-control');
    inputTel.setAttribute('type', 'text');
    inputTel.setAttribute('name', 'telefone[]');
    inputTel.setAttribute('id', 'telefonecont'+cont);

    var i = document.createElement('i');
    i.setAttribute('class', 'far fa-plus-square');
    i.setAttribute('id', 'addtelefonecont'+cont);
    i.setAttribute('onclick', 'addTelefone('+cont+')');

    var i1 = document.createElement('i');
    i1.setAttribute('class', 'far fa-minus-square');
    i1.setAttribute('id', 'subtelefonecont'+cont);
    i1.setAttribute('onclick', 'subTelefone('+cont+')');

    divCont.appendChild(div1);
    div1.appendChild(divTel);
    divTel.appendChild(labelTel);
    divTel.appendChild(i);
    divTel.appendChild(i1);
    divTel.appendChild(inputTel);
    //fim criação de campos de telefone
});

var subcontato = document.getElementById('subcontato');
subcontato.addEventListener("click", function () {
    var div = document.getElementById('divResp'+cont);
    var div1 = document.getElementById('divRespCont'+cont);
    
    div.parentNode.removeChild(div);
    div1.parentNode.removeChild(div1);
    cont--;
});
//--------------------------------------------------------------


//funções de adicionar mais campos de telefone para o contato
var telCont = 1;
var addtelefonecont = document.getElementById('addtelefonecont');
addtelefonecont.addEventListener("click", function () {
    telCont++;
    var divContTel = document.getElementById('divContTel');

    var label = document.createElement('label');
    label.setAttribute('for', 'telefone');
    label.setAttribute('id', 'labelTelefoneCont'+telCont);
    label.innerHTML = 'Telefone';

    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'telefone[]');
    input.setAttribute('id', 'inputTelefoneCont'+telCont);

    divContTel.appendChild(label);
    divContTel.appendChild(input);
});

var subtelefonecont = document.getElementById('subtelefonecont');
subtelefonecont.addEventListener("click", function () {
    var elemento = document.getElementById('labelTelefoneCont'+telCont);
    var elemento1 = document.getElementById('inputTelefoneCont'+telCont);
    elemento.parentNode.removeChild(elemento);
    elemento1.parentNode.removeChild(elemento1);
    telCont--;
});
//--------------------------------------------------------------


//funcções de adicionar mais campos de email para a empresa
var qtd =0;
function addEmailJ() {
    var divEmailJ = document.getElementById('divEmailJ');
    var label = document.createElement('label');
    label.setAttribute('for', 'email');
    label.innerHTML = "E-Mail"
    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'email');
    input.setAttribute('name', 'email[]');
    input.setAttribute('id', 'email');

    divEmailJ.appendChild(label);
    divEmailJ.appendChild(input);
    qtd = qtd+1;
}

function subEmailJ() {
    var divEmailJ = document.getElementById('divEmailJ');
    if(qtd !=0){
        divEmailJ.lastChild.remove();
        divEmailJ.lastChild.remove();
    qtd--;
    }else{
        window.alert("Deve conter pelo menos um email");
    }
}
//-----------------------------------------------------------

//funções para adicionar e remover campos de cada contato de cada responsável
function addTelefone(atual) {
    var divContTel = document.getElementById('divTel'+atual);

    var divNovoTelefoneContato = document.createElement('div');
    divNovoTelefoneContato.setAttribute('class', 'form-group ');
    divNovoTelefoneContato.setAttribute('id', 'divNovoTelefoneContato'+atual);

    var label = document.createElement('label');
    label.setAttribute('for', 'telefone');
    label.setAttribute('id', 'labelTelefoneCont'+atual);
    label.innerHTML = 'Telefone';

    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'telefone[]');
    input.setAttribute('id', 'inputTelefoneCont'+atual);

    divContTel.appendChild(divNovoTelefoneContato);
    divNovoTelefoneContato.appendChild(label);
    divNovoTelefoneContato.appendChild(input);
}

function subTelefone(atual) {
    elemento = document.getElementById('divNovoTelefoneContato'+atual);
    elemento.remove();
}
//---------------------------------------------------------------

function addEmailC(atual) {
    var divEmailC = document.getElementById('divEmailC'+atual);

    var divNovoEmailContato = document.createElement('div');
    divNovoEmailContato.setAttribute('class', 'form-group');
    divNovoEmailContato.setAttribute('id', 'divNovoEmailContato'+atual);

    var label = document.createElement('label');
    label.setAttribute('for', 'inputEmailCont'+atual);
    label.setAttribute('id', 'labelEmailCont'+atual);
    label.innerHTML = 'Email';

    var input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'email');
    input.setAttribute('name', 'email[]');
    input.setAttribute('id', 'inputEmailCont'+atual);

    divEmailC.appendChild(divNovoEmailContato);
    divNovoEmailContato.appendChild(label);
    divNovoEmailContato.appendChild(input);
}

function subEmailC(atual) {
    elemento = document.getElementById('divNovoEmailContato'+atual);
    elemento.remove();
}
