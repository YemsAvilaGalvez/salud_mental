/********************************************************************
 		LISTAR ID05
 ********************************************************************/
var tbl_id05;
// Obtener la fecha actual
var fechaActual = new Date();
var dia = String(fechaActual.getDate()).padStart(2, "0");
var mes = String(fechaActual.getMonth() + 1).padStart(2, "0"); // Los meses van de 0 a 11
var anio = fechaActual.getFullYear();
var fechaFormateada = dia + "-" + mes + "-" + anio;
function Listar_Id05() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id05 = $("#tabla_id05").DataTable({
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
      url: "../controller/diagnostico/controlador_id05_listar.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title:
          fechaFormateada +
          "-REPORTE PORCENTAJE DE PERSONAS CON SINDROME PSICOTICO O TRASTORNO DEL ESPECTRO DE LA ESQUIZOFRENIA",
        exportOptions: {
          columns: [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
            20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
            37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66
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
      { data: null, defaultContent: "PORCENTAJE DE PERSONAS CON SINDROME PSICOTICO O TRASTORNO DEL ESPECTRO DE LA ESQUIZOFRENIA" },
      { data: "fecha_medica1" },
      { data: "fecha_medica2" },
      { data: "fecha_medica3" },
      { data: "fecha_medica4" },
      { data: "fecha_medica5" },
      { data: "fecha_medica6" },
      {
        data: "total_consulta_medicas",
      },
      { data: "fecha_eva1" },
      {
        data: "total_evaluacion_interdisciplinaria",
      },
      { data: "fecha_interind1" },
      { data: "fecha_interind2" },
      { data: "fecha_interind3" },
      { data: "fecha_interind4" },
      { data: "fecha_interind5" },
      { data: "fecha_interind6" },
      {
        data: "total_intervencion_individual",
      },
      { data: "fecha_familiar1" },
      { data: "fecha_familiar2" },
      { data: "fecha_familiar3" },
      {
        data: "total_intervencion_familiar",
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
      {
        data: "total_psicoterapia_individual",
      },
      { data: "fecha_psico1" },
      { data: "fecha_psico2" },
      { data: "fecha_psico3" },
      { data: "fecha_psico4" },
      {
        data: "total_psicoeducacion",
      },
      { data: "fecha_visita1" },
      { data: "fecha_visita2" },
      { data: "fecha_visita3" },
      {
        data: "total_visita_domiciliaria",
      },
      { data: "fecha_inter1" },
      { data: "fecha_inter2" },
      { data: "fecha_inter3" },
      {
        data: "total_intervencion_social",
      },
      { data: "fecha_integracion1" },
      { data: "fecha_integracion2" },
      { data: "fecha_integracion3" },
      { data: "fecha_integracion4" },
      { data: "fecha_integracion5" },
      { data: "fecha_integracion6" },
      { data: "fecha_integracion7" },
      { data: "fecha_integracion8" },
      { data: "fecha_integracion9" },
      { data: "fecha_integracion10" },
      {
        data: "total_integracion_socio_comunitaria",
      },
      { data: "total_actividades" },
      { data: "porcentaje_total",
        render: function (data, type, row) {
          return data + " %"; // Concatenar el texto ' %' al valor de porcentaje_total
        },
      },
      /*
               {
                 defaultContent:
                   "<center>" +
                   "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' aumentar text-success px-1' style='cursor:pointer;' title='Aumentar Stock'><i class= 'fa fa-plus'></i></span><span class=' codigoqr text-secondary px-1' style='cursor:pointer;' title='Generar codigo Qr'><i class= 'fa fa-qrcode'></i></span>&nbsp;<span class='foto text-info px-1' style='cursor:pointer;' title='Cambiar foto'><i class='fa fa-image'></i></span>" +
                   "</center>",
               },*/
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
  tbl_id05.on("draw.td", function () {
    var PageInfo = $("#tabla_id05").DataTable().page.info();
    tbl_id05
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}


