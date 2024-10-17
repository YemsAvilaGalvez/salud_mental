function Inciar_Sesion() {
  recuerdame();
  let usu = document.getElementById("text_usuario").value;
  let pass = document.getElementById("text_clave").value;
  if (usu.length == 0 || pass.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Ingrese los Campos en blanco",
      "warning"
    );
  }
  //llamamos al controlador
  $.ajax({
    url: "controller/usuario/iniciar_sesion.php",
    type: "POST",
    data: {
      u: usu,
      p: pass,
    },
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      $.ajax({
        url: "controller/usuario/crear_sesion.php",
        type: "POST",
        data: {
          idusuario: data[0][0], //data contiene el array de todos los datps de la bd
          usuario: data[0][1],
        },
      }).done(function (r) {
        let timerInterval;
        Swal.fire({
          title: "Bienvenido al Sistema",
          html: "Cargando <b></b> .",
          timer: 10,
          heightAuto: false,
          timerProgressBar: true,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft();
            }, 150);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            location.reload();
          }
        });
      });

      //Swal.fire('Mensaje de Confirmacion','Logueo exitoso','success');
    } else {
      Swal.fire("Mensaje de Error", "Usuario o Clave incorrecto", "error");
    }
  });
}

/********************************************************************
        RECORDAR USUARIO AL INICIAR SESION
********************************************************************/
function recuerdame() {
  if (rmcheck.checked && usuarioinput.value !== "" && passinput.value !== "") {
    localStorage.usuario = usuarioinput.value;
    localStorage.pass = passinput.value;
    localStorage.checkbox = rmcheck.value;
  } else {
    localStorage.usuario = "";
    localStorage.pass = "";
    localStorage.checkbox = "";
  }
}

/********************************************************************
 		   LISTAR USUARIO CON METODO NORMAL
 ********************************************************************/

var tbl_usuario;
function Listar_Usuario() {
  //enviarlo al scrip en MANTENIMIENTO CLIENTE
  tbl_usuario = $("#tabla_usuario").DataTable({
    responsive: true,
    ordering: true,
    bLengthChange: false,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    buttons: [""],
    pageLength: 10,
    dom: "Blfrtip",
    destroy: true,
    async: false,
    processing: true,

    ajax: {
      url: "../controller/usuario/controlador_listar.php",
      type: "POST",
    },

    columns: [
      //todos los datos del procedimiento almacenado
      { defaultContent: "" }, //cintador
      { data: "nombre_usu" },
      {
        defaultContent:
          "<center>" +
          "<span class=' editar text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'><i class='fa fa-edit'></i></span>&nbsp;<span class=' clave text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Cambiar Clave'><i class='fa fa-key'></i></span>" +
          "</center>",
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  //contador en cada tabla
  tbl_usuario.on("draw.td", function () {
    var PageInfo = $("#tabla_usuario").DataTable().page.info();
    tbl_usuario
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

/**********************************************************************
 		  ABRIR MODAL EDITAR Y TRAER DATOS A LOS CAMPOS
 ***********************************************************************/
$("#tabla_usuario").on("click", ".editar", function () {
  var data = tbl_usuario.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data(); //para celular y usas el responsive datatable
  }
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
  $("#modal_editar_usuario").modal({ backdrop: "static", keyboard: false });
  $("#modal_editar_usuario").modal("show"); //abrimos el modal

  //jalamos los datos al presionar editar
  document.getElementById("text_idusuario_editar").value = data.id_usuario; //posisicion de la vista en el serviside
  document.getElementById("text_usuario_editar").value = data.nombre_usu;
});

/**********************************************************************
 								  CAMBIAR CLAVE DE USUARIO
 ***********************************************************************/
$("#tabla_usuario").on("click", ".clave", function () {
  //class foto tiene que ir en el boton
  var data = tbl_usuario.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data(); //para celular y usas el responsive datatable
  }
  $("#modal_editar_clave").modal({ backdrop: "static", keyboard: false });
  $("#modal_editar_clave").modal("show"); //abrimos el modal

  //mandamos parametros a los texbox
  document.getElementById("idusuario_clave").value = data.id_usuario;
  document.getElementById("lbl_usuario_clave").innerHTML = data.nombre_usu; //enviamos el nombre del usu al modal
  //console.log(data[0]);//capturaar ruta
});

/**********************************************************************
 						  VALIDAR CAMPOS DE LOS TEXBOX
 ***********************************************************************/
function ValidarCampos(usuario, clave) {
  Boolean(document.getElementById(usuario).value.length > 0)
    ? $("#" + usuario)
        .removeClass("is-invalid")
        .addClass("is-valid")
    : $("#" + usuario)
        .removeClass("is-valid")
        .addClass("is-invalid");
  if (clave != "") {
    Boolean(document.getElementById(clave).value.length > 0)
      ? $("#" + clave)
          .removeClass("is-invalid")
          .addClass("is-valid")
      : $("#" + clave)
          .removeClass("is-valid")
          .addClass("is-invalid");
  }
}

/**********************************************************************
 								  LIMPIAR CAMPOS DE TEXBOX
 ***********************************************************************/
function LimpiarModalUsuario() {
  document.getElementById("text_usuario").value = "";
  document.getElementById("text_clave").value = "";
}

/**********************************************************************
 								  MODIFICAR USUARIO
 ***********************************************************************/
function ModificarUsuario() {
  //enviamos los datos del ajax al controlador y al onclick del boton editar
  let id = document.getElementById("text_idusuario_editar").value;
  let usuario = document.getElementById("text_usuario_editar").value;
  if (usuario.length == 0) {
    //validar que no esten vacios
    ValidarCampos("text_usuario_editar");
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/usuario/controlador_editar.php",
    type: "POST",
    data: {
      id: id, //le enviamos los campos al controlador
      usuario: usuario,
    },
  }).done(function (resp) {
    if (resp > 0) {
      //ValidarCampos("text_usuario_editar","","select_rol_editar");
      Swal.fire(
        "Mensaje de Confirmación",
        "Usuario actualizado",
        "success"
      ).then((value) => {
        $("#modal_editar_usuario").modal("hide"); //ocultamos modal despues de registrar
        tbl_usuario.ajax.reload(); //recargar dataTable
      });
    } else {
      Swal.fire(
        "Mensaje de Error",
        "No se puede modificar el usuario",
        "error"
      );
    }
  });
}

/**********************************************************************
 						  MODIFICAR CLAVE DEL USUARIO
 ***********************************************************************/
function ModificarClaveUsuario() {
  //validar que no esten vacios
  let id = document.getElementById("idusuario_clave").value;
  let clavenueva = document.getElementById("text_clave_editar").value;
  let claverepeti = document.getElementById("text_clave_repetir").value;
  if (id.length == 0 || clavenueva.length == 0 || claverepeti.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }
  //validar que sean iguales
  if (clavenueva != claverepeti) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Las claves ingresadas no coninciden",
      "warning"
    );
  }
  $.ajax({
    url: "../controller/usuario/controlador_modificar_clave.php",
    type: "POST",
    data: {
      id: id, //le enviamos los campos al controlador
      clavenueva: clavenueva,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire("Mensaje de Confirmacion", "Clave Actualizada", "success").then(
        (value) => {
          document.getElementById("text_clave_editar").value = "";
          document.getElementById("text_clave_repetir").value = "";
          $("#modal_editar_clave").modal("hide"); //ocultamos modal
          tbl_usuario.ajax.reload(); //recargar dataTable
        }
      );
    } else {
      Swal.fire("Mensaje de Error", "No se puede cambiar la clave", "error");
    }
  });
}
