<?php

class Alertas
{

    public static function mensagem($nome, $texto = null, $classe = null)
    {

        if (!empty($nome)) {

            if (!empty($texto) && empty($_SESSION[$nome])) {

                if (!empty($_SESSION[$nome])) {
                    unset($_SESSION[$nome]);
                }

                $_SESSION[$nome] = $texto;
                $_SESSION[$nome . 'classe'] = $classe;
            } elseif (!empty($_SESSION[$nome]) && empty($texto)) {
                $classe = !empty($_SESSION[$nome . 'classe']) ? $_SESSION[$nome . 'classe'] : 'alert alert-success';
                echo '<div class="' . $classe . '">' . $_SESSION[$nome] . '</div>';

                unset($_SESSION[$nome]);
                unset($_SESSION[$nome . 'classe']);
            }
        }
    }
}
