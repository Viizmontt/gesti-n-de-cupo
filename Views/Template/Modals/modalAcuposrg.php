<?php 
    headerAdmin($data); 
?>
<!-- Modal Add/Eddit-->
<div class="modal fade" id="modalFormAcuposR" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="numCupoAR"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAcuposR" name="formAcuposR" class="form-horizontal" >
                    <input type="hidden" id="idAcuposR" name="idAcuposR">
                    <input type="hidden" id="foto_actual" name="foto_actual" value="">
                    <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                    <input type="hidden" id="txtAsesorARP" name="txtAsesorARP">
                    <input type="hidden" id="txtTiempoARo" name="txtTiempoARo">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="control-label">Asesor </label>
                                <input class="form-control" id="txtAsesorAR" name="txtAsesorAR" disabled="disabled">
                            </div>

                            <div class="form-group">                                
                               <label class="control-label font-weight-bold">Cliente</label>
                                <select class="form-control selectpicker" data-live-search="true" id="listClienteAR" name="listClienteAR" required="">
                                    <option class="font-weight-bold" value="CLIENTE 001">CLIENTE 001</option>
                                    <option class="font-weight-bold" value="CLIENTE 002">CLIENTE 002</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Tipo carga</label>
                                <input class="form-control" id="txtTipoCargaAR" name="txtTipoCargaAR" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Método de carga</label>
                                <select class="form-control selectpicker" id="listMetodoCargaAR" name="listMetodoCargaAR" required="">
                                    <option class="font-weight-bold" value="">Seleccionar campo</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Tendidos por tarimas</label>
                                <select class="form-control font-weight-bold" id="listTendidosTarimaAR" name="listTendidosTarimaAR" required="">
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label font-weight-bold">Capacidad de tarimas </label>
                                <select class="form-control font-weight-bold" id="listCapacidadTarimasAR" name="listCapacidadTarimasAR" required="">
                                    <option class="font-weight-bold" value="">Seleccionar campo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Cantidad de tarimas</label>
                                <input class="form-control font-weight-bold" id="txtCantidadTarimasAR" name="txtCantidadTarimasAR" type="text" placeholder="Cantidad de tarimas" required="">
                            </div>

                            <div class="form-group">

                                <label class="control-label font-weight-bold">Hora</label>
                                
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <select class="form-control font-weight-bold" id="listHoraAR" name="listHoraAR" required="">
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select class="form-control font-weight-bold" id="listMinutosAR" name="listMinutosAR" required="">
                                            <option class="font-weight-bold" value="00">00</option>
                                            <option class="font-weight-bold" value="01">01</option>
                                            <option class="font-weight-bold" value="02">02</option>
                                            <option class="font-weight-bold" value="03">03</option>
                                            <option class="font-weight-bold" value="04">04</option>
                                            <option class="font-weight-bold" value="05">05</option>
                                            <option class="font-weight-bold" value="06">06</option>
                                            <option class="font-weight-bold" value="07">07</option>
                                            <option class="font-weight-bold" value="08">08</option>
                                            <option class="font-weight-bold" value="09">09</option>
                                            <option class="font-weight-bold" value="10">10</option>
                                            <option class="font-weight-bold" value="11">11</option>
                                            <option class="font-weight-bold" value="12">12</option>
                                            <option class="font-weight-bold" value="13">13</option>
                                            <option class="font-weight-bold" value="14">14</option>
                                            <option class="font-weight-bold" value="15">15</option>
                                            <option class="font-weight-bold" value="16">16</option>
                                            <option class="font-weight-bold" value="17">17</option>
                                            <option class="font-weight-bold" value="18">18</option>
                                            <option class="font-weight-bold" value="19">19</option>
                                            <option class="font-weight-bold" value="20">20</option>
                                            <option class="font-weight-bold" value="21">21</option>
                                            <option class="font-weight-bold" value="22">22</option>
                                            <option class="font-weight-bold" value="23">23</option>
                                            <option class="font-weight-bold" value="24">24</option>
                                            <option class="font-weight-bold" value="25">25</option>
                                            <option class="font-weight-bold" value="26">26</option>
                                            <option class="font-weight-bold" value="27">27</option>
                                            <option class="font-weight-bold" value="28">28</option>
                                            <option class="font-weight-bold" value="29">29</option>
                                            <option class="font-weight-bold" value="30">30</option>
                                            <option class="font-weight-bold" value="31">31</option>
                                            <option class="font-weight-bold" value="32">32</option>
                                            <option class="font-weight-bold" value="33">33</option>
                                            <option class="font-weight-bold" value="34">34</option>
                                            <option class="font-weight-bold" value="35">35</option>
                                            <option class="font-weight-bold" value="36">36</option>
                                            <option class="font-weight-bold" value="37">37</option>
                                            <option class="font-weight-bold" value="38">38</option>
                                            <option class="font-weight-bold" value="39">39</option>
                                            <option class="font-weight-bold" value="40">40</option>
                                            <option class="font-weight-bold" value="41">41</option>
                                            <option class="font-weight-bold" value="42">42</option>
                                            <option class="font-weight-bold" value="43">43</option>
                                            <option class="font-weight-bold" value="44">44</option>
                                            <option class="font-weight-bold" value="45">45</option>
                                            <option class="font-weight-bold" value="46">46</option>
                                            <option class="font-weight-bold" value="47">47</option>
                                            <option class="font-weight-bold" value="48">48</option>
                                            <option class="font-weight-bold" value="49">49</option>
                                            <option class="font-weight-bold" value="50">50</option>
                                            <option class="font-weight-bold" value="51">51</option>
                                            <option class="font-weight-bold" value="52">52</option>
                                            <option class="font-weight-bold" value="53">53</option>
                                            <option class="font-weight-bold" value="54">54</option>
                                            <option class="font-weight-bold" value="55">55</option>
                                            <option class="font-weight-bold" value="56">56</option>
                                            <option class="font-weight-bold" value="57">57</option>
                                            <option class="font-weight-bold" value="58">58</option>
                                            <option class="font-weight-bold" value="59">59</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input class="form-control" id="txtTiempoAR" name="txtTiempoAR" disabled="disabled">
                                    </div> 

                                </div>

                            </div>
                        
                        </div>                            

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="control-label font-weight-bold">Estado</label>
                                <select class="form-control selectpicker" id="listEstadoAR" name="listEstadoAR" required="">
                                    <option class="font-weight-bold" value="">Seleccionar campo</option>
                                    <option class="font-weight-bold" value="Libre">Libre</option>
                                    <option class="font-weight-bold" value="Programado">Programado</option>
                                    <option class="font-weight-bold" value="En proceso">En proceso</option>
                                    <option class="font-weight-bold" value="Cancelado">Cancelado</option>
                                </select> 
                            </div>
                            
                            <div class="form-group">
                                <div class="photo">
                                    <label class="font-weight-bold" for="foto">Cotización</label>
                                    <div class="prevPhoto">
                                        <span class="delPhoto notBlock">X</span>
                                        <label for="foto"></label>
                                        <div>
                                            <img id="img" src="<?= media(); ?>/images/uploads/portada_categoria.png">
                                        </div>
                                    </div>
                                    <div class="upimg">
                                        <input type="file" name="foto" id="foto">
                                    </div>
                                    <div id="form_alert"></div>
                                </div>                                                                
                            </div>                        

                            <div class="form-group">
                                <label class="control-label">Observación</label>
                                <textarea class="form-control" id="txtDescripcionAR" name="txtDescripcionAR" rows="5"></textarea>
                            </div>

                        </div>
                    
                    </div>

                    <div class="col-lg-4">
                        <button id="btnActionForm" class="btn btn-info"  type="submit"><i
                            class="fa fa-fw fa-lg fa-check-circle"></i><span
                            id="btnText">Guardar</span>
                        </button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar
                        </button>
                    </div>

                    <br>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal View-->
