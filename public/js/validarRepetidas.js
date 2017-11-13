function validarRepetidas(){


  var repetidas = document.getElementById('cantidadRepetidas').value;

  if(repetidas==0){
    $('#motivorepeticion').removeAttr("required");
    $('#movitorepeticion').prop("disabled", true);
    document.getElementById("motivorepeticion").value ="";

  }else{
    $('#movitorepeticion').prop("required", true);

  }


}
