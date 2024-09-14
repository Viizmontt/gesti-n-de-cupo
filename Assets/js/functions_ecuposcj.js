let tableEcuposcj;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableEcuposcj = $('#tableEcuposcj').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposcj/getEcuposcj/",
            "dataSrc":""
        },
        "columns":[            
            {"data":"id_cupo"},
            { "data": "fecha" },
            {"data":"bloque"},
            {"data":"tipo_logistica"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"nombre_cliente"},
            {"data":"estado"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[1,"asc"]]  
    });

    if(document.querySelector("#formEcuposC")){
        let formAcuposrg = document.querySelector("#formEcuposC");
        formAcuposrg.onsubmit = function(e) {
            e.preventDefault();
            let strtHoraInicioEC = document.querySelector('#txtHoraInicioEC').value;
            if(strtHoraInicioEC == ''){
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ecuposcj/setEcupocj';
            let formData = new FormData(formAcuposrg);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormEcuposC').modal("hide");
                        formAcuposrg.reset();
                        tableEcuposcg = $('#tableEcuposcj').dataTable();
                        tableEcuposcg.api().ajax.reload();
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

    if(document.querySelector("#formEcuposCTP")){
        let formAcuposrg = document.querySelector("#formEcuposCTP");
        formAcuposrg.onsubmit = function(e) {
            e.preventDefault();
            let strtHoraInicioEC = document.querySelector('#txtHoraInicioECTP').value;
            if(strtHoraInicioEC == ''){
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ecuposcj/setEcupocj_TP';
            let formData = new FormData(formAcuposrg);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormEcuposCTP').modal("hide");
                        formAcuposrg.reset();
                        tableEcuposcg = $('#tableEcuposcj').dataTable();
                        tableEcuposcg.api().ajax.reload();
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

function fntEditEcuposcj(idcupo){
    document.querySelector('#numCupoECD').innerHTML = "Ejecución Camiones Cupos N° "+idcupo;
    document.querySelector('#numCupoECTP').innerHTML = "Ejecución Camiones Cupo N° "+idcupo;
    document.querySelector("#idAcuposEC").value = idcupo;
    document.querySelector("#idAcuposECTP").value = idcupo;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposcj/getEcupocj/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                if (objData.data.tipo_logistica == "Domicilio") {
                    document.querySelector("#txtAsesorEC").value = objData.data.nombre_asesor;
                    document.querySelector("#txtClienteEC").value =objData.data.nombre_cliente;
                    document.querySelector("#listMotoristasEC").value = objData.data.motorista;
                    document.querySelector("#listCamionesEC").value = objData.data.camion;
                    document.querySelector("#listEstadoEC").value = objData.data.estado;
                    document.querySelector("#txtHoraInicioEC").value = objData.data.hora_inicio;
                    document.querySelector("#txtHoraFinalEC").value = objData.data.hora_finalizacion;
                    document.querySelector("#txtHoraInicioECE").value = objData.data.hora_entrada;
                    document.querySelector("#txtHoraFinalECS").value = objData.data.hora_salida;
                    $("#modalFormEcuposC").modal("show");
                
                }else if (objData.data.tipo_logistica == "Transporte propio") {
                    document.querySelector("#txtAsesorECTP").value = objData.data.nombre_asesor;
                    document.querySelector("#txtClienteECTP").value =objData.data.nombre_cliente;
                    document.querySelector("#listEstadoECTP").value = objData.data.estado;
                    document.querySelector("#txtHoraInicioECTP").value = objData.data.hora_inicio;
                    document.querySelector("#txtHoraFinalECTP").value = objData.data.hora_finalizacion;
                    document.querySelector("#txtHoraInicioECTPE").value = objData.data.hora_entrada;
                    document.querySelector("#txtHoraFinalECTPS").value = objData.data.hora_salida;
                    $("#modalFormEcuposCTP").modal("show");
                }
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

/* -LLENAR EL COMBOBOX DE LOS MOTORISTAS- */
window.addEventListener('load', function() {
    fntMotoristas();
}, false);

function fntMotoristas(){
    if(document.querySelector('#listMotoristasEC')){ 
        let ajaxUrl = base_url+'/Ecuposcj/getSelectMotoristas';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listMotoristasEC').innerHTML = request.responseText;
                $('#listMotoristasEC').selectpicker('render');                
            }
        }
    }
}

/* -LLENAR EL COMBOBOX DE LOS camioneS- */
window.addEventListener('load', function() {
    fntCamiones();
}, false);

function fntCamiones(){
    if(document.querySelector('#listCamionesEC')){
        let ajaxUrl = base_url+'/Ecuposcj/getSelectCamiones';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listCamionesEC').innerHTML = request.responseText;
                $('#listCamionesEC').selectpicker('render');                
            }
        }
    }
}
/* ver datos */
function fntViewEcuposcj(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposcj/getEcupocj/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                if (objData.data.tipo_logistica == 'Transporte propio') {
                    document.querySelector("#celCupoTP").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesorTP").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celClienteTP").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celLogisticaTP").innerHTML = objData.data.tipo_logistica;
                    document.querySelector("#celEstadoTP").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignadaTP").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicioTP").innerHTML = objData.data.hora_inicio
                    document.querySelector("#celHora_finalizacionTP").innerHTML = objData.data.hora_finalizacion;
                    $('#modalViewEcupoCTP').modal('show');
                }else{
                    document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesor").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celCliente").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celLogistica").innerHTML = objData.data.tipo_logistica;
                    document.querySelector("#celEstado").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicio").innerHTML = objData.data.hora_inicio
                    document.querySelector("#celHora_finalizacion").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celReceptor").innerHTML = objData.data.nombre_receptor;
                    document.querySelector("#celContacto").innerHTML = objData.data.contacto_receptor;
                    document.querySelector("#celDepartamento").innerHTML = objData.data.departamento_receptor;
                    document.querySelector("#celMunicipio").innerHTML = objData.data.municipio_receptor;
                    document.querySelector("#celDireccion").innerHTML = objData.data.direccion_receptor;
                    document.querySelector("#celFlete").innerHTML = objData.data.flete;
                    document.querySelector("#celQuintales").innerHTML = objData.data.quintales;
                    $('#modalViewEcupoC').modal('show');
                }                
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function consultaECJ() {
    let from_date = $('#txt001CJ').val();
    let to_date = $('#txt002CJ').val();
    tableEcuposcj = $('#tableEcuposcj').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Ecuposcj/consultaCJ/",
            method: "POST",
            data: { from_date: from_date, to_date: to_date },
            "dataSrc":""
        },
        "columns": [
            {"data":"id_cupo"},
            {"data":"dia"},
            {"data":"bloque"},
            {"data":"tipo_logistica"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"nombre_cliente"},
            {"data":"estado"},
            {"data":"options"}
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order": [[1, "asc"]]
    });   
}

function fntHoyECJ() {
    tableEcuposcj = $('#tableEcuposcj').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposcj/getEcuposcj/",
            "dataSrc":""
        },
        "columns":[            
            {"data":"id_cupo"},
            {"data":"dia"},
            {"data":"bloque"},
            {"data":"tipo_logistica"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"nombre_cliente"},
            {"data":"estado"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[0,"asc"]]
    });
}

function fntCanEcuposcj(idcupo){
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
            let ajaxUrl = base_url+'/Ecuposcj/cancelarCupocj';
            let strData = "idCupo="+idcupo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        swal("Eliminar!", objData.msg , "success");
                        tableEcuposcj.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}