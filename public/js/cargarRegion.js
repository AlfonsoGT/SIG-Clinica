$(document).ready(function(){

$("#examen").on('change',onSelectTipos);

function onSelectTipos(){
    var idTipoExamen= $(this).val();
   //alert(idCita);
   //AJAX


   actual=window.location.host;

   $.get('http://'+actual+'/ClinicaRadiologiaDise-o/public/region/'+idTipoExamen+'',function(data){
    //console.log(data);

    $("#region").empty();
     $('#region option').remove();
    for( var i=0;i<data.length;++i)
    {
      $('#region').append('<option value="'+data[i].idRegionAnatomica+'">'+data[i].nombreRegionAnatomica+'</option>');
    }
   });
}



});
