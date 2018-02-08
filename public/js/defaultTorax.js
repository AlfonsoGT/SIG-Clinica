function defaultmsj(value){

var region=document.getElementById('regionAnatomica').value;
var tor="Torax";
var mensajeTorax="La silueta cardíaca es de tamaño y configuración normal. No se observan alteraciones en la arteria aorta, ni en las estructuras vasculares pulmonares. No se encontraron infiltrados ni consolidaciones pulmonares, tampoco lesión pleural alguna. Impresión: Rx de Tórax Normal";

if(region===tor){
  if(value===true)
{  console.log(true);
  document.getElementById('descripcion').value=mensajeTorax;

}else{
   console.log(false);
  document.getElementById('descripcion').value='';}

}else{
console.log("no es torax, no hay mensaje default");
}

}
