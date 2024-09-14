let tableCantidadCupos; 
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableCantidadCupos = $('#tableCantidadCupos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/CantidadCupos/getCantidadCupos",
            "dataSrc":""
        },
        "columns":[
            {"data":"cantidad_cupos_id"},
            {"data":"cantidad_cupos_codigo"},
            {"data":"cantidad_cupos_nombre"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true, 
        "iDisplayLength": 25,
        "order":[[0,"asc"]]
    });

    let formCantidadCupos = document.querySelector("#formCantidadCupos");
    formCantidadCupos.onsubmit = function(e) {
        e.preventDefault();
        let intLunes_Bloque_I = document.querySelector('#lunes_bloque_I').value;
        let intLunes_Bloque_II = document.querySelector('#lunes_bloque_II').value;
        let intLunes_Bloque_III = document.querySelector('#lunes_bloque_III').value;
        let intLunes_Bloque_IV = document.querySelector('#lunes_bloque_IV').value;
        let intLunes_Bloque_V = document.querySelector('#lunes_bloque_V').value;
        let intMartes_Bloque_I = document.querySelector('#martes_bloque_I').value;
        let intMartes_Bloque_II = document.querySelector('#martes_bloque_II').value;
        let intMartes_Bloque_III = document.querySelector('#martes_bloque_III').value;
        let intMartes_Bloque_IV = document.querySelector('#martes_bloque_IV').value;
        let intMartes_Bloque_V = document.querySelector('#martes_bloque_V').value;
        let intMiercoles_Bloque_I = document.querySelector('#miercoles_bloque_I').value;
        let intMiercoles_Bloque_II  = document.querySelector('#miercoles_bloque_II').value;
        let intMiercoles_Bloque_III = document.querySelector('#miercoles_bloque_III').value;
        let intMiercoles_Bloque_IV  = document.querySelector('#miercoles_bloque_IV').value;
        let intMiercoles_Bloque_V = document.querySelector('#miercoles_bloque_V').value;
        let intJueves_Bloque_I = document.querySelector('#jueves_bloque_I').value;
        let intJueves_Bloque_II = document.querySelector('#jueves_bloque_II').value;
        let intJueves_Bloque_III = document.querySelector('#jueves_bloque_III').value;
        let intJueves_Bloque_IV = document.querySelector('#jueves_bloque_IV').value;
        let intJueves_Bloque_V = document.querySelector('#jueves_bloque_V').value;
        let intViernes_Bloque_I = document.querySelector('#viernes_bloque_I').value;
        let intViernes_Bloque_II = document.querySelector('#viernes_bloque_II').value;
        let intViernes_Bloque_III = document.querySelector('#viernes_bloque_III').value;
        let intViernes_Bloque_IV = document.querySelector('#viernes_bloque_IV').value;
        let intViernes_Bloque_V = document.querySelector('#viernes_bloque_V').value;
        if(intLunes_Bloque_I == '' || intLunes_Bloque_II == '' || intLunes_Bloque_III == '' || intLunes_Bloque_IV == '' || intLunes_Bloque_V == ''         
            || intMartes_Bloque_I == '' || intMartes_Bloque_II == '' || intMartes_Bloque_III == '' || intMartes_Bloque_IV == '' || intMartes_Bloque_V == '' 
            || intMiercoles_Bloque_I == '' || intMiercoles_Bloque_II == '' || intMiercoles_Bloque_III == '' || intMiercoles_Bloque_IV == '' || intMiercoles_Bloque_V == '' 
            || intJueves_Bloque_I == '' || intJueves_Bloque_II == '' || intJueves_Bloque_III == '' || intJueves_Bloque_IV == '' || intJueves_Bloque_V == '' 
            || intViernes_Bloque_I == '' || intViernes_Bloque_II == '' || intViernes_Bloque_III == '' || intViernes_Bloque_IV == '' || intViernes_Bloque_V == '' 
        ){
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/CantidadCupos/setCantidadCupo'; 
        let formData = new FormData(formCantidadCupos);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){                    
                    tableCantidadCupos.api().ajax.reload();
                    $('#modalFormCantidadCupos').modal("hide");
                    formCantidadCupos.reset();
                    swal("CantidadCupos", objData.msg ,"success");
                }else{
                    swal("Error", objData.msg , "error");
                }
            }
            divLoading.style.display = "none";
            return false;
        }
        
    }
});


