<?php 
    headerAdmin($data);
    getModal('modalEcuposcg',$data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><?= $data['page_title'] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group col m-6">
                                    <label>Inicio</label>
                                    <input type="date" class="form-control" id="txt001CG" name="txt001CG" required="">
                                </div>

                                <div class="form-group col m-6">
                                    <label>Fin</label>
                                    <input type="date" class="form-control" id="txt002CG" name="txt002CG" required="">
                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="consultaECG()">Generar</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onClick="fntHoyECG()">Hoy</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableEcuposcg">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Bloque Horario</th>
                                    <th>Hora Asignada</th>
                                    <th>Hora de Inicio</th>
                                    <th>Hora de finalización</th>
                                    <th>Tipo Logística</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
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