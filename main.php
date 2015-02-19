<script type="text/javascript">
$(document).ready(function(){
		var clicks_ventanas_formatos = 0;
		var cuentaPorTipoDocumento = <?php echo json_encode($cuentaPorTipoDocumento) ?>;
		cuentaPorTipoDocumento = cuentaPorTipoDocumento ? cuentaPorTipoDocumento : 0;
		console.log(cuentaPorTipoDocumento)
		var tipoDocumentoActual = $("#tipodocumento option:selected").val();
		var cantidadDelDocumentoActual = getNumeroSiguienteDocumento(tipoDocumentoActual);
		cambiarCodigoEnDocumento(cantidadDelDocumentoActual);
		$("#form-documento").submit(function(r){
			r.preventDefault();
			var codDocumento = $("#codigo_documento").text();
			var de = $("#de").text();
			var parapersona = $("#parapersona").text();
			var para = $("#para").text();
			var degerencia = $("#degerencia").text();
			var asunto = $("#asunto").text();
			var fecha = $("#fecha").text();
			var saludo = $("#saludo").text();
			var contenido = $("#contenido").text();
			var tipodocumento = $("#tipodocumento option:selected").val();
			console.log(contenido)
			data = {codDocumento:codDocumento,de:de,parapersona:parapersona,para:para,
						degerencia:degerencia,asunto:asunto,fecha:fecha,saludo:saludo,contenido:contenido,tipodocumento:tipodocumento};
			console.log(data)
			
			$.ajax({
				data:data,
				url:"procesar_documento.php",
				type:"POST",
				dataType:"json",
				success:function(r){
					if (r==true) {
						location.reload(1);
					};
				}
			})
		})
		$("#tipodocumento").change(function(){
			var tipo = $("#tipodocumento option:selected").val();
			cantidadDelDocumentoActual = getNumeroSiguienteDocumento(tipo);
			cambiarCodigoEnDocumento();
		})

		dialog = $( "#form-referencia" ).dialog({
	      autoOpen: false,

	      title:"Referencia"
	    });

	    $( "#btn_guardar_formato" ).click(function() {
	      dialog.dialog( "open" );
	    });

	    $("#form-referencia").submit(function(r){
			r.preventDefault();
	    	if (confirm("Esta seguro de guardar el formato?")) {
	    		
				var de = $("#de").text();
				var parapersona = $("#parapersona").text();
				var para = $("#para").text();
				var degerencia = $("#degerencia").text();
				var asunto = $("#asunto").text();
				var fecha = $("#fecha").text();
				var saludo = $("#saludo").text();
				var contenido = $("#contenido").text();
				var tipodocumento = $("#tipodocumento option:selected").val();
				var referencia = $("#referencia").val();
				console.log(contenido)
				data = {referencia:referencia,de:de,parapersona:parapersona,para:para,
							degerencia:degerencia,asunto:asunto,fecha:fecha,saludo:saludo,contenido:contenido,tipodocumento:tipodocumento};
				console.log(data)
				
				$.ajax({
					data:data,
					url:"procesar_formato.php",
					type:"POST",
					dataType:"json",
					success:function(r){
						if (r==true) {
							location.reload(1);
						};
					}
				})
	    	};
		})
		/*functions*/
		function getNumeroSiguienteDocumento(tipoDocumento){
			for (var i = 0; i < cuentaPorTipoDocumento.length; i++) {
				if (cuentaPorTipoDocumento[i].tipodocumento == tipoDocumento) {
					return cuentaPorTipoDocumento[i].cuentatipodocumento;
				};
			};
		}
		function cambiarCodigoEnDocumento(){
			$("#numerodocumento").text(cantidadDelDocumentoActual);
		}
	})
</script>
<div id="div-form-referencia">
	<form action="" id="form-referencia" method="POST">
		<label for="name">Referencia</label><br>
		<input type="text" name="referencia" required id="referencia" value="" class=""><br>
		<hr>
		<!-- Allow form submission with keyboard without duplicating the dialog button -->
		<input type="submit" value="Agregar"><br>
	</form>
</div>

