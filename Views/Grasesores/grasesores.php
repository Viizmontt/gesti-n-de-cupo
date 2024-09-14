<?php 
    headerAdmin($data);
    getModal('modalGrasesores',$data);
    require_once ('Controllers/Grasesores.php');
    $ins_acb= new Grasesores();
    $Year = strftime("%Y");
    $Semana = date("W");
    $Dia = date("N");
    if(date("N")==5 || date("N")==6 || date("N")==7){
      if($Semana==53){
        $Semana = 1;
        $Year = $Year +1 ;
      }elseif($Semana==52){
        $Semana = 1;
        $Year = $Year +1 ;
      }else{
        $Semana = $Semana+1;
      }
    }
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>
        <?= $data['page_title'] ?>
          <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModalCupo();" ><i class="fas fa-plus-circle"></i> Nuevo Cupo</button>
          <?php } ?>
      </h1>      
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">                       
              <table class="table table-hover table-bordered" id="tableGrasesores">
                <thead>
                  <tr class="">
                    <th>Bloque Horario</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                  </tr>
                </thead>
                <!--                         BLOQUE 1                        -->  <!--                         HORAS LABORALES                        -->                
                <tr class="">
                  <!-- LUNES BLOQUE 1 *6:00:AM-9:00:AM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <div class="bloqueHora">
                      <p>6:00:AM - 9:00:AM</p>
                    </div>
                  </td>
                  
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,1,1);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,1,1);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,1,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";


                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">

                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                                <small>'.$name.'</small>
                                <br>
                                <small>'.$tipoCarga.'</small>
                                </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>

                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MARTES BLOQUE 1 *6:00:AM-9:00:AM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,2,1);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,2,1);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,1,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }

                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                              </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MIERCOLES BLOQUE 1 *6:00:AM-9:00:AM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,3,1);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,3,1);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,1,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }

                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                                <small>'.$name.'</small>
                                <br>
                                <small>'.$tipoCarga.'</small>
                             </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- JUEVES BLOQUE 1 *6:00:AM-9:00:AM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,4,1);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,4,1);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,1,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }

                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                          
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                                <small>'.$name.'</small>
                                <br>
                                <small>'.$tipoCarga.'</small>
                              </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- VIERNES BLOQUE 1 *6:00:AM-9:00:AM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,5,1);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,5,1);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,1,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];
                        
                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }

                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                                <small>'.$name.'</small>
                                <br>
                                <small>'.$tipoCarga.'</small>
                              </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                </tr>
                <!--                         BLOQUE 2                        -->  <!--                         HORAS LABORALES                        -->
                <tr class="">
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <div class="bloqueHora">
                      <p>9:00:AM - 12:00:MD</p>
                    </div>
                  </td>
                  <!-- LUNES BLOQUE 2 *9:00:AM-12:00:MD* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,1,2);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,1,2);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,2,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }

                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p>
                                <small>'.$name.'</small>
                                <br>
                                <small>'.$tipoCarga.'</small>
                              </p>
                            </div>

                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MARTES BLOQUE 2 *9:00:AM-12:00:MD* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,2,2);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,2,2);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,2,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";

                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MIERCOLES BLOQUE 2 *9:00:AM-12:00:MD* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,3,2);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,3,2);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,2,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- JUEVES BLOQUE 2 *9:00:AM-12:00:MD* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,4,2);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,4,2);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,2,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- VIERNES BLOQUE 2 *9:00:AM-12:00:MD* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,5,2);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,5,2);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                       $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,2,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                </tr>
                <!--                         BLOQUE 3                        -->  <!--                         HORAS LABORALES                        -->
                <tr class="">
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <div class="bloqueHora">
                      <p>12:00:MD - 3:00:PM</p>
                    </div>
                  </td>
                  <!-- LUNES BLOQUE 3 *12:00:MD-3:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,1,3);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,1,3);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,3,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MARTES BLOQUE 3 *12:00:MD-3:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,2,3);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,2,3);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,3,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MIERCOLES BLOQUE 3 *12:00:MD-3:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,3,3);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,3,3);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,3,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- JUEVES BLOQUE 3 *12:00:MD-3:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,4,3);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,4,3);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,3,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- VIERNES BLOQUE 3 *12:00:MD-3:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,5,3);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,5,3);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];
                        
                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,3,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                </tr>
                <!--                         BLOQUE 4                        -->  <!--                         HORAS EXTRAS                        -->
                <tr class="">
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <div class="bloqueHora">
                      <p>3:00:PM - 6:00:PM</p>
                    </div>
                  </td>
                  <!-- LUNES BLOQUE 4 *3:00:PM-6:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,1,4);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,1,4);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,4,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MARTES BLOQUE 4 *3:00:PM-6:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,2,4);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,2,4);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,4,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MIERCOLES BLOQUE 4 *3:00PAM-6:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,3,4);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,3,4);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,4,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- JUEVES BLOQUE 4 *3:00:PM-6:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,4,4);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,4,4);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,4,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- VIERNES BLOQUE 4 *3:00:PM-6:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,5,4);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,5,4);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,4,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                </tr>
                <!--                         BLOQUE 5                        -->  <!--                         HORAS EXTRAS                        -->
                <tr class="">
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <div class="bloqueHora">
                      <p>6:00:PM - 9:00:PM</p>
                    </div>
                  </td>
                  <!-- LUNES BLOQUE 5 *6:00:PM-9:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,1,5);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,1,5);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,5,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MARTES BLOQUE 5 *6:00:PM-9:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,2,5);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,2,5);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,5,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- MIERCOLES BLOQUE 5 *6:00:PM-9:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,3,5);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,3,5);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,5,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- JUEVES BLOQUE 5 *6:00:PM-9:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,4,5);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,4,5);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,5,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                  <!-- VIERNES BLOQUE 5 *6:00:PM-9:00:PM* -->
                  <td class="Guazapa-asignar_cupo_asesor-td">
                    <?php
                      $cupos = $ins_acb->get_Cupos_RG($Year,$Semana,5,5);
                      $subBloque = $ins_acb->get_SubBloque_RG($Year,$Semana,5,5);
                      for ($i=0; $i<$cupos; $i++) {
                        $sub_bloque=$subBloque[$i]['sub_bloque'];

                        $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,5,$sub_bloque);

                        $id=$datos['id_cupo'];
                        $name = $datos['nombre_asesor'];
                        $tipoCarga = $datos['tipo_carga'];

                        $btnAsesor = '';
                        $btnTipoCarga = '';
                        $btnEliminarCupos = " ";
                        $btnEliminrAsesor = " ";
                        if($_SESSION['permisosMod']['w']){
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" onClick="fntEditGrasesores('.$id.')" title="Editar asesor"><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" onClick="fntCargaGrasesores('.$id.')" title="Tipo carga"><i class="fa fa-truck"></i></button>';
                        }else{
                          $btnAsesor = '<button class="btn btn-primary  btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
                          $btnTipoCarga = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled><i class="fa fa-truck"></i></button>';
                        }
                        if($_SESSION['permisosMod']['d']){
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" onClick="fntDelGrasesores('.$id.')" title="Eliminar cupo"><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" onClick="fntCleanGrasesores('.$id.')" title="Limpiar"><i class="fa fa-eraser"></i></button>';
                        }else{
                          $btnEliminarCupos = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
                          $btnEliminrAsesor = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled><i class="fa fa-eraser"></i></button>';
                        }
                        echo '
                          <div class="Guazapa-cupoindividual_asignar_cupo_asesor">
                            <div class="Guazapa-textasesor_asignar_cupo_asesor">
                              <p><small>'.$name.'</small></p>
                            </div>
                            <div class="Guazapa-bloke_botones_asignar-eliminar_cupo_asesor">
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminrAsesor.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnEliminarCupos.'
                              </div>
                              <div class="Guazapa-botones_cupo_asignar-eliminar_cupo_asesor">
                                '.$btnTipoCarga.'
                              </div>
                            </div>
                          </div>                      
                        ';
                      }
                    ?>
                  </td>
                </tr>
              </table>
          </div>        
        </div>
      </div>
    </div>
  </div>
</main>

<?php footerAdmin($data); ?>