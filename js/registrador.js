/********************************************************************
 		LISTAR PACIENTES CON METODO NORMAL
 ********************************************************************/

var tbl_registrador;
function Listar_Registrador() {
  //enviarlo al scrip en MANTENIMIENTO CLIENTE
  tbl_registrador = $("#tabla_registrador").DataTable({
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
      url: "../controller/registrador/controlador_listar.php",
      type: "POST",
    },

    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "abreviatura_doc" },
      { data: "numdoc_mr" },
      { data: "nombre_registrador" },
      { data: "fnacimiento_mr" },
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
  tbl_registrador.on("draw.td", function () {
    var PageInfo = $("#tabla_registrador").DataTable().page.info();
    tbl_registrador
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
