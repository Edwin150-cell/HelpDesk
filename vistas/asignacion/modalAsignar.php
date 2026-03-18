<div class="modal fade" id="modalAsignarEquipo" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="frmAsignarEquipo">

                <div class="modal-header">
                    <h5 class="modal-title">Asignar Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- PERSONA Y EQUIPO -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-control text-center" name="idPersona">
                                <option>Persona</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-control text-center" name="idEquipo">
                                <option>Tipo de dispositivo</option>
                            </select>
                        </div>
                    </div>

                    <!-- MARCA MODELO COLOR -->
                    <div class="row mb-3 text-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Marca" name="marca">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Modelo" name="modelo">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Color" name="color">
                        </div>
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="mb-3">
                        <textarea class="form-control text-center" placeholder="Descripción" rows="2" name="descripcion"></textarea>
                    </div>

                    <hr>

                    <!-- HARDWARE -->
                    <div class="row mb-3 text-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Memoria" name="memoria">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Disco duro" name="disco">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control text-center" placeholder="Procesador" name="procesador">
                        </div>
                    </div>

                    <!-- IMAGEN -->
                    <div class="mb-3">
                        <input type="file" class="form-control text-center" name="imagen">
                    </div>

                </div>

                <div class="modal-footer justify-content-start">
                    <button class="btn btn-info text-white">
                        Agregar nuevo
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>