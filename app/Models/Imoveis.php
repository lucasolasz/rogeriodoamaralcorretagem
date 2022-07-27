<?php

class Imoveis
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarImoveis()
    {
        $this->db->query("SELECT im.*, tti.ds_tipo_imovel, ttn.ds_tipo_negociacao, tba.ds_bairro FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        ORDER BY im.publicado_em DESC");

        return $this->db->resultados();
    }



    public function listarBairros()
    {
        $this->db->query("SELECT * FROM tb_bairros ORDER BY ds_bairro");
        return $this->db->resultados();
    }


    public function listarTipoImovel()
    {
        $this->db->query("SELECT * FROM tb_tipo_imovel ORDER BY ds_tipo_imovel");
        return $this->db->resultados();
    }

    public function listarTipoNegociacao()
    {
        $this->db->query("SELECT * FROM tb_tipo_negociacao ORDER BY ds_tipo_negociacao");
        return $this->db->resultados();
    }

    public function listarCaracteristicasImovel()
    {
        $this->db->query("SELECT * FROM tb_caracteristicas_imovel ORDER BY ds_caracteristica_imovel");
        return $this->db->resultados();
    }

    public function listarCaracteristicasCondominio()
    {
        $this->db->query("SELECT * FROM tb_caracteristicas_condominio ORDER BY ds_caracteristica_condominio");
        return $this->db->resultados();
    }

    public function listarCaracteristicasImovelIndisponivel($fk_carac_imovel)
    {
        $this->db->query("SELECT * FROM tb_caracteristicas_imovel WHERE id_caracteristica_imovel not in ($fk_carac_imovel) ORDER BY ds_caracteristica_imovel");
        return $this->db->resultados();
    }

    public function listarCaracteristicasCondoIndisponivel($fk_carac_condo)
    {
        $this->db->query("SELECT * FROM tb_caracteristicas_condominio WHERE id_caracteristica_condominio not in ($fk_carac_condo) ORDER BY ds_caracteristica_condominio");
        return $this->db->resultados();
    }

    public function listarComodidades()
    {
        $this->db->query("SELECT * FROM tb_filtro_comodidades ORDER BY ds_filtro_comodidades");
        return $this->db->resultados();
    }

    public function listarMobilias()
    {
        $this->db->query("SELECT * FROM tb_filtro_mobilias ORDER BY ds_filtro_mobilias");
        return $this->db->resultados();
    }

    public function listarBemEstar()
    {
        $this->db->query("SELECT * FROM tb_filtro_bem_estar ORDER BY ds_filtro_bem_estar");
        return $this->db->resultados();
    }

    public function listarEletros()
    {
        $this->db->query("SELECT * FROM tb_filtro_eletrodomestico ORDER BY ds_filtro_eletrodomestico");
        return $this->db->resultados();
    }

    public function listarComodos()
    {
        $this->db->query("SELECT * FROM tb_filtro_comodos ORDER BY ds_filtro_comodos");
        return $this->db->resultados();
    }

    public function listarAcessibilidade()
    {
        $this->db->query("SELECT * FROM tb_filtro_acessibilidade ORDER BY ds_filtro_acessibilidade");
        return $this->db->resultados();
    }

    public function armazenarImovel($dados)
    {

        // var_dump($dados['cboTipoNegociacao']);
        // exit();

        $armazenarErro = false;


        $this->db->query("INSERT INTO tb_imovel (ds_rua_imovel, qtd_area, qtd_quarto, qtd_banheiro, qtd_vagas, num_andar, chk_aceita_pet, chk_mobilia, chk_metro_prox, fk_bairro, fk_tipo_imovel, fk_tipo_negociacao, txt_escolas_colegios, txt_transporte_publico, txt_faculdades, txt_entretenimento, txt_hospitais, txt_parque_area_verde, txt_shopping, mo_aluguel, mo_venda, mo_condominio, mo_iptu, mo_seguro_incendio, mo_taxa_de_servico, ds_nome_proprietario, num_telefone_proprietario, ds_email_proprietario) VALUES (:ds_rua_imovel ,:qtd_area, :qtd_quarto, :qtd_banheiro, :qtd_vagas, :num_andar, :chk_aceita_pet, :chk_mobilia, :chk_metro_prox, :fk_bairro, :fk_tipo_imovel, :fk_tipo_negociacao, :txt_escolas_colegios, :txt_transporte_publico, :txt_faculdades, :txt_entretenimento, :txt_hospitais, :txt_parque_area_verde, :txt_shopping, :mo_aluguel, :mo_venda, :mo_condominio, :mo_iptu, :mo_seguro_incendio, :mo_taxa_de_servico, :ds_nome_proprietario, :num_telefone_proprietario, :ds_email_proprietario)");

        $this->db->bind("ds_rua_imovel", $dados['txtRuaImovel']);
        $this->db->bind("qtd_area", $dados['tamArea']);
        $this->db->bind("qtd_quarto", $dados['qtdQuarto']);
        $this->db->bind("qtd_banheiro", $dados['qtdBanheiro']);
        $this->db->bind("qtd_vagas", $dados['qtdVagas']);
        $this->db->bind("num_andar", $dados['txtNumAndar']);
        $this->db->bind("chk_aceita_pet", $dados['chkAceitaPet']);
        $this->db->bind("chk_mobilia", $dados['chkMobilia']);
        $this->db->bind("chk_metro_prox", $dados['chkMetroProx']);
        $this->db->bind("fk_bairro", $dados['cboBairro']);
        $this->db->bind("fk_tipo_imovel", $dados['cboTipoImovel']);
        $this->db->bind("fk_tipo_negociacao", $dados['cboTipoNegociacao']);
        $this->db->bind("txt_escolas_colegios", $dados['txtEscolaColegio']);
        $this->db->bind("txt_transporte_publico", $dados['txtTransportePublico']);
        $this->db->bind("txt_faculdades", $dados['txtFaculdades']);
        $this->db->bind("txt_entretenimento", $dados['txtEntretenimento']);
        $this->db->bind("txt_hospitais", $dados['txtHospitais']);
        $this->db->bind("txt_parque_area_verde", $dados['txtParqueAreasVerdes']);
        $this->db->bind("txt_shopping", $dados['txtShopping']);
        $this->db->bind("mo_aluguel", $dados['moValorAluguel']);
        $this->db->bind("mo_venda", $dados['moValorVenda']);
        $this->db->bind("mo_condominio", $dados['moValorCondominio']);
        $this->db->bind("mo_iptu", $dados['moValorIptu']);
        $this->db->bind("mo_seguro_incendio", $dados['moValorSeguroIncendio']);
        $this->db->bind("mo_taxa_de_servico", $dados['moTaxaServico']);
        $this->db->bind("ds_nome_proprietario", $dados['txtNomeProprietario']);
        $this->db->bind("num_telefone_proprietario", $dados['txtTelProprietario']);
        $this->db->bind("ds_email_proprietario", $dados['txtEmailProprietario']);
        if (!$this->db->executa()) {
            $armazenarErro = true;
        }


        $proximoIdImovel = $this->db->ultimoIdInserido();

        if (!$dados['chkCaracteristicaImovel'] == "") {

            foreach ($dados['chkCaracteristicaImovel'] as $chkCaracteristicaImovel) {

                $this->db->query("INSERT INTO tb_relac_imovel_carac_imovel (fk_caracteristica_imovel, fk_imovel) VALUES (:fk_caracteristica_imovel, :fk_imovel)");
                $this->db->bind("fk_caracteristica_imovel", $chkCaracteristicaImovel);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkCaracteristicaCondominio'] == "") {

            foreach ($dados['chkCaracteristicaCondominio'] as $chkCaracteristicaCondominio) {

                $this->db->query("INSERT INTO tb_relac_imovel_carac_condo (fk_caracteristica_condominio, fk_imovel) VALUES (:fk_caracteristica_condominio, :fk_imovel)");
                $this->db->bind("fk_caracteristica_condominio", $chkCaracteristicaCondominio);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkComodidades'] == "") {

            foreach ($dados['chkComodidades'] as $chkComodidades) {

                $this->db->query("INSERT INTO tb_relac_imovel_comodidades (fk_filtro_comodidades, fk_imovel) VALUES (:fk_filtro_comodidades, :fk_imovel)");
                $this->db->bind("fk_filtro_comodidades", $chkComodidades);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkMobilias'] == "") {

            foreach ($dados['chkMobilias'] as $chkMobilias) {

                $this->db->query("INSERT INTO tb_relac_imovel_mobilia (fk_filtro_mobilias, fk_imovel) VALUES (:fk_filtro_mobilias, :fk_imovel)");
                $this->db->bind("fk_filtro_mobilias", $chkMobilias);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkBemEstar'] == "") {

            foreach ($dados['chkBemEstar'] as $chkBemEstar) {

                $this->db->query("INSERT INTO tb_relac_imovel_bem_estar (fk_filtro_bem_estar, fk_imovel) VALUES (:fk_filtro_bem_estar, :fk_imovel)");
                $this->db->bind("fk_filtro_bem_estar", $chkBemEstar);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkEletro'] == "") {

            foreach ($dados['chkEletro'] as $chkEletro) {

                $this->db->query("INSERT INTO tb_relac_imovel_eletro (fk_filtro_eletrodomestico, fk_imovel) VALUES (:fk_filtro_eletrodomestico, :fk_imovel)");
                $this->db->bind("fk_filtro_eletrodomestico", $chkEletro);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkComodo'] == "") {

            foreach ($dados['chkComodo'] as $chkComodo) {

                $this->db->query("INSERT INTO tb_relac_imovel_comodos (fk_filtro_comodos, fk_imovel) VALUES (:fk_filtro_comodos, :fk_imovel)");
                $this->db->bind("fk_filtro_comodos", $chkComodo);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        if (!$dados['chkAcessibilidade'] == "") {

            foreach ($dados['chkAcessibilidade'] as $chkAcessibilidade) {

                $this->db->query("INSERT INTO tb_relac_imovel_acessibilidade (fk_filtro_acessibilidade, fk_imovel) VALUES (:fk_filtro_acessibilidade, :fk_imovel)");
                $this->db->bind("fk_filtro_acessibilidade", $chkAcessibilidade);
                $this->db->bind("fk_imovel", $proximoIdImovel);
                if (!$this->db->executa()) {
                    $armazenarErro = true;
                }
            }
        }

        //Realiza as operações de anexo, se houver anexo
        if (!$dados['fileFotos']['name'][0] == "") {

            $pastaArquivo = "imovel_id_" . $proximoIdImovel;
            $upload = new Upload();
            $tamanhoArray = count($dados['fileFotos']['name']);


            for ($i = 0; $i < $tamanhoArray; $i++) {

                $arrayImagem = [
                    'name' => $dados['fileFotos']['name'][$i],
                    'type' => $dados['fileFotos']['type'][$i],
                    'tmp_name' => $dados['fileFotos']['tmp_name'][$i],
                    'error' => $dados['fileFotos']['error'][$i],
                    'size' => $dados['fileFotos']['size'][$i],
                ];

                $upload->imagem($arrayImagem, NULL, 'temp');


                //Inicio do processamento de compressao
                $nomeArquivo = $upload->getResultado();

                //Path da imagem que foi feito upload  (pasta temp)           
                $path_arquivo = $upload->getPath() . DIRECTORY_SEPARATOR . $nomeArquivo;

                //Cria pasta dos arquivos individualmente de acordo com id
                if (!file_exists($upload->getPathDefault() . DIRECTORY_SEPARATOR . $pastaArquivo)) {
                    mkdir($upload->getPathDefault() . DIRECTORY_SEPARATOR . $pastaArquivo, 0777);
                }
                $novoDiretorio = $upload->getPathDefault() . DIRECTORY_SEPARATOR . $pastaArquivo;

                //Monta o diretorio destino da pagina comprimida
                $destination_img = $novoDiretorio . DIRECTORY_SEPARATOR . $nomeArquivo;

                //Executa a compressao
                ComprimirFoto::comprimir($path_arquivo, $destination_img, 40);

                //Invoca metodo para deletar o arquivo temporario
                $upload->deletarArquivo(null, $path_arquivo);

                // echo $upload->getResultado() . ' da pasta temporaria';

                // echo $upload->getResultado();
                // exit();


                if ($upload->getResultado()) {

                    if ($i == 0) {
                        $this->db->query("INSERT INTO tb_anexo (fk_imovel, nm_path_arquivo, nm_arquivo, chk_destaque) VALUES (:fk_imovel, :nm_path_arquivo, :nm_arquivo, :chk_destaque)");
                        $this->db->bind("fk_imovel", $proximoIdImovel);
                        $this->db->bind("nm_path_arquivo", $novoDiretorio);
                        $this->db->bind("nm_arquivo", $nomeArquivo);
                        $this->db->bind("chk_destaque", "S");
                        if (!$this->db->executa()) {
                            $armazenarErro = true;
                        }
                    } else {
                        $this->db->query("INSERT INTO tb_anexo (fk_imovel, nm_path_arquivo, nm_arquivo) VALUES (:fk_imovel, :nm_path_arquivo, :nm_arquivo)");
                        $this->db->bind("fk_imovel", $proximoIdImovel);
                        $this->db->bind("nm_path_arquivo", $novoDiretorio);
                        $this->db->bind("nm_arquivo", $nomeArquivo);
                        if (!$this->db->executa()) {
                            $armazenarErro = true;
                        }
                    }
                } else {
                    echo $upload->getErro();
                }
            }
        }
        if ($armazenarErro) {
            return false;
        } else {

            return true;
        }
    }

    public function editarImovel($dados)
    {


        // var_dump($dados['fileFotos']['name']);
        // exit();

        $atualizarErro = false;


        $this->db->query("UPDATE tb_imovel SET 
        ds_rua_imovel = :ds_rua_imovel,
        qtd_area = :qtd_area,
        qtd_quarto = :qtd_quarto,
        qtd_banheiro = :qtd_banheiro,
        qtd_vagas = :qtd_vagas,
        num_andar = :num_andar,
        chk_aceita_pet = :chk_aceita_pet,
        chk_mobilia = :chk_mobilia,
        chk_metro_prox = :chk_metro_prox,
        fk_bairro = :fk_bairro,
        fk_tipo_imovel = :fk_tipo_imovel,
        fk_tipo_negociacao = :fk_tipo_negociacao,
        txt_escolas_colegios = :txt_escolas_colegios,
        txt_transporte_publico = :txt_transporte_publico,
        txt_faculdades = :txt_faculdades,
        txt_entretenimento = :txt_entretenimento,
        txt_hospitais = :txt_hospitais,
        txt_parque_area_verde = :txt_parque_area_verde,
        txt_shopping = :txt_shopping,
        mo_aluguel = :mo_aluguel,
        mo_venda = :mo_venda,
        mo_condominio = :mo_condominio,
        mo_iptu = :mo_iptu,
        mo_seguro_incendio = :mo_seguro_incendio,
        mo_taxa_de_servico = :mo_taxa_de_servico,
        ds_nome_proprietario = :ds_nome_proprietario,
        num_telefone_proprietario = :num_telefone_proprietario,
        ds_email_proprietario = :ds_email_proprietario
        WHERE id_imovel = :id_imovel");

        $this->db->bind("ds_rua_imovel", $dados['txtRuaImovel']);
        $this->db->bind("qtd_area", $dados['tamArea']);
        $this->db->bind("qtd_quarto", $dados['qtdQuarto']);
        $this->db->bind("qtd_banheiro", $dados['qtdBanheiro']);
        $this->db->bind("qtd_vagas", $dados['qtdVagas']);
        $this->db->bind("num_andar", $dados['txtNumAndar']);
        $this->db->bind("chk_aceita_pet", $dados['chkAceitaPet']);
        $this->db->bind("chk_mobilia", $dados['chkMobilia']);
        $this->db->bind("chk_metro_prox", $dados['chkMetroProx']);
        $this->db->bind("fk_bairro", $dados['cboBairro']);
        $this->db->bind("fk_tipo_imovel", $dados['cboTipoImovel']);
        $this->db->bind("fk_tipo_negociacao", $dados['cboTipoNegociacao']);
        $this->db->bind("txt_escolas_colegios", $dados['txtEscolaColegio']);
        $this->db->bind("txt_transporte_publico", $dados['txtTransportePublico']);
        $this->db->bind("txt_faculdades", $dados['txtFaculdades']);
        $this->db->bind("txt_entretenimento", $dados['txtEntretenimento']);
        $this->db->bind("txt_hospitais", $dados['txtHospitais']);
        $this->db->bind("txt_parque_area_verde", $dados['txtParqueAreasVerdes']);
        $this->db->bind("txt_shopping", $dados['txtShopping']);
        $this->db->bind("mo_aluguel", $dados['moValorAluguel']);
        $this->db->bind("mo_venda", $dados['moValorVenda']);
        $this->db->bind("mo_condominio", $dados['moValorCondominio']);
        $this->db->bind("mo_iptu", $dados['moValorIptu']);
        $this->db->bind("mo_seguro_incendio", $dados['moValorSeguroIncendio']);
        $this->db->bind("mo_taxa_de_servico", $dados['moTaxaServico']);
        $this->db->bind("ds_nome_proprietario", $dados['txtNomeProprietario']);
        $this->db->bind("num_telefone_proprietario", $dados['txtTelProprietario']);
        $this->db->bind("ds_email_proprietario", $dados['txtEmailProprietario']);
        $this->db->bind("id_imovel", $dados['imovel']->id_imovel);
        if (!$this->db->executa()) {
            $atualizarErro = true;
        }

        if (!$dados['chkCaracteristicaImovel'] == "" or $dados['chkCaracteristicaImovel'] == "") {


            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_carac_imovel WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkCaracteristicaImovel'] as $chkCaracteristicaImovel) {

                $this->db->query("INSERT INTO tb_relac_imovel_carac_imovel (fk_caracteristica_imovel, fk_imovel) VALUES (:fk_caracteristica_imovel, :fk_imovel)");
                $this->db->bind("fk_caracteristica_imovel", $chkCaracteristicaImovel);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkCaracteristicaCondominio'] == "" or $dados['chkCaracteristicaCondominio'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_carac_condo WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkCaracteristicaCondominio'] as $chkCaracteristicaCondominio) {

                $this->db->query("INSERT INTO tb_relac_imovel_carac_condo (fk_caracteristica_condominio, fk_imovel) VALUES (:fk_caracteristica_condominio, :fk_imovel)");
                $this->db->bind("fk_caracteristica_condominio", $chkCaracteristicaCondominio);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkComodidades'] == "" or $dados['chkComodidades'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_comodidades WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkComodidades'] as $chkComodidades) {

                $this->db->query("INSERT INTO tb_relac_imovel_comodidades (fk_filtro_comodidades, fk_imovel) VALUES (:fk_filtro_comodidades, :fk_imovel)");
                $this->db->bind("fk_filtro_comodidades", $chkComodidades);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkMobilias'] == "" or $dados['chkMobilias'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_mobilia WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkMobilias'] as $chkMobilias) {

                $this->db->query("INSERT INTO tb_relac_imovel_mobilia (fk_filtro_mobilias, fk_imovel) VALUES (:fk_filtro_mobilias, :fk_imovel)");
                $this->db->bind("fk_filtro_mobilias", $chkMobilias);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }



        if (!$dados['chkBemEstar'] == "" or $dados['chkBemEstar'] == "") {

            

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_bem_estar WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }



            foreach ($dados['chkBemEstar'] as $chkBemEstar) {

                $this->db->query("INSERT INTO tb_relac_imovel_bem_estar (fk_filtro_bem_estar, fk_imovel) VALUES (:fk_filtro_bem_estar, :fk_imovel)");
                $this->db->bind("fk_filtro_bem_estar", $chkBemEstar);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkEletro'] == "" or $dados['chkEletro'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_eletro WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkEletro'] as $chkEletro) {

                $this->db->query("INSERT INTO tb_relac_imovel_eletro (fk_filtro_eletrodomestico, fk_imovel) VALUES (:fk_filtro_eletrodomestico, :fk_imovel)");
                $this->db->bind("fk_filtro_eletrodomestico", $chkEletro);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkComodo'] == "" or $dados['chkComodo'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_comodos WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkComodo'] as $chkComodo) {

                $this->db->query("INSERT INTO tb_relac_imovel_comodos (fk_filtro_comodos, fk_imovel) VALUES (:fk_filtro_comodos, :fk_imovel)");
                $this->db->bind("fk_filtro_comodos", $chkComodo);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkAcessibilidade'] == "" or $dados['chkAcessibilidade'] == "") {

            //Apaga os anteriores e salva as novas opções escolhidas
            $this->db->query("DELETE FROM tb_relac_imovel_acessibilidade WHERE fk_imovel = :fk_imovel");
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            foreach ($dados['chkAcessibilidade'] as $chkAcessibilidade) {

                $this->db->query("INSERT INTO tb_relac_imovel_acessibilidade (fk_filtro_acessibilidade, fk_imovel) VALUES (:fk_filtro_acessibilidade, :fk_imovel)");
                $this->db->bind("fk_filtro_acessibilidade", $chkAcessibilidade);
                $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                if (!$this->db->executa()) {
                    $atualizarErro = true;
                }
            }
        }

        if (!$dados['chkFotoDestaque'] == "") {

            $this->db->query("UPDATE tb_anexo SET chk_destaque = :chk_destaque WHERE fk_imovel = :fk_imovel ");
            $this->db->bind("chk_destaque", NULL);
            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }

            $this->db->query("UPDATE tb_anexo SET chk_destaque = :chk_destaque WHERE id_anexo = :id_anexo ");
            $this->db->bind("chk_destaque", "S");
            $this->db->bind("id_anexo", $dados['chkFotoDestaque']);
            if (!$this->db->executa()) {
                $atualizarErro = true;
            }
        }


        // var_dump($dados['fotosImovel']);
        // exit();



        //Realiza as operações de anexo, se houver anexo
        if (!$dados['fileFotos']['name'][0] == "") {

            $pastaArquivo = "imovel_id_" . $dados['imovel']->id_imovel;
            $upload = new Upload();
            $tamanhoArray = count($dados['fileFotos']['name']);


            for ($i = 0; $i < $tamanhoArray; $i++) {

                $arrayImagem = [
                    'name' => $dados['fileFotos']['name'][$i],
                    'type' => $dados['fileFotos']['type'][$i],
                    'tmp_name' => $dados['fileFotos']['tmp_name'][$i],
                    'error' => $dados['fileFotos']['error'][$i],
                    'size' => $dados['fileFotos']['size'][$i],
                ];

                $upload->imagem($arrayImagem, NULL, 'temp');


                //Inicio do processamento de compressao
                $nomeArquivo = $upload->getResultado();

                //Path da imagem que foi feito upload  (pasta temp)           
                $path_arquivo = $upload->getPath() . DIRECTORY_SEPARATOR . $nomeArquivo;

                //Cria pasta dos arquivos individualmente de acordo com id
                mkdir($upload->getPathDefault() . DIRECTORY_SEPARATOR . $pastaArquivo, 0777);
                $novoDiretorio = $upload->getPathDefault() . DIRECTORY_SEPARATOR . $pastaArquivo;

                //Monta o diretorio destino da pagina comprimida
                $destination_img = $novoDiretorio . DIRECTORY_SEPARATOR . $nomeArquivo;

                //Executa a compressao
                ComprimirFoto::comprimir($path_arquivo, $destination_img, 40);

                //Invoca metodo para deletar o arquivo temporario
                $upload->deletarArquivo(null, $path_arquivo);

                // echo $upload->getResultado() . ' da pasta temporaria';

                // echo $upload->getResultado();
                // exit();


                if ($upload->getResultado()) {

                    // $nomeArquivo = $upload->getResultado();
                    // $pathArquivo = $destination_img;

                    if ($dados['fotosImovel'] == "") {

                        if ($i == 0) {

                            $this->db->query("INSERT INTO tb_anexo (fk_imovel, nm_path_arquivo, nm_arquivo, chk_destaque) VALUES (:fk_imovel, :nm_path_arquivo, :nm_arquivo, :chk_destaque)");
                            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                            $this->db->bind("nm_path_arquivo", $novoDiretorio);
                            $this->db->bind("nm_arquivo", $nomeArquivo);
                            $this->db->bind("chk_destaque", "S");
                            if (!$this->db->executa()) {
                                $atualizarErro = true;
                            }
                        } else {
                            $this->db->query("INSERT INTO tb_anexo (fk_imovel, nm_path_arquivo, nm_arquivo) VALUES (:fk_imovel, :nm_path_arquivo, :nm_arquivo)");
                            $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                            $this->db->bind("nm_path_arquivo", $novoDiretorio);
                            $this->db->bind("nm_arquivo", $nomeArquivo);
                            if (!$this->db->executa()) {
                                $atualizarErro = true;
                            }
                        }
                    } else {

                        $this->db->query("INSERT INTO tb_anexo (fk_imovel, nm_path_arquivo, nm_arquivo) VALUES (:fk_imovel, :nm_path_arquivo, :nm_arquivo)");
                        $this->db->bind("fk_imovel", $dados['imovel']->id_imovel);
                        $this->db->bind("nm_path_arquivo", $novoDiretorio);
                        $this->db->bind("nm_arquivo", $nomeArquivo);
                        if (!$this->db->executa()) {
                            $atualizarErro = true;
                        }
                    }
                } else {
                    echo $upload->getErro();
                }
            }
        }


        if ($atualizarErro) {
            return false;
        } else {

            return true;
        }
    }

    public function caracImovelPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_carac_imovel WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function caracCondoPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_carac_condo WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroAcessibilidadePorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_acessibilidade WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroBemEstarPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_bem_estar WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroComodidadesPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_comodidades WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroComodosPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_comodos WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroEletroPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_eletro WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function filtroMobiliaPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_mobilia WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function lerImovelPorId($id)
    {

        $this->db->query("SELECT * FROM tb_imovel WHERE id_imovel = :id_imovel");

        $this->db->bind("id_imovel", $id);

        return $this->db->resultado();
    }

    public function lerImovelSelecionadoPorId($id)
    {

        $this->db->query("SELECT im.*, tti.ds_tipo_imovel, ttn.ds_tipo_negociacao, tba.ds_bairro FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        WHERE im.id_imovel = :id_imovel
        ORDER BY im.publicado_em DESC");

        $this->db->bind("id_imovel", $id);

        return $this->db->resultado();
    }

    public function lerImovelPesquisaPorId($id)
    {

        $this->db->query("SELECT im.*, tti.ds_tipo_imovel, ttn.ds_tipo_negociacao, tba.ds_bairro FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        WHERE im.id_imovel = :id_imovel
        ORDER BY im.publicado_em DESC");

        $this->db->bind("id_imovel", $id);

        return $this->db->resultados();
    }

    public function lerRelacBemEstarPorId($id)
    {

        $this->db->query("SELECT * FROM tb_relac_imovel_bem_estar WHERE fk_imovel = :id_imovel");

        $this->db->bind("id_imovel", $id);

        return $this->db->resultados();
    }

    public function lerFotosPorId($id)
    {

        $this->db->query("SELECT * FROM tb_anexo WHERE fk_imovel = :id_imovel");

        $this->db->bind("id_imovel", $id);

        return $this->db->resultados();
    }

    public function deletarFoto($dados)
    {


        //Monta string do diretório da imagem
        $path_arquivo = $dados['infoImovel']->nm_path_arquivo . DIRECTORY_SEPARATOR . $dados['infoImovel']->nm_arquivo;

        $upload = new Upload();
        $upload->deletarArquivo(null, $path_arquivo);

        //Deleta da tabela
        $this->db->query("DELETE FROM tb_anexo WHERE id_anexo = :id_anexo");
        $this->db->bind("id_anexo", $dados['infoImovel']->id_anexo);


        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }


    public function deletarImovel($dados)
    {
        $id_imovel = $dados['id_imovel'];

        $deletarErro = false;

        if (!$dados['infoImovel'] == "") {

            // $id_imovel = $dados['infoImovel'][0]->fk_imovel;
            $pastaPrincipal = $dados['infoImovel'][0]->nm_path_arquivo;

            // var_dump($pastaPrincipal);
            // exit();

            foreach ($dados['infoImovel'] as $infoImovel) {

                //Monta string do diretório da imagem
                $path_arquivo = $infoImovel->nm_path_arquivo . DIRECTORY_SEPARATOR . $infoImovel->nm_arquivo;

                $upload = new Upload();
                $upload->deletarArquivo(null, $path_arquivo);

                //Deleta da tabela
                $this->db->query("DELETE FROM tb_anexo WHERE id_anexo = :id_anexo");
                $this->db->bind("id_anexo", $infoImovel->id_anexo);
            }


            //Apaga a pasta apos estar vazia
            rmdir($pastaPrincipal);
        }


        $this->db->query("DELETE FROM tb_relac_imovel_carac_condo WHERE fk_imovel = :fk_imovel");
        $this->db->bind("fk_imovel", $id_imovel);
        if (!$this->db->executa()) {
            $deletarErro = true;
        }

        $this->db->query("DELETE FROM tb_relac_imovel_carac_imovel WHERE fk_imovel = :fk_imovel");
        $this->db->bind("fk_imovel", $id_imovel);
        if (!$this->db->executa()) {
            $deletarErro = true;
        }

        $this->db->query("DELETE FROM tb_anexo WHERE fk_imovel = :fk_imovel");
        $this->db->bind("fk_imovel", $id_imovel);
        if (!$this->db->executa()) {
            $deletarErro = true;
        }

        $this->db->query("DELETE FROM tb_imovel WHERE id_imovel = :id_imovel");
        $this->db->bind("id_imovel", $id_imovel);
        if (!$this->db->executa()) {
            $deletarErro = true;
        }


        if (!$deletarErro) {
            return true;
        } else {
            return false;
        }
    }


    public function lerInfoAnexo($id)
    {

        $this->db->query("SELECT * FROM tb_anexo WHERE fk_imovel = :fk_imovel");

        $this->db->bind("fk_imovel", $id);

        return $this->db->resultados();
    }

    public function lerInfoImagem($id)
    {
        $this->db->query("SELECT * FROM tb_anexo WHERE id_anexo = :id_anexo");

        $this->db->bind("id_anexo", $id);

        return $this->db->resultado();
    }

    public function lerAnexos()
    {
        $this->db->query("SELECT * FROM tb_anexo");

        return $this->db->resultados();
    }



    public function listarImoveisAluguel()
    {
        $this->db->query("SELECT im.*, tti.ds_tipo_imovel, ttn.ds_tipo_negociacao, tba.ds_bairro FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        WHERE im.fk_tipo_negociacao = 2
        ORDER BY im.publicado_em DESC");

        return $this->db->resultados();
    }

    public function listarImoveisCompra()
    {
        $this->db->query("SELECT im.*, tti.ds_tipo_imovel, ttn.ds_tipo_negociacao, tba.ds_bairro FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        WHERE im.fk_tipo_negociacao = 1
        ORDER BY im.publicado_em DESC");

        return $this->db->resultados();
    }


    public function imovelFiltro($dados)
    {
        // var_dump($dados);
        // exit();

        $query = "SELECT *, (mo_iptu + mo_condominio) as iptuMaisCondo, (mo_aluguel + mo_condominio + mo_iptu + mo_seguro_incendio + mo_taxa_de_servico) as valorTotalAluguel FROM tb_imovel im
        LEFT JOIN tb_tipo_imovel tti ON tti.id_tipo_imovel = im.fk_tipo_imovel 
        LEFT JOIN tb_tipo_negociacao ttn ON ttn.id_tipo_negociacao = im.fk_tipo_negociacao
        LEFT JOIN tb_bairros tba ON tba.id_bairro = im.fk_bairro
        WHERE 1 = 1 AND fk_tipo_negociacao = {$dados['txtTipoNegociacao']}";

        // Caso seja filtro aluguel
        if ($dados['txtTipoNegociacao'] == 2) {

            if (!$dados['cboTipoImovel'] == "") {
                $query = $query . " AND fk_tipo_imovel = {$dados['cboTipoImovel']}";
            }

            //Filtro de valor total 
            if ($dados['btnradioValor'] == 2) {
                if (!$dados['txtValorMin'] == "" && !$dados['txtValorMax'] == "") {
                    $query = $query . " HAVING valorTotalAluguel BETWEEN {$dados['txtValorMin']} AND {$dados['txtValorMax']}";
                }
            } else {
                if (!$dados['txtValorMin'] == "" && !$dados['txtValorMax'] == "") {
                    $query = $query . " AND mo_aluguel BETWEEN {$dados['txtValorMin']} AND {$dados['txtValorMax']}";
                }
            }



            if (!$dados['chkNumQuartos'] == NULL) {
                $query = $query . " AND qtd_quarto >= {$dados['chkNumQuartos']}";
            }

            if (!$dados['chkNumBanheiros'] == NULL) {
                $query = $query . " AND qtd_banheiro >= {$dados['chkNumBanheiros']}";
            }

            if (!$dados['chkVagas'] == "") {
                $query = $query . " AND qtd_vagas >= {$dados['chkVagas']}";
            }

            if (!$dados['chkMobiliado'] == "") {
                $query = $query . " AND chk_mobilia = '{$dados['chkMobiliado']}'";
            }

            if (!$dados['chkAceitaPets'] == "") {
                $query = $query . " AND chk_aceita_pet = '{$dados['chkAceitaPets']}'";
            }

            if (!$dados['txtAreaMin'] == "" && !$dados['txtAreaMax'] == "") {
                $query = $query . " AND qtd_area BETWEEN {$dados['txtAreaMin']} AND {$dados['txtAreaMax']}";
            }

            if (!$dados['chkProxMetro'] == "") {
                $query = $query . " AND chk_metro_prox = '{$dados['chkProxMetro']}'";
            }

            if (!$dados['chkCaracCondominios'] == "") {
                $strCaracCondo = '';
                foreach ($dados['chkCaracCondominios'] as $chkCaracCondominios) {
                    $strCaracCondo = $strCaracCondo . ',' . $chkCaracCondominios;
                }
                $strCaracCondoLimpa = substr($strCaracCondo, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_carac_condo tricc WHERE tricc.fk_imovel = im.id_imovel AND tricc.fk_caracteristica_condominio in (" . $strCaracCondoLimpa . "))";
            }

            if (!$dados['chkComodidades'] == "") {
                $strComodidades = '';
                foreach ($dados['chkComodidades'] as $chkComodidades) {
                    $strComodidades = $strComodidades . ',' . $chkComodidades;
                }
                $strComodidadesLimpa = substr($strComodidades, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_comodidades tric WHERE tric.fk_imovel = im.id_imovel AND tric.fk_filtro_comodidades in (" . $strComodidadesLimpa . "))";
            }

            if (!$dados['chkMobilias'] == "") {
                $strMobilias = '';
                foreach ($dados['chkMobilias'] as $chkMobilias) {
                    $strMobilias = $strMobilias . ',' . $chkMobilias;
                }
                $strMobiliasLimpa = substr($strMobilias, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_mobilia trimo WHERE trimo.fk_imovel = im.id_imovel AND trimo.fk_filtro_mobilias in (" . $strMobiliasLimpa . "))";
            }

            if (!$dados['chkBemEstar'] == "") {
                $strBemEstar = '';
                foreach ($dados['chkBemEstar'] as $chkBemEstar) {
                    $strBemEstar = $strBemEstar . ',' . $chkBemEstar;
                }
                $strBemEstarLimpa = substr($strBemEstar, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_bem_estar tribem WHERE tribem.fk_imovel = im.id_imovel AND tribem.fk_filtro_bem_estar in (" . $strBemEstarLimpa . "))";
            }

            if (!$dados['chkEletro'] == "") {
                $strEletro = '';
                foreach ($dados['chkEletro'] as $chkEletro) {
                    $strEletro = $strEletro . ',' . $chkEletro;
                }
                $strEletroLimpa = substr($strEletro, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_eletro trie WHERE trie.fk_imovel = im.id_imovel AND trie.fk_filtro_eletrodomestico in (" . $strEletroLimpa . "))";
            }

            if (!$dados['chkComodo'] == "") {
                $strComodo = '';
                foreach ($dados['chkComodo'] as $chkComodo) {
                    $strComodo = $strComodo . ',' . $chkComodo;
                }
                $strComodoLimpa = substr($strComodo, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_comodos trico WHERE trico.fk_imovel = im.id_imovel AND trico.fk_filtro_comodos in (" . $strComodoLimpa . "))";
            }

            if (!$dados['chkAcessibilidade'] == "") {
                $strAcessibilidade = '';
                foreach ($dados['chkAcessibilidade'] as $chkAcessibilidade) {
                    $strAcessibilidade = $strAcessibilidade . ',' . $chkAcessibilidade;
                }
                $strAcessibilidadeLimpa = substr($strAcessibilidade, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_acessibilidade triac WHERE triac.fk_imovel = im.id_imovel AND triac.fk_filtro_acessibilidade in (" . $strAcessibilidadeLimpa . "))";
            }
        } else {

            // Caso seja filtro compra

            if (!$dados['cboTipoImovel'] == "") {
                $query = $query . " AND fk_tipo_imovel = {$dados['cboTipoImovelC']}";
            }

            if (!$dados['txtValorCompraMin'] == "" && !$dados['txtValorCompraMax'] == "") {
                $query = $query . " AND mo_venda BETWEEN {$dados['txtValorCompraMin']} AND {$dados['txtValorCompraMax']}";
            }

            if (!$dados['txtCondMaisIptuMin'] == "" && !$dados['txtCondMaisIptuMax'] == "") {
                $query = $query . " HAVING iptuMaisCondo BETWEEN {$dados['txtCondMaisIptuMin']} AND {$dados['txtCondMaisIptuMax']}";
            }

            if (!$dados['chkNumQuartosC'] == NULL) {
                $query = $query . " AND qtd_quarto >= {$dados['chkNumQuartosC']}";
            }

            if (!$dados['chkNumBanheirosC'] == NULL) {
                $query = $query . " AND qtd_banheiro >= {$dados['chkNumBanheirosC']}";
            }

            if (!$dados['chkVagasC'] == "") {
                $query = $query . " AND qtd_vagas >= {$dados['chkVagasC']}";
            }

            if (!$dados['chkMobiliadoC'] == "") {
                $query = $query . " AND chk_mobilia = '{$dados['chkMobiliadoC']}'";
            }

            if (!$dados['chkAceitaPetsC'] == "") {
                $query = $query . " AND chk_aceita_pet = '{$dados['chkAceitaPetsC']}'";
            }

            if (!$dados['txtAreaMinC'] == "" && !$dados['txtAreaMaxC'] == "") {
                $query = $query . " AND qtd_area BETWEEN {$dados['txtAreaMinC']} AND {$dados['txtAreaMaxC']}";
            }

            if (!$dados['chkProxMetroC'] == "") {
                $query = $query . " AND chk_metro_prox = '{$dados['chkProxMetroC']}'";
            }

            if (!$dados['chkCaracCondominiosC'] == "") {
                $strCaracCondoC = '';
                foreach ($dados['chkCaracCondominiosC'] as $chkCaracCondominiosC) {
                    $strCaracCondoC = $strCaracCondoC . ',' . $chkCaracCondominiosC;
                }
                $strCaracCondoCLimpa = substr($strCaracCondoC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_carac_condo tricc WHERE tricc.fk_imovel = im.id_imovel AND tricc.fk_caracteristica_condominio in (" . $strCaracCondoCLimpa . "))";
            }

            if (!$dados['chkComodidadesC'] == "") {
                $strComodidadesC = '';
                foreach ($dados['chkComodidadesC'] as $chkComodidadesC) {
                    $strComodidadesC = $strComodidadesC . ',' . $chkComodidadesC;
                }
                $strComodidadesCLimpa = substr($strComodidadesC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_comodidades tric WHERE tric.fk_imovel = im.id_imovel AND tric.fk_filtro_comodidades in (" . $strComodidadesCLimpa . "))";
            }

            if (!$dados['chkMobiliasC'] == "") {
                $strMobiliasC = '';
                foreach ($dados['chkMobiliasC'] as $chkMobiliasC) {
                    $strMobiliasC = $strMobiliasC . ',' . $chkMobiliasC;
                }
                $strMobiliasCLimpa = substr($strMobiliasC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_mobilia trimo WHERE trimo.fk_imovel = im.id_imovel AND trimo.fk_filtro_mobilias in (" . $strMobiliasCLimpa . "))";
            }

            if (!$dados['chkBemEstarC'] == "") {
                $strBemEstarC = '';
                foreach ($dados['chkBemEstarC'] as $chkBemEstarC) {
                    $strBemEstarC = $strBemEstarC . ',' . $chkBemEstarC;
                }
                $strBemEstarCLimpa = substr($strBemEstarC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_bem_estar tribem WHERE tribem.fk_imovel = im.id_imovel AND tribem.fk_filtro_bem_estar in (" . $strBemEstarCLimpa . "))";
            }

            if (!$dados['chkEletroC'] == "") {
                $strEletroC = '';
                foreach ($dados['chkEletroC'] as $chkEletroC) {
                    $strEletroC = $strEletroC . ',' . $chkEletroC;
                }
                $strEletroCLimpa = substr($strEletroC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_eletro trie WHERE trie.fk_imovel = im.id_imovel AND trie.fk_filtro_eletrodomestico in (" . $strEletroCLimpa . "))";
            }


            if (!$dados['chkComodoC'] == "") {
                $strComodoC = '';
                foreach ($dados['chkComodoC'] as $chkComodoC) {
                    $strComodoC = $strComodoC . ',' . $chkComodoC;
                }
                $strComodoCLimpa = substr($strComodoC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_comodos trico WHERE trico.fk_imovel = im.id_imovel AND trico.fk_filtro_comodos in (" . $strComodoCLimpa . "))";
            }

            if (!$dados['chkAcessibilidadeC'] == "") {
                $strAcessibilidadeC = '';
                foreach ($dados['chkAcessibilidadeC'] as $chkAcessibilidadeC) {
                    $strAcessibilidadeC = $strAcessibilidadeC . ',' . $chkAcessibilidadeC;
                }
                $strAcessibilidadeCLimpa = substr($strAcessibilidadeC, 1);

                $query = $query . " AND EXISTS (SELECT * FROM tb_relac_imovel_acessibilidade triac WHERE triac.fk_imovel = im.id_imovel AND triac.fk_filtro_acessibilidade in (" . $strAcessibilidadeCLimpa . "))";
            }
        }

        $query = $query . " ORDER BY im.publicado_em DESC";
        // var_dump($query);
        // exit();

        $this->db->query($query);
        return $this->db->resultados();
    }
}
