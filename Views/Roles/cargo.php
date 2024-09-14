<?php 
  headerAdmin($data);
  getModal('modalRoles',$data);
?>
<div id="contentAjax"></div> 
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><?= $data['page_title'] ?>
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
            <table class="table table-hover table-bordered" id="tableRoles">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Cargo</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>
    