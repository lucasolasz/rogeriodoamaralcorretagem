#Rogerio do Amaral Corretagem

Aplicação de gerenciamento de compra e venda de imóveis.

Link do projeto: https://rogeriodoamaralcorretagem.com.br/

Design e funcionalidades inspirados no site QuintoAndar.

## Configurações necessárias

Ajustar o app/config/configuracao.php com os seguintes dados:

```php
// 1- Conexão com o banco

define('DB_HOST', 'meu_host');
define('DB_USER', 'meu_user');
define('DB_PASS', 'meu_pass');
define('DB_NAME', 'meu_db');
define('DB_PORT', '3306'); //Porta padrão MySQL

// 2 - Url do Projeto
define('URL','http://meu_host'); <========== Funciona para projeto na pasta raiz
```

Ajustar o path do .htaccess na pasta public: 

```php
<ifModule mod_rewrite.c>
Options -Multiviews
RewriteEngine On
RewriteBase /public         <==========
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</ifModule>
```

## Base de dados

Para a criação da base dados é necessário executar os scripts que estão localizados no diretório /BaseDados

## Tencologias

- PHP 7.4
- MySQL 
- Bootstrap 5.1
- Bootstrap Icons 1.8
- Jquery 3.6
- qcTimepicker



## Créditos

Micro framework - Ronaldo Aires

https://youtube.com/playlist?list=PL0N5TAOhX5E-NZ0RRHa2tet6NCf9-7B5G
