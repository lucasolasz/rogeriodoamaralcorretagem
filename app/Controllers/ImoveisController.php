<?php

class ImoveisController extends Controller
{

    public function __construct()
    {
        //Redireciona para tela de login caso usuario nao esteja logado
        if (!IsLoged::estaLogado()) {
            Redirecionamento::redirecionar('Paginas');
        }

        $this->imovelModel = $this->model('Imoveis');
    }

    public function index()
    {
        $dados = [
            'imoveis' => $this->imovelModel->listarImoveis()
        ];

        $this->view('imoveis/index', $dados);
    }


    public function cadastrar()
    {
        $tipoNegociacao = $this->imovelModel->listarTipoNegociacao();
        $tipoImovel = $this->imovelModel->listarTipoImovel();
        $caracteristicasImovel = $this->imovelModel->listarCaracteristicasImovel();
        $caracteristicasCondominio = $this->imovelModel->listarCaracteristicasCondominio();

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            $dados = [
                'txtTituloImovel' => $formulario['txtTituloImovel'],
                'txtEnderecoImovel' => $formulario['txtEnderecoImovel'],
                'tamArea' => $formulario['tamArea'],
                'qtdQuarto' => $formulario['qtdQuarto'],
                'qtdBanheiro' => $formulario['qtdBanheiro'],
                'qtdVagas' => $formulario['qtdVagas'],
                'txtNumAndar' => $formulario['txtNumAndar'],
                'chkAceitaPet' => $formulario['chkAceitaPet'],
                'chkMobilia' => $formulario['chkMobilia'],
                'chkMetroProx' => $formulario['chkMetroProx'],
                'txtEscolaColegio' => $formulario['txtEscolaColegio'],
                'txtFaculdades' => $formulario['txtFaculdades'],
                'txtTransportePublico' => $formulario['txtTransportePublico'],
                'cboTipoImovel' => $formulario['cboTipoImovel'],
                'cboTipoNegociacao' => $formulario['cboTipoNegociacao'],
                'moValorCondominio' => LimpaStringFloat::limparString($formulario['moValorCondominio']),
                'moValorIptu' => LimpaStringFloat::limparString($formulario['moValorIptu']),
                'moValorSeguroIncendio' => LimpaStringFloat::limparString($formulario['moValorSeguroIncendio']),
                'moTaxaServico' => LimpaStringFloat::limparString($formulario['moTaxaServico']),
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio
            ];

            //  var_dump($formulario);
            // exit();

            //Váriaveis com sintaxe ternária
            $dados['moValorAluguel'] = isset($formulario['moValorAluguel']) ? LimpaStringFloat::limparString($formulario['moValorAluguel']) : NULL;

            $dados['moValorVenda'] = isset($formulario['moValorVenda']) ? LimpaStringFloat::limparString($formulario['moValorVenda']) : NULL;

            $dados['chkCaracteristicaImovel'] = isset($formulario['chkCaracteristicaImovel']) ? $formulario['chkCaracteristicaImovel'] : "";

            $dados['chkCaracteristicaCondominio'] = isset($formulario['chkCaracteristicaCondominio']) ? $formulario['chkCaracteristicaCondominio'] : "";

            // var_dump($dados);
            // exit();

            if ($this->imovelModel->armazenarImovel($dados)) {

                //Para exibir mensagem success , não precisa informar o tipo de classe
                Alertas::mensagem('imoveis', 'Imóvel cadastrado com sucesso');
                Redirecionamento::redirecionar('ImoveisController');
            } else {
                Alertas::mensagem('imoveis', 'Não foi possível cadastrar o imóvel', 'alert alert-danger');
                Redirecionamento::redirecionar('ImoveisController');
            }

        } else {
            $dados = [
                'txtTituloImovel' => '',
                'txtEnderecoImovel' => '',
                'tamArea' => '',
                'qtdQuarto' => '',
                'qtdBanheiro' => '',
                'qtdVagas' => '',
                'txtNumAndar' => '',
                'chkAceitaPet' => '',
                'chkMobilia' => '',
                'chkMetroProx' => '',
                'txtEscolaColegio' => '',
                'txtFaculdades' => '',
                'txtTransportePublico' => '',
                'moValorAluguel' => '',
                'moValorVenda' => '',
                'moValorCondominio' => '',
                'moValorIptu' => '',
                'moValorSeguroIncendio' => '',
                'moTaxaServico' => '',
                'titulo_imovel_erro' => '',
                'endereco_imovel_erro' => '',
                'area_imovel_erro' => '',
                'qtd_quarto_erro' => '',
                'qtd_banheiro_erro' => '',
                'qtd_vagas_erro' => '',
                'num_andar_erro' => '',
                'tipoNegociacao_erro' => '',
                'valor_aluguel_erro' => '',
                'valor_venda_erro' => '',
                'valor_condominio_erro' => '',
                'valor_iptu_erro' => '',
                'valor_seguro_incendio_erro' => '',
                'taxa_servico_erro' => '',
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio

            ];
        }
        //Retorna para a view
        $this->view('imoveis/cadastrar', $dados);
    }
}
