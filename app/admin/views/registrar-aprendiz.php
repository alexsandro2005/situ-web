<?php
$titlePage = "Registro de Ficha";
require_once("../components/sidebar.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header justify-content-between align-items-center">
                        <h3 class="fw-bold py-2"><span class="text-muted fw-light">Funcionarios/</span>Registro de
                            Aprendiz
                        </h3>
                        <h6 class="mb-0">Ingresa por favor los siguientes datos.</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off"
                            name="formRegisterAprendiz">

                            <div class="mb-3">
                                <label class="form-label" for="documento">Numero de
                                    Documento</label>
                                <div class="input-group input-group-merge">
                                    <span id="documento-icon" class="input-group-text"><i
                                            class="fas fa-user"></i></span>
                                    <input type="text" autofocus class="form-control"
                                        onkeypress="return(multiplenumber(event));" minlength="10" maxlength="10"
                                        oninput="maxlengthNumber(this);" id="documento" name="documento"
                                        placeholder="Ingresa el numero de documento"
                                        aria-describedby="documento-icon" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nombres">Nombres</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombres_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" required minlength="2" maxlength="100" class="form-control"
                                        name="nombres" id="nombres" placeholder="Ingresa el nombre del funcionario" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="apellidos">Apellidos</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre_area-span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" required minlength="2" maxlength="100" class="form-control"
                                        name="apellidos" id="apellidos"
                                        placeholder="Ingresa los apellidos del funcionario" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Correo Electronico</label>
                                <div class="input-group input-group-merge">
                                    <span id="email_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="email" required minlength="2" maxlength="100" class="form-control"
                                        name="email" id="email" placeholder="Ingresar corrreo electronico" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="celular">Numero de Celular</label>
                                <div class="input-group input-group-merge">
                                    <span id="celular_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="number" required minlength="2" maxlength="10" class="form-control"
                                        name="celular" id="celular" placeholder="Ingresar corrreo electronico" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nombreCargo">Cargo del Funcionario</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre_area-span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" required minlength="2" maxlength="100" class="form-control"
                                        name="nombreCargo" id="nombreCargo"
                                        placeholder="Ingresa el cargo del funcionario" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="imagenFirma">Imagen de Firma</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre_area-span" class="input-group-text"><i
                                            class="fas fa-image"></i></span>
                                    <input type="file" required class="form-control" accept="image/*" name="imagenFirma"
                                        id="imagenFirma" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="estadoInicial" class="form-label">Estado
                                    Inicial</label>
                                <div class="input-group input-group-merge">
                                    <span id="estadoInicial-2" class="input-group-text"><i
                                            class="fas fa-user"></i></span>
                                    <select class="form-select" name="estadoInicial" required>
                                        <option value="">Seleccionar Estado...</option>
                                        <?php
                                        // CONSUMO DE DATOS DE LOS PROCESOS
                                        $listFichas = $connection->prepare("SELECT * FROM fichas");
                                        $listFichas->execute();
                                        $fichas = $listFichas->fetchAll(PDO::FETCH_ASSOC);
                                        // Verificar si no hay datos
                                        if (empty($fichas)) {
                                            echo "<option value=''>No hay datos...</option>";
                                        } else {
                                            // Iterar sobre las fichas
                                            foreach ($fichas as $ficha) {
                                                echo "<option value='{$ficha['codigoFicha']}'>{$ficha['codigoFicha']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="funcionarios.php" class="btn btn-danger">
                                    Cancelar
                                </a>
                                <input type="submit" class="btn btn-primary" value="Registrar"></input>
                                <input type="hidden" class="btn btn-info" value="formRegisterAprendiz"
                                    name="MM_formRegisterAprendiz"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("../components/footer.php")
    ?>