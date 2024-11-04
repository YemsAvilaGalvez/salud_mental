/********************************************************************
 		LISTAR DOCUMENTO CON METODO NORMAL
 ********************************************************************/

var tbl_documento;
function Listar_Documento() {
  //enviarlo al scrip en MANTENIMIENTO CLIENTE
  tbl_documento = $("#tabla_documento").DataTable({
    responsive: true,
    ordering: true,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    buttons: ["csv", "excel", "pdf"],
    pageLength: 10,
    dom: "Blfrtip",
    destroy: true,
    async: false,
    processing: true,

    ajax: {
      url: "../controller/documento/controlador_listar.php",
      type: "POST",
    },

    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "abreviatura_doc" },
      { data: "descripcion_doc" },
      /*
                        {
                          defaultContent:
                            "<center>" +
                            "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class='fa fa-edit'></i></span>" +
                            "</center>",
                        },*/
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_documento.on("draw.td", function () {
    var PageInfo = $("#tabla_documento").DataTable().page.info();
    tbl_documento
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/********************************************************************
 		   ABRIR MODAL REGISTRAR  PRODUCTO
 ********************************************************************/
function AbrirModalRegistrarDocumento() {
  //se jala en el boton nuevo
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_registrar_documento").modal({ backdrop: "static", keyboard: false });
  $("#modal_registrar_documento").modal("show"); //abrimos el modal
  //LimpiarModalProducto();//limpiar texbox cada que demos en nuevo
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
}
