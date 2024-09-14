<?php 
    headerAdmin($data);
    require_once ('Controllers/Reportesrg.php');
?>


<!-- Modal Reportes Rastras-->
<div class="modal fade" id="modalFormReportes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="titleModal"><span id="plantat"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formReportes" name="formReportes" class="form-horizontal">
                <input type="hidden" id="a" name="a" value="">
                <input type="hidden" id="b" name="b" value="">

                    <body>

                        <div class="row" id="reporte">
                            <div class="col-md-12">
                                <div class="tile">

                                    <section id="sPedido" class="invoice">
                                        <div id="imprimir">
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <h2 class="page-header"><img src="<?= media(); ?>/logo.png">
                                                    </h2>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="text-right">Fecha: <?php echo date('d-m-Y'); ?></h5>
                                                </div>
                                            </div>
                                            <div class="row invoice-info">

                                                <div class="col-4">
                                                    <address>
                                                        <strong>Informe</strong>
                                                        <br>
                                                        <span id="planta"></span>
                                                        <br>
                                                        <span id="transporte"></span>
                                                        <br>
                                                        Inicion: <span id="fInicio"></span>
                                                        <br>
                                                        Fin: <span id="fFin"></span>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Efectividad</strong>
                                                        <br>
                                                        Cupos Finalizados: <span id="RGR1"></span>
                                                        <br>
                                                        Cupos : <span id="RGR2"></span>
                                                        <br>
                                                        Resultado : <span id="RGR3"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tipo transporte "Finalizados"</strong>
                                                        <br>
                                                        Paga carga: <span id="RGR4"></span>
                                                        <br>
                                                        No paga carga : <span id="RGR5"></span>
                                                        <br>
                                                        Total : <span id="RGR6"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                 <div class="col-4">
                                                    <address>
                                                        <strong>Tipo transporte "Todos"</strong>
                                                        <br>
                                                        Paga carga: <span id="RGR7"></span>
                                                        <br>
                                                        No paga carga : <span id="RGR8"></span>
                                                        <br>
                                                        Total : <span id="RGR9"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tiempos promedio</strong>
                                                        <br>
                                                        Paga carga: <span id="RGR10"></span>
                                                        <br>
                                                        No paga carga : <span id="RGR11"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tiempos de ciclo</strong>
                                                        <br>
                                                        Paga carga: <span id="RGR12"></span>
                                                        <br>
                                                        No paga carga : <span id="RGR13"></span>
                                                        <br>
                                                    </address>
                                                </div>

                                            </div>
                                            <br>
                                            
                                            
                                        </div>
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <a class="btn btn-secondary" href="javascript:imprSelec('imprimir')"><i class="fa fa-print"></i> Imprimir</a>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>

                    </body>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reportes Camiones-->
