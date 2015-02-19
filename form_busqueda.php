<!DOCTYPE html>
<?php include_once("pg.php") ?>
<?php include_once("functions.php") ?>
<?php $doc = new Documento() ?>
<?php $asuntosDeDocumentos = $doc->getAsuntosDeDocumentos() ?>
<?php $DeDeDocumentos = $doc->getDeDeDocumentos() ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de Búsqueda</title>
</head>
<body>
	<fieldset style="width:300px">
		<legend>Búsquedas</legend>
		<form action="" method="get">
			<table>
				<tr>
					<td><label>Tipo de Documento:</label></td>
					<td><select name="tipodocumento" id="">
						<option value="">Seleccione</option>
						<option value="ms">Memo Salida</option>
						<option value="me">Memo Entrada</option>
						<option value="os">Oficio Salida</option>
						<option value="oe">Oficio Entrada</option>
					</select></td>
				</tr>
				<tr>
					<td><label>Asunto:</label></td>
					<td><select name="asunto" id="">
							<option value="">Seleccione</option>
						<?php foreach ($asuntosDeDocumentos as $key => $value): ?>
							<option value="<?php echo $value->asunto ?>"><?php echo $value->asunto ?></option>
						<?php endforeach ?>
					</select></td>
				</tr>
				<tr>
					<td><label>De:</label></td>
					<td><select name="de" id="">
							<option value="">Seleccione</option>

						<?php foreach ($DeDeDocumentos as $key => $value): ?>
							<option value="<?php echo $value->de ?>"><?php echo $value->de ?></option>
						<?php endforeach ?>
					</select></td>
				</tr>
				<tr>
					<td><button onclick="javascript:location.href='index.php';return false;">Atras</button></td>
					<td style="text-align:right"><input type="submit" name="busqueda" value="Buscar"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<?php $resultados = $doc->buscar() ?>
	<?php //pre($resultados) ?>
	<?php if (!empty($resultados)): ?>
		<table>
		 	<thead>
		 		<?php $header = $doc->getKeys($resultados[0]) ?>
		 		<?php for($i = 0; $i < count($header); $i++): ?>
		 			<th><?php echo $header[$i] ?></th>
		 		<?php endfor; ?>
		 	</thead>
		 	<?php for($i = 0; $i < count($resultados); $i++): ?>
				<tr>
					<?php for($j = 0; $j < count($header); $j++): ?>
						<td><?php echo $resultados[$i][$header[$j]] ?></td>
					<?php endfor; ?>
				</tr>
		 	<?php endfor; ?>
		</table>
	<?php endif ?>
</body>
</html>