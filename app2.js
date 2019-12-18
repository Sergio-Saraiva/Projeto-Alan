// Pegando o valor selecionado no Radio 
function getRadioValor(name){
    var rads = document.getElementsByName(name);
    for(var i = 0; i < rads.length; i++){
        if(rads[i].checked){
            return rads[i].value;
        }
    }
    return null;
}


$(function(){

    //Pesqusia sem refresh
    $("#razao_psq").keyup(function(){
        var pesquisa = $(this).val();

        var valormarcado = String(getRadioValor('tipoDeBusca'));

        //verificar se há algo digitado

        if(pesquisa != ''){

            

            var dados = {
                palavra : pesquisa,
                tipodebusca: valormarcado
            }

            $.post('busca-pessoa-juridica.php',dados, function(retorna){
                //Mostra dentro da div resultado os resultados obtidos
                $(".resultado_psq").html(retorna);
            });
            document.getElementById("resultado_psq").style.display = "block";
            document.getElementById("resultado").style.display = "none";
            document.getElementById("alignpaginacao").style.display = "none";
        }else{
            document.getElementById("resultado_psq").style.display = "none";
            document.getElementById("resultado").style.display = "block";
            document.getElementById("alignpaginacao").style.display = "block";
        }    
        
    });


    // VOLTOU A FUNCIONAR
    $("#nomeP").keyup(function(){
        var pesquisa = $(this).val();
        
        //verificar se há algo digitado

        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('busca-pessoa-fisica.php',dados, function(retorna){
                //Mostra dentro da div resultado os resultados obtidos
                $(".resultado_psq_2").html(retorna);
            });
            document.getElementById("resultado_psq_2").style.display = "block";
            document.getElementById("resultado_2").style.display = "none";
            document.getElementById("alignpaginacao_2").style.display = "none";
        }else{
            document.getElementById("resultado_psq_2").style.display = "none";
            document.getElementById("resultado_2").style.display = "block";
            document.getElementById("alignpaginacao_2").style.display = "block";
        }    
        
    });
    

        //Verificando qual campo está selecionado
        var c1; var c2;

        setInterval( function() {
            if(buscarnocnpj.checked){ 
                // alert("opa! tem que selecionar!");
               
                if(c1==1){
                    $('#razao_psq').attr('placeholder','CNPJ');
                    $("#razao_psq").mask("99.999.999/9999-99");
                }
                if(c1==10){
                    c1 = 2;
                }
                c1=c1+1;
                c2=0;
            }

            if(buscarnarazao.checked){ 
                // alert("opa! tem que selecionar!");
                
                if(c2==1){
                      $('#razao_psq').attr('placeholder','Razão Social');
                      $("#razao_psq").mask("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                      $("#razao_psq").unmask();
                }
                if(c2==10){
                    c2 = 2;
                }
                c2=c2+1;
                c1=0;
             }


        }, 500 );

          //Fim de verificação    

   
});

function aguardar(){
    document.getElementById("alerta").style.display = "block";
}
   