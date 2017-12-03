$(document).ready(function(){
$("#tipoMaterial").on('change',onSelectTipos);

function onSelectTipos(){
    var idTipoMaterial= $(this).val();
   //alert(idTipoMaterial);
   //AJAX
   actual=window.location.host;
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
function validarFecha(){
  var fechaEntrada = document.getElementById('fecha').value;
  var f = new Date();
  var año= f.getFullYear() ;
  var mes = f.getMonth()+1;
  var dia = f.getDate();
  if(dia<10) dia = "0"+ dia;
  if(mes<10) mes="0"+mes;
  var ndia = f.getDate();
  var fecha = año+ "-" + mes + "-" + dia;
  if(fechaEntrada<fecha || fechaEntrada>fecha){
    //tpl = '<div class="alert alert-warning">'+fechaPago+'</div>';
    //$('#fechaPago').html(tpl);
    document.getElementById("fecha").value = "";
  }
}
function ponerFecha(){
    var tipoMaterial = document.getElementById('tipoMaterial').value;
   //alert(tipoMaterial);
    if(tipoMaterial == 1 || tipoMaterial == 2 || tipoMaterial== 3){
        var f = new Date();
        var año= f.getFullYear() ;
        var mes = f.getMonth()+1;
        var dia = f.getDate();
        if(dia<10) dia = "0"+ dia;
        if(mes<10) mes="0"+mes;

        var fecha2 = año+ "-" + mes + "-" + dia;


      //alert(fecha);

        document.getElementById("fecha").value = fecha2;
        //$('#fechaCita').prop("readOnly", true);
     }else{

        document.getElementById("fecha").value = "";
       // $('#fechaCita').prop("readOnly", false);

}
}
