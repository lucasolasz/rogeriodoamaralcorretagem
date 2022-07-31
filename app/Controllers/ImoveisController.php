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
        $mobilias = $this->imovelModel->listarMobilias();
        $bem_estar = $this->imovelModel->listarBemEstar();
        $eletro = $this->imovelModel->listarEletros();
        $comodos = $this->imovelModel->listarComodos();
        $acessibilidade = $this->imovelModel->listarAcessibilidade();
        $bairros = $this->imovelModel->listarBairros();

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            // var_dump($formulario);
            // exit();

            $dados = [
            
                'txtRuaImovel' => $formulario['txtRuaImovel'],
                'cboBairro' => $formulario['cboBairro'],
                'chkAceitaPet' => $formulario['chkAceitaPet'],
                'chkMobilia' => $formulario['chkMobilia'],
                'chkMetroProx' => $formulario['chkMetroProx'],
                'txtSobreImovel' => $formulario['txtSobreImovel'],
                'txtEscolaColegio' => $formulario['txtEscolaColegio'],
                'txtFaculdades' => $formulario['txtFaculdades'],
                'txtTransportePublico' => $formulario['txtTransportePublico'],
                'txtEntretenimento' => $formulario['txtEntretenimento'],
                'txtHospitais' => $formulario['txtHospitais'],
                'txtParqueAreasVerdes' => $formulario['txtParqueAreasVerdes'],
                'txtShopping' => $formulario['txtShopping'],
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
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade,
                'bairros' => $bairros,
                'txtLinkVideo' => $formulario['txtLinkVideo']
            ];

            //Necessário deixar NULL para estes valores
            $dados['tamArea'] = $formulario['tamArea'] == "" ? NULL : $formulario['tamArea'];
            $dados['qtdQuarto'] = $formulario['qtdQuarto'] == "" ? NULL : $formulario['qtdQuarto'];
            $dados['qtdBanheiro'] = $formulario['qtdBanheiro'] == "" ? NULL : $formulario['qtdBanheiro'];
            $dados['qtdVagas'] = $formulario['qtdVagas'] == "" ? NULL : $formulario['qtdVagas'];
            $dados['txtNumAndar'] = $formulario['txtNumAndar'] == "" ? NULL : $formulario['txtNumAndar'];

            //Váriaveis com sintaxe ternária
            $dados['fileFotos'] = isset($_FILES['fileFotos']) ? $_FILES['fileFotos'] : "";
            $dados['moValorAluguel'] = isset($formulario['moValorAluguel']) ? LimpaStringFloat::limparString($formulario['moValorAluguel']) : NULL;
            $dados['moValorVenda'] = isset($formulario['moValorVenda']) ? LimpaStringFloat::limparString($formulario['moValorVenda']) : NULL;
            $dados['chkCaracteristicaImovel'] = isset($formulario['chkCaracteristicaImovel']) ? $formulario['chkCaracteristicaImovel'] : "";
            $dados['chkCaracteristicaCondominio'] = isset($formulario['chkCaracteristicaCondominio']) ? $formulario['chkCaracteristicaCondominio'] : "";
            $dados['chkMobilias'] = isset($formulario['chkMobilias']) ? $formulario['chkMobilias'] : "";
            $dados['chkBemEstar'] = isset($formulario['chkBemEstar']) ? $formulario['chkBemEstar'] : "";
            $dados['chkEletro'] = isset($formulario['chkEletro']) ? $formulario['chkEletro'] : "";
            $dados['chkComodo'] = isset($formulario['chkComodo']) ? $formulario['chkComodo'] : "";
            $dados['chkAcessibilidade'] = isset($formulario['chkAcessibilidade']) ? $formulario['chkAcessibilidade'] : "";

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

                'txtRuaImovel' => '',
                'txtBairroImovel' => '',
                'tamArea' => '',
                'qtdQuarto' => '',
                'qtdBanheiro' => '',
                'qtdVagas' => '',
                'txtNumAndar' => '',
                'chkAceitaPet' => '',
                'chkMobilia' => '',
                'chkMetroProx' => '',
                'txtSobreImovel' => '',
                'txtEscolaColegio' => '',
                'txtFaculdades' => '',
                'txtTransportePublico' => '',
                'txtEntretenimento' => '',
                'txtHospitais' => '',
                'txtParqueAreasVerdes' => '',
                'txtShopping' => '',
                'cboTipoImovel' => '',
                'cboTipoNegociacao' => '',
                'moValorAluguel' => '',
                'moValorVenda' => '',
                'moValorCondominio' => '',
                'moValorIptu' => '',
                'moValorSeguroIncendio' => '',
                'moTaxaServico' => '',
                'txtNomeProprietario' => '',
                'txtTelProprietario' => '',
                'txtEmailProprietario' => '',
                'tipoImovel_erro' => '',
                'rua_imovel_erro' => '',
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
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade,
                'bairros' => $bairros,
                'txtLinkVideo' => ''

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
        $mobilias = $this->imovelModel->listarMobilias();
        $bem_estar = $this->imovelModel->listarBemEstar();
        $eletro = $this->imovelModel->listarEletros();
        $comodos = $this->imovelModel->listarComodos();
        $acessibilidade = $this->imovelModel->listarAcessibilidade();


        $fotosImovel = $this->imovelModel->lerFotosPorId($id);
        $relacionaCaracImovel = $this->imovelModel->caracImovelPorId($id);
        $relacionaCaracCondo = $this->imovelModel->caracCondoPorId($id);

        $relacionaAcessibilidade = $this->imovelModel->filtroAcessibilidadePorId($id);
        $relacionaBemEstar = $this->imovelModel->filtroBemEstarPorId($id);
        $relacionaComodidades = $this->imovelModel->filtroComodidadesPorId($id);
        $relacionaComodos = $this->imovelModel->filtroComodosPorId($id);
        $relacionaEletros = $this->imovelModel->filtroEletroPorId($id);
        $relacionaMobilias = $this->imovelModel->filtroMobiliaPorId($id);

        $bairros = $this->imovelModel->listarBairros();

        // var_dump($imovel);
        // exit();

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {


            // var_dump($formulario);
            // exit();

            $dados = [
                
                'txtRuaImovel' => $formulario['txtRuaImovel'],
                'cboBairro' => $formulario['cboBairro'],
                'chkAceitaPet' => $formulario['chkAceitaPet'],
                'chkMobilia' => $formulario['chkMobilia'],
                'chkMetroProx' => $formulario['chkMetroProx'],
                'txtSobreImovel' => $formulario['txtSobreImovel'],
                'txtEscolaColegio' => $formulario['txtEscolaColegio'],
                'txtFaculdades' => $formulario['txtFaculdades'],
                'txtTransportePublico' => $formulario['txtTransportePublico'],
                'txtEntretenimento' => $formulario['txtEntretenimento'],
                'txtHospitais' => $formulario['txtHospitais'],
                'txtParqueAreasVerdes' => $formulario['txtParqueAreasVerdes'],
                'txtShopping' => $formulario['txtShopping'],
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
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade,
                'relacionaCaracImovel' => $relacionaCaracImovel,
                'relacionaCaracCondo' => $relacionaCaracCondo,
                'relacionaAcessibilidade' => $relacionaAcessibilidade,
                'relacionaBemEstar' => $relacionaBemEstar,
                'relacionaComodidades' => $relacionaComodidades,
                'relacionaComodos' => $relacionaComodos,
                'relacionaEletros' => $relacionaEletros,
                'relacionaMobilias' => $relacionaMobilias,
                'bairros' => $bairros,
                'txtLinkVideo' => $formulario['txtLinkVideo']

            ];

            //Necessário deixar NULL para estes valores
            $dados['tamArea'] = $formulario['tamArea'] == "" ? NULL : $formulario['tamArea'];
            $dados['qtdQuarto'] = $formulario['qtdQuarto'] == "" ? NULL : $formulario['qtdQuarto'];
            $dados['qtdBanheiro'] = $formulario['qtdBanheiro'] == "" ? NULL : $formulario['qtdBanheiro'];
            $dados['qtdVagas'] = $formulario['qtdVagas'] == "" ? NULL : $formulario['qtdVagas'];
            $dados['txtNumAndar'] = $formulario['txtNumAndar'] == "" ? NULL : $formulario['txtNumAndar'];


            $dados['chkFotoDestaque'] = isset($formulario['chkFotoDestaque']) ? $formulario['chkFotoDestaque'] : "";
            $dados['fotosImovel'] = !empty($fotosImovel) ? $fotosImovel : "";
            $dados['fileFotos'] = isset($_FILES['fileFotos']) ? $_FILES['fileFotos'] : "";
            $dados['moValorAluguel'] = isset($formulario['moValorAluguel']) ? LimpaStringFloat::limparString($formulario['moValorAluguel']) : NULL;
            $dados['moValorVenda'] = isset($formulario['moValorVenda']) ? LimpaStringFloat::limparString($formulario['moValorVenda']) : NULL;
            $dados['chkCaracteristicaImovel'] = isset($formulario['chkCaracteristicaImovel']) ? $formulario['chkCaracteristicaImovel'] : "";
            $dados['chkCaracteristicaCondominio'] = isset($formulario['chkCaracteristicaCondominio']) ? $formulario['chkCaracteristicaCondominio'] : "";            
            $dados['chkMobilias'] = isset($formulario['chkMobilias']) ? $formulario['chkMobilias'] : "";
            $dados['chkBemEstar'] = isset($formulario['chkBemEstar']) ? $formulario['chkBemEstar'] : "";
            $dados['chkEletro'] = isset($formulario['chkEletro']) ? $formulario['chkEletro'] : "";
            $dados['chkComodo'] = isset($formulario['chkComodo']) ? $formulario['chkComodo'] : "";
            $dados['chkAcessibilidade'] = isset($formulario['chkAcessibilidade']) ? $formulario['chkAcessibilidade'] : "";


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
                'bairros' => $bairros,
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio,                
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade,
                'relacionaCaracImovel' => $relacionaCaracImovel,
                'relacionaCaracCondo' => $relacionaCaracCondo,
                'relacionaAcessibilidade' => $relacionaAcessibilidade,
                'relacionaBemEstar' => $relacionaBemEstar,
                'relacionaComodidades' => $relacionaComodidades,
                'relacionaComodos' => $relacionaComodos,
                'relacionaEletros' => $relacionaEletros,
                'relacionaMobilias' => $relacionaMobilias,
                'rua_imovel_erro' => '',
                'bairro_imovel_erro' => '',
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
                'email_proprietario_erro' => '',
                'txtLinkVideo' => ''
            ];

            $dados['fotosImovel'] = isset($fotosImovel) ? $fotosImovel : "";
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
            Alertas::mensagem('imagem', 'Imagem deletada com sucesso.');
            Alertas::mensagem('imagemExtra', 'Caso tenha sido a <b>Foto destaque</b>, escolha uma nova para substituí-la.', 'alert alert-warning');
            Redirecionamento::redirecionar('ImoveisController/editar/' . $fk_imovel->fk_imovel);
        } else {
            Alertas::mensagem('imagem', 'Não foi deletar a imagem do imóvel', 'alert alert-danger');
            Redirecionamento::redirecionar('ImoveisController/editar/' . $fk_imovel->fk_imovel);
        }
    }


    public function deletar($id)
    {

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
                Alertas::mensagem('imoveis', 'Imóvel deletado com sucesso');
                Redirecionamento::redirecionar('ImoveisController');
            } else {
                Alertas::mensagem('imoveis', 'Não foi possível deletar o imóvel', 'alert alert-danger');
                Redirecionamento::redirecionar('ImoveisController');
            }
        } else {
            Alertas::mensagem('imoveis', 'Não foi possível deletar o imóvel', 'alert alert-danger');
            Redirecionamento::redirecionar('ImoveisController');
        }
    }


    public function pesquisar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            if (!$formulario['pesquisaImovel'] == "") {
                $dados = [
                    'imoveis' => $this->imovelModel->lerImovelPesquisaPorId($formulario['pesquisaImovel'])
                ];
            } else {

                $dados = [
                    'imoveis' => $this->imovelModel->listarImoveis()
                ];
            }
        }

        //Retorna para a view
        $this->view('imoveis/index', $dados);
    }
}
