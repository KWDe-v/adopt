<?php 
class ADOPT {
    private $host;
    private $user;
    private $senha;
    private $bd;

    private $mysqli;

    private static $instance = null;

    private function __construct() {
        $this->host         = 'host_db';
        $this->user         = 'username_db';
        $this->senha        = 'password_db';
        $this->bd           = 'name_db';

        try {                                                   
            $this->mysqli = new mysqli($this->host, $this->user, $this->senha, $this->bd);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }

        
        $this->mysqli->set_charset("utf8mb4");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->mysqli;
    }



    
    public static function getDonoPet($accountID){


        $sql = "SELECT * FROM usuarios WHERE id = $accountID";
        $sth = self::getInstance()->query($sql);
        $infos = $sth->fetch_assoc();

        return $infos;
    }

        public static function getEstado($estado){


        $sql = "SELECT * FROM estado WHERE id = $estado";
        $sth = self::getInstance()->query($sql);
        $infos = $sth->fetch_assoc();

        return $infos;
    }


    public static function adminRequired() {
  
        if (isset($_SESSION["grupo"]) && !empty($_SESSION["grupo"]) && $_SESSION["grupo"] == 1) {
            return true;
           
        } else{
            header("Location: ?to=error&id=401");
            exit; 
        }
    }

    public static function checkAdmin() {
  
        if (isset($_SESSION["grupo"]) && $_SESSION["grupo"] == 1) {
            return true;
           
        } 
    }

public static function defineMessageSession($message)
{
    $_SESSION['message'] = $message;
    return $message; 
}

public static function getMessageSession()
{
    
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    
   
    $_SESSION['message'] = '';
    
    return $message;
}


    public static function LoginRequired() {
          if (!isset($_SESSION['usuario']) || empty($_SESSION["usuario"])) {
            
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

            
            header("Location: ?to=entrar");
            exit();
        }
    }





}// fecha a classe ADOPT


function formatarValor($valor) {

    if (!is_numeric($valor)) {
        return "Valor inválido";
    }
    

    $valorFormatado = number_format($valor, 2, ',', '.');
    if ($valor >= 1000000000) {
        $valorAbreviado = number_format($valor / 1000000000, 1, ',', '.');
        return "R$ {$valorAbreviado} B";
    }elseif ($valor >= 1000000) {
        $valorAbreviado = number_format($valor / 1000000, 1, ',', '.');
        return "R$ {$valorAbreviado} M";
    } elseif ($valor >= 1000) {
        $valorAbreviado = number_format($valor / 1000, 1, ',', '.');
        return "R$ {$valorAbreviado} Mil";
    } else {
        return "R$ {$valorFormatado}";
    }
}


function formatarTelefone($telefone) {

    $telefone = preg_replace('/\D/', '', $telefone);


    if (strlen($telefone) == 11) {

        $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 1) . ' ' . substr($telefone, 3, 4) . '-' . substr($telefone, 7, 4);
    } else {

        $telefone_formatado = substr($telefone, 0, 1) . ' ' . substr($telefone, 1, 4) . '-' . substr($telefone, 5, 4);
    }

    return $telefone_formatado;
}

function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if ($cpf == 12345678909) {
        return false;
    }

    if (strlen($cpf) != 11) {
        return false;
    }
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int)$cpf[$i] * (10 - $i);
    }
    $val1 = 11 - ($soma % 11);
    if ($val1 >= 10) {
        $val1 = 0;
    }
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int)$cpf[$i] * (11 - $i);
    }
    $val2 = 11 - ($soma % 11);
    if ($val2 >= 10) {
        $val2 = 0;
    }
    if ($val1 == (int)$cpf[9] && $val2 == (int)$cpf[10]) {
        return true;
    } else {
        return false;
    }
}
function formatarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    if (strlen($cpf) != 11) {
        return false; 
    }
    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}
function formatarData2($dataHora) {
    
    $date = new DateTime($dataHora);
    return $date->format('d/m/Y');
}

 ?>	