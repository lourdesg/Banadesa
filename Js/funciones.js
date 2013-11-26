/*
    Document   : javascript
    Created on : 01-oct-2012, 17:55:36
    Author     : israel parra
    Description:
        Purpose of the javascript follows.
*/
//FUNCION DE AUTOCOMPLETAR
            $(document).ready(function(){
                $("#autocompletar").keyup(function()
                {
                    $("#sugerencia").show();
                    var buscar;
                    buscar = $("#autocompletar").val();
 
                    if (buscar.length > 0)
                    {
                        $.ajax(
                        {
                            type: "POST",
                            url: "http://localhost/autocompletar/autocompletar.php",
                            data: "buscar=" + buscar,
                            success: function(message)
                            {
                                $("#sugerencia").empty();
                                if (message.length > 0)
                                {
                                    message = message;
                                    $("#sugerencia").append(message);
                                }
                            }
                        });
                    }
                    else
                    {
                        // Si la sugerencia está vacía
                        $("#sugerencia").empty();
                    }
                });
            });
//FIN DE LA FUNCIÓN AUTOCOMPLETAR
//FUNCION CON LA QUE AL PULSAR EL ENLACE
//NOS LO PONGA EN EL CAMPO DE TEXTO CON ID AUTOCOMPLETAR
            function selectItem(idContenido,value)
            {
                // Cuando pulsamos sobre el desplegable, colocamos el valor en el cuadro de texto
                document.getElementById("autocompletar").value=value;
            }

