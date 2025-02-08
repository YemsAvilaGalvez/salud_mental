/********************************************************************
 		LISTAR ID05
 ********************************************************************/
var tbl_id07;
// Obtener la fecha actual
var fechaActual = new Date();
var dia = String(fechaActual.getDate()).padStart(2, "0");
var mes = String(fechaActual.getMonth() + 1).padStart(2, "0"); // Los meses van de 0 a 11
var anio = fechaActual.getFullYear();
var fechaFormateada = dia + "-" + mes + "-" + anio;
function Listar_Id07() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id07 = $("#tabla_id07").DataTable({
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
      url: "../controller/diagnostico/controlador_id07_listar.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title:
          fechaFormateada +
          "-PORCENTAJE DE PERSONAS CON TRASTORNOS DE ANSIEDAD",
        exportOptions: {
          columns: [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
            20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
            37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55
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
      { data: null, defaultContent: "PORCENTAJE DE PERSONAS CON TRASTORNOS DE ANSIEDAD" },
      { data: "fecha_medica1" },
      { data: "fecha_medica2" },
      { data: "fecha_medica3" },
      { data: "fecha_medica4" },
      { data: "total_consulta_medicas" },
      { data: "fecha_eva1" },
      { data: "total_evaluacion_interdisciplinaria" },
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
      { data: "total_psicoterapia_individual" },
      { data: "fecha_grupo1" },
      { data: "fecha_grupo2" },
      { data: "fecha_grupo3" },
      { data: "fecha_grupo4" },
      { data: "fecha_grupo5" },
      { data: "fecha_grupo6" },
      { data: "fecha_grupo7" },
      { data: "fecha_grupo8" },
      { data: "fecha_grupo9" },
      { data: "fecha_grupo10" },
      { data: "total_grupo_ayuda_mutua" },
      { data: "fecha_fisica1" },
      { data: "fecha_fisica2" },
      { data: "fecha_fisica3" },
      { data: "fecha_fisica4" },
      { data: "fecha_fisica5" },
      { data: "fecha_fisica6" },
      { data: "fecha_fisica7" },
      { data: "fecha_fisica8" },
      { data: "fecha_fisica9" },
      { data: "fecha_fisica10" },
      { data: "fecha_fisica11" },
      { data: "fecha_fisica12" },
      { data: "total_talleres_activacion_fisica" },
      { data: "total_actividades" },
      { data: "porcentaje_total",
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
  tbl_id07.on("draw.td", function () {
    var PageInfo = $("#tabla_id07").DataTable().page.info();
    tbl_id07
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