<div class="modal fade" id="modalFormReportesc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="titleModal"><span id="plantatc"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formReportesc" name="formReportes" class="form-horizontal">
                <input type="hidden" id="ac" name="ac" value="">
                <input type="hidden" id="bc" name="bc" value="">

                    <body>

                        <div class="row" id="reportec">
                            <div class="col-md-12">
                                <div class="tile">

                                    <section id="sPedidoc" class="invoice">
                                        <div id="imprimir">
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <h2 class="page-header"><img src="<?= media(); ?>/logo.png">
                                                    </h2>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="text-right">Fecha: <?php echo date('d-m-Y'); ?></h5>
                                                </div>
                                            </div>
                                            <div class="row invoice-info">

                                                <div class="col-4">
                                                    <address>
                                                        <strong>Informe</strong>
                                                        <br>
                                                        <span id="plantac"></span>
                                                        <br>
                                                        <span id="transportec"></span>
                                                        <br>
                                                        Inicion: <span id="fInicioc"></span>
                                                        <br>
                                                        Fin: <span id="fFinc"></span>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Efectividad</strong>
                                                        <br>
                                                        Cupos Finalizados: <span id="CJR1"></span>
                                                        <br>
                                                        Cupos : <span id="CJR2"></span>
                                                        <br>
                                                        Resultado : <span id="CJR3"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tipo transporte "Finalizados"</strong>
                                                        <br>
                                                        Domicilio: <span id="CJR4"></span>
                                                        <br>
                                                        Transporte propio: <span id="CJR5"></span>
                                                        <br>
                                                        Total : <span id="CJR6"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                 <div class="col-4">
                                                    <address>
                                                        <strong>Tipo transporte "Todos"</strong>
                                                        <br>
                                                        Domicilio: <span id="CJR7"></span>
                                                        <br>
                                                        Transporte propio: <span id="CJR8"></span>
                                                        <br>
                                                        Total : <span id="CJR9"></span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tiempos promedio</strong>
                                                        <br>
                                                        Domicilio: <span id="CJR10"> </span>
                                                        <br>
                                                        Transporte propio: <span id=" CJR11"> </span>
                                                        <br>
                                                    </address>
                                                </div>
                                                <br>
                                                <div class="col-4">
                                                    <address>
                                                        <strong>Tiempos de ciclo</strong>
                                                        <br>
                                                        Domicilio: <span id="CJR12"></span>
                                                        <br>
                                                        Transporte propio: <span id="CJR13"></span>
                                                        <br>
                                                    </address>
                                                </div>

                                            </div>
                                            <br>
                                            
                                            
                                        </div>
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <a class="btn btn-secondary" href="javascript:imprSelec('imprimir')"><i class="fa fa-print"></i> Imprimir</a>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>

                    </body>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Reportes Rastras Granel-->
<div class="modal fade" id="modalViewReportesRG" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celCupoG">--</td>
                        </tr>

                        <tr>
                            <td>Año:</td>
                            <td id="celAnioG">--</td>
                        </tr>

                        <tr>
                            <td>Mes:</td>
                            <td id="celMesG">--</td>
                        </tr>

                        <tr>
                            <td>Semana:</td>
                            <td id="celSemanaG">--</td>
                        </tr>

                        <tr>
                            <td>Dia:</td>
                            <td id="celDiaG">--</td>
                        </tr>

                        <tr>
                            <td>Bloque horario:</td>
                            <td id="celBloqueG">--</td>
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
                            <td>Hora de finalizacion:</td>
                            <td id="celHora_finalizacionG">--</td>
                        </tr>

                        <tr>
                            <td>Tipo de carga:</td>
                            <td id="celTipo_cargaG">--</td>
                        </tr>

                        <tr>
                            <td>Método de carga:</td>
                            <td id="celMetodo_cargaG">--</td>
                        </tr>

                        <tr>
                            <td>Observación de asignación:</td>
                            <td id="celObservacion_asignacionG">--</td>
                        </tr>

                        <tr>
                            <td>Observacion de ejecucion:</td>
                            <td id="celObservacion_ejecucionG">--</td>
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
<!-- Modal View Reportes Rastras Tarimas-->
<div class="modal fade" id="modalViewReportesR" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celCupo">--</td>
                        </tr>

                        <tr>
                            <td>Año:</td>
                            <td id="celAnio">--</td>
                        </tr>

                        <tr>
                            <td>Mes:</td>
                            <td id="celMes">--</td>
                        </tr>

                        <tr>
                            <td>Semana:</td>
                            <td id="celSemana">--</td>
                        </tr>

                        <tr>
                            <td>Dia:</td>
                            <td id="celDia">--</td>
                        </tr>

                        <tr>
                            <td>Bloque horario:</td>
                            <td id="celBloque">--</td>
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
                            <td>Hora de finalizacion:</td>
                            <td id="celHora_finalizacion">--</td>
                        </tr>

                        <tr>
                            <td>Tipo de carga:</td>
                            <td id="celTipo_carga"></td>
                        </tr>

                        <tr>
                            <td>Método de carga:</td>
                            <td id="celMetodo_carga">--</td>
                        </tr>

                        <tr>
                            <td>Tendidos por tarimas:</td>
                            <td id="celTendidos_tarimas">--</td>
                        </tr>

                        <tr>
                            <td>Capacidad por tarimas:</td>
                            <td id="celCapacidad_tarimas">--</td>
                        </tr>

                        <tr>
                            <td>Cantidad por tarimas:</td>
                            <td id="celCantidad_tarimas">--</td>
                        </tr>

                        <tr>
                            <td>Observación de asignación:</td>
                            <td id="celObservacion_asignacion">--</td>
                        </tr>

                        <tr>
                            <td>Observación de ejecución:</td>
                            <td id="celObservacion_ejecucion">--</td>
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

