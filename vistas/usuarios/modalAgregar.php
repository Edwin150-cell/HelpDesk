<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuarios" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="frmAgregarUsuario" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6">
                            <label>Paterno</label>
                            <input type="text" class="form-control" name="paterno">
                        </div>

                        <div class="col-md-6">
                            <label>Materno</label>
                            <input type="text" class="form-control" name="materno">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="fechaNacimiento">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Sexo</label>
                            <select class="form-control" name="sexo">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Telefono</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="correo">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="usuario">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Rol</label>
                            <select class="form-control" name="idRol">
                                <option value="1">Cliente</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Ubicación</label>
                            <input type="text" class="form-control" name="ubicacion">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-primary" id="btnAgregarUsuario">
                        Agregar Usuario
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>