<?php

class ComprimirFoto
{
    public static function comprimir($imagem_path, $destination_path, $qualidade)
    {
        $info = getimagesize($imagem_path);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($imagem_path);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($imagem_path);

        imagejpeg($image, $destination_path, $qualidade);

        return $destination_path;
    }
}
