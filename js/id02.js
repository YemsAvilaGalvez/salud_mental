/********************************************************************
 		LISTAR ID01
 ********************************************************************/
var tabla_id02;
// Obtener la fecha actual
var fechaActual = new Date();
var dia = String(fechaActual.getDate()).padStart(2, "0");
var mes = String(fechaActual.getMonth() + 1).padStart(2, "0"); // Los meses van de 0 a 11
var anio = fechaActual.getFullYear();
var fechaFormateada = dia + "-" + mes + "-" + anio;
function Listar_Id02() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tabla_id02 = $("#tabla_id02").DataTable({
    responsive: true,
    ordering: true,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/diagnostico/controlador_id02_listar.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title:
          fechaFormateada +
          "-REPORTE TRATAMIENTO ESPECIALIZADO DE PERSONAS AFECTADAS POR VIOLENCIA SEXUAL DE 18 AÑOS A MAS",
        exportOptions: {
          columns: [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
            20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
            37, 38, 39, 40, 41, 42, 43, 44
          ],
        },
        text: '<i class="fa fa-file-excel"></i>',
        titleAttr: "Exportar a Excel",
      },
    ],
    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "Descripcion_Red" },
      { data: "Descripcion_MicroRed" },
      { data: "Nombre_Establecimiento" },
      { data: "Nombre_Paciente" },
      { data: "Numero_Documento" },
      { data: "Codigo_Unico" },
      { data: "Anio" },
      { data: "Mes" },
      { data: null, defaultContent: "TRATAMIENTO ESPECIALIZADO DE PERSONAS AFECTADAS POR VIOLENCIA SEXUAL DE 18 AÑOS A MAS" },
      { data: "fecha_medica1" },
      { data: "fecha_medica2" },
      { data: "fecha_medica3" },
      {
        data: "total_consulta_medicas",
      },
      { data: "fecha_psico1" },
      { data: "fecha_psico2" },
      { data: "fecha_psico3" },
      {
        data: "total_psicoeducacion",
      },
      { data: "fecha_psicoind1" },
      { data: "fecha_psicoind2" },
      { data: "fecha_psicoind3" },
      { data: "fecha_psicoind4" },
      { data: "fecha_psicoind5" },
      { data: "fecha_psicoind6" },
      { data: "fecha_psicoind7" },
      { data: "fecha_psicoind8" },
      { data: "fecha_psicoind9" },
      { data: "fecha_psicoind10" },
      { data: "fecha_psicoind11" },
      { data: "fecha_psicoind12" },
      {
        data: "total_psicoterapia_individual",
      },
      { data: "fecha_familiar1" },
      { data: "fecha_familiar2" },
      { data: "fecha_familiar3" },
      { data: "fecha_familiar4" },
      {
        data: "total_intervencion_familiar",
      },
      { data: "fecha_visita1" },
      { data: "fecha_visita2" },
      {
        data: "total_visita_domiciliaria",
      },
      { data: "fecha_movi1" },
      { data: "fecha_movi2" },
      { data: "fecha_movi3" },
      {
        data: "total_sesiones_movilizacion",
      },
      { data: "total_actividades" },
      {
        data: "porcentaje_total",
        render: function (data, type, row) {
          return data + " %"; // Concatenar el texto ' %' al valor de porcentaje_total
        },
      },
    ],
    rowCallback: function (row, data) {
      // Convertir el valor de "Cumplimiento" a número y evaluar
      let porcentaje_total = parseFloat(data.porcentaje_total.replace("%", ""));
      if (porcentaje_total < 60) {
        $(row).addClass("highlight-red"); // Añadir clase a la fila
      } else if (porcentaje_total < 99) {
        $(row).addClass("highlight-yellow"); // Resaltar en amarillo
      }
    },
    language: idioma_espanol,
    select: true,
  });
  tabla_id02.on("draw.td", function () {
    var PageInfo = $("#tabla_id02").DataTable().page.info();
    tabla_id02
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