<!-- Modal View Reportes Camiones Domicilio-->
<div class="modal fade" id="modalViewReportesC" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celRCupoC">--</td>
                        </tr>

                        <tr>
                            <td>Año:</td>
                            <td id="celRAnioC">--</td>
                        </tr>

                        <tr>
                            <td>Mes:</td>
                            <td id="celRMesC">--</td>
                        </tr>

                        <tr>
                            <td>Semana:</td>
                            <td id="celRSemanaC">--</td>
                        </tr>

                        <tr>
                            <td>Día:</td>
                            <td id="celRDiaC">--</td>
                        </tr>

                        <tr>
                            <td>Bloque:</td>
                            <td id="celRBloqueC">--</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celRAsesorC">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celRClienteC">--</td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celREstadoC">--</td>
                        </tr>

                        <tr>
                            <td>Hora asignada:</td>
                            <td id="celRHora_asignadaC">--</td>
                        </tr>

                        <tr>
                            <td>Hora de inicio:</td>
                            <td id="celRHora_inicioC">--</td>
                        </tr>

                        <tr>
                            <td>Hora de finalización:</td>
                            <td id="celRHora_finalizacionC">--</td>
                        </tr>

                        <tr>
                            <td>Flete:</td>
                            <td id="celRFleteC">--</td>
                        </tr>

                        <tr>
                            <td>Quintales:</td>
                            <td id="celRQuintalesC">--</td>
                        </tr>

                        <tr>
                            <td>Receptor:</td>
                            <td id="celRReceptorC">--</td>
                        </tr>

                        <tr>
                            <td>Contacto:</td>
                            <td id="celRContactoC">--</td>
                        </tr>

                        <tr>
                            <td>Departamento:</td>
                            <td id="celRDepartamentoC">--</td>
                        </tr>

                        <tr>
                            <td>Municipio:</td>
                            <td id="celRMunicipioC">--</td>
                        </tr>

                        <tr>
                            <td>Dirección:</td>
                            <td id="celRDireccionC">--</td>
                        </tr>

                        <tr>
                            <td>Observación de asignación:</td>
                            <td id="celRObservacion_asignacionC">--</td>
                        </tr>

                        <tr>
                            <td>Observación de ejecución:</td>
                            <td id="celRObservacion_ejecucionC">--</td>
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

<!-- Modal View Reportes Camiones Transporte Propio-->
<div class="modal fade" id="modalViewReportesCTP" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Id:</td>
                            <td id="celRCupoCTP">--</td>
                        </tr>

                        <tr>
                            <td>Año:</td>
                            <td id="celRAnioCTP">--</td>
                        </tr>

                        <tr>
                            <td>Mes:</td>
                            <td id="celRMesCTP">--</td>
                        </tr>

                        <tr>
                            <td>Semana:</td>
                            <td id="celRSemanaCTP">--</td>
                        </tr>

                        <tr>
                            <td>Día:</td>
                            <td id="celRDiaCTP">--</td>
                        </tr>

                        <tr>
                            <td>Bloque horario:</td>
                            <td id="celRBloqueCTP">--</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celRAsesorCTP">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celRClienteCTP">--</td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celREstadoCTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora asignada:</td>
                            <td id="celRHora_asignadaCTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora de inicio:</td>
                            <td id="celRHora_inicioCTP">--</td>
                        </tr>

                        <tr>
                            <td>Hora de finalización:</td>
                            <td id="celRHora_finalizacionCTP">--</td>
                        </tr>

                        <tr>
                            <td>Observación de asignación:</td>
                            <td id="celRObservacion_asignacionCTP">--</td>
                        </tr>

                        <tr>
                            <td>Observación de ejecución:</td>
                            <td id="celRObservacion_ejecucionCTP">--</td>
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