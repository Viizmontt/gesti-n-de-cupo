let tableReportesRG;
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
    tableReportesRG = $('#tableReportesRG').dataTable( {
        
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Reportesrg/getReportesrg",
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
            {"data":"tipo_carga"},
            {"data":"metodo_carga"},
            {"data":"estado"},
            {"data":"observacion_cupo"},
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
                    "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12]
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12]
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order":[[1,"asc"]]  
    });
});

function fntViewReportesrg(idcupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ecuposrg/getEcuporg/'+idcupo;
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

                if (objData.data.metodo_carga == 'Granel') { 
                    document.querySelector("#celCupoG").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAnioG").innerHTML = objData.data.anio;
                    document.querySelector("#celMesG").innerHTML = mes;
                    document.querySelector("#celSemanaG").innerHTML = objData.data.semana;
                    document.querySelector("#celDiaG").innerHTML = dia;
                    document.querySelector("#celBloqueG").innerHTML = bloque;
                    document.querySelector("#celAsesorG").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celClienteG").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celEstadoG").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignadaG").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicioG").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celHora_finalizacionG").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celTipo_cargaG").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celMetodo_cargaG").innerHTML = objData.data.metodo_carga;
                    document.querySelector("#celObservacion_asignacionG").innerHTML = objData.data.observacion_cupo;
                    document.querySelector("#celObservacion_ejecucionG").innerHTML = objData.data.observacion_ejecucion;
                    $('#modalViewReportesRG').modal('show');

                }else{
                    document.querySelector("#celCupo").innerHTML = objData.data.id_cupo;
                    document.querySelector("#celAnio").innerHTML = objData.data.anio;
                    document.querySelector("#celMes").innerHTML = mes;
                    document.querySelector("#celSemana").innerHTML = objData.data.semana;
                    document.querySelector("#celDia").innerHTML = dia;
                    document.querySelector("#celBloque").innerHTML = bloque;
                    document.querySelector("#celTipo_carga").value =objData.data.tipo_carga;
                    document.querySelector("#celTendidos_tarimas").value =objData.data.tendidos_tarimas;
                    document.querySelector("#celCapacidad_tarimas").value =objData.data.capacidad_tarimas;
                    document.querySelector("#celCantidad_tarimas").innerHTML = objData.data.cantidad_tarimas;
                    document.querySelector("#celAsesor").innerHTML = objData.data.nombre_asesor;
                    document.querySelector("#celCliente").innerHTML = objData.data.nombre_cliente; 
                    document.querySelector("#celEstado").innerHTML = objData.data.estado;
                    document.querySelector("#celHora_asignada").innerHTML = objData.data.hora_asignada;
                    document.querySelector("#celHora_inicio").innerHTML = objData.data.hora_inicio;
                    document.querySelector("#celHora_finalizacion").innerHTML = objData.data.hora_finalizacion;
                    document.querySelector("#celTipo_carga").innerHTML = objData.data.tipo_carga;
                    document.querySelector("#celMetodo_carga").innerHTML = objData.data.metodo_carga;
                    document.querySelector("#celTendidos_tarimas").innerHTML = objData.data.tendidos_tarimas;
                    document.querySelector("#celCapacidad_tarimas").innerHTML = objData.data.capacidad_tarimas;
                    document.querySelector("#celCantidad_tarimas").innerHTML = objData.data.cantidad_tarimas;
                    document.querySelector("#celObservacion_asignacion").innerHTML = objData.data.observacion_cupo;
                    document.querySelector("#celObservacion_ejecucion").innerHTML = objData.data.observacion_ejecucion;
                    $('#modalViewReportesR').modal('show');
                }
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function consultaRGR() {
    let from_date = $('#txt001RGR').val();
    let to_date = $('#txt002RGR').val();
    tableReportesRG = $('#tableReportesRG').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Reportesrg/consultaRG/",
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
            {"data":"tipo_carga"},
            {"data":"metodo_carga"},
            {"data":"estado"},
            {"data":"observacion_cupo"},
            {"data":"observacion_ejecucion"},
            {"data":"options"}
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 25,
        "order": [[1, "asc"]]
    });   
}

function fntHoyRGR() {
    location.reload(); 
}

function reporte001RG() {
    let from_date = $('#txt001RGR').val();
    let to_date = $('#txt002RGR').val();
    
    document.querySelector("#plantat").innerHTML = "Reporte rastras planta Guazapa";
    document.querySelector("#planta").innerHTML = "Planta Guazapa";
    document.querySelector("#transporte").innerHTML = "Transporte de rastras";
    document.querySelector("#fInicio").innerHTML = ""+from_date;
    document.querySelector("#fFin").innerHTML = ""+to_date;

    let fi = from_date;
    let ff = "f="+to_date;    
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Reportesrg/FinalizadoRG/'+fi;
    request.open("POST",ajaxUrl,true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(ff);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#RGR1").innerHTML = objData.data.total;
                document.querySelector("#RGR2").innerHTML = objData.data.totalT;
                var eficiencia = (objData.data.total/objData.data.totalT)
                eficiencia = eficiencia.toFixed(2);
                document.querySelector("#RGR3").innerHTML = eficiencia*100+'%';
                /**/
                document.querySelector("#RGR4").innerHTML = objData.data.totalPCF;
                document.querySelector("#RGR5").innerHTML = objData.data.totalNPCF;
                document.querySelector("#RGR6").innerHTML = (objData.data.totalPCF + objData.data.totalNPCF);
                /**/
                document.querySelector("#RGR7").innerHTML = objData.data.totalPC;
                document.querySelector("#RGR8").innerHTML = objData.data.totalNPC;
                document.querySelector("#RGR9").innerHTML = (objData.data.totalPC + objData.data.totalNPC);
                /**/
                document.querySelector("#RGR10").innerHTML = objData.data.promedioPC;
                document.querySelector("#RGR11").innerHTML = objData.data.promedioNPC;
                 /**/
                 document.querySelector("#RGR12").innerHTML = objData.data.promedioPCE;
                 document.querySelector("#RGR13").innerHTML = objData.data.promedioNPCS;
            }
        }
    }



    $('#modalFormReportes').modal('show');
}

function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }
  