<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('/assets/img/favicon.png')}}">
  <title>
    Home
  </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('/assets/css/soft-ui-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style>
    #addTopicButton {
      background-color: rgba(255, 255, 255, 0.8);
      /* Fondo semitransparente */
      color: #000;
      /* Texto negro */
      border-radius: 50px;
      /* Bordes redondeados */
      transition: all 0.3s ease;
      /* Suavizar hover */
    }

    #addTopicButton:hover {
      background-color: rgba(255, 255, 255, 1);
      /* Fondo sólido al pasar el mouse */
      transform: scale(1.05);
      /* Efecto de zoom */
    }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="{{asset('/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Riondave</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <l class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/home">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6"
                          d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                        </path>
                        <path class="color-background"
                          d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Proyectos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="/users">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6"
                          d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                        </path>
                        <path class="color-background"
                          d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="profile">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6"
                          d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                        </path>
                        <path class="color-background"
                          d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                        </path>
                        <path class="color-background"
                          d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li>
          <div class="sidenav-footer mx-3 ">
            <a class="btn btn-primary mt-3 w-100" target="_blank" href="https://www.instagram.com/ivanrios_ss/">Cambiate
              a Diamante</a>
          </div>
        </li>
        </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Proyectos</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Minutas</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Nombre de la minuta</li>
          </ol>
        </nav>
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <!-- Formulario para el cierre de sesión -->
            <form id="logoutForm" action="/logout" method="POST">
              @csrf <!-- Token de seguridad para la solicitud POST -->
              <button type="submit" class="nav-link text-body font-weight-bold px-0"
                style="background: none; border: none; padding: 0;">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Cerrar sesión</span>
              </button>
            </form>
          </li>
        </ul>


        <!-- Incluir el script de cierre de sesión -->
        <script src="{{ asset('assets/js/logout.js') }}"></script>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="col-lg-12 col-md-12 col-sm- col-12 mb-4">
        <div class="card h-100 cursor-pointer">
          <span class="mask bg-primary opacity-10 border-radius-lg"></span>
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-8 text-start">
                <h5 class="text-white font-weight-bolder mb-0 mt-3">
                  Nombre de la minuta
                </h5>
                <span class="text-white text-sm">Nombre del proyecto</span>
              </div>
              <div class="col-4">
                <div class="dropstart text-end mb-6">
                  <a href="javascript:;" class="cursor-pointer" id="dropdownUsers2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-ellipsis-h text-white"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers2">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
                <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">Fecha de creacion</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- formulario -->








      <form action="/minutas_id">
        <!-- fecha -->
        <div class="mb-3">
          <label for="fecha" class="form-label">Fecha</label>
          <input type="date" class="form-control" id="fecha" required>
        </div>
        <!-- Hora -->
        <div class="mb-3">
          <label for="hora" class="form-label">Hora</label>
          <input type="time" class="form-control" id="hora" required>
        </div>
        <!-- Lugar -->
        <div class="mb-3">
          <label for="lugar" class="form-label">Lugar</label>
          <input type="text" class="form-control" id="lugar" placeholder="Ingresa el lugar" required>
        </div>

        <div class="mb-3">
          <label for="asistencia" class="form-label">Asistencia</label>
          <select class="form-select" id="asistencia" required>
            <option value="" disabled selected>Elige una opción</option>
            <option value="activo">Usuario 1</option>
            <option value="Inactivo">Usuario n</option>
          </select>
        </div>

        <div class="d-flex">
          <button id="addTopicButton" name="tema" class="btn btn-outline-light btn-lg border-0 px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> Agregar otra asistencia
          </button>
        </div>

        <div class="mb-3">
          <label for="ausencia" class="form-label">Ausencia</label>
          <select class="form-select" id="ausencia" required>
            <option value="" disabled selected>Elige una opción</option>
            <option value="activo">Usuario 1</option>
            <option value="Inactivo">Usuario n</option>
          </select>
        </div>

        <div class="d-flex">
          <button id="addTopicButton" name="tema" class="btn btn-outline-light btn-lg border-0 px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> Agregar otra ausencia
          </button>
        </div>

        <!-- tema -->
        <div class="mb-3"> <!-- Para el front este se debe de repetir n veces -->
          <label for="decisiones" class="form-label">Tema numero n</label>
          <input type="text" class="form-control mb-3" id="decisiones" placeholder="Decision n"
            required><!-- Para el front este se debe de repetir n veces igual -->
          <button id="addTopicButton" name="tema" class="btn btn-outline-light btn-lg border-0 px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> Decision
          </button>
          <input type="text" class="form-control mb-3" id="accion" placeholder="Elemento de accion n"
            required><!-- Para el front este se debe de repetir n veces igual -->
          <button id="addTopicButton" name="tema" class="btn btn-outline-light btn-lg border-0 px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> accion
          </button>
          <div class="d-flex">
            <button id="addTopicButton" name="tema" class="btn btn-outline-light btn-lg border-0 px-4 shadow-sm">
              <i class="bi bi-plus-circle"></i> Agregar Tema
            </button>
          </div>

        </div>

        <!-- Submit Button -->
        <div class="collapse navbar-collapse d-flex" id="navigation">
          <div class="ms-auto d-flex align-items-center">
            <li class="nav-item d-flex align-items-center">
              <button class="btn btn-round btn-lg mb-0 btn-outline-dark me-2" target="_blank"
                href="https://create.microsoft.com/es-es/templates/acta">Descargar</button>
            </li>
            <ul class="navbar-nav d-lg-block d-none">
              <li class="nav-item">
                <button type="submit" class="btn btn-lg btn-round mb-0 me-1 bg-gradient-dark">Guardar</button>
              </li>
            </ul>
          </div>
        </div>
      </form>

      <!-- Final del formulario -->

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                derechos reservados <i class="fa fa-heart"></i>para
                <a href="https://www.instagram.com/ivanrios_ss/" class="font-weight-bold" target="_blank">Riondave</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.instagram.com/ivanrios_ss/" class="nav-link text-muted"
                    target="_blank">Compañia</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.instagram.com/ivanrios_ss/" class="nav-link text-muted" target="_blank">Sobre
                    nosotros</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.instagram.com/ivanrios_ss/" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.instagram.com/ivanrios_ss/" class="nav-link pe-0 text-muted"
                    target="_blank">Licencia</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>