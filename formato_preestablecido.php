<form action="" id="form-documento" method="POST" style="margin-top:100px">
	<textarea name="article-body" style="height: 1000px;width:1000px;margin-top:40px;padding:10px;">
		<img src="corporacion_logo.jpg" width="150" alt=""> <span style="color:red;font-size:10px">&nbsp;&nbsp;CORPORACIÓN DE SERVICIOS</span>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="codigo_documento"  contenteditable="true">CSDC-GTIC-<span id="numerodocumento"><?php echo $cuentaPorTipoDocumento[1]->cuentatipodocumento ?></span>/<?php echo date("Y") ?></span>
		<br>
		<br>
		<b>Para:</b>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="de" contenteditable="true">Administración y Finanzas</span><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="parapersona" contenteditable="true">Marcos García</span>
		<br>
		<br>
		<b>De:</b>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="para" contenteditable="true">Carlos Jimenez</span><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="degerencia" contenteditable="true">Gerencia de Tecnología Informática y Comunicaciones</span>
		<br>
		<br>
		<b>Asunto:</b>
		&nbsp;<span id="asunto" contenteditable="true">Reparación de Torniquetes</span><br>
		<br>
		<b>Fecha:</b>
		&nbsp;&nbsp;&nbsp;<span id="fecha" contenteditable="true"><?php echo strftime("%A, %d de %B del %Y") ?></span><br>
		<br>
		<br>
		<span id="saludo">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tengo el agrado de dirigirme a usted muy respetuosamente para hacerle llegar un cordial saludo bolivariano revolucionario y antimperialista, a su vez </span>
		<span id="contenido" contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr cke_show_borders"> <?php echo $data_formato[0]->contenido ?></span>
		
		
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<p style="text-align:center">
	Atentamente, <br><br><br>

______________________ <br>
<b>Carlos Jimenez.</b> <br>
<b>Gerencia de Tecnología, Informática y Comunicaciones</b> <br>
</p>
	<p id="footer" style="text-align:center" >Avenida Principal de La Yaguara con Avenida Garci Da Silva, Frente al Metro La Yaguara, Caracas <br>
¡CARACAS SOCIALISTA!
</p>
	</textarea>
	<div id="botonera">
		<input type="submit"> 
		<select name="tipodocumento" id="tipodocumento">
			<option value="ms">Memo de Salida</option>
			<option value="me">Memo de Entrada</option>
			<option value="oe">Oficio de Entrada</option>
			<option value="os">Oficio de Salida</option>
		</select>
		<span>Solo Google Chrome</span>
		<button onclick="window.print();return false;">Vista Impresión</button>
		<button onclick="javascript:location.href='form_busqueda.php'; return false;">Búsquedas</button>
		<button onclick="javascript:return false;" id="btn_guardar_formato">Guardar como Formato</button>
		<?php echo $formato->getComboFormatos() ?>
	</div>
</form>
