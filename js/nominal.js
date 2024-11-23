/**********************************************************************
 						 ABRIR MODAL REGISTRAR NOMINAL
 ***********************************************************************/
function AbrirModalRegistroNominal() {
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_registro_nominal").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_nominal").modal("show"); //abrimos el modal
  LimpiarModalUsuario(); //limpiar texbox cada que demos en nuevo
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
}
