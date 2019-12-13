$(function(){
    //Pesqusia sem refresh
    $("#razao_psq").keyup(function(){
        var pesquisa = $(this).val();
        
        //verificar se há algo digitado

        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
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
        }else{
            document.getElementById("resultado_psq_2").style.display = "none";
            document.getElementById("resultado_2").style.display = "block";
        }    
        
    });

  

});