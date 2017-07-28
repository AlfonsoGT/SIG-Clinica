function calcularEdad(){
	var fechaNac = document.getElementById('fechaNacimiento').value;
  var fechaIngresada = fechaNac.split("-");
	for (i in fechaIngresada){
		if (i==0){
			var anio=fechaIngresada[i];
		}
		if(i==1){
			var mes=fechaIngresada[i]-1;

		}
		if(i==2){
			var dia=fechaIngresada[i];
		}
	}
	var date=new Date();
	var hoyDia = date.getDate();
	var hoyMes = date.getMonth();
	var hoyAnio= date.getFullYear();

	var edad = hoyAnio - anio;
         if ( hoyMes < mes )
         {
             edad--;
         }
         if ((mes == hoyMes) && (hoyDia < dia))
         {
             edad--;
         }

				 if(edad>=18){
					 poner();

				 }
				 else{
					 quitar();

				 }


}

function poner() {
            $('#duiPaciente').prop("required", true);
						  $('#duiEncargado').removeAttr("required");
							  $('#nombreEncargado').removeAttr("required");
								$('#duiEncargado').val('');
								$('#nombreEncargado').val('');
								$('#duiEncargado').prop("readOnly", true);
								$('#nombreEncargado').prop("readOnly", true);

        }
        function quitar() {
					$('#duiPaciente').removeAttr("required");
					$('#duiPaciente').val('');
					$('#duiPaciente').prop("readOnly", true);
					$('#duiEncargado').prop("required", true);
					$('#nombreEncargado').prop("required", true);
  
        }
