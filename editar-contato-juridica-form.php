<?php 
    include 'config.php';
    include 'cabecalho.php';

    $empresa = new Empresa();

    $id = $_GET['id'];
    $lista = $empresa->selecionaContatoPorId($id);
    $emailContatos = $empresa->contatosEmpresaEmails($id);
    $telefoneContatos = $empresa->contatosEmpresaTelefones($id);
?>
<h1>Edição de Contato</h1>
<hr>
<h1>Contato</h1>
<form action="atualiza-contato-juridica.php" method="POST">
    <div id="divCont">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeResponsavel">Nome do Responsável</label>
                <input class="form-control" type="text" name="nomeResponsavel" id="nomeResponsavel" value="<?php echo $lista[0]['nomeResp'] ?>">
                <input type="hidden" name="id" id="" value="<?php echo $lista[0]['idcontato_juridica'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="setor">Setor</label>
                <input class="form-control" type="text" name="setor" id="setor" value="<?php echo $lista[0]['setor'] ?>">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6" id="divEmailC">
        <?php foreach($emailContatos as $dados){ ?>
            <label for="emailcont">E-Mail</label>
            <input id="emailcont" name="emailcont[1][]" type="email" class="form-control" value="<?php echo $dados['email'] ?>" required>
            <input type="hidden" name="idEmail[]" value="<?php echo $dados['idemail_contato_juridica'] ?>">
            <div class="invalid-feedback">
                Obrigatório
            </div>
        <?php } ?>
        </div>
            <div class="form-group col-md-6" id="divTel">
            <?php foreach($telefoneContatos as $dados){ ?>
                <label for="telefonecont">Telefone</label>
                <input class="form-control phone_with_ddd" type="number" id="telefonecont" name="telefonecont[1][]"  placeholder="(__) ____-____" value="<?php echo $dados['telefone_contato_juridica'] ?>" required>
                <input type="hidden" name="idTelefone[]" value="<?php echo $dados['idtelefone_contato_juridica'] ?>">
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            <?php } ?>
            </div>
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
</div>
    </form>
<?php
    include 'rodape.php';
?>