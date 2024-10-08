<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?php echo $titlePage ?> </title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../libraries/datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="../../libraries/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    <script src="../../js/sweetalert.js"></script>
    <script src="../../assets/css/sweetalert.css"></script>
</head>

<body>
    <?php
    // iniciamos sesion para obtener los datos del usuario autenticado
    session_start();
    // validamos que el usuario este autenticado
    require_once("../../validation/sessionValidation.php");
    // creamos la conexion a la base de datos
    require_once("../../../database/connection.php");
    $db = new Database();
    $connection = $db->conectar();
    // envolvemos nuestra aplicacion el horario de colombia
    date_default_timezone_set('America/Bogota');
    // importacion de funciones
    require_once("../../functions/functions.php");
    require_once("../auto/automations.php");
    // importacion de controladores
    require_once("../controllers/index.php");
    $documento = $_SESSION['documento'];
    $documentoUserSession = $connection->prepare("SELECT * FROM usuarios WHERE documento = '$documento'");
    $documentoUserSession->execute();
    $documentoSession = $documentoUserSession->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location:../../");
        exit();
    }

    ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.php" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path
                                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                        id="path-1"></path>
                                    <path
                                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                        id="path-3"></path>
                                    <path
                                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                        id="path-4"></path>
                                    <path
                                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                        id="path-5"></path>
                                </defs>
                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                <g id="Path-3" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                </g>
                                                <g id="Path-4" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                </g>
                                            </g>
                                            <g id="Triangle"
                                                transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">SITU</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Menu Inicial</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Gestion</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Areas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="areas.php" class="menu-link">
                                    <div data-i18n="Error">Listado de Areas</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Unidades</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="unidades.php" class="menu-link">
                                    <div data-i18n="Error">Listado de Unidades</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-unidad.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Unidad</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Empresas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="empresas.php" class="menu-link">
                                    <div data-i18n="Error">Listado de Empresas</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Programas F.</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="programas.php" class="menu-link">
                                    <div data-i18n="Error">Listado de Programas</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Fichas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="fichas.php" class="menu-link">
                                    <div data-i18n="Error">Listado Fichas Etapa Lectiva</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="fichas-se.php" class="menu-link">
                                    <div data-i18n="Error">Fichas en Sena Empresa</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="fichas-productiva.php" class="menu-link">
                                    <div data-i18n="Error">Listado Fichas Etapa Productiva</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="fichas-bloqueadas.php" class="menu-link">
                                    <div data-i18n="Error">Listado Fichas Bloqueadas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="fichas-historico.php" class="menu-link">
                                    <div data-i18n="Error">Listado Historico de Fichas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-ficha.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Ficha</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="estado-fichas.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Enlistar a Sena Empresa</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Aprendices</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="aprendices-lectiva.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Aprendices E. Lectiva</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="aprendices-se.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Aprendices Sena Empresa</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="aprendices-productiva.php" class="menu-link">
                                    <div data-i18n="Error">Lista Aprendices Etapa Productiva</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="aprendices-bloqueados.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Aprendices Bloqueados</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="aprendices-historico.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Aprendices Historico</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-aprendiz.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Aprendiz</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Funcionarios</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="funcionarios.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Funcionarios</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-funcionario.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Funcionario</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cargos.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Lista de Cargos</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Memorandos</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="funcionarios.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Memorandos</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-ficha.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Memorando</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="motivos.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Motivos</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-motivo.php" class="menu-link">
                                    <div data-i18n="Error">Registrar Motivo</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Turnos Rutinarios</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="funcionarios.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Turnos R.</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-turno.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Turno R.</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="config.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Configuracion de Turnos</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="config-turnos.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Agregar configuracion</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Turnos Especiales</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="funcionarios.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Turnos E.</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="registrar-ficha.php" class="menu-link">
                                    <div data-i18n="Under Maintenance">Registrar Turno E.</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Formatos de Excel</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="formatos.php" class="menu-link">
                                    <div data-i18n="Error">Lista Formatos de Excel</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Estados</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="estados.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Estados</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Departamentos</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="departamentos.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Departamentos</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-star"></i>
                            <div data-i18n="Misc">Ciudades</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="ciudades.php" class="menu-link">
                                    <div data-i18n="Error">Lista de Ciudades</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Otros</span>
                    </li>
                    <li class="menu-item">
                        <a href="#" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div data-i18n="Documentation">Sugerencias</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="perfil.php" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Documentation">Mis Datos</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="index.php?logout" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off"></i>
                            <div data-i18n="Documentation">Cerrar Sesion</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block"><?php echo $_SESSION['names'] ?></span>
                                                    <small class="text-muted"><?php echo $_SESSION['rol'] ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="perfil.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Mi Perfil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btn btn-outline-danger" href="index.php?logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Cerrar Sesion</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->