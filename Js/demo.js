$(document).ready(function(){

	$("#txtPalabra").focus();

	$("#btnEnviar").click(function (){
	   var datos = $("#formPalabra").serialize();//Serializamos los datos a enviar
	   $.ajax({
		   type: "POST", //Establecemos como se van a enviar los datos puede POST o GET
		   url: "insertar.php", //SCRIPT que procesara los datos, establecer ruta relativa o absoluta
		   data: datos, //Variable que transferira los datos
		   contentType: "application/x-www-form-urlencoded", //Tipo de contenido que se enviara
		   beforeSend: function() {//Función que se ejecuta antes de enviar los datos
			  $("#status").html("Procesando...."); //Mostrar mensaje que se esta procesando el script
		   },
		   dataType: "html",
		   success: function(datos){ //Funcion que retorna los datos procesados del script PHP
			  if(datos == 1){ //Dato que proviene del script php
				 $("#status").html("Refresque pantalla para verla la palabra en la nube de etiquetas!"); //Mensaje de Satisfacción
			  }else if(datos == 0){ //Dato que proviene del script php
				 $("#status").html("Por favor ingrese datos"); //Mensaje de error
			  }
		   }
	   });
	});
});	