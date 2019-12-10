$(function(){
    //Pesqusia sem refresh
    $("#razao_psq").keyup(function(){
        var pesquisa = $(this).val();
        
        //verificar se há algo digitado

        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('busca-empresas.php',dados, function(retorna){
                //Mostra dentro da div resultado os resultados obtidos
                $(".resultado_psq").html(retorna);
            });
            document.getElementById("resultado_psq").style.display = "block";
            document.getElementById("resultado").style.display = "none";
        }else{
            document.getElementById("resultado_psq").style.display = "none";
            document.getElementById("resultado").style.display = "block";
        }    
        
    });
});