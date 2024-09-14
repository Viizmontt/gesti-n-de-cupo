<?php 
    headerAdmin($data);
?>
<!-- Modal Eddit Domicilio-->
<div class="modal fade" id="modalFormEcuposC" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="numCupoECD"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="formEcuposC" name="formEcuposC" class="form-horizontal" >
                    <input type="hidden" id="idAcuposEC" name="idAcuposEC">                    
                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="control-label">Asesor</label>
                                <input class="form-control" id="txtAsesorEC" name="txtAsesorEC" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Cliente</label>
                                <input class="form-control" id="txtClienteEC" name="txtClienteEC" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Estado</label>
                                <input class="form-control font-weight-bold" id="listEstadoEC" name="listEstadoEC" type="text" disabled="disabled">
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="font-weight-bold">Camión</label>
                                <select class="form-control" data-live-search="true" id="listCamionesEC" name="listCamionesEC">
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Motorista</label>
                                <select class="form-control" data-live-search="true" id="listMotoristasEC" name="listMotoristasEC" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de entrada</label>
                                <input class="form-control font-weight-bold" data-live-search="false" id="txtHoraInicioECE" name="txtHoraInicioECE" type="time">
                            </div>                            

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de inicio</label>
                                <input class="form-control font-weight-bold" data-live-search="false" id="txtHoraInicioEC" name="txtHoraInicioEC" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de finalización</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalEC" name="txtHoraFinalEC" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de salida</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalECS" name="txtHoraFinalECS" type="time">
                            </div>

                        </div>

                         <div class="col-lg-12">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Observación</label>
                                <textarea class="form-control font-weight-bold" id="txtDescripcionEC" name="txtDescripcionEC" rows="3"></textarea>
                            </div>

                        </div>
                    
                    </div>

                    <div class="col-lg-4">
                        <button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar </button>
                    </div>

                    <br>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eddit Propio-->
<div class="modal fade" id="modalFormEcuposCTP" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="numCupoECTP"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>

            <div class="modal-body">
                <form id="formEcuposCTP" name="formEcuposCTP" class="form-horizontal" >
                    <input type="hidden" id="idAcuposECTP" name="idAcuposECTP">                    
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">Asesor</label>
                                <input class="form-control" id="txtAsesorECTP" name="txtAsesorECTP" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Cliente</label>
                                <input class="form-control" id="txtClienteECTP" name="txtClienteECTP" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Estado</label>
                                <input class="form-control font-weight-bold" id="listEstadoECTP" name="listEstadoECTP" type="text" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de entrada</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioECTPE" name="txtHoraInicioECTPE" type="time">
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
                                <label class="control-label font-weight-bold">Hora de inicio</label>
                                <input class="form-control font-weight-bold" id="txtHoraInicioECTP" name="txtHoraInicioECTP" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de finalización</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalECTP" name="txtHoraFinalECTP" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Hora de salida</label>
                                <input class="form-control font-weight-bold" id="txtHoraFinalECTPS" name="txtHoraFinalECTPS" type="time">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Observación</label>
                                <textarea class="form-control font-weight-bold" id="txtDescripcionECTP" name="txtDescripcionECTP" rows="4"></textarea>
                            </div>

                        </div>
                    
                    </div>

                    

                </form>
            </div>

        </div>

    </div>
    
</div>



<!-- Modal View Transporte Domicilio-->
<div class="modal fade" id="modalViewEcupoC" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <td>Logística:</td>
                            <td id="celLogistica">--</td>
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
                            <td>Receptor:</td>
                            <td id="celReceptor">--</td>
                        </tr>

                        <tr>
                            <td>Contacto:</td>
                            <td id="celContacto">--</td>
                        </tr>

                        <tr>
                            <td>Deparpamento:</td>
                            <td id="celDepartamento">--</td>
                        </tr>

                        <tr>
                            <td>Municipio:</td>
                            <td id="celMunicipio">--</td>
                        </tr>

                        <tr>
                            <td>Dirección:</td>
                            <td id="celDireccion">--</td>
                        </tr>

                        <tr>
                            <td>Flete:</td>
                            <td id="celFlete">--</td>
                        </tr>

                        <tr>
                            <td>Quintales:</td>
                            <td id="celQuintales">--</td>
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

<!-- Modal View Transporte Propio-->
<div class="modal fade" id="modalViewEcupoCTP" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <td id="celCupoTP">1</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celAsesorTP">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celClienteTP">--</td>
                        </tr>

                        <tr>
                            <td>Logística:</td>
                            <td id="celLogisticaTP">--</td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celEstadoTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora_asignada:</td>
                            <td id="celHora_asignadaTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora de inicio:</td>
                            <td id="celHora_inicioTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora de finalización:</td>
                            <td id="celHora_finalizacionTP">--</td>
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