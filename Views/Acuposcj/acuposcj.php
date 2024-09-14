<?php 
    headerAdmin($data);
    getModal('modalAcuposcg',$data);
    require_once ('Controllers/Acuposcj.php');
    $ins_acb= new Acuposcj();
    $Year = strftime("%Y");
    $Semana = date("W");
    $Dia = date("N");
    if(date("N")==5 || date("N")==6 ||  date("N")==7){
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
    $btnEditarCupo = " ";
    $btnVerCupo = " ";
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><?= $data['page_title'] ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableAcuposcj">
              <thead>
                <tr>
                  <th>Bloque Horario</th>
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miércoles</th>
                  <th>Jueves</th>
                  <th>Viernes</th>
                </tr>                
              </thead>
              <!--                         BLOQUE 1                        -->  <!--                         HORAS LABORALES                        -->
              <tr class="g-asignar-cupos-tr">
                <td class="Guazapa-asignar_cupo_asesor-td">
                  <div class="bloqueHora">
                    <p>6:00:AM - 9:00:AM</p>
                  </div>
                </td>
                <!-- LUNES BLOQUE 1 *6:00:AM-9:00:AM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,1,1);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,1,1);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,1,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MARTES BLOQUE 1 *6:00:AM-9:00:AM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,2,1);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,2,1);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,1,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MIERCOLES BLOQUE 1 *6:00:AM-9:00:AM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,3,1);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,3,1);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,1,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- JUEVES BLOQUE 1 *6:00:AM-9:00:AM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,4,1);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,4,1);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,1,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- VIERNES BLOQUE 1 *6:00:AM-9:00:AM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,5,1);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,5,1);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,1,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
              </tr>
              <!--                         BLOQUE 2                        -->  <!--                         HORAS LABORALES                        -->
              <tr class="g-asignar-cupos-tr">
                <td class="Guazapa-asignar_cupo_asesor-td">
                  <div class="bloqueHora">
                    <p>9:00:AM - 12:00:MD</p>
                  </div>
                </td>
                <!-- LUNES BLOQUE 2 *9:00:AM-12:00:MD* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,1,2);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,1,2);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,2,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MARTES BLOQUE 2 *9:00:AM-12:00:MD* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,2,2);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,2,2);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,2,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MIERCOLES BLOQUE 2 *9:00:AM-12:00:MD* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,3,2);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,3,2);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,2,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- JUEVES BLOQUE 2 *9:00:AM-12:00:MD* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,4,2);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,4,2);
                    for ($i=0; $i<$cupos; $i++){                      
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,2,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- VIERNES BLOQUE 2 *9:00:AM-12:00:MD* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,5,2);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,5,2);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,2,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
              </tr>
              <!--                         BLOQUE 3                        -->  <!--                         HORAS LABORALES                        -->
              <tr class="g-asignar-cupos-tr">
                <td class="Guazapa-asignar_cupo_asesor-td">
                  <div class="bloqueHora">
                    <p>12:00:MD - 3:00:PM</p>
                  </div>
                </td>
                <!-- LUNES BLOQUE 3 *12:00:MD-3:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,1,3);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,1,3);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,3,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MARTES BLOQUE 3 *12:00:MD-3:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,2,3);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,2,3);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,3,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MIERCOLES BLOQUE 3 *12:00:MD-3:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,3,3);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,3,3);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,3,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- JUEVES BLOQUE 3 *12:00:MD-3:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,4,3);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,4,3);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,3,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- VIERNES BLOQUE 3 *12:00:MD-3:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,5,3);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,5,3);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,3,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
              </tr>
              <!--                         BLOQUE 4                        -->  <!--                         HORAS EXTRAS                        -->
              <tr class="g-asignar-cupos-tr">
                <td class="Guazapa-asignar_cupo_asesor-td">
                  <div class="bloqueHora">
                    <p>3:00:PM - 9:00:PM</p>
                  </div>
                </td>
                <!-- LUNES BLOQUE 4 *3:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,1,4);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,1,4);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,4,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MARTES BLOQUE 4 *3:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,2,4);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,2,4);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,4,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MIERCOLES BLOQUE 4 *3:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,3,4);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,3,4);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,4,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- JUEVES BLOQUE 4 *3:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,4,4);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,4,4);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,4,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- VIERNES BLOQUE 4 *3:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,5,4);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,5,4);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,4,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
              </tr>
              <!--                         BLOQUE 5                        -->  <!--                         HORAS EXTRAS                        -->
              <tr class="g-asignar-cupos-tr">
                <td class="Guazapa-asignar_cupo_asesor-td">
                  <div class="bloqueHora">
                    <p>6:00:PM - 9:00:PM</p>
                  </div>
                </td>
                <!-- LUNES BLOQUE 5 *6:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,1,5);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,1,5);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,1,5,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MARTES BLOQUE 5 *6:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,2,5);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,2,5);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,2,5,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- MIERCOLES BLOQUE 5 *6:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,3,5);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,3,5);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,3,5,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- JUEVES BLOQUE 5 *6:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,4,5);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,4,5);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,4,5,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </td>
                <!-- VIERNES BLOQUE 5 *6:00:PM-9:00:PM* -->
                <td class="g-asignar-cupos-td">
                  <?php
                    $cupos = $ins_acb->get_Cupos($Year,$Semana,5,5);
                    $subBloque = $ins_acb->get_SubBloque($Year,$Semana,5,5);
                    for ($i=0; $i<$cupos; $i++){
                      $sub_bloque=$subBloque[$i]['sub_bloque'];
                      $datos=$ins_acb->get_DatosCupos($Year,$Semana,5,5,$sub_bloque);
                      $id=$datos['id_cupo'];
                      $name = $datos['nombre_asesor'];
                      $tipoCarga = $datos['tipo_logistica'];
                      $estado = $datos['estado'];

                      $clase='';
                      if($estado==''){
                        $clase='badge btn-primaryPV';
                      }elseif($estado=='Programado'){
                        $clase='badge badge-naranja';
                      }elseif($estado=='En proceso'){
                        $clase='badge badge-warning';
                      }elseif($estado=='Cancelado'){
                        $clase='badge badge-danger';
                      }elseif($estado=='Finalizado'){
                        $clase='badge badge-success';
                      }

                      $user=$_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'];
                      if($_SESSION['permisosMod']['w'] && $user==''.$name || $user=='Root Root'){
                        $btnEdit = '<button class="btn btn-primaryV btn-sm" onClick="fntEditAcuposcj('.$id.')" title="Editar datos"><i class="fas fa-edit"></i></button>';
                      }else{
                        $btnEdit = '<button class="btn btn-primaryV  btn-sm" title="Acceso denegado" disabled><i class="fas fa-edit"></i></button>';
                      }
                      if($_SESSION['permisosMod']['r'] && $user==''.$name || $user=='Root Root'){
                        $btnView = '<button class="btn btn-viewAC btn-sm" onClick="fntViewAcuposcj('.$id.')" title="Ver datos"><i class="fas fa-eye"></i></button>';
                      }else{
                        $btnView = '<button class="btn btn-viewAC  btn-sm" title="Acceso denegado" disabled><i class="fas fa-eye"></i></button>';
                      }
                      
                      echo '
                        <div class="g-asignar-cupos-cupoindividual">
                           <div class="g-asignar-cupos-textasesor '.$clase.'">
                            <p>
                              <small>'.$name.'</small>
                              <br>
                              <small>'.$tipoCarga.'</small>
                            </p>
                          </div>
                          <div class="g-asignar-cupos_rastra_botones">
                            <div class="g-asignar-cupos-botones">
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnEdit.'
                              </div>
                              <div class="g-asignar-cupos-botones_cupo">
                                '.$btnView.'
                              </div>
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