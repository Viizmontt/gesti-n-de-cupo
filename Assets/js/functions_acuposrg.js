let tableListar;
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
    
    //CUPO
    let formAcuposR = document.querySelector("#formAcuposR");
    formAcuposR.onsubmit = function(e) {
        e.preventDefault();
        let strCantidadTarimas = document.querySelector('#txtCantidadTarimasAR').value;
        let strPDF = document.querySelector('#foto').value;
        let strtipoCarga = document.querySelector('#listMetodoCargaAR').value;
        
        if (strtipoCarga == 'Granel') {
            if(strPDF == ''){
                swal("Atención", "Todos los campos son obligatorios, incluyendo cotización." , "error");
                return false;
            }
        }else{
            if(strCantidadTarimas == '' || strPDF == ''){
                swal("Atención", "Todos los campos son obligatorios, incluyendo cotización." , "error");
                return false;
            }
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Acuposrg/setAcuporg';
        let formData = new FormData(formAcuposR);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    $('#modalFormAcuposR').modal("hide");
                    formAcuposR.reset();
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

function fntEditAcuposrg(id) {
    document.querySelector('#numCupoAR').innerHTML = "Asignación Rastras Cupo N° "+id;
    document.querySelector("#idAcuposR").value = id;
    let idcupo = id;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Acuposrg/getAcuporg/'+idcupo;
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
                    document.querySelector("#txtTiempoAR").value = "AM";
                } else if (bloque == 2) {
                    tipo = ["09", "10", "11"];
                    document.querySelector("#txtTiempoAR").value = "AM";
                } else if (bloque == 3) {
                    tipo = ["12", "01", "02"];
                    document.querySelector("#txtTiempoAR").value = "PM";
                    document.querySelector("#txtTiempoARo").value = "PM";
                } else if (bloque == 4) {
                    tipo = ["03", "04", "05"];
                    document.querySelector("#txtTiempoAR").value = "PM";
                    document.querySelector("#txtTiempoARo").value = "PM";
                } else if (bloque == 5) {
                    tipo = ["06", "07", "08"];
                    document.querySelector("#txtTiempoAR").value = "PM";
                    document.querySelector("#txtTiempoARo").value = "PM";
                }

                let listHora = document.getElementById("listHoraAR");
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

                document.querySelector("#txtAsesorARP").value = objData.data.nombre_asesor;
                document.querySelector("#txtAsesorAR").value = objData.data.nombre_asesor;

                document.querySelector("#listClienteAR").value =objData.data.nombre_cliente;

                document.querySelector("#txtCantidadTarimasAR").value = objData.data.cantidad_tarimas;
                document.querySelector("#txtTipoCargaAR").value =objData.data.tipo_carga;
                document.querySelector("#listMetodoCargaAR").value =objData.data.metodo_carga;
                document.querySelector("#listTendidosTarimaAR").value =objData.data.tendidos_tarimas;
                document.querySelector("#listCapacidadTarimasAR").value =objData.data.capacidad_tarimas;
                document.querySelector("#listEstadoAR").value =objData.data.nombre_estado;
                
                $('#listClienteAR').selectpicker('render');
                $('#listEstadoAR').selectpicker('render');
                $('#listTipoCargaAR').selectpicker('render');
                $('#listMetodoCargaAR').selectpicker('render');


                document.querySelector('#foto_actual').value = objData.data.cotizacion;
                if(objData.data.cotizacion != 'portada_categoria.png'){
                    document.querySelector('#img').value = objData.data.cotizacion;
                }
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
    $("#modalFormAcuposR").modal("show");
}

function fntViewAcuposrg(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Acuposrg/getAcuporg/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                let objCot = 'Assets/cotizacion/rastras/'+objData.data.cotizacion;
                document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                document.querySelector("#celAsesor").innerHTML = objData.data.nombre_cliente;
                document.querySelector("#celCliente").innerHTML = objData.data.nombre_asesor;
                document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                document.querySelector("#celTipo_carga").innerHTML = objData.data.tipo_carga;
                document.querySelector("#celMetodo_carga").innerHTML = objData.data.metodo_carga;
                if (objData.data.cotizacion=='portada_categoria.png') {
                    document.querySelector("#imgCotizacion").innerHTML = '<p class="badge badge-success" target="_blank">Cotización no disponible</p>';
                }else{
                    document.querySelector("#imgCotizacion").innerHTML = '<a class="badge badge-success" href="'+objCot+'"  target="_blank">Cotización</a>';
                }
                document.querySelector("#celTendidos_tarima").innerHTML = objData.data.tendidos_tarimas;
                document.querySelector("#celCapacidad_tarima").innerHTML = objData.data.capacidad_tarimas;
                document.querySelector("#celCantidad_tarima").innerHTML = objData.data.cantidad_tarimas;
                document.querySelector("#celObservacion").innerHTML = objData.data.observacion_cupo;
                $('#modalViewAcupoR').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    } 
}

function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}