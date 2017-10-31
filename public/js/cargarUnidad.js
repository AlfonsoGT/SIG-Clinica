$(document).ready(function(){ 
$("#tipoMaterial").on('change',onSelectTipos);
   
function onSelectTipos(){
    var idTipoMaterial= $(this).val();
   //alert(idTipoMaterial);
   //AJAX
   $.get('/unidades/'+idTipoMaterial+'',function(data){
    //console.log(data);
    
    $("#tipoUnidad").empty();
     $('#tipoUnidad option').remove();
    for( var i=0;i<data.length;++i)
    {
      $('#tipoUnidad').append('<option value="'+data[i].idTipoUnidad+'">'+data[i].nombreTipoUnidad+'</option>');
    }
   });
}
  
});