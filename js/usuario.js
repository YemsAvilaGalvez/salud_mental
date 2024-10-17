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
          "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class='fa fa-edit'></i></span>" +
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
