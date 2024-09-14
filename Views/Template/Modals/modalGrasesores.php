<!-- Modal nUEVO cUPO-->
<div class="modal fade" id="modalFormNuevoCupo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo cupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formNuevoCupo" name="formNuevoCupo" class="form-horizontal">
                    <input type="hidden" id="tipoTransporteASC" name="tipoTransporteASC" value="">
                    <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.
                    </p>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Cantidad de cupos <span class="required">*</span></label>
                                <input type="num" class="form-control" id="txtCantidadAAC" name="txtCantidadAAC"
                                    required="">
                            </div>
                            <br>

                            <div class="row">

                                <div class="form-group col m-6">
                                    <label for="listDiaAAC">Día</label>
                                    <select class="form-control" data-live-search="true" id="listDiaAAC"
                                        name="listDiaAAC" required>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Miércoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                    </select>
                                </div>

                                <div class="form-group col m-6">
                                    <label for="listBloqueAAC">Bloque Horario</label>
                                    <select class="form-control" data-live-search="true" id="listBloqueAAC"
                                        name="listBloqueAAC" required>
                                        <option value="1">6:00:AM - 9:00:AM</option>
                                        <option value="2">9:00:AM - 12:00:MD</option>
                                        <option value="3">12:00:MD - 3:00:PM</option>
                                        <option value="4">3:00:PM - 6:00:PM</option>
                                        <option value="5">6:00:PM - 9:00:PM</option>
                                    </select>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button id="btnActionForm" class="btn btn-primary btn-sm btn-block" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i><span
                                            id="btnText">Guardar</span></button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button class="btn btn-danger btn-sm btn-block" type="button"
                                        data-dismiss="modal"><i
                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar asesor al cupos-->
<div class="modal fade" id="modalFormGrasesores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Asignar asesor </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formGrasesores" name="formGrasesores">
                            <input type="hidden" id="idCupo_Asesor" name="idCupo_Asesor" value="">
                            <div class="form-group">
                                <label for="listNombresPersona">Asesor</label>
                                <select class="form-control" data-live-search="true" id="listNombresPersona"
                                    name="listNombresPersona" required="" value="">
                                </select>
                            </div>
                            <div class="tile-footer">
                                <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i><span
                                        id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a
                                    class="btn btn-secondary" href="#" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar cupo-->
<div class="modal fade" id="modalFormDelCupo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Eliminar cupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formDelCupo" name="formDelCupo" class="form-horizontal">

                    <input type="hidden" id="idCupo_Eliminar" name="idCupo_Eliminar" value="">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group col m-6">
                                    <br>
                                    <h1 class="modal-title text-center">¡Eliminar!</h1>
                                    <br>
                                    <h5 class="modal-title text-center">¿Realmente desea eliminar el cupo?</h5>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button id="btnActionForm" class="btn btn-primary btn-sm btn-block" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i><span
                                            id="btnText">Aceptar</span></button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button class="btn btn-danger btn-sm btn-block" type="button"
                                        data-dismiss="modal"><i
                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal limpiar asesor-->
<div class="modal fade" id="modalFormCleanCupo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Eliminar asesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formCleanCupo" name="formCleanCupo" class="form-horizontal">

                    <input type="hidden" id="idCupo_AsesorClean" name="idCupo_AsesorClean" value="">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group col-m-6">
                                    <br>
                                    <h1 class="modal-title text-center">¡Eliminar!</h1>
                                    <br>
                                    <h5 class="modal-title text-center">¿Realmente desea eliminar el asesor del cupo?
                                    </h5>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button id="btnActionForm" class="btn btn-primary btn-sm btn-block" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i><span
                                            id="btnText">Aceptar</span></button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button class="btn btn-danger btn-sm btn-block" type="button"
                                        data-dismiss="modal"><i
                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Asignar carga-->
<div class="modal fade" id="modalFormTipoCarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Tipo carga </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">

                        <form id="formTipoCargaCupo" name="formTipoCargaCupo">
                            <input type="hidden" id="idCupo_Carga" name="idCupo_Carga" value="">

                            <div class="form-group">
                                <label for="listNombresPersona">Tipo Carga</label>
                                <select class="form-control" data-live-search="true" id="listTipoCarga"
                                    name="listTipoCarga" required="">
                                    <option value="Paga carga">Paga carga</option>
                                    <option value="No paga carga">No paga carga</option>
                                </select>
                            </div>

                            <div class="tile-footer">
                                <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i><span
                                        id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a
                                    class="btn btn-secondary" href="#" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>