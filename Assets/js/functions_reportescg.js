let tableReportesCG;
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

 
    tableReportesCG = $('#tableReportesCG').dataTable( {
        
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Reportescg/getReportescg",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_cupo"},
            {"data":"fecha"},
            {"data":"bloque"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"nombre_cliente"},
            {"data":"nombre_asesor"},
            {"data":"tipo_logistica"},
            {"data":"estado"},
            {"data":"quintales"},
            {"data":"flete"},
            {"data":"observacion_asignacion"},
            {"data":"observacion_ejecucion"},
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
                    "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12,13]
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12,13]
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[1,"asc"]]  
    });
});

/* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES *//* OPCIONES */


function fntViewReportescg(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposcg/getEcupocg/'+idcupo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                let mes = '';
                if (objData.data.mes == 1) { mes = 'Enero'; }else 
                if (objData.data.mes == 2) { mes = 'Febrero'; }else 
                if (objData.data.mes == 3) { mes = 'Marzo'; }else
                if (objData.data.mes == 4) { mes = 'Abril'; }else
                if (objData.data.mes == 5) { mes = 'Mayo'; }else
                if (objData.data.mes == 6) { mes = 'Junio'; }else
                if (objData.data.mes == 7) { mes = 'Julio'; }else
                if (objData.data.mes == 8) { mes = 'Agosto'; }else
                if (objData.data.mes == 9) { mes = 'Septiembre'; }else
                if (objData.data.mes == 10) { mes = 'Octubre'; }else
                if (objData.data.mes == 11) { mes = 'Noviembre'; }else
                if (objData.data.mes == 12) { mes = 'Diciembre'; }
                let dia = '';
                if (objData.data.dia == 1) { dia = 'Lunes'; }else 
                if (objData.data.dia == 2) { dia = 'Martes'; }else 
                if (objData.data.dia == 3) { dia = 'Miércoles'; }else
                if (objData.data.dia == 4) { dia = 'Jueves'; }else
                if (objData.data.dia == 5) { dia = 'Viernes'; }
                let bloque = '';
                if (objData.data.bloque == 1) { bloque = '6:00:AM - 9:00:AM'; }else
                if (objData.data.bloque == 2) { bloque = '9:00:AM - 12:00:MD'; }else 
                if (objData.data.bloque == 3) { bloque = '12:00:MD - 3:00:PM'; }else
                if (objData.data.bloque == 4) { bloque = '3:00:PM - 6:00:PM'; }else
                if (objData.data.bloque == 5) { bloque = '6:00:PM - 9:00:PM'; }

                if (objData.data.tipo_logistica == 'Transporte propio') {
                    document.querySelector("#celRCupoCTP").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celRAnioCTP").innerHTML = objData.data.anio;
                    document.querySelector("#celRMesCTP").innerHTML = mes;
                    document.querySelector("#celRSemanaCTP").innerHTML = objData.data.semana;
                    document.querySelector("#celRDiaCTP").innerHTML = dia;
                    document.querySelector("#celRBloqueCTP").innerHTML = bloque;
                    document.querySelector("#celRAsesorCTP").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celRClienteCTP").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celREstadoCTP").innerHTML = objData.data.estado;
                    document.querySelector("#celRHora_asignadaCTP").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celRHora_inicioCTP").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celRHora_finalizacionCTP").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celRObservacion_asignacionCTP").innerHTML = objData.data.observacion_asignacion;
                    document.querySelector("#celRObservacion_ejecucionCTP").innerHTML = objData.data.observacion_ejecucion;            
                    $('#modalViewReportesCTP').modal('show');
                }else{
                    document.querySelector("#celRCupoC").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celRAnioC").innerHTML = objData.data.anio;
                    document.querySelector("#celRMesC").innerHTML = mes;
                    document.querySelector("#celRSemanaC").innerHTML = objData.data.semana;
                    document.querySelector("#celRDiaC").innerHTML = dia;
                    document.querySelector("#celRBloqueC").innerHTML = bloque;
                    document.querySelector("#celRAsesorC").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celRClienteC").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celREstadoC").innerHTML = objData.data.estado;
                    document.querySelector("#celRHora_asignadaC").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celRHora_inicioC").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celRHora_finalizacionC").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celRFleteC").innerHTML = objData.data.flete;
                    document.querySelector("#celRQuintalesC").innerHTML = objData.data.quintales;
                    document.querySelector("#celRReceptorC").innerHTML = objData.data.nombre_receptor;
                    document.querySelector("#celRContactoC").innerHTML = objData.data.contacto_receptor;
                    document.querySelector("#celRDepartamentoC").innerHTML = objData.data.departamento_receptor;
                    document.querySelector("#celRMunicipioC").innerHTML = objData.data.municipio_receptor;
                    document.querySelector("#celRDireccionC").innerHTML = objData.data.direccion_receptor;
                    document.querySelector("#celRObservacion_asignacionC").innerHTML = objData.data.observacion_asignacion;
                    document.querySelector("#celRObservacion_ejecucionC").innerHTML = objData.data.observacion_ejecucion;            
                    $('#modalViewReportesC').modal('show');
                }
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function consultaCGR() {
    let from_date = $('#txt001CGR').val();
    let to_date = $('#txt002CGR').val();
    tableReportesCG = $('#tableReportesCG').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Reportescg/consultaCG/",
            method: "POST",
            data: { from_date: from_date, to_date: to_date },
            "dataSrc":""
        },
        "columns": [
            {"data":"id_cupo"},
            {"data":"fecha"},
            {"data":"bloque"},
            {"data":"hora_asignada"},
            {"data":"hora_inicio"},
            {"data":"hora_finalizacion"},
            {"data":"nombre_cliente"},
            {"data":"nombre_asesor"},
            {"data":"tipo_logistica"},
            {"data":"estado"},
            {"data":"quintales"},
            {"data":"flete"},
            {"data":"observacion_asignacion"},
            {"data":"observacion_ejecucion"},
            {"data":"options"}
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order": [[1, "asc"]]
    });   
}

