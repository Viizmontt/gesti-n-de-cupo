<!-- Modal Add/Eddit-->
<div class="modal fade" id="modalFormEcupoR" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="numCupoECT"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>

            <div class="modal-body">

                <form id="formEcuposR" name="formEcuposR" class="form-horizontal">

                    <input type="hidden" id="idEcuposR" name="idEcuposR">

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Asesor</label>
                                <input class="form-control" id="txtAsesorER" name="txtAsesorER" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Cliente</label>
                                <input class="form-control" id="txtClienteER" name="txtClienteER" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Tendidos por tarimas</label>
                                <select class="form-control selectpicker" id="listTendidosTarimaER"
                                    name="listTendidosTarimaER" required>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Capacidad de tarimas</label>
                                <select class="form-control selectpicker" id="listCapacidadTarimasER"
                                    name="listCapacidadTarimasER" required>
                                    <option class="font-weight-bold" value="14">14</option>
                                    <option class="font-weight-bold" value="16">16</option>
                                    <option class="font-weight-bold" value="18">18</option>
                                    <option class="font-weight-bold" value="20">20</option>
                                    <option class="font-weight-bold" value="22">22</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Estado</label>
                                <input class="form-control" id="listEstadoER" name="listEstadoER" disabled="disabled">
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Cantidad de tarimas</label>
                                <input class="form-control font-weight-bold" id="txtCantidadTarimasER"
                                    name="txtCantidadTarimasER" type="text" placeholder="Cantidad de tarimas"
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de entrada</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioERE" name="txtHoraInicioERE" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de inicio de carga</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioER" name="txtHoraInicioER" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de finalización de carga</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalER" name="txtHoraFinalER" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de salida</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalERS" name="txtHoraFinalERS" type="time">
                            </div>

                        </div>

                        <div class="col-lg-12">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Observación</label>
                                <textarea class="form-control font-weight-bold" id="txtDescripcionER" name="txtDescripcionER" rows="2"></textarea>
                            </div>

                        </div>


                    </div>

                    <div class="col-lg-4">
                        <button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- Modal Ej/Eddit  GRANEL  -->
<div class="modal fade" id="modalFormEcupoRG" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="numCupoECG"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <form id="formEcuposRG" name="formEcuposRG" class="form-horizontal">

                    <input type="hidden" id="idEcuposRG" name="idEcuposRG">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Asesor</label>
                                <input class="form-control" id="txtAsesorERG" name="txtAsesorERG" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Cliente</label>
                                <input class="form-control" id="txtClienteERG" name="txtClienteERG" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <input class="form-control font-weight-bold" id="listEstadoERG" name="listEstadoERG" type="text" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de entrada</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioERGE" name="txtHoraInicioERGE" type="time">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                        <button id="btnActionForm" class="btn btn-info btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <button class="btn btn-danger btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar </button>
                                    </div>

                                </div>                                
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de inicio de carga</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioERG" name="txtHoraInicioERG" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de finalización de carga</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalERG" name="txtHoraFinalERG" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de salida</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalERGS" name="txtHoraFinalERGS" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Observación</label>
                                <textarea class="form-control font-weight-bold" id="txtDescripcionERG" name="txtDescripcionERG" rows="4"></textarea>
                            </div>

                        </div>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

<!-- Modal View-->
<div class="modal fade" id="modalViewEcupoR" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos del cupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celCupo">1</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celAsesor">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celCliente">--</td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado">--</td>
                        </tr>

                        <tr>
                            <td>Hora asignada:</td>
                            <td id="celHora_asignada">--</td>
                        </tr>

                        <tr>
                            <td>Hora de inicio:</td>
                            <td id="celHora_inicio">--</td>
                        </tr>

                        <tr>
                            <td>Hora de finalización:</td>
                            <td id="celHora_finalizacion">--</td>
                        </tr>

                        <tr>
                            <td>Tipo carga:</td>
                            <td id="celTipo_carga">--</td>
                        </tr>

                        <tr>
                            <td>Tendidos tarimas:</td>
                            <td id="celTendidos_tarimas">--</td>
                        </tr>

                        <tr>
                            <td>Capacidad tarimas:</td>
                            <td id="celCapacidad_tarimas">--</td>
                        </tr>

                        <tr>
                            <td>Cantidad tarimas:</td>
                            <td id="celCantidad_tarimas">--</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Granel-->
<div class="modal fade" id="modalViewEcupoRG" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos del cupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celCupoG">1</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celAsesorG">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celClienteG">--</td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celEstadoG">--</td>
                        </tr>

                        <tr>
                            <td>Hora asignada:</td>
                            <td id="celHora_asignadaG">--</td>
                        </tr>

                        <tr>
                            <td>Hora de inicio:</td>
                            <td id="celHora_inicioG">--</td>
                        </tr>

                        <tr>
                            <td>Hora de finalización:</td>
                            <td id="celHora_finalizacionG">--</td>
                        </tr>

                        <tr>
                            <td>Tipo carga:</td>
                            <td id="celTipo_cargaG">--</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php footerAdmin($data); ?>