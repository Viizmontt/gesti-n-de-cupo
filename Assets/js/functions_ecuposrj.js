let tableEcuposrj;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableEcuposrj = $('#tableEcuposrj').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposrj/getEcuposrj/",
            "dataSrc":""
        },
        "columns": [
            { "data": "id_cupo" },
            { "data": "fecha" },
            { "data": "bloque" },
            { "data": "hora_asignada"},
            { "data": "hora_inicio"},
            { "data": "hora_finalizacion"},
            { "data": "tipo_carga"},
            { "data": "metodo_carga" },
            { "data": "nombre_cliente" },
            { "data": "estado" },
            { "data": "options" }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[1,"asc"]]
    });    
  
    if(document.querySelector("#formEcuposR")){
        let formAcuposrg = document.querySelector("#formEcuposR");
        formAcuposrg.onsubmit = function(e) {
            e.preventDefault();
            let strHoraFinalEC = document.querySelector('#txtHoraFinalER').value;
            let strtHoraInicioEC = document.querySelector('#txtHoraInicioER').value;
            if(strtHoraInicioEC == '' || strHoraFinalEC == ''){
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ecuposrj/setEcuporj';
            let formData = new FormData(formAcuposrg);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormEcuposR').modal("hide");
                        formAcuposrg.reset();
                        tableEcuposrj = $('#tableEcuposrj').dataTable();
                        tableEcuposrj.api().ajax.reload();
                        swal("Cupo", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    if(document.querySelector("#formEcuposRG")){
        let formAcuposrgg = document.querySelector("#formEcuposRG");
        formAcuposrgg.onsubmit = function(e) {
            e.preventDefault();
            let strHoraInicioEC = document.querySelector('#txtHoraFinalERG').value;
            if(strHoraInicioEC == ''){
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ecuposrj/setEcuporjg';
            let formData = new FormData(formAcuposrgg);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormEcuposRG').modal("hide");
                        formAcuposrj.reset();
                        tableEcuposrj = $('#tableEcuposrj').dataTable();
                        tableEcuposrj.api().ajax.reload();
                        swal("Cupo", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
  
}, false);

function fntEditEcuposrj(idcupo){
    document.querySelector('#numCupoECG').innerHTML = "Ejecución Rastras Cupos N° "+idcupo;
    document.querySelector('#numCupoECT').innerHTML = "Ejecución Rastras Cupo N° "+idcupo;
    document.querySelector("#idEcuposR").value = idcupo;
    document.querySelector("#idEcuposRG").value = idcupo;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposrj/getEcuporj/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                if (objData.data.metodo_carga == "Granel") {
                    document.querySelector("#txtAsesorERG").value = objData.data.nombre_asesor;
                    document.querySelector("#txtClienteERG").value = objData.data.nombre_cliente;
                    document.querySelector("#listEstadoERG").value = objData.data.estado;
                    document.querySelector("#txtHoraInicioERGE").value = objData.data.hora_entrada;
                    document.querySelector("#txtHoraInicioERG").value = objData.data.hora_inicio;
                    document.querySelector("#txtHoraFinalERG").value = objData.data.hora_finalizacion;
                    document.querySelector("#txtHoraFinalERGS").value = objData.data.hora_salida;
                    $("#modalFormEcupoRG").modal("show");
                } else {
                    document.querySelector("#txtAsesorER").value = objData.data.nombre_asesor;
                    document.querySelector("#txtClienteER").value = objData.data.nombre_cliente;
                    document.querySelector("#listTendidosTarimaER").value = objData.data.tendidos_tarimas;
                    document.querySelector("#listCapacidadTarimasER").value = objData.data.capacidad_tarimas;
                    document.querySelector("#txtCantidadTarimasER").value = objData.data.cantidad_tarimas;
                    document.querySelector("#listEstadoER").value = objData.data.estado;
                    document.querySelector("#txtHoraInicioERE").value = objData.data.hora_entrada;
                    document.querySelector("#txtHoraInicioER").value = objData.data.hora_inicio;
                    document.querySelector("#txtHoraFinalER").value = objData.data.hora_finalizacion;
                    document.querySelector("#txtHoraFinalERS").value = objData.data.hora_salida;
                    $("#modalFormEcupoR").modal("show");
                }
            } else {
                swal("Error", objData.msg , "error");
            }
        }
    }    
}

/* ver datos */
function fntViewEcuposrj(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposrj/getEcuporj/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                if (objData.data.metodo_carga == "Granel") {
                    document.querySelector("#celCupoG").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesorG").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celClienteG").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celEstadoG").innerHTML = objData.data.estado;
                    document.querySelector("#celTipo_cargaG").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celHora_asignadaG").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicioG").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celHora_finalizacionG").innerHTML = objData.data.hora_finalizacion;
                    $('#modalViewEcupoRG').modal('show');
                }else{
                    document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesor").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celCliente").innerHTML = objData.data.nombre_cliente;
                    document.querySelector("#celEstado").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicio").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celHora_finalizacion").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celTipo_carga").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celTendidos_tarimas").innerHTML = objData.data.tendidos_tarimas;
                    document.querySelector("#celCapacidad_tarimas").innerHTML = objData.data.capacidad_tarimas;
                    document.querySelector("#celCantidad_tarimas").innerHTML = objData.data.cantidad_tarimas;
                    $('#modalViewEcupoR').modal('show');
                }
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

/* consulta de cupos por rango de fechas */
function consultaERJ() {
    let from_date2 = $('#txt001RJ').val();
    let to_date2 = $('#txt002RJ').val();
    tableEcuposrj = $('#tableEcuposrj').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Ecuposrj/consultaRJ/",
            method: "POST",
            data: { from_date2: from_date2, to_date2: to_date2 },
            "dataSrc":""
        },
        "columns": [
            { "data": "id_cupo" },
            { "data": "dia" },
            { "data": "bloque" },
            { "data": "hora_asignada"},
            { "data": "hora_inicio"},
            { "data": "hora_finalizacion"},
            { "data": "tipo_carga"},
            { "data": "metodo_carga" },
            { "data": "nombre_cliente" },
            { "data": "estado" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order": [[1, "asc"]]
    });   
}

function fntHoyERJ() {
    tableEcuposrj = $('#tableEcuposrj').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposrj/getEcuposrj/",
            "dataSrc":""
        },
        "columns":[            
            {"data": "id_cupo"},
            {"data": "dia"},
            {"data": "bloque"},
            {"data": "hora_asignada"},
            {"data": "hora_inicio"},
            {"data": "hora_finalizacion"},
            {"data": "tipo_carga"},
            {"data": "metodo_carga"},
            {"data": "nombre_cliente"},
            {"data": "estado"},
            {"data": "options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[0,"asc"]]
    });
}

function fntCanEcuposrj(idcupo){
    swal({
        title: "Cancelar cupo",
        text: "¿Realmente quiere cancelar el cupo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Cancelar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ecuposrj/cancelarCuporj';
            let strData = "idCupo="+idcupo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        swal("Eliminar!", objData.msg , "success");
                        tableEcuposrj.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}