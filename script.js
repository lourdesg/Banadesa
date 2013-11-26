// JavaScript Document

            $(document).ready(function(){
                fn_dar_eliminar();
				fn_cantidad();
                $("#frm_detalle").validate();
            });
			
			function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				$("#span_cantidad").html(cantidad);
			};
            
            function fn_agregar(){
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#num_paso").val() + "</td>";
                cadena = cadena + "<td>" + $("#nombre_paso").val() + "</td>";
                cadena = cadena + "<td>" + $("#descripcion_paso").val() + "</td>";
                cadena = cadena + "<td>" + $("#imagen").val() + "</td>";
                $("#grilla tbody").append(cadena);
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
                fn_dar_eliminar();
				fn_cantidad();
				
            };
    	
		
	$(document).ready(function(){
    $("#submit").click(function(){
        var formulario = $("#detalle").serializeArray();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "guardar_detalle.php",
            data: formulario,
        }).done(function(respuesta){
            $("#mensaje").html(respuesta.mensaje);
        });
    });
 
    function limpiarformulario(formulario){
 
    $(formulario).find('input').each(function() {
        switch(this.type) {
            case 'text':
                $(this).val('');
                break;
            }
        });
 
        $(formulario).find('select').each(function() {
            $("#"+this.id + " option[value=0]").attr("selected",true);
 
    });
    }
});
			