function fntHoyCGR() {
    location.reload(); 
}

function reporte001CG() {
    let from_date = $('#txt001CGR').val();
    let to_date   =   $('#txt002CGR').val();
    
    document.querySelector("#plantatc").innerHTML = "Reporte camiones planta Jiboa";
    document.querySelector("#plantac").innerHTML = "Planta Guazapa";
    document.querySelector("#transportec").innerHTML = "Transporte de Guazapa";
    document.querySelector("#fInicioc").innerHTML = ""+from_date;
    document.querySelector("#fFinc").innerHTML = ""+to_date;

    let fi = from_date;
    let ff = "f="+to_date;    
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Reportescg/FinalizadoCG/'+fi;

    request.open("POST",ajaxUrl,true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(ff);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#CR1").innerHTML = objData.data.total;
                document.querySelector("#CR2").innerHTML = objData.data.totalT;
                var eficiencia = (objData.data.total/objData.data.totalT)
                eficiencia = eficiencia.toFixed(2);
                document.querySelector("#CR3").innerHTML = eficiencia*100+'%';
                /**/
                document.querySelector("#CR4").innerHTML = objData.data.totalPCF;
                document.querySelector("#CR5").innerHTML = objData.data.totalNPCF;
                document.querySelector("#CR6").innerHTML = (objData.data.totalPCF + objData.data.totalNPCF);
                /**/
                document.querySelector("#CR7").innerHTML = objData.data.totalPC;
                document.querySelector("#CR8").innerHTML = objData.data.totalNPC;
                document.querySelector("#CR9").innerHTML = (objData.data.totalPC + objData.data.totalNPC);
                /**/
                document.querySelector("#CR10").innerHTML = objData.data.promedioPC;
                document.querySelector("#CR11").innerHTML = objData.data.promedioNPC;
                 /**/
                 document.querySelector("#CR12").innerHTML = objData.data.promedioPCE;
                 document.querySelector("#CR13").innerHTML = objData.data.promedioNPCS;
            }
        }
    }

    $('#modalFormReportesc').modal('show');
}

function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }
  