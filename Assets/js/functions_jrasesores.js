let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    /*AGREGAR ASESOR AL CUPO*/
    if(document.querySelector("#formGrasesores")){
        var formGrasesores = document.querySelector("#formGrasesores");
        formGrasesores.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Jrasesores/updatec_Asesor_Cupo'; 
            var formData = new FormData(formGrasesores);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormGrasesores').modal("hide");
                        formGrasesores.reset();
                        swal("Asesor modificado", objData.msg ,"success");
                        location.reload();
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
    
    /*AGREGAR CUPO NUEVO O NUEVOS CUPOS*/
    if(document.querySelector("#formNuevoCupo")){
        var formNuevoCupo = document.querySelector("#formNuevoCupo");
        formNuevoCupo.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Jrasesores/set_Nuevo_Cupo';
            var formData = new FormData(formNuevoCupo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormNuevoCupo').modal("hide");
                        formNuevoCupo.reset();
                        swal("Cupo agregado", objData.msg ,"success");
                        location.reload(); 
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    /*LIMPIAR EL ASESOR DEL CUPO*/
    if(document.querySelector("#formCleanCupo")){
        var formCleanCupo = document.querySelector("#formCleanCupo");
        formCleanCupo.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Jrasesores/clean_Asesor';
            var formData = new FormData(formCleanCupo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormCleanCupo').modal("hide");
                        formCleanCupo.reset();
                        swal("Asesor removido del cupo", objData.msg ,"success");
                        location.reload(); 
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    /*ELIMINAR CUPO Y ASESOR*/
    if(document.querySelector("#formDelCupo")){
        var formDelCupo = document.querySelector("#formDelCupo");
        formDelCupo.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Jrasesores/del_Cupo';
            var formData = new FormData(formDelCupo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormDelCupo').modal("hide");
                        formDelCupo.reset();
                        swal("Cupo eliminado", objData.msg ,"success");
                        location.reload(); 
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    /*ASIGNAR CARGA*/
    if(document.querySelector("#formTipoCargaCupo")){
        var formTipoCargaCupo = document.querySelector("#formTipoCargaCupo");
        formTipoCargaCupo.onsubmit = function(e) {
            e.preventDefault();
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Jrasesores/tipoCarga_Cupo';
            var formData = new FormData(formTipoCargaCupo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        $('#modalFormTipoCarga').modal("hide");
                        formTipoCargaCupo.reset();
                        swal("Tipo carga asignado", objData.msg ,"success");
                        location.reload(); 
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

}, false );

/* -LISTAR LOS NOMBRES DE LOS EMPLEADOS- */
window.addEventListener('load', function() {
    fntNombresPersona();
}, false);

function fntNombresPersona(){
    if(document.querySelector('#listNombresPersona')){
        let ajaxUrl = base_url+'/Jrasesores/getSelectNombresPersona';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listNombresPersona').innerHTML = request.responseText;
                $('#listNombresPersona').selectpicker('render');
            }
        }
    }
}

/* -MODALES- */
/*Agregar cupo o cupos*/
function openModalCupo(){
    document.querySelector("#tipoTransporteASC").value = 1;
    $('#modalFormNuevoCupo').modal('show');
}
/*Limpiar el asessor*/
function fntCleanJrasesores(id){
    $('#modalFormCleanCupo').modal('show');
    document.querySelector("#idCupo_AsesorClean").value = id;
}
/*Cambiar de asesor*/
function fntEditJrasesores(id){
    $('#modalFormGrasesores').modal('show');
    document.querySelector("#idCupo_Asesor").value = id;
}
/*Eliminar el cupo y asesor*/
function fntDelJrasesores(id){
    $('#modalFormDelCupo').modal('show');
    document.querySelector("#idCupo_Eliminar").value = id;
}
/*asignar tipo carga*/
function fntCargaJrasesores(id){
    $('#modalFormTipoCarga').modal('show');
    document.querySelector("#idCupo_Carga").value = id;
}