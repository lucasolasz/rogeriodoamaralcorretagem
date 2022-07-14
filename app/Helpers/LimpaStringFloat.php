<?php

//Realiza a limpeza dos campos monetários para pegar o valor inteiro
 
class LimpaStringFloat
{
    public static function limparString(string $valor)
    {
        //Limpa incio e final da string
        $valor = trim($valor);

        //Substitui pontos por nada
        $valor = str_replace('.', '', $valor);

        //Substitui virula por nada
        $valor = str_replace(',', '', $valor);

        //Transforma em inteiro
        return intval($valor);
    }
}
