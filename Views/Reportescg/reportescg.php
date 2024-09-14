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
                                    <input type="date" class="form-control" id="txt001CGR" name="txt001CGR" required="">
                                </div>

                                <div class="form-group col m-6">
                                    <label>Fin</label>
                                    <input type="date" class="form-control" id="txt002CGR" name="txt002CGR" required="">
                                </div>

                            </div>

                            <br>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="consultaCGR()">Generar</button>
                                </div>

                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="fntHoyCGR()">Hoy</button>
                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-warning btn-sm btn-block" onClick="reporte001CG(3)"><i class="fa fa-file"></i> Generar Reporte</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableReportesCG">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Bloque horario</th>
                                    <th>Hora asignada</th>
                                    <th>Hora entrada</th>
                                    <th>Hora salida</th>
                                    <th>Cliente</th>
                                    <th>Asesor</th>
                                    <th>Tipo logística</th>
                                    <th>Estado</th>
                                    <th>Quintales</th>
                                    <th>Flete</th>
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