function fntViewInfo(cantidad_cupos_id){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/CantidadCupos/getCantidadCupo/'+cantidad_cupos_id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#celCodigo").innerHTML = objData.data.cantidad_cupos_codigo;
                document.querySelector("#celNombre").innerHTML = objData.data.cantidad_cupos_nombre;

                document.querySelector("#celLunes_Bloque_I").innerHTML = objData.data.lunes_bloque_I;
                document.querySelector("#celLunes_Bloque_II").innerHTML = objData.data.lunes_bloque_II;
                document.querySelector("#celLunes_Bloque_III").innerHTML = objData.data.lunes_bloque_III;
                document.querySelector("#celLunes_Bloque_IV").innerHTML = objData.data.lunes_bloque_IV;
                document.querySelector("#celLunes_Bloque_V").innerHTML = objData.data.lunes_bloque_V;

                document.querySelector("#celMartes_Bloque_I").innerHTML = objData.data.martes_bloque_I;
                document.querySelector("#celMartes_Bloque_II").innerHTML = objData.data.martes_bloque_II;
                document.querySelector("#celMartes_Bloque_III").innerHTML = objData.data.martes_bloque_III;
                document.querySelector("#celMartes_Bloque_IV").innerHTML = objData.data.martes_bloque_IV;
                document.querySelector("#celMartes_Bloque_V").innerHTML = objData.data.martes_bloque_V;

                document.querySelector("#celMiercoles_Bloque_I").innerHTML = objData.data.miercoles_bloque_I;
                document.querySelector("#celMiercoles_Bloque_II").innerHTML = objData.data.miercoles_bloque_II;
                document.querySelector("#celMiercoles_Bloque_III").innerHTML = objData.data.miercoles_bloque_III;
                document.querySelector("#celMiercoles_Bloque_IV").innerHTML = objData.data.miercoles_bloque_IV;
                document.querySelector("#celMiercoles_Bloque_V").innerHTML = objData.data.miercoles_bloque_V;
                
                document.querySelector("#celJueves_Bloque_I").innerHTML = objData.data.jueves_bloque_I;
                document.querySelector("#celJueves_Bloque_II").innerHTML = objData.data.jueves_bloque_II;
                document.querySelector("#celJueves_Bloque_III").innerHTML = objData.data.jueves_bloque_III;
                document.querySelector("#celJueves_Bloque_IV").innerHTML = objData.data.jueves_bloque_IV;
                document.querySelector("#celJueves_Bloque_V").innerHTML = objData.data.jueves_bloque_V;

                document.querySelector("#celViernes_Bloque_I").innerHTML = objData.data.viernes_bloque_I;
                document.querySelector("#celViernes_Bloque_II").innerHTML = objData.data.viernes_bloque_II;
                document.querySelector("#celViernes_Bloque_III").innerHTML = objData.data.viernes_bloque_III;
                document.querySelector("#celViernes_Bloque_IV").innerHTML = objData.data.viernes_bloque_IV;
                document.querySelector("#celViernes_Bloque_V").innerHTML = objData.data.viernes_bloque_V;
                $('#modalViewCantidadCupos').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}
 
