/********************************************************************
        INICIAR SESION
 ********************************************************************/
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
      if (data[0][4] == "INACTIVO") {
        //solo envia un campo posicion 0
        return Swal.fire(
          "Mensaje de Error",
          "Usuario " + usu + " se ecuentra desactivado",
          "error"
        );
      }

      $.ajax({
        url: "controller/usuario/crear_sesion.php",
        type: "POST",
        data: {
          idusuario: data[0][0], //data contiene el array de todos los datps de la bd
          usuario: data[0][1],
          rol: data[0][3],
          rolnombre: data[0][5],
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
 	 LISTAR USUARIO CON SERVERSIDE (MUCHOS DATOS) SE USA ESTE 
 ********************************************************************/
var tbl_usuario;
function Listar_usuario_serverside() {
  tbl_usuario = $("#tabla_usuario").DataTable({
    responsive: true,
    pageLength: 10,
    destroy: true,
    bProcessing: true,
    bDeferRender: true,
    bServerSide: true,
    sAjaxSource: "../controller/usuario/serverside/serversideUsuario.php",
    columns: [
      //todos los datos de la vista
      { defaultContent: "" },
      { data: 1 }, //nombre
      { data: 5 }, //rol
      {
        data: 4, //estado
        render: function (data, type, row) {
          if (data === "ACTIVO") {
            return (
              "<center>" +
              '<span class="badge badge-success">ACTIVO</span>' +
              "</center>"
            );
          } else {
            return (
              "<center>" +
              '<span class="badge badge-danger">INACTIVO</span>' +
              "</center>"
            );
          }
        },
      },
      {
        data: 4, //accion para activar y desactivar los botones
        render: function (data, type, row) {
          if (data === "ACTIVO") {
            return (
              "<center>" +
              "<span class=' editar text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'><i class='fa fa-edit'></i></span>&nbsp;<span class='text-secundary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Activar' disabled ><i class='fa fa-check-circle'></i></span>&nbsp;<span class=' desactivar text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Desactivar'><i class='fa fa-trash'></i></span>&nbsp;<span class=' clave text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Cambiar Clave'><i class='fa fa-key'></i></span>" +
              "</center>"
            );
          } else {
            return (
              "<center>" +
              "<span class=' editar text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'><i class='fa fa-edit'></i></span>&nbsp;<span class='activar text-success px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Activar'><i class='fa fa-check-circle'></i></span>&nbsp;<span class='text-secundary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Desactivar' disabled><i class='fa fa-trash'></i></span>&nbsp;<span class='text-secundary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Cambiar Clave'><i class='fa fa-key'></i></span>" +
              "</center>"
            );
          }
        },
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
  document.getElementById("text_idusuario_editar").value = data[0]; //posisicion de la vista en el serviside
  document.getElementById("text_usuario_editar").value = data[1];
  $("#select_rol_editar").select2().val(data[3]).trigger("change.select2");
});

/**********************************************************************
 								  ACTIVAR USUARIO
 ***********************************************************************/
$("#tabla_usuario").on("click", ".activar", function () {
  //campo activar tiene que ir en el boton
  var data = tbl_usuario.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data(); //para celular y usas el responsive datatable
  }
  Swal.fire({
    title: "Desea activar el usuario?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      Modificar_Estado(data[0], "ACTIVO"); //data 0 (id)
    }
  });
});

/**********************************************************************
                                     DESACTIVAR USUARIO
***********************************************************************/
$("#tabla_usuario").on("click", ".desactivar", function () {
  //campo activar tiene que ir en el boton
  var data = tbl_usuario.row($(this).parents("tr")).data(); //tamaño de escritorio
  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data(); //para celular y usas el responsive datatable
  }
  Swal.fire({
    title: "Desea Desactivar el usuario?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      Modificar_Estado(data[0], "INACTIVO"); //data 0 (id)
    }
  });
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
  LimpiarModalUsuario();
  //mandamos parametros a los texbox
  document.getElementById("idusuario_clave").value = data[0];
  document.getElementById("lbl_usuario_clave").innerHTML = data[1]; //enviamos el nombre del usu al modal
  //console.log(data[0]);//capturaar ruta
});

/**********************************************************************
 						 ABRIR MODAL REGISTRAR USUARIO
 ***********************************************************************/
function AbrirModalRegistroUsuario() {
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_registro_usuario").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_usuario").modal("show"); //abrimos el modal
  LimpiarModalUsuario(); //limpiar texbox cada que demos en nuevo
  $(".form-control").removeClass("is-invalid").removeClass("is-valid"); //remover las clases
}

/**********************************************************************
 						  CARGAR TODOS LOS ROLES EN COMBO
 ***********************************************************************/
function cargar_SelectRol() {
  $.ajax({
    url: "../controller/usuario/controlador_select_rol.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA
    let llenardata = "<option value=''>Seleccione</option>";
    if (data.length > 0) {
      for (let i = 0; i < data.length; i++) {
        llenardata +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }
      document.getElementById("select_rol").innerHTML = llenardata;
      document.getElementById("select_rol_editar").innerHTML = llenardata;
    } else {
      llenardata += "<option value=''>No se encontraron datos</option>";
      document.getElementById("select_rol").innerHTML = llenardata;
      document.getElementById("select_rol_editar").innerHTML = llenardata;
    }
  });
}

/**********************************************************************
 								  REGISTRAR USUARIO
 ***********************************************************************/
function RegistrarUsuario() {
  let usuario = document.getElementById("text_usuario").value;
  let clave = document.getElementById("text_clave").value;
  let rol = document.getElementById("select_rol").value;

  if (usuario.length == 0 || clave.length == 0) {
    ValidarCampos("text_usuario", "text_clave");
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }
  if (rol.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Selecciones un rol para el usuario",
      "warning"
    );
  }

  let formData = new FormData();
  formData.append("u", usuario);
  formData.append("c", clave);
  formData.append("r", rol);
  $.ajax({
    url: "../controller/usuario/controlador_registrar_usuario.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        //IF SOLO PARA REGISTRAR
        //Registrar_Permisos(parseInt(resp));
        if (resp == 1) {
          ValidarCampos("text_usuario", "text_clave", "select_rol");
          LimpiarModalUsuario();
          Swal.fire(
            "Mensaje de Confirmacion",
            "Usuario registrado",
            "success"
          ).then((value) => {
            $("#modal_registro_usuario").modal("hide"); //ocultamos modal despues de registrar
            tbl_usuario.ajax.reload(); //recargar dataTable
          });
        } else {
          Swal.fire(
            "Mensaje de Advertencia",
            "El usuario ya se encuentra registrado",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de Error",
          "No se puede registrar el usuario",
          "error"
        );
      }
    },
  });
}

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
  let rol = document.getElementById("select_rol_editar").value;
  if (usuario.length == 0) {
    //validar que no esten vacios
    ValidarCampos("text_usuario_editar", "select_rol_editar");
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario.php",
    type: "POST",
    data: {
      id: id, //le enviamos los campos al controlador
      usuario: usuario,
      rol: rol,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de Confirmacion",
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
 						  MODIFICAR EL ESTADO DEL USUARIO
 ***********************************************************************/
function Modificar_Estado(id, estado) {
  $.ajax({
    url: "../controller/usuario/controlador_estado_usuario.php",
    type: "POST",
    data: {
      id: id, //le enviamos los campos al controlador
      estado: estado,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de Confirmacion",
        "Estado Actualizado",
        "success"
      ).then((value) => {
        tbl_usuario.ajax.reload(); //recargar dataTable
      });
    } else {
      Swal.fire("Mensaje de Error", "No se puede cambiar el estado", "error");
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
