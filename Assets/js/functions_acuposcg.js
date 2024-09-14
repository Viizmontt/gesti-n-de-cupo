let tableProductosC;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    if(document.querySelector("#foto")){
	    let foto = document.querySelector("#foto");
	    foto.onchange = function(e) {
	        let uploadFoto = document.querySelector("#foto").value;
	        let nav = window.URL || window.webkitURL;
	        let contactAlert = document.querySelector('#form_alert');
	        if(uploadFoto !=''){
	            contactAlert.innerHTML='';
	            if(document.querySelector('#img')){
	                document.querySelector('#img').remove();
	            }
	            document.querySelector('.delPhoto').classList.remove("notBlock");
                let objeto_url = nav.createObjectURL(this.files[0]);
                document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
	        }else{
	            alert("No selecciono la cotizacion");
	            if(document.querySelector('#img')){
	                document.querySelector('#img').remove();
	            }
	        }
	    }
	}

    if(document.querySelector(".delPhoto")){
	    let delPhoto = document.querySelector(".delPhoto");
	    delPhoto.onclick = function(e) {
            document.querySelector("#foto_remove").value= 1;
	        removePhoto();
	    }
	}

    /* -MODIFICAR LOS DATOS DEL CUPO X CAMIONES GUAZAPA- */
    let formAcuposC = document.querySelector("#formAcuposC");
    formAcuposC.onsubmit = function(e) {
        e.preventDefault();
        let strPDF = document.querySelector('#foto').value;
        if(strPDF == ''){
            swal("Atención", "Todos los campos son obligatorios, incluyendo cotización." , "error");
            return false;            
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Acuposcg/setAcupocg';
        let formData = new FormData(formAcuposC);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $('#modalFormAcuposC').modal("hide");
                    formAcuposC.reset();
                    swal("Cupo", objData.msg ,"success");
                    removePhoto();
                    location.reload(); 
                }else{
                    swal("Error", objData.msg , "error");
                }
            }
            divLoading.style.display = "none";
            return false;
        }
    }

}, false);

/* mostrar formulario con los datos del cupo sus productos camiones guazapa*/
function fntEditAcuposcg(id) {
    document.querySelector('#numCupoAC').innerHTML = "Asignación Camiones Cupo N° "+id;
    document.querySelector("#idAcuposC").value = id;
    let idcupo = id;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Acuposcg/getAcupocg/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                let tipo = 0;
                let bloque = objData.data.bloque;
                if (bloque == 1) {
                    tipo = ["06", "07", "08"];
                    document.querySelector("#txtTiempoAC").value = "AM";
                } else if (bloque == 2) {
                    tipo = ["09", "10", "11"];
                    document.querySelector("#txtTiempoAC").value = "AM";
                } else if (bloque == 3) {
                    tipo = ["12", "01", "02"];
                    document.querySelector("#txtTiempoAC").value = "PM";
                    document.querySelector("#txtTiempoACo").value = "PM";
                } else if (bloque == 4) {
                    tipo = ["03", "04", "05"];
                    document.querySelector("#txtTiempoAC").value = "PM";
                    document.querySelector("#txtTiempoACo").value = "PM";
                } else if (bloque == 5) {
                    tipo = ["06", "07", "08"];
                    document.querySelector("#txtTiempoAC").value = "PM";
                    document.querySelector("#txtTiempoACo").value = "PM";
                }
                let listHora = document.getElementById("listHoraAC");
                function RecorrerHora(combobox, valores) {
                    listHora.innerHTML = "";
                    for (let index of valores) {
                        combobox.innerHTML += `<option class="font-weight-bold" value="${index}">${index}</option>`;
                    }
                }
                function llenarHora() {
                    RecorrerHora(listHora, tipo);
                }
                llenarHora();
                document.querySelector("#listClienteAC").value = objData.data.nombre_cliente;
                document.querySelector("#listTipoLogisticaAC").value = objData.data.tipo_logistica;
                document.querySelector("#listEstadoAC").value = objData.data.estado;
                document.querySelector("#txtObservacionAC").value = objData.data.observacion_asignacion;
                document.querySelector("#txtFleteAC").value = objData.data.flete;
                document.querySelector("#txtQuintalesAC").value = objData.data.quintales;

                document.querySelector("#txtAsesorAC").value = objData.data.nombre_asesor;
                document.querySelector("#txtAsesorACP").value = objData.data.nombre_asesor;

                $('#listClienteAC').selectpicker('render');
                $('#listEstadoAC').selectpicker('render');
                $('#listTipoLogisticaAC').selectpicker('render');
                
                document.querySelector('#foto_actual').value = objData.data.cotizacion;
                document.querySelector("#foto_remove").value= 0;
                if(document.querySelector('#img')){
                    document.querySelector('#img').src = 'portada_categoria.png';
                }else{
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+'portada_categoria.png'+">";
                }
                if(objData.data.portada == 'portada_categoria.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
    $("#modalFormAcuposC").modal("show");
    document.getElementById('flete').style.display = 'none';
    document.getElementById('domicilio').style.display = 'none';
}

/* -VER LOS DETALLES DEL CUPO- */
function fntViewAcuposcg(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Acuposcg/getAcupocg/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                let objCot = 'Assets/cotizacion/camiones/'+objData.data.cotizacion;
                document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                document.querySelector("#celAsesor").innerHTML = objData.data.nombre_asesor;
                document.querySelector("#celCliente").innerHTML = objData.data.nombre_cliente; 
                document.querySelector("#celEstado").innerHTML = objData.data.estado;
                document.querySelector("#celLogistica").innerHTML = objData.data.tipo_logistica;
                document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                if (objData.data.cotizacion=='portada_categoria.png') {
                    document.querySelector("#imgCotizacion").innerHTML = '<p class="badge badge-success" target="_blank">Cotización no disponible</p>';
                }else{
                    document.querySelector("#imgCotizacion").innerHTML = '<a class="badge badge-success" href="'+objCot+'"  target="_blank">Cotización</a>';
                }
                $('#modalViewAcupoC').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

/* -REMOVER LA COTIZACION DEL GRUPO- */
function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}

/* --------------------------------------------------------------------------------------- */
window.addEventListener('load', function() {
    client();
}, false);

function client(){
    if(document.querySelector('#listCliente')){
        let ajaxUrl = base_url+'/Acuposcg/clientes';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listCliente').innerHTML = request.responseText;
                $('#listCliente').selectpicker('render');
            }
        }
    }
}