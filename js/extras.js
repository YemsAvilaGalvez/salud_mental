/********************************************************************
 		LISTAR ETNIA
 ********************************************************************/
var tbl_etnia;
function Listar_Etnia() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_etnia = $("#tabla_etnia").DataTable({
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
      url: "../controller/extras/controlador_listar_etnia.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title: "Reporte Etnia",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7],
        },
        text: '<i class="fa fa-file-excel"></i>',
        titleAttr: "Exportar a Excel",
      },
    ],
    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "Id_Etnia" },
      { data: "Descripcion_Etnia" },
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' eliminar text-danger px-1' style='cursor:pointer;' title='Eliminar datos'><i class='fa fa-trash'></i></span>" +
          "</center>",
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_etnia.on("draw.td", function () {
    var PageInfo = $("#tabla_etnia").DataTable().page.info();
    tbl_etnia
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/********************************************************************
 		LISTAR DOCUMENTO
 ********************************************************************/
var tbl_documento;
function Listar_Documento() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_documento = $("#tabla_documento").DataTable({
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
      url: "../controller/extras/controlador_listar_documento.php",
      type: "POST",
    },
    dom: "Blfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        title: "Reporte Documento",
        exportOptions: {
          columns: [0, 1, 2, 3],
        },
        text: '<i class="fa fa-file-excel"></i>',
        titleAttr: "Exportar a Excel",
      },
    ],
    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "Id_Tipo_Documento" },
      { data: "Abrev_Tipo_Doc" },
      { data: "Descripcion_Tipo_Documento" },
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' eliminar text-danger px-1' style='cursor:pointer;' title='Eliminar datos'><i class='fa fa-trash'></i></span>" +
          "</center>",
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_documento.on("draw.td", function () {
    var PageInfo = $("#tabla_documento").DataTable().page.info();
    tbl_documento
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/********************************************************************
 		LISTAR FINANCIADOR
 ********************************************************************/
var tbl_financiador;
function Listar_Financiador() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_financiador = $("#tabla_financiador").DataTable({
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
      url: "../controller/extras/controlador_listar_financiador.php",
      type: "POST",
    },
    dom: "Blfrtip",
    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "Id_Financiador" },
      { data: "Descripcion_Financiador" },
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' eliminar text-danger px-1' style='cursor:pointer;' title='Eliminar datos'><i class='fa fa-trash'></i></span>" +
          "</center>",
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_financiador.on("draw.td", function () {
    var PageInfo = $("#tabla_financiador").DataTable().page.info();
    tbl_financiador
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/********************************************************************
 		LISTAR CPMS
 ********************************************************************/
var tbl_cpms;
function Listar_Cpms() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_cpms = $("#tabla_cmps").DataTable({
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
      url: "../controller/extras/controlador_listar_cpms.php",
      type: "POST",
    },
    dom: "Blfrtip",
    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "Codigo_Item" },
      { data: "Descripcion_Item" },
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' eliminar text-danger px-1' style='cursor:pointer;' title='Eliminar datos'><i class='fa fa-trash'></i></span>" +
          "</center>",
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_cpms.on("draw.td", function () {
    var PageInfo = $("#tabla_cmps").DataTable().page.info();
    tbl_cpms
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
