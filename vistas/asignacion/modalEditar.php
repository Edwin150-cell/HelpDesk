<div class="modal fade" id="modalEditarAsignacion" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Editar Asignación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="frmEditarAsignacion">

          <input type="hidden" name="idAsignacion" id="idAsignacion">

          <div class="row mb-3">
            <div class="col-md-6">
              <label>Persona</label>
              <input type="text" name="idPersona" id="idPersonaU" class="form-control">
            </div>

            <div class="col-md-6">
              <label>Equipo</label>
              <input type="text" name="idEquipo" id="idEquipoU" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label>Marca</label>
              <input type="text" name="marca" id="marcaU" class="form-control">
            </div>

            <div class="col-md-4">
              <label>Modelo</label>
              <input type="text" name="modelo" id="modeloU" class="form-control">
            </div>

            <div class="col-md-4">
              <label>Color</label>
              <input type="text" name="color" id="colorU" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" id="descripcionU" class="form-control"></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label>Memoria</label>
              <input type="text" name="memoria" id="memoriaU" class="form-control">
            </div>

            <div class="col-md-4">
              <label>Disco duro</label>
              <input type="text" name="disco" id="discoU" class="form-control">
            </div>

            <div class="col-md-4">
              <label>Procesador</label>
              <input type="text" name="procesador" id="procesadorU" class="form-control">
            </div>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" onclick="actualizarAsignacion()">
          Guardar cambios
        </button>
      </div>

    </div>
  </div>
</div>