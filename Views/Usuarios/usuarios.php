<?php 
  headerAdmin($data); 
  getModal('modalUsuarios',$data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1></i> <?= $data['page_title'] ?>
        <?php if($_SESSION['permisosMod']['w']){ ?>
          <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
        <?php } ?>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableUsuarios">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Cargo</th>
                  <th>Area</th>
                  <th>Ubicación</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Carlos</td>
                  <td>Henández</td>
                  <td>carlos@info.com</td>
                  <td>Administrador</td>
                  <td>Ventas</td>
                  <td>Planta</td>
                  <td>Activo</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?> 