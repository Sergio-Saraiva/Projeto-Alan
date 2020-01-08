<?php include('cabecalho.php'); ?>
</br>
<div class="row no-gutters justify-content-center text-center">
    <p style="font-size: 5rem;" class="text-black-50">
        <i class="fa fa-exclamation-triangle" aria-hidden="true">
        </i>
    </p>

<h1 class="text-center text-black-50">
    <p style="max-width:38rem; padding-top:0.8rem;">
        <?php 
        if(isset($_GET['alerta']) && $_GET['alerta']==1){
            echo "Operação não autorizada pelo servidor.";
        }else{
            echo "Página não existe ou você não tem permissão para acessá-la.";
        }
        ?>
    </p>
</h1>
</div>
</br>
<?php include('rodape.php'); ?>