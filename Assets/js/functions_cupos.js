let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
    let formCupos = document.querySelector("#formCupos")
    formCupos.onsubmit = function(e) {
        e.preventDefault();
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Cupos/CreacionCupos'; 
        let formData = new FormData(formCupos);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    fntLunes();
                    fntMartes();
                    fntMiercoles();
                    fntJueves();
                    fntViernes();
                    $('#modalFormCupos').modal("hide");
                    formCupos.reset();
                    swal("Cupos creados", objData.msg ,"success");
                }else{
                    swal("Error", objData.msg , "error");
                }
            }
            divLoading.style.display = "none";
            return false;
        }
        
    }

});

function fntCrearCupos(cantidad_cupos_id){
    if (cantidad_cupos_id==1) {
        document.querySelector("#btnText").innerHTML = "CREACIÓN CUPOS RASTRAS PLANTA GUAZAPA";    
    }else if (cantidad_cupos_id==2) {
        document.querySelector("#btnText").innerHTML = "CREACIÓN CUPOS RASTRAS PLANTA JIBOA";
    } else if (cantidad_cupos_id==3) {
        document.querySelector("#btnText").innerHTML = "CREACIÓN CUPOS CAMIONES PLANTA GUAZAPA";
    }else{
        document.querySelector("#btnText").innerHTML = "CREACIÓN CUPOS CAMIONES PLANTA JIBOA";
    }

    document.querySelector("#cantidad_cupos_Id").value = cantidad_cupos_id;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Cupos/getCantidadCupo/'+cantidad_cupos_id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#lunes_bloque_I").value = objData.data.lunes_bloque_I;
                document.querySelector("#lunes_bloque_II").value = objData.data.lunes_bloque_II;
                document.querySelector("#lunes_bloque_III").value = objData.data.lunes_bloque_III;
                document.querySelector("#lunes_bloque_IV").value = objData.data.lunes_bloque_IV;
                document.querySelector("#lunes_bloque_V").value = objData.data.lunes_bloque_V;
                document.querySelector("#martes_bloque_I").value = objData.data.martes_bloque_I;
                document.querySelector("#martes_bloque_II").value = objData.data.martes_bloque_II;
                document.querySelector("#martes_bloque_III").value = objData.data.martes_bloque_III;
                document.querySelector("#martes_bloque_IV").value = objData.data.martes_bloque_IV;
                document.querySelector("#martes_bloque_V").value = objData.data.martes_bloque_V;
                document.querySelector("#miercoles_bloque_I").value = objData.data.miercoles_bloque_I;
                document.querySelector("#miercoles_bloque_II").value = objData.data.miercoles_bloque_II;
                document.querySelector("#miercoles_bloque_III").value = objData.data.miercoles_bloque_III;
                document.querySelector("#miercoles_bloque_IV").value = objData.data.miercoles_bloque_IV;
                document.querySelector("#miercoles_bloque_V").value = objData.data.miercoles_bloque_V;
                document.querySelector("#jueves_bloque_I").value = objData.data.jueves_bloque_I;
                document.querySelector("#jueves_bloque_II").value = objData.data.jueves_bloque_II;
                document.querySelector("#jueves_bloque_III").value = objData.data.jueves_bloque_III;
                document.querySelector("#jueves_bloque_IV").value = objData.data.jueves_bloque_IV;
                document.querySelector("#jueves_bloque_V").value = objData.data.jueves_bloque_V;    
                document.querySelector("#viernes_bloque_I").value = objData.data.viernes_bloque_I;
                document.querySelector("#viernes_bloque_II").value = objData.data.viernes_bloque_II;
                document.querySelector("#viernes_bloque_III").value = objData.data.viernes_bloque_III;
                document.querySelector("#viernes_bloque_IV").value = objData.data.viernes_bloque_IV;
                document.querySelector("#viernes_bloque_V").value = objData.data.viernes_bloque_V;
            }
            /*
            document.querySelector('#formCupos').addEventListener('submit',fntLunes,false);
            document.querySelector('#formCupos').addEventListener('submit',fntMartes,false);
            document.querySelector('#formCupos').addEventListener('submit',fntMiercoles,false);
            document.querySelector('#formCupos').addEventListener('submit',fntJueves,false);
            document.querySelector('#formCupos').addEventListener('submit',fntViernes,false);
            */
        }
        $('#modalFormCupos').modal('show');
    }
}
function fntLunes(){
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Cupos/setLunes'; 
    var formElement = document.querySelector("#formCupos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            /*
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                swal("Cupos creados", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
            */
        }
    }   
}
function fntMartes(){ 
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Cupos/setMartes'; 
    var formElement = document.querySelector("#formCupos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            /*
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                swal("Cupos creados", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
            */
        }
    }   
}
function fntMiercoles(){ 
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Cupos/setMiercoles'; 
    var formElement = document.querySelector("#formCupos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            /*
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                swal("Cupos creados", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
            */
        }
    }   
}
function fntJueves(){
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Cupos/setJueves'; 
    var formElement = document.querySelector("#formCupos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            /*
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                swal("Cupos creados", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
            */
        }
    }   
}
function fntViernes(){ 
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Cupos/setViernes'; 
    var formElement = document.querySelector("#formCupos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            /*
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                swal("Cupos creados", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
            */
        }
    }   
}

function fntDelCupos(tipo_transporte){
    swal({
        title: "Eliminar Cupos",
        text: "¿Realmente quiere eliminar los cupos de a siguiente semana?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Cupos/delCupos';
            let strData = "tipo_transporte="+tipo_transporte;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        swal("Eliminar!", objData.msg , "success");
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}