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
        $this->db->query("SELECT * FROM tb_imovel ORDER BY id_imovel DESC");

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

    public function armazenarImovel($dados)
    {


        // var_dump($dados['chkCaracteristicaImovel']);
        // exit();
        $armazenarErro = false;


        $this->db->query("INSERT INTO tb_imovel (ds_titulo_imovel, ds_end_imovel, qtd_area, qtd_quarto, qtd_banheiro, qtd_vagas, num_andar, chk_aceita_pet, chk_mobilia, chk_metro_prox, fk_tipo_imovel, txt_escolas_colegios, txt_transporte_publico, txt_faculdades, mo_aluguel, mo_venda, mo_condominio, mo_iptu, mo_seguro_incendio, mo_taxa_de_servico) VALUES (:ds_titulo_imovel, :ds_end_imovel, :qtd_area, :qtd_quarto, :qtd_banheiro, :qtd_vagas, :num_andar, :chk_aceita_pet, :chk_mobilia, :chk_metro_prox, :fk_tipo_imovel, :txt_escolas_colegios, :txt_transporte_publico, :txt_faculdades, :mo_aluguel, :mo_venda, :mo_condominio, :mo_iptu, :mo_seguro_incendio, :mo_taxa_de_servico)");

        $this->db->bind("ds_titulo_imovel", $dados['txtTituloImovel']);
        $this->db->bind("ds_end_imovel", $dados['txtEnderecoImovel']);
        $this->db->bind("qtd_area", $dados['tamArea']);
        $this->db->bind("qtd_quarto", $dados['qtdQuarto']);
        $this->db->bind("qtd_banheiro", $dados['qtdBanheiro']);
        $this->db->bind("qtd_vagas", $dados['qtdVagas']);
        $this->db->bind("num_andar", $dados['txtNumAndar']);
        $this->db->bind("chk_aceita_pet", $dados['chkAceitaPet']);
        $this->db->bind("chk_mobilia", $dados['chkMobilia']);
        $this->db->bind("chk_metro_prox", $dados['chkMetroProx']);
        $this->db->bind("fk_tipo_imovel", $dados['cboTipoImovel']);
        $this->db->bind("txt_escolas_colegios", $dados['txtEscolaColegio']);
        $this->db->bind("txt_transporte_publico", $dados['txtTransportePublico']);
        $this->db->bind("txt_faculdades", $dados['txtFaculdades']);
        $this->db->bind("mo_aluguel", $dados['moValorAluguel']);
        $this->db->bind("mo_venda", $dados['moValorVenda']);
        $this->db->bind("mo_condominio", $dados['moValorCondominio']);
        $this->db->bind("mo_iptu", $dados['moValorIptu']);
        $this->db->bind("mo_seguro_incendio", $dados['moValorSeguroIncendio']);
        $this->db->bind("mo_taxa_de_servico", $dados['moTaxaServico']);
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
        
        if ($armazenarErro) {
            return false;
        } else {
            return true;
        }     
    }
}
