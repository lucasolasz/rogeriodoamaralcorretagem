<?php

//Verifica se usuário está logado 
class IsLoged
{
    public static function estaLogado(){
        if(isset($_SESSION['id_usuario'])){
            return true;
        } else {
            return false;
        }
    }
}
