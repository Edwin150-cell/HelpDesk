<!-- Modal Actualizar Usuario -->
<div class="modal fade" id="modalActualizarUsuarios" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="frmActualizarUsuario">
                 <div class="modal-header">
                    <h5 class="modal-title">Actualizar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                 <div class="modal-body">
                     <input type="hidden" id="idUsuariou" name="idUsuariou">
                     <div class="row">
                        <div class="col-md-6">
                            <label>Paterno</label>
                            <input type="text" class="form-control" id="paternou" name="paterno">
                        </div>
                        <div class="col-md-6">
                            <label>Materno</label>
                            <input type="text" class="form-control" id="maternou" name="materno">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="nombreu" name="nombre">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimientou" name="fechaNacimiento">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Sexo</label>
                            <select class="form-control" id="sexou" name="sexo">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Telefono</label>
                            <input type="text" class="form-control" id="telefonou" name="telefono">
                        </div>
                         <div class="col-md-12 mt-2">
                            <label>Correo</label>
                            <input type="email" class="form-control" id="correou" name="correo">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Usuario</label>
                            <input type="text" class="form-control" id="usuariou" name="usuario">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Rol</label>
                            <select class="form-control" id="idRolu" name="idRol">
                                <option value="1">Cliente</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label>Ubicación</label>
                            <input type="text" class="form-control" id="ubicacionu" name="ubicacion">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" id="btnActualizarUsuario">
                        Actualizar Usuario
                    </button>

                </div>
             </form>

        </div>
    </div>
</div>