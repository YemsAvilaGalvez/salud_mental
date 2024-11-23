/********************************************************************
 		LISTAR PRODUCTO CON METODO NORMAL
 ********************************************************************/
var tbl_etnia;
function Listar_Etnia() {
  //enviarlo al scrip en MANTENIMIENTO ROL
  tbl_etnia = $("#tabla_etnia").DataTable({
    responsive: true,
    ordering: false,
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
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' aumentar text-success px-1' style='cursor:pointer;' title='Aumentar Stock'><i class= 'fa fa-plus'></i></span><span class=' codigoqr text-secondary px-1' style='cursor:pointer;' title='Generar codigo Qr'><i class= 'fa fa-qrcode'></i></span>&nbsp;<span class='foto text-info px-1' style='cursor:pointer;' title='Cambiar foto'><i class='fa fa-image'></i></span>" +
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
