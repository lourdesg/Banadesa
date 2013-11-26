$(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      $("#busqueda").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#busqueda").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#busqueda").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobar.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});