function fntEditInfo(element, cantidad_cupos_id){
    rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/CantidadCupos/getCantidadCupo/'+cantidad_cupos_id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#cantidad_cupos_Id").value = objData.data.cantidad_cupos_id;
                document.querySelector("#lunes_bloque_I").value = objData.data.lunes_bloque_I;
                document.querySelector("#lunes_bloque_Idb").value = objData.data.lunes_bloque_I;
                document.querySelector("#lunes_bloque_II").value = objData.data.lunes_bloque_II;
                document.querySelector("#lunes_bloque_IIdb").value = objData.data.lunes_bloque_II;
                document.querySelector("#lunes_bloque_III").value = objData.data.lunes_bloque_III;
                document.querySelector("#lunes_bloque_IIIdb").value = objData.data.lunes_bloque_III;
                document.querySelector("#lunes_bloque_IV").value = objData.data.lunes_bloque_IV;
                document.querySelector("#lunes_bloque_IVdb").value = objData.data.lunes_bloque_IV;
                document.querySelector("#lunes_bloque_V").value = objData.data.lunes_bloque_V;
                document.querySelector("#lunes_bloque_Vdb").value = objData.data.lunes_bloque_V;

                document.querySelector("#martes_bloque_I").value = objData.data.martes_bloque_I;
                document.querySelector("#martes_bloque_Idb").value = objData.data.martes_bloque_I;
                document.querySelector("#martes_bloque_II").value = objData.data.martes_bloque_II;
                document.querySelector("#martes_bloque_IIdb").value = objData.data.martes_bloque_II;
                document.querySelector("#martes_bloque_III").value = objData.data.martes_bloque_III;
                document.querySelector("#martes_bloque_IIIdb").value = objData.data.martes_bloque_III;
                document.querySelector("#martes_bloque_IV").value = objData.data.martes_bloque_IV;
                document.querySelector("#martes_bloque_IVdb").value = objData.data.martes_bloque_IV;
                document.querySelector("#martes_bloque_V").value = objData.data.martes_bloque_V;
                document.querySelector("#martes_bloque_Vdb").value = objData.data.martes_bloque_V;

                document.querySelector("#miercoles_bloque_I").value = objData.data.miercoles_bloque_I;
                document.querySelector("#miercoles_bloque_Idb").value = objData.data.miercoles_bloque_I;
                document.querySelector("#miercoles_bloque_II").value = objData.data.miercoles_bloque_II;
                document.querySelector("#miercoles_bloque_IIdb").value = objData.data.miercoles_bloque_II;
                document.querySelector("#miercoles_bloque_III").value = objData.data.miercoles_bloque_III;
                document.querySelector("#miercoles_bloque_IIIdb").value = objData.data.miercoles_bloque_III;
                document.querySelector("#miercoles_bloque_IV").value = objData.data.miercoles_bloque_IV;
                document.querySelector("#miercoles_bloque_IVdb").value = objData.data.miercoles_bloque_IV;
                document.querySelector("#miercoles_bloque_V").value = objData.data.miercoles_bloque_V;
                document.querySelector("#miercoles_bloque_Vdb").value = objData.data.miercoles_bloque_V;

                document.querySelector("#jueves_bloque_I").value = objData.data.jueves_bloque_I;
                document.querySelector("#jueves_bloque_Idb").value = objData.data.jueves_bloque_I;
                document.querySelector("#jueves_bloque_II").value = objData.data.jueves_bloque_II;
                document.querySelector("#jueves_bloque_IIdb").value = objData.data.jueves_bloque_II;
                document.querySelector("#jueves_bloque_III").value = objData.data.jueves_bloque_III;
                document.querySelector("#jueves_bloque_IIIdb").value = objData.data.jueves_bloque_III;
                document.querySelector("#jueves_bloque_IV").value = objData.data.jueves_bloque_IV;
                document.querySelector("#jueves_bloque_IVdb").value = objData.data.jueves_bloque_IV;
                document.querySelector("#jueves_bloque_V").value = objData.data.jueves_bloque_V;
                document.querySelector("#jueves_bloque_Vdb").value = objData.data.jueves_bloque_V;

                document.querySelector("#viernes_bloque_I").value = objData.data.viernes_bloque_I;
                document.querySelector("#viernes_bloque_Idb").value = objData.data.viernes_bloque_I;
                document.querySelector("#viernes_bloque_II").value = objData.data.viernes_bloque_II;
                document.querySelector("#viernes_bloque_IIdb").value = objData.data.viernes_bloque_II;
                document.querySelector("#viernes_bloque_III").value = objData.data.viernes_bloque_III;
                document.querySelector("#viernes_bloque_IIIdb").value = objData.data.viernes_bloque_III;
                document.querySelector("#viernes_bloque_IV").value = objData.data.viernes_bloque_IV;
                document.querySelector("#viernes_bloque_IVdb").value = objData.data.viernes_bloque_IV;
                document.querySelector("#viernes_bloque_V").value = objData.data.viernes_bloque_V;
                document.querySelector("#viernes_bloque_Vdb").value = objData.data.viernes_bloque_V;
            }
        }
        $('#modalFormCantidadCupos').modal('show');
    }
}

function openModal(){
    rowTable = "";
    document.querySelector('#cantidad_cupos_Id').value ="";
    document.querySelector("#formCantidadCupos").reset();
    $('#modalFormCantidadCupos').modal('show');    
}