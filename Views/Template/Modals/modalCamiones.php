<!-- Modal -->
<div class="modal fade" id="modalFormCamiones" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCamion" name="formCamion" class="form-horizontal">
                    <input type="hidden" id="idCamion" name="idCamion" value="">
                    <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.
                    </p>
                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="control-label">Código <span class="required">*</span></label>
                                    <input class="form-control" id="txtCodigoCamion" name="txtCodigoCamion" type="text" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Marca <span class="required">*</span></label>
                                    <input class="form-control" id="txtMarcaCamion" name="txtMarcaCamion" type="text" required="">
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="control-label">Modelo <span class="required">*</span></label>
                                    <input class="form-control" id="txtModeloCamion" name="txtModeloCamion" type="text" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Color <span class="required">*</span></label>
                                    <input class="form-control" id="txtColorCamion" name="txtColorCamion" type="text" required="">
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="control-label">Capacidad <span class="required">*</span></label>
                                    <input class="form-control" id="txtCapacidadCamion" name="txtCapacidadCamion" type="text" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Planta <span class="required">*</span></label>
                                    <select class="form-control selectpicker" id="txtPlantaCamion" name="txtPlantaCamion" required>
                                        <option value="1">Jiboa</option>
                                        <option value="2">Guazapa</option>
                                    </select>
                                </div>
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