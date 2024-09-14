let tableMotoristas;
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableMotoristas = $('#tableMotoristas').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Motoristas/getMotoristas",
            "dataSrc":""
        },
        "columns":[
            {"data":"idmotorista"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"licencia"},            
            {"data":"finalizacion"},
            {"data":"nota"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5]
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5]
                }
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5]
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[0,"asc"]]  
    });

    if(document.querySelector("#formMotorista")){
        let formMotorista = document.querySelector("#formMotorista");
        formMotorista.onsubmit = function(e) {
            e.preventDefault();
            let strNombresMotorista = document.querySelector('#txtNombresMotorista').value;
            let strApellidosMotorista = document.querySelector('#txtApellidosMotorista').value;
            let intDuiMotorista = document.querySelector('#txtDuiMotorista').value;
            let intLicenciaMotorista = document.querySelector('#txtLicenciaMotorista').value;
            let intFinalizacionMotorista = document.querySelector('#txtFinalizacionMotorista').value;
            let intPlantaMotorista = document.querySelector('#listPlantaMotorista').value;
            let strNotaMotorista = document.querySelector('#txtCalidadMotorista').value;

            if(strNombresMotorista == '' || strApellidosMotorista == '' || intDuiMotorista == '' 
            || intLicenciaMotorista == '' || intFinalizacionMotorista == '' || intPlantaMotorista == '' 
            || strNotaMotorista == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Motoristas/setMotorista';
            let formData = new FormData(formMotorista);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        if(rowTable == ""){
                            tableMotoristas.api().ajax.reload();
                        }else{
                            rowTable.cells[1].textContent = strNombresMotorista;
                            rowTable.cells[2].textContent = strApellidosMotorista;
                            rowTable.cells[3].textContent = intLicenciaMotorista;
                            rowTable.cells[4].textContent = strNotaMotorista;
                            rowTable.cells[5].textContent = intFinalizacionMotorista;
                            rowTable = ""; 
                        }
                        $('#modalFormMotoristas').modal("hide");
                        formMotorista.reset();
                        tableMotoristas.api().ajax.reload();
                        swal("Motoristas", objData.msg ,"success");
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

function fntViewMotorista(idmotorista){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Motoristas/getMotorista/'+idmotorista;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
               let plantaUsuario = objData.data.status == 1 ? 
                '<span class="badge badge-success">Jiiboa</span>' : 
                '<span class="badge badge-success">Guazapa</span>';
                document.querySelector("#celNombres").innerHTML = objData.data.nombres;
                document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
                document.querySelector("#celDui").innerHTML = objData.data.dui;
                document.querySelector("#celLicencia").innerHTML = objData.data.licencia;
                document.querySelector("#celFinalizacion").innerHTML = objData.data.finalizacion;
                document.querySelector("#celPlanta").innerHTML = plantaUsuario;
                document.querySelector("#celNota").innerHTML = objData.data.nota; 
                document.querySelector("#celObservacion").innerHTML = objData.data.observacion; 
                $('#modalViewMotorista').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
} 

function fntEditMotorista(element,idmotorista){
    rowTable = element.parentNode.parentNode.parentNode; 
    document.querySelector('#titleModal').innerHTML ="Actualizar Motorista";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Motoristas/getMotorista/'+idmotorista;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#idMotorista").value = objData.data.idmotorista;
                document.querySelector("#txtNombresMotorista").value = objData.data.nombres;
                document.querySelector("#txtApellidosMotorista").value = objData.data.apellidos;
                document.querySelector("#txtDuiMotorista").value = objData.data.dui;
                document.querySelector("#txtLicenciaMotorista").value = objData.data.licencia;
                document.querySelector("#txtFinalizacionMotorista").value = objData.data.finalizacion;
                document.querySelector("#txtCalidadMotorista").value = objData.data.nota;
                document.querySelector("#txtDescripcionMotorista").value = objData.data.observacion;
                if(objData.data.planta == 1){
                    document.querySelector("#listPlantaMotorista").value = 1;
                }else{
                    document.querySelector("#listPlantaMotorista").value = 2;
                }
                $('#listPlantaMotorista').selectpicker('render');
            }
        }
    
        $('#modalFormMotoristas').modal('show');
    }
}

function fntDelMotorista(idmotorista){
    swal({
        title: "Eliminar Motorista",
        text: "¿Realmente quiere eliminar al motorista?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Motoristas/delMotorista';
            let strData = "idMotorista="+idmotorista;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableMotoristas.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}


function openModal(){
    rowTable = "";
    document.querySelector('#idMotorista').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Motorista";
    document.querySelector("#formMotorista").reset();
    $('#modalFormMotoristas').modal('show');
}

