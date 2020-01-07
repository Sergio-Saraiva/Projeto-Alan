<?php
    require_once 'Conexao.php';

    class Empresa{
        public $cnpj;
        public $razao;
        public $fantasia;
        public $email;
        public $endereco;
        public $contato;
        
        public function listar(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM juridica";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
        }

        public function novaEmpresa(){
            $conexao = Conexao::getConexao();
            
            //insere empresa na tabela juridica
            $query = "INSERT INTO juridica(cnpj, razao, fantasia) VALUES (:cnpj, :razao, :fantasia)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":cnpj", $this->cnpj);
            $stmt->bindValue(":razao", $this->razao);
            $stmt->bindValue(":fantasia", $this->fantasia);
            $stmt->execute();

            //pega id da empresa inserida
            $query = "SELECT id_juridica FROM juridica WHERE cnpj='$this->cnpj'";
            $id_sql = $conexao->query($query);
            $idV = $id_sql->fetchAll();
            foreach ($idV as $elemento) {
                $id = $elemento['id_juridica'];
            }


            //inserir na tabela endereco e telefone
            foreach ($this->endereco as $elemento) {
                $query = "INSERT INTO endereco_juridica(nome, logradouro, bairro, numero, cidade, estado, CEP, juridica_id_juridica) VALUES(:nome, :logradouro, :bairro, :numero, :cidade, :estado, :cep, :id)";
                $stmt = $conexao->prepare($query);
                $nome = $elemento['nome'];
                $stmt->bindValue(":nome", $nome);
                $logradouro = $elemento['logradouro'];
                $stmt->bindValue(":logradouro", $logradouro);
                $bairro = $elemento['bairro'];
                $stmt->bindValue(":bairro", $bairro);
                $numero = $elemento['numero'];
                $stmt->bindValue(":numero", $numero);
                $cidade = $elemento['cidade'];
                $stmt->bindValue(":cidade", $cidade);
                $estado = $elemento['estado'];
                $stmt->bindValue(":estado", $estado);
                $cep = $elemento['cep'];
                $stmt->bindValue(":cep", $cep);
                $stmt->bindValue(":id", $id);
                $stmt->execute();                
            }

            // $query = "INSERT INTO telefone_juridica(telefone_juridica, juridica_id_juridica) VALUES";
            foreach($this->telefone as $tel){
                $query = $query = "INSERT INTO telefone_juridica(telefone_juridica, juridica_id_juridica) VALUES(:tel, :id)";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":tel", $tel);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
            }

            foreach($this->email as $email){
                $query = $query = "INSERT INTO email_juridica(email_juridica, juridica_id_juridica) VALUES(:email, :id)";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
            }

        }

        //função para selecionar id da empresa por cnpj
         public function selecionaEmpresaIdPorCnpj($cnpj){
            $conexao = Conexao::getConexao();
            $query1 = "SELECT id_juridica FROM juridica WHERE cnpj='$cnpj'";
            $id_sql = $conexao->query($query1);
            $idV = $id_sql->fetchAll();
            foreach ($idV as $elemento) {
                return $id = $elemento['id_juridica'];
            }
        }

        //adiciona o responsavel de acordo com a empresa 
        public function adicionaRespContato($idEmpresa, $i){
            $conexao = Conexao::getConexao();
            $responsavel = $this->contato[$i]['nomeResp'];
            $setor = $this->contato[$i]['setor'];
            $query = "INSERT INTO contato_juridica(nomeResp, setor, juridica_id_juridica) VALUES (:responsavel, :setor, :idEmpresa)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":responsavel", $responsavel);
            $stmt->bindValue(":setor", $setor);
            $stmt->bindValue(":idEmpresa", $idEmpresa);
            $stmt->execute();
        }

        //seleciona id do contato de acordo com o nome do responsavel
        public function selecionaIdRespContato($responsavel){
            $conexao = Conexao::getConexao();
            $query = "SELECT idcontato_juridica FROM contato_juridica WHERE nomeResp='$responsavel'";
                $id_sql = $conexao->query($query);
                $idV = $id_sql->fetchAll();
                foreach ($idV as $elemento) {
                    return $id = $elemento['idcontato_juridica'];
                }
        }


        //adiciona email do contato de acordo com o id do responsavel
        public function adicionaEmailContato($idContato, $c, $i){
            $conexao = Conexao::getConexao();
            for ($aux=0; $aux < $c; $aux++) { 
                $emailResp =  $this->contato[$i]['emailResp'.$aux];
                $query = "INSERT INTO email_contato_juridica(email, contato_idcontato) VALUES (:emailResp, :idResponsavel)";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":emailResp", $emailResp);
                $stmt->bindValue(":idResponsavel", $idContato);
                $stmt->execute();
            }
        }

        //adiciona telefone do contato de acordo com o id do responsavel
        public function adicionaTelefoneContato($idContato, $c, $i){
            $conexao = Conexao::getConexao();
            for ($aux=0; $aux < $c; $aux++) { 
                $telefoneResp =  $this->contato[$i]['telefoneResp'.$aux];
                $query = "INSERT INTO telefone_contato_juridica(telefone_contato_juridica, contato_idcontato) VALUES (:telefoneResp, :idResponsavel)";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":telefoneResp", $telefoneResp);
                $stmt->bindValue(":idResponsavel", $idContato);
                $stmt->execute();
            }
        }

        public function validaCnpj(){
            $conexao = Conexao::getConexao();

            $query = "SELECT cnpj FROM juridica";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();
            $cont = 0;
            var_dump($lista);
            foreach($lista as $elemento){
                if($elemento['cnpj']==$this->cnpj){
                    return false;
                }else{
                    $cont = $cont + 1;
                    
                }
            }
            if($cont != 0){
                return true;
            }
        }

        // public function cnpjEstaVazio(){
        //     if($this->cnpj == ""){
        //         header("Location: registro.php?v=2");
        //     }else{
        //         return;
        //     }
        // }

        public function validaRazao(){
            $conexao = Conexao::getConexao();

            $query = "SELECT razao FROM juridica";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            
            $cont = 0;
        
            foreach($lista as $elemento){
                if($elemento['razao']==$this->razao){
                    return false;
                }else{
                    $cont = $cont + 1;
                }
            }
            if($cont != 0){
                return true;
            }
        }

        public function selecionaEmpresaId(){
            $query = "SELECT id FROM empresas WHERE razao='$this->razao'";
            $conexao = Conexao::getConexao();
            $id_sql = $conexao->query($query);
            $id = $id_sql->fetchAll();

            foreach ($id as $elemento) {
                return $elemento['id'];
            }
        }

        public function selecionaEmpresaNome($id){
            $query = "SELECT razao FROM juridica WHERE id_juridica= '$id'";
            $conexao = Conexao::getConexao();
            $id_sql = $conexao->query($query);
            $id = $id_sql->fetchAll();

            foreach ($id as $elemento) {
                return $elemento['razao'];
            }
        }
        
        //WG Edit

        public function listarPessoasJuridicas($inicio,$maximo){
            $conexao = Conexao::getConexao();

            $query_juridica = "SELECT * FROM juridica";
            $lista_sql = $conexao->query($query_juridica);
            $lista[2] = $lista_sql->fetchAll();

            $query_juridica_2 = "SELECT * FROM juridica ORDER BY id_juridica LIMIT $inicio,$maximo";
            $lista_sql_2 = $conexao->query($query_juridica_2);
            $lista[1] = $lista_sql_2->fetchAll();

            return $lista;
        }

        public function listarEmailPessoasJuridicas($idJuridica){
            $conexao = Conexao::getConexao();

            $query_email_principal = "SELECT * FROM email_juridica WHERE juridica_id_juridica = '$idJuridica' LIMIT 1";
            $lista_sql_1 = $conexao->query($query_email_principal);
            $lista[1] = $lista_sql_1->fetchAll();

            $query_email = "SELECT * FROM email_juridica WHERE juridica_id_juridica = '$idJuridica'";
            $lista_sql_2 = $conexao->query($query_email);
            $lista[2] = $lista_sql_2->fetchAll();

            return $lista;
        }


        public function consultaPessoasJuridicas($razao,$tBusca){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM juridica WHERE $tBusca LIKE '%$razao%'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();

            return $resultado;

        }

        public function maisInformacoesPessoaJuridica($id){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM juridica WHERE id_juridica = '$id'";
            $resultado_sql = $conexao->query($sql);

            $sql_2 = "SELECT * FROM telefone_juridica WHERE juridica_id_juridica = '$id'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $sql_3 = "SELECT * FROM endereco_juridica WHERE juridica_id_juridica = '$id'";
            $resultado_sql_3 = $conexao->query($sql_3);

            $resultado[1] = $resultado_sql->fetchAll();
            $resultado[2] = $resultado_sql_2->fetchAll();
            $resultado[3] = $resultado_sql_3->fetchAll();


            return $resultado;

        }

        
        public function contatosEmpresa($id){
            $conexao = Conexao::getConexao();

            $sql = "SELECT * FROM contato_juridica WHERE juridica_id_juridica = '$id'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();
            return $resultado;

        }

        public function contatosEmpresaEmails($idColaborador){
            $conexao = Conexao::getConexao();
            $sql_2="SELECT * FROM email_contato_juridica WHERE contato_idcontato = '$idColaborador'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $idPessoas = $resultado_sql_2->fetchAll();
            return $idPessoas;

        }
        

        public function consultaProjetos($id){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM empresas WHERE id = '$id'";
            $resultado_sql = $conexao->query($sql);

            $resultado[1] = $resultado_sql->fetchAll();

            $sql_2="SELECT * FROM projetos WHERE id_empresa = '$id'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $resultado[2] = $resultado_sql_2->fetchAll();

            return $resultado;

        }

        public function deletaPessoaJuridica($id){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM juridica WHERE id_juridica='$id'";
            $conexao->exec($query);

        }

        public function selecionaIdContatoPorIdJuridica($idJuridica){
            $conexao = Conexao::getConexao();
            $query = "SELECT idcontato_juridica FROM contato_juridica WHERE juridica_id_juridica='$idJuridica'";
            $id_sql = $conexao->query($query);
            return $id = $id_sql->fetchAll();
        }

        public function deletaTelefoneContato($idContato){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM telefone_contato_juridica WHERE contato_idcontato='$idContato'";
            $conexao->exec($query);
        }

        public function deletaEmailContato($idContato){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM email_contato_juridica WHERE contato_idcontato='$idContato'";
            $conexao->exec($query);
        }

        public function deletaContato($idJuridica){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM contato_juridica WHERE juridica_id_juridica = '$idJuridica'";
            $conexao->exec($query);
        }

        public function deletaTelefone($idJuridica){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM telefone_juridica WHERE juridica_id_juridica = '$idJuridica'";
            $conexao->exec($query);
        }

        public function deletaEmail($idJuridica){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM email_juridica WHERE juridica_id_juridica = '$idJuridica'";
            $conexao->exec($query);
        }

        public function deletaEndereco($idJuridica){
            $conexao = Conexao::getConexao();
            $query = "DELETE FROM endereco_juridica WHERE juridica_id_juridica = '$idJuridica'";
            $conexao->exec($query);
        }

        public function selecionaDadosEnderecoEmpresa($id){
            $conexao = Conexao::getConexao();
            $query = "SELECT juridica.cnpj, juridica.razao, juridica.fantasia, endereco_juridica.nome, endereco_juridica.logradouro, endereco_juridica.bairro, endereco_juridica.numero, endereco_juridica.cidade, endereco_juridica.estado, endereco_juridica.CEP FROM juridica INNER JOIN endereco_juridica ON juridica.id_juridica = endereco_juridica.juridica_id_juridica WHERE juridica.id_juridica = '$id'";
            $lista_sql = $conexao->query($query);
            $lista = $lista_sql->fetchAll();
            return $lista;
        }

        public function atualizaDadosEmpresa($id, $emailAntigo, $telefoneAntigo){
            $conexao = Conexao::getConexao();
            $query = "UPDATE juridica SET cnpj = :cnpj, razao = :razao, fantasia = :fantasia WHERE id_juridica='$id'";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":cnpj", $this->cnpj);
            $stmt->bindValue(":razao", $this->razao);
            $stmt->bindValue(":fantasia", $this->fantasia);
            $stmt->execute();

            foreach ($emailAntigo as $emailAntigoAux) {
                $query = "SELECT idemail FROM email_juridica WHERE email_juridica = '$emailAntigoAux'";
                $id_sql = $conexao->query($query);
                $idV = $id_sql->fetchAll();
                foreach ($idV as $elemento) {
                    $idEmail[] = $elemento['idemail'];
                }
            }

            $qtd = count($idEmail);

            for($i=0; $i<$qtd; $i++){
                $query = $query = "UPDATE email_juridica SET email_juridica = :email WHERE idemail='$idEmail[$i]'";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":email", $this->email[$i]);
                $stmt->execute();
            }

            foreach ($telefoneAntigo as $telefoneAntigoAux) {
                $query = "SELECT id_telefone_juridica FROM telefone_juridica WHERE telefone_juridica = '$telefoneAntigoAux'";
                $id_sql = $conexao->query($query);
                $idV = $id_sql->fetchAll();
                foreach ($idV as $elemento) {
                    $idTelefone[] = $elemento['id_telefone_juridica'];
                }
            }

            $qtd = count($idTelefone);

            for($i=0; $i<$qtd; $i++){
                $query = $query = "UPDATE telefone_juridica SET telefone_juridica = :telefone WHERE id_telefone_juridica='$idTelefone[$i]'";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":telefone", $this->telefone[$i]);
                $stmt->execute();
            }

        }

        public function atualizaEnderecoEmpresa($id){
            $conexao = Conexao::getConexao();

            $aux = 0;
            foreach ($this->endereco as $elemento) {
                $query = "UPDATE endereco_juridica SET nome = :nome, logradouro = :logradouro, bairro = :bairro, numero = :numero, cidade = :cidade, estado= :estado, CEP = :cep WHERE idEndereco='$id[$aux]'";
                $stmt = $conexao->prepare($query);
                $nome = $elemento['nome'];
                $stmt->bindValue(":nome", $nome);
                $logradouro = $elemento['logradouro'];
                $stmt->bindValue(":logradouro", $logradouro);
                $bairro = $elemento['bairro'];
                $stmt->bindValue(":bairro", $bairro);
                $numero = $elemento['numero'];
                $stmt->bindValue(":numero", $numero);
                $cidade = $elemento['cidade'];
                $stmt->bindValue(":cidade", $cidade);
                $estado = $elemento['estado'];
                $stmt->bindValue(":estado", $estado);
                $cep = $elemento['cep'];
                $stmt->bindValue(":cep", $cep);
                $stmt->execute();
                $aux++;
            }

        }


        // public function razaoEstaVazio(){
        //     if($this->razao == ""){
        //         header("Location: registro.php?v=2");
        //     }else{
        //         return;
        //     }
        // }
}
?>