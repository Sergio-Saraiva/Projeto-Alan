btn_juridica = document.getElementById('busca-juridica');
btn_fisica = document.getElementById('busca-fisica');

//Mostrar elementos de pessoa jurídica
btn_juridica.addEventListener("click", function () {
   btn_juridica.setAttribute('class','btn btn-primary');
   btn_fisica.setAttribute('class','btn btn-secondary');
   document.getElementById('visivel2').style.display = "none";
   document.getElementById('visivel1').style.display="block";
});

//Mostrar elementos de pessoa física
btn_fisica.addEventListener("click", function () {
    btn_juridica.setAttribute('class','btn btn-secondary');
    btn_fisica.setAttribute('class','btn btn-primary');
    document.getElementById('visivel2').style.display = "block";
    document.getElementById('visivel1').style.display="none";
});

//Verificando se a ágina deve começar mostrando pessoa física ou jurídica

//Função para pegar os dados enviados via Get da URL
var qs = (function(a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i)
    {
    var p=a[i].split('=', 2);
    if (p.length == 1)
    b[p[0]] = "";
    else
    b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
  })(window.location.search.substr(1).split('&'));
  
  //Criando a variável pra comparação e mostragem de dados 
  var varGet1 = qs["p"]; // 123
  if(varGet1==1){
    btn_juridica.setAttribute('class','btn btn-secondary');
    btn_fisica.setAttribute('class','btn btn-primary');
    document.getElementById('visivel2').style.display = "block";
    document.getElementById('visivel1').style.display="none";
  }
  
  var delay=0100; //0.1 seconds
setTimeout(function(){
    document.getElementById('loading').style.display = "none";
    document.getElementById('conteudo').style.display="block";
        //your code to be executed after 1 seconds
},delay);

  



