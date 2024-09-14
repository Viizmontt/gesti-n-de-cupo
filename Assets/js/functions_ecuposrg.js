let tableEcuposrg;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {   

    tableEcuposrg = $('#tableEcuposrg').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposrg/getEcuposrg/",
            "dataSrc":""
        },
        "columns":[            
            {"data":"id_cupo"},
            { "data": "fecha" },
            {"data":"bloque"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"tipo_carga"},
            {"data":"metodo_carga"},
            {"data":"nombre_cliente"},
            {"data":"estado"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[1,"asc"]]
    }); 

    if (document.querySelector("#formEcuposR")) {
        let formAcuposrg = document.querySelector("#formEcuposR");
        formAcuposrg.onsubmit = function (e) {
            e.preventDefault();
            let strtHoraInicioEC = document.querySelector('#txtHoraInicioER').value;
            if (strtHoraInicioEC == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Ecuposrg/setEcuporg';
            let formData = new FormData(formAcuposrg);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#modalFormEcupoR').modal("hide");
                        formAcuposrg.reset();
                        tableEcuposrg = $('#tableEcuposrg').dataTable();
                        tableEcuposrg.api().ajax.reload();
                        swal("Cupo", objData.msg, "success");
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    if (document.querySelector("#formEcuposRG")) {
        let formAcuposrgg = document.querySelector("#formEcuposRG");
        formAcuposrgg.onsubmit = function (e) {
            e.preventDefault();
            let strHoraInicioEC = document.querySelector('#txtHoraInicioERG').value;
            if (strHoraInicioEC == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Ecuposrg/setEcuporgg';
            let formData = new FormData(formAcuposrgg);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        $('#modalFormEcupoRG').modal("hide");
                        formAcuposrgg.reset();
                        tableEcuposrgg = $('#tableEcuposrg').dataTable();
                        tableEcuposrgg.api().ajax.reload();
                        swal("Cupo", objData.msg, "success");
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

}, false);

function fntEditEcuposrg(idcupo) {
    document.querySelector('#numCupoECG').innerHTML = "Ejecución Rastras Cupos N° " + idcupo;
    document.querySelector('#numCupoECT').innerHTML = "Ejecución Rastras Cupo N° " + idcupo;
    document.querySelector("#idEcuposR").value = idcupo;
    document.querySelector("#idEcuposRG").value = idcupo;

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Ecuposrg/getEcuporg/' + idcupo;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
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
                swal("Error", objData.msg, "error");
            }
        }
    }
}

/* ver datos */
function fntViewEcuposrg(idcupo) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Ecuposrg/getEcuporg/' + idcupo;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                if (objData.data.metodo_carga == 'Granel') {
                    document.querySelector("#celCupoG").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesorG").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celClienteG").innerHTML = objData.data.nombre_cliente;
                    document.querySelector("#celEstadoG").innerHTML = objData.data.estado;
                    document.querySelector("#celTipo_cargaG").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celHora_asignadaG").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicioG").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celHora_finalizacionG").innerHTML = objData.data.hora_finalizacion;
                    $('#modalViewEcupoRG').modal('show');
                } else {
                    document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAsesor").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celCliente").innerHTML = objData.data.nombre_cliente;
                    document.querySelector("#celEstado").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicio").innerHTML = objData.data.hora_inicio
                    document.querySelector("#celHora_finalizacion").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celTipo_carga").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celTendidos_tarimas").innerHTML = objData.data.tendidos_tarimas;
                    document.querySelector("#celCapacidad_tarimas").innerHTML = objData.data.capacidad_tarimas;
                    document.querySelector("#celCantidad_tarimas").innerHTML = objData.data.cantidad_tarimas;
                    $('#modalViewEcupoR').modal('show');
                }
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function consultaERG() {
    let from_date = $('#txt001RG').val();
    let to_date = $('#txt002RG').val();
    tableEcuposrg = $('#tableEcuposrg').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Ecuposrg/consultaRG/",
            method: "POST",
            data: { from_date: from_date, to_date: to_date },
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

function fntHoy() {
    tableEcuposrg = $('#tableEcuposrg').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ecuposrg/getEcuposrg/",
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

function fntCanEcuposrg(idcupo){
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
            let ajaxUrl = base_url+'/Ecuposrg/cancelarCuporg';
            let strData = "idCupo="+idcupo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        swal("Eliminar!", objData.msg , "success");
                        tableEcuposrg.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}