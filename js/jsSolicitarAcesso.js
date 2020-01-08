function checkForm(){
    var nome = document.getElementById("solicitarNome").value;
    var funcao = document.getElementById("solicitarColaborador").value;
    var email = document.getElementById("solicitarEmail").value;
    var senha1 = document.getElementById("solicitarSenha1").value;
    var senha2 = document.getElementById("solicitarSenha2").value;
    
    
    if(nome != '' && email != '' && senha1 != '' && senha2 != '' && funcao != ''){

        if(senha1 == senha2){
            
            if(senha1.length>5 && senha1.length<21){
                //alert(senha1.length);    
                document.getElementById("alerta").style.display="none";  
                document.getElementById('enviarSolicitar').submit();


            }else{
                document.getElementById("textoAlerta").innerHTML="A senha deve conter entre 6 e 20 caracteres!";   
                document.getElementById("alerta").style.display="block";  
            }
         
        
        }else{
            document.getElementById("textoAlerta").innerHTML="As senhas não correspondem!";   
            document.getElementById("alerta").style.display="block";       
        }

    }else{
        document.getElementById("textoAlerta").innerHTML="Prencha todos os campos!";   
        document.getElementById("alerta").style.display="block";    
    }


}