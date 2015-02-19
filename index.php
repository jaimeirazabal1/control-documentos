<?php setlocale(LC_TIME, 'es_ES.UTF-8'); ?>

<?php include_once("pg.php") ?>
<?php include_once("functions.php") ?>
<?php $doc = new Documento() ?>
<?php $formato = new Formato() ?>
<?php $cuentaPorTipoDocumento = $doc->getCantidadDocumento() ?>
<?php if (isset($_GET['formato']) and $_GET['formato']): ?>
	<?php $data_formato = $formato->get($_GET['formato']) ?>
	
<?php endif ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<script src="ckeditor.js"></script>
	<script type="text/javascript" src="ckeditor.js"></script>
	<script type="text/javascript" src="adapters/jquery.js"></script>
	<script type="text/javascript" src="../jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.11.3.custom/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.11.3.custom/jquery-ui.min.css">
	<?php include_once("main.php") ?>
	<style type="text/css" media="print">
		@page  
		{ 
		    size: auto;   /* auto is the initial value */ 

		    /* this affects the margin in the printer settings */ 
		    margin-top:-10mm;
		} 

		body  
		{ 
		    /* this affects the margin on the content before sending to printer */ 
		    margin: 0px;  
		} 
		#botonera{
			display:none;
		}
		#form-documento{
			margin:0mm 0mm 0mm 0mm;
		}
	</style>
	<style type="text/css">
		@font-face
		{
			font-family: 'arial-black';
			src: local('Arial Black');
		}

		*[contenteditable="true"]
		{
			padding: 10px;
		}
		#contenido:focus
		{
			padding: 10px;
			background: #DBDBDB;
		}
		#container
		{
			width: 960px;
			margin: 30px auto 0;
		}

		#header
		{
			overflow: hidden;
			padding: 0 0 30px;
			border-bottom: 5px solid #05B2D2;
			position: relative;
		}

		#headerLeft,
		#headerRight
		{
			width: 49%;
			overflow: hidden;
		}

		#headerLeft
		{
			float: left;
			padding: 10px 1px 1px;
		}

		#headerLeft h2,
		#headerLeft h3
		{
			text-align: right;
			margin: 0;
			overflow: hidden;
			font-weight: normal;
		}

		#headerLeft h2
		{
			font-family: "Arial Black",arial-black;
			font-size: 4.6em;
			line-height: 1.1;
			text-transform: uppercase;
		}

		#headerLeft h3
		{
			font-size: 2.3em;
			line-height: 1.1;
			margin: .2em 0 0;
			color: #666;
		}

		#headerRight
		{
			float: right;
			padding: 1px;
		}

		#headerRight p
		{
			line-height: 1.8;
			text-align: justify;
			margin: 0;
		}

		#headerRight p + p
		{
			margin-top: 20px;
		}

		#headerRight > div
		{
			padding: 20px;
			margin: 0 0 0 30px;
			font-size: 1.4em;
			color: #666;
		}

		#columns
		{
			color: #333;
			overflow: hidden;
			padding: 20px 0;
		}

		#columns > div
		{
			float: left;
			width: 33.3%;
		}

		#columns #column1 > div
		{
			margin-left: 1px;
		}

		#columns #column3 > div
		{
			margin-right: 1px;
		}

		#columns > div > div
		{
			margin: 0px 10px;
			padding: 10px 20px;
		}

		#columns blockquote
		{
			margin-left: 15px;
		}

		#tagLine
		{
			border-top: 5px solid #05B2D2;
			padding-top: 20px;
		}

		#taglist {
			display: inline-block;
			margin-left: 20px;
			font-weight: bold;
			margin: 0 0 0 20px;
		}
	</style>

	<title>Registro de Documentos</title>
</head>
<body>
<?php if (isset($data_formato) and $data_formato): ?>
	<?php include_once("formato_preestablecido.php") ?>
<?php else: ?>
	<?php include_once("formato_principal.php") ?>
<?php endif ?>
	<script>
		CKEDITOR.inline( 'article-body' );
		CKEDITOR.config.allowedContent = true; // don't filter my data

	</script>
</body>
</html>
