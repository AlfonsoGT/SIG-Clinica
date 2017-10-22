
function ponerFecha(){
    var tipoExamen = document.getElementById('examen').value;
   // alert(tipoExamen);
    if(tipoExamen == 1 || tipoExamen == 2){   
        var f = new Date();
        var año= f.getFullYear() ;
        var mes = f.getMonth()+1; 
        var dia = f.getDate(); 
        if(dia<10) dia = "0"+ dia;
        if(mes<10) mes="0"+mes;
        var fecha = año+ "-" + mes + "-" + dia;
        var hora = new Date();
        var hora1 = f.getHours();
        var minutos = f.getMinutes();

        if (minutos<=9)
        minutos="0"+minutos;
       
        var horaAsignada = hora1 + ":"+ minutos;
      //alert(fecha);
        document.getElementById("fechaCita").value = fecha;
        document.getElementById("horaCita").value = horaAsignada;
        //$('#fechaCita').prop("readOnly", true);
     }else{
        document.getElementById("fechaCita").value = "";
        document.getElementById("horaCita").value = "";
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