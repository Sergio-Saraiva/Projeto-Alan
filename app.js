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