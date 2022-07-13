<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');
include './../app/config/configuracao.php';
include './../app/autoload.php';
?>

<?php
// include APP.'/views/topo.php';
$rotas = new Rota();
// include APP.'/views/rodape.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URL ?>/public/js/jquery.funcoes.js"></script>
</body>

</html>