<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
              <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro">Nuevo</button>
            </div>
          </div>
        </div>
        <h2>Usuarios</h2>
        <div class="table-responsive view" id="show_data">
          <table class="table table-striped table-sm" id="list-usuarios">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div id="insert_data" class="view">
          <form action="#" id="form_data">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                  <label for="correo">Correo Electrónico</label>
                  <input type="email" id="correo" name="correo" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="tel" id="telefono" name="telefono" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" id="password" name="password" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-success" id="guardar_datos">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    function change_view(vista = 'show_data'){
      $("#main").find(".view").each(function(){
        // $(this).addClass("d-none");
        $(this).slideUp('fast');
        let id = $(this).attr("id");
        if(vista == id){
          $(this).slideDown(300);
          // $(this).removeClass("d-none");
        }
      });
    }
    function consultar(){
      let obj = {
        "accion" : "consultar_usuarios"
      };
      $.post("includes/_funciones.php", obj, function(respuesta){
        let template = ``;
        $.each(respuesta,function(i,e){
          template += `
          <tr>
          <td>${e.nombre_usr}</td>
          <td>${e.telefono_usr}</td>
          <td>
          <a href="#" data-id="${e.id_usr}">Editar</a>
          <a href="#" data-id="${e.id_usr}">Eliminar</a>
          </td>
          </tr>
          `;
        });
        $("#list-usuarios tbody").html(template);
      },"JSON");
    }
    $(document).ready(function(){
      consultar();
      change_view();
    });
    $("#nuevo_registro").click(function(){
      change_view('insert_data');
    });
    $("#guardar_datos").click(function(){
      let nombre= $("#inputNombre").val();
      let correo = $("#inputCorreo").val();
      let telefono = $("#inputTelefono").val()
      let password = $("#inputPassword").val()
      let obj ={
        "accion" : "insertar_usuarios",
        "nombre":nombre,
        "correo":correo,
        "telefono":telefono,
        "password":password
      }

      $("#form_data").find("input").each(function(){
        $(this).removeClass("has-error");
        if($(this).val() != ""){
          obj[$(this).prop("name")] =  $(this).val();
        }else{
          $(this).addClass("has-error").focus();
          return false;
        }
      });
      $.post("includes/_funciones.php", obj, function(){});
    });
    $("#main").find(".cancelar").click(function(){
      change_view();
      $("#form_data")[0].reset();
    });
  </script>
</body>
</html>