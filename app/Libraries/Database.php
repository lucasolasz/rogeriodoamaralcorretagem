<?php 

class Database {

    private $host = DB_HOST;
    private $usuario = DB_USER;
    private $senha = DB_PASS;
    private $banco = DB_NAME;
    private $porta = DB_PORT;
    private $dbh;
    private $stmt;



    public function __construct()
    {
        //Informações para conectar ao banco
        $dsn = 'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //constante faz com que a conexão fique persistente em cache, evita sobrecarga
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        
        try {
            
            //cria a instancia do banco
           $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    //metodo que recebe a query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Inserir e atualizar dados em PDO. Precisa vincular a estes parametros. Chamado bind
    public function bind($parametro, $valor, $tipo = null) {

        if(is_null($tipo)){
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                $tipo = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

     //Para olhar a query montada
    public function imprimeSqlMontada(){

        $this->stmt->execute();
        return $this->stmt->debugDumpParams();

    }

    public function executa(){
        return $this->stmt->execute();  
    }

    //Retorna apenas 1 resultado
    public function resultado() {
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


    //Retorna um array com vários resultados
    public function resultados() {
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    //Retorna o numero de linhas do resultado
    public function totalResultados(){
        return $this->stmt->rowCount();
    }


    //Retorna ultimo id inserido
    public function ultimoIdInserido(){
        return $this->dbh->lastInsertId();
    }

}