<?php
$titlePage = "Editar Aprendiz";
require_once("../components/sidebar.php");
if (isNotEmpty([$_GET['id_aprendiz-edit'], $_GET['ruta']])) {
    $id_aprendiz = $_GET['id_aprendiz-edit'];
    $ruta = $_GET['ruta'];
    $getFindByIdAprendiz = $connection->prepare("SELECT 
        usuarios.nombres,
        usuarios.documento,
        usuarios.apellidos,
        usuarios.foto_data,
        usuarios.celular,
        usuarios.sexo,
        usuarios.email,
        usuarios.fecha_registro,
        usuarios.fecha_nacimiento,
        usuarios.tipo_convivencia,
        usuarios.patrocinio,
        usuarios.empresa_patrocinadora,
        usuarios.id_ficha,
        usuarios.id_estado,
        usuarios.id_estado_se,
        empresas.nombre_empresa,
        tipo_usuario.tipo_usuario,
        estado_usuario.estado AS estado_aprendiz,
        estado_se.estado AS nombre_estado_se
    FROM usuarios
    LEFT JOIN fichas ON usuarios.id_ficha = fichas.codigoFicha 
    LEFT JOIN empresas ON usuarios.empresa_patrocinadora = empresas.id_empresa
    LEFT JOIN tipo_usuario ON usuarios.id_tipo_usuario = tipo_usuario.id
    LEFT JOIN estados AS estado_usuario ON usuarios.id_estado = estado_usuario.id_estado
    LEFT JOIN estados AS estado_se ON usuarios.id_estado_se = estado_se.id_estado
    WHERE usuarios.documento = :documento");
    $getFindByIdAprendiz->bindParam(":documento", $id_aprendiz);
    $getFindByIdAprendiz->execute();
    $aprendizFindById = $getFindByIdAprendiz->fetch(PDO::FETCH_ASSOC);
    if ($aprendizFindById) {
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
                                <h3 class="fw-bold py-2"><span class="text-muted fw-light">Aprendices/</span>Editar datos de
                                    <?php echo $aprendizFindById['nombres'] ?> - <?php echo $aprendizFindById['apellidos'] ?>
                                </h3>
                                <h6 class="mb-0">Ingresa por favor los siguientes datos.</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off" name="formUpdateAprendiz">
                                    <div class="row">
                                        <input type="hidden" name="ruta" value="<?php echo $ruta ?>">
                                        <!-- numero de documento -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="documento">Numero de Documento</label>
                                            <div class="input-group input-group-merge">
                                                <span id="documento-icon" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control" onkeypress="return(multiplenumber(event));" value="<?php echo $aprendizFindById['documento'] ?>" readonly minlength="10" maxlength="10" oninput="maxlengthNumber(this);" id="documento" name="documento" placeholder="Ingresar numero de documento" aria-describedby="documento-icon" />
                                            </div>
                                        </div>
                                        <!-- nombres -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="nombres">Nombres</label>
                                            <div class="input-group input-group-merge">
                                                <span id="nombres_span" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" required minlength="2" value="<?php echo $aprendizFindById['nombres'] ?>" autofocus maxlength="100" class="form-control" name="nombres" id="nombres" placeholder="Ingresar nombres completos" />
                                            </div>
                                        </div>
                                        <!-- apellidos -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="apellidos">Apellidos</label>
                                            <div class="input-group input-group-merge">
                                                <span id="nombre_area-span" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" required minlength="2" value="<?php echo $aprendizFindById['apellidos'] ?>" maxlength="100" class="form-control" name="apellidos" id="apellidos" placeholder="Ingresar apellidos completos" />
                                            </div>
                                        </div>
                                        <!-- correo electronico -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="email">Correo Electronico</label>
                                            <div class="input-group input-group-merge">
                                                <span id="email_span" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="email" required minlength="2" value="<?php echo $aprendizFindById['email'] ?>" maxlength="100" class="form-control" name="email" id="email" placeholder="Ingresar corrreo electronico" />
                                            </div>
                                        </div>
                                        <!-- numero de celular -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="celular">Numero de Celular</label>
                                            <div class="input-group input-group-merge">
                                                <span id="celular_span" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" required onkeypress="return(multiplenumber(event));" minlength="10" maxlength="10" value="<?php echo $aprendizFindById['celular'] ?>" class="form-control" name="celular" id="celular" placeholder="Ingresar numero de celular" />
                                            </div>
                                        </div>
                                        <!-- fecha de nacimiento -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                                            <div class="input-group input-group-merge">
                                                <span id="fecha_nacimiento_span" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="date" readonly value="<?php echo $aprendizFindById['fecha_nacimiento'] ?>" required class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" />
                                            </div>
                                        </div>
                                        <!-- ficha de formacion -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="ficha_formacion" class="form-label">Ficha de formacion</label>
                                            <div class="input-group input-group-merge">
                                                <span id="ficha_formacion-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <select class="form-select" name="ficha_formacion" required>
                                                    <option value=" <?php echo $aprendizFindById['id_ficha'] ?>">Ficha:
                                                        <?php echo $aprendizFindById['id_ficha'] ?></option>
                                                    <?php
                                                    // CONSUMO DE DATOS DE LOS PROCESOS
                                                    $get_fichas = $connection->prepare("SELECT * FROM fichas LEFT JOIN programas_formacion
                                            ON fichas.id_programa = programas_formacion.id_programa");
                                                    $get_fichas->execute();
                                                    $fichas = $get_fichas->fetchAll(PDO::FETCH_ASSOC);
                                                    // Verificar si no hay datos
                                                    if (empty($fichas)) {
                                                        echo "<option value=''>No hay datos...</option>";
                                                    } else {
                                                        // Iterar sobre los estados
                                                        foreach ($fichas as $ficha) {
                                                            echo "<option value='{$ficha['codigoFicha']}'>{$ficha['codigoFicha']} - {$ficha['nombre_programa']}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        if ($aprendizFindById['patrocinio'] == 'si') {
                                        ?>
                                            <!-- patrocinio -->
                                            <div class="mb-3 col-12 col-lg-6">
                                                <label for="tipo_patrocinio" class="form-label">Patrocinio</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" readonly value="<?php echo $aprendizFindById['patrocinio'] ?>" name="patrocinio" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-lg-6">
                                                <label for="empresa" class="form-label">Empresa</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="empresa-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <select class="form-select" readonly name="empresa" required>
                                                        <option value="<?php echo $aprendizFindById['empresa_patrocinadora'] ?>">
                                                            <?php echo $aprendizFindById['nombre_empresa'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="mb-3 col-12 col-lg-6">
                                                <label for="tipo_patrocinio" class="form-label">Patrocinio</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="tipo_patrocinio-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <select class="form-select" name="patrocinio" id="tipo_patrocinio" required>
                                                        <option value="<?php echo $aprendizFindById['patrocinio'] ?>">
                                                            <?php echo ucfirst($aprendizFindById['patrocinio']) ?></option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-lg-6" id="empresa-input" style="display: none;">
                                                <label for="empresa" class="form-label">Empresa</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="empresa-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <select class="form-select" name="empresa" id="empresa">
                                                        <option value="<?php echo $aprendizFindById['empresa_patrocinadora'] ?>">
                                                            Seleccionar Empresa...
                                                        </option>
                                                        <?php
                                                        // CONSUMO DE DATOS DE LOS PROCESOS
                                                        $list_empresas = $connection->prepare("SELECT * FROM empresas");
                                                        $list_empresas->execute();
                                                        $empresas = $list_empresas->fetchAll(PDO::FETCH_ASSOC);
                                                        // Verificar si no hay datos
                                                        if (empty($empresas)) {
                                                            echo "<option value=''>No hay datos...</option>";
                                                        } else {
                                                            // Iterar sobre los estados
                                                            foreach ($empresas as $empresa) {
                                                                echo "<option value='{$empresa['id_empresa']}'>{$empresa['nombre_empresa']}</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                        <!-- tipo de covivencia -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="tipo_convivencia" class="form-label">Tipo de convivencia</label>
                                            <div class="input-group input-group-merge">
                                                <span id="tipo_convivencia-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <select class="form-select" name="tipo_convivencia" required>
                                                    <option value="<?php echo $aprendizFindById['tipo_convivencia'] ?>">
                                                        <?php echo $aprendizFindById['tipo_convivencia'] ?></option>
                                                    <option value="interno">Interno</option>
                                                    <option value="externo">Externo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- sexo del aprendiz -->
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="tipo_sexo" class="form-label">Orientacion Sexual</label>
                                            <div class="input-group input-group-merge">
                                                <span id="tipo_sexo-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <select class="form-select" name="sexo" id="tipo_sexo" required>
                                                    <option value="<?php echo $aprendizFindById['sexo'] ?>">Sexo:
                                                        <?php echo $aprendizFindById['sexo'] ?>
                                                    </option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="estadoAprendiz" class="form-label">Estado Aprendiz</label>
                                            <div class="input-group input-group-merge">
                                                <span id="estadoAprendiz-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <select class="form-select" name="estadoAprendiz" required>
                                                    <option value="<?php echo $aprendizFindById['id_estado'] ?>">
                                                        <?php echo $aprendizFindById['estado_aprendiz'] ?>
                                                    </option>
                                                    <?php
                                                    // CONSUMO DE DATOS DE LOS PROCESOS
                                                    $estados_sena = $connection->prepare("SELECT * FROM estados");
                                                    $estados_sena->execute();
                                                    $estados_se = $estados_sena->fetchAll(PDO::FETCH_ASSOC);
                                                    // Verificar si no hay datos
                                                    if (empty($estados_se)) {
                                                        echo "<option value=''>No hay datos...</option>";
                                                    } else {
                                                        // Iterar sobre los estados
                                                        foreach ($estados_se as $estado_se) {
                                                            echo "<option value='{$estado_se['id_estado']}'>{$estado_se['estado']}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="estadoSenaEmpresa" class="form-label">Estado Sena Empresa</label>
                                            <div class="input-group input-group-merge">
                                                <span id="estadoSenaEmpresa-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                                <select class="form-select" name="estadoSenaEmpresa" required>
                                                    <option value="<?php echo $aprendizFindById['id_estado_se'] ?>">
                                                        <?php echo $aprendizFindById['nombre_estado_se'] ?>
                                                    </option>
                                                    <?php
                                                    // CONSUMO DE DATOS DE LOS PROCESOS
                                                    $listestados = $connection->prepare("SELECT * FROM estados");
                                                    $listestados->execute();
                                                    $estados = $listestados->fetchAll(PDO::FETCH_ASSOC);
                                                    // Verificar si no hay datos
                                                    if (empty($estados)) {
                                                        echo "<option value=''>No hay datos...</option>";
                                                    } else {
                                                        // Iterar sobre los estados
                                                        foreach ($estados as $estado) {
                                                            echo "<option value='{$estado['id_estado']}'>{$estado['estado']}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="aprendices-lectiva.php" class="btn btn-danger">
                                                Cancelar
                                            </a>
                                            <input type="submit" class="btn btn-primary" value="Actualizar"></input>
                                            <input type="hidden" class="btn btn-info" value="formUpdateAprendiz" name="MM_formUpdateAprendiz"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        require_once("../components/footer.php");
    } else {
        showErrorOrSuccessAndRedirect("error", "Error de ruta", "Los datos del aprendiz no fueron encontrados", "aprendices-lectiva.php");
    }
} else {
    showErrorOrSuccessAndRedirect("error", "Error de ruta", "Los datos del aprendiz no fueron encontrados", "aprendices-lectiva.php");
}
    ?>