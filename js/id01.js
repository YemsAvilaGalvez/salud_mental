/********************************************************************
 		LISTAR ID01
 ********************************************************************/
var tbl_id01;
function Listar_Id01() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id01 = $("#tabla_id01").DataTable({
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
      url: "../controller/diagnostico/controlador_id01_listar.php",
      type: "POST",
    },
    /*
             dom: "Blfrtip",
             buttons: [
               {
                 extend: "excelHtml5",
                 title: "Reporte Consolidado",
                 exportOptions: {
                   columns: [0, 1, 2, 3, 4, 5, 6, 7],
                 },
                 text: '<i class="fa fa-file-excel"></i>',
                 titleAttr: "Exportar a Excel",
               },
             ],*/
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
      {
        data: "total_consulta_medicas",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye' onclick='AbrirModalConsultaMedica()'></i></span>"
          );
        },
      },
      {
        data: "total_evaluacion_interdisciplinaria",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_psicoeducacion",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_intervencion_individual",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_psicoterapia_individual",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_intervencion_familiar",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_visita_domiciliaria",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      {
        data: "total_sesiones_movilizacion",
        render: function (data, type, row) {
          return (
            data +
            " <span class='ver text-primary px-1' style='cursor:pointer;' title='Ver datos'><i class= 'fa fa-eye'></i></span>"
          );
        },
      },
      { data: "total_actividades" },
      { data: "porcentaje_total" },

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
  tbl_id01.on("draw.td", function () {
    var PageInfo = $("#tabla_id01").DataTable().page.info();
    tbl_id01
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/********************************************************************
  ABRIR MODAL CONSULTA MEDICAS
  ********************************************************************/
function AbrirModalConsultaMedica() {
  //se jala en el boton nuevo
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_consulta_medica").modal({ backdrop: "static", keyboard: false });
  $("#modal_consulta_medica").modal("show"); //abrimos el modal
  //LimpiarModalProducto();//limpiar texbox cada que demos en nuevo
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
}


/********************************************************************
 		LISTAR ID01
 ********************************************************************/
var tbl_consulta_medica;
function Listar_Consulta_Medica() {
  var idPaciente = obtenerDniPaciente();
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id01 = $("#tabla_consulta_medica").DataTable({
    responsive: true,
    ordering: true,
    bLengthChange: true,
    searching: { regex: false },
    pageLength: 3,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/diagnostico/controlador_id01_listar.php",
      type: "POST",
      data: {
        idPaciente: idPaciente, // Parámetro para filtrar por ID de persona
      },
    },
    columns: [
      { data: "fecha_medica1" },
      { data: "fecha_medica2" },
      { data: "fecha_medica3" },
    ],
    language: idioma_espanol,
    select: true,
  });
  /*
  tbl_id01.on("draw.td", function () {
    var PageInfo = $("#tabla_id01").DataTable().page.info();
    tbl_id01
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });*/
}
