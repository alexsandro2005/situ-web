<?php
$titlePage = "Actualizacion de Funcionario";
require_once("../components/sidebar.php");
if (!empty($_GET['id_edit-document'])) {
    $id_usuario = $_GET['id_edit-document'];
    $getFindByIdUnity = $connection->prepare("SELECT * FROM usuarios INNER JOIN estados ON usuarios.id_estado = estados.id_estado WHERE usuarios.documento = :id_usuario");
    $getFindByIdUnity->bindParam(":id_usuario", $id_usuario);
    $getFindByIdUnity->execute();
    $funcionarioFindById = $getFindByIdUnity->fetch(PDO::FETCH_ASSOC);
    if ($funcionarioFindById) {
        $nombre_completo = $funcionarioFindById['nombres'] . " " . $funcionarioFindById['apellidos'];
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
                        <h3 class="fw-bold py-2"><span class="text-muted fw-light">Funcionarios/</span>Editar
                            Funcionario
                        </h3>
                        <h6 class="mb-0">Actualizacion de Datos del Funcionario <?php echo $nombre_completo ?>.</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off"
                            name="formUpdateFuncionario">
                            <div class="mb-3">
                                <label for="tipo_documento" class="form-label">Tipo de documento</label>
                                <div class="input-group input-group-merge">
                                    <span id="tipo_documento-2" class="input-group-text"><i
                                            class="fas fa-user"></i></span>
                                    <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                                        <option value="<?php echo $funcionarioFindById['tipo_documento'] ?>">Seleccionar
                                            Tipo de Documento...</option>
                                        <option value="C.C.">Cedula de Ciudadania</option>
                                        <option value="C.E.">Cedula de Extanjeria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="documento">Numero de
                                    Documento</label>
                                <div class="input-group input-group-merge">
                                    <span id="documento-icon" class=" input-group-text"><i
                                            class="fas fa-user"></i></span>
                                    <input type="text" value="<?php echo $funcionarioFindById['documento'] ?>" readonly
                                        class="form-control" onkeypress="return(multiplenumber(event));" minlength="10"
                                        maxlength="10" oninput="maxlengthNumber(this);" id="documento" name="documento"
                                        placeholder="Ingresa el numero de documento"
                                        aria-describedby="documento-icon" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nombres">Nombres</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombres_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" autofocus required minlength="2"
                                        value="<?php echo $funcionarioFindById['nombres'] ?>" maxlength="100"
                                        class="form-control" name="nombres" id="nombres"
                                        placeholder="Ingresa el nombre del funcionario" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="apellidos">Apellidos</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre_area-span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" required minlength="2"
                                        value="<?php echo $funcionarioFindById['apellidos'] ?>" maxlength="100"
                                        class="form-control" name="apellidos" id="apellidos"
                                        placeholder="Ingresa los apellidos del funcionario" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Correo Electronico</label>
                                <div class="input-group input-group-merge">
                                    <span id="email_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="email" required minlength="2" maxlength="100"
                                        value="<?php echo $funcionarioFindById['email'] ?>" class="form-control"
                                        name="email" id="email" placeholder="Ingresar corrreo electronico" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="celular">Numero de Celular</label>
                                <div class="input-group input-group-merge">
                                    <span id="celular_span" class="input-group-text"><i class="fas fa-user"></i>
                                    </span>
                                    <input type="number" required minlength="2"
                                        value="<?php echo $funcionarioFindById['celular'] ?>" maxlength="10"
                                        class="form-control" name="celular" id="celular"
                                        placeholder="Ingresar corrreo electronico" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sexo" class="form-label">Orientacion Sexual</label>
                                <div class="input-group input-group-merge">
                                    <span id="sexo-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                    <select class="form-select" name="sexo" required>
                                        <option value="<?php echo $funcionarioFindById['sexo'] ?>">Seleccionar
                                            sexo...</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nombreCargo" class="form-label">Cargo del funcionario</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombreCargo-2" class="input-group-text"><i class="fas fa-user"></i></span>
                                    <select class="form-select" id="nombreCargo" name="nombreCargo" required>
                                        <option value="<?php echo $funcionarioFindById['cargo_funcionario'] ?>">
                                            Seleccionar cargo
                                            funcionario...</option>
                                        <?php
                                                // CONSUMO DE DATOS DE LOS PROCESOS
                                                $listCargos = $connection->prepare("SELECT * FROM cargos");
                                                $listCargos->execute();
                                                $cargos = $listCargos->fetchAll(PDO::FETCH_ASSOC);
                                                // Verificar si no hay datos
                                                if (empty($cargos)) {
                                                    echo "<option value=''>No hay datos...</option>";
                                                } else {
                                                    // Iterar sobre los cargos
                                                    foreach ($cargos as $cargo) {
                                                        echo "<option value='{$cargo['id_cargo']}'>{$cargo['tipo_cargo']}</option>";
                                                    }
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6 h-px-200">
                                <label class="form-label" for="imagenFirma">Firma Actual</label>
                                <div class="avatar text-center">
                                    <img src="../assets/images/funcionarios/<?php echo $funcionarioFindById['foto_data'] ?>"
                                        alt="" class="w-px-200 h-px-200 rounded">
                                </div>
                            </div>
                            <div class="mt-5 mb-3">
                                <label class="form-label" for="imagenFirma">Cambiar Imagen</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre_area-span" class="input-group-text"><i
                                            class="fas fa-image"></i></span>
                                    <input type="file" class="form-control" accept="image/*" name="imagenFirma"
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
                                        <option value="<?php echo $funcionarioFindById['id_estado'] ?>">
                                            <?php echo $funcionarioFindById['estado'] ?></option>
                                        <?php
                                                // CONSUMO DE DATOS DE LOS PROCESOS
                                                $listEstados = $connection->prepare("SELECT * FROM estados");
                                                $listEstados->execute();
                                                $estados = $listEstados->fetchAll(PDO::FETCH_ASSOC);
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
                                <a href="funcionarios.php" class="btn btn-danger">
                                    Cancelar
                                </a>
                                <input type="submit" class="btn btn-primary" value="Actualizar"></input>
                                <input type="hidden" class="btn btn-info" value="formUpdateFuncionario"
                                    name="MM_formUpdateFuncionario"></input>
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
        showErrorOrSuccessAndRedirect("error", "Error de Ruta", "Los datos no fueron encontrados", "funcionarios.php");
    }
} else {

    showErrorOrSuccessAndRedirect("error", "Error de Consulta", "Error al momento de obtener los datos del registro.", "funcionarios.php");
}
    ?>