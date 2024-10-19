/********************************************************************
 		LISTAR PACIENTES CON METODO NORMAL
 ********************************************************************/

var tbl_personal;
function Listar_Personal() {
  //enviarlo al scrip en MANTENIMIENTO CLIENTE
  tbl_personal = $("#tabla_personal").DataTable({
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
      url: "../controller/personal/controlador_listar.php",
      type: "POST",
    },

    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "abreviatura_doc" },
      { data: "numdoc_mpr" },
      { data: "nombre_personal" },
      { data: "fnacimiento_mpr" },
      { data: "descripcion_condicion" },
      { data: "descripcion_profesion" },
      { data: "descripcion_colegiatura" },
      { data: "numcolegiatura_mpr" },
      { data: "nombre_est" },
      { data: "falta_mpr" },
      { data: "fbaja_mpr" },
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
  tbl_personal.on("draw.td", function () {
    var PageInfo = $("#tabla_personal").DataTable().page.info();
    tbl_personal
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
