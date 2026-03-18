<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../clases/Conexion.php";
$obj = new Conexion();
$conexion = $obj->conectar();
?>

<div class="modal fade" id="modalAsignarEquipo" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- SOLO UN FORM -->
            <form id="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()">

                <div class="modal-header">
                    <h5 class="modal-title">Asignar Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">

                        <!-- PERSONAS -->
                        <div class="col-sm-6">
                            <label>Nombre de persona</label>

                            <?php
                            $sql = "SELECT id_persona,
                                    CONCAT(paterno, ' ', materno, ' ', nombre) AS nombre
                                    FROM t_persona
                                    ORDER BY paterno";

                            $respuesta = mysqli_query($conexion, $sql);
                            ?>

                            <select name="idPersona" class="form-control" required>
                                <option value="">Selecciona una opción</option>

                                <?php while($mostrar = mysqli_fetch_array($respuesta)): ?>
                                    <option value="<?php echo $mostrar['id_persona']; ?>">
                                        <?php echo $mostrar['nombre']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- EQUIPOS -->
                        <div class="col-sm-6">
                            <label>Tipo de equipo</label>

                            <?php
                            $sql2 = "SELECT id_equipo, nombre 
                                     FROM t_cat_equipo 
                                     ORDER BY nombre";

                            $respuesta2 = mysqli_query($conexion, $sql2);
                            ?>

                            <select name="idEquipo" class="form-control" required>
                                <option value="">Selecciona una opción</option>

                                <?php while($mostrar2 = mysqli_fetch_array($respuesta2)): ?>
                                    <option value="<?php echo $mostrar2['id_equipo']; ?>">
                                        <?php echo $mostrar2['nombre']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                    </div>

                    <!-- MARCA MODELO COLOR -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Marca" name="marca">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Modelo" name="modelo">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Color" name="color">
                        </div>
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Descripción" name="descripcion"></textarea>
                    </div>

                    <hr>

                    <!-- HARDWARE -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Memoria" name="memoria">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Disco duro" name="disco">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Procesador" name="procesador">
                        </div>
                    </div>

                    <!-- IMAGEN -->
                    <div class="mb-3">
                        <input type="file" class="form-control" name="imagen">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Asignar Equipo
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>