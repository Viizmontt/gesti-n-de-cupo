let tableCamiones;
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableCamiones = $('#tableCamiones').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Camiones/getCamiones",
            "dataSrc":""
        },
        "columns":[
            {"data":"idcamion"},
            {"data":"codigo"},
            {"data":"marca"},
            {"data":"modelo"},            
            {"data":"color"},
            {"data":"capacidad"},
            {"data":"planta"},
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

    if(document.querySelector("#formCamion")){
        let formCamion = document.querySelector("#formCamion");
        formCamion.onsubmit = function(e) {
            e.preventDefault();
            let strCodigoCamion = document.querySelector('#txtCodigoCamion').value;
            let strMarcaCamion = document.querySelector('#txtMarcaCamion').value;
            let strModeloCamion = document.querySelector('#txtModeloCamion').value;
            let strColorCamion = document.querySelector('#txtColorCamion').value;
            let strCapacidadCamion = document.querySelector('#txtCapacidadCamion').value;
            let strPlantaCamion = document.querySelector('#txtPlantaCamion').value;

            if(strCodigoCamion == '' || strModeloCamion == '' || strMarcaCamion == '' 
            || strColorCamion == '' || strCapacidadCamion == '' || strPlantaCamion == '')
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
            let ajaxUrl = base_url+'/Camiones/setCamion'; 
            let formData = new FormData(formCamion);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormCamiones').modal("hide");
                        formCamion.reset();
                        tableCamiones.api().ajax.reload();
                        swal("Camiones", objData.msg ,"success");
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

function fntEditCamion(element,idcamion){
    rowTable = element.parentNode.parentNode.parentNode; 
    document.querySelector('#titleModal').innerHTML ="Actualizar Camión";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Camiones/getCamion/'+idcamion;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status){
                document.querySelector("#idCamion").value = objData.data.idcamion;
                document.querySelector("#txtCodigoCamion").value = objData.data.codigo;
                document.querySelector("#txtMarcaCamion").value = objData.data.marca;
                document.querySelector("#txtModeloCamion").value = objData.data.modelo;
                document.querySelector("#txtColorCamion").value = objData.data.color;
                document.querySelector("#txtCapacidadCamion").value = objData.data.capacidad;
                document.querySelector("#txtPlantaCamion").value = objData.data.planta;
                if(objData.data.planta == 1){
                    document.querySelector("#listPlantaCamion").value = 1;
                }else{
                    document.querySelector("#listPlantaCamion").value = 2;
                }
                $('#listPlantaCamion').selectpicker('render');
            }
        }
    
        $('#modalFormCamiones').modal('show');
    }
}

function fntDelCamion(idcamion){
    swal({
        title: "Eliminar Camión",
        text: "¿Realmente quiere eliminar el camión?",
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
            let ajaxUrl = base_url+'/Camiones/delCamion';
            let strData = "idCamion="+idcamion;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableCamiones.api().ajax.reload();
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
    document.querySelector('#idCamion').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Camión";
    document.querySelector("#formCamion").reset();
    $('#modalFormCamiones').modal('show');
}

