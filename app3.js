btn_juridica = document.getElementById('busca-juridica');
btn_fisica = document.getElementById('busca-fisica');

btn_juridica.addEventListener("click", function () {
   btn_juridica.setAttribute('class','btn btn-primary');
   btn_fisica.setAttribute('class','btn btn-secondary');
   document.getElementById('visivel2').style.display = "none";
document.getElementById('visivel1').style.display="block";
});

btn_fisica.addEventListener("click", function () {
    btn_juridica.setAttribute('class','btn btn-secondary');
   btn_fisica.setAttribute('class','btn btn-primary');
    document.getElementById('visivel2').style.display = "block";
    document.getElementById('visivel1').style.display="none";
});

