$(document).ready(function(){ 
  
$('#examen').on('change',onSelectExamen);
function onSelectExamen(){
  var idTipoExamen = $(this).val();
 // alert(idTipoExamen);
  
  $.get('/consulta/'+idTipoExamen+'',function(data){
    var d = '<thead>'+'<tr>'+
        '<th class="text-center">Tipo de Examen</th>'+
        '<th class="text-center">Hora de Cita</th>'+
        '<th class="text-center">Fecha de Cita</th>'+
        '</tr>'+'</thead>'+ '<tbody>';
     $("#tabla").empty();
    for( var i=0;i<data.length;++i)
    {
      d += '<tr>'+'<td class="text-center">'+data[i].nombreTipoExamen+'</td>'+
        '<td class="text-center">'+data[i].horaCita+'</td>'+
        '<td class="text-center">'+data[i].fechaCita+'</td>'+'</tr>'
    }
    d += '</tbody>';
    $('#tabla').append(d);

  });
}
$('#examen').on('change',onSelectExamenCitas);
function onSelectExamenCitas(){
  var idTipoExamen = $(this).val();
 // alert(idTipoExamen);
  
  $.get('/consulta/'+idTipoExamen+'',function(data){
     $("#tipos").empty();
     $('#tipos option').remove();
    for( var i=0;i<data.length;++i)
    {
       $('#tipos').append('<option value="'+data[i].idCita+'">'+data[i].nombreTipoExamen+'-----'+data[i].fechaCita+
        '</option>');
    }

  });
}


$("#examen").on('change',onSelectTipos);
   
function onSelectTipos(){
    var idTipoExamen= $(this).val();
   //alert(idCita);
   //AJAX
   $.get('/region/'+idTipoExamen+'',function(data){
    //console.log(data);
    var html_select = '<option value="">Seleccione una Region Anatomica</option>';
    $("#region").empty();
     $('#region option').remove();
    for( var i=0;i<data.length;++i)
    {
      $('#region').append('<option value="'+data[i].idRegionAnatomica+'">'+data[i].nombreRegionAnatomica+'</option>');
    }
   });
}


  
});
