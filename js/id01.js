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
      { data: "Mes_Actual_Paciente" },
      {
        data: "Consulta_Medica",
      },
      {
        data: "Evaluacion_Integral",
      },
      {
        data: "Psicoeducacion",
      },
      {
        data: "Intervencion_Individual",
      },
      {
        data: "Psicoterapia_Individual",
      },
      { data: "Intervencion_Familiar" },
      { data: "Visita_Domiciliaria" },
      { data: "Movilizacion_Social" },
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
      }/********************************************************************
 		LISTAR CONSOLIDADO
 ********************************************************************/
var tbl_consolidado;
function Listar_Consolidado() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_consolidado = $("#tabla_consolidado").DataTable({
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
      url: "../controller/consolidado/controlador_consolidado_listar.php",
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
      { data: "Id_Cita" },
      { data: "Fecha_Atencion" },
      { data: "Lote" },
      { data: "Num_Pag" },
      { data: "Num_Reg" },
      { data: "Id_Ups" },
      { data: "Descripcion_Ups" },
      { data: "Descripcion_Sector" },
      { data: "Descripcion_Disa" },
      { data: "Descripcion_Red" },
      { data: "Descripcion_MicroRed" },
      { data: "Codigo_Unico" },
      { data: "Nombre_Establecimiento" },
      { data: "Abrev_Tipo_Doc_Paciente" },
      { data: "Numero_Documento_Paciente" },
      { data: "apellido_paciente" },
      { data: "Nombres_Paciente" },
      { data: "Fecha_Nacimiento_Paciente" },
      { data: "Genero" },
      { data: "Id_Etnia" },
      { data: "Descripcion_Etnia" },
      { data: "Historia_Clinica" },
      { data: "Ficha_Familiar" },
      { data: "Id_Financiador" },
      { data: "Descripcion_Financiador" },
      { data: "Descripcion_Pais" },
      { data: "Abrev_Tipo_Doc_Personal" },
      { data: "Numero_Documento_Personal" },
      { data: "apellido_personal" },
      { data: "Nombres_Personal" },
      { data: "Fecha_Nacimiento_Personal" },
      { data: "Id_Condicion" },
      { data: "Descripcion_Condicion" },
      { data: "Id_Profesion" },
      { data: "Descripcion_Profesion" },
      { data: "Id_Colegio" },
      { data: "Descripcion_Colegio" },
      { data: "Numero_Colegiatura" },
      { data: "Abrev_Tipo_Doc_Registrador" },
      { data: "Numero_Documento_Registrador" },
      { data: "apellido_registrador" },
      { data: "Nombres_Registrador" },
      { data: "Fecha_Nacimiento_Registrador" },
      { data: "Id_Condicion_Establecimiento" },
      { data: "Id_Condicion_Servicio" },
      { data: "Edad_Reg" },
      { data: "Tipo_Edad" },
      { data: "fecha_actual_paciente" },
      { data: "Id_Turno" },
      { data: "Codigo_Item" },
      { data: "Descripcion_Item" },
      { data: "Tipo_Diagnostico" },
      { data: "Valor_Lab" },
      { data: "Id_Correlativo" },
      { data: "Peso" },
      { data: "Talla" },
      { data: "Hemoglobina" },
      { data: "Perimetro_Abdominal" },
      { data: "Perimetro_Cefalico" },
      { data: "Descripcion_Otra_Condicion" },
      { data: "Fecha_Ultima_Regla" },
      { data: "Fecha_Solicitud_Hb" },
      { data: "Fecha_Resultado_Hb" },
      { data: "Fecha_Registro" },
      { data: "Fecha_Modificacion" },
      /*
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' aumentar text-success px-1' style='cursor:pointer;' title='Aumentar Stock'><i class= 'fa fa-plus'></i></span><span class=' codigoqr text-secondary px-1' style='cursor:pointer;' title='Generar codigo Qr'><i class= 'fa fa-qrcode'></i></span>&nbsp;<span class='foto text-info px-1' style='cursor:pointer;' title='Cambiar foto'><i class='fa fa-image'></i></span>" +
          "</center>",
      },*/
    ],
    language: idioma_espanol,
    select: true,
  });
  tbl_consolidado.on("draw.td", function () {
    var PageInfo = $("#tabla_consolidado").DataTable().page.info();
    tbl_consolidado
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
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
 		LISTAR ID01
 ********************************************************************/
var tbl_id01_r;
function Listar_Id01_R() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_id01_r = $("#tabla_id01_r").DataTable({
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
      url: "../controller/diagnostico/controlador_id01R_listar.php",
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
        data: "Evaluacion_Integral",
      },
      {
        data: "Psicoeducacion",
      },
      {
        data: "Intervencion_Individual",
      },
      {
        data: "Psicoterapia_Individual",
      },
      { data: "Intervencion_Familiar" },
      { data: "Visita_Domiciliaria" },
      { data: "Movilizacion_Social" },
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
  tbl_id01_r.on("draw.td", function () {
    var PageInfo = $("#tabla_id01_r").DataTable().page.info();
    tbl_id01_r
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
