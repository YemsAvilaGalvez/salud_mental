/********************************************************************
 		LISTAR ID05
 ********************************************************************/
var tbl_id10;
// Obtener la fecha actual
var fechaActual = new Date();
var dia = String(fechaActual.getDate()).padStart(2, "0");
var mes = String(fechaActual.getMonth() + 1).padStart(2, "0"); // Los meses van de 0 a 11
var anio = fechaActual.getFullYear();
var fechaFormateada = dia + "-" + mes + "-" + anio;
function Listar_Id10() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id10 = $("#tabla_id10").DataTable({
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
      url: "../controller/diagnostico/controlador_id10_listar.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title:
          fechaFormateada +
          "-INTERVENCIONES BREVES MOTIVACIONALES PARA PERSONAS CON CONSUMO PERJUDICIAL DE ALCOHOL Y TABACO",
        exportOptions: {
          columns: [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19
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
      { data: "fecha_eva1" },
      { data: "total_evaluacion_interdisciplinaria" },
      { data: "fecha_conseje1" },
      { data: "total_consjeria" },
      { data: "fecha_interind1" },
      { data: "fecha_interind2" },
      { data: "fecha_interind3" },
      { data: "fecha_interind4" },
      { data: "total_intervencion_individual" },
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
  tbl_id10.on("draw.td", function () {
    var PageInfo = $("#tabla_id10").DataTable().page.info();
    tbl_id10
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
