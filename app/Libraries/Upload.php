<?php


class Upload
{

    private $diretorio;
    private $arquivo;
    private $tamanho;
    private $resultado;
    private $erro;
    private $nome;
    private $pasta;
    private $path;

    public function getResultado(): string
    {
        return $this->resultado;
    }

    public function getErro(): string
    {
        return $this->erro;
    }

    public function getPath(): string
    {
        return $this->path;
    }


    //É possivel definir um nome de diretorio de upload personalizado. 
    //Basta informar o nome pelo parâmetro ao instanciar o objeto
    public function __construct(string $diretorio = null)
    {
        $this->diretorio = $diretorio ? $diretorio : 'uploads';
        if (!file_exists($this->diretorio) && !is_dir($this->diretorio)) {
            mkdir($this->diretorio, 0777);
        }
    }



    public function imagem(array $imagem, string $nome = null, string $pasta = null, int $tamanho = null)
    {

        $this->arquivo = $imagem;
        //Posso receber um nome opcional para imagem. Caso contrário, será o próprio nome do arquivo
        $this->nome = $nome ? $nome : pathinfo($this->arquivo['name'], PATHINFO_FILENAME);
        $this->pasta = $pasta ? $pasta : 'imagens';
        //Escolher o tamanho padrão de upload é 1MB
        $this->tamanho = $tamanho ? $tamanho : 1;
        //Recebe diretório Padrão
        $this->path = $this->diretorio . DIRECTORY_SEPARATOR . $this->pasta;

        $extensao = pathinfo($this->arquivo['name'], PATHINFO_EXTENSION);

        $extensoesValidas = [
            'png',
            'jpg'
        ];

        $tiposValidos = [
            'image/jpeg',
            'image/png'
        ];

        if (!in_array($extensao, $extensoesValidas)) {
            $this->erro =  'A extensão não é permitida';
            $this->resultado = false;
        } elseif (!in_array($this->arquivo['type'], $tiposValidos)) {
            $this->erro = 'Tipo inválido';
            $this->resultado = false;
        } elseif ($this->arquivo['size'] > $this->tamanho * (1024 * 1024)) {
            $this->erro = 'Arquivo muito grande';
            $this->resultado = false;
        } else {
            $this->criarPasta();
            $this->renomearArquivo();
            $this->moverArquivo();
        }
    }


    private function renomearArquivo()
    {
        $arquivo = $this->nome . strrchr($this->arquivo['name'], '.');
        if (file_exists($this->diretorio . DIRECTORY_SEPARATOR . $this->pasta . DIRECTORY_SEPARATOR . $arquivo)) {
            $arquivo = $this->nome . '_' . uniqid() . strrchr($this->arquivo['name'], '.');
        } else {
            $arquivo = $this->nome . '_' . uniqid() . strrchr($this->arquivo['name'], '.');
        }
        $this->nome = $arquivo;
    }

    private function criarPasta()
    {
        //Somente cria pasta se não existir
        if (!file_exists($this->diretorio) . DIRECTORY_SEPARATOR . $this->pasta && !is_dir($this->diretorio . DIRECTORY_SEPARATOR . $this->pasta)) {
            mkdir($this->diretorio . DIRECTORY_SEPARATOR . $this->pasta, 0777);
            $diretorio = $this->diretorio . DIRECTORY_SEPARATOR . $this->pasta;
            //Captura o diretório das imagens
            $this->path = $diretorio;
        }
    }

    private function moverArquivo()
    {
        if (move_uploaded_file($this->arquivo['tmp_name'], $this->diretorio . DIRECTORY_SEPARATOR . $this->pasta . DIRECTORY_SEPARATOR . $this->nome)) {
            $this->resultado = $this->nome;
        } else {
            $this->resultado = false;
            $this->erro = 'Erro ao mover arquivo!';
        }
    }

    public function deletarArquivo($arquivo)
    {
        //String com o caminho + nome_arquivo
        $diretorio = ($this->diretorio . DIRECTORY_SEPARATOR . $this->pasta . DIRECTORY_SEPARATOR . $arquivo);

        if (file_exists($diretorio)) {

            if (unlink($diretorio)) {
                $this->resultado = 'Arquivo Deletado';
            } else {
                $this->resultado = false;
                $this->erro = 'Erro ao deletar arquivo!';
            }
        } else {
            $this->erro = 'Arquivo não existe neste diretório!';
        }
    }
}
