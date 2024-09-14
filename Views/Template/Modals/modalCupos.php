<!-- Modal -->
<div class="modal fade" id="modalFormCupos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal"><span id="btnText"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="formCupos" name="formCupos" class="form-horizontal">
          <input type="hidden" id="cantidad_cupos_Id" name="cantidad_cupos_Id" value="">
          <p>¿DESEA CREAR NUEVOS CUPOS, PARA LA SIGUIENTE SEMANA?</p>
          <p class="text-secondary">Antes de realizar la acción debe tener los cupos asignados en el módulo “cantidad de cupos”.</p>
          
          <div class="form-row">

            <input type="hidden" class="form-control" id="lunes_bloque_I" name="lunes_bloque_I">
            <input type="hidden" class="form-control" id="lunes_bloque_II" name="lunes_bloque_II">
            <input type="hidden" class="form-control" id="lunes_bloque_III" name="lunes_bloque_III">
            <input type="hidden" class="form-control" id="lunes_bloque_IV" name="lunes_bloque_IV">
            <input type="hidden" class="form-control" id="lunes_bloque_V" name="lunes_bloque_V">

            <input type="hidden" class="form-control" id="martes_bloque_I" name="martes_bloque_I">
            <input type="hidden" class="form-control" id="martes_bloque_II" name="martes_bloque_II">
            <input type="hidden" class="form-control" id="martes_bloque_III" name="martes_bloque_III">
            <input type="hidden" class="form-control" id="martes_bloque_IV" name="martes_bloque_IV">
            <input type="hidden" class="form-control" id="martes_bloque_V" name="martes_bloque_V">

            <input type="hidden" class="form-control" id="miercoles_bloque_I" name="miercoles_bloque_I">
            <input type="hidden" class="form-control" id="miercoles_bloque_II" name="miercoles_bloque_II">
            <input type="hidden" class="form-control" id="miercoles_bloque_III" name="miercoles_bloque_III">
            <input type="hidden" class="form-control" id="miercoles_bloque_IV" name="miercoles_bloque_IV">
            <input type="hidden" class="form-control" id="miercoles_bloque_V" name="miercoles_bloque_V">

            <input type="hidden" class="form-control" id="jueves_bloque_I" name="jueves_bloque_I">
            <input type="hidden" class="form-control" id="jueves_bloque_II" name="jueves_bloque_II">
            <input type="hidden" class="form-control" id="jueves_bloque_III" name="jueves_bloque_III">
            <input type="hidden" class="form-control" id="jueves_bloque_IV" name="jueves_bloque_IV">
            <input type="hidden" class="form-control" id="jueves_bloque_V" name="jueves_bloque_V">

            <input type="hidden" class="form-control" id="viernes_bloque_I" name="viernes_bloque_I">
            <input type="hidden" class="form-control" id="viernes_bloque_II" name="viernes_bloque_II">
            <input type="hidden" class="form-control" id="viernes_bloque_III" name="viernes_bloque_III">
            <input type="hidden" class="form-control" id="viernes_bloque_IV" name="viernes_bloque_IV">
            <input type="hidden" class="form-control" id="viernes_bloque_V" name="viernes_bloque_V">
                
          </div>
              
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Crear cupos</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
