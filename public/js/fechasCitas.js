
function ponerFecha(){
    var tipoExamen = document.getElementById('tipoExamen').value;
   // alert(tipoExamen);
    if(tipoExamen == 1 || tipoExamen == 2){   
        var f = new Date();
        var año= f.getFullYear() ;
        var mes = f.getMonth()+1; 
        var dia = f.getDate(); 
        if(dia<10) dia = "0"+ dia;
        if(mes<10) mes="0"+mes;
        var fecha = año+ "-" + mes + "-" + dia;
      //alert(fecha);
        document.getElementById("fechaCita").value = fecha;
        //$('#fechaCita').prop("readOnly", true);
     }else{
        document.getElementById("fechaCita").value = "";
       // $('#fechaCita').prop("readOnly", false);
        
}
}
function validarFecha(){
  var fechaCita = document.getElementById('fechaCita').value;
  var f = new Date();
  var año= f.getFullYear() ;
  var mes = f.getMonth()+1; 
  var dia = f.getDate(); 
  if(dia<10) dia = "0"+ dia;
  if(mes<10) mes="0"+mes;
  var ndia = f.getDate();
  var fecha = año+ "-" + mes + "-" + dia;
  if(fechaCita<fecha){
    //tpl = '<div class="alert alert-warning">'+fechaPago+'</div>';
    //$('#fechaPago').html(tpl);
    document.getElementById("fechaCita").value = "";
  }
}