/********************************************************************
 		LISTAR ID01
 ********************************************************************/
var tabla_id02;
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
      { data: "Mes_Actual_Paciente" },
      {
        data: "Consulta_Medica",
      },
      {
        data: "Psicoeducacion",
      },
      {
        data: "Psicoterapia_Individual",
      },
      {
        data: "Intervencion_Familiar",
      },
      {
        data: "Visita_Domiciliaria",
      },
      {
        data: "Movilizacion_Social",
      },
      { data: "Total_Actividades" },
      { data: "Cumplimiento" },
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
      let cumplimiento = parseFloat(data.Cumplimiento.replace("%", ""));
      if (cumplimiento < 60) {
        $(row).addClass("highlight-red"); // Añadir clase a la fila
      } else if (cumplimiento < 99) {
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

/********************************************************************
 		LISTAR ID01
 ********************************************************************/
var tabla_id02_r;
function Listar_Id02_R() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tabla_id02_r = $("#tabla_id02_r").DataTable({
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
      url: "../controller/diagnostico/controlador_id02R_listar.php",
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
      { data: "Mes_Actual_Paciente" },
      {
        data: "Consulta_Medica",
      },
      {
        data: "Psicoeducacion",
      },
      {
        data: "Psicoterapia_Individual",
      },
      {
        data: "Intervencion_Familiar",
      },
      {
        data: "Visita_Domiciliaria",
      },
      {
        data: "Movilizacion_Social",
      },
      { data: "Total_Actividades" },
      { data: "Cumplimiento" },
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
      let cumplimiento = parseFloat(data.Cumplimiento.replace("%", ""));
      if (cumplimiento < 60) {
        $(row).addClass("highlight-red"); // Añadir clase a la fila
      } else if (cumplimiento < 99) {
        $(row).addClass("highlight-yellow"); // Resaltar en amarillo
      }
    },
    language: idioma_espanol,
    select: true,
  });
  tabla_id02_r.on("draw.td", function () {
    var PageInfo = $("#tabla_id02_r").DataTable().page.info();
    tabla_id02_r
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
