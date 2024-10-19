/********************************************************************
 		LISTAR PACIENTES CON METODO NORMAL
 ********************************************************************/

var tbl_paciente;
function Listar_Paciente() {
  //enviarlo al scrip en MANTENIMIENTO CLIENTE
  tbl_paciente = $("#tabla_paciente").DataTable({
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
      url: "../controller/paciente/controlador_listar.php",
      type: "POST",
    },

    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "abreviatura_doc" },
      { data: "numdoc_mp" },
      { data: "nombre_paciente" },
      { data: "fnacimiento" },
      { data: "genero_mp" },
      { data: "descripcion_etnia" },
      { data: "ubignacimiento_mp" },
      { data: "ubigreniec_mp" },
      { data: "domicilioreniec_mp" },
      { data: "ubigdeclarado_mp" },
      { data: "domiciliodeclarado_mp" },
      { data: "referdomicilio_mp" },
      { data: "codigo_pais" },
      { data: "nombre_est" },
      { data: "falta_mp" },
      { data: "fmodificacion_mp" },
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
  tbl_paciente.on("draw.td", function () {
    var PageInfo = $("#tabla_paciente").DataTable().page.info();
    tbl_paciente
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
