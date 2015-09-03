<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/kickstart.js" type="text/javascript"></script>
        
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/kickstart.js" type="text/javascript"></script>
	<title>ArquivosTCE</title>
</head>
<body>
	<? echo $menu; ?>
    <br></br>
    <br></br>
    	<div class="col_3">
            <a class="button pop" href="<?php echo site_url('adesao_ata_licitacao/principal'); ?>">Adesão a Ata</a>
            <a class="button pop" href="<?php echo site_url('item_adesao_ata/principal'); ?>">Item de Adesão a Ata</a>
        </div>
        <div class="col_3">
            <a class="button pop" href="<?php echo site_url('contratos/principal'); ?>">Contratos</a>
            <a class="button pop" href="<?php echo site_url('contrato_empenho/principal'); ?>">Nota de Empenho de Contrato</a>
        </div>
        <br></br>
        <div class="col_6">
            <a class="button pop" href="<?php echo site_url('convenios/principal'); ?>">Convenios</a>
            <a class="button pop" href="<?php echo site_url('participantes_convenio/principal'); ?>">Participantes Convenios</a>
            <a class="button pop" href="<?php echo site_url('convenio_empenho/principal'); ?>">Nota de Empenho de Convênio</a>
        </div>
		<div class="col_9">
            <a class="button pop" href="<?php echo site_url('contas/principal'); ?>">Contas</a>
            <a class="button pop" href="<?php echo site_url('movcon_inicial/principal'); ?>">Movimentação da Conta Inicial</a>
            <a class="button pop" href="<?php echo site_url('movcon_mensal/principal'); ?>">Movimentação da Conta Mensal</a>
			<a class="button pop" href="<?php echo site_url('movcon_final/principal'); ?>">Movimentação da Conta Final</a>
        </div>
        <br></br>
        <div class="col_10">
            <a class="button pop" href="<?php echo site_url('licitacoes/principal'); ?>">Licitações</a>
            <a class="button pop" href="<?php echo site_url('itens_licitacao/principal'); ?>">Itens Licitação</a>
            <a class="button pop" href="<?php echo site_url('cotacoes/principal'); ?>">Cotações</a>
            <a class="button pop" href="<?php echo site_url('certidoes/principal'); ?>">Certidões</a>
            <a class="button pop" href="<?php echo site_url('participantes_licita/principal'); ?>">Participantes licitação</a>
            <a class="button pop" href="<?php echo site_url('publicacoes/principal'); ?>">Publicação</a>
			<a class="button pop" href="<?php echo site_url('licitacao_empenho/principal'); ?>">Nota de Empenho de licitação</a>
        </div>
</body>
</html>