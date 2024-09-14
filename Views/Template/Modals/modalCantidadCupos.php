<!-- Modal -->
<div class="modal fade" id="modalFormCantidadCupos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Actualizar cantidad de cupos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" id="formCantidadCupos" name="formCantidadCupos" class="form-horizontal">
              <input type="hidden" id="cantidad_cupos_Id" name="cantidad_cupos_Id" value="">
              <p class="text-primary">Lunes.</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="lunes_bloque_I">6:00am a 9:00am <span class="required"></span></label>
                  <input type="num" class="form-control valid validNumber" pattern="[0-9]{1,1}" maxlength="1" id="lunes_bloque_I" name="lunes_bloque_I" required="">
                  <input type="hidden" class="form-control" id="lunes_bloque_Idb" name="lunes_bloque_Idb">
                </div>
                <div class="form-group col-md-2">
                  <label for="lunes_bloque_II">9:00am a 12:00md <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="lunes_bloque_II" name="lunes_bloque_II" required="">
                  <input type="hidden" class="form-control" id="lunes_bloque_IIdb" name="lunes_bloque_IIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="lunes_bloque_III">12:00md a 3:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="lunes_bloque_III" name="lunes_bloque_III" required="">
                  <input type="hidden" class="form-control" id="lunes_bloque_IIIdb" name="lunes_bloque_IIIdb">
                </div> 
                <div class="form-group col-md-2">
                  <label for="lunes_bloque_IV">3:00pm a 6:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="lunes_bloque_IV" name="lunes_bloque_IV" required="">
                  <input type="hidden" class="form-control" id="lunes_bloque_IVdb" name="lunes_bloque_IVdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="lunes_bloque_V">6:00pm a 9:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="lunes_bloque_V" name="lunes_bloque_V" required="">
                  <input type="hidden" class="form-control" id="lunes_bloque_Vdb" name="lunes_bloque_Vdb">
                </div>
              </div>
              <hr>
              <p class="text-primary">Martes.</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="martes_bloque_I">6:00am a 9:00am <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="martes_bloque_I" name="martes_bloque_I" required="">
                  <input type="hidden" class="form-control" id="martes_bloque_Idb" name="martes_bloque_Idb">
                </div>
                <div class="form-group col-md-2">
                  <label for="martes_bloque_II">9:00am a 12:00md <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="martes_bloque_II" name="martes_bloque_II" required="">
                  <input type="hidden" class="form-control" id="martes_bloque_IIdb" name="martes_bloque_IIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="martes_bloque_III">12:00md a 3:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="martes_bloque_III" name="martes_bloque_III" required="">
                  <input type="hidden" class="form-control" id="martes_bloque_IIIdb" name="martes_bloque_IIIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="martes_bloque_IV">3:00pm a 6:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="martes_bloque_IV" name="martes_bloque_IV" required="">
                  <input type="hidden" class="form-control" id="martes_bloque_IVdb" name="martes_bloque_IVdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="martes_bloque_V">6:00pm a 9:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="martes_bloque_V" name="martes_bloque_V" required="">
                  <input type="hidden" class="form-control" id="martes_bloque_Vdb" name="martes_bloque_Vdb">
                </div>
              </div>
              <hr>
              <p class="text-primary">Miércoles.</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="miercoles_bloque_I">6:00am a 9:00am <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="miercoles_bloque_I" name="miercoles_bloque_I" required="">
                  <input type="hidden" class="form-control" id="miercoles_bloque_Idb" name="miercoles_bloque_Idb">
                </div>
                <div class="form-group col-md-2">
                  <label for="miercoles_bloque_II">9:00am a 12:00md <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="miercoles_bloque_II" name="miercoles_bloque_II" required="">
                  <input type="hidden" class="form-control" id="miercoles_bloque_IIdb" name="miercoles_bloque_IIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="miercoles_bloque_III">12:00md a 3:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="miercoles_bloque_III" name="miercoles_bloque_III" required="">
                  <input type="hidden" class="form-control" id="miercoles_bloque_IIIdb" name="miercoles_bloque_IIIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="miercoles_bloque_IV">3:00pm a 6:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="miercoles_bloque_IV" name="miercoles_bloque_IV" required="">
                  <input type="hidden" class="form-control" id="miercoles_bloque_IVdb" name="miercoles_bloque_IVdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="miercoles_bloque_V">6:00pm a 9:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="miercoles_bloque_V" name="miercoles_bloque_V" required="">
                  <input type="hidden" class="form-control" id="miercoles_bloque_Vdb" name="miercoles_bloque_Vdb">
                </div>
              </div>
              <hr>
              <p class="text-primary">Jueves.</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="jueves_bloque_I">6:00am a 9:00am <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="jueves_bloque_I" name="jueves_bloque_I" required="">
                  <input type="hidden" class="form-control" id="jueves_bloque_Idb" name="jueves_bloque_Idb">
                </div>
                <div class="form-group col-md-2">
                  <label for="jueves_bloque_II">9:00am a 12:00md <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="jueves_bloque_II" name="jueves_bloque_II" required="">
                  <input type="hidden" class="form-control" id="jueves_bloque_IIdb" name="jueves_bloque_IIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="jueves_bloque_III">12:00md a 3:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="jueves_bloque_III" name="jueves_bloque_III" required="">
                  <input type="hidden" class="form-control" id="jueves_bloque_IIIdb" name="jueves_bloque_IIIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="jueves_bloque_IV">3:00pm a 6:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="jueves_bloque_IV" name="jueves_bloque_IV" required="">
                  <input type="hidden" class="form-control" id="jueves_bloque_IVdb" name="jueves_bloque_IVdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="jueves_bloque_V">6:00pm a 9:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="jueves_bloque_V" name="jueves_bloque_V" required="">
                  <input type="hidden" class="form-control" id="jueves_bloque_Vdb" name="jueves_bloque_Vdb">
                </div>
              </div>
              <hr>
              <p class="text-primary">Viernes.</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="viernes_bloque_I">6:00am a 9:00am <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="viernes_bloque_I" name="viernes_bloque_I" required="">
                  <input type="hidden" class="form-control" id="viernes_bloque_Idb" name="viernes_bloque_Idb">
                </div>
                <div class="form-group col-md-2">
                  <label for="viernes_bloque_II">9:00am a 12:00md <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="viernes_bloque_II" name="viernes_bloque_II" required="">
                  <input type="hidden" class="form-control" id="viernes_bloque_IIdb" name="viernes_bloque_IIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="viernes_bloque_III">12:00md a 3:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="viernes_bloque_III" name="viernes_bloque_III" required="">
                  <input type="hidden" class="form-control" id="viernes_bloque_IIIdb" name="viernes_bloque_IIIdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="viernes_bloque_IV">3:00pm a 6:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="viernes_bloque_IV" name="viernes_bloque_IV" required="">
                  <input type="hidden" class="form-control" id="viernes_bloque_IVdb" name="viernes_bloque_IVdb">
                </div>
                <div class="form-group col-md-2">
                  <label for="viernes_bloque_V">6:00pm a 9:00pm <span class="required"></span></label>
                  <input type="num" class="form-control" pattern="[0-9]{1,1}" maxlength="1" id="viernes_bloque_V" name="viernes_bloque_V" required="">
                  <input type="hidden" class="form-control" id="viernes_bloque_Vdb" name="viernes_bloque_Vdb">
                </div>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewCantidadCupos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos cantidad de cupos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>                          
            <tr>
              <td>Codigo:</td>
              <td id="celCodigo">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>            
          </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
          <tbody>            
              <p class="text-primary">Lunes.</p>
            <tr>
              <td>6:00:am a 9:00:am</td>
              <td id="celLunes_Bloque_I">Larry</td>
            </tr>
            <tr>
              <td>9:00:am a 12:00:md:</td>
              <td id="celLunes_Bloque_II">Jacob</td>
            </tr>
            <tr>
              <td>12:00:md a 3:00:pm</td>
              <td id="celLunes_Bloque_III">Larry</td>
            </tr>
            <tr>
              <td>3:00:pm a 6:00:pm</td>
              <td id="celLunes_Bloque_IV">Larry</td>
            </tr>
            <tr>
              <td>6:00:pm a 9:00:pm</td>
              <td id="celLunes_Bloque_V">Larry</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
          <tbody>            
              <p class="text-primary">Martes.</p>
            <tr>
              <td>6:00:am a 9:00:am</td>
              <td id="celMartes_Bloque_I">Larry</td>
            </tr>
            <tr>
              <td>9:00:am a 12:00:md</td>
              <td id="celMartes_Bloque_II">Jacob</td>
            </tr>
            <tr>
              <td>12:00:md a 3:00:pm</td>
              <td id="celMartes_Bloque_III">Larry</td>
            </tr>
            <tr>
              <td>3:00:pm a 6:00:pm</td>
              <td id="celMartes_Bloque_IV">Larry</td>
            </tr>
            <tr>
              <td>6:00:pm a 9:00:pm</td>
              <td id="celMartes_Bloque_V">Larry</td>
            </tr>                      
          </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
          <tbody>            
              <p class="text-primary">Miércoles.</p>
            <tr>
              <td>6:00:am a 9:00:am</td>
              <td id="celMiercoles_Bloque_I">Larry</td>
            </tr>
            <tr>
              <td>9:00:am a 12:00:md</td>
              <td id="celMiercoles_Bloque_II">Jacob</td>
            </tr>
            <tr>
              <td>12:00:md a 3:00:pm</td>
              <td id="celMiercoles_Bloque_III">Larry</td>
            </tr>
            <tr>
              <td>3:00:pm a 6:00:pm</td>
              <td id="celMiercoles_Bloque_IV">Larry</td>
            </tr>
            <tr>
              <td>6:00:pm a 9:00:pm</td>
              <td id="celMiercoles_Bloque_V">Larry</td>
            </tr>                      
          </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
          <tbody>            
              <p class="text-primary">Jueves.</p>
            <tr>
              <td>6:00:am a 9:00:am</td>
              <td id="celJueves_Bloque_I">Larry</td>
            </tr>
            <tr>
              <td>9:00:am a 12:00:md</td>
              <td id="celJueves_Bloque_II">Jacob</td>
            </tr>
            <tr>
              <td>12:00:md a 3:00:pm</td>
              <td id="celJueves_Bloque_III">Larry</td>
            </tr>
            <tr>
              <td>3:00:pm a 6:00:pm</td>
              <td id="celJueves_Bloque_IV">Larry</td>
            </tr>
            <tr>
              <td>6:00:pm a 9:00:pm</td>
              <td id="celJueves_Bloque_V">Larry</td>
            </tr>                      
          </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
          <tbody>            
              <p class="text-primary">Viernes.</p>
            <tr>
              <td>6:00:am a 9:00:am</td>
              <td id="celViernes_Bloque_I">Larry</td>
            </tr>
            <tr>
              <td>9:00:am a 12:00:md</td>
              <td id="celViernes_Bloque_II">Jacob</td>
            </tr>
            <tr>
              <td>12:00:md a 3:00:pm</td>
              <td id="celViernes_Bloque_III">Larry</td>
            </tr>
            <tr>
              <td>3:00:pm a 6:00:pm</td>
              <td id="celViernes_Bloque_IV">Larry</td>
            </tr>
            <tr>
              <td>6:00:pm a 9:00:pm</td>
              <td id="celViernes_Bloque_V">Larry</td>
            </tr>                      
          </tbody>
        </table>
        <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>