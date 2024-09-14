<!-- Modal New/Edit-->
<div class="modal fade" id="modalFormMotoristas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Motorista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formMotorista" name="formMotorista" class="form-horizontal">
              <input type="hidden" id="idMotorista" name="idMotorista" value="">
              <p class="text-primary">Todos los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">Nombres <span class="required">*</span></label>
                      <input class="form-control" id="txtNombresMotorista" name="txtNombresMotorista" type="text" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Apellidos <span class="required">*</span></label>
                      <input class="form-control" id="txtApellidosMotorista" name="txtApellidosMotorista" type="text" required="">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">DUI <span class="required">*</span></label>
                      <input class="form-control" id="txtDuiMotorista" name="txtDuiMotorista" type="text" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Licencia <span class="required">*</span></label>
                      <input class="form-control" id="txtLicenciaMotorista" name="txtLicenciaMotorista" type="text" required="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">Fecha de vencimiento <span class="required">*</span></label>
                      <input class="form-control" id="txtFinalizacionMotorista" name="txtFinalizacionMotorista" type="date" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Calidad de servicio <span class="required">*</span></label>
                      <input class="form-control" id="txtCalidadMotorista" name="txtCalidadMotorista" type="text" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="listPlantaMotorista">Planta</label>
                    <select class="form-control selectpicker" id="listPlantaMotorista" name="listPlantaMotorista" required >
                        <option value="1">Jiboa</option>
                        <option value="2">Guazapa</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Observación</label>
                    <textarea class="form-control" id="txtDescripcionMotorista" name="txtDescripcionMotorista" rows="4" placeholder="Descripción del Motorista"></textarea>
                  </div>

                  <div class="row">
                   <div class="form-group col-md-6">
                     <button id="btnActionForm" class="btn btn-primary btn-sm btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                    </div> 
                    <div class="form-group col-md-6">
                      <button class="btn btn-danger btn-sm btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div> 
                  </div>  

                </div>
              </div>
              
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="modalViewMotorista" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del motorista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            
            <tr>
              <td>Nombres:</td>
              <td id="celNombres">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellidos">Jacob</td>
            </tr>
            <tr>
              <td>Dui:</td>
              <td id="celDui">Larry</td>
            </tr>
            <tr>
              <td>Licencia:</td>
              <td id="celLicencia">Larry</td>
            </tr>

            <tr>
              <td>Finalizacion:</td>
              <td id="celFinalizacion">Larry</td>
            </tr>
            <tr>
              <td>Planta:</td>
              <td id="celPlanta">654654654</td>
            </tr>
            <tr>
              <td>Nota:</td>
              <td id="celNota">654654654</td>
            </tr>
            <tr>
              <td>Observacion:</td>
              <td id="celObservacion">654654654</td>
            </tr>
          </tbody
          >
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
