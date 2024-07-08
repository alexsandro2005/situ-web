<?php
$titlePage = "Listado de Areas";
require_once("../components/sidebar.php");
$getAreas = $connection->prepare("SELECT * FROM areas INNER JOIN estados ON areas.id_estado = estados.id_estado WHERE areas.id_estado = estados.id_estado");
$getAreas->execute();
$areas = $getAreas->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Configuracion enrutamiento / </span> Turnos
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">

                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-link-alt me-1"></i>
                            Connections</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-6 col-12 mb-md-0 mb-4">
                        <div class="card">
                            <h5 class="card-header">Connected Accounts</h5>
                            <div class="card-body">
                                <p>Display content from your connected accounts on your site</p>
                                <!-- Connections -->
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../assets/img/icons/brands/google.png" alt="google" class="me-3"
                                            height="30" />
                                    </div>
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Google</h6>
                                            <small class="text-muted">Calendar and contacts</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input float-end" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../assets/img/icons/brands/slack.png" alt="slack" class="me-3"
                                            height="30" />
                                    </div>
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Slack</h6>
                                            <small class="text-muted">Communication</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input float-end" type="checkbox" role="switch"
                                                    checked />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../assets/img/icons/brands/github.png" alt="github" class="me-3"
                                            height="30" />
                                    </div>
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Github</h6>
                                            <small class="text-muted">Manage your Git repositories</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input float-end" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../assets/img/icons/brands/mailchimp.png" alt="mailchimp" class="me-3"
                                            height="30" />
                                    </div>
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Mailchimp</h6>
                                            <small class="text-muted">Email marketing service</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input float-end" type="checkbox" role="switch"
                                                    checked />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="../assets/img/icons/brands/asana.png" alt="asana" class="me-3"
                                            height="30" />
                                    </div>
                                    <div class="flex-grow-1 row">
                                        <div class="col-9 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Asana</h6>
                                            <small class="text-muted">Communication</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input float-end" type="checkbox" role="switch"
                                                    checked />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Connections -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("../components/footer.php")
    ?>