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
 		   ABRIR MODAL REGISTRAR  DOCUMENTO
 ********************************************************************/
function AbrirModalRegistroDocumento() {
  //se jala en el boton nuevo
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_registro_documento").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_documento").modal("show"); //abrimos el modal
  //LimpiarModalProducto();//limpiar texbox cada que demos en nuevo
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
}

/**********************************************************************
 		  ABRIR MODAL EDITAR Y TRAER DATOS A LOS CAMPOS
 ***********************************************************************/
$("#tabla_documento").on("click", ".editar", function () {
  //class EDITAR tiene que ir en el boton
  var data = tbl_documento.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_documento.row(this).child.isShown()) {
    var data = tbl_documento.row(this).data(); //para celular y usas el responsive datatable
  }

  $("#modal_editar_documento").modal({ backdrop: "static", keyboard: false });
  $("#modal_editar_documento").modal("show"); //abrimos el modal
  //mandamos parametros a los texbox

  document.getElementById("text_iddocumento").value = data.id_doc; //id del procedure
  document.getElementById("text_idDocumento_editar").value =
    data.Id_Tipo_Documento; //enviamos el nombre del usu al modal
  document.getElementById("text_abreviatura_editar").value =
    data.Abrev_Tipo_Doc;
  document.getElementById("text_descripcion_editar").value =
    data.Descripcion_Tipo_Documento;
});

/**********************************************************************
 				MENSAJE ELIMINAR DOCUMENTO
 ***********************************************************************/
$("#tabla_documento").on("click", ".eliminar", function () {
  //campo activar tiene que ir en el boton
  var data = tbl_documento.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_documento.row(this).child.isShown()) {
    var data = tbl_documento.row(this).data(); //para celular y usas el responsive datatable
  }
  Swal.fire({
    title: "Desea Eliminar la Documento?",
    text: "Se borrara el registro de la base de datos",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      Eliminar_Documento(data.Id_Tipo_Documento); //campo id de la marca luego llamamos al metodo
    }
  });
});

/********************************************************************
 		    METODO   ELIMINAR LA DOCUMENTO
 ********************************************************************/
function Eliminar_Documento(id) {
  $.ajax({
    url: "../controller/extras/controlador_documento_eliminar.php",
    type: "POST",
    data: {
      id: id //le enviamos los campos al controlador
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire("Mensaje de Confirmacion", "Documento Eliminada", "success").then(
        (value) => {
          tbl_documento.ajax.reload(); //recargar dataTable
          //TraerNotificaciones();
        }
      );
    } else {
      Swal.fire("Mensaje de Error", "No se puede eliminar el Documento", "error");
    }
  });
}

/********************************************************************
 					  REGISTRAR DOCUMENTO
 ********************************************************************/
function RegistrarDocumento() {
  let id = document.getElementById("text_idDocumento").value;
  let abreviatura = document.getElementById("text_abreviatura").value;
  let descripcion = document.getElementById("text_descripcion").value;

  if (abreviatura.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Ingrese la Abreviatura",
      "warning"
    );
  }

  if (id.length == 0 || descripcion.length == 0) {
    ValidarCamposDocumento("text_idDocumento", "text_descripcion");
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  let formData = new FormData();

  formData.append("id", id);
  formData.append("abreviatura", abreviatura);
  formData.append("descripcion", descripcion);

  $.ajax({
    url: "../controller/extras/controlador_documento_registar.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      console.log(resp);
      if (resp > 0) {
        //IF SOLO PARA REGISTRAR
        if (resp == 1) {
          LimpiarModalDocumento();
          Swal.fire(
            "Mensaje de Confirmacion",
            "Documento Registrado",
            "success"
          ).then((value) => {
            $("#modal_registro_documento").modal("hide"); //cerramos el modal
            LimpiarModalDocumento();
            tbl_documento.ajax.reload(); //recargar dataTable
            //TraerNotificaciones();
          });
        } else {
          Swal.fire(
            "Mensaje de Advertencia",
            "El Documento ya se encuentra registrado",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de Error",
          "No se puede registrar el Documento",
          "error"
        );
      }
    },
  });
  return false;
}

/********************************************************************
 					  VALIDAR CAMPOS PRODUCTO
 ********************************************************************/
function ValidarCamposProducto(id, descripcion) {
  Boolean(document.getElementById(id).value.length > 0)
    ? $("#" + id)
        .removeClass("is-invalid")
        .addClass("is-valid")
    : $("#" + id)
        .removeClass("is-valid")
        .addClass("is-invalid");
  Boolean(document.getElementById(descripcion).value.length > 0)
    ? $("#" + descripcion)
        .removeClass("is-invalid")
        .addClass("is-valid")
    : $("#" + descripcion)
        .removeClass("is-valid")
        .addClass("is-invalid");
}

/********************************************************************
 					  LIMPIAR TEXBOX DOCUMENTO
 ********************************************************************/
function LimpiarModalDocumento() {
  document.getElementById("text_idDocumento").value = "";
  document.getElementById("text_abreviatura").value = "";
  document.getElementById("text_descripcion").value = "";
}

/********************************************************************
 					 MODIFICAR PRODUCTO
 ********************************************************************/
function ModificarDocumento() {
  //enviamos los datos del ajax al controlador y al onclick del boton editar
  let id = document.getElementById("text_iddocumento").value;
  let idDocumento = document.getElementById("text_idDocumento_editar").value;
  let abreviatura = document.getElementById("text_abreviatura_editar").value;
  let descripcion = document.getElementById("text_descripcion_editar").value;

  if (
    idDocumento.length == 0 ||
    abreviatura.length == 0 ||
    descripcion.length == 0
  ) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/extras/controlador_modificar_documento.php",
    type: "POST",
    data: {
      id: id, //le enviamos los campos al controlador
      idDocumento: idDocumento, //le enviamos los campos al controlador
      abreviatura: abreviatura,
      descripcion: descripcion,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Documento Actualizado",
          "success"
        ).then((value) => {
          $("#modal_editar_documento").modal("hide"); //abrimos el modal
          tbl_documento.ajax.reload(); //recargar dataTable
          //TraerNotificaciones();
        });
      } else {
        Swal.fire(
          "Mensaje de Advertencia",
          "El Documento ya se encuentra registrado",
          "warning"
        );
      }
    } else {
      Swal.fire(
        "Mensaje de Error",
        "No se puede registrar el Documento",
        "error"
      );
    }
  });
}