<div class="modal fade" id="modalViewAcupoR" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                            <td id="celCupo">--</td>
                        </tr>

                        <tr>
                            <td>Asesor:</td>
                            <td id="celAsesor">--</td>
                        </tr>

                        <tr>
                            <td>Hora asignada:</td>
                            <td id="celHora_asignada">--</td>
                        </tr>

                        <tr>
                            <td>Tipo de carga:</td>
                            <td id="celTipo_carga">--/td>
                        </tr>

                        <tr>
                            <td>Método de carga:</td>
                            <td id="celMetodo_carga">--</td>
                        </tr>

                        <tr>
                            <td>Cliente:</td>
                            <td id="celCliente">--</td>
                        </tr>

                        <tr>
                            <td>Cotización:</td>
                            <td id="imgCotizacion">--</td>
                        </tr>

                        <tr>
                            <td>Tendidos por tarimas:</td>
                            <td id="celTendidos_tarima">--</td>
                        </tr>

                        <tr>
                            <td>Capacidad por tarimas:</td>
                            <td id="celCapacidad_tarima">--</td>
                        </tr>

                        <tr>
                            <td>Cantidad por tarimas:</td>
                            <td id="celCantidad_tarima">--</td>
                        </tr>

                        <tr>
                            <td>Observación:</td>
                            <td id="celObservacion">--</td>
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

<script>

    let tipo = ["Tarima", "Granel"];
    let otra = ["14", "16", "18", "20", "22", "24"];
    let tendidos = ["6", "7"];
    let granel = ["0"];
    let listMetodoCarga = document.getElementById("listMetodoCargaAR");
    let listTarimas = document.getElementById("listCapacidadTarimasAR");
    let listTendidos = document.getElementById("listTendidosTarimaAR");

    
    function RecorrerTendidos(combobox, valores) {
        listTendidos.innerHTML = "";
        for (let index of valores) {
            combobox.innerHTML += `<option value="${index}">${index}</option>`;
        }
    }
    

    function Recorrer(combobox, valores) {
        listTarimas.innerHTML = "";
        for (let index of valores) {
            combobox.innerHTML += `<option class="font-weight-bold" value="${index}">${index}</option>`;
        }
    }
    
    function llenarDepar() {
        Recorrer(listMetodoCarga, tipo);
    }

    llenarDepar();

    listMetodoCarga.addEventListener("change", (e) => {
        let dato = e.target.value;
        
        switch (dato) {
            case "Granel":
                Recorrer(listTarimas, granel.slice());
                RecorrerTendidos(listTendidos, granel.slice());
                document.querySelector("#txtCantidadTarimasAR").value = 0;
                document.querySelector("#txtCantidadTarimasAR").disabled = true;
            break;
            case "Tarima":
                Recorrer(listTarimas, otra.slice());
                RecorrerTendidos(listTendidos, tendidos.slice());
                document.querySelector("#txtCantidadTarimasAR").disabled = false;
            break;
            
            default:
            break;
        }
    });


</script>