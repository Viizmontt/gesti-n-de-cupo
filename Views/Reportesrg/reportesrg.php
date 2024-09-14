<?php 
    headerAdmin($data);
    getModal('modalReportes',$data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><?= $data['page_title'] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group col m-6">
                                    <label>Inicio</label>
                                    <input type="date" class="form-control" id="txt001RGR" name="txt001RGR" required="" value="">
                                </div>

                                <div class="form-group col m-6">
                                    <label>Fin</label>
                                    <input type="date" class="form-control" id="txt002RGR" name="txt002RGR" required="">
                                </div>

                            </div>

                            <br>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="consultaRGR()">Generar</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="fntHoyRGR()">Hoy</button>
                                </div>
                                
                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-warning btn-sm btn-block" onClick="reporte001RG(3)"><i class="fa fa-file"></i> Generar Reporte</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableReportesRG">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Bloque horario</th>
                                    <th>Hora asignada</th>
                                    <th>Hora de entrada</th>
                                    <th>Hora de salida</th>
                                    <th>Cliente</th>
                                    <th>Asesor</th>
                                    <th>Tipo de Carga</th>
                                    <th>Método de Carga</th>
                                    <th>Estado</th>
                                    <th>Observación de asignación</th>
                                    <th>Observación de ejecución</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php footerAdmin($data); ?>