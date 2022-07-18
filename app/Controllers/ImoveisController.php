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

            // var_dump($formulario);
            // exit();

            $dados = [
                // 'txtTituloImovel' => $formulario['txtTituloImovel'],
                'txtEnderecoImovel' => $formulario['txtEnderecoImovel'],
                'tamArea' => LimpaStringFloat::limparString($formulario['tamArea']),
                'qtdQuarto' => LimpaStringFloat::limparString($formulario['qtdQuarto']),
                'qtdBanheiro' => LimpaStringFloat::limparString($formulario['qtdBanheiro']),
                'qtdVagas' => LimpaStringFloat::limparString($formulario['qtdVagas']),
                'txtNumAndar' => LimpaStringFloat::limparString($formulario['txtNumAndar']),
                'chkAceitaPet' => $formulario['chkAceitaPet'],
                'chkMobilia' => $formulario['chkMobilia'],
                'chkMetroProx' => $formulario['chkMetroProx'],
                'txtEscolaColegio' => $formulario['txtEscolaColegio'],
                'txtFaculdades' => $formulario['txtFaculdades'],
                'txtTransportePublico' => $formulario['txtTransportePublico'],
                'txtEntretenimento' => $formulario['txtEntretenimento'],
                'txtHospitais' => $formulario['txtHospitais'],
                'txtParqueAreasVerdes' => $formulario['txtParqueAreasVerdes'],
                'cboTipoImovel' => $formulario['cboTipoImovel'],
                'cboTipoNegociacao' => $formulario['cboTipoNegociacao'],
                'moValorCondominio' => LimpaStringFloat::limparString($formulario['moValorCondominio']),
                'moValorIptu' => LimpaStringFloat::limparString($formulario['moValorIptu']),
                'moValorSeguroIncendio' => LimpaStringFloat::limparString($formulario['moValorSeguroIncendio']),
                'moTaxaServico' => LimpaStringFloat::limparString($formulario['moTaxaServico']),
                'txtNomeProprietario' => $formulario['txtNomeProprietario'],
                'txtTelProprietario' => $formulario['txtTelProprietario'],
                'txtEmailProprietario' => $formulario['txtEmailProprietario'],
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio
            ];

            //  var_dump($dados);
            // exit();

            //Váriaveis com sintaxe ternária
            $dados['fileFotos'] = isset($_FILES['fileFotos']) ? $_FILES['fileFotos'] : "";

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
                // 'txtTituloImovel' => '',
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
                'txtEntretenimento' => '',
                'txtHospitais' => '',
                'txtParqueAreasVerdes' => '',
                'moValorAluguel' => '',
                'moValorVenda' => '',
                'moValorCondominio' => '',
                'moValorIptu' => '',
                'moValorSeguroIncendio' => '',
                'moTaxaServico' => '',
                'txtNomeProprietario' => '',
                'txtTelProprietario' => '',
                'txtEmailProprietario' => '',
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

    public function editar($id)
    {

        $imovel = $this->imovelModel->lerImovelPorId($id);
        $tipoNegociacao = $this->imovelModel->listarTipoNegociacao();
        $tipoImovel = $this->imovelModel->listarTipoImovel();
        $caracteristicasImovel = $this->imovelModel->listarCaracteristicasImovel();
        $caracteristicasCondominio = $this->imovelModel->listarCaracteristicasCondominio();
        $fotosImovel = $this->imovelModel->lerFotosPorId($id);
        $relacionaCaracImovel = $this->imovelModel->caracImovelPorId($id);
        $relacionaCaracCondo = $this->imovelModel->caracCondoPorId($id);

        // var_dump($imovel);
        // exit();

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {


            // var_dump($formulario);
            // exit();

            $dados = [
                'chkFotoDestaque' => $formulario['chkFotoDestaque'],
                'txtEnderecoImovel' => $formulario['txtEnderecoImovel'],
                'tamArea' => LimpaStringFloat::limparString($formulario['tamArea']),
                'qtdQuarto' => LimpaStringFloat::limparString($formulario['qtdQuarto']),
                'qtdBanheiro' => LimpaStringFloat::limparString($formulario['qtdBanheiro']),
                'qtdVagas' => LimpaStringFloat::limparString($formulario['qtdVagas']),
                'txtNumAndar' => LimpaStringFloat::limparString($formulario['txtNumAndar']),
                'chkAceitaPet' => $formulario['chkAceitaPet'],
                'chkMobilia' => $formulario['chkMobilia'],
                'chkMetroProx' => $formulario['chkMetroProx'],
                'txtEscolaColegio' => $formulario['txtEscolaColegio'],
                'txtFaculdades' => $formulario['txtFaculdades'],
                'txtTransportePublico' => $formulario['txtTransportePublico'],
                'txtEntretenimento' => $formulario['txtEntretenimento'],
                'txtHospitais' => $formulario['txtHospitais'],
                'txtParqueAreasVerdes' => $formulario['txtParqueAreasVerdes'],
                'cboTipoImovel' => $formulario['cboTipoImovel'],
                'cboTipoNegociacao' => $formulario['cboTipoNegociacao'],
                'moValorCondominio' => LimpaStringFloat::limparString($formulario['moValorCondominio']),
                'moValorIptu' => LimpaStringFloat::limparString($formulario['moValorIptu']),
                'moValorSeguroIncendio' => LimpaStringFloat::limparString($formulario['moValorSeguroIncendio']),
                'moTaxaServico' => LimpaStringFloat::limparString($formulario['moTaxaServico']),
                'txtNomeProprietario' => $formulario['txtNomeProprietario'],
                'txtTelProprietario' => $formulario['txtTelProprietario'],
                'txtEmailProprietario' => $formulario['txtEmailProprietario'],
                'imovel' => $imovel,
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'relacionaCaracImovel' => $relacionaCaracImovel,
                'relacionaCaracCondo' => $relacionaCaracCondo

            ];


            $dados['fileFotos'] = isset($_FILES['fileFotos']) ? $_FILES['fileFotos'] : "";

            $dados['moValorAluguel'] = isset($formulario['moValorAluguel']) ? LimpaStringFloat::limparString($formulario['moValorAluguel']) : NULL;

            $dados['moValorVenda'] = isset($formulario['moValorVenda']) ? LimpaStringFloat::limparString($formulario['moValorVenda']) : NULL;

            $dados['chkCaracteristicaImovel'] = isset($formulario['chkCaracteristicaImovel']) ? $formulario['chkCaracteristicaImovel'] : "";

            $dados['chkCaracteristicaCondominio'] = isset($formulario['chkCaracteristicaCondominio']) ? $formulario['chkCaracteristicaCondominio'] : "";


            // var_dump($dados);
            // exit();

            if ($this->imovelModel->editarImovel($dados)) {

                //Para exibir mensagem success , não precisa informar o tipo de classe
                Alertas::mensagem('imoveis', 'Imóvel atualizado com sucesso');
                Redirecionamento::redirecionar('ImoveisController');
            } else {
                Alertas::mensagem('imoveis', 'Não foi possível atualizar o imóvel', 'alert alert-danger');
                Redirecionamento::redirecionar('ImoveisController');
            }
        } else {

            $dados = [
                'imovel' => $imovel,
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'fotosImovel' => $fotosImovel,
                'relacionaCaracImovel' => $relacionaCaracImovel,
                'relacionaCaracCondo' => $relacionaCaracCondo,
                'tipoImovel_erro' => '',
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
                'nome_proprietario_erro' => '',
                'tel_proprietario_erro' => '',
                'email_proprietario_erro' => ''
            ];
        }



        //Retorna para a view
        $this->view('imoveis/editar', $dados);
    }

    public function deletarImagem($id)
    {
        $fk_imovel = $this->imovelModel->lerInfoImagem($id);

        $dados = [
            'infoImovel' => $fk_imovel
        ];

        if ($this->imovelModel->deletarFoto($dados)) {
            Alertas::mensagem('imagem', 'Imagem deletada com sucesso');
            Redirecionamento::redirecionar('ImoveisController/editar/' . $fk_imovel->fk_imovel);
        } else {
            Alertas::mensagem('imagem', 'Não foi deletar a imagem do imóvel', 'alert alert-danger');
            Redirecionamento::redirecionar('ImoveisController/editar/' . $fk_imovel->fk_imovel);
        }

    }


    public function deletar($id){

        $id = filter_var($id, FILTER_VALIDATE_INT);

        $infoImovel = $this->imovelModel->lerInfoAnexo($id);

        // var_dump($fk_imovel);
        // exit();

        $dados = [
            'infoImovel' => $infoImovel,
            'id_imovel' => $id
        ];

        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

        if ($id && $metodo == 'POST') {

            if ($this->imovelModel->deletarImovel($dados)) {

                //Para exibir mensagem success , não precisa informar o tipo de classe
                Alertas::mensagem('imoveis', 'Imagem deletada com sucesso');
                Redirecionamento::redirecionar('ImoveisController');
            } else {
                Alertas::mensagem('imoveis', 'Não foi possível deletar o evento', 'alert alert-danger');
                Redirecionamento::redirecionar('ImoveisController');
            }
        } else {
            Alertas::mensagem('imoveis', 'Não foi possível deletar o evento', 'alert alert-danger');
            Redirecionamento::redirecionar('ImoveisController');
        }
    }
}
